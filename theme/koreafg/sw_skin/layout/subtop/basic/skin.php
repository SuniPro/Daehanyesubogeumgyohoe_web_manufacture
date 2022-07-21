<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$ac1="active";
$ac2="";
if($g5[page_ary][page_sub_title] && $g5[page_ary][page_title]!=$g5[page_ary][page_sub_title]){
	$ac1="";
	$ac2="active";
}
?>

<link rel="stylesheet" type="text/css" href="<?=$sw_skin_url?>/style.css">

<div class='sub-top-wrap'>
	<div class='container'>
		<div class='row'>
			<div class='col-md-6'>
				<h2><?=$g5[page_ary][page_title]?></h2>
			</div>
			<div class='col-md-6'>
				<ul class="breadcrumbs">
					<li>
						<a href='<?=G5_URL?>/index.php'>Home</a>
					</li>
					<li>
						<a href='<?=$g5[page_ary][page_link]?>' target='<?=$g5[page_ary][page_target]?>' class='<?=$ac1?>'><?=$g5[page_ary][page_title]?></a>
					</li>
					<? if($ac2){ ?>
					<li>
						<a href='<?=$g5[page_ary][page_sub_link]?>' target='<?=$g5[page_ary][page_sub_target]?>' class='<?=$ac2?>'><?=$g5[page_ary][page_sub_title]?></a>
					</li>
					<? } ?>
				</ul>
			</div>
		</div>
	</div>
</div>