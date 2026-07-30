<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('tracking_code')->unique()->index();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('reporter_name');
            $table->string('reporter_phone')->nullable();
            $table->string('category')->index();
            $table->boolean('is_anonymous')->default(false);
            $table->string('status')->default('pending')->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
