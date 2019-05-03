@extends("Layouts.masterHomeView")
@section('title', 'Trang chủ - ')
@section('sidebarleft')
	@include('Layouts.noLogin.panelLogin')
	@include('Layouts.Models.lichCongTacView')
@endsection
@section('contentsPage')


<div class="panel panel-default">
    <div class="widget-area fadeInLeft visible" style="visibility: visible;animation-name: fadeInLeft;">
        <header>
            <div class="widget-title">
                <h2 class="title-text"><span>Bài đăng mới nhất</span></h2>
            </div>
        </header>
    </div>
    <div class="panel-body">
        <div class="news_column">
            <div class="row">
                <!-- Khu vực cho bài viết mới nhất -->
                <div class="col-md-14 margin-bottom-lg">
                    <div class="margin-bottom text-center"><a href="?shownews=7" title="Lễ khai mạc giải bóng đá nam học sinh lần thứ 19 mùa giải 2018 - 2019"><img src="https://i.imgur.com/jkIagQM.jpg" alt="Lễ khai mạc giải bóng đá nam học sinh lần thứ 19 mùa giải 2018 - 2019" height="500px" class="img-thumbnail"></a></div>
                    <h2 class="margin-bottom-sm"><a href="?shownews=7" title="Lễ khai mạc giải bóng đá nam học sinh lần thứ 19 mùa giải 2018 - 2019">Lễ khai mạc giải bóng đá nam học sinh lần thứ 19 mùa giải 2018 - 2019</a></h2>
                    <p class="text-right"><a href="?shownews=7"><em class="fa fa-sign-out"></em>Xem chi tiết...</a></p>
                </div>
                <!-- Kết thúc Khu vực cho bài viết mới nhất -->
                <div class="col-md-10 margin-bottom-lg">
                    <ul class="column-margin-left">
                        <li class="icon_list clearfix">
                            <a class="show black h4" href="?shownews=3"><img src="https://i.imgur.com/FeK51GF.jpg" alt="Giới thiệu Đoàn trường Trung Học Phổ Thông Nam Đàn 2" class="img-thumbnail pull-right margin-left-sm" style="width:65px;">Giới thiệu Đoàn trường Trung Học Phổ Thông Nam Đàn 2</a>
                        </li>
                        <li class="icon_list clearfix">
                            <a class="show black h4" href="?shownews=4"><img src="https://i.imgur.com/W9krOQF.jpg" alt="Giới thiệu về Đoàn trường Trung học phổ thông Nam Đàn 2" class="img-thumbnail pull-right margin-left-sm" style="width:65px;">Giới thiệu về Đoàn trường Trung học phổ thông Nam Đàn 2</a>
                        </li>
                        <li class="icon_list clearfix">
                            <a class="show black h4" href="?shownews=5"><img src="https://i.imgur.com/QBVWmOn.jpg" alt="Đoàn trường mở cuộc họp ban chấp hành mở rộng và tập huấn công tác đoàn đợt 2" class="img-thumbnail pull-right margin-left-sm" style="width:65px;">Đoàn trường mở cuộc họp ban chấp hành mở rộng và tập huấn công tác đoàn đợt 2</a>
                        </li>
                        <li class="icon_list clearfix">
                            <a class="show black h4" href="?shownews=6"><img src="https://i.imgur.com/c5TDfyT.jpg" alt="Lễ ra mắt câu lạc bộ - Đội nhóm năm học 2018 - 2019" class="img-thumbnail pull-right margin-left-sm" style="width:65px;">Lễ ra mắt câu lạc bộ - Đội nhóm năm học 2018 - 2019</a>
                        </li>
                        <li class="icon_list clearfix">
                            <a class="show black h4" href="?shownews=7"><img src="https://i.imgur.com/jkIagQM.jpg" alt="Lễ khai mạc giải bóng đá nam học sinh lần thứ 19 mùa giải 2018 - 2019" class="img-thumbnail pull-right margin-left-sm" style="width:65px;">Lễ khai mạc giải bóng đá nam học sinh lần thứ 19 mùa giải 2018 - 2019</a>
                        </li>
                        <li class="icon_list clearfix">
                            <a class="show black h4" href="?shownews=7"><img src="https://i.imgur.com/jkIagQM.jpg" alt="Lễ khai mạc giải bóng đá nam học sinh lần thứ 19 mùa giải 2018 - 2019" class="img-thumbnail pull-right margin-left-sm" style="width:65px;">Lễ khai mạc giải bóng đá nam học sinh lần thứ 19 mùa giải 2018 - 2019</a>
                        </li>
                                                            
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('sidebarright')
	@include('Layouts.Models.congVanMoiNhatView')
	@include('Layouts.Models.danhGiaVaGopY')
@endsection