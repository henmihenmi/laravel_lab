<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Model\Comment;

class Post extends Model
{
    // use HasFactory;

    protected $fillable = ['name', 'content'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
