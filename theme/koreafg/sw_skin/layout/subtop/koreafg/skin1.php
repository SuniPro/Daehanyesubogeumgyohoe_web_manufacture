<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" type="text/css" href="<?=$sw_skin_url?>/style.css">
<?
$ac1="active";
$ac2="";
if($g5[page_ary][page_sub_title] && $g5[page_ary][page_title]!=$g5[page_ary][page_sub_title]){
	$ac1="";
	$ac2="active";
}

/*

theme/gkvc1365/sw_skin/layout/subtop/bg_img/style.css 에서 아래 css의 백그라운드 이미지경로 수정
백그라운드 이미지가 보이지 않으면 해당 경로에 이미지가 없거나 css 백그라운드의 경로가 잘못된 것입니다.

.tit-nav-bg01 .bg{} 기본 백그라운드
.tit-nav-bg02 .bg{} 센터소개
.tit-nav-bg03 .bg{} 자원봉사활동
.tit-nav-bg04 .bg{} 인정보상
.tit-nav-bg05 .bg{} 정보마당
.tit-nav-bg06 .bg{} MemberShip
.tit-nav-bg07 .bg{}
.tit-nav-bg08 .bg{}

*/

$sub_bg = "tit-nav-bg01"; //기본 백그라운드

$sub_bg_arr = array(
	"총회안내"			=> "tit-nav-bg01",
	"우리가 믿는것"		=> "tit-nav-bg02",
	"총회부서"			=> "tit-nav-bg03",
	"지방회"			=> "tit-nav-bg04",
	"선교지"	=> "tit-nav-bg05",
	"자료실"		=> "tit-nav-bg06",
	"열린마당"		=> "tit-nav-bg07",
);
if($sub_bg_arr[$g5[page_ary][page_title]]) $sub_bg = $sub_bg_arr[$g5[page_ary][page_title]];

?>
<div class="tit-nav <?php echo $sub_bg?>">
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