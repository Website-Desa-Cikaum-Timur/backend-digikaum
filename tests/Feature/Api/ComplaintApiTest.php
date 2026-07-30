<?php

use App\Models\Complaint;
use App\Models\User;
use App\Shared\Enums\ComplaintStatus;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('public');
});

it('allows public to submit a complaint and receive a tracking code', function () {
    $fakeImage = UploadedFile::fake()->image('jalan_rusak.jpg');

    $response = $this->postJson('/api/v1/complaints', [
        'title' => 'Jalan Berlubang di RT 01',
        'content' => 'Sangat bahaya kalau malam.',
        'reporter_name' => 'Budi Santoso',
        'category' => 'infrastruktur',
        'is_anonymous' => false,
        'evidence' => $fakeImage,
    ]);

    $response->assertStatus(201)
        ->assertJsonPath('success', true)
        ->assertJsonStructure(['data' => ['tracking_code']]);

    $this->assertDatabaseHas('complaints', [
        'title' => 'Jalan Berlubang di RT 01',
        'reporter_name' => 'Budi Santoso',
        'status' => ComplaintStatus::Pending->value,
    ]);
});

it('masks reporter identity when tracking an anonymous complaint', function () {
    $complaint = Complaint::factory()->create([
        'reporter_name' => 'Siti Rahma',
        'reporter_phone' => '08123456789',
        'is_anonymous' => true,
    ]);

    $response = $this->getJson("/api/v1/complaints/track/{$complaint->tracking_code}");

    $response->assertStatus(200)
        ->assertJsonPath('data.reporter_name', 'Anonim (Disembunyikan)')
        ->assertJsonMissing(['reporter_phone' => '08123456789']);
});

it('prevents updating status of a resolved complaint (State Machine Guard)', function () {
    $admin = User::factory()->create();

    $complaint = Complaint::factory()->create([
        'status' => ComplaintStatus::Resolved->value,
    ]);

    $response = $this->actingAs($admin)->patchJson("/api/v1/complaints/{$complaint->id}/status", [
        'status' => ComplaintStatus::Processing->value,
    ]);

    $response->assertStatus(422)
        ->assertJsonPath('message', 'Aduan yang sudah Selesai atau Ditolak tidak dapat diubah statusnya.');

    $this->assertDatabaseHas('complaints', [
        'id' => $complaint->id,
        'status' => ComplaintStatus::Resolved->value,
    ]);
});
