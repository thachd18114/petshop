<?php

namespace App\Http\Controllers;

use App\NhanVien;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    public function index () {
        $ds_khachhang = NhanVien::all();
        return response()->json($ds_khachhang);
    }
    public function store(Request $request){

        $nhanvien = new NhanVien();
        $nhanvien->nv_taiKhoan = $request->nv_taiKhoan;
        $nhanvien->nv_hoTen = $request->nv_hoTen;
        $nhanvien->nv_matKhau = $request->nv_matKhau;
        $nhanvien->nv_gioiTinh = $request->nv_gioiTinh;
        $nhanvien->nv_ngaySinh = $request->nv_ngaySinh;
        $nhanvien->nv_email = $request->nv_email;
        $nhanvien->nv_diaChi = $request->nv_diaChi;
        $nhanvien->nv_dienThoai = $request->nv_dienThoai;
        $nhanvien->q_id = $request->q_id;
        $nhanvien->save();
    }

    public function edit($id){
        $nhanvien  = NhanVien::where('nv_id',$id)->first();
        return response()->json($nhanvien);
    }

    public function update(Request $request,$id){
        $nhanvien  = NhanVien::findOrfail($id);

        if($nhanvien)
        {
            if($request->nv_matKhau == ''){

                $nhanvien->nv_taiKhoan = $request->nv_taiKhoan;
                $nhanvien->nv_hoTen = $request->nv_hoTen;
                $nhanvien->nv_gioiTinh = $request->nv_gioiTinh;
                $nhanvien->nv_ngaySinh = $request->nv_ngaySinh;
                $nhanvien->nv_email = $request->nv_email;
                $nhanvien->nv_diaChi = $request->nv_diaChi;
                $nhanvien->nv_dienThoai = $request->nv_dienThoai;
                $nhanvien->q_id = $request->q_id;
                $nhanvien->save();
            }else {
                $nhanvien->nv_taiKhoan = $request->nv_taiKhoan;
                $nhanvien->nv_hoTen = $request->nv_hoTen;
                $nhanvien->nv_matKhau = $request->nv_matKhau;
                $nhanvien->nv_gioiTinh = $request->nv_gioiTinh;
                $nhanvien->nv_ngaySinh = $request->nv_ngaySinh;
                $nhanvien->nv_email = $request->nv_email;
                $nhanvien->nv_diaChi = $request->nv_diaChi;
                $nhanvien->nv_dienThoai = $request->nv_dienThoai;
                $nhanvien->q_id = $request->q_id;
                $nhanvien->save();
            }

        }
    }

    public function delete($id){
        if (\Session::get('quyen') ==1) {
            $nhanvien = NhanVien::findOrfail($id);
            $nhanvien->delete();
        }
        else {
            return response(["error" => 'Bạn không có quyền xóa']);
        }
    }
}
