<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('homes_content', function (Blueprint $table) {
            $table->increments('id');
            $table->string('carousel');
            $table->string('caption_carousel');
            $table->string('video_url');
            $table->string('top_house');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes_content');
    }
};
