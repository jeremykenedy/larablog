<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    protected $postId;
    protected $modifiedTitle;

    /**
     * Initial setup of contructor.
     *
     * @return void
     */
    public function setup()
    {
        $this->postId = 20181010;
        $this->modifiedTitle = 'Jeremy was here';

        parent::setup();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateNewPost()
    {
        Post::truncate();

        $post = factory(Post::class)->create([
            'id' => $this->postId,
        ]);

        $this->assertEquals($post->id, $this->postId);
    }

    public function testFindPost()
    {
        $post = Post::find($this->postId);

        $this->assertEquals($post->id, $this->postId);
    }

    public function testEditPost()
    {
        $post = Post::find($this->postId);
        $post->title = $this->modifiedTitle;
        $post->save;

        $this->assertEquals($post->title, $this->modifiedTitle);
    }
}
