<header>
<!-- OPEN Header -->
	<div class="container-fluid topbanner">
        <h2 id="logo">
        	<a href="/"><img alt="Đoàn trường THPT Nam Đàn 2" src="Libs/images/logo-doanthanhnien.png"></a>
        </h2>
        <h2 id="banner">
        	<img alt="Website chính thức của Đoàn Trường THPT Nam Đàn 2 tại Nghệ An" src="Libs/images/banner.png">
        </h2>
        <div class="banner-right">
            <img alt="Quang cảnh Trường THPT Nam Đàn 2 tại Nghệ An" src="Libs/images/banner-right.png">
        </div>
    </div>
<!-- OPEN Header -->
</header>
<nav class="second-nav" id="menusite">
	<div class="container">
		<div class="row">
			<div class="bg box-shadow">
				<div class="navbar navbar-default navbar-static-top" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-site-default">
							<span class="sr-only">&nbsp;</span> <span class="icon-bar">&nbsp;</span> <span class="icon-bar">&nbsp;</span> <span class="icon-bar">&nbsp;</span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="menu-site-default">
						<ul class="nav navbar-nav">
							<li><a class="home" title="Trang nhất" href="/"><em class="fa fa-lg fa-home">&nbsp;</em><span class="visible-xs-inline-block"> Trang nhất</span></a></li>
							@foreach($getListTheLoai as $theloai)
							<li class="dropdown" role="presentation"><a class="dropdown-toggle" href="the-loai/{{ $theloai->tenkhongdau }}" role="button" aria-expanded="false" title="Cơ cấu tổ chức">{{ $theloai->ten }}<strong class="caret">&nbsp;</strong></a>  
								<ul class="dropdown-menu">
									@foreach($theloai->LoaiTin as $loaitin)
									<li>  <a href="loai-tin/{{ $loaitin->tenkhongdau }}">{{ $loaitin->ten }}</a> 
									</li>
									@endforeach
								</ul> 
							</li>
							@endforeach
							<li class="dropdown" role="presentation"><a class="dropdown-toggle" href="" role="button" aria-expanded="false" title="Cơ cấu tổ chức">  Liên kết mạng xã hội <strong class="caret">&nbsp;</strong></a>  
								<ul class="dropdown-menu">
									<li>  <a href="">Facebook</a> 
									<li>  <a href="">Youtube</a>  
									</li>
								</ul> 
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>