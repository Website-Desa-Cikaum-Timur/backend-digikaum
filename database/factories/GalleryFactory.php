<?php

namespace Database\Factories;

use App\Models\Gallery;
use App\Shared\Enums\GalleryCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'category' => $this->faker->randomElement(GalleryCategory::values()),
            'year' => $this->faker->year(),
            'is_active' => true,
        ];
    }
}
