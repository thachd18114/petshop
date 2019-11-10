<?php

namespace App\Http\Controllers\Frontend;

use App\BinhLuan;
use App\ChiTietDonHang;
use App\ChiTietKhuyenMai;
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
//        dd($danhsachthucung);
        $date = now('Asia/Ho_Chi_Minh')->format('Y-m-d');
//        dd($hot);
        $hot = DB::table('thucung')->join('giong', 'giong.g_id', '=', 'thucung.g_id')
            ->leftJoin('chitietdonhang', 'chitietdonhang.tc_id', '=', 'thucung.tc_id')
            ->leftJoin('donhang', 'donhang.dh_id', '=', 'chitietdonhang.dh_id')
            ->where('ttdh_id','=', '3')
            ->groupBy('giong.g_id')
            ->selectRaw('count(donhang.dh_id) as soluong,giong.g_id as id')
            ->orderBy('soluong', 'desc')
            ->limit(1)
            ->get();
//        dd($hot);
        foreach ($hot as $hot1) {
            $id = $hot1->id;
        }
        $loaithucung = LoaiThuCung::all();
        return view('frontend.index')
            ->with('danhsachthucung', $danhsachthucung)
            ->with('loaithucung', $loaithucung)
            ->with('hot', $id)
            ->with('date', $date);
    }

    public function product(Request $request)
    {
        $hot = DB::table('thucung')->join('giong', 'giong.g_id', '=', 'thucung.g_id')
            ->leftJoin('chitietdonhang', 'chitietdonhang.tc_id', '=', 'thucung.tc_id')
            ->leftJoin('donhang', 'donhang.dh_id', '=', 'chitietdonhang.dh_id')
            ->groupBy('giong.g_id')
//            ->Having('ttdh_id','=', 2)
            ->selectRaw('count(donhang.dh_id) as soluong,giong.g_id as id')
            ->orderBy('soluong', 'desc')
            ->limit(1)
            ->get();
        foreach ($hot as $hot1) {
            $id = $hot1->id;
        }
        $date = now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $danhsachthucung = $this->searchThuCung($request);
        $loaithucung = LoaiThuCung::all();
        return view('frontend.pages.product')
            ->with('danhsachthucung', $danhsachthucung)
            ->with('loaithucung', $loaithucung)
            ->with('hot', $id)
            ->with('date', $date);
    }

    public function product_sale(Request $request)
    {
        $hot = DB::table('thucung')->join('giong', 'giong.g_id', '=', 'thucung.g_id')
            ->leftJoin('chitietdonhang', 'chitietdonhang.tc_id', '=', 'thucung.tc_id')
            ->leftJoin('donhang', 'donhang.dh_id', '=', 'chitietdonhang.dh_id')
            ->groupBy('giong.g_id')
//            ->Having('ttdh_id','=', 2)
            ->selectRaw('count(donhang.dh_id) as soluong,giong.g_id as id')
            ->orderBy('soluong', 'desc')
            ->limit(1)
            ->get();
//        dd($hot);
        foreach ($hot as $hot1) {
            $id = $hot1->id;
        }
        $date = now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $danhsachthucung = $this->searchThuCungKhuyenMai($request);
        $loaithucung = LoaiThuCung::all();
        return view('frontend.pages.product-sale')
            ->with('danhsachthucung', $danhsachthucung)
            ->with('loaithucung', $loaithucung)
            ->with('hot', $id)
            ->with('date', $date);
    }


    public function productDetail(Request $request, $id)
    {
        $tc_id = [$id];
        $date = now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $thucung = DB::table('thucung')->join('giong', 'giong.g_id', '=', 'thucung.g_id')
            ->join('hinhanh', 'hinhanh.tc_id', '=', 'thucung.tc_id')->where('hinhanh.ha_id', '=',
                '1')->where('thucung.tc_id', $id)->select('thucung.*', 'ha_ten', 'g_ten')
            ->join('loaithucung', 'loaithucung.ltc_id', '=', 'giong.ltc_id')
            ->leftJoin('chitietkhuyenmai', 'thucung.tc_id', '=', 'chitietkhuyenmai.tc_id')
            ->leftjoin('khuyenmai', 'khuyenmai.km_id', '=', 'chitietkhuyenmai.km_id')
            ->groupBy('thucung.tc_id', 'thucung.tc_ten', 'thucung.tc_giaBan', 'thucung.tc_ngaySinh', 'thucung.tc_tuoi',
                'thucung.tc_trangThai', 'thucung.tc_trangThaiTiemChung', 'ng_id', 'g_id', 'g_ten',
                'thucung.tc_gioiTinh', 'thucung.tc_canNang',
                'thucung.tc_moTa', 'thucung.tc_mauSac', 'ncc_id', 'ha_ten', 'km_ngayBatDau', 'km_ngayKetThuc',
                'loaithucung.ltc_id', 'loaithucung.ltc_ten')
            ->having('thucung.tc_id', $id)
            ->selectRaw('thucung.*, giong.g_ten, hinhanh.ha_ten,km_ngayBatDau, km_ngayKetThuc,  loaithucung.*,max(`km_giaTri`) as giatri')
            ->first();

        if ($thucung) {
            $danhsachhinhanhlienquan = DB::table('hinhanh')
                ->where('tc_id', $id)
                ->get();
//        $lienquan = ThuCung::where('g_id',$thucung->g_id)->first();
            $idgiong = $thucung->g_id;
            $lienquan = $query = DB::table('thucung')->join('giong', 'giong.g_id', '=', 'thucung.g_id')
                ->join('loaithucung', 'loaithucung.ltc_id', '=', 'giong.ltc_id')
                ->join('hinhanh', 'hinhanh.tc_id', '=', 'thucung.tc_id')->where('hinhanh.ha_id', '=', '1')
                ->where('tc_trangThai', '=', '1')
                ->where('giong.g_id', '=', $idgiong)
                ->whereNotIn('thucung.tc_id', $tc_id)
                ->get();
            $binhluan = DB::table('binhluan')->join('khachhang', 'khachhang.kh_id', '=', 'binhluan.kh_id')
                ->where('tc_id', $id)->get();
            //dd($binhluan);
            return view('frontend.pages.product-detail')
                ->with('tc', $thucung)
                ->with('lienquan', $lienquan)
                ->with('date', $date)
                ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
                ->with('binhluan', $binhluan);
        } else {
            return view('errors.404');
        }

    }


    public function cart(Request $request)
    {
        return view('frontend.pages.shopping-cart');
    }

    public function choosecheckout()
    {
        $httt = HinhThucThanhToan::all();
        if (Session::has('tenDangNhap')) {
            return view('frontend.pages.choose-checkout')->with('hinhthucthanhtoan', $httt);
        } else {
            return view('frontend.pages.dangnhap');
        }

    }

    public function order(Request $request)
    {
        if (Session::has('tenDangNhap')) {
            $taikhoan = Session::get('tenDangNhap');
            $kh = KhachHang::where('kh_taiKhoan', $taikhoan)->first();
            $donhang = new Donhang();
            $donhang->kh_id = $kh->kh_id;
            $donhang->dh_nguoiNhan = $request->donhang['dh_nguoiNhan'];
            $donhang->dh_diaChi = $request->donhang['dh_diaChi'];
            $donhang->dh_dienThoai = $request->donhang['dh_dienThoai'];
            $donhang->dh_tongGia = $request->donhang['dh_tongGia'];
            $donhang->httt_id = $request->donhang['httt_id'];
            $donhang->ttdh_id = 1;
            $donhang->save();

            foreach ($request->giohang['items'] as $sp) {
                $chitietdonhang = new ChiTietDonHang();
                $chitietdonhang->dh_id = $donhang->dh_id;
                $chitietdonhang->tc_id = $sp['_id'];
                $chitietdonhang->save();

                $thucung = ThuCung::find($sp['_id']);
                if ($thucung->tc_trangThai == 2) {
                    response('error', 'san pham co the da duoc mua');
                } else {
                    $thucung->tc_trangThai = 2;
                    $thucung->save();
                }

            }


        } else {
            return view('frontend.pages.dangnhap');
        }
        return response(["error" => false, "message" => compact('donhang')], 200);
    }

    private function searchThuCung(Request $request)
    {
        $date = now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $query = DB::table('thucung')->join('giong', 'giong.g_id', '=', 'thucung.g_id')
            ->join('loaithucung', 'loaithucung.ltc_id', '=', 'giong.ltc_id')
            ->join('hinhanh', 'hinhanh.tc_id', '=', 'thucung.tc_id')
            ->leftJoin('chitietkhuyenmai', 'thucung.tc_id', '=', 'chitietkhuyenmai.tc_id')
            ->leftjoin('khuyenmai', 'khuyenmai.km_id', '=', 'chitietkhuyenmai.km_id')
            ->groupBy('thucung.tc_id', 'thucung.tc_ten', 'thucung.tc_giaBan', 'thucung.tc_ngaySinh', 'thucung.tc_tuoi',
                'thucung.tc_trangThai', 'thucung.tc_trangThaiTiemChung', 'ng_id', 'thucung.g_id', 'g_ten',
                'thucung.tc_gioiTinh', 'thucung.tc_canNang',
                'thucung.tc_moTa', 'thucung.tc_mauSac', 'ncc_id', 'ha_ten', 'hinhanh.ha_id', 'loaithucung.ltc_id',
                'loaithucung.ltc_ten', 'km_ngayBatDau', 'km_ngayKetThuc')
            ->Having('tc_trangThai', '=', 1)
            ->Having('hinhanh.ha_id', '=', 1)
//
            ->selectRaw('thucung.*, giong.g_ten, hinhanh.ha_ten, hinhanh.ha_id , loaithucung.*,max(`km_giaTri`) as giatri, km_ngayBatDau,km_ngayKetThuc');
        // Kiểm tra điều kiện `searchByLoaiMa`
        $searchByGiongMa = $request->query('searchByGiongMa');
        $filter = $request->query('filter');
        $priceBg = $request->query('priceBg');
        $priceEnd = $request->query('priceEnd');
        $gender = $request->query('gender');
        // dd($query);
        if ($searchByGiongMa != null) {
            $query->Having('giong.g_ten', 'like', '%' . $searchByGiongMa . '%')
                ->get();
        }
        if ($filter != null) {
            $query->orderBy('tc_giaBan', $filter)
                ->get();
        }
        if ($priceBg != null || $priceEnd != null) {
            $query->Having('tc_giaBan', '>=', $priceBg)
                ->Having('tc_giaBan', '<', $priceEnd)
                ->get();
        }
        if ($gender != null) {
            $query->Having('tc_gioiTinh', '=', $gender)
                ->get();
        }

        $data = $query->paginate(16);
        return $data;
    }

    private function searchThuCungKhuyenMai(Request $request)
    {
        $date = now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $query = DB::table('thucung')->join('giong', 'giong.g_id', '=', 'thucung.g_id')
            ->join('loaithucung', 'loaithucung.ltc_id', '=', 'giong.ltc_id')
            ->join('hinhanh', 'hinhanh.tc_id', '=', 'thucung.tc_id')
            ->Join('chitietkhuyenmai', 'thucung.tc_id', '=', 'chitietkhuyenmai.tc_id')
            ->join('khuyenmai', 'khuyenmai.km_id', '=', 'chitietkhuyenmai.km_id')
            ->groupBy('thucung.tc_id', 'thucung.tc_ten', 'thucung.tc_giaBan', 'thucung.tc_ngaySinh', 'thucung.tc_tuoi',
                'thucung.tc_trangThai', 'thucung.tc_trangThaiTiemChung', 'ng_id', 'thucung.g_id', 'g_ten',
                'thucung.tc_gioiTinh', 'thucung.tc_canNang',
                'thucung.tc_moTa', 'thucung.tc_mauSac', 'ncc_id', 'ha_ten', 'hinhanh.ha_id', 'loaithucung.ltc_id',
                'loaithucung.ltc_ten', 'km_ngayBatDau', 'km_ngayKetThuc')
            ->Having('tc_trangThai', '=', 1)
            ->Having('hinhanh.ha_id', '=', 1)
            ->Having('km_ngayBatDau', '<=', $date)
            ->Having('km_ngayKetThuc', '>=', $date)
            ->selectRaw('thucung.*, giong.g_ten, hinhanh.ha_ten, hinhanh.ha_id , loaithucung.*,max(`km_giaTri`) as giatri, km_ngayBatDau,km_ngayKetThuc');
        // Kiểm tra điều kiện `searchByLoaiMa`
        $searchByGiongMa = $request->query('searchByGiongMa');
        $filter = $request->query('filter');
        $priceBg = $request->query('priceBg');
        $priceEnd = $request->query('priceEnd');
        $gender = $request->query('gender');
        // dd($query);
        if ($searchByGiongMa != null) {
            $query->Having('giong.g_ten', 'like', '%' . $searchByGiongMa . '%')
                ->get();
        }
        if ($filter != null) {
            $query->orderBy('tc_giaBan', $filter)
                ->get();
        }
        if ($priceBg != null || $priceEnd != null) {
            $query->Having('tc_giaBan', '>=', $priceBg)
                ->Having('tc_giaBan', '<', $priceEnd)
                ->get();
        }
        if ($gender != null) {
            $query->Having('tc_gioiTinh', '=', $gender)
                ->get();
        }

        $data = $query->paginate(8);
        return $data;
    }

    public function account()
    {
        if (Session::has('tenDangNhap')) {
            $tdn = Session::get('tenDangNhap');
            $tk = KhachHang::where('kh_taiKhoan', $tdn)->first();
            return view('frontend.pages.account')->with('tk', $tk);
        } else {
            return view('frontend.index');
        }

    }

    public function update_acount(Request $request)
    {
        if (Session::has('tenDangNhap')) {
            $kh_taiKhoan = Session::get('tenDangNhap');
            $data = KhachHang::where('kh_taiKhoan', $kh_taiKhoan)->first();
            $id = $data->kh_id;
            $kh = KhachHang::find($id);
            $kh->kh_hoTen = $request->kh_hoTen;
            $kh->kh_email = $request->kh_email;
            $kh->kh_ngaySinh = $request->kh_ngaySinh;
            $kh->kh_dienThoai = $request->kh_dienThoai;
            $kh->kh_diaChi = $request->kh_diaChi;
            $kh->kh_gioiTinh = $request->kh_gioiTinh;
            if ($request->kh_matKhau != '') {
                $kh->kh_matKhau = md5($request->kh_matKhau);
            }
            $kh->save();
            return redirect()->back()->with('success', 'Lưu thành công');
        } else {
            return view('frontend.pages.dangnhap');
        }
    }

    public function list_order()
    {
        if (Session::has('tenDangNhap')) {
            $taikhoan = Session::get('tenDangNhap');
            $kh = KhachHang::where('kh_taiKhoan', $taikhoan)->first();
            $ds_donhang = DonHang::join('hinhthucthanhtoan', 'hinhthucthanhtoan.httt_id', '=', 'donhang.httt_id')
                ->join('trangthaidonhang', 'trangthaidonhang.ttdh_id', '=', 'donhang.ttdh_id')
                ->where('kh_id', $kh->kh_id)
                ->orderBy('dh_ngayTao', 'desc')
                ->get();

            return view('frontend.pages.order')
                ->with('ds_donhang', $ds_donhang);
        } else {
            return view('frontend.pages.dangnhap');
        }
    }

    public function order_info($id)
    {
        if (Session::has('tenDangNhap')) {
            $donhang = DonHang::join('khachhang', 'khachhang.kh_id', '=', 'donhang.kh_id')
                ->join('hinhthucthanhtoan', 'hinhthucthanhtoan.httt_id', '=', 'donhang.httt_id')->where('dh_id',
                    $id)->first();

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
                $tamtinh += $ct->tc_giaBan - $ct->tc_giaBan * $ct->giatri / 100;
            }
            return view('frontend.pages.order-detail')
                ->with('chitiet', $chitiet)
                ->with('donhang', $donhang)
                ->with('date', $date)
                ->with('tamtinh', $tamtinh);
        } else {
            return view('frontend.pages.dangnhap');
        }
    }

    public function filter_giong($id)
    {
        if ($id == 0) {
            $g = Giong::all();
            return response()->json($g);
        } else {
            $g = Giong::where('ltc_id', $id)->get();
            return response()->json($g);
        }

    }
    public function laytigia() {
        $url = "https://www.vietcombank.com.vn/exchangerates/ExrateXML.aspx";
        $xml = file_get_contents($url);
        $data = simplexml_load_string($xml);
        $thoi_gian_cap_nhat = $data->DateTime;
        $ty_gia = $data->Exrate;
        foreach($ty_gia as $ngoai_te) {
            $gia_chuyen_khoan = $ngoai_te['Transfer'];
        }
        return response()->json($gia_chuyen_khoan);
}

//----------------------------------------------API------------------------------------------------------//
    public function list_binhluan($id){
        $binhluan = DB::table('binhluan')->join('khachhang', 'khachhang.kh_id', '=', 'binhluan.kh_id')
            ->where('tc_id', $id)->get();
        return response()->json($binhluan);
    }
}
