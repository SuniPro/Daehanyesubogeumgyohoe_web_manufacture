<?
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$bo_gallery_width=373;
$bo_gallery_height=243;
?>
<section class='main-gall-latest'>
	<div class="owl-carousel main-gall-carousel owl-theme">
		<?
		for ($i=0; $i<count($list); $i++) {
			if($list[$i][wr_thumb]){
				$thumb[src]=$list[$i][wr_thumb];
				$thumb[ori]=$thumb[src];
			}else{
				$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $bo_gallery_width, $bo_gallery_height, false, true);
			}
			
			echo "<div class='item img-gallery-item'>";

			echo "<div class='img-over img-item' data-img='{$thumb[ori]}' data-url='{$list[$i][href]}'>";
			echo "<a href='{$list[$i][href]}'>";
			if($thumb[src]){
			echo "<img src='{$thumb[src]}'>";
			}else{
			echo "<img src='{$latest_skin_url}/img/noimage.png' class='img-fluid'>";
			}
			echo "</a>";
			echo "</div>";
			echo "</div>";
		}
		?>
	</div>

	<!-- tab-more 클래스를 적용받으면 탭형 최신글에서 이 링크가 노출 됩니다. -->
	<div class='gallery-more'>
		<a href='<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>' class='tab-more'>
		Read More +
		</a>
	</div>
</section>

<script type='text/javascript'>
var mgl=$('.main-gall-carousel');
mgl.owlCarousel({
	dots:true,
	loop: true,
	autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
	responsive: {
		0: {
			items: 1
		},
		600: {
			items: 1
		},
		1000: {
			items: 1
		}
	}
});
</script>