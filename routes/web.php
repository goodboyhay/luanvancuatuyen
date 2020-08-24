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


Route::get('/','FrontendController@getIndex');
Route::get('danhmuc/{id}','FrontendController@getCategory');
Route::get('sanpham/{id}','FrontendController@getSanpham');
Route::get('lienhe','FrontendController@getLienhe');
Route::get('yeuthich','FrontendController@yeuthich');
Route::get('cart','FrontendController@getCart');
Route::get('checkout','FrontendController@getCheckout');
Route::get('login','FrontendController@getLogin');
Route::post('/postLogin','FrontendController@postLogin');
Route::get('logout','FrontendController@logout');
Route::get('themyeuthich/{id}','FrontendController@themyt');
Route::post('postdangnhap','FrontendController@postdangnhap');
Route::post('/postRegister','FrontendController@postRegister');
Route::get('register','FrontendController@getRegister');
Route::get('loc','FrontendController@locSanpham');
Route::get('all','FrontendController@getAll');
Route::get('delete-all','FrontendController@deleteAll');
Route::get('search/{key}','FrontendController@search');
Route::get('doithongtin','FrontendController@doithongtin');
Route::get('search','FrontendController@getSearch');
//gio hang
Route::post('/add-cart-ajax','FrontendController@add_cart_ajax');
Route::get('/gio-hang','FrontendController@gio_hang'); 
Route::get('delete-product/{session_id}','FrontendController@deleteCart');
Route::post('update-cart','FrontendController@update_cart');
Route::post('payment','FrontendController@payment');
Route::get('/quenmatkhau','FrontendController@quenmatkhau');
Route::post('/postQuen','FrontendController@postQuen');
Route::get('/xacnhantoken','FrontendController@xacnhantoken');
Route::post('/nhantoken','FrontendController@postToken');
Route::post('passmoi','FrontendController@newpass');
Route::get('lichsu','FrontendController@lichsu');
Route::get('huydon/{id}','FrontendController@huydon');
Route::post('binhluan','FrontendController@binhluan');

//Admin

Route::get('/admin/dashboard','AdminController@basic');
Route::get('/admin/login','AdminController@getLogin');
Route::get('/admin/list','AdminController@getList');
Route::get('/admin/insert-product','AdminController@themSanPham');
Route::get('/admin/duyet-sanpham','AdminController@duyetSanPham');
Route::get('/admin/thong-ke','AdminController@thongke');
Route::post('/admin/postThongKe','AdminController@postThongKe');
Route::post('/admin/xacnhan','DonHangController@xacnhan');
Route::post('/admin/postSua','AdminController@postSua');
Route::get('/admin/postXoa/{id}','AdminController@postXoa');
Route::post('/admin/postLogin','AdminController@postLogin');
Route::get('admin/logout','AdminController@logout');

//San Pham
Route::get('/admin/sua-sanpham/{id}','AdminController@suaSanPham');
Route::post('/postThem','AdminController@postThem');

//ADMIN DON HANG
//List danh sách đơn hàng
Route::get('/admin/list-donhang','DonHangController@listdonhang');
//List đơn hàng mới
Route::get('/admin/don-hang','DonHangController@getList');
Route::get('/admin/chi-tiet/{id}','DonHangController@chiTietDonHang');





Route::get('quaylai','QuanTriController@quaylai');

//QUan Tri Vien

Route::get('qtv/dashboard','QuanTriController@index');
Route::get('qtv/danh-sach-shop','QuanTriController@getDanhSachShop');
Route::get('qtv/duyet-shop','QuanTriController@getDuyetShop');
Route::get('qtv/don-hang','QuanTriController@getDonHang');
Route::get('qtv/danh-sach-thanh-vien','QuanTriController@getDanhSachThanhVien');
Route::get('qtv/san-pham-cho-duyet','QuanTriController@getDanhSachChoDuyet');
Route::get('qtv/danhsachdonhang','QuanTriController@getDSDH');
Route::get('qtv/xac-nhan-don-hang/{id}','QuanTriController@xacnhandon');
Route::get('qtv/duyetshop/{id}','QuanTriController@duyetshop');
Route::get('qtv/chi-tiet/{id}','QuanTriController@chitiet');
Route::get('qtv/duyetsp/{id}','QuanTriController@duyetsp');
Route::get('qtv/khongduyet/{id}','QuanTriController@khongduyet');
Route::get('qtv/login','QuanTriController@login');
Route::post('qtv/postLogin','QuanTriController@postLogin');
Route::get('qtv/chitiet-donhang/{id}','QuanTriController@chitietdonhang');
Route::get('qtv/logout','QuanTriController@logout');
