<?php

namespace App\Http\Controllers;

use App\ThuCung;
use DB;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function Doanhthu() {
        $dt =  DB::select('SELECT year(dh_ngayTao) as nam, MONTH(dh_ngayTao) as thang,sum(dh_tongGia) as tien FROM donhang WHERE ttdh_id = 3 GROUP by nam , thang order by nam');
   return response()->json($dt);
    }

    public function thongkechung() {
        if (\Session::has('tenDangNhapAD')){

            $dh = DB::select('SELECT COUNT(*) as donhang FROM `donhang` WHERE ttdh_id = 1');
            $ltc = DB::select('SELECT COUNT(*) as loaithucung FROM `loaithucung`');
            $kh = DB::select('SELECT COUNT(*) as khachhang FROM `khachhang`');
            $tc = DB::select('SELECT COUNT(*) as thucung FROM `thucung` WHERE tc_trangThai = 1');
            $soluong = DB::select('SELECT COUNT(*) as soluong FROM `thucung` WHERE tc_trangThai = 1');
            $soluong_dh = DB::select('SELECT COUNT(*) as soluong FROM `donhang`');
            $soluong_loai = DB::table('thucung')->join('giong', 'giong.g_id', '=', 'thucung.g_id')
                ->rightJoin('loaithucung', 'loaithucung.ltc_id', '=', 'giong.ltc_id')
                    ->groupBy('loaithucung.ltc_id','loaithucung.ltc_ten', 'tc_trangThai')
                ->selectRaw('count(thucung.tc_id) as soluong,ltc_ten, tc_trangThai')
                ->get();
            $tl = DB::table('thucung')->join('giong', 'giong.g_id', '=', 'thucung.g_id')
                ->leftJoin('chitietdonhang','chitietdonhang.tc_id', '=',  'thucung.tc_id')
                ->leftJoin('donhang', 'donhang.dh_id', '=', 'chitietdonhang.dh_id')
                ->where('ttdh_id','=', '3')
//                ->orWhere('ttdh_id', '=', null)
                ->groupBy('giong.g_id', 'g_ten')
//            ->Having('ttdh_id','=', 3)
                ->selectRaw('count(donhang.dh_id) as soluong,g_ten')
                ->orderBy('soluong', 'desc')
                ->get();
//            dd($tl);
            return view('backend.dashboard')
                ->with('loaithucung', $ltc)
                ->with('khachhang', $kh)
                ->with('thucung', $tc)
                ->with('soluong_loai', $soluong_loai)
                ->with('soluong', $soluong)
                ->with('slban', $tl)
                ->with('soluong_dh', $soluong_dh)
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
        $tl = DB::table('thucung')->join('giong', 'giong.g_id', '=', 'thucung.g_id')
            ->leftJoin('chitietdonhang','chitietdonhang.tc_id', '=',  'thucung.tc_id')
            ->leftJoin('donhang', 'donhang.dh_id', '=', 'chitietdonhang.dh_id')

            ->groupBy('giong.g_id', 'g_ten')
//            ->Having('ttdh_id','=', 2)
            ->selectRaw('count(donhang.dh_id) as soluong,g_ten')
            ->get();

        return response()->json($tl);
    }
}

//(SELECT MAX(c) FROM
//(SELECT g_ten, MAX(c) FROM (SELECT g_ten, COUNT(donhang.dh_id) AS c FROM thucung JOIN giong on giong.g_id = thucung.g_id LEFT JOIN chitietdonhang on chitietdonhang.tc_id = thucung.tc_id LEFT join donhang on donhang.dh_id = chitietdonhang.dh_id GROUP BY giong.g_id) AS banchay)


//select ltc_ten, COUNT(thucung.tc_id) from loaithucung RIGHT JOIN giong on loaithucung.ltc_id = giong.g_id join thucung on giong.g_id = thucung.g_id LEFT JOIN chitietdonhang on chitietdonhang.tc_id = thucung.tc_id LEFT join donhang on donhang.dh_id = chitietdonhang.dh_id WHERE donhang.ttdh_id=1 GROUP BY loaithucung.ltc_id,donhang.ttdh_id