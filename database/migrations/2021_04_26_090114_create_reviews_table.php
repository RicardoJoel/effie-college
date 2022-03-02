<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('score1');
            $table->integer('score2');
            $table->integer('score3');
            $table->integer('score4');
            $table->string('feedback',500)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('jury_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('jury_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unique(['user_id','jury_id','deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}