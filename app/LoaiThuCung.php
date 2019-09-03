<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiThuCung extends Model
{
    public    $timestamps   = false;
    protected $table = 'loaithucung';
    protected $fillable = ['ltc_ten'];
    protected $guarded = ['ltc_id'];

    protected $primaryKey = 'ltc_id';

    public function Giong() {
        return $this->hasMany('App\Giong', 'ltc_id', 'ltc_id');
    }
}
