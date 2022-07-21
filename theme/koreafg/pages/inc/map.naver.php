<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<style>
#map_container {width:100%;height:100%;border:1px solid #eee;position:relative;background:#fff;}
#map_container .map_view {width:100%;height:450px;}
#map_container .map_controll{width:100%;background:#fff;}
#map_container .btn-left-box{position:absolute;z-index:3;bottom:9px;left:10px;}
#map_container .btn-right-box{position:absolute;z-index:4;bottom:9px;right:10px;}

#map_container .btn-left-box .btn-road{background:url("<?=G5_THEME_URL?>/img/subpage/icon_naver_maker.png") 5px 4px no-repeat;}
#map_container .btn-left-box span{padding-left:15px;color:#000;}
#map_container .btn-left-box .btn-roadsearch{background:url("<?=G5_THEME_URL?>/img/subpage/icon_roadsearch.png") 7px 5px no-repeat;}
</style>

<div id="map_container">
	<div id="map" class='map_view'></div>
	<div class="map_controll">
		<div class="btn-group btn-left-box" role="group">
			<button class='btn btn-sm btn-default btn-road'><span>거리뷰</span></button>
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

<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?clientId=<?php echo G5_MAP_API_KEY;?>&submodules=geocoder"></script>
<script>
var set_title="<?=$title?>";
var addr="<?=$map_addr?>";
var set_zoom=12;
var infoWindow,lat,lng,oMap,marker;

$(document).ready(function(){
	naver.maps.onJSContentLoaded = initGeocoder;

	$(".btn-zoomout").click(function(){
		set_zoom --;

		if(set_zoom<1) set_zoom=1;

		oMap.setZoom(set_zoom,true);
	});
	
	$(".btn-zoomin").click(function(){
		set_zoom ++;

		if(set_zoom>14) set_zoom=14;

		oMap.setZoom(set_zoom,true);
	});
		
	$(".btn-arrows").click(function(){
		window.open("https://map.naver.com/index.nhn?lng="+lng+"&lat="+lat+"&pinType=site&pinTitle="+encodeURIComponent(set_title));
	});
		
	$(".btn-road").click(function(){
		window.open("https://map.naver.com/index.nhn?street=on&flight=on&lng="+lng+"&lat="+lat+"&streetviewer=on&pinType=site&pinTitle="+encodeURIComponent(set_title));
	});
		
	$(".btn-roadsearch").click(function(){
		window.open("https://map.naver.com/?elng="+lng+"&elat="+lat+"&eText="+encodeURIComponent(set_title));
	});
});

// result by latlng coordinate
function searchAddressToCoordinate(){
    naver.maps.Service.geocode({
        address:addr
    },function(status,response){
        if(status===naver.maps.Service.Status.ERROR){
			alert('지도 API 주소변환에 실패하였습니다.');
            return false;
        }

        var item=response.result.items[0],
            point=new naver.maps.Point(item.point.x,item.point.y);

		lat=item.point.y;
		lng=item.point.x;
		
		load_map();
		//marker.setAnimation(naver.maps.Animation.BOUNCE);
    });
}

function load_map(){
	oMap=new naver.maps.Map('map',{
		center:new naver.maps.LatLng(lat,lng),
		scaleControl:true,
        logoControl:false,
        mapTypeControl:true,
        mapTypeControlOptions:{
            style:naver.maps.MapTypeControlStyle.BUTTON,
            position:naver.maps.Position.TOP_RIGHT
        },
        zoomControl:true,
		zoom:set_zoom
	});

	marker=new naver.maps.Marker({
		map:oMap,
		position:new naver.maps.LatLng(lat,lng),
	});

	infoWindow.open(oMap,marker);
}

function initGeocoder() {
    searchAddressToCoordinate();
}
</script>