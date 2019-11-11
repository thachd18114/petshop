<?php

namespace App\Http\Controllers;

use App\ChiTietDonHang;
use App\DonHang;
use App\ThuCung;
use DB;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function index () {
        $ds_donhang = DonHang::join('hinhthucthanhtoan','hinhthucthanhtoan.httt_id','=', 'donhang.httt_id')
            ->join('khachhang', 'khachhang.kh_id', '=', 'donhang.kh_id')
            ->join('trangthaidonhang', 'trangthaidonhang.ttdh_id', 'donhang.ttdh_id')
            ->get();
        return response()->json($ds_donhang);
    }
    public function chitietdonhang ($id)
    {
//        $chitiet = ChiTietDonHang::join('thucung', 'thucung.tc_id', '=', 'chitietdonhang.tc_id')
//            ->join('giong', 'giong.g_id', '=', 'thucung.g_id')
//            ->select('giong.g_ten','thucung.tc_id', 'thucung.tc_ten', 'thucung.tc_giaBan', 'thucung.g_id')
//            ->where('chitietdonhang.dh_id', $id)->get();
        $date = now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $chitiet = DB::table('thucung')->join('giong', 'giong.g_id', '=', 'thucung.g_id')
            ->join('chitietdonhang', 'chitietdonhang.tc_id', '=', 'thucung.tc_id')
            ->join('hinhanh', 'hinhanh.tc_id', '=', 'thucung.tc_id')
            ->where('hinhanh.ha_id', '=', '1')
            ->join('loaithucung', 'loaithucung.ltc_id', '=', 'giong.ltc_id')
            ->leftJoin('chitietkhuyenmai', 'thucung.tc_id', '=', 'chitietkhuyenmai.tc_id')
            ->leftjoin('khuyenmai', 'khuyenmai.km_id', '=', 'chitietkhuyenmai.km_id')

            ->groupBy('thucung.tc_id', 'thucung.tc_ten', 'thucung.tc_giaBan', 'thucung.tc_ngaySinh',
                'thucung.tc_tuoi',
                'thucung.tc_trangThai', 'thucung.tc_trangThaiTiemChung', 'ng_id', 'g_id', 'g_ten',
                'thucung.tc_gioiTinh', 'thucung.tc_canNang',
                'thucung.tc_moTa', 'thucung.tc_mauSac', 'ncc_id', 'ha_ten', 'loaithucung.ltc_id',
                'loaithucung.ltc_ten', 'chitietdonhang.dh_id', 'km_ngayBatDau', 'km_ngayKetThuc')
            ->having('chitietdonhang.dh_id', $id)

            ->selectRaw('thucung.*, giong.g_ten, hinhanh.ha_ten,  loaithucung.*,max(`km_giaTri`) as giatri,chitietdonhang.dh_id,km_ngayBatDau,km_ngayKetThuc')
            ->get();
        //dd($chitiet);
        $tamtinh = 0;
        foreach ($chitiet as $ct) {
            if($ct->giatri != null && strtotime($ct->km_ngayBatDau) <= strtotime($date) && strtotime($ct->km_ngayKetThuc) >= strtotime($date) || strtotime($ct->km_ngayKetThuc) < strtotime($date)){
                $tamtinh += $ct->tc_giaBan - $ct->tc_giaBan * $ct->giatri / 100;
            }
            else{
                $tamtinh += $ct->tc_giaBan;
            }

        }
        return response()->json(compact('date', 'chitiet', 'tamtinh'));
    }
    public function store(Request $request){
        $donhang = new DonHang();
        $donhang->dh_nguoiNhan = $request->dh_nguoiNhan;
        $donhang->dh_diaChi = $request->dh_diaChi;
        $donhang->dh_dienThoai = $request->dh_dienThoai;
        $donhang->kh_id = $request->kh_id;
        $donhang->httt_id = $request->httt_id;
        $donhang->save();
    }

    public function edit($id){
        $donhang  = DonHang::where('dh_id',$id)->first();
        return response()->json($donhang);
    }

    public function update(Request $request,$id){
        $donhang  = DonHang::findOrfail($id);
        $thucung_id = DonHang::join('chitietdonhang', 'donhang.dh_id', '=', 'chitietdonhang.dh_id')->select('tc_id')->get();
        if($donhang)
        {
            if ($request->ttdh_id != 4){
//                $donhang->dh_nguoiNhan = $request->dh_nguoiNhan;
//                $donhang->dh_diaChi = $request->dh_diaChi;
//                $donhang->dh_dienThoai = $request->dh_dienThoai;
//                $donhang->kh_id = $request->kh_id;
//                $donhang->httt_id = $request->httt_id;
                $donhang->ttdh_id = $request->ttdh_id;
                $donhang->save();
            }
            else{
                $donhang->ttdh_id = $request->ttdh_id;
                $donhang->save();

                foreach ($thucung_id as $id){
                    $thucung = ThuCung::find($id->tc_id);
                    $thucung->tc_trangThai = 1;
                    $thucung->save();
                }
            }

        }
        else
        {
            return response(["error" => true]);
        }
    }

    public function delete($id)
    {
        if (\Session::get('quyen') == 1) {
            $donhang = DonHang::findOrfail($id);
            $donhang->delete();
        }
        else {
            return response(["error" => 'Bạn không có quyền xóa']);
        }
    }

}
