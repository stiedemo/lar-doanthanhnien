<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\BaiDang;
use App\TheLoai;

class BaiDangController extends Controller
{
	public function getDangTinHoatDong()
	{
		return view('Admin.QuanLyBlogs.BaiDang.getBaiDang');
	}
	public function getDangCongVan()
	{
		return view('Admin.QuanLyBlogs.BaiDang.getCongVan');
	}
	public function postDangCongVan(Request $request)
	{
		$this->validate($request,
		[
			'tieude' => 'required',
			'idloaitin' => 'required',
			'files' => 'required',
		],
		[
			'tieude.required' => 'Vui lòng nhập vào Tiêu đề của công văn',
			'idloaitin.required' => 'Vui lòng chọn thể loại thích hợp của công văn',
			'files.required' => 'Vui lòng chọn Files văn bản phù hợp của công văn',
		]);
		# Tiến hành lưu thôi:
		$dangcongvan = new BaiDang;
		$dangcongvan->tieude = $request->tieude;
		$dangcongvan->tieudekhongdau = changeTitle($request->tieude);
		$dangcongvan->idloaitin = $request->idloaitin;
		$dangcongvan->mota = $request->mota;
		$dangcongvan->idnguoidang = Auth::user()->id;
		$dangcongvan->idnamhoc = getMaxidNamHoc();
		$dangcongvan->kiemduyet = 1;
		# Tiến hành xử lý file: 
		$filesName = $request->file('files')->getClientOriginalName();
		$dangcongvan->noidung = $filesName;
		$request->file('files')->move('Uploads/Documents/', $filesName);
		$dangcongvan->save();
		return redirect()->back()->with(['flash_level'=>'success','flash_message' => "Upload thành công Công văn: <i> $dangcongvan->tieude </i> với file văn bản: <i> $filesName </i>" ]);
	}
}
