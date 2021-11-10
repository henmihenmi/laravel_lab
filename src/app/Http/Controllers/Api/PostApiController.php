<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePost;
use App\Models\Model\Comment;
use App\Models\Model\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return $posts;
        // return view('post.index', [
        //     'posts' => $posts,
        // ]);
    }

    public function create(CreatePost $request)
    {
        $post = new Post();
        $post->fill($request->all())->save();
        return $post;

        // $posts = Post::all();

        // return redirect('posts.index');

        // return view('post.index', ['posts' => $posts]);
    }

    public function show($postId)
    {
        $post = Post::with('comments')->findOrFail($postId);
        // dd($post);

        return $post;

    //     return view('post.show', [
    //         'post' => $post,
    //         'comments' => $post->comments,
    //     ]);
    }
}
