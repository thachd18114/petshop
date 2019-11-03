<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    public    $timestamps   = false;
    protected $table        = 'nhanvien';
    protected $fillable     = ['nv_taiKhoan', 'nv_matKhau', 'nv_hoTen', 'nv_gioiTinh', 'nv_email', 'nv_ngaySinh', 'nv_diaChi', 'nv_dienThoai', 'q_id'];
    protected $guarded      = ['nv_id'];

    protected $primaryKey   = 'nv_id';

//    protected $dates        = ['nv_ngaySinh'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function Quyen() {
        return $this->belongsTo('App\Quyen', 'q_id', 'q_id');
    }
}
