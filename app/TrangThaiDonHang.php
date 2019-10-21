<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrangThaiDonHang extends Model
{
    public    $timestamps   = false;
    protected $table = 'trangthaidonhang';
    protected $fillable = ['ttdh_ten'];
    protected $guarded = ['ttdh_id'];

    protected $primaryKey = 'ttdh_id';

    public function DongHang() {
        return $this->hasMany('App\DongHang', 'ttdh_id', 'ttdh_id');
    }
}
