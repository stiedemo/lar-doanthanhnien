@extends("Layouts.masterHomeView")
@section('title', 'Đăng Bài Viết Lên Website - ')
@section('active_quanlyblogs_1', 'active')
@section('active_quanlyblogs_2', 'in')
@section('active_quanlyblogs_3', 'true')

@section('active_quanlyblogs_baidang_1', 'active')
@section('active_quanlyblogs_baidang_2', 'in')
@section('active_quanlyblogs_baidang_3', 'true')
@section('active_quanlyblogs_baidang_uploadcongvan', 'background-color: #0000001a')
@section('contentsPage')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Tổng hợp Công Văn đã đăng tải</h3>
	</div>
		<div class="table-responsive">
			<table class="table table-hover table-bordered">
				<thead>
					<tr class="bg-success">
						<th class="text-center">Loại & Tiêu đề</th>
						<th class="text-center">Mô Tả</th>
						<th width="17%" class="text-center">Công Văn</th>
						<th class="text-center"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($listCongVan->BaiDang as $CongVan)
					<tr>
						<td class="text-justify"><span class="label label-info">{{ $CongVan->LoaiTin->ten }}</span>  <a href="{{  route('baidang-congvan', $CongVan->tieudekhongdau . '-' . $CongVan->id) }}" class="text-info">{{ $CongVan->tieude }}</a></td>
						<td class="text-justify">{{ $CongVan->mota }}</td>
						<td class="text-center"><a href="Uploads/Documents/{{ $CongVan->noidung }}">{{ $CongVan->noidung }}</a></td>
						<td class="text-center"><a onclick="return xacnhanxoa('Xác nhận xóa thông báo: [ Các bí thư chi khối 12 hoàn thành sổ đoàn ]')" href="http://localhost/Projects/admin/quan-ly-blogs/bai-dang/xoa-thong-bao/1"><span class="label label-danger">[XÓA]</span></a> <a onclick="return xacnhanxoa('Xác nhận xóa thông báo: [ Các bí thư chi khối 12 hoàn thành sổ đoàn ]')" href="http://localhost/Projects/admin/quan-ly-blogs/bai-dang/xoa-thong-bao/1"><span class="label label-primary">[CHỈNH SỬA]</span></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
	</div>
</div>



<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Upload Công văn mới</h3>
	</div>

<form action="{{ route('admin-uploadcongvan') }}" method="post" enctype="multipart/form-data">  
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		<table class="table table-hover table-bordered">
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
			<tbody>
				<tr>
					<td><strong>Tiêu đề</strong>: <sup class="required">(∗)</sup></td>
					<td><input type="text" value="" id="idtitle" name="tieude" class="form-control require"></td>
				</tr>
				<tr>
					<td><strong>Loại Công Văn</strong>: <sup class="required">(∗)</sup></td>
					<td>
						<select name="idloaitin" class="form-control">
							<option value="" selected="true">CHỌN LOẠI CÔNG VĂN</option>
							@foreach($listCongVan->LoaiTin as $loaiCongVan)
							<option value="{{ $loaiCongVan->id }}">{{ $loaiCongVan->ten }}</option>
							@endforeach
						</select>
						
					</td>
				</tr>
				<tr>
					<td><strong>Mô tả</strong>:</td>
					<td><input class="form-control ui-autocomplete-input" type="text" value="" name="mota"></td>
				</tr>
				<tr>
					<td><strong>File Công Văn</strong>:</td>
					<td><input class="form-control" type="file" name="files" /></td>
				</tr>
				<tr>
					<td colspan="2"><strong>Năm học: <span class="text-info">{{ getMaxNamHoc() }}</span></strong> & <strong>Người Đăng: <span class="text-success">{{ Auth::user()->name }}</span> ({{ usernamedecode(Auth::user()->username) }})</strong></td>
				</tr>
			</tbody>
		</table>
	<div class="panel-footer text-center">
		<input name="dangtin" class="btn btn-success" type="submit" value="Đăng tin" />
	</div>
</form>
</div>
@endsection