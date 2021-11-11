<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateComment;
use App\Models\Model\Post;

class CommentController extends Controller
{
    // $idにはpostテーブルのidが入っている
    public function create($id, CreateComment $request)
    {
        $post = Post::find($id);
        $post->comments()->create($request->all());

        return view('post.show', [
            'post' => $post,
            'comments' => $post->comments,
        ]);
    }
}
