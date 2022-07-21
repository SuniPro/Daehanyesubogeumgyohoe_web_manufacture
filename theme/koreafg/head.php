<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

sw_skin("widget/over/ef1",array(".img-over","300","Power3.easeOut")); //이미지 오버 이펙트 스킨
//sw_skin("widget/etc/remocon"); //테마 스타일 선택
?>
<div class='d-block d-lg-none'>
<?=sw_skin("layout/m_topmenu/basic"); //모바일용 탑메뉴 스킨 ?>
</div>
<div class='d-none d-lg-block'>
<?=sw_skin("layout/topmenu/basic"); //PC용 탑메뉴 스킨 ?>
</div>

<? 
if(!defined("_INDEX_")){
	echo sw_skin("layout/subtop/koreafg"); //서브페이지 상단 스킨
	echo sw_skin("layout/submenu/basic"); //서브페이지 메뉴 스킨
	//echo sw_skin("layout/pagetitle/basic"); //서브페이지 메뉴 스킨
}
?>