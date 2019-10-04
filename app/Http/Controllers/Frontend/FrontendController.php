<?php

namespace App\Http\Controllers\Frontend;

use App\ChiTietDonHang;
use App\DonHang;
use App\Giong;
use App\HinhAnh;
use App\HinhThucThanhToan;
use App\KhachHang;
use App\LoaiThuCung;
use App\ThuCung;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $danhsachthucung = $this->searchThuCung($request);
        $loaithucung = LoaiThuCung::all();

        return view('frontend.index')
            ->with('danhsachthucung', $danhsachthucung)
            ->with('loaithucung', $loaithucung);
    }

    public function  product (Request $request) {
        $danhsachthucung = $this->searchThuCung($request);
        $loaithucung = LoaiThuCung::all();
        return view('frontend.pages.product')
            ->with('danhsachthucung', $danhsachthucung)
            ->with('loaithucung', $loaithucung);
    }

    public function productDetail(Request $request, $id)
    {
        $thucung = DB::table('thucung')->join('giong','giong.g_id','=', 'thucung.g_id')
            ->join('hinhanh','hinhanh.tc_id','=', 'thucung.tc_id')->where('hinhanh.ha_id' ,'=', '1')->where('thucung.tc_id', $id)->first();
        // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
        $danhsachhinhanhlienquan = DB::table('hinhanh')
            ->where('tc_id', $id)
            ->get();
        $danhsachgiong = Giong::all();
        return view('frontend.pages.product-detail')
            ->with('tc', $thucung)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachgiong);
    }


    public function cart(Request $request)
    {
        return view('frontend.pages.shopping-cart');
    }
    public function choosecheckout() {
        $httt = HinhThucThanhToan::all();
        if(Session::has('tenDangNhap')){
            return view('frontend.pages.choose-checkout')->with('hinhthucthanhtoan', $httt);
        }
        else {
            return view('frontend.pages.dangnhap');
        }

    }
    public function order(Request $request)
    {
        if (Session::has('tenDangNhap')) {
            $taikhoan = Session::get('tenDangNhap');
            $kh = KhachHang::where('kh_taiKhoan',$taikhoan)->first();
            $donhang = new Donhang();
            $donhang->kh_id = $kh->kh_id;
            $donhang->dh_nguoiNhan = $request->donhang['dh_nguoiNhan'];
            $donhang->dh_diaChi = $request->donhang['dh_diaChi'];
            $donhang->dh_dienThoai = $request->donhang['dh_dienThoai'];
            $donhang->httt_id = $request->donhang['httt_id'];
            $donhang->ttdh_id = 1;
            $donhang->save();

            foreach($request->giohang['items'] as $sp)
            {
                $chitietdonhang = new ChiTietDonHang();
                $chitietdonhang->dh_id = $donhang->dh_id;
                $chitietdonhang->tc_id = $sp['_id'];
                $chitietdonhang->save();

                $thucung = ThuCung::find($sp['_id']);
                if($thucung->tc_trangThai == 2){
                    response('error', 'san pham co the da duoc mua');
                }
                else{
                    $thucung ->tc_trangThai = 2;
                }

        }



        }
        else {
            return view('frontend.pages.dangnhap');
        }
        return response(["error"=>false, "message"=>compact('donhang')], 200);
    }

        private function searchThuCung(Request $request)
    {
        $query = DB::table('thucung')->join('giong','giong.g_id','=', 'thucung.g_id')
            ->join('loaithucung','loaithucung.ltc_id','=', 'giong.ltc_id')
            ->join('hinhanh','hinhanh.tc_id','=', 'thucung.tc_id')->where('hinhanh.ha_id' ,'=', '1')
            ->select('*');
        // Kiểm tra điều kiện `searchByLoaiMa`
        $searchByGiongMa = $request->query('searchByGiongMa');
       // dd($query);
        if ($searchByGiongMa != null) { }

        $data = $query->get();
        return $data;
    }

    public function account() {
     //  $tk= KhachHang::all();
       return view('frontend.pages.account');
    }

}
