<?php

namespace App\Http\Controllers;

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

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:10',
            'content' => 'required',
        ]);

        $name = $request->name;
        $content = $request->content;

        Post::insert([
            'name' => $name,
            'content' => $content
        ]);

        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }

    public function show($post_id)
    {
        $post = Post::find($post_id);
        // dd($post);

        $comments = Post::find($post_id)->comments;
        // dd($comments);

        return view('post.show', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }
}
