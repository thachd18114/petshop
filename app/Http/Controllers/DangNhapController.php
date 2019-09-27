<?php

namespace App\Http\Controllers;

use App\KhachHang;
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
        $kh = KhachHang::where('kh_taiKhoan',$request->kh_taiKhoan)->where('kh_matKhau',$request->kh_matKhau)->first();
        if ($kh) {
            $request->session()->put('tenDangNhap',$kh->kh_taiKhoan);
            $request->session()->put('id',$kh->kh_id);
            return redirect(route('frontend.home'));
        }
        else {
            return redirect()->back()->with('error','Sai tài khoản hoặc mật khẩu!');
        }
    }
}
