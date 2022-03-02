<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('edition_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('description',1000);
            $table->string('brief',50);
            $table->string('audio',50);
            $table->string('visual',50);
            $table->string('whole',50);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('edition_id')
                ->references('id')
                ->on('editions')
                ->onDelete('cascade');
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');
            $table->unique(['edition_id','brand_id','deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casos');
    }
}
