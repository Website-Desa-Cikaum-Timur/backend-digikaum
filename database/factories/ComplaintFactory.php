<?php

namespace Database\Factories;

use App\Models\Complaint;
use App\Shared\Enums\ComplaintStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ComplaintFactory extends Factory
{
    protected $model = Complaint::class;

    public function definition(): array
    {
        $title = $this->faker->sentence();

        return [
            'tracking_code' => 'CMP-' . date('Ymd') . '-' . strtoupper(Str::random(4)),
            'title' => $title,
            'slug' => Str::slug($title . '-' . Str::random(6)),
            'content' => $this->faker->paragraph(),
            'reporter_name' => $this->faker->name(),
            'reporter_phone' => $this->faker->phoneNumber(),
            'category' => $this->faker->randomElement(['infrastruktur', 'pelayanan', 'keamanan']),
            'is_anonymous' => $this->faker->boolean(),
            'status' => ComplaintStatus::Pending->value,
        ];
    }
}
