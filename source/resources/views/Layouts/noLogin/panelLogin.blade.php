<script type="text/javascript">
	function getBtnDangKy() {
		$('#panellogin').fadeOut(0);
		$('#paneldangky').fadeIn(50);
		$('.error').hide();
	}
	function getBtnDangNhap() {
		$('#paneldangky').fadeOut(0);
		$('#panellogin').fadeIn(50);
		$('.error').hide();
	}
</script>
<div class="row"></div>
<div id="panellogin" class="panel panel-default">
	<div class="widget-area fadeInLeft visible" style="visibility: visible;animation-name: fadeInLeft;">
		<header>
			<div class="widget-title">
				<h2 class="title-text"><span>đăng nhập</span></h2>
			</div>
		</header>
	</div>
	<div class="panel-body">
		<div id="alertSuccessDK" style="display: none" class="alert alert-success"></div>
		<div id="alertThongBao" style="display: none" class="alert alert-danger"></div>
		<form>
			<input id="form-token" name="_token" type="hidden" value="{{csrf_token()}}">
			<div class="form-detail">
				<div class="form-group loginstep1">
					<div class="input-group">
						<span class="input-group-addon"><em class="fa fa-user fa-lg"></em></span>
						<input id="form-login-username" type="text" class="required form-control" placeholder="Tên đăng nhập" value="" name="username">
					</div>
					<p style="color:red; display: none" class="error errorUsername"></p>
				</div>

				<div class="form-group loginstep1">
					<div class="input-group">
						<span class="input-group-addon"><em class="fa fa-key fa-lg fa-fix"></em></span>
						<input id="form-login-password" type="password" class="required form-control" placeholder="Mật khẩu" value="" name="password">
					</div>
					<p style="color:red; display: none" class="error errorPassword"></p>
				</div>

				<div class="text-center margin-bottom-lg">
				<button id="dang-nhap" class="bsubmit btn btn-primary" type="button">Đăng nhập</button>
				<button class="btn btn-success" id="btndangky" type="button" onclick="getBtnDangKy()">Đăng Ký</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	{{-- Ajax của đăng ký: --}}
	$(function() {
		$('#dang-nhap').click(function(e) {
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			$.ajax({
				'url' : '{{ route('login') }}',
				'data': {
					username : $('#form-login-username').val(),
					password : $('#form-login-password').val(),
					_token : $('#form-token').val()
				},
				'type': 'POST',
				success: function(data) {
					if(data.error == true){
						$('.error').hide();
						if(data.message.username != undefined){
							$('.errorUsername').show().text(data.message.username[0]);
						}
						if(data.message.password != undefined){
							$('.errorPassword').show().text(data.message.password[0]);
						}
						if(data.message.thongbao != undefined){
							$('#alertThongBao').show().text(data.message.thongbao[0]);
							$('#alertSuccessDK').fadeOut(0);
						}
					}else{
						$('#alertThongBao').fadeOut(0);
						$('#alertSuccessDK').show(50).text(data.message);
						location.reload();
					}
				},
                error: function (data) {

                }
			});
		});
	});
</script>
<div style="display: none" id="paneldangky" class="panel panel-default">
	<div class="widget-area fadeInLeft visible" style="visibility: visible;animation-name: fadeInLeft;">
		<header>
			<div class="widget-title">
				<h2 class="title-text"><span>Đăng ký</span></h2>
			</div>
		</header>
	</div>
	<div class="panel-body">
		<form>
			<input id="form-token" name="_token" type="hidden" value="{{csrf_token()}}">
			<div class="form-detail">
				<div class="form-group loginstep1">
					<div class="input-group">
						<span class="input-group-addon"><em class="fa fa-th fa-lg"></em></span>
						<input id="form-name" type="text" class="required form-control" placeholder="Tên của bạn" value="" name="name">
					</div>
						<p style="color:red; display: none" class="error errorName"></p>
				</div>
				<div class="form-group loginstep1">
					<div class="input-group">
						<span class="input-group-addon"><em class="fa fa-user fa-lg"></em></span>
						<input id="form-username" type="text" class="required form-control" placeholder="Tên đăng nhập" value="" name="username">
					</div>
					<p style="color:red; display: none" class="error errorUsername"></p>
				</div>
				<div class="form-group loginstep1">
					<div class="input-group">
						<span class="input-group-addon"><em class="fa fa-envelope-o fa-lg"></em></span>
						<input id="form-email" type="email" class="required form-control" placeholder="Nhập vào email" value="" name="email">
					</div>
						<p style="color:red; display: none" class="error errorEmail"></p>
				</div>

				<div class="form-group loginstep1">
					<div class="input-group">
						<span class="input-group-addon"><em class="fa fa-key fa-lg fa-fix"></em></span>
						<input id="form-password" type="password" class="required form-control" placeholder="Mật khẩu" value="" name="password">
					</div>
						<p style="color:red; display: none" class="error errorPassword"></p>
				</div>
				<div class="form-group loginstep1">
					<div class="input-group">
						<span class="input-group-addon"><em class="fa fa-key fa-lg fa-fix"></em></span>
						<input id="form-password_again" type="password" class="required form-control" placeholder="Nhập Lại Mật khẩu" value="" name="password_again">
					</div>
						<p style="color:red; display: none" class="error errorPassword_again"></p>
				</div>

				<div class="text-center margin-bottom-lg">
				<button id="dang-ky" class="bsubmit btn btn-primary" type="button" name="login">Đăng ký</button>
				<a class="btn btn-success" type="button" onclick="getBtnDangNhap()">Đăng nhập</a>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	{{-- Ajax của đăng ký: --}}
	$(function() {
		$('#dang-ky').click(function(e) {
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			$.ajax({
				'url' : '{{ route('register') }}',
				'data': {
					name : $('#form-name').val(),
					username : $('#form-username').val(),
					password : $('#form-password').val(),
					password_again : $('#form-password_again').val(),
					email : $('#form-email').val(),
					_token : $('#form-token').val()
				},
				'type': 'POST',
				success: function(data) {
					if(data.error == true){
						$('.error').hide();
						if(data.message.username != undefined){
							$('.errorUsername').show().text(data.message.username[0]);
						}
						if(data.message.name != undefined){
							$('.errorName').show().text(data.message.name[0]);
						}
						if(data.message.email != undefined){
							$('.errorEmail').show().text(data.message.email[0]);
						}
						if(data.message.password != undefined){
							$('.errorPassword').show().text(data.message.password[0]);
						}
						if(data.message.password_again != undefined){
							$('.errorPassword_again').fadeIn(50).text(data.message.password_again[0]);
						}
					}else{
						$('.error').fadeOut();
						$('#paneldangky').fadeOut(0);
						$('#panellogin').fadeIn(50);
						$('#alertSuccessDK').show(50).text(data.message);
					}
				},
                error: function (data) {

                }
			});
		});
	});
</script>