@extends("Layouts.masterHomeView")
@section('title', 'Đăng Bài Viết Lên Website - ')
@section('active_quanlyblogs_1', 'active')
@section('active_quanlyblogs_2', 'in')
@section('active_quanlyblogs_3', 'true')

@section('active_quanlyblogs_baidang_1', 'active')
@section('active_quanlyblogs_baidang_2', 'in')
@section('active_quanlyblogs_baidang_3', 'true')
@section('active_quanlyblogs_baidang_dangtinhoatdong', 'background-color: #0000001a')
@section('contentsPage')
<form action="" method="post" enctype="multipart/form-data">
	<div class="row">        
		<table class="table table-hover table-bordered">
			<tbody>
				<tr>
					<td><strong>Tiêu đề</strong>: <sup class="required">(∗)</sup></td>
					<td><input type="text" value="" id="idtitle" name="tieude" class="form-control require"></td>
				</tr>
				<tr>
					<td><strong>Thể loại</strong>: <sup class="required">(∗)</sup></td>
					<td><input type="text" value="" id="idtitle" name="tieude" class="form-control require"></td>
				</tr>
				<tr>
					<td><strong>Hình minh họa</strong></td>
					<td><input type="file" name="avatar" /></td>
				</tr>
				<tr>
					<td><strong>Mô tả</strong>:</td>
					<td><input class="form-control ui-autocomplete-input" type="text" value="" name="nguon"></td>
				</tr>
				<tr>
					<td><strong>Từ khóa</strong>:</td>
					<td><input class="form-control ui-autocomplete-input" type="text" value="" name="nguon"></td>
				</tr>
				<tr>
					<td colspan="2"><strong>Nội dung chi tiết</strong><sup class="required " id="content_bodytext_required">(∗)</sup><i> (Chỉ hiển thị đối với những đối tượng được phép xem)</i>
						<br>
						<textarea class="form-control" name="noidung" id="noidung" rows="10"></textarea>
						<script type="text/javascript">
							CKEDITOR.replace('noidung');
						</script>
					</td>
				</tr>
				<tr>
					<td><strong>Nguồn tin</strong>:</td>
					<td><input class="form-control ui-autocomplete-input" type="text" value="" name="nguon"></td>
				</tr>
				<tr>
					<td colspan="2"><strong>Năm học: </strong> & <strong>Người Đăng: </strong></td>
				</tr>
			</tbody>
		</table>

	</div>

	<div class="text-center">
		<input name="dangtin" class="btn btn-success" type="submit" value="Đăng tin" />
		<button class="btn btn-default"><a href="/?action=dangbai">Làm lại</a></button>
	</div>
</form>
@endsection