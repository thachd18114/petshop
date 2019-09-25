<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguonGoc extends Model
{
    public    $timestamps   = false;
    protected $table = 'nguongoc';
    protected $fillable = ['ng_ten'];
    protected $guarded = ['ng_id'];

    protected $primaryKey = 'ng_id';

    public function ThuCung() {
        return $this->hasMany('App\ThuCung', 'ng_id', 'ng_id');
    }
}
