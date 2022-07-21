<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$connect_skin_url.'/style.css">', 0);
?>

<div class='connect-area'>
<div class='connect-head board-list-top-line'>
	<span class='cnt-no hidden-xs'>번호</span>
	<span class='cnt-name'>이름</span>
	<span class='cnt-title'>위치</span>
</div>
<div class='connect-shdow-wrap'>
	<div class='connect-shadow'><img src='<?=$connect_skin_url?>/img/shadow.png'></div>
</div>
<ul class='connect-body'>
<?php
    for ($i=0; $i<count($list); $i++) {
	$location = $list[$i]['lo_location'];

	if ($list[$i]['lo_url'] && $is_admin == 'super'){
		$display_location = "<a href=\"".$list[$i]['lo_url']."\">".$location."</a>";
	}else{
		$display_location = $location;
	}

	echo "<li class='list-item'>";
	echo "<div class='cnt-no hidden-xs'>{$list[$i]['num']}</div>";
	echo "<div class='cnt-name'>{$list[$i]['name']}</div>";
	echo "<div class='cnt-title'>$display_location</div>";
	echo "</li>";
}
?>
</ul>
<?
if ($i == 0){
	echo "<div class='nodata'>";
        echo "현재 접속자가 없습니다.";
	echo "</div>";
}
?>
</div>