<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Services\PostProcesses;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tag = $request->get('tag');
        $service = new PostProcesses($tag);
        $data = $service->getResponse();
        $layout = $tag ? Tag::layout($tag) : 'blog.index';

        return view($layout, $data);
    }

    /**
     * Display the specified resource.
     *
     * @param string  $slug
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function showPost($slug, Request $request)
    {
        $post = Post::with('tags')
                        ->whereSlug($slug)
                        ->where('is_draft', 0)
                        ->firstOrFail();

        $tag = $request->get('tag');

        if ($tag) {
            $tag = Tag::whereTag($tag)->firstOrFail();
        }

        $data = compact('post', 'tag', 'slug');

        return view($post->layout, $data);
    }

    /**
     * Get the RSS feed.
     *
     * @param RssFeed $feed
     *
     * @return \Illuminate\Http\Response
     */
    public function rss(RssFeed $feed)
    {
        $rss = $feed->getRSS();

        return response($rss)->header('Content-type', 'application/rss+xml');
    }
}
