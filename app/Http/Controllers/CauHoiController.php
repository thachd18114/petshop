<?php

namespace App\Http\Controllers;

use App\CauHoi;
use App\KhachHang;
use Illuminate\Http\Request;
use Session;

class CauHoiController extends Controller
{

    public function index(){
        if(Session::has('tenDangNhap')){
            $id = KhachHang::where('kh_taiKhoan', Session::get('tenDangNhap'))->first();
            $bl = Faq::where('kh_id',$id->kh_id)->get();
            return response()->json($bl);
        }
    }


    public function store(Request $request){
        if(Session::has('tenDangNhap')){
            $kh = KhachHang::where('kh_taiKhoan',$request->kh_taiKhoan)->first();
//            dd($request->noiDung);
            $ch = new CauHoi();
            $ch->kh_id = $kh->kh_id;
            $ch->ch_noiDung = $request->noiDung;
            $ch->save();
        }
        else {
            return view('frontend.pages.dangnhap');
        }

    }
}
