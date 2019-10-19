<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhanHoi extends Model
{
    public    $timestamps   = false;

    protected $table        = 'phanhoi';
    protected $fillable     = ['ph_id', 'nv_id', 'ph_noiDung', 'ph_thoiGian'];
    protected $guarded      = ['ph_id'];

    protected $primaryKey   = 'ph_id';

    protected $dates        = ['ph_thoiGian'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
