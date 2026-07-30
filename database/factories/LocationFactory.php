<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LocationFactory extends Factory
{
    protected $model = Location::class;

    public function definition(): array
    {
        $name = $this->faker->company();
        $lat = $this->faker->latitude(-90, 90);
        $lon = $this->faker->longitude(-180, 180);

        return [
            'name' => $name,
            'slug' => Str::slug($name . '-' . Str::random(5)),
            'category' => 'umkm',
            'description' => $this->faker->sentence(),
            'address' => $this->faker->address(),
            'is_active' => true,
            'geom' => DB::raw("ST_SetSRID(ST_MakePoint({$lon}, {$lat}), 4326)"),
        ];
    }
}
