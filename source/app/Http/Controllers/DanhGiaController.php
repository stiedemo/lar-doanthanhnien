<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhGia;
use DB;

class DanhGiaController extends Controller
{
    public function getpheduyet($id)
    {
		$id = dellKyTuDacBiet($id);
		if($id == 'all'){
			$affected = DB::update('UPDATE danh_gia SET tinhtrang = 1 WHERE tinhtrang = 0');
			return redirect()->back()->with(['flash_level'=>'success','flash_message' => "Phê duyệt thành công <strong>".$affected."</strong> nhận xét nằm trong hàng chờ"]);
		}else{
			$kiemtra = DanhGia::where('id', '=', $id)->count();
			if($kiemtra == 0){
				return redirect()->back()->with(['flash_level'=>'danger','flash_message' => "Không tìm thấy nhận xét cần phê duyệt"]);
			}else{
				$danhgia = DanhGia::find($id);
				$titleThongBao = $danhgia->danhgia;
				$danhgia->tinhtrang = 1;
				$danhgia->save();
				return redirect()->back()->with(['flash_level'=>'success','flash_message' => "Phê duyệt thành công nhận xét: <strong>".$titleThongBao."</strong>"]);
			}
		}
    }
    public function getxoapheduyet($id)
    {
		$rules = [
			'idtinh' => 'required',
		];
		$messengers = [
    			'idtinh.required' => 'Nhập vào địa chỉ Tỉnh!',
		];
		$validate = Validator::make($request->all(), $rules, $messengers);
		$id = dellKyTuDacBiet($id);
		$kiemtra = DanhGia::where('id', '=', $id)->count();
		if($kiemtra == 0){
			return redirect()->back()->with(['flash_level'=>'danger','flash_message' => "Không tìm thấy nhận xét cần phê duyệt"]);
		}else{
			$danhgia = DanhGia::find($id);
			$titleThongBao = $danhgia->danhgia;
			$danhgia->delete();
			return redirect()->back()->with(['flash_level'=>'success','flash_message' => "Xóa thành công yêu cầu Phê duyệt thành công nhận xét: <strong>".$titleThongBao."</strong>"]);
		}
    }
}
