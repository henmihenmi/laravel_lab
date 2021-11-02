<?php

namespace Tests\Feature;

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

        $this->seed();
    }

    public function testPostIndex()
    {
        $response = $this->get('posts');
        $response->assertStatus(200);
    }

    public function testPostCreate()
    {
        $response = $this->post(route('posts.create', [
            'name' => 'test name',
            'content' => 'test content',
        ]));

        $response->assertStatus(200);

        $view = $this->get(route('posts.index'));
        $view->assertStatus(200);
    }

    public function testPostShow()
    {
        $post = Post::first();
        $response = $this->get(route('posts.show', ['id' => $post->id]));
        $response->assertStatus(200);
    }
}
