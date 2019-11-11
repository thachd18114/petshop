<?php

namespace App\Http\Controllers;

use App\ChiTietKhuyenMai;
use App\KhuyenMai;
use App\ThuCung;
use Illuminate\Http\Request;
use Symfony\Component\Console\Helper\Table;

class ChiTietKhuyenMaiController extends Controller
{
    public function index ($id) {
        $km_id = KhuyenMai::where('km_id', $id)->first();
        return view('backend.khuyenmai.khuyenmai-thucung')->with('km_id',$km_id );
    }
    public function getData($id){
        $ds_kmtc = ChiTietKhuyenMai::join('thucung', 'thucung.tc_id','=', 'chitietkhuyenmai.tc_id')->where('km_id',$id)->get();
        return response()->json($ds_kmtc);
    }

    public function listthucung($id) {
        $ctkm = ChiTietKhuyenMai::where('km_id',$id)->get();
        $data=[];
        foreach ($ctkm as $ct) {
            $data[] = $ct->tc_id;
        }
        $ds_thucung = \DB::table('thucung')
            ->join('hinhanh','hinhanh.tc_id','=', 'thucung.tc_id')
            ->leftJoin('chitietkhuyenmai', 'thucung.tc_id', '=', 'chitietkhuyenmai.tc_id')
            ->leftjoin ('khuyenmai', 'khuyenmai.km_id', '=', 'chitietkhuyenmai.km_id')
            ->where('hinhanh.ha_id' ,'=', '1')
            ->whereNull('km_giaTri')
            ->whereNotIn('thucung.tc_id', $data )
            ->where('thucung.tc_trangThai', '=', 1)
            ->select('thucung.*', 'hinhanh.*')
            ->get();
        return response()->json($ds_thucung);
    }

    public function store(Request $request, $km) {
        foreach($request->items as $index){
            $ctkm = new ChiTietKhuyenMai();
            $ctkm->km_id = $km;
            $ctkm->tc_id = $index;
            $ctkm->save();
        }
    }

    public function detele ($km, $tc) {
        $ctkm = \DB::table('chitietkhuyenmai')->where('km_id', '=', $km)->where('tc_id','=', $tc)->delete();

    }

    public function detele_list (Request $request ,$km) {

        foreach($request->items as $index){
            $ctkm = ChiTietKhuyenMai::where('km_id',$km)->where('tc_id',$index)->delete();
        }
    }

}
