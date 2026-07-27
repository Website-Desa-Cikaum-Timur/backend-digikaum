<?php

namespace Database\Factories;

use App\Models\Official;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfficialFactory extends Factory
{
    protected $model = Official::class;

    public function definition(): array
    {
        return [
            'organization_id' => Organization::factory(),
            'name' => $this->faker->name(),
            'position' => $this->faker->jobTitle(),
            'nip_nik' => $this->faker->numerify('################'),
            'bio' => $this->faker->paragraph(),
            'sort_order' => $this->faker->numberBetween(1, 10),
            'is_active' => true,
        ];
    }
}
