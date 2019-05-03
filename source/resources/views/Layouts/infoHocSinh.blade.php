@extends("Layouts.masterHomeView")
@section('title', 'Thông tin học sinh '.$getHocSinh->hovaten.' - ')
@section('contentsPage')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Thông tin cơ bản của học sinh <b>{{ $getHocSinh->hovaten }}</b></h3>
	</div>
		<div class="table-responsive">
		<table class="table table-bordered table-hover row">
			<tr>
				<td class="col col-sm-3 text-center" rowspan="5"><img width="250px" src="https://i.imgur.com/4EOZEUx.png" alt=""></td>
				<td>Họ và tên: {{ $getHocSinh->hovaten }}</td>
			</tr>
			<tr>
				<td>Lớp: <a href="?action=loc&lop=2">{{ getClass($getHocSinh->chiDoan->nambatdau) . $getHocSinh->chiDoan->tenchidoan }}</a> | Chức vụ: {{ $getHocSinh->chucvu }} | Ngày sinh: {{ showDate($getHocSinh->ngaysinh) }}</td>
			</tr>
			<tr>
				<td>Địa Chỉ : {{ $getHocSinh->diachi }}</td>
			</tr>
			<tr>
				<td>Giới tính: {{ $getHocSinh->gioitinh }} | Đoàn viên: {{ $getHocSinh->isdoanvien }}</td>
			</tr>
			<tr>
				<td>Tổng số lỗi: {{ count($listViPham) }} | <a data-toggle="modal" data-target="#dsloi">Danh Sách Lỗi</a> </td>
			</tr>
			<tr>
				<td class="text-center"><a  href="https://i.imgur.com/4EOZEUx.png" class="btn btn-primary">TẢI XUỐNG QRCode</a></td>
				<td class="text-right"><a class="btn btn-success" href="{{ url()->full() }}#info" >Chi tiết</a> <!-- <a class="btn btn-success" data-toggle="modal" data-target="#editinfo">Thẻ HS</a> --></td>
			</tr>
		</table>
		</div>
</div>


<!-- Modal danh sách lỗi -->
<div class="modal fade" id="dsloi" tabindex="-1" role="dialog" aria-labelledby="dsloi" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dsloi">Danh sách lỗi học sinh {{ $getHocSinh->hovaten }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="table-responsive">
        <!-- Danh Sách lỗi của học sinh -->
        
						<table id="showLoiViham" class="table table-bordered table-striped">
							<thead>
								<tr>
									<td>STT</td>
									<td>Lỗi</td>
									<td>Thời Gian</td>
									<td>Ghi Chú</td>
									<td></td>
								</tr>
							</thead>
        				<tbody>
        				@foreach($listViPham as $stt => $loivipham)
						<tr>
							<td>{{ $stt + 1 }}</td>
							<td>{{ $loivipham->LoiViPham->noidung }}</td>
							<td>{{ dateTimeFormat($loivipham->created_at) }}</td>
							<td></td>
							<td class=" text-center"><a href="{{ route('admin-xoaloi', $loivipham->id) }}"><i class="fa fa-close text-danger"></i></a></td>
						</tr>
						@endforeach
        				</tbody>
					</table>
        		      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Bảng Ghi Lỗi</h3>
	</div>
	<div class="panel-body">
		<p><strong class="text-danger">Lưu ý: </strong>Chỉ cần chọn vào lỗi và xác nhận ghi lỗi, hệ thống sẽ tự động tính thời gian ngay lúc nhập lỗi.Nếu lỗi không có trong danh sách dưới đây, vui lòng thêm lỗi ở mục thêm mã lỗi</p>
		<!-- Show Danh Sách Lỗi -->
		@foreach($maLoiViPham as $loivipham)
		<a onclick="return xacnhanxoa('Xác nhận thêm cho học sinh {{ $getHocSinh->hovaten }} lỗi vi phạm: [ {{ $loivipham->noidung }} ]')" href="{{ route('themmaloi', [$getHocSinh->id, $loivipham->id]) }}" class="btn btn-danger" style="margin: 10px;">{{ $loivipham->noidung }} [{{ $loivipham->HSViPham->where('idhocsinh', $getHocSinh->id)->count() }}]</a>
		@endforeach
	</div>
</div>


<div id="info" class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Thông tin chi tiết</h3>
	</div>
	<form action="" method="post">
		<div class="panel-body">
			<table class="table form-group">
				<tr>
					<td width="20%"><label for="chonlop">Họ và tên</label></td>
					<td width="80%">{{ $getHocSinh->hovaten }}</td>
				</tr>
				<tr>
					<td width="20%"><label for="chonlop">Ngày sinh</label></td>
					<td width="80%">{{ showDate($getHocSinh->ngaysinh) }}</td>
				</tr>
				<tr>
					<td width="20%"><label for="chonlop">Giới tính</label></td>
					<td width="80%">{{ $getHocSinh->gioitinh }}</td>
				</tr>
				<tr>
					<td width="20%"><label for="chonlop">Chi đoàn</label></td>
					<td width="80%">{{ getClass($getHocSinh->chiDoan->nambatdau) . $getHocSinh->chiDoan->tenchidoan }}</td>
				</tr>
				<tr>
					<td width="20%"><label for="chonlop">Chức vụ</label></td>
					<td width="80%">{{ $getHocSinh->chucvu }}</td>
				</tr>
				<tr>
					<td width="20%"><label for="chonlop">Địa chỉ</label></td>
					<td width="80%">{{ $getHocSinh->diachi }}</td>
				</tr>
				<tr>
					<td width="20%"><label for="chonlop">Đoàn Viên</label></td>
					<td width="80%">{{ $getHocSinh->isdoanvien }}</td>
				</tr>
				<tr>
					<td width="20%"><label for="chonlop">Tôn Giáo</label></td>
					<td width="80%">{{ $getHocSinh->tongiao }}</td>
				</tr>
				<tr>
					<td width="20%"><label for="chonlop">Dân tộc</label></td>
					<td width="80%">{{ $getHocSinh->dantoc }}</td>
				</tr>
				<tr>
					<td width="20%"><label for="chonlop">Số Điện Thọai LH</label></td>
					<td width="80%">{{ phonedecode($getHocSinh->sodienthoai) }}</td>
				</tr>
				<tr>
					<td width="20%"><label for="chonlop">Họ và tên cha</label></td>
					<td width="80%">{{ $getHocSinh->tenbo }}</td>
				</tr>
				<tr>
					<td width="20%"><label for="chonlop">Họ và tên mẹ</label></td>
					<td width="80%">{{ $getHocSinh->tenme }}</td>
				</tr>
				<tr>
					<td width="20%"><label for="chonlop">Diện chính sách</label></td>
					<td width="80%">{{ $getHocSinh->dienchinhsach }}</td>
				</tr>
			</table>
		</div>
		<div class="panel-footer text-right">
			<a class="btn btn-success">Chỉnh Sửa</a>
		</div>
	</form>
</div>
<script>
	$(function() {
		$('#showLoiViham').dataTable();
	});
</script>
@endsection