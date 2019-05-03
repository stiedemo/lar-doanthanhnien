@extends("Layouts.masterHomeView")
@section('title', 'Nhập dữ liệu học sinh bằng file excel - ')
@section('active_quanlyhocsinh_1', 'active')
@section('active_quanlyhocsinh_2', 'in')
@section('active_quanlyhocsinh_3', 'true')

@section('active_quanlyhocsinh_congcu_1', 'active')
@section('active_quanlyhocsinh_congcu_2', 'in')
@section('active_quanlyhocsinh_congcu_3', 'true')

@section('active_quanlyhocsinh_congcu_import', 'background-color: #0000001a')
@section('contentsPage')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Nhập liệu đoàn viên thanh niên</h3>
	</div>

	<div class="panel-body">
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<input id="form-token" name="_token" type="hidden" value="{{csrf_token()}}">
			<legend>Nhập liệu đoàn viên thanh niên bằng file excel</legend>
		
			@if(count($errors) > 0)
			<div class="form-group">
				@foreach($errors->all() as $stt => $er)
				<p class="text-danger"><strong>Lỗi thứ {{ $stt + 1 }}: </strong> {{$er}}.</p>
				@endforeach
			</div>
			@endif
			<div class="form-group">
				<input id="upload" type="file" class="form-control" name="uploadhs">
			</div>
			<button name="upload" type="submit" class="btn btn-primary">Upload</button>
		</form>
	</div>
	<div class="panel-footer">
		<div class="text-right">
			<a class="btn btn-success" href="#11" aria-controls="11" role="tab" data-toggle="tab">Nhập thủ công</a>
		</div>
	</div>
</div>
@endsection