<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhThucThanhToan extends Model
{
    public    $timestamps   = false;
    protected $table        = 'hinhthucthanhtoan';
    protected $fillable     = ['httt_ten'];
    protected $guarded      = ['httt_id'];

    protected $primaryKey   = 'httt_id';

    public function DonHang() {
        return $this->hasMany('App\DonHang', 'httt_id', 'httt_id');
    }
}
