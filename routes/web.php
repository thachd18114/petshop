<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/admin', 'ThongKeController@thongkechung')->name('trangchu');
Route::get('/admin/dangnhap', function (){
    return view('backend.dangnhap');})->name('dangnhap.ad');
Route::post('admin/dangnhap/checkad','DangNhapController@loginAdmin')->name('checkLoginAD');

Route::get('/admin/info_account','DangNhapController@account' )->name('frontend.info.account');
Route::post('admin/update_account','DangNhapController@update_acount')->name('frontend.update.account');

Route::get('admin/dangxuat','DangXuatController@logoutAd')->name('logoutAd');

Route::get('/dangnhap','DangNhapController@index')->name('dangnhap');
Route::post('/dangnhap/check','DangNhapController@check')->name('dangnhap.check');

Route::get('/dangky','DangKyController@index')->name('dangky');
Route::match(['GET', 'POST'],'/checkUser','DangKyController@checkUser')->name('checkUser');
Route::post('/dangky/create','DangKyController@store')->name('dangky.store');

Route::get('/dangxuat','DangXuatController@index')->name('logout');
//<<------------------------------Thống kê-------------------------------->>

Route::get('/admin/thongke_doanhthu','ThongKeController@Doanhthu')->name('doanhthu');
Route::get('/admin/thongke_phantram','ThongKeController@phantram')->name('phantram');
Route::get('/admin/thongke_banchay','ThongKeController@phantram_ban')->name('banchay');
//----------------------------------//
Route::get('/admin/list_loaithucung', 'LoaiThuCungController@index');
Route::get('/admin/loaithucung', function (){
    if(Session::has('tenDangNhapAD')){
        return view('backend.loaithucung.index');
    }
    return view('backend.dangnhap');
   })->name('loaithucung');
Route::post('/admin/createloaithucung','LoaiThuCungController@store');
Route::get('/admin/edit_loaithucung/{id}', 'LoaiThuCungController@edit');
Route::post('/admin/update_loaithucung/{id}','LoaiThuCungController@update');
Route::get('/admin/delete_loaithucung/{id}','LoaiThuCungController@delete');
//<<-----------------Giong-------------------------------->>
Route::get('/admin/list_giong', 'GiongController@index');
Route::get('/admin/giong', function (){return view('backend.giong.index');})->name('giong');
Route::post('/admin/creategiong','GiongController@store');
Route::get('/admin/edit_giong/{id}', 'GiongController@edit');
Route::post('/admin/update_giong/{id}','GiongController@update');
Route::get('/admin/delete_giong/{id}','GiongController@delete');

//-----------------------------------Nguồn gốc----------------------------------//

Route::get('/admin/list_nguongoc', 'NguonGocController@index');
Route::get('/admin/nguongoc', function (){return view('backend.nguongoc.index');})->name('nguongoc');
Route::post('/admin/createnguongoc','NguonGocController@store');
Route::get('/admin/edit_nguongoc/{id}', 'NguonGocController@edit');
Route::post('/admin/update_nguongoc/{id}','NguonGocController@update');
Route::get('/admin/delete_nguongoc/{id}','NguonGocController@delete');
//-------------------------Hinh thuc thanh toan------------------------------//

Route::get('/admin/list_hinhthucthanhtoan', 'HinhThucThanhToanController@index');
Route::get('/admin/hinhthucthanhtoan', function (){return view('backend.hinhthucthanhtoan.index');})->name('hinhthucthanhtoan');
Route::post('/admin/createhinhthucthanhtoan','HinhThucThanhToanController@store');
Route::get('/admin/edit_hinhthucthanhtoan/{id}', 'HinhThucThanhToanController@edit');
Route::post('/admin/update_hinhthucthanhtoan/{id}','HinhThucThanhToanController@update');
Route::get('/admin/delete_hinhthucthanhtoan/{id}','HinhThucThanhToanController@delete');
//--------------------------------------Thú cưng------------------------------//

Route::get('/admin/list_thucung', 'ThuCungController@index');
Route::get('/admin/thucung', function (){return view('backend.thucung.index');})->name('thucung');
Route::post('/admin/createthucung','ThuCungController@store');
Route::post('/admin/createthucung/hinhanh','ThuCungController@store_hinhanh');
Route::get('/admin/detail_thucung/{id}', 'ThuCungController@thucung_detail');
Route::get('/admin/edit_thucung/{id}', 'ThuCungController@edit');
Route::get('/admin/edit_thucung/{id}', 'ThuCungController@edit');
Route::post('/admin/update_thucung/{id}','ThuCungController@update');
Route::post('/admin/update_thucung/hinhanh/{id}','ThuCungController@update_hinhanh');
Route::get('/admin/delete_thucung/{id}','ThuCungController@delete');
Route::get('/admin/hinhanh_thucung/{id}','ThuCungController@hinhanh_thucung');


//-----------------------------------Đơn Hàng----------------------------//
Route::get('/admin/list_donhang', 'DonHangController@index');
Route::get('/admin/donhang', function (){return view('backend.donhang.index');})->name('donhang');
Route::get('/admin/chitietdonhang/{id}', 'DonHangController@chitietdonhang')->name('chitietdonhang');
Route::post('/admin/createdonhang','DonHangController@store');
Route::get('/admin/edit_donhang/{id}', 'DonHangController@edit');
Route::post('/admin/update_donhang/{id}','DonHangController@update');
Route::get('/admin/delete_donhang/{id}','DonHangController@delete');
//------------------------------Trạng thái đơn hàng--------------------------------------//

Route::get('/admin/list_ttdonhang', 'TrangThaiDonHangController@index');

//------------------------------Khách Hàng--------------------------------------//

Route::get('/admin/list_khachhang', 'KhachHangController@index');
Route::get('/admin/khachhang', function (){return view('backend.khachhang.index');})->name('khachhang');
Route::post('/admin/createkhachhang','KhachHangController@store');
Route::get('/admin/edit_khachhang/{id}', 'KhachHangController@edit');
Route::post('/admin/update_khachhang/{id}','KhachHangController@update');
Route::get('/admin/delete_khachhang/{id}','KhachHangController@delete');

//------------------------------Nhân Viên--------------------------------------//

Route::get('/admin/list_nhanvien', 'NhanVienController@index');
Route::get('/admin/nhanvien', function (){return view('backend.nhanvien.index');})->name('nhanvien');
Route::post('/admin/createnhanvien','NhanVienController@store');
Route::get('/admin/edit_nhanvien/{id}', 'NhanVienController@edit');
Route::post('/admin/update_nhanvien/{id}','NhanVienController@update');
Route::get('/admin/delete_nhanvien/{id}','NhanVienController@delete');

//-------------------------------Khuyến Mãi-------------------------------------//

Route::get('/admin/list_khuyenmai', 'KhuyenMaiController@index');
Route::get('/admin/khuyenmai', function (){return view('backend.khuyenmai.index');})->name('khuyenmai');
Route::post('/admin/createkhuyenmai','KhuyenMaiController@store');
Route::get('/admin/edit_khuyenmai/{id}', 'KhuyenMaiController@edit');
Route::post('/admin/update_khuyenmai/{id}','KhuyenMaiController@update');
Route::get('/admin/delete_khuyenmai/{id}','KhuyenMaiController@delete');

//-------------------------------Chi tiet khuyen mai-------------------------------------//

Route::get('/admin/thucung_khuyenmai/{id}', 'ChiTietKhuyenMaiController@index')->name('km_tc');
Route::get('/admin/list_thucung_khuyenmai/{id}', 'ChiTietKhuyenMaiController@getData');
Route::get('/admin/list_thucungkm/{id}', 'ChiTietKhuyenMaiController@listthucung');
Route::post('/admin/create_chitietkm/{km}','ChiTietKhuyenMaiController@store');
Route::get('/admin/delete_chitietkm/{km}/{tc}','ChiTietKhuyenMaiController@detele');
Route::post('/admin/delete_listchitietkm/{km}','ChiTietKhuyenMaiController@detele_list');

//-------------------------------Nhà cưng cấp-------------------------------------//

Route::get('/admin/list_nhacungcap', 'NhaCungCapController@index');
Route::get('/admin/nhacungcap', function (){return view('backend.nhacungcap.index');})->name('nhacungcap');
Route::post('/admin/createnhacungcap','NhaCungCapController@store');
Route::get('/admin/edit_nhacungcap/{id}', 'NhaCungCapController@edit');
Route::post('/admin/update_nhacungcap/{id}','NhaCungCapController@update');
Route::get('/admin/delete_nhacungcap/{id}','NhaCungCapController@delete');

//-------------------------------quyen-------------------------------------//

Route::get('/admin/list_quyen', 'QuyenController@index');
Route::get('/admin/quyen', function (){return view('backend.quyen.index');})->name('quyen');
Route::post('/admin/createquyen','QuyenController@store');
Route::get('/admin/edit_quyen/{id}', 'QuyenController@edit');
Route::post('/admin/update_quyen/{id}','QuyenController@update');
Route::get('/admin/delete_quyen/{id}','QuyenController@delete');
//-------------------------------trạng thái đơn hàng-------------------------------------//

Route::get('/admin/list_ttdonhang', 'TrangThaiDonHangController@index');
Route::get('/admin/ttdonhang', function (){return view('backend.trangthaidonhang.index');})->name('ttdonhang');
Route::post('/admin/createttdonhang','TrangThaiDonHangController@store');
Route::get('/admin/edit_ttdonhang/{id}', 'TrangThaiDonHangController@edit');
Route::post('/admin/update_ttdonhang/{id}','TrangThaiDonHangController@update');
Route::get('/admin/delete_ttdonhang/{id}','TrangThaiDonHangController@delete');

//-------------------------------FAQ-------------------------------------//

Route::get('/admin/list_faq', 'FaqController@index');
Route::get('/admin/faq', function (){
    if(Session::has('tenDangNhapAD')){
        return view('backend.faq.index');
    }else{
        return view('backend.dangnhap');
    }

})->name('faq');
Route::get('/admin/faq/{id}', 'FaqController@getKh_id');
Route::get('/admin/faq_info/{id}','FaqController@faq_info');
Route::post('/admin/create_ph/', 'FaqController@store_ph');
//Route::post('/admin/update_quyen/{id}','QuyenController@update');
//Route::get('/admin/delete_quyen/{id}','QuyenController@delete');

//-------------------------------Frontend-------------------------------------//
Route::get('/', 'Frontend\FrontendController@index')->name('frontend.home');
Route::get('/filter-giong/{id}', 'Frontend\FrontendController@filter_giong');
Route::get('/thu-cung','Frontend\FrontendController@product' )->name('frontend.product');
Route::get('/thu-cung-khuyenmai','Frontend\FrontendController@product_sale' )->name('frontend.product.sale');

Route::get('/thu-cung-khuyenmai/giong/{id}','Frontend\FrontendController@product_sale' )->name('frontend.product.sale.giong');

Route::get('/thu-cung/{id}', 'Frontend\FrontendController@productDetail')->name('frontend.productDetail');
Route::post('/binhluan/{id}', 'BinhLuanController@store')->name('binhluan');

Route::get('/gio-hang', 'Frontend\FrontendController@cart')->name('frontend.cart');

Route::post('/dat-hang', 'Frontend\FrontendController@order')->name('frontend.order');

Route::get('/laytigia', 'Frontend\FrontendController@laytigia')->name('frontend.tigia');

Route::get('/chooes-checkout', 'Frontend\FrontendController@choosecheckout')->name('frontend.choosecheckout');

Route::get('/account-info', 'Frontend\FrontendController@account')->name('frontend.account');

Route::post('/update-account', 'Frontend\FrontendController@update_acount')->name('frontend.update_acount');

Route::get('/account-order/', 'Frontend\FrontendController@list_order')->name('frontend.account.order');

Route::get('/order-info/{id}', 'Frontend\FrontendController@order_info')->name('frontend.order.info');

Route::get('/faq', 'FaqController@ftfaq_info')->name('frontend.faq');

Route::GET('/question/', 'FaqController@store_ch')->name('question');

//-------------------------------------------API----------------------------------------------//
Route::get('/list_binhluan/{id}', 'Frontend\FrontendController@list_binhluan')->name('list.binhluan');

Route::get('/lienhe', function (){

        return view('frontend.pages.contact');
})->name('lienhe');

Route::get('/thu-cung-api','Frontend\FrontendController@product_api' )->name('frontend.product.api');

Route::get('/thu-cung-api/{id}', 'Frontend\FrontendController@productDetail_api')->name('frontend.productDetail.api');