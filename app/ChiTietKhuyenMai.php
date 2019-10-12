<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietKhuyenMai extends Model
{
    public    $timestamps   = false;

    protected $table        = 'chitietkhuyenmai';
    protected $guarded      = ['km_id', 'tc_id'];

    protected $primaryKey   = ['km_id', 'tc_id'];
    public    $incrementing = false;
}
