<?php

namespace Tests\Feature;

use App\Models\Model\Comment;
use App\Models\Model\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

     public function setUp() :void
    {
        parent::setUp();

        $post = new Post();
        $post->id = 2;
        $post->name = "test";
        $post->content = "test post";
        $post->save();

        $comment = new Comment();
        $comment->post_id = 2;
        $comment->name = 'name';
        $comment->comment = 'comment';
        $comment->save();
    }

    public function testPostIndex()
    {
        $response = $this->get('posts');
        $response->assertStatus(200);
    }

    public function testPostCreate()
    {
        $response = $this->post('posts', [
            'name' => 'sample',
            'content' => 'sample content',
        ]);

        $response->assertStatus(200);

        $view = $this->get('posts');
        $view->assertStatus(200);
    }

    public function testPostShow()
    {
        $response = $this->get('posts/2');
        $response->assertStatus(200);
    }
}
