<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    public    $timestamps   = false;
    protected $table = 'quyen';
    protected $fillable = ['q_ten'];
    protected $guarded = ['q_id'];

    protected $primaryKey = 'q_id';

    public function NhanVien() {
        return $this->hasMany('App\NhanVien', 'q_id', 'q_id');
    }
}
