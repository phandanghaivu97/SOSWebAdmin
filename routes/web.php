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
Route::get('/thong-tin-nguoi-dung-{id}',[
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
Route::get('/danh-sach-bao-cao-{id}',[
	'uses'=>'ReportController@getDetail',
	'as'=>'sosadmin.report.detail'
]);

Route::get('/ban-do',[
	'uses'=>'UserController@layLichSu',
	'as'=>'sosadmin.map.index'
]);
//nguoi dung
Route::get('/lich-su-{id}',[
	'uses'=>'UserController@lichSu',
	'as'=>'sosadmin.user.history'
]);
Route::get('/sua-nguoi_dung-{id}',[
	'uses'=>'UserController@getSuaNguoiDung',
	'as'=>'sosadmin.user.getedit'
]);
Route::post('/sua-nguoi_dung',[
	'uses'=>'UserController@postSuaNguoiDung',
	'as'=>'sosadmin.user.postedit'
]);
//api
Route::post('/dang-nhap-user',[
	'uses'=>'APIController@dangNhap',
	'as'=>'sosuser.login'
]);
Route::post('/dang-ky-user',[
	'uses'=>'APIController@dangKy',
	'as'=>'sosuser.register'
]);
Route::post('/luu-hoat-dong',[
	'uses'=>'APIController@luuHoatDong',
	'as'=>'sosuser.log'
]);

//App
Route::get('/dang-nhap-user-{email}-{matKhau}',[
	'uses'=>'TaiKhoanController@KiemtraDangNhapUser',
	'as'=>'sosuser.login'
    ]);
Route::get('/add-user',[
	'uses'=>'UserController@getThemNguoiDung',
	'as'=>'sosadmin.user.AddUser'
]);
Route::post('/add-user',[
	'uses'=>'UserController@postThemNguoiDung',
	'as'=>'sosadmin.user.AddUser'
]);
//canh sat
Route::post('/them-canh-sat',[
	'uses'=>'PoliceController@postThemPolice',
	'as'=>'sosadmin.user.AddPolice'
]);
Route::get('/them-canh-sat',[
	'uses'=>'PoliceController@getThemPolice',
	'as'=>'sosadmin.user.AddPolice'

]);

Route::post('/sua-canh-sat',[
	'uses'=>'PoliceController@postSuaPolice',
	'as'=>'sosadmin.user.PostEditPolice'
]);
Route::get('/sua-canh-sat-{id}',[
	'uses'=>'PoliceController@getSuaPolice',
	'as'=>'sosadmin.user.editPolice'

]);
