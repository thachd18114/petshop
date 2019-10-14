<?php

namespace App\Http\Controllers;

use App\BinhLuan;
use App\KhachHang;
use Illuminate\Http\Request;
use Session;

class BinhLuanController extends Controller
{
    public function index($tc_id){
        $bl = BinhLuan::where('tc_id',$tc_id)->get();
        return response()->json($bl);
    }

    public function store(Request $request ,$tc_id){
        if(Session::has('tenDangNhap')){
//            dd(Session::has('tenDangNhap'));
            $kh = KhachHang::where('kh_taiKhoan',$request->kh_taiKhoan)->first();
            $bl = new BinhLuan();
            $bl->tc_id = $tc_id;
            $bl->kh_id = $kh->kh_id;
            $bl->bl_noiDung = $request->noiDung;
            $bl->save();
        }
        else {
//            return view('frontend.pages.dangnhap');
        }

    }
}
