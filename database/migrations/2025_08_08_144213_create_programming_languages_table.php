<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('programming_languages', function (Blueprint $table) {
            $table->id();
             $table->string('title');
            $table->boolean('publish_status');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('programming_languages');
    }
};
