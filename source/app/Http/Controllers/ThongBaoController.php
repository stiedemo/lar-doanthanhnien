<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\ThongBao;

class ThongBaoController extends Controller
{
	public function getDangThongBao()
	{
		return view('Admin.QuanLyBlogs.BaiDang.getThongBao');
	}
	public function postDangThongBao(Request $request)
	{
		$this->validate($request,
		[
			'title' => 'required',
			'content' => 'required',
		],
		[
			'title.required' => 'Vui lòng nhập vào tiêu đề!',
			'content.required' => 'Vui lòng nhập vào nội dung của thông báo!',
		]);
		$thongbao = new ThongBao;
		$thongbao->tieude = $request->title;
		$thongbao->noidung = $request->content;
		$thongbao->idnamhoc = getMaxidNamHoc();
		$thongbao->iduser = Auth::user()->id;
		$thongbao->save();
		return redirect()->route('admin-dangtaithongbao')->with(['flash_level'=>'success','flash_message' => "Đăng tải thành công thông báo!"]);
	}
	public function delSlides($id)
	{
		$id = dellKyTuDacBiet($id);
		$kiemtra = ThongBao::where('id', '=', $id)->count();
		if($kiemtra == 0){
			return redirect()->route('admin-dangtaithongbao')->with(['flash_level'=>'danger','flash_message' => "Không tìm thấy thông báo cần xóa"]);
		}else{
			$thongbao = ThongBao::find($id);
			$titleThongBao = $thongbao->tieude;
			$thongbao->delete();
			return redirect()->route('admin-dangtaithongbao')->with(['flash_level'=>'success','flash_message' => "Xóa thành công thông báo: <strong>".$titleThongBao."</strong>"]);
		}
	}
}
