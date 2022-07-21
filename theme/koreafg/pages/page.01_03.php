<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');
?>
<link rel="stylesheet" href="<?=G5_THEME_URL?>/pages/style.css">
<style>
@media(min-width:1500px) {
    .mid {width:1143px; margin:0 auto; margin-top:104px;}
    .mid_t1 {font-size:26px; color:#666; font-weight:bold; margin-bottom:40px;}
    .mid_t2 {font-size:26px; color:#666; font-weight:bold; margin-bottom:40px;}
    .mid_t2 span {font-size:26px; color:#1458a6; font-weight:bold; margin-bottom:40px;}
}
@media (max-width:1499px) and (min-width:1201px) {
    .mid {width:92%; margin:0 auto; margin-top:104px;}
    .mid_t1 {font-size:38px; color:#666; font-weight:bold; margin-bottom:40px;}
    .mid_t2 {font-size:38px; color:#666; font-weight:bold; margin-bottom:40px;}
    .mid_t2 span {font-size:26px; color:#1458a6; font-weight:bold; margin-bottom:40px;}

  

}

@media (max-width:1200px) and (min-width:748px) {
    .mid {width:92%; margin:0 auto; margin-top:104px;}
    .mid_t1 {font-size:38px; color:#666; font-weight:bold; margin-bottom:40px;}
    .mid_t2 {font-size:38px; color:#666; font-weight:bold; margin-bottom:40px;}
    .mid_t2 span {font-size:38px; color:#1458a6; font-weight:bold; margin-bottom:40px;}


}

@media(max-width:747px) {
  .mid { width: 100%; margin: 0 auto; margin-top: 30px; padding: 0 4%; text-align: center; }
  .mid_t1 { font-size: 19px; color: #666; font-weight: bold; margin-bottom: 40px; text-align: center;}
  .mid_t2 { font-size: 19px; color: #666; font-weight: bold; margin-bottom: 40px; text-align: center;}
  .mid_t2 span { font-size: 19px; color: #1458a6; font-weight: bold; margin-bottom: 40px; text-align: center;}


}

</style>
<div class="mid">
    <p class="mid_t1">한예수교복음교회는 정통 오순절 교단으로서 미국 LA에 본부를 두고 있는 The Foursquare Church의 한국 교단으로 1972년 2월 1일에 국내에서 시작되었습니다.</p>
    <p class="mid_t2">본 교단은 정통 오순절 신앙에 입각하여<span> "예수 그리스도는 구세주이심과 예수 그리스도는 성령의 세례를 주시는 이심과 예수 그리스도는 위대한 의사이심과 예수 그리스도는 다시 오실 왕이심을 믿는"</span> 4중 교리를 가지고 복음 전파에 전력하는 교단입니다.</p>
    <p class="mid_t1">본 교단은 한국교회총연합회(한교총)와 한국교회교단장회의 회원교단으로서 교회 연합운동에 적극 참여하고 있으며 건신대학원대학교를 통하여 목회자 양성과 선교사역에 주력하는 교단입니다.</p>
</div>


<?php
include_once(G5_THEME_PATH.'/tail.php');
?>