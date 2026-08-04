<?php

namespace Database\Seeders;

use App\Models\Family;
use App\Models\Resident;
use App\Shared\Enums\FamilyRelation;
use App\Shared\Enums\GenderType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemographicSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $this->command->info('Membangun data 50 Kartu Keluarga & Anggota...');

            Family::factory(50)->create()->each(function ($family) {

                Resident::factory()->create([
                    'family_id' => $family->id,
                    'name' => $family->head_of_family_name,
                    'family_relation_status' => FamilyRelation::Head->value,
                    'gender' => GenderType::Male->value,
                    'marital_status' => 'KAWIN',
                    'date_of_birth' => fake()->dateTimeBetween('-60 years', '-40 years')->format('Y-m-d'),
                ]);

                Resident::factory()->create([
                    'family_id' => $family->id,
                    'family_relation_status' => FamilyRelation::Wife->value,
                    'gender' => GenderType::Female->value,
                    'marital_status' => 'KAWIN',
                    'date_of_birth' => fake()->dateTimeBetween('-55 years', '-35 years')->format('Y-m-d'),
                ]);

                $childrenCount = random_int(1, 3);
                Resident::factory($childrenCount)->create([
                    'family_id' => $family->id,
                    'family_relation_status' => FamilyRelation::Child->value,
                    'marital_status' => 'BELUM KAWIN',
                    'date_of_birth' => fake()->dateTimeBetween('-20 years', '-5 years')->format('Y-m-d'),
                ]);
            });
        });
    }
}
