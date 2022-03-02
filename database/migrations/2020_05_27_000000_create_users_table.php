<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_admin');
            $table->boolean('is_viewed');
            $table->boolean('is_completed');
            $table->string('username',50);
            $table->string('email',50)->nullable();
            $table->string('school',50)->nullable();
            $table->string('password',100)->nullable();
            $table->string('confirmation_code',100)->nullable();
            $table->unsignedBigInteger('caso_id')->nullable();
            $table->unsignedBigInteger('college_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('caso_id')
                ->references('id')
                ->on('casos')
                ->onDelete('cascade');
            $table->foreign('college_id')
                ->references('id')
                ->on('colleges')
                ->onDelete('cascade');
            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers')
                ->onDelete('cascade');
            $table->unique(['username','deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
