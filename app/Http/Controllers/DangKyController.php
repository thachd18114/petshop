<?php

namespace App\Http\Controllers;

use App\KhachHang;
use Illuminate\Http\Request;

class DangKyController extends Controller
{
    public function index() {
        return view('frontend.pages.dangky');
    }
    public function store (Request $request) {
        $kh = new KhachHang();
        $kh->kh_taiKhoan = $request->kh_taiKhoan;
        $kh->kh_matKhau = $request->kh_matKhau;
        $kh->kh_hoTen = $request->kh_hoTen;
        $kh->kh_ngaySinh = $request->kh_ngaySinh;
        $kh->kh_email = $request->kh_email;
        $kh->kh_diaChi = $request->kh_diaChi;
        $kh->kh_dienThoai = $request->kh_dienThoai;
        $kh->save();
        return redirect()->route('dangnhap');
    }
}
