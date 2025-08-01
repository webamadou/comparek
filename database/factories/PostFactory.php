<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(6);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'meta_title' => $title,
            'meta_description' => $this->faker->paragraph,
            'meta_keywords' => implode(',', $this->faker->words(5)),
            'canonical_url' => $this->faker->url(),
            'excerpt' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(6, true),
            'is_published' => $this->faker->boolean(80),
            'published_at' => now(),
            'schema_json' => json_encode(['@type' => 'BlogPosting']),
            'robots_directives' => 'index, follow',
            'author_id' => User::inRandomOrder()->value('id'),
            'category_id' => Category::inRandomOrder()->value('id'),
            'views_count' => rand(100, 10000),
            'reading_time_minutes' => rand(2, 10),
            'is_home_page_big_image' => rand(0, 1),
        ];
    }
}
