<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePost;
use App\Models\Model\Post;

class PostApiController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return $posts;
    }

    public function create(CreatePost $request)
    {
        $post = new Post();
        $post->fill($request->all())->save();

        return $post;
    }

    public function show($postId)
    {
        $post = Post::with('comments')->findOrFail($postId);

        return $post;
    }
}
