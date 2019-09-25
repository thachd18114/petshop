<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('kh_id')->comment('Mã khách hàng');
            $table->string('kh_taiKhoan', 50)->comment('Tài khoản # Tài khoản');
            $table->string('kh_matKhau', 256)->comment('Mật khẩu # Mật khẩu');
            $table->string('kh_hoTen', 100)->comment('Họ tên # Họ tên');
            $table->unsignedTinyInteger('kh_gioiTinh')->default('1')->comment('Giới tính # Giới tính: 0-Nữ, 1-Nam, 2-Khác');
            $table->string('kh_email', 100)->comment('Email # Email');
            $table->dateTime('kh_ngaySinh')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Ngày sinh # Ngày sinh');
            $table->string('kh_diaChi', 250)->nullable()->default('NULL')->comment('Địa chỉ # Địa chỉ');
            $table->string('kh_dienThoai', 11)->nullable()->default('NULL')->comment('Điện thoại # Điện thoại');

            $table->unique(['kh_taiKhoan', 'kh_email', 'kh_dienThoai']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
}
