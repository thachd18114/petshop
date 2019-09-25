<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThuCung extends Model
{
    public    $timestamps   = false;
    protected $table = 'thucung';
    protected $fillable = ['tc_ten','tc_giaBan', 'tc_tuoi', 'tc_gioiTinh','tc_canNang', 'tc_moTa', 'mauSac','tc_trangThaiTiemChung','tc_trangThai','g_id','ng_id'];
    protected $guarded = ['tc_id'];

    protected $primaryKey = 'tc_id';
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function Giong() {
        return $this->belongsTo('App\Giong', 'g_id', 'g_id');
    }
    public function NguonGoc() {
        return $this->belongsTo('App\NguonGoc', 'ng_id', 'ng_id');
    }
}
