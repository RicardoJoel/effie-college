<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_name',50);
            $table->string('teacher_lastname',50);
            $table->string('teacher_email',50);
            $table->string('teacher_document',15);
            $table->string('teacher_mobile',11);
            $table->string('teacher_profession',50);
            $table->unsignedBigInteger('teacher_document_type_id');
            $table->unsignedBigInteger('teacher_college_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('teacher_document_type_id')
                ->references('id')
                ->on('document_types')
                ->onDelete('cascade');
            $table->foreign('teacher_college_id')
                ->references('id')
                ->on('colleges')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
