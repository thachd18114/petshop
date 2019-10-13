<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    public    $timestamps   = false;
    protected $table = 'nhacungcap';
    protected $fillable = ['ncc_ten','ncc_id'];
    protected $guarded = ['ncc_id'];

    protected $primaryKey = 'ncc_id';

    public function ThuCung() {
        return $this->hasMany('App\ThuCung', 'ncc_id', 'ncc_id');
    }
}
