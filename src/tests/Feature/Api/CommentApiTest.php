<?php

namespace Tests\Feature\Api;

use App\Models\Model\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentApiTest extends TestCase
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

    public function testCommentApiCreate()
    {
        $post = Post::first();
        $response = $this->post(route('api.comments.create', [
            'id' => $post->id,
            'name' => 'sample',
            'comment' => 'sample comment',
        ]));

        $response->assertStatus(200);

    }
}
