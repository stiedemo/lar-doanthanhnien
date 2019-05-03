@extends("Layouts.masterHomeView")
@section('title', 'Trang chủ - ')
@section('sidebarleft')
	@include('Layouts.memLogin.menuList')
	@include('Layouts.Models.infoLogin')
	@include('Layouts.Models.lichCongTacView')
@endsection