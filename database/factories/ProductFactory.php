<?php

namespace Database\Factories;

use App\Models\Product;
use App\Shared\Enums\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = $this->faker->words(3, true);

        return [
            'name' => ucwords($name),
            'slug' => Str::slug($name) . '-' . Str::random(4),
            'category' => $this->faker->randomElement(ProductCategory::values()),
            'description' => $this->faker->paragraph(),
            'owner_name' => $this->faker->name(),
            'phone_number' => $this->faker->phoneNumber(),
            'price' => $this->faker->numberBetween(10000, 500000),
            'is_active' => true,
        ];
    }
}
