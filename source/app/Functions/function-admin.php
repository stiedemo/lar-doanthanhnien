<?php 
function getInfoClass($idchidoan)
{
	# Xuất ra mảng thông tin về chi đoàn:
	$data['siso'] = DB::table('hoc_sinh')->where('idchidoan', '=', $idchidoan)->count();
	$data['nam'] = DB::table('hoc_sinh')->where('idchidoan', '=', $idchidoan)->where('gioitinh', '=', 'Nam')->count();
	$data['nu'] = DB::table('hoc_sinh')->where('idchidoan', '=', $idchidoan)->where('gioitinh', '=', 'Nữ')->count();
	$data['doanvien'] = DB::table('hoc_sinh')->where('idchidoan', '=', $idchidoan)->where('isdoanvien', '=', '1')->count();
	$data['bithu'] = DB::table('hoc_sinh')->where('idchidoan', '=', $idchidoan)->where('chucvu', '=', 'Bí Thư')->select('hodem', 'ten', 'id')->get();
	if(isset($data['bithu'][0])){
		$data['idbithu'] = $data['bithu'][0]->id;
		$data['bithu'] = $data['bithu'][0]->hodem . ' ' . $data['bithu'][0]->ten;
	}else{
		$data['bithu'] = 'Chưa Thiết Lập';
		$data['idbithu'] = 'null';
	}
	return $data;
}

function getClass($nam)
{
	#Năm nhập vào là năm bắt đầu nhé>
	# Lấy lăm học hiện tai:
	$getid = DB::table('nam_hoc')->max('id');
	$data = DB::table('nam_hoc')->where('id', '=', $getid)->get();
	# Bắt đầu tính toán:
	# Xử lý đưa ra các số liệu
	$nambatdau = $data[0]->khaigiang;

	$nambatdau = explode('-', $nambatdau);
	$nambatdau = $nambatdau[0];
	return 10 + ($nambatdau - $nam);
}
function getchidoanid($id)
{
	#Năm nhập vào là năm bắt đầu nhé>
	# Lấy lăm học hiện tai:
	$getid = DB::table('nam_hoc')->max('id');
	$data = DB::table('nam_hoc')->where('id', '=', $getid)->get();
	# Bắt đầu tính toán:
	# Xử lý đưa ra các số liệu
	$nambatdau = $data[0]->khaigiang;

	$nambatdau = explode('-', $nambatdau);
	$nambatdau = $nambatdau[0];
	#Tính năm:
	$data = DB::table('chi_doan')->find($id);
	$nam = $data->nambatdau;
	return (10 + ($nambatdau - $nam)) . ($data->tenchidoan);
}
function getTuanDB($time)
{
	$time = explode(' ', $time)[0];
	$namhoc = getNamHoc();
	$first_date = strtotime($namhoc->tuanhocdau);
	$second_date = strtotime($time);
	$datediff = abs($first_date - $second_date);
	return floor(($datediff / (60*60*24)) / 7);
}

?>