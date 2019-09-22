<?php

namespace App\Http\Controllers\Frontend;

use App\Giong;
use App\HinhAnh;
use App\LoaiThuCung;
use App\ThuCung;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
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
        $danhsachhinhanh = DB::table('hinhanh')
            ->whereIn('tc_id', $danhsachthucung->pluck('tc_id')->toArray())
            ->get();
        return view('frontend.pages.product')
            ->with('danhsachthucung', $danhsachthucung)
            ->with('danhsachhinhanh', $danhsachhinhanh)
            ->with('loaithucung', $loaithucung);
    }

    public function productDetail(Request $request, $id)
    {
        $thucung = ThuCung::join('giong', 'giong.g_id', '=', 'thucung.g_id')->where('tc_id', $id)->first();
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

//        $danhsachphuongthucthanhtoan = Thanhtoan::all();

        return view('frontend.pages.shopping-cart');

    }

        private function searchThuCung(Request $request)
    {
        $query = DB::table('thucung')->join('giong','giong.g_id','=', 'thucung.g_id')
            ->join('loaithucung','loaithucung.ltc_id','=', 'giong.ltc_id')
            ->select('*');
        // Kiểm tra điều kiện `searchByLoaiMa`
        $searchByGiongMa = $request->query('searchByGiongMa');
       // dd($query);
        if ($searchByGiongMa != null) { }

        $data = $query->get();
        return $data;
    }
}
