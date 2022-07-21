<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css" media="screen">', 0);
?>

<div class='container'>
	<div class="row justify-content-center">
		<div class="col-md-6 col-sm-6">
			<div class="mb-pw-box">
				<div class="mb-pw-header">
					<i class="fa fa-lock"></i> <?php echo $g5['title'] ?>
				</div>
				<div class="mb-pw-body">
					<p>
						<strong>비밀번호를 한번 더 입력해주세요.</strong>
						<br>
						<?php if ($url == 'member_leave.php') { ?>
							비밀번호를 입력하시면 회원탈퇴가 완료됩니다.
						<?php }else{ ?>
							회원님의 정보를 안전하게 보호하기 위해 비밀번호를 한번 더 확인합니다. <br />
							SNS를 통해 회원에 가입하신 분께서는 가입시 쪽지와 E-mail로 아이디와 비밀번호를<br />
							발송해 드렸으니 가입 후 비밀번호를 변경하지 않으셨다면 <a href="<?php echo $at_href['memo'];?>" target="_blank" class="win_memo"><span style='color:red;font-weight:bold;'>쪽지함</span></a>이나 <span style='color:red;'>E-mail</span>을 확인 바랍니다.<br />
							E-mail은 회원가입시 이용하신 해당 SNS에 가입된 E-mail 주소 입니다.
						<?php }  ?>
					</p>

					<form class="form" role="form" name="fmemberconfirm" action="<?php echo $url ?>" onsubmit="return fmemberconfirm_submit(this);" method="post">
					<input type="hidden" name="mb_id" value="<?php echo $member['mb_id'] ?>">
					<input type="hidden" name="w" value="u">

						<div class="form-group has-feedback">
							<label><b>회원아이디 : <span id="mb_confirm_id" class="text-primary"><?php echo $member['mb_id'] ?></span></b></label>
							<label class="sound_only" for="confirm_mb_password">비밀번호<strong class="sound_only">필수</strong></label>
							<div class="input-group">
								<div class="input-group-addon"><i class='fa fa-lock'></i></div>
								<input type="password" name="mb_password" id="confirm_mb_password" required class="form-control input-sm" size="15" maxLength="20">
							</div>
						</div>
						<div class='text-center'>
						<button type="submit" id="btn_sumbit" class="btn btn-primary btn-sm">확인</button> 
						<a href="<?php echo G5_URL ?>/" class="btn btn-dark btn-sm" role="button">메인으로</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
function fmemberconfirm_submit(f) {
    document.getElementById("btn_submit").disabled = true;

    return true;
}
</script>
<!-- } 회원 비밀번호 확인 끝 -->

<? include_once(G5_THEME_PATH.'/tail.php'); ?>