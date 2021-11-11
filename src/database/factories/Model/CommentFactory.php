<?php

namespace Database\Factories\Model;

use App\Models\Model\Comment;
use App\Models\Model\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => Post::factory(),
            'name' => $this->faker->name(),
            'comment' => $this->faker->paragraph(),
        ];
    }
}
