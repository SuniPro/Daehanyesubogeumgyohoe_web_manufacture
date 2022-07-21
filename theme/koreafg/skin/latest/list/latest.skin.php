<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" href="<?=$latest_skin_url?>/style.css">

<ul class='board-list-conn'>
<?php 
for ($i=0; $i<count($list); $i++) {
	echo "<li>";
	echo "<div class='list-subject'>";
	echo "<a href=\"".$list[$i]['href']."\">";
	echo "<i class='fa fa-star-o'></i> ".$list[$i]['subject'];	
	echo "</a>";
	echo "</div>";
	echo "<div class='list-date'>".date("m-d",strtotime($list[$i]['wr_datetime']))."</div>";
	echo "</li>";
}
?>
</ul>
<div class='tabonly'>
	<a href='<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>' class='tab-more'>
	Read More +
	</a>
</div>