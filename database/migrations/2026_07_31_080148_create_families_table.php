<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('families', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('kk_number', 16)->unique()->index();
            $table->string('head_of_family_name');
            $table->text('address');
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->string('postal_code', 5);
            $table->string('village')->default('Cikaum Timur');
            $table->string('district')->default('Cikaum');
            $table->string('city')->default('Subang');
            $table->string('province')->default('Jawa Barat');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
