<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name',50);
            $table->string('student_lastname',50);
            $table->string('student_email',50);
            $table->string('student_document',15);
            $table->string('student_mobile',11);
            $table->unsignedBigInteger('student_document_type_id');
            $table->unsignedBigInteger('student_college_id');
            $table->unsignedBigInteger('student_career_id');
            $table->unsignedBigInteger('student_cycle_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('student_document_type_id')
                ->references('id')
                ->on('document_types')
                ->onDelete('cascade');
            $table->foreign('student_college_id')
                ->references('id')
                ->on('colleges')
                ->onDelete('cascade');
            $table->foreign('student_career_id')
                ->references('id')
                ->on('careers')
                ->onDelete('cascade');
            $table->foreign('student_cycle_id')
                ->references('id')
                ->on('cycles')
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
        Schema::dropIfExists('students');
    }
}
