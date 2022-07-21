<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');

$title=SW_COMPANY_NAME;
$map_addr=SW_COMPANY_ADDR;
?>
<link rel="stylesheet" href="<?=G5_THEME_URL?>/pages/style.css">

<div class='ani-item' style="width:100%;height:500px;" data-animate="fadeInDown" data-duration="0.5s" data-delay="0.1s" data-offset="10">
<?
if(SW_USEMAP_TYPE=='naver'){
	include G5_THEME_PATH.'/pages/inc/map.naver.php';
}else if(SW_USEMAP_TYPE=='google'){
	include G5_THEME_PATH.'/pages/inc/map.google.php';
}else if(SW_USEMAP_TYPE=='daum'){
	include G5_THEME_PATH.'/pages/inc/map.daum.php';
}else{
	include G5_THEME_PATH.'/pages/inc/map.daum.noapi.php';
}
?>
</div>

<div class='biz-addr-title'>
	<span class='ani-item' data-animate="flipInX" data-duration="0.5s" data-delay="0.1s" data-offset="10"><?=SW_COMPANY_NAME?></span>
</div>
<div class='biz-addr-conn ani-item' data-animate="fadeInRight" data-duration="0.5s" data-delay="0.2s" data-offset="50">
	<i class="fa fa-map-o"></i> <?=SW_COMPANY_FULL_ADDR?>
</div>
<div class='biz-addr-conn ani-item' data-animate="fadeInRight" data-duration="0.5s" data-delay="0.3s" data-offset="50">
	<i class="fa fa-phone-square"></i> TEL : 02-123-4567
</div>
<div class='biz-addr-conn ani-item' data-animate="fadeInRight" data-duration="0.5s" data-delay="0.4s" data-offset="50">
	<i class="fa fa-fax"></i> FAX : 02-123-4567
</div>
<div class='biz-addr-conn ani-item' data-animate="fadeInRight" data-duration="0.5s" data-delay="0.5s" data-offset="50">
	<i class="fa fa-envelope-o"></i> E-mail : mycompany@domain.com
</div>
<div class='biz-addr-conn ani-item' data-animate="fadeInRight" data-duration="0.5s" data-delay="0.6s" data-offset="50">
	<i class="fa fa-train"></i> 지하철 관련 내용
</div>
<div class='biz-addr-conn ani-item' data-animate="fadeInRight" data-duration="0.5s" data-delay="0.7s" data-offset="50">
	<i class="fa fa-bus"></i> 버스 관련 내용
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>