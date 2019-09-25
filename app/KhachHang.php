<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    public    $timestamps   = false;
    protected $table        = 'khachhang';
    protected $fillable     = ['kh_taiKhoan', 'kh_matKhau', 'kh_hoTen', 'kh_gioiTinh', 'kh_email', 'kh_ngaySinh', 'kh_diaChi', 'kh_dienThoai'];
    protected $guarded      = ['kh_ma'];

    protected $primaryKey   = 'kh_ma';

    protected $dates        = ['kh_ngaySinh', 'kh_taoMoi', 'kh_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function DonHang() {
        return $this->hasMany('App\DonHang', 'kh_id', 'kh_id');
    }
}
