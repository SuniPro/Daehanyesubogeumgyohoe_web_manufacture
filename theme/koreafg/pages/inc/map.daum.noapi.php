<!-- * Daum 지도 - 지도퍼가기 -->
<!-- 1. 지도 노드 -->
<style>
#map_container {width:100%;position:relative;}
#map_container .root_daum_roughmap {width:100%;}
</style>

<div id="map_container">
	<div id="daumRoughmapContainer1521634944551" class="root_daum_roughmap root_daum_roughmap_landing"></div>
</div>

<!--
	2. 설치 스크립트
	* 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다.
-->
<script charset="UTF-8" class="daum_roughmap_loader_script" src="http://dmaps.daum.net/map_js_init/roughmapLoader.js"></script>

<!-- 3. 실행 스크립트 -->
<script charset="UTF-8">
	new daum.roughmap.Lander({
		"timestamp" : "1521634944551",
		"key" : "nbfs",
		"mapWidth" : "100%",
		"mapHeight" : "450"
	}).render();
</script>