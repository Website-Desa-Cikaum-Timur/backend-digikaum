<?php

namespace Database\Factories;

use App\Models\Family;
use App\Models\Resident;
use App\Shared\Enums\FamilyRelation;
use App\Shared\Enums\GenderType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResidentFactory extends Factory
{
    protected $model = Resident::class;

    public function definition(): array
    {
        return [
            'family_id' => Family::factory(),
            'nik' => $this->faker->numerify('321301##########'),
            'name' => $this->faker->name(),
            'place_of_birth' => $this->faker->city(),
            'date_of_birth' => $this->faker->date(),
            'gender' => $this->faker->randomElement(GenderType::values()),
            'religion' => 'ISLAM',
            'education_level' => 'SMA/SEDERAJAT',
            'profession' => 'WIRASWASTA',
            'blood_type' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'marital_status' => 'KAWIN',
            'family_relation_status' => FamilyRelation::Head->value,
            'father_name' => $this->faker->name('male'),
            'mother_name' => $this->faker->name('female'),
            'is_active' => true,
        ];
    }
}
