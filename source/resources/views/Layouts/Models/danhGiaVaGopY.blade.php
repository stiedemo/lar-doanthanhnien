<script type="text/javascript">
    function danhgiaJS() {
        if(typeof tinhtrang == "undefined"){
            tinhtrang = 0;
            $('#khungdanhsach').fadeOut(0);
            $('#danhgia-nhacnho').fadeOut(0);
            $('#khungdanhgia').fadeIn(50);
            document.getElementById("btndanhgia").innerHTML = "Danh Sách Đánh Giá";
            document.getElementById("btndanhgia").setAttribute('class', 'btn btn-success');
        }else{
            if(tinhtrang == 0){
                $('#khungdanhsach').fadeIn(0);
                $('#danhgia-nhacnho').fadeIn(1000);
                $('#khungdanhgia').fadeOut(50);
                tinhtrang = 1;
                document.getElementById("btndanhgia").innerHTML = "@if(Auth::check() and Auth::user()->chucvu == 3) Kiểm duyệt hàng chờ @else Đánh Giá Và Góp Ý @endif";
                document.getElementById("btndanhgia").setAttribute('class', 'btn btn-primary');
            }else{
                $('#khungdanhsach').fadeOut(0);
                $('#danhgia-nhacnho').fadeOut(0);
                $('#khungdanhgia').fadeIn(50);
                tinhtrang = 0;
                document.getElementById("btndanhgia").innerHTML = "Danh Sách Đánh Giá";
                document.getElementById("btndanhgia").setAttribute('class', 'btn btn-success');
            }
        }
    }
</script>
<?php 
    $totalCount = totalCount('danh_gia', 'tinhtrang', '=', 1);
    $totalValues = totalValues('danh_gia', 'sao','tinhtrang', '=', 1);
    if($totalValues != 0){
        $binhquandanhgia = floor($totalValues / $totalCount);
    }else{
        $binhquandanhgia = 0;
    }
?>
<div class="panel panel-danger">
    <div class="widget-area fadeInLeft visible" style="visibility: visible;animation-name: fadeInLeft;">
        <header style="margin-bottom: 0">
            <div class="widget-title">
                <h2 class="title-text"><span>Đánh Giá và góp ý</span></h2>
            </div>
        </header>
    </div>
    <table class="table table-hover table-bordered">
        <thead>
            <tr class="bg-success">
                <th colspan="2" class="text-center" style="color: #FD4; font-size: 20px; -webkit-text-stroke: 1px red;">
                    <!-- Bình quân lượng đánh giá -->
                    @for($i = 0; $i < $binhquandanhgia; $i ++)
                    <i class="fa fa-star"></i>
                    @endfor
                    @for($i = 0; $i < (5-$binhquandanhgia); $i ++)
                    <i class="fa fa-star" style="color: white"></i>
                    @endfor
                    <br>
                    <i class="text-primary" style=" font-size: 13px; -webkit-text-stroke: 0">(Bình Quân {{ $binhquandanhgia }}* / Tổng {{ $totalCount}} Đánh Giá)</i>
                </th>
            </tr>
        </thead>
    </table>
    <div style="height: 300px;">
        @if(Auth::check() and Auth::user()->chucvu == 3)
            {{-- Khu vực kiểm duyệt dành cho quản lý:  --}}  
            <div style="height: 300px; overflow:auto; display: none;" id="khungdanhgia">
                @if(getDanhGiaKD()->count() == 0)
                <button type="button" class="btn btn-sm btn-group-justified">Không có nhận xét cần phê duyệt</button>
                @else
                <a href="{{ route('admin-pheduyetdanhgia', 'all') }}" class="btn btn-primary btn-sm btn-group-justified">Phê duyệt tất cả</a>
                @endif
                @foreach(getDanhGiaKD() as $danhgia)                             
                <div class="list-group-item">
                    <span class="label label-info">{{ dateTimeFormat($danhgia->created_at) }}</span> <i class="text-info">{{ $danhgia->ten }}</i> đã đánh giá <strong>{{ $danhgia->sao }}<i class="fa fa-star" style="color: #FD4;"></i></strong>
                    @if($danhgia->danhgia != null)
                        và có ý kiến: <strong>{{ $danhgia->danhgia }}</strong>
                    @endif
                    <a onclick="return xacnhanxoa('Xác nhận PHÊ DUYỆT nhận xét: [ {{ $danhgia->danhgia }} ]')" href="{{ route('admin-pheduyetdanhgia', $danhgia->id) }}"><span class="label label-primary">[PHÊ DUYỆT]</span></a>
                    <a onclick="return xacnhanxoa('Xác nhận xóa yêu cầu phê duyệt nhận xét: [ {{ $danhgia->danhgia }} ]')" href="{{ route('admin-xoapheduyetdanhgia', $danhgia->id) }}"><span class="label label-danger">[XÓA]</span></a>
                </div>  
                @endforeach
            </div>
        @else
            <div id="khungdanhgia" style="margin: 10px; display: none;">
                <div id="thongbaothanhcong" style="display: none" class="alert alert-success"></div>
                <form id="formdanhgia">
                <input id="form-token" name="_token" type="hidden" value="{{csrf_token()}}">
                    <div class="form-detail">
                        <div class="form-group loginstep1">
                            <div class="input-group">
                                <span class="input-group-addon"><em class="fa fa-user fa-lg"></em></span>
                                <input id="form-ten" type="text" class="required form-control" placeholder="Họ Và Tên" value="" name="ten">
                            </div>
                            <p style="color:red; display: none" class="error errorTen"></p>
                        </div>
                        <div class="form-group loginstep1">
                            <div class="input-group">
                                <span class="input-group-addon"><em class="fa fa-phone fa-lg"></em></span>
                                <input id="form-sodienthoai" type="text" class="required form-control" placeholder="Số Điện Thoại" value="" name="sodienthoai">
                            </div>
                            <p style="color:red; display: none" class="error errorSodienthoai"></p>
                        </div>
                        <input type="hidden" name="cSao" id="form-sao" value="">
                        <div class="stars">
                            <input class="star star-5" id="star-5" type="radio" name="sao" onclick="chonSao(5)" value="5" />
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio" name="sao" onclick="chonSao(4)" value="4" />
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" name="sao" onclick="chonSao(3)" value="3" />
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" name="sao" onclick="chonSao(2)" value="2" />
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" name="sao" onclick="chonSao(1)" value="1" />
                            <label class="star star-1" for="star-1"></label>
                        </div>
                            <p style="color:red; display: none" class="error errorSao"></p>
                        <div class="form-group loginstep1">
                            <div class="input-group">
                                <span class="input-group-addon"><em class="fa fa-list fa-lg"></em></span>
                                <input id="form-danhgia" type="text" class="form-control" placeholder="Nội Dung Đánh Giá (Mọi đánh giá sẽ được kiểm duyệt" value="" name="danhgia">
                            </div>
                            <p style="color:red; display: none" class="error errorDanhgia"></p>
                        </div>
                        <div class="text-center margin-bottom-lg">
                        <button id="guidanhgia" class="btn btn-primary" type="button" name="login">Gửi Đánh Giá</button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        <marquee direction="up" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="3" id="khungdanhsach">  
            @foreach(getDanhGia() as $danhgia)                               
            <div class="list-group-item">
                <span class="label label-danger">{{ dateTimeFormat($danhgia->created_at) }}</span> <i class="text-info">{{ $danhgia->ten }}</i> đã đánh giá <strong>{{ $danhgia->sao }}<i class="fa fa-star" style="color: #FD4;"></i></strong>
                @if($danhgia->danhgia != null)
                    và có ý kiến: <strong>{{ $danhgia->danhgia }}</strong>
                @endif
            </div>
            @endforeach
        </marquee>
        <p class="text-justify text-primary" id="danhgia-nhacnho" style="padding: 10px; font-size: 12px">
            Mọi người có thể đánh giá và đóng góp ý kiến. Để thực hiện vui lòng bấn vào nút "<strong>Đánh giá và góp ý</strong>" phía dưới. Mọi ý kiến đều được kiểm duyệt trước khi hiển thị
        </p>
    </div>
    <div class="panel-footer text-right"> 
        
            <button id="btndanhgia" onclick="danhgiaJS()" class="btn btn-info">@if(Auth::check() and Auth::user()->chucvu == 3) Kiểm duyệt hàng chờ <span class="label label-danger">{{ getDanhGiaKD()->count() }}</span> @else Đánh Giá Và Góp Ý @endif</button>
    </div>
</div>
<script>
    function chonSao(sao) {
        $('#form-sao').val(sao);
    }
    $(function() {
        $('#guidanhgia').click(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                'url' : '{{ route('danhgiavanhanxet') }}',
                'data': {
                    ten : $('#form-ten').val(),
                    sodienthoai : $('#form-sodienthoai').val(),
                    sao : $('#form-sao').val(),
                    danhgia : $('#form-danhgia').val(),
                    _token : $('#form-token').val()
                },
                'type': 'POST',
                success: function(data) {
                    if(data.error == true){
                        $('.error').hide();
                        if(data.message.ten != undefined){
                            $('.errorTen').show().text(data.message.ten[0]);
                        }
                        if(data.message.sodienthoai != undefined){
                            $('.errorSodienthoai').show().text(data.message.sodienthoai[0]);
                        }
                        if(data.message.sao != undefined){
                            $('.errorSao').show().text(data.message.sao[0]);
                        }
                        if(data.message.danhgia != undefined){
                            $('.errorDanhGia').show().text(data.message.danhgia[0]);
                        }
                    }else{
                        $('.error').fadeOut();
                        if(data.message == null){
                            $('#thongbaothanhcong').show().text('Cảm ơn bạn đã nhận xét, trang web sẽ được tải lại để hiển thị đánh giá của bạn');
                            $('#formdanhgia').fadeOut();
                            location.reload();
                        }else{
                            $('#thongbaothanhcong').show().text(data.message);
                            $('#formdanhgia').fadeOut();
                        }
                    }
                },
                error: function (data) {

                }
            });
        });
    });
</script>