<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('dh_id');
            $table->unsignedBigInteger('tc_id');

            $table->primary(['dh_id', 'tc_id']);
            $table->foreign('dh_id')->references('dh_id')->on('donhang')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('tc_id')->references('tc_id')->on('thucung')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietdonhang');
    }
}
