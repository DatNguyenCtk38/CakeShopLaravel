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
//Mail
Route::get('send', 'MailController@getSend');
Route::get('choi', 'MailController@getChoi');
//

Route::group(['prefix' => 'quanlytaikhoan'], function() {
    Route::get('ho-so', [
	'as'=>'ho-so',
	'uses'=>"FrontUserController@getQuanLyTaiKhoan"
	]);
	Route::get('editemail', [
	'as'=>'editemail',
	'uses'=>"FrontUserController@getEditEmail"
	]);
	Route::post('editemail',[
	'as'=>'editemail',
	'uses'=>"FrontUserController@postEditEmail"
	]);
	Route::get('editProfile',[
	'as'=>'editprofile',
	'uses'=>'FrontUserController@getEditProfile'
	]);
	Route::post('editProfile',[
	'as'=>'editprofile',
	'uses'=>'FrontUserController@postEditProfile'
	]);
	Route::get('changePassword',[
	'as'=>'changePassword',
	'uses'=>'FrontUserController@getchangePassword'
	]);
	Route::post('changePassword',[
	'as'=>'changePassword',
	'uses'=>'FrontUserController@postchangePassword'
	]);
	Route::get('lich-su-mua-hang', [
	'as'=>'lichsumuahang',
	'uses'=>'FrontUserController@getLichSuMuaHang'
	]);
	Route::get('chi-tiet-mua-hang/{id}', [
	'as'=>'chitietmuahang',
	'uses'=>'FrontUserController@getChiTietMuaHang'
	]);
	Route::get('don-dat-hang', [
	'as'=>'dondathang',
	'uses'=>"FrontUserController@getDonHang"
	]);
	Route::get('xoa-don-dat-hang', [
	'as'=>'xoadondathang',
	'uses'=>"FrontUserController@xoadondathang"
	]);
	Route::get('ma-giam-gia',[
	'as'=>'magiamgia',
	'uses'=>'FrontUserController@getMaGiamGia'
	]);
});
Route::get('/',[
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
	]);

Route::get('loai-san-pham/{type}-{slug}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
	]);
Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChiTietSanPham'
	]);
Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienHe'
	]);
Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioiThieu'
	]);
Route::get('add-to-card/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddToCart'
	]);
Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
	]);
Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
	]);

Route::post('chuyen-hang',[
	'as'=>'chuyenhang',
	'uses'=>'PageController@postCheckout'
	]);
Route::get('dang-nhap',[
	'as'=>'dangnhap',
	'uses'=>'PageController@getLogin'
	]);
Route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
	]);
Route::get('dang-ky',[
	'as'=>'dangky',
	'uses'=>'PageController@getSignin'
	]);
Route::post('dang-ky',[
	'as'=>'dangky',
	'uses'=>'PageController@postSignin'
	]);
Route::get('dang-xuat',[
	'as'=>'dangxuat',
	'uses'=>'PageController@postLogout'
	]);
Route::get('tim-kiem',[
	'as'=>'timkiem',
	'uses'=>'PageController@getTimKiem'
	]);
Route::get('search',[
	'as'=>'timkiem',
	'uses'=>'PageController@postTimTheoGia'
]);
Route::get('Addcartajax', [
	'as'=>'Addcartajax',
	'uses'=>'PageController@getAddcartajax'
	]);
Route::get('UpdateCart', [
	'as'=>'UpdateCart',
	'uses'=>'AjaxController@getUpdatecartajax'
]);
Route::get('DeleteCart',[
	'as'=>'DeleteCart',
	'uses'=>'AjaxController@getDeletecartajax'
]);
Route::get('SortChange', [
	'as'=>'SortChange',
	'uses'=>'AjaxController@SortChangeajax'
]);
Route::get('CheckCode', [
	'as'=>'CheckCode',
	'uses'=>'AjaxController@CheckCode'
]);
//////////////admin
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

	//index
	Route::get('index',[
		'as'=>'index',
		'uses'=>'AdminController@getIndex'
		]);
	//Thể loại
	Route::group(['prefix' => 'theloai'],function() {
	    Route::get('danh-sach-the-loai', [
	    	'as'=>'danhsachtheloai',
	    	'uses'=>'TheloaiController@getDanhSachTheLoai'
	    	]);
	    Route::get('them-the-loai',[
	    	'as'=>'themtheloai',
	    	'uses'=>'TheloaiController@getThemTheLoai'
	    	]);
	    Route::get('sua-the-loai/{id}',[
	    	'as'=>'suatheloai',
	    	'uses'=>'TheloaiController@getSuaTheLoai'
	    	]);
	    Route::get('xoatheloai/{id}', [
	    	'as'=>'xoatheloai',
	    	'uses'=>'TheloaiController@getXoaTheLoai'
	    	]);
	    //
	    //---------------------POST
	    Route::post('addProductType', [
	    	'as'=>'addProductType',
	    	'uses'=>'TheloaiController@postThemTheLoai'
	    	]);
	    Route::post('editProductType/{id}',[
	    	'as'=>'editProductType',
	    	'uses'=>'TheloaiController@postSuaTheLoai'
	    	]);
	});
	//Sản phẩm
	Route::group(['prefix' => 'sanpham'], function() {
	    Route::get('danh-sach-san-pham', [
	    	'as'=>'danhsachsanpham',
	    	'uses'=>'SanPhamController@getDanhSachSanPham'
	    	]);
	    Route::get('them-san-pham',[
	    	'as'=>'themsanpham',
	    	'uses'=>'SanPhamController@getThemSanPham'
	    	]);
	    Route::get('sua-san-pham/{id}',[
	    	'as'=>'suasanpham',
	    	'uses'=>'SanPhamController@getSuaSanPham'
	    	]);
	    Route::get('delete',[
	    	'as'=>'delete',
	    	'uses'=>'SanPhamController@getXoaSanPham'
	    	]);
	    Route::post('xoasanpham',[
	    	'as'=>'xoasanpham',
	    	'uses'=>'SanPhamController@postXoaSanPham'
	    	]);
	    //POST---------------------------------------
	    Route::post('addProduct',[
	    	'as'=>'addProduct',
	    	'uses'=>'SanPhamController@postThemSanPham'
	    	]);
	    Route::post('editProduct', [
	    	'as'=>'editProduct',
	    	'uses'=>'SanPhamController@postSuaSanPham'
	    	]);
	});
	//Hóa đơn
	Route::group(['prefix'=>'hoadon'],function(){
		Route::get('danhsachhoadon',[
			'as'=>'danhsachhoadon',
			'uses'=>'HoaDonController@getDanhSachHoaDon'
			]);
		Route::get('delete',[
			'as'=>'delete',
			'uses'=>'HoaDonController@getXoaDSHoaDon'
			]);
		Route::get('chi-tiet-hoa-don/{id}',[
			'as'=>'chitiethoadon',
			'uses'=>'HoaDonController@getChiTietHoaDon'
			]);
		Route::get('duyet', [
			'as'=>'duyet',
			'uses'=>'HoaDonController@getDuyet'
		]);
	});
	//Tin tức
	//Route::group(['prefix' => 'tintuc'], function() {
	    Route::get('danh-sach-tin-tuc', [
	    	'as'=>'danhsachtintuc',
	    	'uses'=>'TinTucController@getDanhSachTinTuc'
	    	]);
	    Route::get('them-tin-tuc',[
	    	'as'=>'themtintuc',
	    	'uses'=>'TinTucController@getThemTinTuc'
	    	]);
	    Route::get('sua-tin-tuc/{id}',[
	    	'as'=>'suatintuc',
	    	'uses'=>'TinTucController@getSuaTinTuc'
	    	]);

});
Route::get('admin',[
	'as'=>'admin',
	'uses'=>'AdminController@getLogin'
	]);

Route::post('admin/adminlogin',[
	'as'=>'adminlogin',
	'uses'=>'AdminController@postLogin'
	]);