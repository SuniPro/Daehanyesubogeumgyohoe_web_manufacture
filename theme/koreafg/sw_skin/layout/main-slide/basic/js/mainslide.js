var swiper;
var timeout1;
var timeout2;
var timeout3;

function initLettering(slide_no){
	clearTimeout(timeout1);
	clearTimeout(timeout2);
	clearTimeout(timeout3);
	
	var eng_arr = [
		
	];
	var slogan_arr = [
		
	];

	$(".slider-bg").removeClass("custom-slide-effect");
	$(".swiper-slide-next div").removeClass("kenburns-effect");
	$(".swiper-slide-duplicate-next div").removeClass("kenburns-effect");
	$(".visual").removeClass("visual-play");
	$( ".visual_slogan").show();

	if(slide_no === 1 || slide_no === 3){ 
		$(".visual_eng").html(eng_arr[0]).lettering();
		$(".visual_slogan").html(slogan_arr[0]).lettering();
		$('.visual_slogan span:nth-child(-n8)').addClass("bold");
	}else{
		$(".visual_eng").html(eng_arr[2]).lettering();
		$(".visual_slogan").html(slogan_arr[2]).lettering();
		$('.visual_slogan span:nth-child(1)').addClass("bold");
		$('.visual_slogan span:nth-child(2)').addClass("bold");
	}

	timeout1 = setTimeout(function(){
		$(".visual").addClass("visual-play");
		$(".swiper-slide-active div").addClass("kenburns-effect");
		$(".swiper-slide-duplicate-active div").addClass("kenburns-effect");
	}, 100);

	timeout2 = setTimeout(function(){
		$( ".visual_slogan").fadeOut( "slow", function(){
			$( ".visual_slogan").show();
			$(".visual").removeClass("visual-play");

			if(slide_no === 1 || slide_no === 3){
				$(".visual_eng").html(eng_arr[1]).lettering();
				$(".visual_slogan").html(slogan_arr[1]).lettering();
				$('.visual_slogan span:nth-child(1)').addClass("bold");
				$('.visual_slogan span:nth-child(2)').addClass("bold");
			}else{
				$(".visual_eng").html(eng_arr[3]).lettering();
				$(".visual_slogan").html(slogan_arr[3]).lettering();
				$('.visual_slogan span:nth-child(1)').addClass("bold");
				$('.visual_slogan span:nth-child(2)').addClass("bold");
			}

			timeout3 = setTimeout(function(){
				$(".visual").addClass("visual-play");
			}, 100);
		});
	}, 5000);
}

function initCustomSlider(){
	swiper = new Swiper('.swiper-container', {
		pagination: {
			el: '.swiper-pagination',
			clickable: true
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev'
		},
		effect: "fade", 
		loop:true,
		loopPreventsSlide: false, 
		speed: 800,
		a11y: {
			prevSlideMessage: '이전 슬라이드 버튼', 
			nextSlideMessage: '다음 슬라이드 버튼',
		},
		autoplay: {
			delay: 10800,
			disableOnInteraction: false,
		},
		on: {
			init: function(){
				initLettering(1);
			}
		}
	}).on("slideChange", function(){
		var activeIndex = this.activeIndex;
		$( ".visual_slogan").fadeOut( "slow", function(){
			initLettering(activeIndex);
		});		
	});
}

function initMainEffects(){
	//visual_slogan
	$(window).load(function() {
		//$(".swiper-container").css("height", "81%");
		$(".visual").addClass("visual-play");
	});
}