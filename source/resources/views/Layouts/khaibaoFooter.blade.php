
<script type="text/javascript" src="Libs/js/contact.js"></script>
<script type="text/javascript" src="Libs/js/my-script.js"></script>
<script type="text/javascript" src='Libs/js/Chart.min.js'></script>
<script src="Libs/assets/js/jquery/jquery.min.js"></script>
<script src="Libs/assets/js/language/vi.js"></script>
<script src="Libs/assets/js/global.js"></script>
<script src="Libs/js/news.js"></script>
<script src="Libs/js/main.js"></script>
<script type="text/javascript" data-show="after">
    $(function() {
        checkWidthMenu();
        $(window).resize(checkWidthMenu);
    });
</script>
<script type="text/javascript" src="Libs/assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="Libs/assets/js/language/jquery.ui.datepicker-vi.js"></script>
<script type="text/javascript" src="Libs/js/users.js"></script>
<script type="text/javascript">
$(document).ready(function() {$("[data-rel='block_news_tooltip'][data-content!='']").tooltip({
	placement: "bottom",
	html: true,
	title: function(){return ( $(this).data('img') == '' ? '' : '<img class="img-thumbnail pull-left margin_image" src="' + $(this).data('img') + '" width="90" />' ) + '<p class="text-justify">' + $(this).data('content') + '</p><div class="clearfix"></div>';}
});});
</script>
<script type="text/javascript" src="Libs/assets/js/jquery/jquery.metisMenu.js"></script>
<script type="text/javascript">
$(function () {
	$('#menu_3').metisMenu({
        toggle: false
    });
});
</script>
<script src="Libs/js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="Libs/assets/js/jquery/jquery.dataTables.js"></script>
