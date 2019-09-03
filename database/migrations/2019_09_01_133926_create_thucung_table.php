<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThucungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thucung', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->bigIncrements('tc_id');
            $table->string('tc_ten',50);
            $table->decimal('tc_giaBan', 10,0);
            $table->string('tc_tuoi', 50);
            $table->unsignedTinyInteger('tc_gioiTinh')->default('1');
            $table->float('tc_canNang');
            $table->text('tc_moTa');
            $table->string('tc_mauSac', 20);
            $table->unsignedTinyInteger('tc_trangThaiTiemChung');
            $table->unsignedTinyInteger('tc_trangThai');
            $table->unsignedInteger('g_id');

            $table->foreign('g_id')->references('g_id')->on('giong')
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
        Schema::dropIfExists('thucung');
    }
}
