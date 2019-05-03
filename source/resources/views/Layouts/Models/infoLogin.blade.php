<div class="panel panel-primary">
    <div class="widget-area fadeInLeft visible" style="visibility: visible;animation-name: fadeInLeft;">
        <header>
            <div class="widget-title">
                <h2 class="title-text"><span>Thông tin tài khoản</span></h2>
            </div>
        </header>
    </div>
    <div class="panel-body">
        <div class="nv-info" style="display:none"></div>
        <div class="userBlock clearfix">
            <div class="row">
                <div class="col-xs-8 text-center">
                    <img @if(Auth::user()->avatar == null)
                    src="Libs/images/users/no_avatar.png" 
                    @else
                    src="Libs/images/users/{{Auth::user()->avatar}}" 
                    @endif alt="{{ Auth::user()->name }}" class="img-thumbnail bg-gainsboro">
                </div>
                <div class="col-xs-16">
                    <ul class="text-justify nv-list-item sm">
                        <li class="active"><strong><span class="text-info">{{ Auth::user()->name }}</span></strong>
                        </li>
                        <li><strong>TK: </strong></span> <span class="text-info">{{ usernamedecode(Auth::user()->username) }}</span>
                        </li>
                        <li><strong>Chức Vụ</strong>:</span> <span class="text-info">{{ getChucVu(Auth::user()->chucvu) }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-footer">
        <div class="row">
            <div class="col-xs-16 small">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editavatar">
                    Chỉnh sửa
                </button>
                <!-- Modal -->
                <div class="modal fade" id="editavatar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa ảnh đại diện</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="logoUploadForm" action="{{ route('changeavatar') }}" method="post" enctype="multipart/form-data">
                                    <input id="form-token" name="_token" type="hidden" value="{{csrf_token()}}">
                                    <legend>Thay đổi ảnh đại diện cho tài khoản</legend>
                                    <div class="form-group">
                                        <img id="logoimages" class="img-responsive" src="{LOGO}" style="display: none"/>
                                        <label for="avatar">Chọn ảnh đại diện: </label>
                                        <input name="images" type="file" class="form-control" id="logoUploadInput">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button id="btn-changeavatar" type="submit" name="editavatar" class="btn btn-primary">Lưu Lại</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-8 text-right">
                <a type="button" class="btn btn-default btn-sm active" href="{{ route('logout') }}"><em class="fa fa-exit"></em>&nbsp;Đăng xuất&nbsp;</a>
            </div>
        </div>
    </div>
</div>
<script>
</script>