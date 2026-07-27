<?php

use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

beforeEach(function () {
    Cache::flush();
});

it('can fetch all active categories', function () {
    PostCategory::factory()->count(3)->create(['is_active' => true]);
    PostCategory::factory()->create(['is_active' => false]);

    $response = $this->getJson('/api/v1/categories');

    $response->assertStatus(200)
        ->assertJsonStructure([
            'success',
            'message',
            'data' => [
                '*' => ['id', 'name', 'slug', 'description', 'is_active', 'created_at'],
            ],
        ])
        ->assertJsonCount(3, 'data');
});

it('can create a category and auto-generate slug', function () {
    $user = User::factory()->create();
    $payload = [
        'name' => 'Pengumuman Desa',
        'description' => 'Kategori untuk pengumuman resmi',
        'is_active' => true,
    ];

    $response = $this->actingAs($user)->postJson('/api/v1/categories', $payload);

    $response->assertStatus(201)
        ->assertJsonPath('data.name', 'Pengumuman Desa')
        ->assertJsonPath('data.slug', 'pengumuman-desa');

    $this->assertDatabaseHas('post_categories', [
        'name' => 'Pengumuman Desa',
        'slug' => 'pengumuman-desa',
    ]);
});

it('prevents unauthenticated users from creating category', function () {
    $response = $this->postJson('/api/v1/categories', [
        'name' => 'Hacker Attack',
    ]);

    $response->assertStatus(401);
});

it('can update a category and clear cache', function () {
    $user = User::factory()->create();
    $category = PostCategory::factory()->create(['name' => 'Berita Lama']);

    $response = $this->actingAs($user)->putJson("/api/v1/categories/{$category->id}", [
        'name' => 'Berita Baru Terkini',
    ]);

    $response->assertStatus(200)
        ->assertJsonPath('data.name', 'Berita Baru Terkini')
        ->assertJsonPath('data.slug', 'berita-baru-terkini');
});

it('can delete a category', function () {
    $user = User::factory()->create();
    $category = PostCategory::factory()->create();

    $response = $this->actingAs($user)->deleteJson("/api/v1/categories/{$category->id}");

    $response->assertStatus(200);
    $this->assertDatabaseMissing('post_categories', [
        'id' => $category->id,
    ]);
});
