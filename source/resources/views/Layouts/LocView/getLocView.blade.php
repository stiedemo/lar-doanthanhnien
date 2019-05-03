@extends("Layouts.masterHomeView")
@section('title', 'Công cụ lọc - ')
@section('active_quanlyhocsinh_1', 'active')
@section('active_quanlyhocsinh_2', 'in')
@section('active_quanlyhocsinh_3', 'true')

@section('active_quanlyhocsinh_congcu_1', 'active')
@section('active_quanlyhocsinh_congcu_2', 'in')
@section('active_quanlyhocsinh_congcu_3', 'true')

@section('active_quanlyhocsinh_congcu_loc', 'background-color: #0000001a')
@section('contentsPage')

<!-- Hiển thị bảng thông báo -->
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">CÔNG CỤ LỌC: <span style="font-size: 11px">Lựa chọn các điều kiện và bấm vào Button [LỌC]</span></h3>
	</div>
		<div class="table-responsive">
			<table class="table table-hover">
				<tbody>
					<form id="form-loc">
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
						<input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
						<tr>
							<td>
								<select id="id_NamHoc" name="namhoc" class="form-control">
									<option value="" selected="true">Năm Học</option>
									@foreach($getAllNamHoc as $namHoc)
									<option value="{{ $namHoc->id }}">{{ getNH($namHoc) }}</option>
									@endforeach
								</select>
							</td>
							<td>
								<select id="diachi_tinh" name="iddiachitinh" class="form-control">
									<option value="" selected="true">Tỉnh</option>
									@foreach($getAllTinh as $diachiTinh)
									<option value="{{ $diachiTinh->id }}">{{ $diachiTinh->tinh }}</option>
									@endforeach
								</select>
							</td>
							<td>
								<select id="diachi_huyen" name="iddiachihuyen" class="form-control">
									<option value="" selected="true">Huyện</option>
								</select>
							</td>
							<td>
								<select id="diachi_xa" name="iddiachixa" class="form-control">
									<option value="" selected="true">Xã</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<select id="gioi_tinh" name="gioitinh" class="form-control">
									<option value="" selected="true">Giới Tính</option>
									<option value="Nam">Nam</option>
									<option value="Nữ">Nữ</option>
								</select>
							</td>
							<td>
								<select id="isdoanvien" name="isdoanvien" class="form-control">
									<option value="" selected="true">Đoàn Viên VÀ Thanh niên</option>
									<option value="1">Đoàn Viên</option>
									<option value="0">Thanh Niên</option>
								</select>
							</td>
							<td>
								<select id="loivipham" name="loivipham" class="form-control">
									<option value="" selected="true">Không Vi Phạm Nội Quy</option>
									<option value="1">Vi Phạm Nội Quy</option>
								</select>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>
								<select id="dan_toc" name="dantoc" class="form-control">
									<option value="" selected="true">Dân Tộc</option>
									<option value="1">Công Văn Đoàn Trường</option>
									<option value="2">Công Văn Ban Giám Hiệu</option>
								</select>
							</td>
							<td>
								<select id="ton_giao" name="tongiao" class="form-control">
									<option value="" selected="true">Tôn Giáo</option>
									<option value="1">Công Văn Đoàn Trường</option>
									<option value="2">Công Văn Ban Giám Hiệu</option>
								</select>
							</td>
							<td>
								<select id="dienchinhsach" name="dienchinhsach" class="form-control">
									<option value="" selected="true">Diện Chính Sách</option>
									<option value="1">Công Văn Đoàn Trường</option>
									<option value="2">Công Văn Ban Giám Hiệu</option>
								</select>
							</td>
							<td id="btn-loc" rowspan="2"><button type="button" class="btn btn-primary btn-sm pull-right" name="themthongbao">LỌC</button></td>
						</tr>
					</form>
				</tbody>
			</table>
	</div>
</div>
<div id="showDataLoc" class="panel panel-primary" style="display: none">
	<div class="panel-heading">
		<h3 class="panel-title text-center">KẾT QUẢ LỌC</h3>
	</div>
	<div id="vungshow" class="table-responsive">
		<table id="table_ShowData" class="table table-hover table-bordered">
			<thead>
				<tr class="bg-success"">
					<th class="text-center">STT</th>
					<th class="text-center">Họ và tên</th>
					<th class="text-center">Giới tính</th>
					<th class="text-center">Chi đoàn</th>
					<th class="text-center">Đoàn Viên</th>
					<th class="text-center">Địa chỉ</th>
				</tr>
			</thead>
			<tbody id="contentData">
			</tbody>
		</table>
	</div>
	<div class="panel-footer" style="padding: 0px; text-align: center;" class="text-center">
		<nav aria-label="Page navigation">
			<ul id="phan-trang" class="pagination">

			</ul>
		</nav>
	</div>
</div>



<script>
	{{-- Xử lý chọn lọc địa chỉ --}}
	function setDataLoc(data) {
		$('#showDataLoc').fadeOut(0);
		$('#vungshow').html('<table id="table_ShowData" class="table table-hover table-bordered"><thead><tr class="bg-success""><th class="text-center">STT</th><th class="text-center">Họ và tên</th><th class="text-center">Giới tính</th><th class="text-center">Chi đoàn</th><th class="text-center">Đoàn Viên</th><th class="text-center">Địa chỉ</th></tr></thead><tbody id="contentData"></tbody></table>');
		var codeData = null;
		for (var i = 0; i < data.length; i++) {
			if(data[i].isdoanvien == null){
				data[i].isdoanvien = 'Thanh Niên';
			}else{
				data[i].isdoanvien = 'Đoàn Viên';
			}
			codeData += '<tr><td class="text-center">'+(i + 1)+'</td><td><a href="hoc-sinh/thong-tin/'+ data[i].tenkhonggiau +'-'+ data[i].id+'">' + data[i].hovaten + '</a></td><td class="text-center">' + data[i].gioitinh + '</td><td class="text-center">' + data[i].chidoan + '</td><td class="text-center">' + data[i].isdoanvien + '</td><td>' + data[i].diachi + '</td></tr>';
		}
		$('#contentData').html(codeData);
		$('#showDataLoc').fadeIn(0);
	}
	$(function() {
		$('#diachi_tinh').change(function() {
			$('#diachi_huyen').html('<option value="" selected="true">Huyện</option>');
			$('#diachi_xa').html('<option value="" selected="true">Xã</option>');
            $.ajax({
                'url' : '{{ route('ajax-diachihuyen') }}',
                'data': {
                    _token : $('#form-token').val(),
                    idtinh : $('#diachi_tinh').val(),
                },
                'type': 'POST',
                success: function(data) {
                	// Code lại địa chỉ huyện
                	var codeHuyen = '<option value="" selected="true">Huyện</option>';
					for(let i = 0; i < data.length; i++) {
						codeHuyen += '<option value="' + data[i]['id'] + '">' + data[i]['huyen'] + '</option>';
					}
                	$('#diachi_huyen').html(codeHuyen);
                },
                error: function (data) {

                }
            });
		});
		$('#diachi_huyen').change(function() {
			$('#diachi_xa').html('<option value="" selected="true">Xã</option>');
            $.ajax({
                'url' : '{{ route('ajax-diachixa') }}',
                'data': {
                    _token : $('#form-token').val(),
                    idhuyen : $('#diachi_huyen').val(),
                },
                'type': 'POST',
                success: function(data) {
                	// Code lại địa chỉ huyện
                	var xa = '<option value="" selected="true">Xã</option>';
					for(let i = 0; i < data.length; i++) {
						xa += '<option value="' + data[i]['id'] + '">' + data[i]['xa'] + '</option>';
					}
                	$('#diachi_xa').html(xa);
                },
                error: function (data) {

                }
            });
		});
	});
</script>
<script>
	{{-- Xử lý chọn lọc địa chỉ --}}
	$(function() {
		$('#btn-loc').click(function() {
			$.ajax({
                'url' : '{{ route('ajax-loc') }}',
                'data': {
                    _token : $('#form-token').val(),
                	// idnamhoc : $('#id_NamHoc').val(),
                	iddiachitinh : $('#diachi_tinh').val(),
                	iddiachihuyen : $('#diachi_huyen').val(),
                	iddiachixa : $('#diachi_xa').val(),
                	gioitinh : $('#gioi_tinh').val(),
                	dantoc : $('#dan_toc').val(),
                	tongiao : $('#ton_giao').val(),
                	dienchinhsach : $('#dienchinhsach').val(),
                	// loivipham : $('#loivipham').val(),
                	isdoanvien : $('#isdoanvien').val(),
                },
                'type': 'POST',
                success: function(data) {
                	setDataLoc(data);
                	$('#table_ShowData').dataTable();
                },
                error: function (data) {

                }
            });
		});
	});
</script>
@endsection