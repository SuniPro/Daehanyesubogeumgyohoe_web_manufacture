<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" type="text/css" href="<?=$sw_skin_url?>/style.css">
<link rel="stylesheet" href="<?=$sw_skin_url?>/fancybox/jquery.fancybox.min.css">
<script src="<?=$sw_skin_url?>/fancybox/jquery.fancybox.min.js"></script>

<script type='text/javascript'>
var spd="<?=$option[1]?>";
var ease="<?=$option[2]?>";
var over_tg="<?=$option[0]?>";

$.fancybox.defaults.animationEffect = "zoom-in-out";

$(window).resize(function(){
	//img_wrap_resize();
});

$(document).ready(function(){
	img_over_effect_init();

	$(document).on({
		"mouseenter":function(){
			var obj=$(this);

			if(obj.data("type")=="masonry"){
				if(!obj.find(".img-wrap").length){
					obj.find("img").wrap("<div class='img-wrap'></div>");
					img_wrap_resize();
				}
			}

			if(!obj.find(".img-hover-wrap").length){
				img_over_effect_init();
			}

			var obj_w=obj.outerWidth();
			var obj_h=obj.outerHeight();

			obj.find(".img-over-ef").css({"width":obj_w+"px","height":obj_h+"px","background-color":"rgba(0,0,0,0)"});
			obj.find(".img-over-ef").stop().animate({"background-color":"rgba(0,0,0,0.3)"},spd,ease);
			
			var view_ico=obj.find(".view-ico");
			var link_ico=obj.find(".link-ico");
			
			if(link_ico.length){
				var ico_pos=(obj_w/2)-obj.find(".circle").width()-5;
			}else{
				var ico_pos=(obj_w/2)-(obj.find(".circle").width()/2);
			}

			view_ico.stop().animate({"left":ico_pos+"px"},spd,ease);

			if(link_ico) link_ico.stop().animate({"right":ico_pos+"px"},spd,ease);
			
			if(obj.find(".info-wrap").length){
				if(obj.data("type")=="masonry"){
					obj.find(".img-wrap").stop().animate({"top":"-"+(obj.find(".info-conn").outerHeight())+"px"},spd,ease);
				}else{
					obj.find("img").css({"position":"absolute","z-index":2}).stop().animate({"top":"-"+(obj.find(".info-conn").outerHeight())+"px"},spd,ease);
				}
				
				obj.find(".info-wrap").stop().animate({"height":obj.find(".info-conn").outerHeight()+"px"},spd,ease);
			}else{
				obj.find("img").stop().animate({"scale":"1.2"},spd,ease);
			}
		},
		"mouseleave":function(){
			var obj=$(this);
			var view_ico=obj.find(".view-ico");
			var link_ico=obj.find(".link-ico");

			obj.find(".img-over-ef").stop().animate({"background-color":"rgba(0,0,0,0)"},spd,ease);

			view_ico.stop().animate({"left":"-50px"},spd,ease);

			if(link_ico.length) link_ico.stop().animate({"right":"-50px"},spd,ease);

			if(obj.find(".info-wrap").length){
				if(obj.data("type")=="masonry"){
					obj.find(".img-wrap").stop().animate({"top":"0"},spd,ease);
				}else{
					obj.find("img").stop().animate({"top":"0"},spd,ease);
				}
				obj.find(".info-wrap").stop().animate({"height":0},spd,ease);
			}else{
				obj.find("img").stop().animate({"scale":"1"},spd,ease);
			}
		}
	},over_tg);
});

function img_over_effect_init(){
	$(over_tg).addClass("img-over-animate");
	$.each($(over_tg),function(){
		var obj=$(this);
		var tit=obj.data("title");
		var cap=obj.data("caption");
		var url=obj.data("url");
		var target=obj.data("target");
		var img_url=obj.data("img");
		var mov_url=obj.data("movie");

		var obj_w=obj.prop("clientWidth");
		var obj_h=obj.prop("clientHeight");

		if(!img_url) img_url=obj.find("img").attr("src");

		if(!obj.find(".img-hover-wrap").length){
			var html="<div class='img-hover-wrap'>";
			html+="<div class='img-over-ef'>";
			if(mov_url){
				html+="<div class='circle view-ico' data-fancybox href='"+mov_url+"'><i class='fa fa-search'></i></div>";
			}else{
				html+="<div class='circle view-ico' data-fancybox='gallery' href='"+img_url+"'><i class='fa fa-search'></i></div>";
			}

			if(url){
				html+="<div class='circle link-ico'>";
				html+="<a href='"+url+"' ";
				if(target) html+=" target='"+target;
				html+="><i class='fa fa-paperclip'></i></div></a>";
			}
			
			if(tit || cap){
				html+="<div class='info-wrap'>";
				html+="<div class='info-conn'>";
				html+="<a href='"+url+"' ";
				if(target) html+=" target='"+target+"'";
				html+=">"+tit+"</a>";
				html+="<p>"+cap+"</p>";
				html+="</div>";
				html+="</div>";
			}
			html+="</div>";
			html+="</div>";

			obj.prepend(html);
			obj.css({"overflow":"hidden"});
			obj.find(".img-over-ef").css({"width":obj_w+"px","height":obj_h+"px"});
		}
	});
}

function img_wrap_resize(){
	var obj=$(over_tg);
	$.each(obj,function(){
		if($(this).data("type")=="masonry"){
			var w=$(this).find(".img-wrap").width();
			var h=$(this).find(".img-wrap").height();

			$(this).css({"width":w+"px","height":h+"px"});
		}
	});
}
</script>