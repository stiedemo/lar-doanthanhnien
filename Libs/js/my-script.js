// Tắt dòng Alert trong 5s:
$('div.exit').delay(5000).slideUp();
// Function kiểm tra có xóa không
function xacnhanxoa(msg) {
	if(window.confirm(msg)){
		return true;
	}
	return false;
}