<?php

namespace App\Http\Controllers;

use App\KhachHang;
use App\NhanVien;
use Illuminate\Http\Request;
use Session;

class DangNhapController extends Controller
{
    public function index() {
        return view('frontend.pages.dangnhap');
    }
    public function check(Request $request){
        if(Session::has('tenDangNhap')){
            Session::forget('tenDangNhap');
        }
        $kh = KhachHang::where('kh_taiKhoan',$request->kh_taiKhoan)->where('kh_matKhau',md5($request->kh_matKhau))->first();
        if ($kh) {
            $request->session()->put('tenDangNhap',$kh->kh_taiKhoan);
            $request->session()->put('id',$kh->kh_id);
            return redirect(route('frontend.home'));
        }
        else {
            return redirect()->back()->with('error','Sai tài khoản hoặc mật khẩu!');
        }
    }

    public function loginAdmin(Request $request){
        if(Session::has('tenDangNhapAD')){
            Session::forget('tenDangNhap');
        }
        if(Session::has('quyen')){
            Session::forget('quyen');
        }
        $tk = NhanVien::where('nv_taiKhoan',$request->nv_taiKhoan)->where('nv_matKhau',md5($request->nv_matKhau))->first();
        if ($tk) {
            $request->session()->put('tenDangNhapAD',$tk->nv_taiKhoan);
            $request->session()->put('quyen',$tk->q_id);
            return redirect(route('trangchu'));
        }
        else {
            return redirect()->back()->with('error','Sai tài khoản hoặc mật khẩu!');
        }
    }

    public function account() {
        if (Session::has('tenDangNhapAD')) {
            $tdn = Session::get('tenDangNhapAD');
            $tk = NhanVien::where('nv_taiKhoan', $tdn)->first();
            return view('backend.thongtin')->with('tk', $tk);
        } else {
            return view('backend.dangnhap');
        }
    }
    public function update_acount (Request $request)
    {
        if (Session::has('tenDangNhapAD')) {
            $nv_taiKhoan = Session::get('tenDangNhapAD');
            $data = NhanVien::where('nv_taiKhoan', $nv_taiKhoan)->first();
            $id = $data->nv_id;
            $nv = NhanVien::find($id);
            $nv->nv_hoTen = $request->nv_hoTen;
            $nv->nv_email = $request->nv_email;
            $nv->nv_ngaySinh = $request->nv_ngaySinh;
            $nv->nv_dienThoai = $request->nv_dienThoai;
            $nv->nv_diaChi = $request->nv_diaChi;
            $nv->nv_gioiTinh = $request->nv_gioiTinh;
            if ($request->nv_matKhau != ''){
                $nv->nv_matKhau = md5($request->nv_matKhau);
            }
            $nv->save();
            return redirect()->back()->with('success','Lưu thành công');
        }
        else {
            return view('frontend.pages.dangnhap');
        }
    }
}
