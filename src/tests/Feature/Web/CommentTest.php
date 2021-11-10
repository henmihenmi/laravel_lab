<?php

namespace Tests\Feature\Web;

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

        $this->seed();
    }

    public function testCommentCreate()
    {
        $post = Post::first();
        $response = $this->post(route('comments.create', [
            'id' => $post->id,
            'name' => 'sample',
            'comment' => 'sample comment',
        ]));

        $response->assertStatus(200);

        $view = $this->get(route('posts.index'));
        $view->assertStatus(200);
    }
}