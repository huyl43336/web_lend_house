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
        Schema::table('reply_comments', function (Blueprint $table) {
            $table->unsignedInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->unsignedInteger("house_id");
            $table->foreign("house_id")->references("id")->on("houses");
            $table->unsignedInteger("comment_id");
            $table->foreign("comment_id")->references("id")->on("comments");


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reply_comments', function (Blueprint $table) {
            //
        });
    }
};
