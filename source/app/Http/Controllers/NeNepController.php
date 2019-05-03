<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MaLoiViPham;
use App\ListViPham;

class NeNepController extends Controller
{
	public function getCapNhat()
	{
		return view('Admin.QuanLyNeNep.CapNhatNoiQuy',[
			'listMaLoi' => MaLoiViPham::all(),
		]);
	}
	public function postCapNhat(Request $request)
	{
		$this->validate($request,
		[
			'ndloi' => 'required',
			'diemtru' => 'required',
		],
		[
			'ndloi.required' => 'Nhập vào nội dung của lỗi vi phạm',
			'diemtru.required' => 'Nhập vào điểm trừ',
		]);

		$maloivipham = new MaLoiViPham;
		$maloivipham->noidung = $request->ndloi;
		$maloivipham->diemtru = $request->diemtru;
		$maloivipham->ghichu = $request->ghichu;
		$maloivipham->save();
		return redirect()->back()->with(['flash_level'=>'success','flash_message' => "Thêm thành công lỗi vi phạm: <strong>$maloivipham->noidung</strong>"]);
	}
	public function getTongHop()
	{
		$listvipham = null;
		$datavipham = ListViPham::all();
		foreach ($datavipham as $data) {
			$listvipham[getTuanDB($data->created_at)][] = $data;
		}
		return view('Admin.QuanLyNeNep.tongHopViPham', [
			'listweekViPham' => $listvipham,
		]);
	}
	public function getXoaLoi($idloi)
	{
		$idloi = dellKyTuDacBiet($idloi);
		$kiemtra = ListViPham::where('id', '=', $idloi)->count();
		if($kiemtra == 0){
			return redirect()->back()->with(['flash_level'=>'danger','flash_message' => "Không tìm thấy lỗi vi phạm cần xóa"]);
		}else{
			$datavipham = ListViPham::find($idloi);
			$hovaten = $datavipham->HocSinh->hovaten;
			$ndung = $datavipham->LoiViPham->noidung;
			$datavipham->delete();
			return redirect()->back()->with(['flash_level'=>'success','flash_message' => "Xóa thành công lỗi cho học sinh: <strong>".$hovaten."</strong> với lỗi vi phạm là: <strong>".$ndung."</strong>"]);
		}
	}
	public function getXoaMaLoi($idloi)
	{
		$idloi = dellKyTuDacBiet($idloi);
		$kiemtra = MaLoiViPham::where('id', '=', $idloi)->count();
		if($kiemtra == 0){
			return redirect()->back()->with(['flash_level'=>'danger','flash_message' => "Không tìm thấy mã lỗi vi phạm cần xóa"]);
		}else{
			$datavipham = MaLoiViPham::find($idloi);
			$ndung = $datavipham->noidung;
			$datavipham->delete();
			return redirect()->back()->with(['flash_level'=>'success','flash_message' => "Xóa thành công mã lỗi vi phạm là: <strong>".$ndung."</strong>"]);
		}
	}
	public function postInFoMaLoi(Request $request)
	{

		$request->idMaLoi = dellKyTuDacBiet($request->idMaLoi);
		$kiemtra = MaLoiViPham::where('id', '=', $request->idMaLoi)->count();
		if($kiemtra == 0){
			return null;
		}else{
			$datavipham = MaLoiViPham::find($request->idMaLoi);
			return response()->json($datavipham, 200);
		}
	}
	public function postChinhSuaNoiQuy(Request $request)
	{
		$request->idMaLoi = dellKyTuDacBiet($request->idMaLoi);
		$kiemtra = MaLoiViPham::where('id', '=', $request->idMaLoi)->count();
		if($kiemtra == 0){
			return redirect()->back()->with(['flash_level'=>'danger','flash_message' => "Không tìm thấy mã lỗi vi phạm cần sửa"]);
		}else{
			$this->validate($request,
			[
				'editndloi' => 'required',
				'editdiemtru' => 'required',
			],
			[
				'editndloi.required' => 'Nhập vào nội dung của lỗi vi phạm',
				'editdiemtru.required' => 'Nhập vào điểm trừ',
			]);
			$maloivipham = MaLoiViPham::find($request->idMaLoi);
			$maloivipham->noidung = $request->editndloi;
			$maloivipham->diemtru = $request->editdiemtru;
			$maloivipham->ghichu = $request->editghichu;
			$maloivipham->save();
			return redirect()->back()->with(['flash_level'=>'success','flash_message' => "Sửa thành công lỗi vi phạm: <strong>$maloivipham->noidung</strong>"]);
		}
	}
}
