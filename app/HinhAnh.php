<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    public    $timestamps   = false;
    protected $table = 'hinhanh';
    protected $fillable = ['ha_ten'];
    protected $guarded = ['ha_id','tc_id'];

    protected $primaryKey = ['ha_id','tc_id'];

    public $incrementing = false;

}
