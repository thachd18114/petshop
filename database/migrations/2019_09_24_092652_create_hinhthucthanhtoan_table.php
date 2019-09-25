<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhthucthanhtoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhthucthanhtoan', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('httt_id');
            $table->string('httt_ten', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hinhthucthanhtoan');
    }
}
