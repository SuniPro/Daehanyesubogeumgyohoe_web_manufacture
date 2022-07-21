<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');
?>

<link rel="stylesheet" href="<?=G5_THEME_URL?>/pages/style.css">


<style>
.sub_container_bt { float: left; width: 100%; margin: 0% 0 6% 0; }

.map02_box { width: 100%; float: right; border: 1px solid #CCC; }
.location-tit { padding: 0 44px; float: left; width: 100%; font-size: 17px; margin-top: 15px; background-color: rgba(87, 87, 87, 0.94); color: #fff; margin-top: -22px; z-index: 1; position: relative; }
.li1_right_d div { float: left; width: 32%; border: 1px solid #ccc; margin: 8px 2px; padding: 5px; height: 53px; line-height: 130%; }
.li1_right_d div span { float: left; padding: 6px 5px; border-radius: 5px; margin-right: 18px; }

.location-tit strong::before { width: 30px; height: 36px; top: 13px; left: 0px; background-position: -117px 0; }
.location-tit dl { display: inline-block; vertical-align: middle; padding-top: 20px; }
.location-tit dt { display: inline-block; font-weight: 600; float: left; width: 100%; }
.location-tit div img { margin-right: 10px; }
.location-tit dt.space { margin-left: 0px; }
.location-tit div { float: left; }
.location-tit { position: relative }
.gr_img { background: #fff; font-size: 18px; color: #343434; padding: 7px 10px; border-radius: 5px; margin-right: 3%; font-weight: 600; }
.gr_2 { float: left; width: 28%; }
.gr_1 { float: left; width: 72%; }
.location-tit dl { width: 85%; margin-bottom: 20px; }
.gr_4 { position: absolute; right: 0; top: 0; }
.gr_co { margin-top: 10px; font-size: 18px; }
.location-tit dd { display: inline-block; font-weight: 300; margin-bottom: 0px; margin-right: 3px; }
.li1_more { background-repeat: no-repeat; background-image: url(../../../img/sub/m_more.png); text-align: center; background-position: center; background-color: #4d95be; transition: 0.3s; width: 100%; width: 125px; height: 80px; }
.li1_more_2 { float: left; margin-left: 0px; border: 2px solid #fff; padding: 5px 14px 5px 29px; background-repeat: no-repeat; background-position: center left 5px; background-image: url(../../../img/sub/m_more.png); text-align: center; background-color: #fff; margin-top: -5px; transition: 0.3s; width: 100%; margin-top: 4px; }
.li1_more:hover { background-color: #000 }
.li1_T2 { background: #8a8a8a; color: #fff; padding: 2px 8px; border-radius: 5px; float: left; }
.li1_T { color: rgba(64, 170, 42, 1); font-weight: 600; float: left; width: 100%; margin-top: 13px; font-size: 19px; margin-bottom: 5px; }
.li1_T3 { margin-left: 1.5%; float: left; }

@media (max-width:1024px) { 
    .gr_1 { width: 100%; }
    .li1_more { height: 118px; }
}
.location-wr .location-map .location-tit strong::before { width: 30px; height: 36px; top: 13px; left: 0px; background-position: -117px 0; }
.map_2_bt .li1_right_d, .map_2 .li1_right_d { background-image: none; }
.map_2_bt { height: auto; border-bottom: #DDD 1px solid; width: 100%; padding: 20px 10px 20px; font-size: 17.5px; line-height: 160%; float: left; }
.map_2_bt a { float: left; clear: left; width: 100%; }
.li1_right { float: right; width: 85%; margin-bottom: 0px; font-size: 23px; font-weight: 600; }
.li1_left { width: 13%; float: left; text-align: center; }
.li1_left p { font-size: 20px; font-weight: 600; line-height: 160%; padding-top: 15px; }
.li1_left p span { font-size: 18px; color: #7a8288; }
.li1_right_d { font-size: 17px; background-repeat: no-repeat; background-position: top left; background-image: url(../../../img/sub/ep_s.png); letter-spacing: 0px; float: right; width: 85%; line-height: 168%; margin-bottom: 10px; }

@media (max-width:768px) {   
    .li1_right_d div { height: 65x; }
    .li1_right_d div span { height: 52px; }
    .li1_left { width: 100%; }
    .li1_right_d { font-size: 17px; background-repeat: no-repeat; background-position: top 9px left 0px; background-image: url(../../../img/sub/ep_s.png); letter-spacing: 0px; float: right; width: 80%; padding-left: 1.5%; line-height: 168%; margin-bottom: 45px; }
    .li1_right { font-size: 22px; line-height: 160%; font-weight: 600; float: right; width: 100%; margin-bottom: 0px; margin-top: 2%; }
}
@media (max-width:820px) {
    .location-tit { margin: 0 auto; text-align: center; padding-top: 0%; }
    .li1_more { height: 82px; } 
    .li1_right { text-align: center; }
    .li1_right_d { width:100%; }
}
@media(max-width:820px) {
    .location-tit { float: left; width: 100%; padding: 0; }
    .location-tit dl { width: 100%; float: left; padding: 3% }
    .location-tit div { float: left; width: 100%; position: relative; }
    .gr_4 { position: absolute; right: 0; bottom: 0; }
}
</style>
<h4>총회본부 오시는 길</h4>
<div class="sub_container">
    <div class="map02_box">
        <div style="width:100%;height:450px;" id="daumRoughmapContainer1648477001645" class="root_daum_roughmap root_daum_roughmap_landing"></div>
        <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>
        <!-- 3. 실행 스크립트 -->
        <script charset="UTF-8">
            new daum.roughmap.Lander({
                "timestamp" : "1648477001645",
                "key" : "29mym",
                "mapWidth" : "100%",
                "mapHeight" : "450"
            }).render();
        </script>
    </div>
    
    <div class="location-tit">
        <dl>
            <div class="gr_1">
                <div class="gr_img"> 주소</div>
                <div class="gr_co">
                    <dt><?=SW_COMPANY_FULL_ADDR?></dt>
                </div>
            </div>
            <div class="gr_2">
                <div class="gr_img">전화</div>
                <div class="gr_co">
                    <dt><?=SW_COMPANY_TEL?></dt>
                </div>
            </div>
        </dl>       
    </div>
</div>
<!--
<div class="sub_container_bt">
    <div class="map_2_bt">
        <div align="center" class="li1_left"><img src="<?=G5_THEME_URL?>/pages/img/1-5-1.jpg" alt="지하철"></div>
        <div class="li1_right">지하철로 오시는 길</div>
        <div class="li1_right_d "><span class="li1_T">1호선(1호선 중구청역 1번 출구)</span></div>
    </div>
    <div class="map_2_bt">
        <div align="center" class="li1_left"><img src="<?=G5_THEME_URL?>/pages/img/1-5-2.jpg" alt="버스"></div>
        <div class="li1_right">버스 이용 시</div>
        <div class="li1_right_d "><span class="li1_T">101, 103, 108, 200, 201, 202, 311, 313, 314, 317, 608, 613, 614, 615, 620, 701, 2002번</span></div>
    </div>    
</div>
<div class="clearfix"></div>    
-->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
