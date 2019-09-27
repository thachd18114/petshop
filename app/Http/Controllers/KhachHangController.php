<?php

namespace App\Http\Controllers;

use App\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function index () {
        $ds_khachhang = KhachHang::all();
        return response()->json($ds_khachhang);
    }
    public function store(Request $request){
        $khachhang = new KhachHang();
        $khachhang->kh_hoTen = $request->kh_hoTen;
        $khachhang->kh_diaChi = $request->kh_diaChi;
        $khachhang->kh_dienThoai = $request->kh_dienThoai;
        $khachhang->kh_email = $request->kh_email;
        $khachhang->kh_taiKhoan = $request->kh_taiKhoan;
        $khachhang->kh_matKhau = $request->kh_matKhau;
        $khachhang->kh_gioiTinh = $request->kh_gioiTinh;
        $khachhang->kh_ngaySinh = $request->kh_ngaySinh;
        $khachhang->save();
    }

    public function edit($id){
        $khachhang  = KhachHang::where('kh_id',$id)->first();
        return response()->json($khachhang);
    }

    public function update(Request $request,$id){
        $khachhang  = khachhang::findOrfail($id);

        if($khachhang)
        {
            $khachhang->dh_nguoiNhan = $request->dh_nguoiNhan;
            $khachhang->dh_diaChi = $request->dh_diaChi;
            $khachhang->dh_dienThoai = $request->dh_dienThoai;
            $khachhang->kh_id = $request->kh_id;
            $khachhang->httt_id = $request->httt_id;
            $khachhang->save();
        }
        else
        {
            return response(["error" => true]);
        }
    }

    public function delete($id){
        $khachhang = KhachHang::findOrfail($id);
        $khachhang->delete();
    }
}
