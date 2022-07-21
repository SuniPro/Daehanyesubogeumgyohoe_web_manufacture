<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');

sw_skin("layout/main-slide/basic"); //메인 슬라이드
sw_skin("layout/main/basic"); //메인 페이지

include_once(G5_THEME_PATH.'/tail.php');
?>