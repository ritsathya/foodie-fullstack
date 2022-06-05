<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('title');
            $table->text('description');
            $table->text('image_url');
            $table->text('video_url')->nullable();
            $table->json('category_id');
            $table->json('flavours');
            $table->json('ingredients');
            $table->text('directions');
            $table->integer('preparation_time')->nullable();
            $table->integer('cooking_time')->nullable();
            $table->enum('skill_level',['easy','medium','hard'])->default('easy');
            $table->decimal('review', 2,1)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
