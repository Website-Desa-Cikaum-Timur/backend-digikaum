<?php

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
});

it('can fetch paginated published posts', function () {
    Post::factory()->count(15)->create(['status' => 'published']);
    Post::factory()->create(['status' => 'draft', 'title' => 'Rahasia Desa']);

    $response = $this->getJson('/api/v1/posts');

    $response->assertStatus(200)
        ->assertJsonCount(10, 'data')
        ->assertJsonMissing(['title' => 'Rahasia Desa']);
});

it('can create a post with cover image', function () {
    $user = User::factory()->create();
    $category = PostCategory::factory()->create();

    $fakeImage = UploadedFile::fake()->image('cover.jpg');

    $response = $this->actingAs($user)->postJson('/api/v1/posts', [
        'post_category_id' => $category->id,
        'title' => 'Peresmian Balai Desa Baru',
        'content' => 'Acara berlangsung meriah...',
        'status' => 'published',
        'published_at' => now()->toDateTimeString(),
        'cover_image' => $fakeImage,
    ]);

    $response->assertStatus(201)
        ->assertJsonPath('data.title', 'Peresmian Balai Desa Baru')
        ->assertJsonStructure(['data' => ['cover_image_url']]);

    $this->assertDatabaseHas('posts', [
        'title' => 'Peresmian Balai Desa Baru',
        'author_id' => $user->id,
    ]);
});

it('can delete a post and cascades media deletion', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create(['author_id' => $user->id]);

    $response = $this->actingAs($user)->deleteJson("/api/v1/posts/{$post->id}");

    $response->assertStatus(200);
    $this->assertDatabaseMissing('posts', ['id' => $post->id]);
});
