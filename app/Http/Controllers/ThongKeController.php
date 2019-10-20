<?php

namespace App\Http\Controllers;

use App\ThuCung;
use DB;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function Doanhthu() {
        $dt =  DB::select('SELECT year(dh_ngayTao) as nam, MONTH(dh_ngayTao) as thang,sum(dh_tongGia) as tien FROM donhang GROUP by nam asc, thang asc');
   return response()->json($dt);
    }

    public function thongkechung() {
        if (\Session::has('tenDangNhapAD')){

            $dh = DB::select('SELECT COUNT(*) as donhang FROM `donhang` WHERE ttdh_id = 1');
            $ltc = DB::select('SELECT COUNT(*) as loaithucung FROM `thucung`');
            $kh = DB::select('SELECT COUNT(*) as khachhang FROM `khachhang`');
            $tc = DB::select('SELECT COUNT(*) as thucung FROM `thucung` WHERE tc_trangThai = 1');
            $soluong = DB::select('SELECT COUNT(*) as soluong FROM `thucung`');
            return view('backend.dashboard')
                ->with('loaithucung', $ltc)
                ->with('khachhang', $kh)
                ->with('thucung', $tc)
                ->with('soluong', $soluong)
                ->with('donhang', $dh);
        }
        else return view('backend.dangnhap');

    }
    public function phantram(){
        $data = [];

        $tl = DB::select('select ltc_ten,count(thucung.tc_id) as soluong from thucung join giong on thucung.g_id = giong.g_id RIGHT JOIN loaithucung on giong.ltc_id = loaithucung.ltc_id GROUP By loaithucung.ltc_id, ltc_ten');
//       foreach ($tl as $pt){
//          // $data =
//       }
        return response()->json($tl);
    }
}
