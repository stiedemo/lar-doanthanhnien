@extends("Layouts.masterHomeView")
@section('title', 'Quản lý Các chi đoàn hệ thống quản lý - ')
@section('active_quanlyhocsinh_1', 'active')
@section('active_quanlyhocsinh_2', 'in')
@section('active_quanlyhocsinh_3', 'true')

@section('active_quanlyhocsinh_diachi', 'background-color: #0000001a')
@section('contentsPage')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Danh sách các địa chỉ hiện đang có trong hệ thống</h3>
	</div>
	<p style="padding: 10px"><strong>Lưu ý:</strong> Chỉ hiển thị các địa chỉ có học sinh thuộc hệ thống lưu trữ</p>
	@foreach($listDiaChi as $keyTinh => $diachitinh)
	@if($diachitinh->HocSinh->count() != 0)
	<div id="html" class="demo jstree jstree-1 jstree-default" role="tree" aria-multiselectable="true" tabindex="0" aria-activedescendant="j1_1" aria-busy="false">
		<div class="list-group-item">
			<a data-toggle="collapse" data-target="#tinh_{{ $diachitinh->id }}" aria-expanded="true" aria-controls="collapseOne">{{ $diachitinh->tinh }}</a><a href="{{ route('loctinh', $diachitinh->id) }}" class="pull-right">Xem danh sách ({{ $diachitinh->HocSinh->count() }})</a>
		</div>
		<div class="collapse in" id="tinh_{{ $diachitinh->id }}">
			@foreach($diachitinh->DiaChiHuyen as $diachihuyen)
			@if($diachihuyen->HocSinh->count() != 0)
			<div class="well" style="margin-bottom: 1px;">
				<div class="list-group-item">
					<a data-toggle="collapse" data-target="#huyen_{{ $diachihuyen->id }}" aria-expanded="true" aria-controls="collapseOne">{{ $diachihuyen->huyen }}</a><a href="{{ route('lochuyen', $diachihuyen->id) }}" class="pull-right">Xem danh sách ({{ $diachihuyen->HocSinh->count() }})</a>
				</div>
				<div class="collapse" id="huyen_{{ $diachihuyen->id }}">
					@foreach($diachihuyen->DiaChiXa as $diachixa)
					@if($diachixa->HocSinh->count() != 0)
					<div class="well" style="margin-bottom: 1px;">
						<div class="list-group-item">
							<a data-toggle="collapse" data-target="#33" aria-expanded="true" aria-controls="collapseOne">{{ $diachixa->xa }}</a><a href="{{ route('locxa', $diachixa->id) }}" class="pull-right">Xem danh sách ({{ $diachixa->HocSinh->count() }})</a>
						</div>
					</div>
					@endif
					@endforeach
				</div>
			</div>
			@endif
			@endforeach
		</div>
	</div>
	@endif
	@endforeach
</div>
@endsection