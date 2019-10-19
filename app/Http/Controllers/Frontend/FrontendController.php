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
        $loaithucung = LoaiThuCung::all();
        return view('frontend.index')
            ->with('danhsachthucung', $danhsachthucung)
            ->with('loaithucung', $loaithucung)
            ->with('date', $date);
    }

    public function product(Request $request)
    {
        $date = now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $danhsachthucung = $this->searchThuCung($request);
        $loaithucung = LoaiThuCung::all();
        return view('frontend.pages.product')
            ->with('danhsachthucung', $danhsachthucung)
            ->with('loaithucung', $loaithucung)
            ->with('date', $date);
    }

    public function productDetail(Request $request, $id)
    {
        $date = now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $thucung = DB::table('thucung')->join('giong', 'giong.g_id', '=', 'thucung.g_id')
            ->join('hinhanh', 'hinhanh.tc_id', '=', 'thucung.tc_id')->where('hinhanh.ha_id', '=',
                '1')->where('thucung.tc_id', $id)->select('thucung.*','ha_ten','g_ten')
            ->join('loaithucung', 'loaithucung.ltc_id', '=', 'giong.ltc_id')
            ->leftJoin('chitietkhuyenmai', 'thucung.tc_id', '=', 'chitietkhuyenmai.tc_id')
            ->leftjoin ('khuyenmai', 'khuyenmai.km_id', '=', 'chitietkhuyenmai.km_id')
//            ->where('km_ngayBatDau', '<=', $data)
//            ->where('km_ngayKetThuc', '>=',$data)
//            ->orWhere('km_ngayBatDau' ,'=', null)
            ->groupBy('thucung.tc_id', 'thucung.tc_ten','thucung.tc_giaBan', 'thucung.tc_ngaySinh', 'thucung.tc_tuoi',
                'thucung.tc_trangThai', 'thucung.tc_trangThaiTiemChung', 'ng_id','g_id', 'g_ten', 'thucung.tc_gioiTinh', 'thucung.tc_canNang',
                'thucung.tc_moTa', 'thucung.tc_mauSac', 'ncc_id', 'ha_ten','km_ngayBatDau','km_ngayKetThuc', 'loaithucung.ltc_id','loaithucung.ltc_ten')
//            ->orHaving('cou')
                ->having('thucung.tc_id',$id)
            ->selectRaw('thucung.*, giong.g_ten, hinhanh.ha_ten,km_ngayBatDau, km_ngayKetThuc,  loaithucung.*,max(`km_giaTri`) as giatri')
            ->first();
        // Query Lấy các hình ảnh liên quan của các Sản phẩm đã được lọc
        $danhsachhinhanhlienquan = DB::table('hinhanh')
            ->where('tc_id', $id)
            ->get();
//        $lienquan = ThuCung::where('g_id',$thucung->g_id)->first();
        $idgiong = $thucung->g_id;
        $lienquan = $query = DB::table('thucung')->join('giong', 'giong.g_id', '=', 'thucung.g_id')
            ->join('loaithucung', 'loaithucung.ltc_id', '=', 'giong.ltc_id')
            ->join('hinhanh', 'hinhanh.tc_id', '=', 'thucung.tc_id')->where('hinhanh.ha_id', '=', '1')
            ->where('tc_trangThai', '=', '1')->where('giong.g_id', '=', $idgiong)->get();
        $binhluan = DB::table('binhluan')->join('khachhang', 'khachhang.kh_id', '=', 'binhluan.kh_id')
            ->where('tc_id', $id)->get();
        //dd($binhluan);
        return view('frontend.pages.product-detail')
            ->with('tc', $thucung)
            ->with('lienquan', $lienquan)
            ->with('date', $date)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('binhluan', $binhluan);
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
        $data = now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $query = DB::table('thucung')->join('giong', 'giong.g_id', '=', 'thucung.g_id')
            ->join('loaithucung', 'loaithucung.ltc_id', '=', 'giong.ltc_id')
            ->join('hinhanh', 'hinhanh.tc_id', '=', 'thucung.tc_id')
            ->leftJoin('chitietkhuyenmai', 'thucung.tc_id', '=', 'chitietkhuyenmai.tc_id')
            ->leftjoin ('khuyenmai', 'khuyenmai.km_id', '=', 'chitietkhuyenmai.km_id')

//            ->Where('km_giaTri' ,'=', null)
            ->groupBy('thucung.tc_id', 'thucung.tc_ten','thucung.tc_giaBan', 'thucung.tc_ngaySinh', 'thucung.tc_tuoi',
                'thucung.tc_trangThai', 'thucung.tc_trangThaiTiemChung', 'ng_id','g_id', 'g_ten', 'thucung.tc_gioiTinh', 'thucung.tc_canNang',
                'thucung.tc_moTa', 'thucung.tc_mauSac', 'ncc_id', 'ha_ten','hinhanh.ha_id', 'loaithucung.ltc_id','loaithucung.ltc_ten','km_ngayBatDau','km_ngayKetThuc')
            ->Having('tc_trangThai', '=',1 )
            ->Having('hinhanh.ha_id', '=', '1')
            ->selectRaw('thucung.*, giong.g_ten, hinhanh.ha_ten, hinhanh.ha_id, km_ngayBatDau, km_ngayKetThuc , loaithucung.*,max(`km_giaTri`) as giatri');
        // Kiểm tra điều kiện `searchByLoaiMa`
        $searchByGiongMa = $request->query('searchByGiongMa');
        // dd($query);
        if ($searchByGiongMa != null) {
        }

        $data = $query->get();
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

    public function update_acount (Request $request)
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
            if ($request->kh_matKhau != ''){
                $kh->kh_matKhau = md5($request->kh_matKhau);
            }
            $kh->save();
            return redirect()->back()->with('success','Lưu thành công');
        }
        else {
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
                ->orderBy('dh_ngayTao','desc')
                ->get();

            return view('frontend.pages.order')
                ->with('ds_donhang', $ds_donhang);
        }
        else {
            return view('frontend.pages.dangnhap');
        }
    }

    public function order_info($id)
    {
        if (Session::has('tenDangNhap')) {
            $donhang = DonHang::join('khachhang', 'khachhang.kh_id', '=', 'donhang.kh_id')
                ->join('hinhthucthanhtoan', 'hinhthucthanhtoan.httt_id', '=', 'donhang.httt_id')->where('dh_id', $id)->first();

            $data = now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            $chitiet = DB::table('thucung')->join('giong', 'giong.g_id', '=', 'thucung.g_id')
               ->join('chitietdonhang','chitietdonhang.tc_id', '=', 'thucung.tc_id')
                ->join('hinhanh', 'hinhanh.tc_id', '=', 'thucung.tc_id')->where('hinhanh.ha_id', '=',
                    '1')->where('thucung.tc_id', $id)->select('thucung.*','ha_ten','g_ten')
                ->join('loaithucung', 'loaithucung.ltc_id', '=', 'giong.ltc_id')
                ->leftJoin('chitietkhuyenmai', 'thucung.tc_id', '=', 'chitietkhuyenmai.tc_id')
                ->leftjoin ('khuyenmai', 'khuyenmai.km_id', '=', 'chitietkhuyenmai.km_id')
//                ->where('km_ngayBatDau', '<=', $data)
//                ->where('km_ngayKetThuc', '>=',$data)
                ->orWhere('km_ngayBatDau' ,'=', null)
                ->groupBy('thucung.tc_id', 'thucung.tc_ten','thucung.tc_giaBan', 'thucung.tc_ngaySinh', 'thucung.tc_tuoi',
                    'thucung.tc_trangThai', 'thucung.tc_trangThaiTiemChung', 'ng_id','g_id', 'g_ten', 'thucung.tc_gioiTinh', 'thucung.tc_canNang',
                    'thucung.tc_moTa', 'thucung.tc_mauSac', 'ncc_id', 'ha_ten', 'loaithucung.ltc_id','loaithucung.ltc_ten','chitietdonhang.dh_id')
               ->having('chitietdonhang.dh_id', $id)
                ->selectRaw('thucung.*, giong.g_ten, hinhanh.ha_ten,  loaithucung.*,max(`km_giaTri`) as giatri,chitietdonhang.dh_id')
                ->get();

            $tamtinh = 0;
            foreach ($chitiet as $ct){
                $tamtinh += $ct->tc_giaBan-$ct->tc_giaBan*$ct->giatri;
            }
            return view('frontend.pages.order-detail')
                ->with('chitiet', $chitiet)
                ->with('donhang', $donhang)
                ->with('tamtinh', $tamtinh);
        }
        else {
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

}
