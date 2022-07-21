<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" type="text/css" href="<?=$sw_skin_url?>/style.css">

<div id='btm-btn'>
	<div class='top-up'></div>
	<div class='top-down'></div>
</div>

<Script type='text/javascript'>
$(document).ready(function(){
	$("#btm-btn .top-up").on("click touchend",function(){
		$('html,body').animate({"scrollTop":$("body").offset().top},1000,"Power3.easeOut");
	});

	$("#btm-btn .top-down").on("click touchend",function(){
		$('html,body').animate({"scrollTop":($(document).height() - $(window).height())},1000,"Power3.easeOut");
	});
});
</script>