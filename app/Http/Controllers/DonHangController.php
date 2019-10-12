<?php

namespace App\Http\Controllers;

use App\ChiTietDonHang;
use App\DonHang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function index () {
        $ds_donhang = DonHang::join('hinhthucthanhtoan','hinhthucthanhtoan.httt_id','=', 'donhang.httt_id')->get();
        return response()->json($ds_donhang);
    }
    public function chitietdonhang ($id)
    {
        $chitiet = ChiTietDonHang::join('thucung', 'thucung.tc_id', '=', 'chitietdonhang.tc_id')
            ->join('giong', 'giong.g_id', '=', 'thucung.g_id')->select('giong.g_ten','thucung.tc_id', 'thucung.tc_ten', 'thucung.tc_giaBan', 'thucung.g_id')->where('chitietdonhang.dh_id', $id)->get();
        return response()->json($chitiet);
    }
    public function store(Request $request){
        $donhang = new DonHang();
        $donhang->dh_nguoiNhan = $request->dh_nguoiNhan;
        $donhang->dh_diaChi = $request->dh_diaChi;
        $donhang->dh_dienThoai = $request->dh_dienThoai;
        $donhang->kh_id = $request->kh_id;
        $donhang->httt_id = $request->httt_id;
        $donhang->save();
    }

    public function edit($id){
        $donhang  = DonHang::where('dh_id',$id)->first();
        return response()->json($donhang);
    }

    public function update(Request $request,$id){
        $donhang  = DonHang::findOrfail($id);

        if($donhang)
        {
            $donhang->dh_nguoiNhan = $request->dh_nguoiNhan;
            $donhang->dh_diaChi = $request->dh_diaChi;
            $donhang->dh_dienThoai = $request->dh_dienThoai;
            $donhang->kh_id = $request->kh_id;
            $donhang->httt_id = $request->httt_id;
            $donhang->save();
        }
        else
        {
            return response(["error" => true]);
        }
    }

    public function delete($id){
        $donhang = DonHang::findOrfail($id);
        $donhang->delete();
    }
}
