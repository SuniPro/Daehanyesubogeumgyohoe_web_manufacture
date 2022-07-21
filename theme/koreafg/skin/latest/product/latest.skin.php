<?
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$bo_gallery_width=357;
$bo_gallery_height=238;
?>

<div class='row pr-row'>
	<div class='pr-item col-md-4 col-sm-4 col-xs-12'>
		<div class='pr-t-box'>
			<a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><p><?php echo $bo_subject; ?></p></a>
			<span><?=count($list)?>+</span>
		</div>
	</div>
	<div class='pr-item col-md-8 col-sm-8 col-xs-12'>
		<div class='pr-c-box'>
			<p>고객을 위한 마음과 완벽을 향한 열정으로 새로운 가치를 만듭니다.</p>
			<p>우리가 꿈꾸는 특별한 세상, 그 세계로 여러분을 초대합니다.</p>
			<p>Create new values with your mind and enthusiasm for your customers.</p>
			<p>We invite you to the world where we dream, and to the world.</p>
			<div class='pr-arw-box'>
				<div class='pr-arw pr-arw-left'>
					<span class="lnr lnr-chevron-left"></span>
				</div>
				<div class='pr-arw pr-arw-right'>
					<span class="lnr lnr-chevron-right"></span>
				</div>
				<div class='pr-arw pr-more' data-link="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>">
					<i class="fa fa-angle-double-right"></i>
				</div>
			</div>
		</div>
	</div>
</div>

<div class='pr-row-carousel'>
<div class="owl-carousel main-pr-carousel">
	<?
	for ($i=0; $i<count($list); $i++) {
		$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $bo_gallery_width, $bo_gallery_height, false, true);
		
		echo "<div class='item'>";
		echo "<div class='img-gallery-item'>";
		echo "<div class='img-over-animate img-item' data-link='{$list[$i][href]}'>";
		if($thumb['src']) {
			echo "<img src='$thumb[src]'>";
		}else{
			echo "<img src='$latest_skin_url/noimage.png'>";
		}
		echo "</div>";
		echo "</div>";
		echo "<div class='pr-item-box'>";
		echo "<a href='{$list[$i][href]}'>";
		echo "<p>{$list[$i][wr_subject]}</p>";
		echo "</a>";
		echo "</div>";
		echo "</div>";
	}
	?>
</div>
</div>

<script type='text/javascript'>
var mgl=$('.main-pr-carousel');
mgl.owlCarousel({
	margin:25,
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
			items: 3
		}
	}
});

$(document).ready(function(){
	$(".pr-arw").on("mouseenter",function(){
		TweenLite.killTweensOf($(this));

		TweenLite.to($(this),0.2,{
			"backgroundColor":"#4690ff",
			"color":"#ffffff",
			"borderColor":"#4690ff",
			ease:Power3.easeOut
		});
	});

	$(".pr-arw").on("mouseleave",function(){
		TweenLite.killTweensOf($(this));

		TweenLite.to($(this),0.2,{
			"backgroundColor":"#ffffff",
			"color":"#555",
			"borderColor":"#eee",
			ease:Power3.easeOut
		});
	});

	$('.pr-arw').click(function(){
		if($(this).hasClass("pr-arw-left")){
			mgl.trigger('prev.owl.carousel');
		}else if($(this).hasClass("pr-arw-right")){
			mgl.trigger('next.owl.carousel');
		}else{
			var link=$(this).attr("data-link");
			$(location).attr('href',link);
		}
	});

	//이미지를 img-over-animate 클래스로 감싸면 마우스 오버시 효과를 보여줍니다.
	$(".main-pr-carousel").on("mouseenter",".item",function(){
		var img_obj=$(this).find(".img-over-animate");
		var img_obj_w=img_obj.width();
		var img_obj_h=img_obj.height();

		var animate_item="<div class='animate-box'></div><div class='animate-arrow'><i class='fa fa-share'></i></div>";
		if(img_obj.find(".animate-box").length==0){
			img_obj.append(animate_item);
		}

		img_obj.find(".animate-box").css({"width":img_obj_w+"px","height":img_obj_h+"px"});

		var arw_top=(img_obj_h/2)-(img_obj.find(".animate-arrow").height()/2);
		var arw_left=(img_obj_w/2)-(img_obj.find(".animate-arrow").width()/2);

		img_obj.find(".animate-arrow").css({"top":arw_top+"px","left":arw_left+"px"});

		TweenLite.to(img_obj.find(".animate-box"),0.3,{
			"opacity":0.7,
			"onStart":function(){
				img_obj.find(".animate-box").css({"display":"block"});
			},			
			ease:Power3.easeOut
		});
		
		TweenLite.to($(this).find("img"),0.5,{
			"scale":1.5,
			ease:Power3.easeOut
		});
		
		TweenMax.fromTo(img_obj.find(".animate-arrow"),0.3,{
			"scale":"0.5",
			"opacity":0,
			"rotationZ":"-90deg"
		},{
			"transformOrigin":"center",
			"scale":"1",
			"opacity":1,
			"rotationZ":"0",
			ease:Power3.easeOut
		});
	});
	
	$(".main-pr-carousel").on("mouseleave",".item",function(){
		var img_obj=$(this).find(".img-over-animate");

		TweenLite.to(img_obj.find(".animate-box"),0.4,{
			"opacity":0,
			"onComplete":function(){
				img_obj.find(".animate-box").remove();
			},
			ease:Power3.easeOut
		});
		
		TweenLite.to(img_obj.find(".animate-arrow"),0.3,{
			"opacity":0,
			"scale":"0.5",
			"rotationZ":"-90deg",
			ease:Power3.easeOut
		});
		
		TweenLite.to($(this).find("img"),0.5,{
			"scale":1,
			ease:Power3.easeOut
		});
	});

	$(document).on("click",".img-over-animate",function(){
		var link=$(this).attr("data-link");
		$(location).attr('href',link);
	});
});
</script>