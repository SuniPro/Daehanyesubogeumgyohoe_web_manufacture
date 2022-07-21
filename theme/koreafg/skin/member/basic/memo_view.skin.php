<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$nick = get_sideview($mb['mb_id'], $mb['mb_nick'], $mb['mb_email'], $mb['mb_homepage']);

if($kind == "recv") {
    $kind_str = "보낸";
    $kind_date = "받은";
}
else {
    $kind_str = "받는";
    $kind_date = "보낸";
}

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css" media="screen">', 0);

?>

<div class="sub-title">
	<i class="fa fa-commenting-o"></i><?php echo $g5['title'];?>
</div>

<div class="btn-group btn-group-justified">
	<a href="./memo.php?kind=recv" class="btn btn-sm btn-dark<?php echo ($kind == "recv") ? ' active' : '';?>">받은쪽지</a>
	<a href="./memo.php?kind=send" class="btn btn-sm btn-dark<?php echo ($kind == "send") ? ' active' : '';?>">보낸쪽지</a>
	<a href="./memo_form.php" class="btn btn-sm btn-dark<?php echo ($kind == "") ? ' active' : '';?>">쪽지쓰기</a>
</div>

	<div class="memo-send-info">
		<span class="pull-right">
			<i class="fa fa-clock-o"></i>
			<span class="memo_view_subj"><?php echo $kind_date ?>시간</span>
			<strong><?php echo $memo['me_send_datetime'] ?></strong>
		</span>
		<i class="fa fa-user"></i>
		<span class="memo_view_subj"><?php echo $kind_str ?>사람 : </span>
		<strong><?php echo $nick ?></strong>
	</div>

	<div class="memo-content">
		<?php echo conv_content($memo['me_memo'], 0) ?>
	</div>

	<p class="text-center">
		<?php if ($kind == 'recv') {  ?>
			<a href="./memo_form.php?me_recv_mb_id=<?php echo $mb['mb_id'] ?>&amp;me_id=<?php echo $memo['me_id'] ?>"  class="btn btn-primary btn-sm">답장</a>
		<?php }  ?>
		<a href="./memo.php?kind=<?php echo $kind ?><?php echo $qstr;?>" class="btn btn-white btn-sm">목록</a>
		<button type="button" onclick="window.close();" class="btn btn-dark btn-sm">닫기</button>
	</p>