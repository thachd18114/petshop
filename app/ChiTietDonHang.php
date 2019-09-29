<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    public    $timestamps   = false;

    protected $table        = 'chitietdonhang';
    protected $guarded      = ['dh_id', 'tc_id'];

    protected $primaryKey   = ['dh_id', 'tc_id'];
    public    $incrementing = false;
}
