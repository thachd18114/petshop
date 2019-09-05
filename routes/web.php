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
    return view('frontend.layouts.master');
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
//------------------------------------------//
