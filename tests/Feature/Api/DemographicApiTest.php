<?php

use App\Models\Resident;
use App\Models\User;
use App\Shared\Enums\FamilyRelation;
use App\Shared\Enums\GenderType;

it('allows admin to register a new family with head resident (Atomic Transaction)', function () {
    $admin = User::factory()->create();

    $response = $this->actingAs($admin)->postJson('/api/v1/demographics/families', [
        'kk_number' => '3213010000000001',
        'head_of_family_name' => 'Budi Santoso',
        'address' => 'Dusun 1, RT 01 RW 02',
        'rt' => '001',
        'rw' => '002',
        'postal_code' => '41253',
        'head_resident' => [
            'nik' => '3213010000000002',
            'name' => 'Budi Santoso',
            'place_of_birth' => 'Subang',
            'date_of_birth' => '1980-05-15',
            'gender' => GenderType::Male->value,
            'marital_status' => 'KAWIN',
        ],
    ]);

    $response->assertStatus(201)
        ->assertJsonPath('success', true);

    $this->assertDatabaseHas('families', [
        'kk_number' => '3213010000000001',
    ]);

    $this->assertDatabaseHas('residents', [
        'nik' => '3213010000000002',
        'family_relation_status' => FamilyRelation::Head->value,
    ]);
});

it('prevents registration if NIK already exists in the system', function () {
    $admin = User::factory()->create();

    $existingResident = Resident::factory()->create([
        'nik' => '3213019999999999',
    ]);

    $response = $this->actingAs($admin)->postJson('/api/v1/demographics/families', [
        'kk_number' => '3213010000000005',
        'head_of_family_name' => 'Ahmad',
        'address' => 'Dusun 2',
        'rt' => '002',
        'rw' => '002',
        'postal_code' => '41253',
        'head_resident' => [
            'nik' => '3213019999999999',
            'name' => 'Ahmad',
            'place_of_birth' => 'Subang',
            'date_of_birth' => '1985-01-01',
            'gender' => GenderType::Male->value,
            'marital_status' => 'KAWIN',
        ],
    ]);

    $response->assertStatus(422);
});

it('masks PII data (NIK and KK) for public users accessing family details', function () {
    $resident = Resident::factory()->create([
        'nik' => '3213011234567890',
    ]);

    $resident->family->update(['kk_number' => '3213010987654321']);

    $response = $this->getJson("/api/v1/demographics/families/{$resident->family->id}");

    $response->assertStatus(200)
        ->assertJsonPath('data.kk_number', '321301******4321')
        ->assertJsonPath('data.residents.0.nik', '321301******7890');
});

it('exposes full PII data for authenticated admins accessing family details', function () {
    $admin = User::factory()->create();
    $resident = Resident::factory()->create([
        'nik' => '3213011234567890',
    ]);

    $resident->family->update(['kk_number' => '3213010987654321']);

    $response = $this->actingAs($admin)->getJson("/api/v1/demographics/families/{$resident->family->id}");

    $response->assertStatus(200)
        ->assertJsonPath('data.kk_number', '3213010987654321')
        ->assertJsonPath('data.residents.0.nik', '3213011234567890');
});
