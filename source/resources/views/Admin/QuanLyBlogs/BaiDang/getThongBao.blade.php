@extends("Layouts.masterHomeView")
@section('title', 'Đăng Bài Viết Lên Website - ')
@section('active_quanlyblogs_1', 'active')
@section('active_quanlyblogs_2', 'in')
@section('active_quanlyblogs_3', 'true')

@section('active_quanlyblogs_baidang_1', 'active')
@section('active_quanlyblogs_baidang_2', 'in')
@section('active_quanlyblogs_baidang_3', 'true')
@section('active_quanlyblogs_baidang_dangtaithongbao', 'background-color: #0000001a')
@section('contentsPage')
<!-- Hiển thị bảng thông báo -->
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Tông Hợp Thông Báo <span style="font-size: 11px">Danh sách gồm tối đa 10 thông báo gần đây nhất</span></h3>
	</div>
		<div class="table-responsive">
			<table class="table table-hover table-bordered">
				<thead>
					<tr class="bg-success">
						<th class="text-center">STT</th>
						<th class="text-center">Tiêu đề</th>
						<th class="text-center">Nội dung</th>
						<th class="text-center">Thời gian</th>
					</tr>
				</thead>
				<tbody>
					@foreach(getThongBao() as $stt => $listthongbao)
					<tr>
						<td class="text-center">{{ $stt + 1 }}</td>
						<td>{{ $listthongbao->tieude }}</td>
						<td>{{ $listthongbao->noidung }}</td>
						<td class="text-center"><p>{{ dateTimeFormat($listthongbao->created_at) }}</p><a onclick="return xacnhanxoa('Xác nhận xóa thông báo: [ {{ $listthongbao->tieude }} ]')" href="{{ route('admin-deletethongbao', $listthongbao->id) }}"><span class="label label-danger">[XÓA]</span></a></td>
					</tr>
					@endforeach
					<form action="{{ route('admin-dangtaithongbao') }}" method="POST">
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
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
						<tr class="bg-info">
							<td><button type="submit" class="btn btn-primary" name="themthongbao"><em class="fa fa-plus"></em></button></td>
							<td><input name="title" type="text" class="form-control" placeholder="Tiêu Đề"  value="{{ old('title') }}"></td>
							<td><input name="content" type="text" class="form-control" placeholder="Nội Dung" value="{{ old('content') }}"></td>
							<td><input id="form-times" class="form-control" readonly value=""></td>
						</tr>
					</form>
				</tbody>
			</table>
	</div>
</div>
<script>
	w=new Date,
	d=w.getDate();
	m=w.getMonth()+1;
	y=w.getFullYear();
	h=w.getHours();
	mi=w.getMinutes();
	se=w.getSeconds();
	timeNow =  "Vào lúc: " + h + ":" + mi + ":" + se + " Ngày " + d + "/" + m + "/" + y +"" ;
	$('#form-times').val(timeNow);
</script>
@endsection