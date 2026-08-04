<?php

use App\Models\Gallery;
use App\Models\User;
use App\Shared\Enums\GalleryCategory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
});

it('can fetch available years dynamically', function () {
    Gallery::factory()->create(['year' => 2023]);
    Gallery::factory()->create(['year' => 2024]);
    Gallery::factory()->create(['year' => 2024]);

    $response = $this->getJson('/api/v1/galleries/years');

    $response->assertStatus(200)
        ->assertJsonPath('data', [2024, 2023]);
});

it('can upload a new gallery photo', function () {
    $user = User::factory()->create();
    $fakeImage = UploadedFile::fake()->image('lomba.jpg');

    $response = $this->actingAs($user)->postJson('/api/v1/galleries', [
        'title' => 'Lomba 17 Agustus',
        'category' => GalleryCategory::Kegiatan->value,
        'year' => 2024,
        'image' => $fakeImage,
    ]);

    $response->assertStatus(201)
        ->assertJsonPath('data.title', 'Lomba 17 Agustus');
});
