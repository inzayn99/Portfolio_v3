<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('cover_image')->nullable();
            $table->string('title');
            $table->string('color')->nullable();
            $table->string('slug');
            $table->integer('blog_category');
            // $table->integer('blog_authors');
            $table->text('blog_type');
            $table->integer('page_visit')->default(1);
            $table->string('posted_by')->nullable();
            $table->integer('show_on_menu')->nullable();
            $table->longText('description')->nullable();
            $table->string('banner_image')->nullable();
            $table->boolean('publish_status')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('og_image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
