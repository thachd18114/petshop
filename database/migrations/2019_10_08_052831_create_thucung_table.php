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
            $table->dateTime('tc_ngaySinh')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('tc_gioiTinh')->default('1');
            $table->string('tc_canNang', 20);
            $table->text('tc_moTa');
            $table->string('tc_mauSac', 20);
            $table->unsignedTinyInteger('tc_trangThaiTiemChung');
            $table->unsignedInteger('ncc_id');
            $table->unsignedInteger('g_id');
            $table->unsignedInteger('ng_id');
//            $table->unsignedInteger('km_id');
            $table->unsignedTinyInteger('tc_trangThai');

            $table->foreign('g_id')->references('g_id')->on('giong')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ng_id')->references('ng_id')->on('nguongoc')
                ->onDelete('cascade')->onUpdate('cascade');
//            $table->foreign('km_id')->references('km_id')->on('khuyenmai')
//                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ncc_id')->references('ncc_id')->on('nhacungcap')
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
