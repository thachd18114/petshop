<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    public    $timestamps   = false;
    protected $table        = 'donhang';
    protected $fillable     = ['kh_id', 'dh_nguoiNhan', 'dh_diaChi', 'dh_dienThoai', 'dh_trangThai', 'httt_id'];
    protected $guarded      = ['dh_id'];

    protected $primaryKey   = 'dh_id';

    public function KhachHang() {
        return $this->belongsTo('App\KhachHang', 'kh_id', 'kh_id');
    }
    public function Httt() {
        return $this->belongsTo('App\HinhThucThanhToan', 'httt_id', 'Httt_id');
    }
}
