@extends("Layouts.masterHomeView")
@section('title', 'Danh Sách Học Sinh '. $name .' - ')
@section('contentsPage')

<div id="showDataLoc" class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title text-center">Danh Sách {{ $HSdiaChi->HocSinh->count() }} Học Sinh Tại {{ $name }}</h3>
	</div>
	<div id="vungshow" class="table-responsive">
		<table id="table_ShowData" class="table table-hover table-bordered">
			<thead>
				<tr class="bg-success"">
					<th class="text-center">STT</th>
					<th class="text-center">Họ và tên</th>
					<th class="text-center">Giới tính</th>
					<th class="text-center">Chi Đoàn</th>
					<th class="text-center">Đoàn Viên</th>
					<th class="text-center">Địa chỉ</th>
				</tr>
			</thead>
			<tbody id="contentData">
				@foreach($HSdiaChi->HocSinh as $stt => $hocSinhDiaChi)
				<tr>
					<td>{{ $stt + 1 }}</td>
					<td><a href="{{ route('thongtinhocsinh', changeTitle($hocSinhDiaChi->hovaten) . '-' . $hocSinhDiaChi->id) }}">{{ $hocSinhDiaChi->hovaten }}</a></td>
					<td class="text-center">{{ $hocSinhDiaChi->gioitinh }}</td>
					<td class="text-center">{{ getClass($HSdiaChi->nambatdau) . $HSdiaChi->tenchidoan }}</td>
					<td class="text-center">@if($hocSinhDiaChi->isdoanvien == null) Thanh Niên @else Đoàn Viên @endif</td>
					<td>{{ $hocSinhDiaChi->diachi }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="panel-footer text-right">
		<a class="btn btn-success" href="">Xuất Excel</a>
	</div>
</div>
<script type="text/javascript">
	$(function() {
		$('#table_ShowData').dataTable();
	});
</script>

@endsection