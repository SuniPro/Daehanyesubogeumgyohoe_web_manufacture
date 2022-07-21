var $container = $('.blog-item-row');

function isotope_show(selector){
	if(selector){
		$container.isotope({
			filter:selector,
			itemSelector:'.blog-items'
		});
	}else{
		$container.isotope({
			filter:'*',
			itemSelector:'.blog-items'
		});
	}
}

$(window).resize(function(){
	isotope_show();
});

$(document).ready(function(){
	$container.imagesLoaded().progress(function(instance,image){
		var img=$(image.img);

		var obj=img.closest(".blog-items");
		obj.find(".blog-item-loading-wrap").fadeOut(300);
	}).done(function(){
		isotope_show();
	});
 
    $('.blog-cate li').on("click",function(){
		
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
		$('.blog-cate .current').removeClass('current');
		obj.addClass('current');

		$(".blog-cate").find("li").removeClass("active");
		obj.addClass("active");
 
		var selector = obj.data('filter');

		isotope_show(selector);
	}else{
		var link=obj.attr("data-href");
		$(location).attr('href',link);
	}
}