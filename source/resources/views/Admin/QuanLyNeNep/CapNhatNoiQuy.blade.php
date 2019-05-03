@extends("Layouts.masterHomeView")
@section('title', 'Cập nhật nội quy - ')
@section('active_quanlynenep_1', 'active')
@section('active_quanlynenep_2', 'in')
@section('active_quanlynenep_3', 'true')

@section('active_quanlynenep_capnhatnoiquy', 'background-color: #0000001a')
@section('contentsPage')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Thêm Mã Lỗi</h3>
	</div>
	<div class="panel-body">
		@if(count($errors) > 0)
		<div>
			@foreach($errors->all() as $stt => $er)
			<p class="text-danger"><strong>Lỗi thứ {{ $stt + 1 }}: </strong> {{$er}}.</p>
			@endforeach
		</div>
		@endif
		<form name="fthemmaloi" class="form-inline" method="POST" onsubmit="return validateForm()">
			<input id="form-token" name="_token" type="hidden" value="{{csrf_token()}}">
			<div class="form-group">
				<label for="staticEmail2" class="sr-only">Nội Dung</label>
				<input name="ndloi" type="text" class="form-control" id="staticEmail2" value="" placeholder="Nội Dung">
			</div>
			<div class="form-group">
				<label for="staticEmail2" class="sr-only">Điểm</label>
				<input name="diemtru" type="text" class="form-control" id="staticEmail2" value="" placeholder="Điểm Trừ">
			</div>
			<div class="form-group">
				<label for="inputPassword2" class="sr-only">Ghi Chú</label>
				<input name="ghichu" type="text" class="form-control" id="inputPassword2" placeholder="Ghi Chú">
			</div>
			<div class="form-group">
				<button name="themmaloi" type="submit" class="btn btn-primary">THÊM</button>
			</div>
		</form>

	</div>
	</div>
			<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Danh Sách Mã Lỗi</h3>
	</div>
	<div class="table-responsive">
		<table id="listmaloi" class="table table-bordered table-striped">
			<thead>
				<tr class="bg-success">
					<td class="text-center"><b>ID</b></td>
					<td class="text-center"><b>Nội Dung Lỗi</b></td>
					<td class="text-center"><b>Điểm Trừ</b></td>
					<td width="42%" class="text-center"><b>Ghi Chú</b></td>
					<td class="text-center"></td>
				</tr>
			</thead>
			<tbody>
				@foreach($listMaLoi as $stt => $DSLoi)
				<tr>
					<td class="text-center">{{ $stt + 1 }}</td>
					<td>{{ $DSLoi->noidung }}</td>
					<td class="text-center">{{ $DSLoi->diemtru }}</td>
					<td class="text-justify">{{ $DSLoi->ghichu }}</td>
					<td>
						
		                <button onclick="editMaLoi({{ $DSLoi->id }})" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#editmaloi">
		                    <i class="fa fa-edit"></i>
		                </button>
						<a href="{{ route('admin-xoamaloi', $DSLoi->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="editmaloi" tabindex="-1" role="dialog" aria-labelledby="ModelEditMaLoi" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModelEditMaLoi">Chỉnh sửa mã lỗi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="logoUploadForm" action="{{ route('admin-editmaloi') }}" method="post">
					<input id="form-token" name="_token" type="hidden" value="{{csrf_token()}}">
					<input id="form-idMaLoi" name="idMaLoi" type="hidden" value="">
					<div class="form-group">
						<label for="editndloi">Nội Dung</label>
						<input name="editndloi" type="text" class="form-control" id="editndloi" value="" placeholder="Nội Dung">
					</div>
					<div class="form-group">
						<label for="editdiemtru">Điểm</label>
						<input name="editdiemtru" type="text" class="form-control" id="editdiemtru" value="" placeholder="Điểm Trừ">
					</div>
					<div class="form-group">
						<label for="editghichu">Ghi Chú</label>
						<input name="editghichu" type="text" class="form-control" id="editghichu" placeholder="Ghi Chú">
					</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button id="btn-changeavatar" type="submit" class="btn btn-primary">Lưu Lại</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
	$(function() {
		$('#listmaloi').dataTable();
	});

	function editMaLoi(idmaloi){
    	$('#editghichu').val('Đang tải nội dung');
    	$('#editdiemtru').val('Đang tải nội dung');
    	$('#form-idMaLoi').val('Đang tải nội dung');
    	$('#editndloi').val('Đang tải nội dung');
        $.ajax({
            'url' : '{{ route('ajax-thongtinmaloi') }}',
            'data': {
            	idMaLoi : idmaloi,
                _token : $('#form-token').val()
            },
            'type': 'POST',
            success: function(data) {
            	$('#form-idMaLoi').val(data.id);
            	$('#editndloi').val(data.noidung);
            	$('#editdiemtru').val(data.diemtru);
            	$('#editghichu').val(data.ghichu);
            },
            error: function (data) {

            }
        });
	}
</script>
@endsection