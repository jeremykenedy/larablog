<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;

class PostProcesses
{
    protected $tag;
    protected $pageData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tag)
    {
        $this->tag = $tag;
        $this->handle();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->tag) {
            $this->pageData = $this->tagIndexData($this->tag);

            return $this->tagIndexData($this->tag);
        }

        $this->pageData = $this->normalIndexData();

        return $this->normalIndexData();
    }

    /**
     * Gets the response.
     *
     * @return private pageData[]
     */
    public function getResponse()
    {
        return $this->pageData;
    }

    /**
    * Return data for normal index page
    *
    * @return array
    */
    protected function normalIndexData()
    {
        $posts = Post::with('tags')
            ->where('published_at', '<=', Carbon::now())
            ->where('is_draft', 0)
            ->orderBy('published_at', 'desc')
            ->simplePaginate(config('blog.posts_per_page'));

        return [
            'title'             => config('blog.title'),
            'subtitle'          => config('blog.subtitle'),
            'posts'             => $posts,
            'post_image'        => config('blog.post_image'),
            'meta_description'  => config('blog.description'),
            'reverse_direction' => config('blog.reverse_pagination_direction'),
            'tag'               => null,
        ];
    }

    /**
    * Return data for a tag index page
    *
    * @param string $tag
    * @return array
    */
    protected function tagIndexData($tag)
    {
        $tag = Tag::where('tag', $tag)->firstOrFail();
        $reverse_direction = (bool)$tag->reverse_direction;

        $posts = Post::where('published_at', '<=', Carbon::now())
            ->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            })
            ->where('is_draft', 0)
            ->orderBy('published_at', $reverse_direction ? 'asc' : 'desc')
            ->simplePaginate(config('blog.posts_per_page'));

        $posts->addQuery('tag', $tag->tag);

        $post_image = $tag->post_image ?: config('blog.post_image');

        return [
            'title'             => $tag->title,
            'subtitle'          => $tag->subtitle,
            'posts'             => $posts,
            'post_image'        => $post_image,
            'tag'               => $tag,
            'reverse_direction' => $reverse_direction,
            'meta_description'  => $tag->meta_description ?: \ config('blog.description'),
        ];
    }

}
