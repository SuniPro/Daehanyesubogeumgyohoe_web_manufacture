<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$bo_gallery_width=500;
$bo_gallery_height=500;
?>
<link rel="stylesheet" href="<?=$latest_skin_url?>/style.css">

<div class="webzine-new-wrap">
	<div class='webzine-new owl-carousel'>
		<? 
		for($i=0; $i<count($list); $i++){

			if($list[$i][wr_thumb]){
				$thumb[src]=$list[$i][wr_thumb];
				$thumb[ori]=$thumb[src];
			}else{
				$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $bo_gallery_width, $bo_gallery_height, false, true);
			}

			$list[$i][wr_content]=trim(cut_str(strip_tags($list[$i][wr_content]),200));
		?>
		
		<div class='wb-box item'>
			<div class='wb-top'>
				<div class='wb-date-wrap'>
					<div class='wb-date'>
						<p><?=date("Y",strtotime($list[$i][wr_datetime]))?></p>
						<p><?=date("m-d",strtotime($list[$i][wr_datetime]))?></p>
					</div>
				</div>
				<div class='wb-subject'>
					<a href='<?=$list[$i][href]?>' class='sj'><?=$list[$i][wr_subject]?></a>
					<p class='cp'>by <span><?=$list[$i][wr_name]?></span></p>
				</div>
			</div>
			<div class='wb-img img-over' data-url='<?=$list[$i][href]?>' data-img='<?=$thumb[ori]?>'>
				<div class='wb-item'>
					<img src='<?=$thumb[src]?>' class='img-fluid'>
				</div>
			</div>
			<? if(trim($list[$i][wr_content])){ ?>
			<div class='wb-conn'>
				<?=$list[$i][wr_content]?>
			</div>
			<? } ?>
			<a href='<?=$list[$i][href]?>' class='more'>
				Read More +
			</a>
		</div>

		<?
		}
		?>
	</div>
</div>

<!-- tab-more 클래스를 적용받으면 탭형 최신글에서 이 링크가 노출 됩니다. -->
<a href='<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>' class='tab-list-date-slide tab-more'>
	Read More +
</a>
<script type='text/javascript'>
$(document).ready(function(){
	var list_sly=$('.webzine-new');
	list_sly.owlCarousel({
		nav:false, //좌우 화살표 버튼 보임/보이지 않음 (true or false)
		loop:true, //반복여부 (true or false)
		autoplay:true, //자동시작 여부 (true or false)
		autoplayTimeout:3000, //자동재생시 대기시간 1초=1000
		autoplayHoverPause:true, //마우스 오버시 정지할지 여부 (true or false)
		smartSpeed:300,
		margin:25,
		responsiveClass:true,
		responsive:{
			0:{
				items:1
			},
			400:{
				items:2
			},
			600:{
				items:3
			},
			800:{
				items:4
			}
		}
	});
});
</script>