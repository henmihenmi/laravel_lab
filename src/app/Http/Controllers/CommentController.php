<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComment;
use App\Models\Model\Comment;
use App\Models\Model\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // $idにはpostテーブルのidが入っている
    public function create($id, CreateComment $request)
    {
        $post = Post::find($id);
        $post->comments()->create($request->all());
        // return redirect('api/posts');
        return $post;

        // $comments = Comment::all();
        // dd($comments);

        // return redirect()->route('posts.show', [
        //     'id' => $post,
        //     'comments' => $comments,
        // ]);

        // return view('post.show', [
        //     'post' => $post,
        //     'comments' => $post->comments,
        // ]);

    }
}
