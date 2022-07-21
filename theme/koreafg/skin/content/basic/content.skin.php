<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);

echo $str;
?>

<script type='text/javascript'>
$(document).ready(function(){
	var obj=$(".ctt_admin");
	obj.find("a").removeClass("btn_admin").addClass("btn").addClass("btn-danger").addClass("btn-sm").html("<i class='fa fa-pencil'></i> 내용수정");
	obj.removeClass(".ctt_admin").css("text-align","right");
});
</script>