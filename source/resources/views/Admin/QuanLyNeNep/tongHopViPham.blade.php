@extends("Layouts.masterHomeView")
@section('title', 'Tổng hợp lỗi vi phạm - ')
@section('active_quanlynenep_1', 'active')
@section('active_quanlynenep_2', 'in')
@section('active_quanlynenep_3', 'true')

@section('active_quanlynenep_tongHopViPham', 'background-color: #0000001a')
@section('contentsPage')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Danh sách lỗi vi phạm cập nhật theo các tuần của năm học {{ getMaxNamHoc() }}</h3>
	</div>
		<!-- Tab panes -->
		<div class="tab-content">
			<?php
				if($listweekViPham == null){
					$listweekViPham = array();
				}
				$dem = 1; 
			 ?>
			@foreach($listweekViPham as $key => $listTongHop)
			<div role="tabpanel" class="tab-pane @if($dem == count($listweekViPham)) active @endif" id="{{ $key }}">
				<table id="showlistloi{{ $key }}" class="table table-hover table-bordered">
					<thead>
						<tr class="bg-success">
							<td class="text-center"><b>ID</b></td>
							<td class="text-center"><b>Học Sinh</b></td>
							<td class="text-center"><b>Chi Đoàn</b></td>
							<td class="text-center"><b>Nội Dung Lỗi</b></td>
							<td class="text-center"><b>Thời gian vi phạm</b></td>
							<td class="text-center"><b>Ghi Chú</b></td>
							<td class="text-center"></td>
						</tr>
					</thead>
					<tbody id="contentData">
						@foreach($listTongHop as $stt => $hsLoi)
						<tr>
							<td class="text-center">{{ $stt + 1 }}</td>
							<td><a href="{{ route('thongtinhocsinh', changeTitle($hsLoi->HocSinh->hovaten). '-' . $hsLoi->HocSinh->id) }}">{{ $hsLoi->HocSinh->hovaten }}</a></td>
							<td class="text-center">{{ getchidoanid($hsLoi->HocSinh->idchidoan) }}</td>
							<td>{{ $hsLoi->LoiViPham->noidung }}</td>
							<td>{{ dateTimeFormat($hsLoi->created_at) }}</td>
							<td></td>
							<td> <a href="{{ route('admin-xoaloi', $hsLoi->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<span class="text-center">Tuần {{ $key }}</span>
			</div>
			<?php $dem ++; ?>
			@endforeach
		</div>
	<div class="panel-footer">
		<div class="text-right">
			<?php $dem = 1; ?>
			@foreach($listweekViPham as $key => $listTongHop)
			<a class="@if($dem == count($listweekViPham)) btn btn-success @else btn btn-danger @endif" href="#{{ $key }}" aria-controls="{{ $key }}" role="tab" data-toggle="tab">Tuần {{ $key }}</a>
			<?php $dem ++; ?>
			@endforeach
		</div>

	</div>
</div>
<script>
	$(function() {
		@foreach($listweekViPham as $key => $listTongHop)
			$('#showlistloi{{ $key }}').dataTable();
		@endforeach
	});
</script>				
@endsection