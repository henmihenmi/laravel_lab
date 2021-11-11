<?php

namespace Tests\Feature\Api;

use App\Models\Model\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
        $response->assertOk();

        $response->assertJsonStructure([
            '*' => [
                'name',
                'content',
            ]
        ]);
    }

    public function testPostApiCreate()
    {
        $response = $this->post(route('api.posts.create', [
            'name' => 'test name',
            'content' => 'test content',
        ]));
        $response->assertCreated();

        $this->assertDatabaseHas('posts', [
            'name' => 'test name',
            'content' => 'test content',
        ]);
    }

    public function testPostApiShow()
    {
        $post = Post::first();

        $response = $this->get(route('api.posts.show', ['id' => $post->id]));
        $response->assertOk();

        $response->assertJsonStructure([
                'name',
                'content',
                'comments' => [
                    '*' => [
                        'post_id',
                        'name',
                        'comment',
                    ]
                ]
        ]);
    }
}
