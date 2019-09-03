<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giong', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('g_id');
            $table->string('g_ten',50);
            $table->unsignedInteger('ltc_id');

            $table->foreign('ltc_id')->references('ltc_id')->on('loaithucung')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giong');
    }
}
