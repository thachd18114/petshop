<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class DangXuatController extends Controller
{
    public function index (){
        if(Session::has('tenDangNhap')){
            Session::forget('tenDangNhap');
        }

        return redirect(route('frontend.home'));
    }

    public function logoutAd(){
        if(Session::has('tenDangNhap')){
            Session::forget('tenDangNhap');
        }
        if(Session::has('quyen')){
            Session::forget('quyen');
        }
        return redirect(route('dangnhap.ad'));
    }
}
