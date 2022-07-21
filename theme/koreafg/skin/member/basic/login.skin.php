<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<div class="container">
	<div class='row justify-content-md-center'>
	<div class="col-md-6">
		<div class="mb-login-box">
			<div class="mb-login-body">
			    <form class="form" role="form" name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
			    <input type="hidden" name="url" value='<?php echo $login_url ?>'>
					<div class="form-group">
						<label for="login_id"><b>아이디</b><strong class="sound_only"> 필수</strong></label>
						<div class="input-group">
							<div class="input-group-addon"><i class='fa fa-user'></i></div>
							<input type="text" name="mb_id" id="login_id" required class="form-control" placeholder="회원 아이디">
						</div>
					</div>
					<div class="form-group">
						<label for="login_pw"><b>비밀번호</b><strong class="sound_only"> 필수</strong></label>
						<div class="input-group">
							<div class="input-group-addon"><i class='fa fa-lock'></i></div>
							<input type="password" name="mb_password" id="login_pw" required class="form-control" placeholder="비밀번호">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class='is-chk'>
							<input id="login_auto_login" class="styled" type="checkbox">
							<label for="login_auto_login">자동로그인</label>
							</div>
						</div>
						<div class="col-sm-6">
							<button type="submit" class="btn btn-sm btn-dark pull-right"><i class='fa fa-sign-in'></i> Sign In</button>
						</div>
					</div>
				</form>
			</div>

			<?php
			// 소셜로그인 사용시 소셜로그인 버튼
			@include_once(get_social_skin_path().'/social_login.skin.php');
			?>

			<div class="mb-login-footer text-center">
				<a href="./register.php"><i class="fa fa-user-plus"></i> 회원가입</a><span>|</span>
				<a href="<?php echo G5_BBS_URL ?>/password_lost.php" target="_blank" id="login_password_lost"><i class="fa fa-search"></i> 정보찾기</a>
				<span>|</span>
				<a href="<?php echo G5_URL ?>/"><i class='fa fa-home'></i> 메인으로</a>
			</div>
		</div>
	</div>
	</div>
</div>

<script>
$(function(){
    $("#login_auto_login").click(function(){
        if (this.checked) {
            this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
        }
    });
});

function flogin_submit(f) {
    return true;
}
</script>
<!-- } 로그인 끝 -->

<? include_once(G5_THEME_PATH.'/tail.php'); ?>