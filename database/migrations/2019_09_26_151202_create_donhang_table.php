<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('dh_id');
            $table->unsignedBigInteger('kh_id');
            $table->string('dh_nguoiNhan', 100);
            $table->string('dh_diaChi', 100);
            $table->string('dh_dienThoai', 100);
            $table->unsignedInteger('httt_id');
            $table->unsignedInteger('ttdh_id');

            $table->foreign('kh_id')->references('kh_id')->on('khachhang')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('httt_id')->references('httt_id')->on('hinhthucthanhtoan')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('ttdh_id')->references('ttdh_id')->on('trangthaidonhang')->onDelete('CASCADE')->onUpdate('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donhang');
    }
}
