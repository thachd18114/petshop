<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhanhoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phanhoi', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('ph_id');
            $table->unsignedBigInteger('ch_id');
            $table->unsignedBigInteger('nv_id');
            $table->text('ph_noiDung');
            $table->timestamp('ph_thoiGian')->default(DB::raw('current_timestamp'));

            $table->foreign('ch_id')->references('ch_id')->on('cauhoi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nv_id')->references('nv_id')->on('nhanvien')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phanhoi');
    }
}
