<?php

use App\Models\Location;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
});

it('can fetch active locations with GeoJSON format', function () {
    Location::factory()->count(3)->create();

    $response = $this->getJson('/api/v1/locations');

    $response->assertStatus(200)
        ->assertJsonCount(3, 'data')
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id', 'name', 'geometry' => ['type', 'coordinates'],
                ],
            ],
        ]);
});

it('can filter locations within specific spatial radius', function () {
    $centerLat = -6.4100;
    $centerLon = 107.6100;

    Location::factory()->create([
        'name' => 'Klinik Terdekat',
        'geom' => DB::raw('ST_SetSRID(ST_MakePoint(107.6150, -6.4150), 4326)'),
    ]);

    Location::factory()->create([
        'name' => 'Pasar Jauh',
        'geom' => DB::raw('ST_SetSRID(ST_MakePoint(107.8000, -6.2000), 4326)'),
    ]);

    $response = $this->getJson("/api/v1/locations?lat={$centerLat}&lon={$centerLon}&radius=5000");

    $response->assertStatus(200)
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.name', 'Klinik Terdekat')
        ->assertJsonMissing(['name' => 'Pasar Jauh']);
});

it('can create a spatial location via protected route', function () {
    $user = User::factory()->create();
    $fakeImage = UploadedFile::fake()->image('location.jpg');

    $response = $this->actingAs($user)->postJson('/api/v1/locations', [
        'name' => 'UMKM Kripik Singkong',
        'category' => 'umkm',
        'latitude' => -6.4123,
        'longitude' => 107.6123,
        'photo' => $fakeImage,
    ]);

    $response->assertStatus(201)
        ->assertJsonPath('data.name', 'UMKM Kripik Singkong');

    $this->assertDatabaseHas('locations', [
        'name' => 'UMKM Kripik Singkong',
    ]);
});
