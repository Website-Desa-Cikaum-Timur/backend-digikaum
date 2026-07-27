<?php

use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

beforeEach(function () {
    Cache::flush();
});

it('validates organization_id exists before creating official', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->postJson('/api/v1/officials', [
        'organization_id' => '01HXXXXX-INVALID-ULID',
        'name' => 'Penyusup',
        'position' => 'Hacker',
    ]);

    $response->assertStatus(422)
        ->assertJsonValidationErrors(['organization_id']);
});

it('can create an official inside a valid organization', function () {
    $user = User::factory()->create();
    $org = Organization::factory()->create();

    $response = $this->actingAs($user)->postJson('/api/v1/officials', [
        'organization_id' => $org->id,
        'name' => 'Bapak Raditya',
        'position' => 'Kepala Urusan Perencanaan',
        'sort_order' => 3,
    ]);

    $response->assertStatus(201)
        ->assertJsonPath('data.name', 'Bapak Raditya');

    $this->assertDatabaseHas('officials', [
        'organization_id' => $org->id,
        'name' => 'Bapak Raditya',
    ]);
});
