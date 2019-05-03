<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BaiDang;
use App\DanhGia;
use App\User;
use Auth;
use Validator;

class homeController extends Controller
{
	/* ------------------- */
	public function getHome()
	{
		$getNewPost = BaiDang::orderBy('id', 'DESC')->limit(7)->get();
		# Gọi ra view thích hợp với tình trạng hiện tại chủa người dùng
		return view("homeViews");
	}
	/* ---------------------------------- */
	public function getTheLoai($theloainame)
	{
		return "Đây là trang thể loại: $theloainame";
	}
	/* ---------------------------------- */
	public function getLoaiTin($loaitinname)
	{
		return "Đây là trang loại tin: $loaitinname";
	}
	/* ---------------------------------- */
	public function getBaiDang($baidangname)
	{
		return "Đây là trang bài đăng: $baidangname";
	}
	/* ---------------------------------- */
	public function getBaiDangCongVan($baidangname)
	{
		$idbaidang = explode('-', $baidangname);
		$idbaidang = $idbaidang[count($idbaidang) - 1];
		$idbaidang = dellKyTuDacBiet($idbaidang);
		if(BaiDang::where('id',$idbaidang)->count() == 0){
			return redirect()->back()->with(['flash_level'=>'danger','flash_message' => "Không tìm thấy công văn cần hiển thị"]);
		}else{
			return view('Layouts.Posts.viewCongVan', [
				'congvan' => BaiDang::find($idbaidang),
			]);
		}	
	}


	public function postDanhGia(Request $request)
	{

		$rules = [
			'ten' => 'required',
			'sodienthoai' => 'required',
			'sao' => 'required'
		];
		$messengers = [
    			'ten.required' => 'Bạn chưa nhập Tên!',
    			'sodienthoai.required' => 'Bạn chưa nhập Số điện thoại!',
    			'sao.required' => 'Bạn chưa chọn số sao bình chọn!',
		];
		$validate = Validator::make($request->all(), $rules, $messengers);
		if($validate->fails()){
			return response()->json([
				'error' => true,
				'message' => $validate->errors()
			], 200);
		}else{
			$request->sodienthoai = phonechange($request->sodienthoai);
			if($request->sodienthoai == false){
				return response()->json([
					'error' => true,
					'message' => array(
						'sodienthoai' => [0 => 'Số điện nhập vào không được chấp nhận'],
					)
				], 200);
			}else{
				$danhgia = new DanhGia;
				$danhgia->ten = $request->ten;
				$danhgia->sodienthoai = $request->sodienthoai;
				$danhgia->sao = $request->sao;
				$danhgia->danhgia = $request->danhgia;
				if($request->danhgia == null){
					$danhgia->tinhtrang = 1;
					$message = null;
				}else{
					$danhgia->tinhtrang = 0;
					$message = 'Gửi đánh giá thành công. Vì trong đánh giá của bạn có nội dung nhận xét nên sẽ được kiểm duyệt trước khi đăng tải.';
				}
				$danhgia->save();
				return response()->json([
					'error' => false,
					'message' => $message,
				], 200);
			}
		}
	}
	public function getLogout()
	{
    	Auth::logout();
    	return redirect()->route('home');
	}
	public function postChangeAvatar(Request $request)
	{

		$rules = [
			'images' => 'required|image',
		];
		$messengers = [
			'images.required' => 'Vui lòng chọn hình ảnh cần upload',
			'images.image' => 'File phải là file hình ảnh',
		];
		$validate = Validator::make($request->all(), $rules, $messengers);
		if($validate->fails()){
			return redirect()->back()->with(['flash_level'=>'danger','flash_message' => $validate->errors()->messages()['images'][0] ]);
		}else{
			$filesName = $request->file('images')->getClientOriginalName();
			$users = User::find(Auth::user()->id);
			$users->avatar = $filesName;
			$request->file('images')->move('Libs/images/users/', $filesName);
			$users->save();
			return redirect()->back()->with(['flash_level'=>'success','flash_message' => 'Thay đổi thành công Ảnh đại diện của tài khoản' ]);
		}
	}
}
