<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category')->index();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->geometry('geom', subtype: 'point', srid: 4326);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->spatialIndex('geom');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
