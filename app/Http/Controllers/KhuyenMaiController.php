<?php

namespace App\Http\Controllers;

use App\KhuyenMai;
use Illuminate\Http\Request;

class KhuyenMaiController extends Controller
{
    public function index () {
        $ds_km = KhuyenMai::all();
        return response()->json($ds_km);
    }
    public function store(Request $request){
        $khuyenmai = new KhuyenMai();
        $khuyenmai->km_ten = $request->km_ten;
        $khuyenmai->km_giaTri = $request->km_giaTri;
        $khuyenmai->km_ngayBatDau = $request->km_ngayBatDau;
        $khuyenmai->km_ngayKetThuc = $request->km_ngayKetThuc;
        $khuyenmai->km_trangThai = 1;
        $khuyenmai->save();
    }

    public function edit($id){
        $khuyenmai  = KhuyenMai::where('km_id',$id)->first();
        return response()->json($khuyenmai);
    }

    public function update(Request $request,$id){
        $khuyenmai  = KhuyenMai::findOrfail($id);

        if($khuyenmai)
        {
            $khuyenmai->km_ten = $request->km_ten;
            $khuyenmai->save();
        }
        else
        {
            return response(["error" => true]);
        }
    }

    public function delete($id){
        $khuyenmai = KhuyenMai::findOrfail($id);
        $khuyenmai->delete();
    }
}
