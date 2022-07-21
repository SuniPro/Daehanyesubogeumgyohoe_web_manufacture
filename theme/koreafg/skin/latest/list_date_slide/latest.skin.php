<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" href="<?=$latest_skin_url?>/style.css">

<div class="latest-sly">
	<div class='latest-date-slide owl-carousel'>
	<? 
	for($i=0; $i<count($list); $i++){
		if($i>0 && $i%2==0){
			echo "</div>";
		}

		if($i%2==0){
			echo "<div class='item'>";
		}
	?>
	<div class='lt-items'>
		<div class='lt-tbl'>
			<div class='lt-date'>
				<div class='lt-date-box'>
					<p class='lt-day'><?=date("m/d",strtotime($list[$i][wr_datetime]))?></p>
					<p class='lt-month'><?=date("Y",strtotime($list[$i][wr_datetime]))?></p>
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
		</div>
	</div>
	<?
	}
	if(count($list)) echo "</div>";
	?>
	</div>
</div>
<!-- tab-more 클래스를 적용받으면 탭형 최신글에서 이 링크가 노출 됩니다. -->
<div class='tab-list-date-slide'>
	<a href='<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>' class='tab-more'>
	Read More +
	</a>
</div>

<script type='text/javascript'>
$(document).ready(function(){
	var list_sly=$('.latest-date-slide');
	list_sly.owlCarousel({
		nav:false, //좌우 화살표 버튼 보임/보이지 않음 (true or false)
		loop:true, //반복여부 (true or false)
		autoplay:true, //자동시작 여부 (true or false)
		autoplayTimeout:3000, //자동재생시 대기시간 1초=1000
		autoplayHoverPause:true, //마우스 오버시 정지할지 여부 (true or false)
		//animateIn:"slideInUp", //요소가 보여질때 애니메이션 (https://daneden.github.io/animate.css/ 를 참고하시어 원하는 애니메이션을 지정할 수 있습니다.)
		//animateOut:"slideOutDown", //요소가 사라질때 애니메이션 (https://daneden.github.io/animate.css/ 를 참고하시어 원하는 애니메이션을 지정할 수 있습니다.)
		smartSpeed:300,
		responsiveClass:true,
		responsive:{
			0:{
				items:1
			},
			400:{
				items:1
			},
			600:{
				items:1
			},
			800:{
				items:1
			}
		}
	});
});
</script>