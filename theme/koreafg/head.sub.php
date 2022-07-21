<?php
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$begin_time = get_microtime();

if (!isset($g5['title'])) {
    $g5['title'] = $config['cf_title'];
    $g5_head_title = $g5['title'];
}
else {
    $g5_head_title = $g5['title']; // 상태바에 표시될 제목
    $g5_head_title .= " | ".$config['cf_title'];
}

// 현재 접속자
// 게시판 제목에 ' 포함되면 오류 발생
$g5['lo_location'] = addslashes($g5['title']);
if (!$g5['lo_location'])
    $g5['lo_location'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
$g5['lo_url'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
if (strstr($g5['lo_url'], '/'.G5_ADMIN_DIR.'/') || $is_admin == 'super') $g5['lo_url'] = '';

/*
// 만료된 페이지로 사용하시는 경우
header("Cache-Control: no-cache"); // HTTP/1.1
header("Expires: 0"); // rfc2616 - Section 14.21
header("Pragma: no-cache"); // HTTP/1.0
*/
?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=1.0,user-scalable=no">
<meta name="HandheldFriendly" content="true">
<meta name="format-detection" content="telephone=no">
<meta http-equiv="imagetoolbar" content="no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?
if($config['cf_add_meta']){
    echo $config['cf_add_meta'].PHP_EOL;
}
?>
<title><?php echo $g5_head_title; ?></title>
<link rel="stylesheet" type='text/css' href="<?php echo G5_THEME_CSS_URL; ?>/default.css">
<link rel="stylesheet" type='text/css' href="<?php echo G5_THEME_CSS_URL; ?>/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" type='text/css' href="<?php echo G5_THEME_JS_URL?>/owl_carousel/assets/owl.carousel.css">
<link rel="stylesheet" type='text/css' href="<?php echo G5_THEME_CSS_URL; ?>/bootstrap/css/bootstrap.min.css">
<link rel='stylesheet' type='text/css' href='<?php echo G5_THEME_CSS_URL; ?>/bootstrap.custom.css'>
<link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_JS_URL; ?>/iziModal/iziModal.css">
<link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_CSS_URL; ?>/iziModal.custom.css">
<link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_CSS_URL; ?>/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_CSS_URL; ?>/style.chk-radio.css">
<link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_CSS_URL; ?>/style.css">

<link rel="stylesheet" type="text/css" href="<?php echo G5_THEME_CSS_URL; ?>/colorset/orange/skin.css" class='colorset'>

<!--[if lte IE 8]>
<script src="<?php echo G5_JS_URL ?>/html5.js"></script>
<![endif]-->
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "<?php echo G5_URL ?>";
var g5_bbs_url   = "<?php echo G5_BBS_URL ?>";
var g5_is_member = "<?php echo isset($is_member)?$is_member:''; ?>";
var g5_is_admin  = "<?php echo isset($is_admin)?$is_admin:''; ?>";
var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
var g5_bo_table  = "<?php echo isset($bo_table)?$bo_table:''; ?>";
var g5_sca       = "<?php echo isset($sca)?$sca:''; ?>";
var g5_editor    = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor'])?$config['cf_editor']:''; ?>";
var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";

//SIWONS 스킨 경로
var sw_skin_path="<?php echo SW_SKIN_PATH?>";
var sw_skin_url="<?php echo SW_SKIN_URL?>";

var g5_theme_url="<?php echo G5_THEME_URL?>";
var g5_theme_path="<?php echo G5_THEME_PATH?>";
</script>
<script type="text/javascript" src="<?php echo G5_THEME_JS_URL ?>/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo G5_JS_URL ?>/common.js?ver=<?php echo G5_JS_VER; ?>"></script>
<script type="text/javascript" src="<?php echo G5_JS_URL ?>/wrest.js?ver=<?php echo G5_JS_VER; ?>"></script>
<script type="text/javascript" src="<?php echo G5_JS_URL ?>/placeholders.min.js"></script>
<script type="text/javascript" src="<?php echo G5_THEME_JS_URL ?>/imagesloaded.min.js"></script>

<!-- GSAP 관련 스크립트 -->
<script type="text/javascript" src="<?php echo G5_THEME_JS_URL?>/gsap/plugins/CSSPlugin.js"></script>
<script type="text/javascript" src="<?php echo G5_THEME_JS_URL?>/gsap/plugins/CSSRulePlugin.js"></script>
<script type="text/javascript" src="<?php echo G5_THEME_JS_URL?>/gsap/easing/EasePack.js"></script>
<script type="text/javascript" src="<?php echo G5_THEME_JS_URL?>/gsap/TweenLite.js"></script>
<script type="text/javascript" src="<?php echo G5_THEME_JS_URL?>/gsap/jquery.gsap.js"></script>
<script type="text/javascript" src="<?php echo G5_THEME_JS_URL?>/gsap/plugins/ScrollToPlugin.js"></script>

<!-- 부가 파일 업로드 -->
<script type="text/javascript" src="<?php echo G5_THEME_CSS_URL?>/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo G5_THEME_JS_URL ?>/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="<?php echo G5_THEME_JS_URL?>/iziModal/iziModal.js"></script>
<script type="text/javascript" src="<?php echo G5_THEME_JS_URL?>/owl_carousel/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo G5_THEME_JS_URL ?>/sw_common.js"></script>

<?php
if(G5_IS_MOBILE) {
    echo '<script src="'.G5_JS_URL.'/modernizr.custom.70111.js"></script>'.PHP_EOL; // overflow scroll 감지
}
if(!defined('G5_IS_ADMIN')){
    echo $config['cf_add_script'];
}
?>
</head>
<body<?php echo isset($g5['body_script']) ? $g5['body_script'] : ''; ?>>