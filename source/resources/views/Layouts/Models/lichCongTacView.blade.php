<?php 
$getLichCongTac = getLichCongTac();
if($getLichCongTac == false){
    $getTuan = null;
}else{
    $getTuan = $getLichCongTac['tuan'];
}
?>
<div class="panel panel-danger">
    <div class="widget-area fadeInLeft visible" style="visibility: visible;animation-name: fadeInLeft;">
        <header style="margin-bottom: 0">
            <div class="widget-title">
                <h2 class="title-text"><span>Kế hoạch hd tuần {{ $getTuan }}</span></h2>
            </div>
        </header>
    </div>
    <table class="table table-hover table-bordered">
        <thead>
            <tr class="bg-success">
                <th class="text-center">Thứ</th>
                <th class="text-center">Nội Dung</th>
                <th width="20%" class="text-center">Trực</th>
            </tr>
        </thead>
        <tbody>
        @if($getLichCongTac != false)
            @for($thu = 2; $thu < 8; $thu ++)
            <tr>
                <td class="text-center">{{ $thu }}</td>
                <td>{{ $getLichCongTac[$thu]['noidung'] }}</td>
                <td class="text-center">{{ $getLichCongTac[$thu]['truc'] }}</td>
            </tr>     
            @endfor 
        @else
            <tr>
                <td class="text-center bg-warning text-danger" colspan="3">Không Tìm Thấy Lich Công Tác Phù Hợp</td>
            </tr>     
        @endif             
        </tbody>
</table>
</div>