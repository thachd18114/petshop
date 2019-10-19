<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauHoi extends Model
{
    public    $timestamps   = false;

    protected $table        = 'cauhoi';
    protected $fillable     = ['ch_id', 'kh_id', 'ch_noiDung', 'ch_thoiGian'];
    protected $guarded      = ['ch_id'];

    protected $primaryKey   = 'ch_id';

    protected $dates        = ['ch_thoiGian'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
