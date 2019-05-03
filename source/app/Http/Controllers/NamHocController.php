<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NamHoc;

class NamHocController extends Controller
{
	public function getNamHoc()
	{
		return view('Admin.ThongTinNamHoc.getNamHoc', [
			'getListNamHoc' => NamHoc::all(),
		]);
	}
	public function postNamHoc(Request $request)
	{
		$this->validate($request,
		[
			'txttuanhocdau' => 'required',
			'txtkhaigiang' => 'required',
			'txttongket' => 'required',
		],
		[
			'txttuanhocdau.required' => 'Vui lòng nhập vào ngày thứ 2 của tuần đầu tiên nhập học',
			'txtkhaigiang.required' => 'Vui lòng nhập vào ngày khải giảng',
			'txttongket.required' => 'Vui lòng nhập vào ngày tổng kết',
		]);
		# Kiểm tra ngày tháng 
		$namhoc = new NamHoc;
		$namhoc->tuanhocdau = $request->txttuanhocdau;
		$namhoc->khaigiang = $request->txtkhaigiang;
		$namhoc->tongket = $request->txttongket;
		$namhoc->save();
		return redirect()->route('admin-thongtinnamhoc')->with(['flash_level'=>'success','flash_message' => "Tạo thành công năm học"]);
	}
}
