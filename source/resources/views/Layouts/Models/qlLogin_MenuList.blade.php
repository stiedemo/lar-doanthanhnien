<div class="clearfix panel metismenu">
	<aside class="sidebar">
		<nav class="sidebar-nav">
			<ul id="menu_3">
				<li><a href="{{ route('home') }}" title="Trang chủ">Trang Chủ</a></li>
				<li class="@yield('active_quanlyblogs_1')">
					<a class="expand" title="Chức năng tin tức">Quản lý Blogs</a>
					<span class="fa arrow expand">&nbsp;</span>
					<ul class="collapse @yield('active_quanlyblogs_2')" aria-expanded="@yield('active_quanlyblogs_3')">
						<li class="@yield('active_quanlyblogs_baidang_1')"><a class="expand" title="Đăng tin hoạt động">Bài đăng</a>
						<span class="fa arrow expand">&nbsp;</span>
						<ul class="collapse @yield('active_quanlyblogs_baidang_2')" aria-expanded="@yield('active_quanlyblogs_baidang_3')">
							<li><a class="submenus" style="@yield('active_quanlyblogs_baidang_uploadcongvan')" href="{{ route('admin-uploadcongvan') }}" title="Đăng tải thông báo">Upload công văn</a></li>
							<li><a class="submenus" style="@yield('active_quanlyblogs_baidang_dangtinhoatdong')" href="{{ route('admin-dangtinhoatdong') }}" title="Đăng tin hoạt động">Đăng tin hoạt động</a></li>
							<li><a class="submenus" style="@yield('active_quanlyblogs_baidang_dangtaithongbao')" href="{{ route('admin-dangtaithongbao') }}" title="Đăng tải thông báo">Đăng tải thông báo</a></li>
						</ul></li>
						<li><a href="?action=dangthongbao" title="Đăng tải thông báo">Thông tin cơ bản</a></li>
					</ul>
				</li>
				<li class="@yield('active_quanlyhocsinh_1')">
					<a class="expand" title="Chức năng tin tức">Quản lý Học Sinh</a>
					<span class="fa arrow expand">&nbsp;</span>
					<ul class="collapse @yield('active_quanlyhocsinh_2')" aria-expanded="@yield('active_quanlyhocsinh_3')">
						<li><a style="@yield('active_quanlyhocsinh_chidoan')" href="{{ route('admin-quanlichidoan') }}" title="Đăng tải thông báo">Tổng hợp các chi đoàn</a></li>
						<li><a style="@yield('active_quanlyhocsinh_diachi')" href="{{ route('admin-quanlidiachi') }}" title="Đăng tải thông báo">Địa chỉ tổng hợp</a></li>
						<li class="@yield('active_quanlyhocsinh_congcu_1')"><a class="expand" title="Đăng tin hoạt động">Công cụ</a>
						<span class="fa arrow expand">&nbsp;</span>
						<ul class="collapse @yield('active_quanlyhocsinh_congcu_2')" aria-expanded="@yield('active_quanlyhocsinh_congcu_3')">
							<li><a class="submenus" style="@yield('active_quanlyhocsinh_congcu_loc')" href="{{ route('congculoc') }}" title="Đăng tải thông báo">Công cụ LỌC</a></li>
							<li><a class="submenus" style="@yield('active_quanlyhocsinh_congcu_import')" href="{{ route('admin-importhocsinh') }}" title="Đăng tải thông báo">Nhập dữ liệu học sinh số lượng lớn</a></li>
						</ul></li>
					</ul>
				</li>
				<li class="@yield('active_quanlynenep_1')">
					<a class="expand" title="Chức năng tin tức">Quản lý Nề Nếp</a>
					<span class="fa arrow expand">&nbsp;</span>
					<ul class="collapse @yield('active_quanlynenep_2')" aria-expanded="@yield('active_quanlynenep_3')">
						<li><a style="@yield('active_quanlynenep_capnhatnoiquy')" href="{{ route('admin-capnhatnoiquy') }}" title="Đăng tải thông báo">Cập nhật nội quy</a></li>
						<li><a style="@yield('active_quanlynenep_tongHopViPham')" href="{{ route('admin-tonghophocsinhvipham') }}" title="Đăng tải thông báo">Tổng hợp học sinh vi phạm</a></li>
					</ul>
				</li>
				<li><a style="@yield('active_thongtinnamhoc')"  href="{{ route('admin-thongtinnamhoc') }}" title="Trang chủ">Thông tin năm học</a></li>
			</ul>
		</nav>
	</aside>
</div>		