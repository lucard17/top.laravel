<?php

namespace Database\Factories;

use App\Models\NewsCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewsArticle>
 */
class NewsArticleFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();
        $newsCategories = NewsCategory::all();
        return [
            'title' => fake()->sentence(),
            'body' => fake()->text(),
            'image_path' => fake()->imageUrl(),
            'is_published' => true,
            'news_category_id' => $newsCategories->random(1)->first()->id,
            'user_id' => $users->random(1)->first()->id,
        ];
    }
}