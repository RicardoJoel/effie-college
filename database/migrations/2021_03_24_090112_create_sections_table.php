<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('edition_id');
            $table->string('code',6);
            $table->string('title',100);
            $table->string('description',1000);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('edition_id')
                ->references('id')
                ->on('editions')
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
        Schema::dropIfExists('sections');
    }
}