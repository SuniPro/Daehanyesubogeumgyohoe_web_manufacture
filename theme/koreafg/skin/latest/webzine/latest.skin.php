<?
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$bo_gallery_width=360;
$bo_gallery_height=234;
?>
<div id='latest-webzine'>
	<div class='webzine-latest-wrap'>
	<?
	for ($i=0; $i<count($list); $i++) {
		if($list[$i][wr_thumb]){
			$thumb[src]=$list[$i][wr_thumb];
			$thumb[ori]=$thumb[src];
		}else{
			$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $bo_gallery_width, $bo_gallery_height, false, true);
		}
		
		echo "<div class='webzine-item'>";
		echo "<div class='webzine-img'>";
		echo "<div class='img-gallery-item'>";
		echo "<div class='img-over img-item' data-img='{$thumb[ori]}' data-url='{$list[$i][href]}'>";
		if($thumb['src']){
			echo "<img src='$thumb[src]' class='img-responsive' style='width:100%;'>";
		}else{
			echo "<img src='$latest_skin_url/noimage.png' class='img-responsive' style='width:100%;'>";
		}
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "<div class='webzine-conn'>";
		echo "<div class='wb-t'>";
		echo "<a href='{$list[$i][href]}'>";
		echo $list[$i][subject];
		echo "</a>";
		echo "</div>";
		echo "<div class='wb-c'>";
		echo get_text(strip_tags($list[$i][wr_content]));
		echo "</div>";
		echo "<div class='wb-i'>";
		echo "<i class='fa fa-user-o'></i> {$list[$i][name]}&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<i class='fa fa-clock-o'></i> {$list[$i][datetime2]}";
		echo "</div>";
		echo "</div>";
		echo "</div>";
	}
	?>
	</div>
	<!-- tab-more 클래스를 적용받으면 탭형 최신글에서 이 링크가 노출 됩니다. -->
	<div class='webzine-more'>
		<a href='<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>' class='tab-more'>
		Read More +
		</a>
	</div>
</div>