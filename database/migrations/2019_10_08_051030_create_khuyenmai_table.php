<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyenmai', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('km_id');
            $table->string('km_ten',50);
            $table->dateTime('km_ngayBatDau')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('km_ngayKetThuc')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedInteger('km_giaTri');
            $table->unsignedInteger('km_trangThai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khuyenmai');
    }
}
