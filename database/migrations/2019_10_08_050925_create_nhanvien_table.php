<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('nv_id')->comment('Mã nhân viên');
            $table->string('nv_taiKhoan', 50)->comment('Tài khoản # Tài khoản');
            $table->string('nv_matKhau', 256)->comment('Mật khẩu # Mật khẩu');
            $table->string('nv_hoTen', 100)->comment('Họ tên # Họ tên');
            $table->unsignedTinyInteger('nv_gioiTinh')->default('1')->comment('Giới tính # Giới tính: 0-Nữ, 1-Nam, 2-Khác');
            $table->string('nv_email', 100)->comment('Email # Email');
            $table->dateTime('nv_ngaySinh')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Ngày sinh # Ngày sinh');
            $table->string('nv_diaChi', 250)->nullable()->default('NULL')->comment('Địa chỉ # Địa chỉ');
            $table->string('nv_dienThoai', 11)->nullable()->default('NULL')->comment('Điện thoại # Điện thoại');
            $table->unsignedInteger('q_id');

            $table->unique(['nv_taiKhoan', 'nv_email', 'nv_dienThoai']);
            $table->foreign('q_id')->references('q_id')->on('quyen')
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
        Schema::dropIfExists('nhanvien');
    }
}
