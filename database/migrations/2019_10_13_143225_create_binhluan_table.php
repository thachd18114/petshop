<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinhluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('bl_id');
            $table->unsignedBigInteger('kh_id');
            $table->unsignedBigInteger('tc_id');
            $table->text('bl_noiDung');
            $table->timestamp('bl_thoiGian')->default(DB::raw('current_timestamp'));

            $table->foreign('kh_id')->references('kh_id')->on('khachhang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tc_id')->references('tc_id')->on('thucung')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binhluan');
    }
}
