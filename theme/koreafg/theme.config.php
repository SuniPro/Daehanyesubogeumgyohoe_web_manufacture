<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 테마가 지원하는 장치 설정 pc, mobile
// 선언하지 않거나 값을 지정하지 않으면 그누보드5의 설정을 따른다.
// G5_SET_DEVICE 상수 설정 보다 우선 적용됨
define('G5_THEME_DEVICE', '');

$theme_config = array();

// 갤러리 이미지 수 등의 설정을 지정하시면 게시판관리에서 해당 값을
// 가져오기 기능을 통해 게시판 설정의 해당 필드에 바로 적용할 수 있습니다.
// 사용하지 않는 스킨 설정은 값을 비워두시면 됩니다.

$theme_config = array(
    'set_default_skin'          => false,   // 기본환경설정의 최근게시물 등의 기본스킨 변경여부 true, false
    'preview_board_skin'        => 'basic', // 테마 미리보기 때 적용될 기본 게시판 스킨
    'preview_mobile_board_skin' => 'basic', // 테마 미리보기 때 적용될 기본 모바일 게시판 스킨
    'cf_member_skin'            => 'basic', // 회원 스킨
    'cf_mobile_member_skin'     => 'basic', // 모바일 회원 스킨
    'cf_new_skin'               => 'basic', // 최근게시물 스킨
    'cf_mobile_new_skin'        => 'basic', // 모바일 최근게시물 스킨
    'cf_search_skin'            => 'basic', // 검색 스킨
    'cf_mobile_search_skin'     => 'basic', // 모바일 검색 스킨
    'cf_connect_skin'           => 'basic', // 접속자 스킨
    'cf_mobile_connect_skin'    => 'basic', // 모바일 접속자 스킨
    'cf_faq_skin'               => 'basic', // FAQ 스킨
    'cf_mobile_faq_skin'        => 'basic', // 모바일 FAQ 스킨
    'bo_gallery_cols'           => 4,       // 갤러리 이미지 수
    'bo_gallery_width'          => 210,     // 갤러리 이미지 폭
    'bo_gallery_height'         => 150,     // 갤러리 이미지 높이
    'bo_mobile_gallery_width'   => 125,     // 모바일 갤러리 이미지 폭
    'bo_mobile_gallery_height'  => 100,     // 모바일 갤러리 이미지 높이
    'bo_image_width'            => 600,     // 게시판 뷰 이미지 폭
    'qa_skin'                   => 'basic', // 1:1문의 스킨
    'qa_mobile_skin'            => 'basic'  // 1:1문의 모바일 스킨
);

include_once(G5_THEME_PATH.'/lib/func.lib.php');

define("SW_SKIN_DIR","sw_skin");
define("SW_SKIN_PATH",G5_THEME_PATH."/".SW_SKIN_DIR);
define("SW_SKIN_URL",G5_THEME_URL."/".SW_SKIN_DIR);

/*************************************************************************************************************************************
사용자 설정 옵션
*************************************************************************************************************************************/

define('SW_USE_TOP_MENU', 1); //최상단 메뉴 사용 여부 (1 = 사용 / 0 = 사용안함)
define('SW_USE_SUB_MENU', 1); //좌측 메뉴 사용 여부 (1 = 사용 / 0 = 사용안함)

define('SW_COMPANY_NAME', $config[cf_title]);  // 회사명
define('SW_COMPANY_ADDR', '서울 강남구 강남대로 310');  // 지도 표시용 주소 (시군구 번지 까지만 입력)
define('SW_COMPANY_FULL_ADDR', '35261 대전 서구 계룡로509번길 6, 204호 (탄방동, 주안에쉐르)');  // 하단에 표시될 주소 - 기타 다른 정보는 tail.php를 직접 수정하세요.
define('SW_COMPANY_TEL', '042-221-0774');  // 대표 전화번호
define('SW_COMPANY_FAX', '080-123-4567');  // 대표 전화번호2
define('SW_COMPANY_EMAIL', 'koreafg4@gmail.com');  // 대표 이메일 주소

define('SW_USEMAP_TYPE', 'default');  // 사용할 지도 API (naver / google / daum / default)
define('SW_MAP_API_KEY', '');  // 사용할 지도 API의 키값
define('SW_MAP_API_SECRET_KEY', '');  // 사용할 지도 API의 SECRET 키값 (없을시 생략)

define('SW_MOVE_COPY_SKIN','basic');
define('SW_MOVE_COPY_SKIN_URL',G5_THEME_URL.'/skin/move_copy/'.SW_MOVE_COPY_SKIN);
define('SW_MOVE_COPY_SKIN_PATH',G5_THEME_PATH.'/skin/move_copy/'.SW_MOVE_COPY_SKIN);

/*
* 메인메뉴에 포함되지 않는 페이지가 있다면 페이지별 링크 배열을 이곳에 정의 하세요.
* array("고유순번","페이지 타이틀","URL 주소","타겟","좌측메뉴 사용시 메뉴 표시 여부","페이지 타이틀 표시 여부");

배열 정의시 코드번호가 중첩되면 안됩니다.
관리자 > 메뉴관리에서 설정하시면 됩니다만, 아래 배열은 메뉴에는 노출하지 않고, 별도로 링크는 존재할 경우 사용하세요.

PS : 딱히 사용할 일은 없으실 겁니다 ^^;
다만 그누보드의 기본 페이지 (회원관련이나 새글, 현재접속자 등)에 상단 메뉴를 노출하거나
좌측메뉴를 포함하고 싶을 경우를 위해 만들어 둔것입니다.

PS2 : 이곳에 정의된 배열보다 관리자에서 설정한 메뉴가 우선시 됩니다.
*/

$pagelist["u01"][]=array("000","MemberShip",G5_URL."/bbs/register.php","self",false,true);

if($member[mb_id]){
	$pagelist["u01"][]=array("002","회원정보수정",G5_URL."/bbs/register_form.php","self",false,true);
	$pagelist["u01"][]=array("005","비밀번호확인",G5_URL."/bbs/member_confirm.php","self",false,true);
}else{
	$pagelist["u01"][]=array("001","회원가입 약관동의",G5_URL."/bbs/register.php","self",false,true);
	$pagelist["u01"][]=array("002","회원정보입력",G5_URL."/bbs/register_form.php","self",false,true);
	$pagelist["u01"][]=array("003","로그인",G5_URL."/bbs/login.php","self",false,true);
}
$pagelist["u01"][]=array("004","회원가입완료",G5_URL."/bbs/register_result.php","self",false,true);

$pagelist["u00"]=array(
	array("000","새글",G5_URL."/bbs/new.php","self",false,true)
);

$pagelist['u02']=array(
	array("000","현재접속자",G5_URL."/bbs/current_connect.php","self",false,true)
);

$pagelist['u03']=array(
	array("000","검색결과",G5_URL."/bbs/search.php","self",false,true)
);

$pagelist['u04']=array(
	array("000","1:1문의",G5_URL."/bbs/qalist.php","self",true,true),
	array("000","1:1문의",G5_URL."/bbs/qaview.php","self",true,true),
	array("000","1:1문의",G5_URL."/bbs/qawrite.php","self",true,true)
);

$g5[page_ary]=get_page_title();
$g5[menu_list]=get_menu_list($g5[page_ary]);
?>