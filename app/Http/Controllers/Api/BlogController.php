<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Tag;
use App\Services\PostProcesses;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $publishedPosts = Post::getAllPublishedPosts();

        return response()->json([
            'code'      => 200,
            'message'   => "Welcome to the " . config('blog.title') . " API",
            'data'      => [
                'title'         => config('blog.title'),
                'subtitle'      => config('blog.subtitle'),
                'description'   => config('blog.description'),
                'total_posts'   => $publishedPosts->count(),
                'blog_image'    => config('blog.post_image'),
                'latest_post'   => [
                    'post_id'           => $publishedPosts->last()->id,
                    'post_title'        => $publishedPosts->last()->title,
                    'post_subtitle'     => $publishedPosts->last()->subtitle,
                    'post_updated_at'   => $publishedPosts->last()->updated_at,
                    'post_published_at' => $publishedPosts->last()->published_at,
                    'post_subtitle'     => $publishedPosts->last()->subtitle,
                ],
                'sitemap' => config('app.url') . '/sitemap.xml',
                'rss' => [
                    'blog' => route('feeds.blog')
                ],

            ]
        ], Response::HTTP_OK);
    }

    /**
     * Display the posts paginated
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function posts(Request $request)
    {
        $tag        = $request->get('tag');
        $service    = new PostProcesses($tag);
        $data       = $service->getResponse();

        return $data["posts"];
    }

    /**
     * Display all the posts
     *
     * @return \Illuminate\Http\Response
     */
    public function allPosts(Request $request)
    {
        $publishedPosts = Post::getAllPublishedPosts();

        return $publishedPosts;
    }

    /**
     * Get the Latest Post
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function latestPost(Request $request)
    {
        return Post::with('tags')
            ->where('published_at', '<=', Carbon::now())
            ->where('is_draft', 0)
            ->orderBy('published_at', 'desc')
            ->first();
    }

}
