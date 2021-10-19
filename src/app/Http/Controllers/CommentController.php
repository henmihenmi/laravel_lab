<?php

namespace App\Http\Controllers;

use App\Models\Model\Comment;
use App\Models\Model\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // $idにはpostテーブルのidが入っている
    public function create($id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:10',
            'comment' => 'required',
        ]);
        // dd($id);
        $post = Post::find($id);

        $post_id = $request->id;
        $name = $request->name;
        $comment = $request->comment;

        Comment::insert([
            "name" => $name,
            "comment" => $comment,
            "post_id" => $post_id,
        ]);
        $comments = Comment::all();
        // dd($comments);

        return redirect()->route('posts.show', [
            'id' => $post,
            'comments' => $comments,
        ]);

        // return view('post.show', [
        //     'post' => $post,
        //     'comments' => $comments,
        // ]);
    }
}
