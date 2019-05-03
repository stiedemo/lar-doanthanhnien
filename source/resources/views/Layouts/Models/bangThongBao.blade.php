<div class="panel panel-danger">
    <div class="widget-area fadeInLeft visible" style="visibility: visible;animation-name: fadeInLeft;">
	    <header>
	        <div class="widget-title">
	            <h2 class="title-text"><span>BẢNG THÔNG BÁO</span></h2>
	        </div>
	    </header>
	</div>
	<div class="panel-body">
		<ul class="block_tophits">
			<li class="clearfix">
				@foreach(getThongBao() as $listthongbao)
				<a title="{{ $listthongbao->tieude }}" href="#"><span class="label label-danger">{{ dateTimeFormat($listthongbao->created_at) }}</span></a>
					Ban Chấp Hành Đoàn trường đã thông báo về việc <strong>{{ $listthongbao->tieude }}</strong>
				<a class="show" href="#" data-content="{{ $listthongbao->noidung }}" data-img="" data-rel="block_news_tooltip" data-original-title="" title="">Xem chi tiết</a>
				@endforeach
			</li>			
		</ul>
	</div>
	<div class="panel-footer">
		Rê chuột vào tiêu đề của thông báo để biết thêm chi tiết
	</div>
</div>
