<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<div class='sw-outlogin-input-box'>
	<div class='sw-outlogin-box'>
		<div class='sw-user-info'>
			<?php echo $nick ?>님
		</div>

		<div class='sw-user-item'>
			<div class='sw-item-col'>
				<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" id="ol_after_memo" class="win_memo">
					<span class="sound_only">안 읽은 </span>쪽지<br />
					<strong><?php echo $memo_not_read ?></strong>
				</a>
			</div>
			<div class='sw-item-col'>
				<a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank" id="ol_after_pt" class="win_point">
					포인트<br />
					<strong><?php echo $point ?></strong>
				</a>
			</div>
			<div class='sw-item-col'>
				<a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank" id="ol_after_scrap" class="win_scrap">스크랩</a>
			</div>
		</div>
		<div class='sw-user-item'>
			<?
			$btn_size="btn-size-2";
			if($is_admin=='super' || $is_auth){
				$btn_size="btn-size-3";
				echo "<a href='".G5_ADMIN_URL."/index.php' class='link-block-btn btn-info $btn_size'>관리자</a>";
			}
			?>
			<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php" id="ol_after_info" class='link-block-btn btn-dark <?=$btn_size?>'>정보수정</a>
			<a href="<?php echo G5_BBS_URL ?>/logout.php" id="ol_after_logout" class='link-block-btn btn-dark <?=$btn_size?>'>로그아웃</a>
		</div>
	</div>
</div>