<?php  
function emaildecode($email)
{
	if($email == null){
		return $email;
	}
	$in_email = explode('@', $email)[0];
	for ($i=0; $i < (strlen($in_email) - 1) ; $i += 2) { 
		# Thay đổi và đảo vị trí:
		$tg = $in_email[$i + 1];
		$in_email[$i + 1] = $in_email[$i];
		$in_email[$i] = $tg;
	}
	$in_email = explode('0_0', $in_email);
	$rq = null;
	foreach ($in_email as $value) {
		$rq = $rq. chr($value);
	}
	$in_email = $rq;
	return $in_email. '@' . explode('@', $email)[1];
}
function usernamedecode($username)
{
	if($username == null){
		return $username;
	}
	$in_email = $username;
	for ($i=0; $i < (strlen($in_email) - 1) ; $i += 2) { 
		# Thay đổi và đảo vị trí:
		$tg = $in_email[$i + 1];
		$in_email[$i + 1] = $in_email[$i];
		$in_email[$i] = $tg;
	}
	$in_email = explode('0_0', $in_email);
	$rq = null;
	foreach ($in_email as $value) {
		$rq = $rq. chr($value);
	}
	$in_email = $rq;
	return $in_email;
}
function phonechange($phone)
{
	if($phone == null){
		return $phone;
	}
	$in_phone = $phone;
	$out_phone = null;
	$out_phone[0] = null;
	$out_phone[1] = null;
	if (isNumberphone($in_phone)){
		$in_phone = strtolower($in_phone);
		for ($i=0; $i < (strlen($in_phone) - 1) ; $i += 2) { 
			# Thay đổi và đảo vị trí:
			$tg = $in_phone[$i + 1];
			$in_phone[$i + 1] = $in_phone[$i];
			$in_phone[$i] = $tg;
			# Chơi kiểu CHia Bài:
			$out_phone[0] = $out_phone[0] . $in_phone[$i];
			$out_phone[0] = $out_phone[0] . $in_phone[$i + 1];
			$out_phone[1] = $in_phone[$i] . $out_phone[1];
		}
		for ($i=0; $i < (strlen($in_phone) - 1) ; $i += 2) { 
			# Thay đổi và đảo vị trí:
			$tg = $in_phone[$i + 1];
			$in_phone[$i + 1] = $in_phone[$i];
			$in_phone[$i] = $tg;
		}
		#Bước cuối: 
		$out_phone = null;
		for ($i=0; $i < (strlen($in_phone)) ; $i ++) { 
			$out_phone[] = ord($in_phone[$i]);
		}
		$in_phone = implode('0_0', $out_phone);
		for ($i=0; $i < (strlen($in_phone) - 1) ; $i += 2) { 
			# Thay đổi và đảo vị trí:
			$tg = $in_phone[$i + 1];
			$in_phone[$i + 1] = $in_phone[$i];
			$in_phone[$i] = $tg;
		}
	    return $in_phone;
	}else{
		return false;
	}
}
function phonedecode($phone)
{
	if($phone == null){
		return $phone;
	}
	$in_phone = $phone;
	for ($i=0; $i < (strlen($in_phone) - 1) ; $i += 2) { 
		# Thay đổi và đảo vị trí:
		$tg = $in_phone[$i + 1];
		$in_phone[$i + 1] = $in_phone[$i];
		$in_phone[$i] = $tg;
	}
	$in_phone = explode('0_0', $in_phone);
	$rq = null;
	foreach ($in_phone as $value) {
		$rq = $rq. chr($value);
	}
	$in_phone = $rq;
	return $in_phone;
}
function usernamechange($username)
{
	if($username == null){
		return $username;
	}
	$in_email = $username;
	$out_email = null;
	$out_email[0] = null;
	$out_email[1] = null;
	if (isKyTuDacBiet($in_email)){
		$in_email = strtolower($in_email);
		for ($i=0; $i < (strlen($in_email) - 1) ; $i += 2) { 
			# Thay đổi và đảo vị trí:
			$tg = $in_email[$i + 1];
			$in_email[$i + 1] = $in_email[$i];
			$in_email[$i] = $tg;
			# Chơi kiểu CHia Bài:
			$out_email[0] = $out_email[0] . $in_email[$i];
			$out_email[0] = $out_email[0] . $in_email[$i + 1];
			$out_email[1] = $in_email[$i] . $out_email[1];
		}
		for ($i=0; $i < (strlen($in_email) - 1) ; $i += 2) { 
			# Thay đổi và đảo vị trí:
			$tg = $in_email[$i + 1];
			$in_email[$i + 1] = $in_email[$i];
			$in_email[$i] = $tg;
		}
		#Bước cuối: 
		$out_email = null;
		for ($i=0; $i < (strlen($in_email)) ; $i ++) { 
			$out_email[] = ord($in_email[$i]);
		}
		$in_email = implode('0_0', $out_email);
		for ($i=0; $i < (strlen($in_email) - 1) ; $i += 2) { 
			# Thay đổi và đảo vị trí:
			$tg = $in_email[$i + 1];
			$in_email[$i + 1] = $in_email[$i];
			$in_email[$i] = $tg;
		}
	    return $in_email;
	}else{
		return false;
	}
}
function emailchange($email)
{
	if($email == null){
		return $email;
	}
	#tách phần đầu ra:
	$in_email = explode('@', $email)[0];
	$out_email = null;
	$out_email[0] = null;
	$out_email[1] = null;
	if (isKyTuDacBiet($in_email)){
		$in_email = strtolower($in_email);
		for ($i=0; $i < (strlen($in_email) - 1) ; $i += 2) { 
			# Thay đổi và đảo vị trí:
			$tg = $in_email[$i + 1];
			$in_email[$i + 1] = $in_email[$i];
			$in_email[$i] = $tg;
			# Chơi kiểu CHia Bài:
			$out_email[0] = $out_email[0] . $in_email[$i];
			$out_email[0] = $out_email[0] . $in_email[$i + 1];
			$out_email[1] = $in_email[$i] . $out_email[1];
		}
		for ($i=0; $i < (strlen($in_email) - 1) ; $i += 2) { 
			# Thay đổi và đảo vị trí:
			$tg = $in_email[$i + 1];
			$in_email[$i + 1] = $in_email[$i];
			$in_email[$i] = $tg;
		}
		#Bước cuối: 
		$out_email = null;
		for ($i=0; $i < (strlen($in_email)) ; $i ++) { 
			$out_email[] = ord($in_email[$i]);
		}
		$in_email = implode('0_0', $out_email);
		for ($i=0; $i < (strlen($in_email) - 1) ; $i += 2) { 
			# Thay đổi và đảo vị trí:
			$tg = $in_email[$i + 1];
			$in_email[$i + 1] = $in_email[$i];
			$in_email[$i] = $tg;
		}
	    return $in_email . '@' . explode('@', $email)[1];
	}else{
		return false;
	}
}
function isKyTuDacBiet($text)
{
	$pattern = '/[a-zA-Z0-9_.]/m';
	preg_match_all($pattern, $text, $matches, PREG_SET_ORDER, 0);
	$check = null;
	foreach ($matches as $value) {
		$check = $check . $value[0];
	}
	if ($text == $check){
	    return true;
	}else{
		return false;
	}
}
function dellKyTuDacBiet($text)
{
	$pattern = '/[a-zA-Z0-9_.]/m';
	preg_match_all($pattern, $text, $matches, PREG_SET_ORDER, 0);
	$check = null;
	foreach ($matches as $value) {
		$check = $check . $value[0];
	}
	return $check;
}
function isNumberphone($phone)
{
	if($phone == null){
		return $phone;
	}
	$pattern = '/^(84|0)[0-9]{9}/m';
	preg_match_all($pattern, $phone, $matches, PREG_SET_ORDER, 0);
	$check = null;
	foreach ($matches as $value) {
		$check = $check . $value[0];
	}
	if ($phone == $check){
	    return true;
	}else{
		return false;
	}
}
?>