<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCauhoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cauhoi', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('ch_id');
            $table->unsignedBigInteger('kh_id');
            $table->text('ch_noiDung');
            $table->timestamp('ch_thoiGian')->default(DB::raw('current_timestamp'));

            $table->foreign('kh_id')->references('kh_id')->on('khachhang')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cauhoi');
    }
}
