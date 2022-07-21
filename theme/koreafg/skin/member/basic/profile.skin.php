<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css" media="screen">', 0);
?>

<div class="sub-title">
	<i class="fa fa-envelope-o"></i> <?php echo $member[mb_nick] ?> 님의 프로필
</div>

<div class="profile-skin">
	<div class="panel panel-default">
		<div class="panel-body">
			<ul class="list-group">
				<li class="list-group-item">
					<span class="pull-right">
						<b><?php echo $mb['mb_level'] ?></b>
					</span>
					<b>회원권한</b>
				</li>
				<li class="list-group-item">
					<span class="pull-right">
						<b><?php echo number_format($mb['mb_point']) ?></b> 점 
					</span>
					<b>포인트</b>
				</li>
				<?php if ($mb_homepage) {  ?>
					<li class="list-group-item">
						<span class="pull-right">
							<a href="<?php echo $mb_homepage ?>" target="_blank"><?php echo $mb_homepage ?></a>
						</span>
						<b>홈페이지</b>
					</li>
				<?php }  ?>
				<li class="list-group-item">
					<span class="pull-right">
						<?php echo ($member['mb_level'] >= $mb['mb_level']) ?  substr($mb['mb_datetime'],0,10) ." (".number_format($mb_reg_after)."일)" : "비공개";  ?>
					</span>
					<b>회원가입일</b>
				</li>
				<li class="list-group-item">
					<span class="pull-right">
						<?php echo ($member['mb_level'] >= $mb['mb_level']) ? $mb['mb_today_login'] : "비공개"; ?>
					</span>
					<b>최종접속일</b>
				</li>
				<?php if($mb_profile) { ?>
					<li class="list-group-item">
						<?php echo $mb_profile ?>
					</li>
				<?php } ?>
			</ul> 
		</div>
	</div>
	<div class="text-center" style="margin:15px 0px 0px;">
		<button type="button" onclick="window.close();" class="btn btn-dark btn-sm">닫기</button>
	</div>
</div>