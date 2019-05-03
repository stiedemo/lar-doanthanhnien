@extends("Layouts.masterHomeView")
@section('title', 'Thông tin các năm học hệ thống quản lý - ')
@section('active_thongtinnamhoc', 'background-color: #0000001a')
@section('contentsPage')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Danh sách các NĂM HỌC hệ thống quản lý</h3>
	</div>
		<div class="table-responsive">
			<table class="table table-hover table-bordered">
				<thead>
					<tr class="bg-success">
						<th class="text-center">STT</th>
						<th class="text-center">Năm Học</th>
						<th class="text-center">Tổng Quan Dữ Liệu</th>
						<th width="10%" class="text-center"></th>
					</tr>
				</thead><tbody>
				@foreach($getListNamHoc as $stt => $namhoc)
					<tr>
						<td class="text-center">{{ $stt + 1 }}</td>
						<td class="text-center"><span class="label label-success">{{ getNH($namhoc) }}</span></td>
						<td></td>
						<td class="text-center"><a onclick="return xacnhanxoa()" href=""><span class="label label-info">[Tải Về File Dữ Liệu Tổng Quan]</span></a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Thêm mới năm học vào hệ thống</h3>
	</div>
		<div class="table-responsive">
			<table class="table table-hover table-bordered">
				<thead>
					@if(count($errors) > 0)
					<tr>
						<td colspan="4">
							<div style="padding: 10px">
								@foreach($errors->all() as $stt => $er)
								<p class="text-danger"><strong>Lỗi thứ {{ $stt + 1 }}: </strong> {{$er}}.</p>
								@endforeach
							</div>
						</td>
					</tr>
					@endif
					<tr class="bg-success">
						<th class="text-center">Tuần học đầu tiên</th>
						<th class="text-center">Ngày Khai Giảng</th>
						<th class="text-center">Ngày Tổng Kết</th>
						<th class="text-center"></th>
					</tr>
				</thead>
				<tbody>
					<form action="{{ route('admin-themmoinamhoc') }}" method="POST">
               		<input id="form-token" name="_token" type="hidden" value="{{csrf_token()}}">
						<tr class="bg-info">
							<td><input name="txttuanhocdau" type="date" class="form-control"  value=""></td>
							<td><input name="txtkhaigiang" type="date" class="form-control" value=""></td>
							<td><input name="txttongket" type="date" class="form-control" value=""></td>
							<td><button type="submit" class="btn btn-primary" name="themthongbao"><em class="fa fa-plus"></em></button></td>
						</tr>
					</form>
				</tbody>
			</table>
	</div>
</div>
@endsection