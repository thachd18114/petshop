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
Route::get('/admin', function (){
    return view('backend.layout.master');
});
Route::get('/admin/dangnhap', function (){
    return view('backend.dangnhap');
});
Route::get('/dangnhap','DangNhapController@index')->name('dangnhap');
Route::post('/dangnhap/check','DangNhapController@check')->name('dangnhap.check');

Route::get('/dangky','DangKyController@index')->name('dangky');
Route::match(['GET', 'POST'],'/checkUser','DangKyController@checkUser')->name('checkUser');
Route::post('/dangky/create','DangKyController@store')->name('dangky.store');

Route::get('/dangxuat','DangXuatController@index')->name('logout');

//----------------------------------//
Route::get('/admin/list_loaithucung', 'LoaiThuCungController@index');
Route::get('/admin/loaithucung', function (){return view('backend.loaithucung.index');})->name('loaithucung');
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

//------------------------------Khách Hàng--------------------------------------//

Route::get('/admin/list_khachhang', 'KhachHangController@index');
Route::get('/admin/khachhang', function (){return view('backend.khachhang.index');})->name('khachhang');
Route::post('/admin/createkhachhang','KhachHangController@store');
Route::get('/admin/edit_khachhang/{id}', 'KhachHangController@edit');
Route::post('/admin/update_khachhang/{id}','KhachHangController@update');
Route::get('/admin/delete_khachhang/{id}','KhachHangController@delete');

//-------------------------------Frontend-------------------------------------//


Route::get('/', 'Frontend\FrontendController@index')->name('frontend.home');
Route::get('/thu-cung', 'Frontend\FrontendController@product')->name('frontend.product');
Route::get('/thu-cung/{id}', 'Frontend\FrontendController@productDetail')->name('frontend.productDetail');


Route::get('/gio-hang', 'Frontend\FrontendController@cart')->name('frontend.cart');

Route::post('/dat-hang', 'Frontend\FrontendController@order')->name('frontend.order');

Route::get('/chooes-checkout', 'Frontend\FrontendController@choosecheckout')->name('frontend.choosecheckout');

Route::get('/account-info', 'Frontend\FrontendController@account')->name('frontend.account');

Route::get('/lienhe', function (){
    return view('frontend.pages.contact');
});
