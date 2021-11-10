<?php

namespace Tests\Feature\Api;

use App\Models\Model\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostApiTest extends TestCase
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

    public function testPostApiIndex()
    {
        $response = $this->get(route('api.posts.index'));
        $response->assertStatus(200);
    }

    public function testPostApiCreate()
    {
        $response = $this->post(route('api.posts.create', [
            'name' => 'test name',
            'content' => 'test content',
        ]));

        $response->assertStatus(201);

    }

    public function testPostApiShow()
    {
        $post = Post::first();
        $response = $this->get(route('api.posts.show', ['id' => $post->id]));
        $response->assertStatus(200);
    }
}
