@extends("Layouts.masterHomeView")
@section('title', 'Quản lý Các chi đoàn hệ thống quản lý - ')
@section('active_quanlyhocsinh_1', 'active')
@section('active_quanlyhocsinh_2', 'in')
@section('active_quanlyhocsinh_3', 'true')

@section('active_quanlyhocsinh_chidoan', 'background-color: #0000001a')
@section('contentsPage')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Danh sách chi đoàn theo các khóa học</h3>
	</div>
		<!-- Tab panes -->
		<div class="tab-content">
			<?php $dem = 0 ?>
			@foreach($listKhoaHoc as $idKey => $listchidoan)
			<div role="tabpanel" class="tab-pane @if($dem == 0) active @endif text-center" id="{{ $idKey }}">
			<?php $dem = 1 ?>
				<table class="table table-hover table-bordered">
					<thead>
						<tr class="bg-success">
							<th class="text-center">Chi đoàn</th>
							<th class="text-center">Sĩ số</th>
							<th class="text-center">Nam/Nữ</th>
							<th class="text-center">Đoàn viên</th>
							<th class="text-center">Bí thư</th>
							<th class="text-center">Giáo Viên CN</th>
						</tr>
					</thead>
					<tbody>
						@foreach($listchidoan as $chidoan)
						<?php $infoClass = getInfoClass($chidoan->id) ?>
						<tr>
							<td><a href="{{ route('locchidoan', $chidoan->id) }}">{{ getClass($chidoan->nambatdau) }}{{ $chidoan->tenchidoan }}</a></td>
							<td>{{ $infoClass['siso'] }}</td>
							<td>{{ $infoClass['nam'] }}/{{ $infoClass['nu'] }}</td>
							<td>{{ $infoClass['doanvien'] }}</td>
							<td><a class="show" href="{{ route('thongtinhocsinh', changeTitle($infoClass['bithu']) . '-' . $infoClass['idbithu']) }}">{{ $infoClass['bithu'] }}</a>
							<td>{{ $chidoan->gvcn }}</td></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<span class="text-center text-info">Bảng thống kê cơ bản các thông số của các chi đoàn niên khóa {{ $idKey }}</span>
			</div>
			@endforeach
			</div>
	<div class="panel-footer">
		<div class="text-right">
			@foreach($listKhoaHoc as $idKey => $listchidoan)
			<a class="btn btn-success" href="#{{ $idKey }}" aria-controls="{{ $idKey }}" role="tab" data-toggle="tab">{{ $idKey }}</a>
			@endforeach
		</div>

	</div>
</div>


<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Thêm chi đoàn mới</h3>
	</div>
	<div class="panel-body">
		<em>Lưu ý: Không cho phép sửa đổi thông tin chi đoàn. Vì vậy, hãy kiểm tra kỹ càng các thông tin trước khi thêm dữ liệu</em>
	</br>
		<em>Nếu thêm nhiều chi đoàn cùng một niên khóa, viết cách nhau bằng 1 dấu , (phẩy) </em>
		<table class="table">
				<tr>
					<form action="{{ route('admin-themmoichidoan') }}" method="POST" role="form">
						@if(count($errors) > 0)
						<tr>
							<td colspan="4">
								<div>
									@foreach($errors->all() as $stt => $er)
									<p class="text-danger"><strong>Lỗi thứ {{ $stt + 1 }}: </strong> {{$er}}.</p>
									@endforeach
								</div>
							</td>
						</tr>
						@endif
                		<input id="form-token" name="_token" type="hidden" value="{{csrf_token()}}">
						<td><input name="namechidoan" type="text" class="form-control" placeholder="Tên chi đoàn ( VD: C1,C2,C3...)" /></td>
						<td><input name="gvcn" type="text" class="form-control" placeholder="Giáo viên chủ nhiệm ( VD: Nguyễn Văn A, Nguyễn Văn B, Nguyễn Văn C,... )" /></td>
						<td><input name="nienkhoa" type="text" class="form-control" placeholder="Niên khóa" /></td>
						<td><input name="addclass" type="submit" class="btn btn-success" value="Thêm" /></td>
					</form>
				</tr>
		</table>
	</div>
</div>
@endsection