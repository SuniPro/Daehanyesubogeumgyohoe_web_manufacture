<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" href="<?=$latest_skin_url?>/style.css">

<ul class='list-date-ul'>
<?php
for ($i=0; $i<count($list); $i++) {
	if($i>0) echo "<li class='devider'></li>";
?>
	<li>
		<div class='lt-date'>
			<div class='lt-date-box'>
				<p class='lt-day'><?=date("d",$list[$i][wr_datetime])?></p>
				<p class='lt-month'><?=date("M",$list[$i][wr_datetime])?></p>
			</div>
		</div>
		<div class='lt-data'>
			<div class='lt-title'>
				<a href='<?=$list[$i][href]?>'><?=$list[$i][subject]?></a>
			</div>
			<div class='lt-conn'>
				<?=cut_str(strip_tags($list[$i][wr_content]),100)?>
			</div>
		</div>
	</li>
<? }

if($i==0) echo "<li class='empty'> 데이터가 없습니다 </li>";
?>
</ul>
<div class='list-date-more'>
	<a href='<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>' class='tab-more'>
	Read More +
	</a>
</div>