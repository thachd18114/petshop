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
            $ltc = DB::select('SELECT COUNT(*) as loaithucung FROM `loaithucung`');
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
        $tl = DB::table('thucung')->join('giong', 'giong.g_id', '=', 'thucung.g_id')
            ->rightJoin('loaithucung', 'loaithucung.ltc_id', '=', 'giong.ltc_id')
            ->groupBy('loaithucung.ltc_id','loaithucung.ltc_ten', 'tc_trangThai')
//
            ->selectRaw('count(thucung.tc_id) as soluong,ltc_ten, tc_trangThai')
        ->get();
        return response()->json($tl);
    }

    public function phantram_ban(){
        $tl = DB::select('select g_ten, COUNT(donhang.dh_id) as soluong, ttdh_id from loaithucung RIGHT JOIN giong on loaithucung.ltc_id = giong.g_id join thucung on giong.g_id = thucung.g_id LEFT JOIN chitietdonhang on chitietdonhang.tc_id = thucung.tc_id LEFT join donhang on donhang.dh_id = chitietdonhang.dh_id GROUP BY giong.g_id, g_ten,ttdh_id');
        return response()->json($tl);
    }
}


//select ltc_ten, COUNT(thucung.tc_id) from loaithucung RIGHT JOIN giong on loaithucung.ltc_id = giong.g_id join thucung on giong.g_id = thucung.g_id LEFT JOIN chitietdonhang on chitietdonhang.tc_id = thucung.tc_id LEFT join donhang on donhang.dh_id = chitietdonhang.dh_id WHERE donhang.ttdh_id=1 GROUP BY loaithucung.ltc_id,donhang.ttdh_id