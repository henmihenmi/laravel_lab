<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePost;
use App\Models\Model\Comment;
use App\Models\Model\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post.index', [
            'posts' => $posts,
        ]);
    }

    public function create(CreatePost $request)
    {
        $post = new Post();
        $post->fill($request->all())->save();

        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }

    public function show($postId)
    {
        $post = Post::with('comments')->findOrFail($postId);

        return view('post.show', [
            'post' => $post,
            'comments' => $post->comments,
        ]);
    }
}
