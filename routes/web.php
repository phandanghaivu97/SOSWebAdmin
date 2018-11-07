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

Route::get('/',[
	'uses'=>'TaiKhoanController@formdangNhap',
	'as'=>'sosadmin.dangnhap'
]);
Route::post('/dang-nhap',[
	'uses'=>'TaiKhoanController@kiemTraDangNhap',
	'as'=>'sosadmin.kiemtradangnhap'
]);
Route::get('/dang-xuat',function(){
	Session::flush();
	return redirect(url('/'));
});
Route::get('/trang-chu',[
	'uses'=>'IndexController@index',
	'as'=>'sosadmin.trangchu'
]);
Route::get('/tai-khoan',[
	'uses'=>'TaiKhoanController@index',
	'as'=>'sosadmin.taikhoan.index'
]);
Route::get('/xac-nhan-tai-khoan-{cmnd}',[
	'uses'=>'TaiKhoanController@xacNhanTaiKhoan',
	'as'=>'sosadmin.taikhoan.xacnhan'
]);
Route::get('/thong-tin-nguoi-dung-{cmnd}',[
	'uses'=>'UserController@thongTinChiTiet',
	'as'=>'sosadmin.user.detail'
]);
Route::get('/khoa-tai-khoan-{id}',[
	'uses'=>'TaiKhoanController@getKhoa',
	'as'=>'sosadmin.user.getlock'
]);
Route::post('/khoa-tai-khoan',[
	'uses'=>'TaiKhoanController@postKhoa',
	'as'=>'sosadmin.user.postlock'
]);
Route::get('/tai-khoan-canh-sat',[
	'uses'=>'PoliceController@index',
	'as'=>'sosadmin.police.index'
]);

Route::get('/danh-sach-bao-cao',[
	'uses'=>'ReportController@index',
	'as'=>'sosadmin.report.index'
]);
Route::post('/danh-sach-bao-cao',[
	'uses'=>'ReportController@timKiem',
	'as'=>'sosadmin.report.search'
]);
Route::get('/danh-sach-bao-cao-{cmnd}',[
	'uses'=>'ReportController@getDetail',
	'as'=>'sosadmin.report.detail'
]);

Route::get('/ban-do',[
	'uses'=>'MapController@index',
	'as'=>'sosadmin.map.index'
]);

//App
Route::get('/dang-nhap-user-{email}-{matKhau}',[
	'uses'=>'TaiKhoanController@KiemtraDangNhapUser',
	'as'=>'sosuser.login'
]);
