<?php 

function changeTitle($str,$strSymbol='-',$case=MB_CASE_LOWER){// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
	$str=trim($str);
	if ($str=="") return "";
	$str =str_replace('"','',$str);
	$str =str_replace("'",'',$str);
	$str = stripUnicode($str);
	$str = mb_convert_case($str,$case,'utf-8');
	$str = preg_replace('/[\W|_]+/',$strSymbol,$str);
	return $str;
}

function stripUnicode($str){
	if(!$str) return '';
	//$str = str_replace($a, $b, $str);
	$unicode = array(
		'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|å|ä|æ|ā|ą|ǻ|ǎ',
		'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|Å|Ä|Æ|Ā|Ą|Ǻ|Ǎ',
		'ae'=>'ǽ',
		'AE'=>'Ǽ',
		'c'=>'ć|ç|ĉ|ċ|č',
		'C'=>'Ć|Ĉ|Ĉ|Ċ|Č',
		'd'=>'đ|ď',
		'D'=>'Đ|Ď',
		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ë|ē|ĕ|ę|ė',
		'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ë|Ē|Ĕ|Ę|Ė',
		'f'=>'ƒ',
		'F'=>'',
		'g'=>'ĝ|ğ|ġ|ģ',
		'G'=>'Ĝ|Ğ|Ġ|Ģ',
		'h'=>'ĥ|ħ',
		'H'=>'Ĥ|Ħ',
		'i'=>'í|ì|ỉ|ĩ|ị|î|ï|ī|ĭ|ǐ|į|ı',	  
		'I'=>'Í|Ì|Ỉ|Ĩ|Ị|Î|Ï|Ī|Ĭ|Ǐ|Į|İ',
		'ij'=>'ĳ',	  
		'IJ'=>'Ĳ',
		'j'=>'ĵ',	  
		'J'=>'Ĵ',
		'k'=>'ķ',	  
		'K'=>'Ķ',
		'l'=>'ĺ|ļ|ľ|ŀ|ł',	  
		'L'=>'Ĺ|Ļ|Ľ|Ŀ|Ł',
		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|ö|ø|ǿ|ǒ|ō|ŏ|ő',
		'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ö|Ø|Ǿ|Ǒ|Ō|Ŏ|Ő',
		'Oe'=>'œ',
		'OE'=>'Œ',
		'n'=>'ñ|ń|ņ|ň|ŉ',
		'N'=>'Ñ|Ń|Ņ|Ň',
		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|û|ū|ŭ|ü|ů|ű|ų|ǔ|ǖ|ǘ|ǚ|ǜ',
		'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Û|Ū|Ŭ|Ü|Ů|Ű|Ų|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ',
		's'=>'ŕ|ŗ|ř',
		'R'=>'Ŕ|Ŗ|Ř',
		's'=>'ß|ſ|ś|ŝ|ş|š',
		'S'=>'Ś|Ŝ|Ş|Š',
		't'=>'ţ|ť|ŧ',
		'T'=>'Ţ|Ť|Ŧ',
		'w'=>'ŵ',
		'W'=>'Ŵ',
		'y'=>'ý|ỳ|ỷ|ỹ|ỵ|ÿ|ŷ',
		'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ|Ÿ|Ŷ',
		'z'=>'ź|ż|ž',
		'Z'=>'Ź|Ż|Ž'
	);
	foreach($unicode as $khongdau=>$codau) {
		$arr=explode("|",$codau);
		$str = str_replace($arr,$khongdau,$str);
	}
	return $str;
}

function dateTimeFormat($str)
{
	$arr = explode(" ", $str);
	$date_format = date('d/m/Y',strtotime($arr[0]));
	$time = 'Ngày '.$date_format.' vào lúc '.$arr[1];
	return $time;
}

# function chuyển thời gian dd/mm/yyyy sang Y-M-D
function saveDate($date)
{
	$date = explode('/', $date);
	return $date[2] . '-' . $date[1] . '-' . $date[0];
}

# function chuyển thời gian dd/mm/yyyy sang Y-M-D
function showDate($date)
{
	$date = explode('-', $date);
	return $date[2] . '/' . $date[1] . '/' . $date[0];
}

function UTF8_deupCase($value){
// Hàm chuyển all xâu sang in thường
	$unicode  = array(
					'á' => 'Á',
					'à' => 'À',
					'ả' => 'Ả',
					'ã' => 'Ã',
					'ạ' => 'Ạ',
					'ă' => 'Ă',
					'ắ' => 'Ắ',
					'ặ' => 'Ặ',
					'ằ' => 'Ằ',
					'ẳ' => 'Ẳ',
					'ẵ' => 'Ẵ',
					'â' => 'Â',
					'ấ' => 'Ấ',
					'ầ' => 'Ầ',
					'ẩ' => 'Ẩ',
					'ẫ' => 'Ẫ',
					'ậ' => 'Ậ',
					'đ' => 'Đ',
					'é' => 'É',
					'è' => 'È',
					'ẻ' => 'Ẻ',
					'ẽ' => 'Ẽ',
					'ẹ' => 'Ẹ',
					'ê' => 'Ê',
					'ế' => 'Ế',
					'ề' => 'Ề',
					'ể' => 'Ể',
					'ễ' => 'Ễ',
					'ệ' => 'Ệ',
					'í' => 'Í',
					'ì' => 'Ì',
					'ỉ' => 'Ỉ',
					'ĩ' => 'Ĩ',
					'ị' => 'Ị',
					'ó' => 'Ó',
					'ò' => 'Ò',
					'ỏ' => 'Ỏ',
					'õ' => 'Õ',
					'ọ' => 'Ọ',
					'ô' => 'Ô',
					'ố' => 'Ố',
					'ồ' => 'Ồ',
					'ổ' => 'Ổ',
					'ỗ' => 'Ỗ',
					'ộ' => 'Ộ',
					'ớ' => 'Ớ',
					'ờ' => 'Ờ',
					'ở' => 'Ở',
					'ỡ' => 'Ỡ',
					'ợ' => 'Ợ',
					'ú' => 'Ú',
					'ù' => 'Ù',
					'ủ' => 'Ủ',
					'ũ' => 'Ũ',
					'ụ' => 'Ụ',
					'ý' => 'Ý',
					'ứ' => 'Ứ',
					'ừ' => 'Ừ',
					'ử' => 'Ử',
					'ữ' => 'Ữ',
					'ự' => 'Ự',
					'ỳ' => 'Ỳ',
					'ỷ' => 'Ỷ',
					'ỹ' => 'Ỹ',
					'ỵ' => 'Ỵ', 
					'Á' => 'Á',
					'À' => 'À',
					'Ả' => 'Ả',
					'Ã' => 'Ã',
					'Ạ' => 'Ạ',
					'Ă' => 'Ă',
					'Ắ' => 'Ắ',
					'Ặ' => 'Ặ',
					'Ằ' => 'Ằ',
					'Ẳ' => 'Ẳ',
					'Ẵ' => 'Ẵ',
					'Â' => 'Â',
					'Ấ' => 'Ấ',
					'Ầ' => 'Ầ',
					'Ẩ' => 'Ẩ',
					'Ẫ' => 'Ẫ',
					'Ậ' => 'Ậ',
					'Đ' => 'Đ',
					'É' => 'É',
					'È' => 'È',
					'Ẻ' => 'Ẻ',
					'Ẽ' => 'Ẽ',
					'Ẹ' => 'Ẹ',
					'Ê' => 'Ê',
					'Ế' => 'Ế',
					'Ề' => 'Ề',
					'Ể' => 'Ể',
					'Ễ' => 'Ễ',
					'Ệ' => 'Ệ',
					'Í' => 'Í',
					'Ì' => 'Ì',
					'Ỉ' => 'Ỉ',
					'Ĩ' => 'Ĩ',
					'Ị' => 'Ị',
					'Ó' => 'Ó',
					'Ò' => 'Ò',
					'Ỏ' => 'Ỏ',
					'Õ' => 'Õ',
					'Ọ' => 'Ọ',
					'Ô' => 'Ô',
					'Ố' => 'Ố',
					'Ồ' => 'Ồ',
					'Ổ' => 'Ổ',
					'Ỗ' => 'Ỗ',
					'Ộ' => 'Ộ',
					'Ớ' => 'Ớ',
					'Ờ' => 'Ờ',
					'Ở' => 'Ở',
					'Ỡ' => 'Ỡ',
					'Ợ' => 'Ợ',
					'Ú' => 'Ú',
					'Ù' => 'Ù',
					'Ủ' => 'Ủ',
					'Ũ' => 'Ũ',
					'Ụ' => 'Ụ',
					'Ý' => 'Ý',
					'Ứ' => 'Ứ',
					'Ừ' => 'Ừ',
					'Ử' => 'Ử',
					'Ữ' => 'Ữ',
					'Ự' => 'Ự',
					'Ỳ' => 'Ỳ',
					'Ỷ' => 'Ỷ',
					'Ỹ' => 'Ỹ',
					'Ỵ' => 'Ỵ', 
					' ' => ' '
	);
	for($i = 65 ;$i<= 90; $i++){
		$unicode[chr($i + 32)] = chr($i);
		$unicode[chr($i)] = chr($i);
	}
	for ($i=0; $i <10 ; $i++) { 
		$unicode[$i] = $i;
	}
	//Tách Chuỗi thành mảng bước 1
	$return = NULL;
	$ST_newAr = NULL;
	for ($i=0; $i <= mb_strlen($value) ; $i++) { 
		if((mb_substr($value, $i, 1) == ' ') || ($i == mb_strlen($value) )){
			if($ST_newAr != NULL){
				$newAr[] = $ST_newAr;
				$ST_newAr = NULL;
			}
		}else{
			$ST_newAr = $ST_newAr. mb_substr($value, $i, 1);
		}
		
	}
	foreach ($newAr as $values) {
		// Chuyển ký tự in hoa
		$strSub = mb_substr($values, 0, 1);
		if(isset($unicode[$strSub])){
			$return[] = $unicode[$strSub] . mb_substr($values, 1);
		}else{
			$return[] = $strSub . mb_substr($values, 1);
		}
		
	}
	return implode(' ', $return);
}
function ChuanHoa($value){
	// Trả về chuỗi mã hóa nến thành công. Trả về false nếu chứa ký tự đặc biệt
	if($value == NULL){
		return NULL;
	}
	$value = trim($value);
	$value = mb_strtolower($value);
	return UTF8_deupCase($value);
}
?>