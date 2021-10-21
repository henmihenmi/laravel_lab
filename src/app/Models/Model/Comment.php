<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Model\Post;

class Comment extends Model
{
    // use HasFactory;
    protected $fillable = ['name', 'comment', 'post_id'];

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
