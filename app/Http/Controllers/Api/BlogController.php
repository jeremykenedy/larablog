<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PostProcesses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

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
        $publishedPosts = Post::allPublishedPosts()->get();

        return response()->json([
            'code'      => 200,
            'message'   => 'Welcome to the '.config('blog.title').' API',
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
                'sitemap' => config('app.url').'/sitemap.xml',
                'rss'     => [
                    'blog' => route('feeds.blog'),
                ],

            ],
        ], Response::HTTP_OK);
    }

    /**
     * Display the posts paginated.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function posts(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tag' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $tag = $request->get('tag');
        $service = new PostProcesses($tag);
        $data = $service->getResponse();

        return response()->json($data['posts'], Response::HTTP_OK);
    }

    /**
     * Display all the posts.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function allPosts(Request $request)
    {
        $publishedPosts = Post::allPublishedPosts()->get();

        return response()->json($publishedPosts, Response::HTTP_OK);
    }

    /**
     * Get the Latest Post.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function latestPost(Request $request)
    {
        $post = Post::allPublishedPosts()->first();

        if (!$post) {
            $post = null;
        }

        return response()->json($post, Response::HTTP_OK);
    }

    /**
     * Gets the posts authors.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function getPostsAuthors(Request $request)
    {
        $authors = Post::activeAuthors()->get();

        if (!$authors) {
            $authors = [];
        }

        return response()->json($authors, Response::HTTP_OK);
    }

    /**
     * Gets posts by author.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function getPostsByAuthor(Request $request, $author)
    {
        $validator = Validator::make([
            'author' => $author
        ], [
            'author' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $posts = Post::postsByAuthors($author)->get();

        if (!$posts) {
            $posts = [];
        }

        return response()->json($posts, Response::HTTP_OK);
    }

}
