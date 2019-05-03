
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title') {{ getinfoBlogs('title') }} năm học {{ getMaxNamHoc() }}</title>
    <base href="{{ asset('') }}">
	<link rel="shortcut icon" href="/Libs/images/icons/favicon.png">
	<link rel="StyleSheet" href="Libs/assets/css/font-awesome.min.css">
	<link rel="StyleSheet" href="Libs/css/bootstrap.non-responsive.css">
	<link rel="StyleSheet" href="Libs/css/style.css">
	<link rel="StyleSheet" href="Libs/css/style.non-responsive.css">
	<link type="text/css" href="Libs/assets/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link type="text/css" href="Libs/assets/js/jquery/notify-metro.css" rel="stylesheet" />
	<link type="text/css" href="Libs/assets/js/jquery/css/demo_table.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css"	href="Libs/css/jquery.metisMenu.css" />
	<link rel="StyleSheet" href="Libs/css/contact.css">
	<link rel="StyleSheet" href="Libs/css/cssmod.css">
	<script type="text/javascript" src="Libs/assets/js/jquery/jquery.min.js"></script>
	<script src="Libs/assets/js/jquery/jquery.form.js"></script> 
    <script src="Libs/plugins/ckeditor/ckeditor.js"></script>
    <script src="Libs/plugins/ckfinder/ckfinder.js"></script>
	<script language='javascript'>
		$(function() {
			var myVar=setInterval(function(){Clock()},0);
			function Clock() {
			a=new Date();
			w=Array("Chủ Nhật","Thứ hai","Thứ ba","Thứ tư","Thứ năm","Thứ sáu","Thứ bảy");
			var a=w[a.getDay()],
			w=new Date,
			d=w.getDate();
			m=w.getMonth()+1;
			y=w.getFullYear();
			h=w.getHours();
			mi=w.getMinutes();
			se=w.getSeconds();
			if(10>d){d="0"+d};
			if(10>m){m="0"+m};
			if(10>h){h="0"+h};
			if(10>mi){mi="0"+mi};
			if(10>se){se="0"+se};
			document.getElementById("showsTime").innerHTML= a+", "+d+" / "+m+" / "+y+" - "+h+":"+mi+":"+se+"";
			}
		});
	</script>