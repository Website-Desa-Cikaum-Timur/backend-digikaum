<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('family_id')->constrained('families')->cascadeOnDelete();
            $table->string('nik', 16)->unique()->index();
            $table->string('name');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->string('gender')->index();
            $table->string('religion')->default('ISLAM');
            $table->string('education_level')->nullable();
            $table->string('profession')->nullable();
            $table->string('blood_type', 3)->nullable();
            $table->string('marital_status')->index();
            $table->string('family_relation_status')->index();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
