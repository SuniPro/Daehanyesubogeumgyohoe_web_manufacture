<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if($option[0]) $page_title=$option[0];
else $page_title=$g5[page_ary][page_sub_title];
?>
<link rel="stylesheet" href="<?=$sw_skin_url?>/style.css">
<div class="subpage-header">
	<p><?=$page_title?></p>
</div>