<?php

namespace Database\Factories;

use App\Models\Family;
use Illuminate\Database\Eloquent\Factories\Factory;

class FamilyFactory extends Factory
{
    protected $model = Family::class;

    public function definition(): array
    {
        return [
            'kk_number' => $this->faker->numerify('321301##########'),
            'head_of_family_name' => $this->faker->name(),
            'address' => $this->faker->streetAddress(),
            'rt' => $this->faker->numerify('0##'),
            'rw' => $this->faker->numerify('0##'),
            'postal_code' => $this->faker->numerify('412##'),
            'village' => 'Cikaum Timur',
            'district' => 'Cikaum',
            'city' => 'Subang',
            'province' => 'Jawa Barat',
        ];
    }
}
