<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('cover_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->longText('link')->nullable();
            $table->longText('github_link')->nullable();
            $table->string('year');
            $table->longText('made_at')->nullable();
            $table->integer('built_with');
            $table->boolean('shown_on_main')->nullable();
            $table->boolean('shown_on_gallery')->nullable();
            $table->boolean('publish_status')->nullable();

            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('og_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
        $table->integer('built_with')->nullable();

    }
};
