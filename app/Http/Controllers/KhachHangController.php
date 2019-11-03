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
        $khachhang->kh_matKhau = md5($request->kh_matKhau);
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
            if($request->kh_matKhau == ''){

                $khachhang->kh_taiKhoan = $request->kh_taiKhoan;
                $khachhang->kh_hoTen = $request->kh_hoTen;
                $khachhang->kh_gioiTinh = $request->kh_gioiTinh;
                $khachhang->kh_ngaySinh = $request->kh_ngaySinh;
                $khachhang->kh_email = $request->kh_email;
                $khachhang->kh_diaChi = $request->kh_diaChi;
                $khachhang->kh_dienThoai = $request->kh_dienThoai;
                $khachhang->save();
            }else {
                $khachhang->kh_taiKhoan = $request->kh_taiKhoan;
                $khachhang->kh_matKhau = md5($request->kh_matKhau);
                $khachhang->kh_hoTen = $request->kh_hoTen;
                $khachhang->kh_gioiTinh = $request->kh_gioiTinh;
                $khachhang->kh_ngaySinh = $request->kh_ngaySinh;
                $khachhang->kh_email = $request->kh_email;
                $khachhang->kh_diaChi = $request->kh_diaChi;
                $khachhang->kh_dienThoai = $request->kh_dienThoai;
                $khachhang->save();
            }

        }
    }

    public function delete($id){
        if (\Session::get('quyen') ==1) {
            $khachhang = KhachHang::findOrfail($id);
            $khachhang->delete();
        }
        else {
            return response(["error" => 'Bạn không có quyền xóa']);
        }
    }
}
