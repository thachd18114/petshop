<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giong extends Model
{
    public    $timestamps   = false;
    protected $table = 'giong';
    protected $fillable = ['g_ten','ltc_id'];
    protected $guarded = ['g_id'];

    protected $primaryKey = 'g_id';

    public function LoaiThuCung() {
        return $this->belongsTo('App\LoaiThuCung', 'ltc_id', 'ltc_id');
    }
}
