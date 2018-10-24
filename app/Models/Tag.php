<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'tag',
        'title',
        'subtitle',
        'post_image',
        'meta_description',
        'reverse_direction',
    ];

    /**
     * Typecasting is awesome.
     *
     * @var array
     */
    protected $casts = [
        'tag'               => 'string',
        'title'             => 'string',
        'subtitle'          => 'string',
        'post_image'        => 'string',
        'meta_description'  => 'string',
        'reverse_direction' => 'boolean',
    ];

    /**
     * The many-to-many relationship between tags and posts.
     *
     * @return BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'post_tag_pivot');
    }

    /**
     * Return a tag link.
     *
     * @param string $base
     *
     * @return string
     */
    public function link($base = '/?tag=%TAG%')
    {
        $url = str_replace('%TAG%', urlencode($this->tag), $base);
        $tagLink = '<a href="'.$url.'">'.e($this->tag).'</a>';

        return $tagLink;
    }

    /**
     * Add any tags needed from the list.
     *
     * @param array $tags List of tags to check/add
     */
    public static function addNeededTags(array $tags)
    {
        if (count($tags) === 0) {
            return;
        }

        $found = static::whereIn('tag', $tags)->pluck('tag')->all();

        foreach (array_diff($tags, $found) as $tag) {
            static::create([
                'tag'               => $tag,
                'title'             => $tag,
                'subtitle'          => 'Articles tagged: '.$tag,
                'post_image'        => '',
                'meta_description'  => '',
                'reverse_direction' => false,
            ]);
        }
    }

    /**
     * Return the index layout to use for a tag.
     *
     * @param string $tag
     * @param string $default
     *
     * @return string
     */
    public static function layout($tag, $default = 'blog.roll-layouts.home')
    {
        $layout = static::whereTag($tag)->pluck('layout');

        return $layout[0] ?: $default;
    }
}
