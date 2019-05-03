<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChiDoan;
use App\DCTinh;
use App\HocSinh;
use App\MaLoiViPham;
use App\ListViPham;
use PHPExcel_IOFactory;
use Auth;

class HocSinhController extends Controller
{
	public function getChiDoan()
	{
		# Xử lý chi đoàn: 
		# Phần tách các chi đoàn:
		$listkhoahoc = array();
		$chidoan = ChiDoan::all();
		foreach($chidoan as $cd){
			$kh = $cd->nambatdau . '-' . $cd->namketthuc;
			$listkhoahoc[$kh][] = $cd;
		}
		return view('Admin.QuanLyHocSinh.ChiDoan.listChiDoan', [
			'listKhoaHoc' => $listkhoahoc,
		]);
	}
	public function postChiDoan(Request $request)
	{
		$this->validate($request,
		[
			'namechidoan' => 'required',
			'gvcn' => 'required',
			'nienkhoa' => 'required',
		],
		[
			'namechidoan.required' => 'Vui lòng nhập vào ít nhất một tên chi đoàn',
			'gvcn.required' => 'Vui lòng nhập vào giáo viên chủ nhệm tương ứng',
			'nienkhoa.required' => 'Vui lòng nhập vào niên khóa tương ứng',
		]);
		$tenChiDoan = explode(',', $request->namechidoan);
		$giaoviencn = explode(',', $request->gvcn);
		$nienkhoa = explode('-', $request->nienkhoa);
		if(count($nienkhoa) != 2){
			return redirect()->back()->with(['flash_level'=>'danger','flash_message' => "Vui lòng nhập vào niên khóa thích hợp"]);
		}
		if(count($tenChiDoan) != count($giaoviencn)){
			return redirect()->back()->with(['flash_level'=>'danger','flash_message' => "Vui lòng nhập đầy đủ lần lượt tên giáo viên chủ nhiệm ứng với các tên chi đoàn"]);
		}
		$dem = 0;
		foreach ($tenChiDoan as $name) {
			$chidoan = new ChiDoan;
			$chidoan->tenchidoan = ChuanHoa($name);
			$chidoan->nambatdau = ChuanHoa($nienkhoa[0]);
			$chidoan->namketthuc = ChuanHoa($nienkhoa[1]);
			$chidoan->gvcn = ChuanHoa($giaoviencn[$dem]);
			$dem++;
			$chidoan->save();
		}
		return redirect()->back()->with(['flash_level'=>'success','flash_message' => "Thêm mói thành công"]);
	}
	public function getDiaChi()
	{
		return view('Admin.QuanLyHocSinh.DiaChi.listDiaChi', [
			'listDiaChi' => DCTinh::all(),
		]);
	}
	public function getImport()
	{
		return view('Admin.QuanLyHocSinh.CongCu.getImport', [
			'listDiaChi' => DCTinh::all(),
		]);
	}
	public function postImport(Request $request)
	{
		# Kiểm tra file nhập vào có trốn không:
		$this->validate($request,
		[
			'uploadhs' => 'required',
		],
		[
			'uploadhs.required' => 'Vui lòng chọn file Excel cần uploads',
		]);
		$file = $request->file('uploadhs');
		$objReader = PHPExcel_IOFactory::createReaderForFile($file);
		$listWorkSheets = $objReader->listWorksheetNames($file); // Danh sách lớp
		$nameSheet = $listWorkSheets[0];
		$objExcel = $objReader->load($file);
		$sheetData = $objExcel->getActiveSheet()->toArray('null',true,true,true);
		# Xử lý dữ liệu thô nhập vào: 
		$listClass = getListIdClass();
		$listDiaChi = getListIdDiaChi(DCTinh::all());
		$rowBienGoc = null;
		$char = 'A';
		if($sheetData[2]['A'] != 'doanthanhnien'){
			return redirect()->back()->with(['flash_level'=>'danger','flash_message' => "Vui lòng nhập liệu vào file mẫu hệ thống cung cấp"]);
		}
		foreach($sheetData[2] as $data){
			if($data != 'null'){
				$rowBienGoc[$data] = $char;
				$char ++;
			}
		}
		$dataInserts = null;
		array_splice($sheetData, 0, 2);
		$erDiaChi = 0;
		foreach ($sheetData as $dataTho) {
			$data = null;
			$rowBien = $rowBienGoc;
			# Xử lý giá trị null:
			$demnull = 0;
			foreach ($rowBienGoc as $bien) {
				if($dataTho[$bien] == 'null'){
					$demnull ++;
					$dataTho[$bien] = null;
				}
			}
			if($demnull == count($rowBienGoc)){
				continue;
			}
			# Xử lý lớp:
			$dataTho[$rowBien['chidoan']] = $listClass[$dataTho[$rowBien['chidoan']]];
			# Xử lý họ và tên
			$hovaten = explode(' ', $dataTho[$rowBien['hovaten']]);
			$rowBien['hodem'] = '1';
			$rowBien['ten'] = '2';
			$rowBien['iddiachitinh'] = '3';
			$dataTho[$rowBien['iddiachitinh']] = null;
			$rowBien['iddiachihuyen'] = '4';
			$dataTho[$rowBien['iddiachihuyen']] = null;
			$rowBien['iddiachixa'] = '5';
			$dataTho[$rowBien['iddiachixa']] = null;
			$dataTho[$rowBien['ten']] = $hovaten[count($hovaten) - 1];
			array_splice($hovaten, count($hovaten) - 1, 1);
			$dataTho[$rowBien['hodem']] = implode(' ', $hovaten);
			# Xử Lý Ngày Sinh: 
			$dataTho[$rowBien['ngaysinh']] = saveDate($dataTho[$rowBien['ngaysinh']]);
			# Xử lý địa chỉ:
			$getDiaChi = explode(',', $dataTho[$rowBien['diach']]);
			if(count($getDiaChi) == 4){
				$getDiaChi[3] = ChuanHoa($getDiaChi[3]);
				if(isset($listDiaChi[$getDiaChi[3]]['id'])){
					$dataTho[$rowBien['iddiachitinh']] = $listDiaChi[$getDiaChi[3]]['id'];
					$getDiaChi[2] = ChuanHoa($getDiaChi[2]);
					if(isset($listDiaChi[$getDiaChi[3]][$getDiaChi[2]]['id'])){
						$dataTho[$rowBien['iddiachihuyen']] = $listDiaChi[$getDiaChi[3]][$getDiaChi[2]]['id'];
						$getDiaChi[1] = ChuanHoa($getDiaChi[1]);
						if(isset($listDiaChi[$getDiaChi[3]][$getDiaChi[2]][$getDiaChi[1]]['id'])){
							$dataTho[$rowBien['iddiachixa']] = $listDiaChi[$getDiaChi[3]][$getDiaChi[2]][$getDiaChi[1]]['id'];
						}else{
							$erDiaChi++;
						}
					}else{
						$erDiaChi++;
					}
				}else{
					$erDiaChi++;
				}
			}else{
				$erDiaChi++;
			}
			#Tiến hành import:
			$data['hovaten'] = $dataTho[$rowBien['hovaten']];
			$data['hodem'] = $dataTho[$rowBien['hodem']];
			$data['ten'] = $dataTho[$rowBien['ten']];
			$data['gioitinh'] = $dataTho[$rowBien['gioitinh']];
			$data['ngaysinh'] = $dataTho[$rowBien['ngaysinh']];
			$data['diachi'] = $dataTho[$rowBien['diach']];
			$data['sodienthoai'] = phonechange($dataTho[$rowBien['sodienthoai']]);
			$data['iddiachitinh'] = $dataTho[$rowBien['iddiachitinh']];
			$data['iddiachihuyen'] = $dataTho[$rowBien['iddiachihuyen']];
			$data['iddiachixa'] = $dataTho[$rowBien['iddiachixa']];
			$data['idchidoan'] = $dataTho[$rowBien['chidoan']];
			$data['isdoanvien'] = $dataTho[$rowBien['isdoanvien']];
			$data['chucvu'] = $dataTho[$rowBien['chucvu']];
			$data['tenbo'] = $dataTho[$rowBien['tenbo']];
			$data['tenme'] = $dataTho[$rowBien['tenme']];
			$data['dantoc'] = $dataTho[$rowBien['dantoc']];
			$data['tongiao'] = $dataTho[$rowBien['tongiao']];
			$data['dienchinhsach'] = $dataTho[$rowBien['dienchinhsach']];
			$dataInserts[] = $data;
		}
		HocSinh::insert($dataInserts);
		$countData = count($dataInserts);
		$thongbao = "Thực hiện thêm giữ liệu vào hệ thống thành công. Đã thêm: $countData Học sinh. Trong đó có $erDiaChi học sinh không thể nhận dạng được địa chỉ. Các học sinh không nhận dạng được địa chỉ sẽ được liệt kê tại đây.";
		return redirect()->back()->with(['flash_level'=>'success','flash_message' => $thongbao]);
	}

	public function getThongTin($requests)
	{
		$SHocSinh = explode('-', $requests);
		$idHocSinh = $SHocSinh[count($SHocSinh) - 1];
		$idHocSinh = dellKyTuDacBiet($idHocSinh);
		if(HocSinh::where('id', $idHocSinh)->count() == 0){
			# Trường hợp không tồn tại
			return redirect()->back()->with(['flash_level'=>'danger','flash_message' => "Không tìm thấy thông tin học sinh phù hợp"]);

		}else{
			$hocsinh = HocSinh::find($idHocSinh);
			if(changeTitle($hocsinh->hovaten) . '-' . $hocsinh->id != $requests){
				return redirect()->route('thongtinhocsinh', changeTitle($hocsinh->hovaten) . '-' . $hocsinh->id);
			}
			return view('Layouts.infoHocSinh', [
				'getHocSinh' => $hocsinh,
				'maLoiViPham' => MaLoiViPham::all(),
				'listViPham' => ListViPham::where('idhocsinh', $hocsinh->id)->orderBy('id', 'DESC')->get(),
			]);
		}	
	}
	public function addMaLoi($idHocSinh, $idMaLoi)
	{
		$idHocSinh = dellKyTuDacBiet($idHocSinh);
		$idMaLoi = dellKyTuDacBiet($idMaLoi);
		if((HocSinh::where('id', $idHocSinh)->count() == 0) || (MaLoiViPham::where('id', $idMaLoi)->count() == 0)){
			# Trường hợp không tồn tại
			return redirect()->back()->with(['flash_level'=>'danger','flash_message' => "Không tìm thấy thông tin thích hợp"]);

		}else{
			$loiViPham = new ListViPham;
			$loiViPham->idhocsinh = $idHocSinh;
			$loiViPham->idmaloi = $idMaLoi;
			$loiViPham->idnamhoc = getMaxidNamHoc();
			$loiViPham->idusers = Auth::user()->id;
			$loiViPham->save();
			return redirect()->back()->with(['flash_level'=>'success','flash_message' => "Thêm thành công lỗi vi phạm cho học sinh"]);
		}	
	}
}
