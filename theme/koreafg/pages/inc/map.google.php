<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<style>
#map_container {width:100%;height:100%;border:1px solid #eee;position:relative;background:#fff;}
#map_container .map_view {width:100%;height:450px;}
#map_container .map_controll{width:100%;background:#fff;}
#map_container .btn-left-box{position:absolute;z-index:3;bottom:9px;left:10px;}
#map_container .btn-right-box{position:absolute;z-index:4;bottom:9px;right:10px;}

#map_container .btn-left-box .btn-road{background:url("<?=G5_THEME_URL?>/img/subpage/icon_google_maker.png") 5px 4px no-repeat;}
#map_container .btn-left-box span{padding-left:15px;color:#000;}
#map_container .btn-left-box .btn-roadsearch{background:url("<?=G5_THEME_URL?>/img/subpage/icon_roadsearch.png") 7px 5px no-repeat;}
</style>

<div id="map_container">
	<div id="map" class='map_view'></div>
	<div class="map_controll">
		<div class="btn-group btn-left-box" role="group">
			<button class='btn btn-sm btn-default btn-road'><span>스트리트뷰</span></button>
			<button class='btn btn-sm btn-default btn-roadsearch'><span>길찾기</span></button>
		</div>
		<div class='btn-right-box'>
			<div class='btn-group' role="group">
			<button class='btn btn-sm btn-default btn-zoomin'><i class='fa fa-plus' aria-hidden="true"></i></button>
			<button class='btn btn-sm btn-default btn-zoomout'><i class='fa fa-minus' aria-hidden="true"></i></button>
			<button class='btn btn-sm btn-default btn-arrows'><i class='fa fa-arrows-alt' aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</div>

<script src="http://maps.googleapis.com/maps/api/js?language=ko&region=kr&key=<?php echo SW_MAP_API_KEY;?>"></script>
<script>
var addr="<?=$map_addr?>";
var map,lat,lng;
var geocoder=new google.maps.Geocoder();
var set_zoom=18;

$(document).ready(function(){
	get_geocode();

	$(".btn-zoomout").click(function(){
		set_zoom --;

		if(set_zoom<1) set_zoom=1;

		map.setZoom(set_zoom);
	});

	$(".btn-zoomin").click(function(){
		set_zoom ++;

		if(set_zoom>22) set_zoom=22;

		map.setZoom(set_zoom);
	});

	$(".btn-arrows").click(function(){
		window.open("https://www.google.co.kr/maps/place/"+encodeURIComponent(addr)+"/@"+lat+","+lng);
	});

	$(".btn-road").click(function(){
		window.open("https://www.google.com/maps?cbll="+lat+","+lng+"&layer=c");
	});

	$(".btn-roadsearch").click(function(){
		window.open("https://www.google.co.kr/maps/dir/''/"+encodeURIComponent(addr));
	});
});

function load_map(){
	var latlng = {"lat":lat,"lng":lng};

	var myOptions={
		zoom:set_zoom,
		scaleControl:true,
		center:latlng,
		mapTypeId:google.maps.MapTypeId.ROADMAP
	};

	map = new google.maps.Map(document.getElementById("map"), myOptions);

	var marker = new google.maps.Marker({
		position:latlng,
		map:map
	});
}

function get_geocode() {
	$.ajax({
		type:"GET",
		dataType:"JSON",
		url:"https://maps.googleapis.com/maps/api/geocode/json",
		data:"address="+encodeURIComponent(addr)+"&key=AIzaSyAJsqFIxzN0KE9mzqlL6FPYPuGHpzYSY-M",
		success:function(result){
			if(result.status=='OK'){
				var data=result.results[0];
				lat=data.geometry.location.lat;
				lng=data.geometry.location.lng;

				load_map();
			}else{
				alert("해당 주소로 위치를 찾을 수 없습니다.");
			}
		}
	});
}
</script>