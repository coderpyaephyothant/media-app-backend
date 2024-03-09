<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categoryIds = \App\Models\Category::pluck('category_id')->toArray();
        return [
            'description' => $this->faker->sentence(15),
            'title'       => $this->faker->sentence,
            'category_id' => $this->faker->randomElement($categoryIds)
        ];
    }
}
