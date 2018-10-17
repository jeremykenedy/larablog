<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Services\PostProcesses;
use Illuminate\Http\Request;
use Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the published blog posts.
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
    public function showPost(Request $request, $slug)
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
     * Display a listing of the authors with published content.
     *
     * @return \Illuminate\Http\Response
     */
    public function authors(Request $request)
    {
        $authors = Post::activeAuthors()->get();

        if (!$authors) {
            $authors = [];
        }

        $data = [
            'authors'   => $authors,
            'image'     => config('blog.authors_page_image'),
        ];

        return view('blog.authors', $data);
    }

    /**
     * Display a listing of an authors published posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function author(Request $request, $author)
    {
        $validator = Validator::make([
            'author' => $author
        ], [
            'author' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $tag = $request->get('tag');
        $posts = Post::postsByAuthors($author)->get();

        $data = [
            'author'    => $author,
            'image'     => config('blog.author_page_image'),
            'posts'     => $posts,
            'tag'       => $tag,
        ];

        return view('blog.author', $data);
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
