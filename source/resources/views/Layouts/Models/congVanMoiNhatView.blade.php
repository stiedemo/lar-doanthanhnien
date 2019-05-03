<div class="panel panel-danger">
    <div class="widget-area fadeInLeft visible" style="visibility: visible;animation-name: fadeInLeft;">
        <header style="margin-bottom: 0">
            <div class="widget-title">
                <h2 class="title-text"><span>Công văn mới nhất</span></h2>
            </div>
        </header>
    </div>
    <table class="table table-hover table-bordered">
            <tbody>
                @if($listCongVan == null)
                <tr class="text-danger bg-warning text-center">
                    <td>Không Tìm Thấy Công Văn Phù Hợp</td>
                </tr>   
                @else
                @if($listCongVan->BaiDang->count() == 0)  
                <tr class="text-danger bg-warning text-center">
                    <td>Không Tìm Thấy Công Văn Phù Hợp</td>
                </tr> 
                @else
                    @foreach($listCongVan->BaiDang as $CongVan)
                        <tr class="bg-danger">
                            <td><span class="label label-primary">{{ $CongVan->LoaiTin->ten }}</span> <a href="{{  route('baidang-congvan', $CongVan->tieudekhongdau . '-' . $CongVan->id) }}" class="text-info">{{ $CongVan->tieude }}</a> (<i>{{ dateTimeFormat($CongVan->created_at) }}</i>)</td>
                        </tr>    
                    @endforeach
                @endif    
                @endif                      
            </tbody>
        </table>
</div>