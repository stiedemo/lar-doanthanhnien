<?php 
function getChucVu()
{
        switch (Auth::user()->chucvu) {
                case '1': return 'memLogin';
                case '2': return 'btLogin';
                case '3': return 'qlLogin';
        }
}
function getNamHoc()
{
	#Năm nhập vào là năm bắt đầu nhé>
	# Lấy lăm học hiện tai:
	$getid = DB::table('nam_hoc')->max('id');
	$data = DB::table('nam_hoc')->where('id', '=', $getid)->get();
	if(count($data) == 0){
		return null;
	}else{
		return $data[0];
	}
}

function getMaxidNamHoc()
{
	#Năm nhập vào là năm bắt đầu nhé>
	# Lấy lăm học hiện tai:
	return DB::table('nam_hoc')->max('id');
}

function getMaxNamHoc()
{
	#Năm nhập vào là năm bắt đầu nhé>
	# Lấy lăm học hiện tai:
	$getid = DB::table('nam_hoc')->max('id');
	if($getid != null){
		$data = DB::table('nam_hoc')->where('id', '=', $getid)->get();
		# Bắt đầu tính toán:
		# Xử lý đưa ra các số liệu
		$nambatdau = explode('-', $data[0]->khaigiang)[0];
		$namketthuc = explode('-', $data[0]->tongket)[0];
		return $nambatdau . ' - ' .$namketthuc;
	}else{
		return null;
	}
}
function getNH($data)
{
	# Bắt đầu tính toán:
	# Xử lý đưa ra các số liệu
	$nambatdau = explode('-', $data->khaigiang)[0];
	$namketthuc = explode('-', $data->tongket)[0];
	return $nambatdau . ' - ' .$namketthuc;
}
function getinfoBlogs($value)
{
	$beg = "[$value]";
	$end = "[/$value]";
	$data = readAllFiles("ConfigSetup.txt");
	$start = strpos($data, $beg ) + strlen($beg);
	$ends = strpos($data, $end );
	$length = $ends - $start;
	return substr( $data,  $start, $length );
}
function totalCount($table, $bien = null, $logic = null, $value = null)
{
	if($bien == null){
		return DB::table($table)->count();
	}else{
		return DB::table($table)->where($bien, $logic, $value)->count();
	}
}
function totalValues($table, $colum,$bien = null, $logic = null, $value = null)
{
	if($bien == null){
		return DB::table($table)->sum($colum);
	}else{
		return DB::table($table)->where($bien, $logic, $value)->sum($colum);
	}
}
function getDanhGia()
{
	return DB::table('danh_gia')->where('tinhtrang', '=', 1)->orderBy('id', 'DESC')->limit(10)->get();
}
function getDanhGiaKD()
{
	return DB::table('danh_gia')->where('tinhtrang', '=', 0)->orderBy('id', 'DESC')->limit(10)->get();
}
function getThongBao()
{
	return DB::table('thong_bao')->orderBy('id', 'DESC')->limit(3)->get();
}
function getNewCongVan()
{
	return false;
}
function getLichCongTac()
{
	$rqketqua = array();
	$maxid =  DB::table('ke_hoach_hoat_dong')->max('id');
	$data = DB::table('ke_hoach_hoat_dong')->find($maxid);
	if($data != null){
		# Bắt Đầu Xử Lý:
		$rqketqua['tuan'] = $data->tuan;
		$dataNoiDung = explode('/', $data->noidung);
		$thu = 2;
		foreach ($dataNoiDung as $value) {
			$values = explode('|', $value);
			$rqketqua[$thu]['noidung'] = $values[0];
			$rqketqua[$thu]['truc'] = changeTat($values[1]);
			$thu ++;
		}
	}else{
		$rqketqua = false;
	}
	return $rqketqua;
}
function changeTat($value)
{
	$dt = explode(' ', $value);
	$rq = null;
	foreach ($dt as $value) {
		$rq = $rq . mb_substr($value, 0,1);
	}
	return $rq;
}
function getListIdClass()
{
	$dataTho = DB::table('chi_doan')->get();
	foreach ($dataTho as $value) {
		$class = getClass($value->nambatdau) . $value->tenchidoan;
		$rq[$class] = $value->id;
	}
	return $rq;
}
function getListIdDiaChi($data)
{
	$rq = null;
	foreach ($data as $tinh) {
		$rq[$tinh->tinh]['id'] = $tinh->id;
		foreach ($tinh->DiaChiHuyen as $huyen) {
			$rq[$tinh->tinh][$huyen->huyen]['id'] = $huyen->id;
			foreach ($huyen->DiaChiXa as $xa) {
				$rq[$tinh->tinh][$huyen->huyen][$xa->xa]['id'] = $xa->id;
			}
		}
	}
	return $rq;
}
?>