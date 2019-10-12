<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    public    $timestamps   = false;
    protected $table = 'khuyenmai';
    protected $fillable = ['km_ten','kh_ngayBatDau', 'kh_ngayKetThuc'];
    protected $guarded = ['km_id'];

    protected $primaryKey = 'km_id';
    protected $dateFormat   = 'Y-m-d H:i:s';
    public function ThuCung() {
        return $this->hasMany('App\ThuCung', 'km_id', 'km_id');
    }
}
