<?
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$bo_gallery_width=360;
$bo_gallery_height=234;
?>

<div id='latest-img-list'>
	<div class='imglist-latest-wrap'>
	<?
	for ($i=0; $i<count($list); $i++) {
		if($list[$i][wr_thumb]){
			$thumb[src]=$list[$i][wr_thumb];
			$thumb[ori]=$thumb[src];
		}else{
			$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $bo_gallery_width, $bo_gallery_height, false, true);
		}
		
		if($i<3){
			echo "<div class='imglist-item'>";
			echo "<div class='imglist-data'>";
			echo "<div class='img-gallery-item'>";
			echo "<div class='img-over img-item' data-img='{$thumb[ori]}' data-url='{$list[$i][href]}'>";
			if($thumb['src']){
				echo "<img src='$thumb[src]' class='img-responsive' style='width:100%;'>";
			}else{
				echo "<img src='$latest_skin_url/noimage.png' class='img-responsive' style='width:100%;'>";
			}
			echo "</div>";
			echo "</div>";
			echo "<div class='imglist-t'>";
			echo "<a href='{$list[$i][href]}'>";
			echo $list[$i][subject];
			echo "</a>";
			echo "</div>";
			echo "<div class='imglist-i'>";
			echo $list[$i][name];
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}else{
			echo "<div class='imglist-list-item'>";
			echo "<div class='list-subject'>";
			echo "<a href=\"".$list[$i]['href']."\">";
			echo "<i class='fa fa-caret-right'></i> ".$list[$i]['subject'];	
			echo "</a>";
			echo "</div>";
			echo "<div class='list-date'>".date("m-d",strtotime($list[$i]['wr_datetime']))."</div>";
			echo "</div>";
		}
	}
	?>
	</div>
	<div class='img-list-more'>
		<a href='<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>' class='tab-more'>
		Read More +
		</a>
	</div>
</div>