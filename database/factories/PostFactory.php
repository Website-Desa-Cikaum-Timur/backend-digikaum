<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = $this->faker->sentence();

        return [
            'author_id' => clone User::factory(),
            'post_category_id' => clone PostCategory::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->text(200),
            'content' => $this->faker->paragraphs(3, true),
            'status' => 'published',
            'is_highlight' => false,
            'views_count' => 0,
            'published_at' => now(),
        ];
    }
}
