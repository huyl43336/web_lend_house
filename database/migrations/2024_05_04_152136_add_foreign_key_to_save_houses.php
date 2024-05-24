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
        Schema::table('save_houses', function (Blueprint $table) {
            $table->unsignedInteger('house_id');
            $table->unsignedInteger('user_id');
            $table->foreign('house_id')->references('id')->on('houses');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('save_houses', function (Blueprint $table) {
            //
        });
    }
};
