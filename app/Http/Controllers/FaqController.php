<?php

namespace App\Http\Controllers;

use App\CauHoi;
use App\KhachHang;
use App\NhanVien;
use App\PhanHoi;
use Illuminate\Http\Request;
use Session;

class FaqController extends Controller
{
    public function index(){
        if(Session::has('tenDangNhapAD')){
            $id = KhachHang::where('kh_taiKhoan', Session::get('tenDangNhap'))->first();
            $ch = CauHoi::join('khachhang', 'khachhang.kh_id', '=', 'cauhoi.kh_id')->where('cauhoi.kh_id',$id->kh_id)
                ->orderBy('ch_thoiGian', 'desc')->limit(1)
                ->select('kh_taiKhoan','cauhoi.ch_id','khachhang.kh_id', 'ch_thoiGian', 'ch_noiDung')
                ->get();
            return response()->json($ch);
        }
    }
    public function getKh_id($id) {
        $kh_id = CauHoi::where('kh_id', $id)->first();
        return view('backend.faq.chitiet_faq')->with('kh_id',$kh_id );
    }


    public function faq_info ($id) {
//       date_default_timezone_set('Asia/Ho_Chi_Minh');
        $object = [] ;
      $data = [];
        $data_id = [];
      $cauhoi = \DB::table('cauhoi')->where('kh_id', $id)->get();
      foreach ($cauhoi as $ch ){
          $data[] = $ch->ch_thoiGian;
          $data_id[] = $ch->ch_id;
      }
        $phanhoi = \DB::table('phanhoi')->whereIn('ch_id', $data_id)->get();
        foreach ($phanhoi as $ph ){
            $data[] = $ph->ph_thoiGian;
        }

        for( $i = 0; $i < count($data) - 1; $i++){
            for($j = $i + 1; $j <  count($data) ; $j++){
                if($data[$i] < $data[$j]){
                    $t = $data[$i];
                    $data[$i] = $data[$j];
                    $data[$j] = $t;
                }
            }
    }
        $i = 0;
//        date_default_timezone_set("Asia/Ho_Chi_Minh");
        foreach ($data as $dt){
            $get_ch = CauHoi::join('khachhang', 'khachhang.kh_id', 'khachhang.kh_id')->where('ch_thoiGian', '=', $dt)->first();
            if($get_ch != null){
                    //                date('d-m-Y h:m:s', strtotime($get_ph->ph_thoiGian))
                    $object[$i] = [$get_ch->ch_noiDung,  date('d-m-Y h:m:s', strtotime($get_ch->ch_thoiGian)), $get_ch->kh_taiKhoan,1];

            }
            else if($get_ph = PhanHoi::join('nhanvien','nhanvien.nv_id', 'phanhoi.nv_id')->where('ph_thoiGian', $dt)->first()){
                $object[$i] = [$get_ph->ph_noiDung,  date('d-m-Y h:m:s', strtotime($get_ph->ph_thoiGian)) , $get_ph->nv_hoTen,2];
            }
            $i++;
//

        }
        return response()->json($object);
    }
    public function ftfaq_info () {
        if(Session::has('tenDangNhap')){
            $kh = KhachHang::where('kh_taiKhoan', Session::get('tenDangNhap'))->first();
            $id = $kh->kh_id;
//       date_default_timezone_set('Asia/Ho_Chi_Minh');
        $object = [] ;
        $data = [];
        $data_id = [];
        $cauhoi = \DB::table('cauhoi')->where('kh_id', $id)->get();
        foreach ($cauhoi as $ch ){
            $data[] = $ch->ch_thoiGian;
            $data_id[] = $ch->ch_id;
        }
        $phanhoi = \DB::table('phanhoi')->whereIn('ch_id', $data_id)->get();
        foreach ($phanhoi as $ph ){
            $data[] = $ph->ph_thoiGian;
        }

        for( $i = 0; $i < count($data) - 1; $i++){
            for($j = $i + 1; $j <  count($data) ; $j++){
                if($data[$i] > $data[$j]){
                    $t = $data[$i];
                    $data[$i] = $data[$j];
                    $data[$j] = $t;
                }
            }
        }
        $i = 0;
//        date_default_timezone_set("Asia/Ho_Chi_Minh");
        foreach ($data as $dt){
            $get_ch = CauHoi::join('khachhang', 'khachhang.kh_id', 'khachhang.kh_id')->where('ch_thoiGian', '=', $dt)->first();
            if($get_ch != null){
                //                date('d-m-Y h:m:s', strtotime($get_ph->ph_thoiGian))
                $object[$i] = [$get_ch->ch_noiDung,  date('d-m-Y h:m:s', strtotime($get_ch->ch_thoiGian)), $get_ch->kh_taiKhoan,1,$i];

            }
            else if($get_ph = PhanHoi::join('nhanvien','nhanvien.nv_id', 'phanhoi.nv_id')->where('ph_thoiGian', $dt)->first()){
                $object[$i] = [$get_ph->ph_noiDung,  date('d-m-Y h:m:s', strtotime($get_ph->ph_thoiGian)) , $get_ph->nv_hoTen,2, $i];
            }
            $i++;
//

        }
        return view('frontend.pages.faq')
            ->with('faq', $object)
            ->with('sl', $i);
        }
    }
    public function store_ch(Request $request){
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

    public function store_ph(Request $request){
        if(Session::has('tenDangNhapAD')){
            $id = CauHoi::all()->max('ch_id');
            $nv = NhanVien::where('nv_taiKhoan',Session::get('tenDangNhapAD'))->first();
//            dd($request->noiDung);
            $ph = new PhanHoi();
            $ph->nv_id = $nv->nv_id;
            $ph->ch_id = $id;
            $ph->ph_noiDung = $request->ph_noiDung;
            $ph->save();
        }
        else {
          //  return view('frontend.pages.dangnhap');
        }

    }
}
