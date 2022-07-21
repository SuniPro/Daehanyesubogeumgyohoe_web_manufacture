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
?>
<div class='subpage-bg'>
	<div class='bg-overlay'></div>
	<div class='subpage-title'><?=$g5[page_ary][page_title]?></div>
	<div class='subpage-nav'>
		<ul>
			<li>
				<a href='<?=G5_URL?>/index.php'>Home</a>
			</li>
			<li>
				<i class='fa fa-angle-right'></i>
			</li>
			<li>
				<a href='<?=$g5[page_ary][page_link]?>' target='<?=$g5[page_ary][page_target]?>' class='<?=$ac1?>'><?=$g5[page_ary][page_title]?></a>
			</li>
			<? if($ac2){ ?>				
			<li>
				<i class='fa fa-angle-right'></i>
			</li>
			<li>
				<a href='<?=$g5[page_ary][page_sub_link]?>' target='<?=$g5[page_ary][page_sub_target]?>' class='<?=$ac2?>'><?=$g5[page_ary][page_sub_title]?></a>
			</li>
			<? } ?>
		</ul>
	</div>
</div>