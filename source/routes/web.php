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

# INDEX: dùng controller để get ra index cần phải hiển thị.
Route::get('/', ['as' => 'home', 'uses' => 'homeController@getHome']);
# Route chức năng đăng ký
Route::post('register', ['as' => 'register', 'uses' => 'LoginController@postRegister']);
Route::get('register', function(){
	return redirect()->route('home');
});
# Route chức năng đăng nhập
Route::post('login', ['as' => 'login', 'uses' => 'LoginController@postLogin']);
Route::get('login', function(){
	return redirect()->route('home');
});
Route::get('logout', ['as' => 'logout', 'uses' => 'homeController@getLogout']);
Route::post('changeavatar', ['as' => 'changeavatar', 'uses' => 'homeController@postChangeAvatar']);
Route::post('danhgiavanhanxet', ['as' => 'danhgiavanhanxet', 'uses' => 'homeController@postDanhGia']);
# Người dùng: Người dùng tiến hành: Bình luận, chia sẻ bài đăng hay tham gia cộng đồng bằng tài khoản với cấp độ người dùng. Với cấp độ người dùng thì dùng chung View với trạng thái không đăng nhập nhưng các chức năng bị ẩn sẽ được mở ra khi đăng nhập
Route::get('the-loai/{theloainame}', ['as' => 'theloai', 'uses' => 'homeController@getTheLoai']);
Route::get('loai-tin/{loaitinname}', ['as' => 'loaitin', 'uses' => 'homeController@getLoaiTin']);

#Route Trang xem bài viết:
Route::group(['prefix' => 'bai-dang'], function(){
	Route::get('{baidangname}.html', ['as' => 'baidang', 'uses' => 'homeController@getBaiDang']);
	Route::get('cong-van/{baidangname}.html', ['as' => 'baidang-congvan', 'uses' => 'homeController@getBaiDangCongVan']);
});
# Quản lý: Đây là cấp độ quản lý hệ thống, bao gồm tất cả các quyền hạn có trong hệ thống

#Bí Thư Chi Đoàn: Đây là cấp độ bí thư chi đoàn

# Ajax:

Route::group(['prefix' => 'ajax'], function(){
	Route::post('/diachihuyen', ['as' => 'ajax-diachihuyen', 'uses' => 'LocController@getDiaChiHuyen']);
	Route::post('/diachixa', ['as' => 'ajax-diachixa', 'uses' => 'LocController@getDiaChiXa']);
	Route::post('/loc', ['as' => 'ajax-loc', 'uses' => 'LocController@postLoc']);
	Route::post('/thongtinmaloi', ['as' => 'ajax-thongtinmaloi', 'uses' => 'NeNepController@postInFoMaLoi']);
});
# Công cụ lọc:

Route::group(['prefix' => 'loc'], function(){
	Route::get('/', ['as' => 'congculoc', 'uses' => 'LocController@getLoc']);
	Route::get('chidoan/{idchidoan}', ['as' => 'locchidoan', 'uses' => 'LocController@getChiDoan']);
	Route::get('diachi/tinh/{idtinh}', ['as' => 'loctinh', 'uses' => 'LocController@getDCTinh']);
	Route::get('diachi/huyen/{idhuyen}', ['as' => 'lochuyen', 'uses' => 'LocController@getDCHuyen']);
	Route::get('diachi/xa/{idxa}', ['as' => 'locxa', 'uses' => 'LocController@getDCXa']);
});
# Thông tin cá nhân của học sinh:

Route::group(['prefix' => 'hoc-sinh'], function(){
	Route::get('thong-tin/{idhocsinh}', ['as' => 'thongtinhocsinh', 'uses' => 'HocSinhController@getThongTin']);
	Route::get('them-ma-loi/{idhocsinh}/{idmaloi}', ['as' => 'themmaloi', 'uses' => 'HocSinhController@addMaLoi']);
});
#Quản Lý Admin

Route::group(['prefix' => 'admin'], function(){
	Route::group(['prefix' => 'quan-ly-blogs'], function(){
		Route::group(['prefix' => 'bai-dang'], function(){
			Route::get('dang-tin-hoat-dong', ['as' => 'admin-dangtinhoatdong', 'uses' => 'BaiDangController@getDangTinHoatDong']);
			Route::get('upload-cong-van', ['as' => 'admin-uploadcongvan', 'uses' => 'BaiDangController@getDangCongVan']);
			Route::post('upload-cong-van', ['as' => 'admin-uploadcongvan', 'uses' => 'BaiDangController@postDangCongVan']);
			# Route Thông báo
			Route::get('dang-tai-thong-bao', ['as' => 'admin-dangtaithongbao', 'uses' => 'ThongBaoController@getDangThongBao']);
			Route::post('dang-tai-thong-bao', ['as' => 'admin-dangtaithongbao', 'uses' => 'ThongBaoController@postDangThongBao']);
			Route::get('xoa-thong-bao/{id}', ['as' => 'admin-deletethongbao', 'uses' => 'ThongBaoController@delSlides']);
		});
		Route::group(['prefix' => 'quan-ly-danh-gia'], function(){
			Route::get('pheduyet/{id}', ['as' => 'admin-pheduyetdanhgia', 'uses' => 'DanhGiaController@getpheduyet']);
			Route::get('xoapheduyet/{id}', ['as' => 'admin-xoapheduyetdanhgia', 'uses' => 'DanhGiaController@getxoapheduyet']);
		});
	});
	Route::group(['prefix' => 'thong-tin-nam-hoc'], function(){
		Route::get('/', ['as' => 'admin-thongtinnamhoc', 'uses' => 'NamHocController@getNamHoc']);
		Route::post('them-nam-hoc', ['as' => 'admin-themmoinamhoc', 'uses' => 'NamHocController@postNamHoc']);
	});
	Route::group(['prefix' => 'quan-li-hoc-sinh'], function(){
		Route::group(['prefix' => 'chi-doan'], function(){
			Route::get('/', ['as' => 'admin-quanlichidoan', 'uses' => 'HocSinhController@getChiDoan']);
			Route::post('them-moi-chi-doan', ['as' => 'admin-themmoichidoan', 'uses' => 'HocSinhController@postChiDoan']);
		});
		Route::group(['prefix' => 'dia-chi'], function(){
			Route::get('/', ['as' => 'admin-quanlidiachi', 'uses' => 'HocSinhController@getDiaChi']);
		});
		Route::group(['prefix' => 'cong-cu'], function(){
			Route::get('import-hoc-sinh', ['as' => 'admin-importhocsinh', 'uses' => 'HocSinhController@getImport']);
			Route::post('import-hoc-sinh', ['as' => 'admin-importhocsinh', 'uses' => 'HocSinhController@postImport']);
		});
	});
	Route::group(['prefix' => 'quan-li-ne-nep'], function(){
		Route::get('tong-hop-hoc-sinh-vi-pham', ['as' => 'admin-tonghophocsinhvipham', 'uses' => 'NeNepController@getTongHop']);
		Route::get('xoa-loi-vi-pham/{idloi}', ['as' => 'admin-xoaloi', 'uses' => 'NeNepController@getXoaLoi']);
		Route::get('xoa-ma-loi-vi-pham/{idloi}', ['as' => 'admin-xoamaloi', 'uses' => 'NeNepController@getXoaMaLoi']);
		Route::get('cap-nhat-noi-quy', ['as' => 'admin-capnhatnoiquy', 'uses' => 'NeNepController@getCapNhat']);
		Route::post('cap-nhat-noi-quy', ['as' => 'admin-capnhatnoiquy', 'uses' => 'NeNepController@postCapNhat']);
		Route::post('chinh-sua-noi-quy', ['as' => 'admin-editmaloi', 'uses' => 'NeNepController@postChinhSuaNoiQuy']);
	});
});