<?php

use App\Models\Official;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

beforeEach(function () {
    Cache::flush();
});

it('can fetch SOTK hierarchy with ordered officials', function () {
    $org = Organization::factory()->create(['name' => 'Pemerintah Desa']);

    $official2 = Official::factory()->create([
        'organization_id' => $org->id,
        'name' => 'Sekretaris',
        'sort_order' => 2,
    ]);

    $official1 = Official::factory()->create([
        'organization_id' => $org->id,
        'name' => 'Kepala Desa',
        'sort_order' => 1,
    ]);

    $response = $this->getJson('/api/v1/organizations');

    $response->assertStatus(200)
        ->assertJsonPath('data.0.name', 'Pemerintah Desa')
        ->assertJsonPath('data.0.officials.0.name', 'Kepala Desa')
        ->assertJsonPath('data.0.officials.1.name', 'Sekretaris');
});

it('can create organization and generate slug', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->postJson('/api/v1/organizations', [
        'name' => 'Badan Permusyawaratan Desa',
        'is_active' => true,
    ]);

    $response->assertStatus(201)
        ->assertJsonPath('data.slug', 'badan-permusyawaratan-desa');
});

it('cascades delete officials when organization is deleted', function () {
    $user = User::factory()->create();
    $org = Organization::factory()->create();
    $official = Official::factory()->create(['organization_id' => $org->id]);

    $response = $this->actingAs($user)->deleteJson("/api/v1/organizations/{$org->id}");

    $response->assertStatus(200);

    $this->assertDatabaseMissing('organizations', ['id' => $org->id]);

    $this->assertDatabaseMissing('officials', ['id' => $official->id]);
});
