<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include "skin1.php";	return;
?>
<link rel="stylesheet" type="text/css" href="<?=$sw_skin_url?>/style.css">
<?
$ac1="active";
$ac2="";
if($g5[page_ary][page_sub_title] && $g5[page_ary][page_title]!=$g5[page_ary][page_sub_title]){
	$ac1="";
	$ac2="active";
}

?>
<div class="tit-nav tit-nav-bg08">
    <div class="bg"></div>
    <div class="container">
        <div class="tit-nav-h">
            <div>
                <h1><?=$g5[page_ary][page_sub_title]?></h1>
                <!--<a class="top-nav-arrow prev" href="<?=$g5[page_ary][page_link]?>"><i class="xi-angle-left-thin"><span class="sr-only">prev</span></i></a> 
                <a class="top-nav-arrow next" href="<?=$g5[page_ary][page_sub_link]?>"> <i class="xi-angle-right-thin"><span class="sr-only">next</span></i></a>-->
            </div>
        </div>
        <div class="path">
            <a href="<?=G5_URL?>/index.php" class="home"> <i class="xi-home-o"></i>HOME<i class="arr xi-angle-right-thin"></i></a>
            <ul>
                <li><a href="<?=$g5[page_ary][page_link]?>"> <span><?=$g5[page_ary][page_title]?></span><i class="arr xi-angle-right-thin"></i></a></li>
                <li><a href="<?=$g5[page_ary][page_sub_link]?>"> <span><?=$g5[page_ary][page_sub_title]?></span></a></li>
            </ul>
        </div>
    </div>
</div>