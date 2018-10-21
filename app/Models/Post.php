<?php

namespace App\Models;

use App\Services\Markdowner;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Post extends Model implements Feedable
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Define the date field.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'subtitle',
        'content_raw',
        'content_html',
        'post_image',
        'meta_description',
        'author',
        'layout',
        'slug',
        'is_draft',
        'published_at',
    ];

    /**
     * Typecasting is awesome.
     *
     * @var array
     */
    protected $casts = [
        'slug'              => 'string',
        'title'             => 'string',
        'subtitle'          => 'string',
        'content_raw'       => 'string',
        'content_html'      => 'string',
        'post_image'        => 'string',
        'meta_description'  => 'string',
        'author'            => 'string',
        'layout'            => 'string',
        'is_draft'          => 'boolean',
        'published_at'      => 'datetime:Y-m-d',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'layout',
    ];

    /**
     * The many-to-many relationship between pages and tags.
     *
     * @return BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'post_tag_pivot');
    }

    /**
     * Set the title attribute and automatically the slug.
     *
     * @param string $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (!$this->exists) {
            $this->setUniqueSlug($value, '');
        }
    }

    /**
     * Recursive routine to set a unique slug.
     *
     * @param string $title
     * @param mixed  $extra
     */
    protected function setUniqueSlug($title, $extra)
    {
        $slug = str_slug($title.'-'.$extra);

        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($title, $extra + 1);

            return;
        }

        $this->attributes['slug'] = $slug;
    }

    /**
     * Set the HTML content automatically when the raw content is set.
     *
     * @param string $value
     */
    public function setContentRawAttribute($value)
    {
        $markdown = new Markdowner();

        $this->attributes['content_raw'] = $value;
        $this->attributes['content_html'] = $markdown->toHTML($value);
    }

    /**
     * Sync tag relation adding new tags as needed.
     *
     * @param array $tags
     */
    public function syncTags(array $tags)
    {
        Tag::addNeededTags($tags);

        if (count($tags)) {
            $this->tags()->sync(
                Tag::whereIn('tag', $tags)->pluck('id')->all()
            );

            return;
        }

        $this->tags()->detach();
    }

    /**
     * Return the date portion of published_at.
     */
    public function getPublishDateAttribute($value)
    {
        return $this->published_at;
    }

    /**
     * Alias for content_raw.
     */
    public function getContentAttribute($value)
    {
        return $this->content_raw;
    }

    /**
     * Return URL to page.
     *
     * @param Tag $tag
     *
     * @return string
     */
    public function url(Tag $tag = null)
    {
        $url = url('/'.$this->slug);
        if ($tag) {
            $url .= '?tag='.urlencode($tag->tag);
        }

        return $url;
    }

    /**
     * Return array of tag links.
     *
     * @param string $base
     *
     * @return array
     */
    public function tagLinks($base = '/?tag=%TAG%')
    {
        $tags = $this->tags()->pluck('tag')->all();
        $return = [];

        foreach ($tags as $tag) {
            $url = str_replace('%TAG%', urlencode($tag), $base);
            $return[] = '<a class="badge" href="' . $url . '">' . e($tag) . '</a>';
        }

        return $return;
    }

    /**
     * Return next post after this one or null.
     *
     * @param Tag $tag
     *
     * @return Post
     */
    public function newerPost(Tag $tag = null)
    {
        $query = static::where('published_at', '>', $this->published_at)
                            ->where('published_at', '<=', Carbon::now())
                            ->where('is_draft', 0)
                            ->orderBy('published_at', 'asc');
        if ($tag) {
            $query = $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            });
        }

        return $query->first();
    }

    /**
     * Return older post before this one or null.
     *
     * @param Tag $tag
     *
     * @return Post
     */
    public function olderPost(Tag $tag = null)
    {
        $query = static::where('published_at', '<', $this->published_at)
                            ->where('is_draft', 0)
                            ->orderBy('published_at', 'desc');
        if ($tag) {
            $query = $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            });
        }

        return $query->first();
    }

    /**
     * Model RSS feed items to return.
     *
     * @return FeedItem
     */
    public function toFeedItem()
    {
        return FeedItem::create([
            'id'        => $this->id,
            'title'     => $this->title,
            'summary'   => $this->content_html,
            'updated'   => $this->updated_at,
            'link'      => $this->slug,
            'author'    => $this->author,
        ]);
    }

    /**
     * Get the feed items.
     *
     * @return collection
     */
    public static function getFeedItems()
    {
        return self::allPublishedPosts()->get();
    }

    /**
     * Scope a query to get only published posts with tags.
     *
     * @return collection
     */
    public function scopeAllPublishedPosts($query)
    {
        return $query->with('tags')
            ->publishedTimePast()
            ->isNotDraft()
            ->orderBy('published_at', 'desc');
    }

    /**
     * Scope a query to get by slug.
     *
     * @param string $slug
     *
     * @return collection
     */
    public function scopeBySlug($query, $slug)
    {
        $query->whereSlug($slug);
    }

    /**
     * Scope a query to show posts not marked as drafts.
     *
     * @return collection
     */
    public function scopeIsNotDraft($query)
    {
        $query->where('is_draft', 0);
    }

    /**
     * Scope a query to show posts that the have past the published date and time.
     *
     * @return collection
     */
    public function scopePublishedTimePast($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }

    /**
     * Scope a query to all posts authors.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAuthors($query)
    {
        return $query->select('author')
                        ->distinct()
                        ->orderBy('author', 'asc');
    }

    /**
     * Scope a query to only authors with published posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActiveAuthors($query)
    {
        return $query->select('author')
                        ->publishedTimePast()
                        ->isNotDraft()
                        ->distinct()
                        ->orderBy('author', 'asc');
    }

    /**
     * Scope a query to only authors with published posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePostsByAuthors($query, $author)
    {
        return $query->with('tags')
            ->where('author', $author)
            ->publishedTimePast()
            ->isNotDraft()
            ->orderBy('published_at', 'desc');
    }
}
