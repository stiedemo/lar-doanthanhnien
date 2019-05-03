<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');
# Cách cài đặt :

# Mở composer.json
# Thêm vào trong "autoload" chuỗi sau
# "files": [
#    "app/function/function.php"
# ]
#Chạy cmd : composer  dumpautoload

# Tổng hợp các hàm tích hợp phục vụ xuyên suốt chương trình
require_once("changeFunction.php");
require_once("fileFunction.php");
require_once("otherFunction.php");
require_once("mahoaFunction.php");
require_once("function-admin.php");

?>