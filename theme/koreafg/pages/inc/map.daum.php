<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<style>
#map_container {width:100%;height:100%;border:1px solid #eee;position:relative;background:#fff;}
#map_container .map_view {width:100%;height:450px;}
#map_container .map_controll{width:100%;}
#map_container .btn-left-box{position:absolute;z-index:3;bottom:9px;left:10px;}
#map_container .btn-right-box{position:absolute;z-index:4;bottom:9px;right:10px;}

#map_container .btn-left-box .btn-road{background:url("<?=G5_THEME_URL?>/img/subpage/icon_daum_roadview.png") 5px 4px no-repeat;}
#map_container .btn-left-box span{padding-left:15px;color:#000;}
#map_container .btn-left-box .btn-roadsearch{background:url("<?=G5_THEME_URL?>/img/subpage/icon_roadsearch.png") 7px 5px no-repeat;}
</style>

<div id="map_container">
	<div id="map" class='map_view'></div>
	<div class="map_controll">
		<div class="btn-group btn-left-box" role="group">
			<button class='btn btn-sm btn-default btn-road'><span>로드뷰</span></button>
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

<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=<?php echo SW_MAP_API_KEY;?>&libraries=services"></script>
<script type='text/javascript'>
var addr="<?=$map_addr?>";
var roadviewClient = new daum.maps.RoadviewClient();
var map,
	mapCenter,
	lat,
	lng;

$(document).ready(function(){
	get_geocoder(addr);

	$('[data-toggle="tooltip"]').tooltip();

	$(".btn-zoomout").click(function(){
		map.setLevel(map.getLevel() + 1);
	});
	
	$(".btn-zoomin").click(function(){
		map.setLevel(map.getLevel() - 1);
	});

	$(".btn-road").click(function(){
		window.open("http://map.daum.net/link/roadview/"+lat+","+lng);
	});

	$(".btn-roadsearch").click(function(){
		window.open("http://map.daum.net/link/to/"+encodeURIComponent(addr)+","+lat+","+lng);
	});
	
	$(".btn-arrows").click(function(){
		window.open("http://map.daum.net/link/search/"+encodeURIComponent(addr));
	});
});

function get_geocoder(addr){
	var geocoder = new daum.maps.services.Geocoder();
	geocoder.addressSearch(addr,function(result, status){
		if(status===daum.maps.services.Status.OK){
			lat=result[0].y;
			lng=result[0].x;

			load_map();
		}else{
			alert("설정된 주소로 위치를 찾을 수 없습니다.");
		}
	});
}

function load_map(){	
	var map_container = document.getElementById('map');
	mapCenter=new daum.maps.LatLng(lat,lng);

	mapOption={
		center:mapCenter,
		level:3
	};

	map=new daum.maps.Map(map_container,mapOption);

	// 마커를 생성합니다
	var marker=new daum.maps.Marker({
		position:mapCenter
	});

	// 마커가 지도 위에 표시되도록 설정합니다
	marker.setMap(map);

	var mapTypeControl = new daum.maps.MapTypeControl();

	// 지도에 컨트롤을 추가해야 지도위에 표시됩니다
	// daum.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
	map.addControl(mapTypeControl, daum.maps.ControlPosition.TOPRIGHT);

	// 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
	var zoomControl = new daum.maps.ZoomControl();
	map.addControl(zoomControl, daum.maps.ControlPosition.RIGHT);
}
</script>