<?php

use App\Models\Product;
use App\Models\User;
use App\Shared\Enums\ProductCategory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
});

it('can fetch public products with formatted price', function () {
    Product::factory()->create([
        'name' => 'Keripik Pisang',
        'price' => 15000,
        'category' => ProductCategory::Kuliner->value,
    ]);

    $response = $this->getJson('/api/v1/products');

    $response->assertStatus(200)
        ->assertJsonPath('data.0.name', 'Keripik Pisang')
        ->assertJsonPath('data.0.formatted_price', 'Rp 15.000')
        ->assertJsonPath('data.0.category', ProductCategory::Kuliner->value);
});

it('can search products by name or owner', function () {
    Product::factory()->create(['name' => 'Madu Murni', 'owner_name' => 'Pak Lebah']);
    Product::factory()->create(['name' => 'Kopi Robusta', 'owner_name' => 'Kang Ngopi']);

    $response = $this->getJson('/api/v1/products?search=Lebah');

    $response->assertStatus(200)
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.name', 'Madu Murni');
});

it('can upload a new product securely', function () {
    $user = User::factory()->create();
    $fakeImage = UploadedFile::fake()->image('produk.jpg');

    $response = $this->actingAs($user)->postJson('/api/v1/products', [
        'name' => 'Sate Maranggi',
        'category' => ProductCategory::Kuliner->value,
        'owner_name' => 'Mang Sate',
        'price' => 25000,
        'image' => $fakeImage,
    ]);

    $response->assertStatus(201)
        ->assertJsonPath('data.name', 'Sate Maranggi')
        ->assertJsonStructure(['data' => ['image_url']]);

    $this->assertDatabaseHas('products', ['name' => 'Sate Maranggi']);
});
