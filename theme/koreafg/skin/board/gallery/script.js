var $container = $('.gallery-item-row');

function isotope_show(selector){
	if(selector){
		$container.isotope({
			filter:selector,
			itemSelector:'.gallery-items'
		});
	}else{
		$container.isotope({
			filter:'*',
			itemSelector:'.gallery-items'
		});
	}
}

$(window).resize(function(){
	isotope_show();
});

$(document).ready(function(){
	$container.find("img").imagesLoaded().progress(function(instance,image){
		var img=$(image.img);
		var img_w=img.width();
		var img_h=img.height();

		if(img_w<img_h){
			img.addClass("h-crop");
		}else{
			img.addClass("w-crop");
		}

		var obj=img.closest(".gallery-items");
		obj.find(".gallery-item-loading-wrap").fadeOut(300);
	}).done(function(){
		isotope_show();
	});
 
    $('.gallery-cate li').on("click",function(){
		
		set_isotope($(this));

		return false;
    });

	$(".btn-checkbox").on("click",function(){
		if($(this).hasClass("is_checked")){
			$(this).removeClass("is_checked").find("span").html("전체선택");
			$(".item_chk").prop('checked', false);
		}else{
			$(this).addClass("is_checked").find("span").html("선택해제");
			$(".item_chk").prop('checked', true);
		}
	});

	$(".btn-search-top").click(function(){
		$(".tsearch-top").show().find("input[name='stx']").focus();
	});

	$(".btn-search-bottom").click(function(){
		$(".tsearch-bottom").show().find("input[name='stx']").focus();
	});
});

function set_isotope(obj){
	var list_mode=obj.data("mode");

	if(list_mode==2){
		$('.gallery-cate .current').removeClass('current');
		obj.addClass('current');

		$(".gallery-cate").find("li").removeClass("active");
		obj.addClass("active");
 
		var selector = obj.data('filter');

		isotope_show(selector);
	}else{
		var link=obj.attr("data-href");
		$(location).attr('href',link);
	}
}