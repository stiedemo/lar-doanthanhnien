// Đánh Giá Và Góp ý:
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
            document.getElementById("btndanhgia").innerHTML = "Đánh Giá Và Góp Ý";
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