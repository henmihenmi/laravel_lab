<?php

namespace Tests\Feature;

use App\Models\Model\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
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
        $post->id = 1;
        $post->name = "test";
        $post->content = "test post";
        $post->save();
    }

    public function testCommentCreate()
    {
        $response = $this->post('posts/1/comments', [
            'post_id' => 1,
            'name' => 'sample',
            'comment' => 'sample comment',
        ]);

        $response->assertStatus(200);

        $view = $this->get('posts/1');
        $view->assertStatus(200);
    }
}
