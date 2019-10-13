<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    public    $timestamps   = false;

    protected $table        = 'binhluan';
    protected $fillable     = ['tc_id', 'kh_id', 'bl_noiDung', 'bl_thoiGian'];
    protected $guarded      = ['bl_id'];

    protected $primaryKey   = 'bl_id';

    protected $dates        = ['bl_thoiGian'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
