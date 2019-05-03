@extends("Layouts.masterHomeView")
@section('title', 'CÔNG VĂN: '.$congvan->tieude.' - ')
@section('contentsPage')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">CÔNG VĂN: {{ $congvan->tieude }}</h3>
	</div>
		<div class="table-responsive">
			<table class="table table-hover table-bordered">
				<thead>
					<tr class="bg-success">
						<th class="text-center">Loại</th>
						<th class="text-center">Người Đăng</th>
						<th class="text-center">Mô Tả</th>
						<th class="text-center">Thời Gian</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center"><span class="label label-info">{{ $congvan->LoaiTin->ten }}</span></td>
						<td class="text-center text-success">{{ $congvan->User->name }}</td>
						<td class="text-justify">{{ $congvan->mota }}</td>
						<td class="text-center">{{ dateTimeFormat($congvan->created_at) }}<br><a href="Uploads/Documents/{{ $congvan->noidung }}"><span class="label label-primary">Tải Xuống Công Văn</span></a></td>
					</tr>
				</tbody>
			</table>
	</div>
</div>
<iframe class="panel panel-primary" src="https://docs.google.com/gview?url={{ url()->current() }}/Uploads/Documents/{{ $congvan->noidung }}&embedded=true" style="width: 100%; height: 600px" frameborder="0"></iframe>
@endsection