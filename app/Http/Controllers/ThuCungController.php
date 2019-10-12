<?php
namespace App\Http\Controllers;
use App\HinhAnh;
use App\ThuCung;
use App\Giong;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Storage;
class ThuCungController extends Controller
{
    public function index () {
        $ds_thucung = ThuCung::join('nguongoc', 'nguongoc.ng_id', '=', 'thucung.ng_id')
            ->join('hinhanh','hinhanh.tc_id','=', 'thucung.tc_id')->where('hinhanh.ha_id' ,'=', '1')->get();
        return response()->json($ds_thucung);
    }

    public function store(Request $request)
    {
        $tc = new ThuCung();
        $tc->tc_ten = $request->tc_ten;
        $tc->tc_giaBan = $request->tc_giaBan;
        $tc->tc_tuoi = $request->tc_tuoi;
        $tc->tc_canNang = $request->tc_canNang;
        $tc->tc_gioiTinh = $request->tc_gioiTinh;
        $tc->tc_ngaySinh = $request->tc_ngaySinh;
        $tc->tc_moTa = $request->tc_moTa;
        $tc->tc_mauSac = $request->tc_mauSac;
        $tc->tc_trangThaiTiemChung = $request->tc_trangThaiTiemChung;
        $tc->tc_trangThai = $request->tc_trangThai;
        $tc->g_id = $request->g_id;
        $tc->ng_id = $request->ng_id;
        $tc->ncc_id = 1;
        $tc->save();
//        foreach ($request->ha_ten as $index => $file) {
////            $file->storeAs('public/photos', $file);
//            // Tạo đối tưọng HinhAnh
//
//            $hinhAnh = new HinhAnh();
//            $hinhAnh->tc_id = $tc->tc_id;
//            $hinhAnh->ha_id = ($index + 1);
//            $hinhAnh->ha_ten = $file;
//            $hinhAnh->save();
//        }
    }
    public function store_hinhanh (Request $request) {
        $id = ThuCung::all()->max('tc_id');
        if($request->hasFile('ha_ten')) {
            // $files = $request->ha_ten;
            // duyệt từng ảnh và thực hiện lưu
            foreach ($request->ha_ten as $index => $file) {
                $name = $id . '_' . $index . '_' . $file->getClientOriginalName();
                $file->storeAs('public/photos', $name);
                // Tạo đối tưọng HinhAnh
                $hinhAnh = new HinhAnh();
                $hinhAnh->tc_id = $id;
                $hinhAnh->ha_id = ($index + 1);
                $hinhAnh->ha_ten = $name;
                $hinhAnh->save();
            }
            return response(["error" => false, "message" => compact('hinhAnh')], 200);
        }
    }

//    public function store(Request $request)
//    {
//        $tc = new ThuCung();
//        $tc->tc_ten = $request->tc_ten;
//        $tc->tc_giaBan = $request->tc_giaBan;
//        $tc->tc_tuoi = $request->tc_tuoi;
//        $tc->tc_canNang = $request->tc_canNang;
//        $tc->tc_gioiTinh = $request->tc_gioiTinh;
//        $tc->tc_gioiTinh = $request->tc_gioiTinh;
//        $tc->tc_moTa = $request->input('tc_moTa');
//        $tc->tc_mauSac = $request->tc_mauSac;
//        $tc->tc_trangThaiTiemChung = $request->tc_trangThaiTiemChung;
//        $tc->tc_trangThai = 1;
//        $tc->g_id = $request->g_id;
//
//        $tc->save();
//
//        if($request->hasFile('ha_ten')) {
//            foreach ($request->ha_ten as $index => $file) {
//                $file->storeAs('public/photos', $file->getClientOriginalName());
//                $hinhAnh = new HinhAnh();
//                $hinhAnh->tc_id = $tc->tc_id;
//                $hinhAnh->ha_id = ($index + 1);
//                $hinhAnh->ha_ten = $file;
//                $hinhAnh->save();
//                // Tạo đối tưọng HinhAnh
//            }
//            return response(["error"=>false, "message"=>compact('file')], 200);
//
//        }
//
//    }
    public  function thucung_detail( $id) {
        $thucung_detail = ThuCung::where('tc_id',$id)->first();
        return response()->json($thucung_detail);
    }
    public function edit($id){
        $thucung  = ThuCung::where('tc_id',$id)->first();
        return response()->json($thucung);
    }
    public function update(Request $request,$id){
        $tc = ThuCung::where('tc_id',$id)->first();
        $tc->tc_ten = $request->tc_ten;
        $tc->tc_giaBan = $request->tc_giaBan;
        $tc->tc_tuoi = $request->tc_tuoi;
        $tc->tc_ngaySinh = $request->tc_ngaySinh;
        $tc->tc_canNang = $request->tc_canNang;
        $tc->tc_gioiTinh = $request->tc_gioiTinh;
        $tc->tc_moTa = $request->tc_moTa;
        $tc->tc_mauSac = $request->tc_mauSac;
        $tc->tc_trangThaiTiemChung = $request->tc_trangThaiTiemChung;
        $tc->tc_trangThai = $request->tc_trangThai;
        $tc->g_id = $request->g_id;
        $tc->ng_id = $request->ng_id;
        $tc->save();
    }
    public function update_hinhanh (Request $request,$id){
        if($request->hasFile('ha_ten')) {
            $ha1 = HinhAnh::where('tc_id',$id)->get();
            foreach($ha1 as $hinhanh)
            {
                // Xóa hình cũ để tránh rác
                Storage::delete('public/photos/' . $hinhanh->ha_ten);
            }
            $ha = HinhAnh::where('tc_id',$id)->delete();
            foreach ($request->ha_ten as $index => $file) {
                $name = $id.'_'.$index.'_'.$file->getClientOriginalName();
                $file->storeAs('public/photos', $name);
                // Tạo đối tưọng HinhAnh
                $hinhAnh = new HinhAnh();
                $hinhAnh->tc_id = $id;
                $hinhAnh->ha_id = ($index + 1);
                $hinhAnh->ha_ten = $name;
                $hinhAnh->save();
            }
            return response(["error"=>false, "message"=>compact('hinhanh')], 200);
        }
    }
    public function delete($id){
        $thucung = ThuCung::findOrfail($id);
        $thucung->delete();
    }
}