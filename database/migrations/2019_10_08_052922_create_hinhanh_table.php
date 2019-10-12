<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhanh', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->unsignedBigInteger('tc_id');
            $table->unsignedTinyInteger('ha_id')->default('1');
            $table->string('ha_ten',150);
            $table->primary(['tc_id', 'ha_id']);

            $table->foreign('tc_id')->references('tc_id')->on('thucung')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hinhanh');
    }
}
