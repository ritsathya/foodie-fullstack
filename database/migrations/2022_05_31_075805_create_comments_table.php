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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->foreignId('comment_id')->nullable()->constrained()->onDelete('cascade');
            // $table->unsignedBigInteger('replied_to_id')->nullable();
            // $table->foreignId('replied_to_id')->references('id')->on('comments');
            $table->string('body');
            $table->boolean('isLike')->default(0);
            $table->enum('status', array('new', 'edited'))->default('new');
            $table->timestamps();
        });

        // Schema::table('comments', function (Blueprint $table) {
        //     $table->foreignId('replied_to_id')->references('id')->on('comments');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
