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
//------------------------------------------//
Route::get('/admin/list_thucung', 'ThuCungController@index');
Route::get('/admin/thucung', function (){return view('backend.thucung.index');})->name('thucung');
Route::post('/admin/createthucung','ThuCungController@store');
Route::post('/admin/createthucung/hinhanh','ThuCungController@store_hinhanh');
Route::get('/admin/edit_thucung/{id}', 'ThuCungController@edit');
Route::post('/admin/update_thucung/{id}','ThuCungController@update');
Route::post('/admin/update_thucung/hinhanh/{id}','ThuCungController@update_hinhanh');
Route::get('/admin/delete_thucung/{id}','ThuCungController@delete');
//------------------------------------------/
Route::get('/thucung', function (){
    return view('frontend.pages.product');
});
Route::get('/chitietthucung', function (){
    return view('frontend.pages.product-detail');
});
Route::get('/lienhe', function (){
    return view('frontend.pages.contact');
});
