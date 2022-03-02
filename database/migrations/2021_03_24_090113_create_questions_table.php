<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('code',8);
            $table->string('title',50);
            $table->string('detail',1000);
            $table->string('remark',50);
            $table->unsignedBigInteger('section_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('section_id')
                ->references('id')
                ->on('sections')
                ->onDelete('cascade');
            $table->unique(['code','deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}