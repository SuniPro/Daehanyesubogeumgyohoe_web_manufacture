<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" type="text/css" href="<?=$sw_skin_url?>/style.css">
<script type='text/javascript' src='<?=$sw_skin_url?>/menu.js'></script>

<div id='mobile-top-wrap'>
	<div id='mobile-top'>
		<div class='logo'>
			<a href='<?=G5_URL?>/index.php'><img src='<?=$sw_skin_url?>/img/logo.png' height=30></a>
		</div>
		<div class='menu-btn'>
			<a class="menu-trigger mm-toggle">
				<span> </span>
				<span> </span>
				<span> </span>
			</a>
		</div>
	</div>
</div>

<div id='mobile-menu-area'>
	<div id="mobile-overlay"></div>
	<div id="mobile-menu">
		<div class='mobile-menu-close'><i class='fa fa-times'></i></div>
		<div class='mobile-menu-box'>
		<ul>
			<li class='mmenu'>
				<div class="mm-search">
				<form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
					<input type="hidden" name="sfl" value="wr_subject||wr_content">
					<input type="hidden" name="sop" value="and">
					<div class="input-group">
						<input type="text" name="stx" id="sch_stx" class="form-control form-control-sm" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-sm btn-dark" type="submit">검색</button>
						</span>
					</div>
				</form>
				</div>
			</li>
			<li class='mm-login'>
				<?=outlogin("theme/siwons_m")?>
			</li>
			<li class='mmenu'></li>
			<?
			$mmenu=$g5[menu_list][momenu];
			$mmenu=str_replace("[menu ","<li class='mmenu'><a ",$mmenu);
			$mmenu=str_replace(" menu]",">",$mmenu);
			$mmenu=str_replace("[/menu]","</a></li>",$mmenu);
			$mmenu=str_replace("[submenu]","<ul>",$mmenu);
			$mmenu=str_replace("[/submenu]","</ul>",$mmenu);
			$mmenu=str_replace("[divider]","",$mmenu);
			$mmenu=str_replace("[item ","<li class='ms-menu'><a ",$mmenu);
			$mmenu=str_replace(" item]",">",$mmenu);
			$mmenu=str_replace("[/item]","</a></li>",$mmenu);
			$mmenu=str_replace("[arrow]","<i class='fa fa-plus' style='margin-left:10px;'></i></a>",$mmenu);
			$mmenu=str_replace("[item-arrow]","",$mmenu);
			
			echo $mmenu;
			?>
			<li class='mmenu-empty'></li>
		</ul>
		</div>
	</div>
</div>

<script type='text/javascript'>
$(window).scroll(function(e){
	mtopmenu_show($(this),e); //스크롤시 상단메뉴 sticky
});

$(window).resize(function(e){
	mtopmenu_show($(this),e); //리사이즈시 상단메뉴 sticky
});

$(document).ready(function(){
	$("#mobile-menu").mobileMenu({
		MenuWidth:300, //모바일용 메뉴의 너비 (px)
		OpenSlideSpeed : 0.5, //모바일용 메뉴가 열릴때 애니메이션의 진행 시간 (초 단위 - 시간이 길 수록 느림)
		CloseSlideSpeed : 0.5, //모바일용 메뉴가 닫힐때 애니메이션의 진행 시간 (초 단위 - 시간이 길 수록 느림)
		WindowsMaxWidth : 767,
		PagePush : true,
		FromLeft : false, //true = 좌측에서 출현, false = 우측에서 출현
		Overlay : true, //메뉴 오픈시 전체를 덮는 레이어 - 오버레이 (true=보임, false=보이지 않음)
		CollapseMenu : true,
		ClassName : "mobile-menu",
		OpenEasing : "Power3.easeOut", //모바일용 메뉴가 열릴때 애니메이션의 종류 (https://greensock.com/docs/Easing 참조)
		CloseEasing : "Power3.easeIn", //모바일용 메뉴가 닫힐때 애니메이션의 종류 (https://greensock.com/docs/Easing 참조)
		CloseBtn:true
	});

	
});

//상단메뉴 위치선정 및 스크롤시 sticky 적용 - 애니메이션
function mtopmenu_show(top_obj,e){
	var sc_top=top_obj.scrollTop();
	var obj=$("#mobile-top-wrap");

	if(sc_top>=Number(obj.outerHeight())){
		obj.addClass("mtopmenu-fixed");
		$("#mobile-menu").addClass("mm-fixed");
		$("#mobile-menu").css({"top":$("#mobile-top-wrap").outerHeight()});
	}else{
		obj.removeClass("mtopmenu-fixed");
		$("#mobile-menu").removeClass("mm-fixed");
		$("#mobile-menu").css({"top":0});
		
	}
}
</script>