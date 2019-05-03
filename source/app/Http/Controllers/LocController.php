<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\ChiDoan;
use App\DCTinh;
use App\DCHuyen;
use App\DCXa;

class LocController extends Controller
{
	public function getLoc()
	{
		# Lấy các dữ liệu cần thiết:
		return view('Layouts.LocView.getLocView', [
			'getAllNamHoc' => DB::table('nam_hoc')->get(),
			'getAllTinh' => DB::table('diachi_tinh')->get(),
		]);
	}
	public function postLoc(Request $request)
	{
		$rqData = DB::table('hoc_sinh');
		$dem  = 0;
		foreach ($request->all() as $key => $requestData) {
			if(($requestData != null) and ($key != '_token')){
				$dem ++;
				$rqData->where($key, $requestData);
			}
		}
		if($dem != 0){
			$rqData = $rqData->get()->toArray();
			for ($i=0; $i < count($rqData); $i++) { 
				$rqData[$i]->tenkhonggiau = changeTitle($rqData[$i]->hovaten);
				$rqData[$i]->chidoan = getchidoanid($rqData[$i]->idchidoan);
			}
			return response()->json($rqData, 200);
		}else{
			return response()->json([
				'error' => true,
				'message' => 'Vui lòng chọn một trường để lọc'
			], 200);
		}
	}

	public function getDiaChiHuyen(Request $request)
	{
		$rules = [
			'idtinh' => 'required',
		];
		$messengers = [
    			'idtinh.required' => 'Nhập vào địa chỉ Tỉnh!',
		];
		$validate = Validator::make($request->all(), $rules, $messengers);
		if($validate->fails()){
			return response()->json([
				'error' => true,
				'message' => $validate->errors()
			], 200);
		}
		$request->idtinh = dellKyTuDacBiet($request->idtinh);
		if(DB::table('diachi_huyen')->where('idtinh',$request->idtinh)->count() == 0){
			# Trường hợp không tồn tại
			return response()->json([
				'error' => true,
				'message' => 'Tỉnh không tồn tại',
			], 200);
		}else{
			$diachihuyen = DB::table('diachi_huyen')->where('idtinh', $request->idtinh)->select('id', 'huyen')->get()->toArray();
			return response()->json($diachihuyen, 200);
		}	
	}
	public function getDiaChiXa(Request $request)
	{
		$rules = [
			'idhuyen' => 'required',
		];
		$messengers = [
    			'idhuyen.required' => 'Nhập vào địa chỉ Huyện!',
		];
		$validate = Validator::make($request->all(), $rules, $messengers);
		if($validate->fails()){
			return response()->json([
				'error' => true,
				'message' => $validate->errors()
			], 200);
		}
		$request->idhuyen = dellKyTuDacBiet($request->idhuyen);
		if(DB::table('diachi_xa')->where('idhuyen',$request->idhuyen)->count() == 0){
			# Trường hợp không tồn tại
			return response()->json([
				'error' => true,
				'message' => 'Huyện không tồn tại',
			], 200);
		}else{
			$diachixa = DB::table('diachi_xa')->where('idhuyen', $request->idhuyen)->select('id', 'xa')->get()->toArray();
			return response()->json($diachixa, 200);
		}	
	}
	public function getChiDoan($idChiDoan)
	{
		$idChiDoan = dellKyTuDacBiet($idChiDoan);
		if(DB::table('chi_doan')->where('id',$idChiDoan)->count() == 0){
			# Trường hợp không tồn tại
			return redirect()->back()->with(['flash_level'=>'danger','flash_message' => "Không tìm thấy Chi Đoàn cần hiển thị"]);
		}else{
			return view('Layouts.LocView.locChiDoan', [
				'getChiDoan' => ChiDoan::find($idChiDoan),
			]);
		}
	}
	public function getDCTinh($idtinh)
	{
		$idtinh = dellKyTuDacBiet($idtinh);
		if(DB::table('diachi_tinh')->where('id',$idtinh)->count() == 0){
			# Trường hợp không tồn tại
			return redirect()->back()->with(['flash_level'=>'danger','flash_message' => "Không tìm thấy Địa Chỉ cần hiển thị"]);
		}else{
			return view('Layouts.LocView.locDiaChi', [
				'HSdiaChi' => DCTinh::find($idtinh),
				'name' => DCTinh::find($idtinh)->tinh
			]);
		}
	}
	public function getDCHuyen($idhuyen)
	{
		$idhuyen = dellKyTuDacBiet($idhuyen);
		if(DB::table('diachi_huyen')->where('id',$idhuyen)->count() == 0){
			# Trường hợp không tồn tại
			return redirect()->back()->with(['flash_level'=>'danger','flash_message' => "Không tìm thấy Địa Chỉ cần hiển thị"]);
		}else{
			return view('Layouts.LocView.locDiaChi', [
				'HSdiaChi' => DCHuyen::find($idhuyen),
				'name' => DCHuyen::find($idhuyen)->huyen
			]);
		}
	}
	public function getDCXa($idxa)
	{
		$idxa = dellKyTuDacBiet($idxa);
		if(DB::table('diachi_xa')->where('id',$idxa)->count() == 0){
			# Trường hợp không tồn tại
			return redirect()->back()->with(['flash_level'=>'danger','flash_message' => "Không tìm thấy Địa Chỉ cần hiển thị"]);
		}else{
			return view('Layouts.LocView.locDiaChi', [
				'HSdiaChi' => DCXa::find($idxa),
				'name' => DCXa::find($idxa)->xa
			]);
		}
	}
}
