<?php

namespace Database\Seeders;

use App\Models\Model\Comment;
use App\Models\Model\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()
            ->count(3)
            ->has(Comment::factory()->count(2))
            ->create();
    }
}
