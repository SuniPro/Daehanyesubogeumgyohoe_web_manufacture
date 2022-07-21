<?
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$bo_gallery_width=270;
$bo_gallery_height=300;
?>

<div id='portfolio-latest'>
	<div class='portfolio-slide owl-carousel'>
	<?
	for ($i=0; $i<count($list); $i++) {
		if($list[$i][wr_thumb]){
			$thumb[src]=$list[$i][wr_thumb];
			$thumb[ori]=$thumb[src];
		}else{
			$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $bo_gallery_width, $bo_gallery_height, false, true);
		}
		
		$date=date("m-d",strtotime($list[$i]['wr_datetime']));
		$list[$i][content]=cut_str(strip_tags($list[$i][content]),150);

		echo "<div class='item'>";
		echo "<div class='item-box'>";
		echo "<div class='img-gallery-item img-over' data-url='{$list[$i][href]}' data-img='{$list[$i][wr_movie_url]}'>";
		echo "<div class='item-img img-item'>";
		echo "<a href='{$list[$i][href]}'>";
		if($thumb['src']){
			echo "<img src='$thumb[src]' class='img-fluid' style='width:100%;'>";
		}else{
			echo "<img src='$latest_skin_url/noimage.png' class='img-fluid' style='width:100%;'>";
		}
		echo "</a>";
		echo "</div>";
		echo "</div>";
		echo "<div class='item-subj'>";
		echo "<a href='{$list[$i][href]}'>{$list[$i][subject]}</a>";
		echo "</div>";
		echo "<div class='item-conn'>{$list[$i][content]}</div>";
		echo "<div class='item-date'>$date</div>";
		echo "</div>";
		echo "</div>";
	}
	?>
	</div>
</div>

<script type='text/javascript'>
$(document).ready(function(){
	var portfolio=$('.portfolio-slide');
	portfolio.owlCarousel({
		nav:true, //좌우 화살표 버튼 보임/보이지 않음 (true or false)
		loop:true, //반복여부 (true or false)
		autoplay:true, //자동시작 여부 (true or false)
		autoplayTimeout:3000, //자동재생시 대기시간 1초=1000
		autoplayHoverPause:true, //마우스 오버시 정지할지 여부 (true or false)
		//animateIn:"slideInUp", //요소가 보여질때 애니메이션 (https://daneden.github.io/animate.css/ 를 참고하시어 원하는 애니메이션을 지정할 수 있습니다.)
		//animateOut:"slideOutDown", //요소가 사라질때 애니메이션 (https://daneden.github.io/animate.css/ 를 참고하시어 원하는 애니메이션을 지정할 수 있습니다.)
		smartSpeed:300,
		margin:10,
		navText:["<",">"], //좌우 화살표 내부 텍스트
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

	$("#portfolio-latest").on("mouseenter",function(){
		$(this).find(".owl-nav").show();

		var prev_btn=$(this).find(".owl-nav .owl-prev");
		var next_btn=$(this).find(".owl-nav .owl-next");

		prev_btn.css({"left":"-50px","opacity":0}).stop(true,true).animate({
			"left":0,
			"opacity":1
		},200);

		next_btn.css({"right":"-50px","opacity":0}).stop(true,true).animate({
			"right":0,
			"opacity":1
		},200);
	});

	$("#portfolio-latest").on("mouseleave",function(){
		var prev_btn=$(this).find(".owl-nav .owl-prev");
		var next_btn=$(this).find(".owl-nav .owl-next");

		prev_btn.stop(true,true).animate({
			"left":"-50px",
			"opacity":0
		},200);

		next_btn.stop(true,true).animate({
			"right":"-50px",
			"opacity":0
		},200);
	});
});
</script>