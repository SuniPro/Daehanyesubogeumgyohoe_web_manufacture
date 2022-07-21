<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" type="text/css" href="<?=$sw_skin_url?>/style.css">

<div class='theme-control-wrap'>
	<div class='theme-control-btn'><i class='fa fa-cog fa-spin'></i></div>
	<div class='theme-control-box'>
		<div class='tc-t'>기본 색상 견본</div>
		<div class='tc-l'>
			<span>6가지 색상이 준비되어 있습니다.</span>
			<p>아래 견본 색상 팔레트를 클릭하시면 대표 색상이 변경됩니다.</p>
			<ul class="colors-list">
			<li><a href='#theme-control' title="Orange" class="switcher orange" data-color='orange'></a></li>
			<li><a href='#theme-control' title="Blue" class="switcher blue" data-color='blue'></a></li>
			<li><a href='#theme-control' title="Jade" class="switcher jade" data-color='jade'></a></li>
			<li><a href='#theme-control' title="Red" class="switcher red" data-color='red'></a></li>
			<li><a href='#theme-control' title="Pubple" class="switcher pubple" data-color='pubple'></a></li>
			<li><a href='#theme-control' title="Pink" class="switcher pink" data-color='pink'></a></li>
			</ul>
			<p>색상관련 CSS를 별도로 관리하여 텍스트에디터 프로그램으로 전체적인 색감을 쉽게 수정할 수 있습니다.</p>
		</div>
	</div>
</div>

<script type='text/javascript'>
$(document).ready(function(){
	$(".theme-control-wrap .theme-control-btn").on("click",function(){
		if($(".theme-control-wrap").hasClass("active")){
			$(".theme-control-wrap").removeClass("active").stop().animate({"left":"-275px"},"800","Power3.easeOut");
		}else{
			$(".theme-control-wrap").addClass("active").stop().animate({"left":"0"},"800","Power3.easeOut");
		}
	});

	$(".theme-control-wrap .switcher").on("click",function(){
		var m=$(this).data("color");
		var new_href="<?=G5_THEME_CSS_URL?>/colorset/"+m+"/skin.css";
		$(".colorset").attr("href",new_href);
	});
});
</script>