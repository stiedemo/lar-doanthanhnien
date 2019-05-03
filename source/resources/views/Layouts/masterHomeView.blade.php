<!DOCTYPE html>
<html>
<head>	
	@include('Layouts.khaibaoHeader')
</head>
<body>
	@include('Layouts.headerView')
	<div class="body-bg">
	<!-- Open BODY BG -->
		<div class="wrapper">
		<!-- Open Wrapper -->
		@include('Layouts.headerView')
		<section>
			<div class="container" id="body">
				@include('Layouts.navSearchView')
				<div class="container">
					<div class="col-sm-5 col-md-5">
					    @if(Auth::check())
					        @include('Layouts.Models.'.getChucVu().'_MenuList')
					        @include('Layouts.Models.infoLogin')
					    @else
					        @include('Layouts.noLogin.panelLogin')
					    @endif
						@include('Layouts.Models.lichCongTacView')
					</div>

					<div class="col-sm-14 col-md-14">
					    @if(Auth::check() and (getNamHoc() == null))
					    <div class="alert alert-danger"><strong>Nhắc nhở nghiêm trọng: </strong>Bạn chưa tạo lập một thông tin năm học. Hệ thống chỉ hoạt động tốt khi bạn thêm một năm học vào hệ thông. Thông báo chỉ mất đi khi việc tạo lập được hoàn thành</div>
					    @endif
		                @if(Session::has('flash_message'))
		                  <div class="alert alert-block alert-{{ Session::get('flash_level') }} fade in exit">
		                    <button data-dismiss="alert" class="close close-sm" type="button">
		                      <i class="fa fa-times"></i>
		                    </button>
		                    <strong>Thông báo! </strong> {!! Session::get('flash_message') !!}
		                  </div>
		                @endif
						@yield('contentsPage')
					</div> 

				    <div class="col-sm-5 col-md-5">
					    @if(Auth::check())
							@include('Layouts.Models.bangThongBao')
					    @endif
						@include('Layouts.Models.congVanMoiNhatView')
						@include('Layouts.Models.danhGiaVaGopY')
				    </div>
				</div>
		    </div>
		</section> 
		@include('Layouts.footerView')
		<!-- Close Wrapper -->
		</div>
	<!-- Close BODY BG -->
	</div>
	@include('Layouts.khaibaoFooter')
</body>
</html>
<!-- Chứa các Phương thức kết thúc cho trang -->