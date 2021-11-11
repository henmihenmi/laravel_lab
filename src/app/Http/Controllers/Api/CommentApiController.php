<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateComment;
use App\Models\Model\Post;

class CommentApiController extends Controller
{
    // $idにはpostテーブルのidが入っている
    public function create($id, CreateComment $request)
    {
        $post = Post::find($id);
        $post->comments()->create($request->all());

        return $post;
    }
}
