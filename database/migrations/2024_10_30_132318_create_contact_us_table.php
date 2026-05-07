<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('cover')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('phone')->nullable();
            $table->string('freelance')->nullable();
            $table->string('address')->nullable();
            $table->longText('slogan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
