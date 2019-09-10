<?php

namespace App\Http\Controllers;

use App\ThuCung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ThuCungController extends Controller
{
    public function index () {
        $ds_thucung = ThuCung::all();
        return response()->json($ds_thucung);
    }
    public function store(Request $request)
    {

        $tc = new ThuCung();
        $tc->tc_ten = $request->tc_ten;
        $tc->tc_giaBan = $request->tc_giaBan;
        $tc->tc_tuoi = $request->tc_tuoi;
        $tc->tc_canNang = $request->tc_canNang;
//        $tc->tc_gioiTinh = $request->tc_gioiTinh;
        $tc->tc_gioiTinh = $request->tc_gioiTinh;
        $tc->tc_moTa = $request->tc_moTa;
        $tc->tc_mauSac = $request->tc_mauSac;
        $tc->tc_trangThaiTiemChung = $request->tc_trangThaiTiemChung;
        $tc->tc_trangThai = $request->tc_trangThai;
        $tc->g_id = $request->g_id;
       // $tc->save();

//        if($request->hasFile('ha_ten')) {
//            $files = $request->ha_ten;
//            // duyệt từng ảnh và thực hiện lưu
//            foreach ($request->ha_ten as $index => $file) {
//
//                $file->storeAs('public/photos', $file->getClientOriginalName());
//                // Tạo đối tưọng HinhAnh
//                $hinhAnh = new HinhAnh();
//                $hinhAnh->sp_ma = $sp->sp_ma;
//                $hinhAnh->ha_stt = ($index + 1);
//                $hinhAnh->ha_ten = $file->getClientOriginalName();
//                $hinhAnh->save();
//            }
//        }
    }
}
