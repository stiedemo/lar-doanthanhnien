<?php 

function readAllFiles($path)
{
	$file = @fopen($path, "r");
	# Kiểm tra file mở thành công không
	if ($file) {
	    # Nếu như mở file thành công thì return về toàn bộ dữ liệu có trong file:
	    # Tiến hành đọc file:
	    $rqData = fread($file, filesize($path));
	    fclose($file);
	    return $rqData;
	}else{
		return null;
	}
}
function writeAllFiles($path, $data)
{
	$file = @fopen($path, "w+");
	# Kiểm tra file mở thành công không
	if ($file) {
	    # Nếu như mở file thành công thì return về toàn bộ dữ liệu có trong file:
	    # Tiến hành đọc file:
	    fwrite($file, $data);
	    fclose($file);
	    return true;
	}else{
		return false;
	}
}
?>