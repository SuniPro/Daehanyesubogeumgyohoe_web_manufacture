<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');
include_once($latest_skin_path.'/skin.lib.php');

$category_option = get_latest_category_list($bo_table);
?>
<link rel="stylesheet" href="<?=$latest_skin_url?>/style.css">
<script type='text/javascript' src="<?=$latest_skin_url?>/isotope.js"></script>

<div class='cube-gallery'>
	<div class='cube-cate'>
	<?php echo $category_option ?>
	</div>
	
	<div class='cube-wrap'>
	<? 
	for($i=0; $i<count($list); $i++){
		$ca_name=md5($list[$i]['ca_name']);

		$caption=date("Y.m.d",strtotime($list[$i][wr_datetime]));

		if($list[$i][wr_thumb]){
			$thumb[src]=$list[$i][wr_thumb];
			$thumb[ori]=$thumb[src];
		}else{
			$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], 500, 500, false, true);
		}

		echo "<div class='cube-items {$ca_name} img-over col-md-4 col-lg-3 col-xl-2' data-title='{$list[$i][wr_subject]}' data-caption='$caption' data-url='{$list[$i][href]}' data-img='{$thumb[ori]}'>";

		//css 로딩 스타일
		echo "<div class='gallmax-item-loading-wrap'>";
		echo "<div class='gallmax-spinner'>";
		echo "<div class='skin-loader gallmax-rect1'></div>";
		echo "<div class='skin-loader gallmax-rect2'></div>";
		echo "<div class='skin-loader gallmax-rect3'></div>";
		echo "<div class='skin-loader gallmax-rect4'></div>";
		echo "<div class='skin-loader gallmax-rect5'></div>";
		echo "</div>";
		echo "</div>";
		//css 로딩 스타일 끝

		echo "<div class='thumb'>";
		echo "<div class='centered'>";
		echo "<img src='{$thumb[src]}'>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
	}
	?>
	</div>
</div>

<script type='text/javascript'>
$(window).resize(function(){
	isotope_show();
});

$(document).ready(function(){
	$(".cube-items img").imagesLoaded().progress(function(instance,image){
		var img=$(image.img);
		var img_w=img.width();
		var img_h=img.height();
		if(img_w<img_h){
			img.addClass("h-crop");
		}else{
			img.addClass("w-crop");
		}
		var obj=img.closest(".cube-items");

		obj.find(".gallmax-item-loading-wrap").fadeOut(300);
	}).done(function(){
		isotope_show();
	});
 
    $('.cube-cate div').on("click",function(){
		$('.cube-cate .current').removeClass('current');
		$(this).addClass('current');

		$(".cube-cate div").removeClass("active");
		$(this).addClass("active");
	 
		var selector = $(this).data('filter');

		isotope_show(selector);

		return false;
    });
});

function isotope_show(selector){
	var $container = $('.cube-wrap');
		
	if(selector){
		$container.isotope({
			filter:selector,
			itemSelector:'.cube-items'
		});
	}else{
		$container.isotope({
			filter:'*',
			itemSelector:'.cube-items'
		});
	}
}
</script>