<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<div class='sw-outlogin-input-box'>
	<form name="foutlogin" action="<?php echo $outlogin_action_url ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
	<input type="hidden" name="url" value="<?php echo $outlogin_url ?>">
		<div class='sw-input-item'>
			<input type="text" id="ol_id" name="mb_id" required class="form-control-sm form-control" placeholder='회원아이디'>
			<div class='sw-nbsp'></div>
			<input type="password" name="mb_password" id="ol_pw" required class="form-control-sm form-control" placeholder='비밀번호'>
		</div>

		<div class='sw-btn'>
			<div class='btn-size'>
				<button class='btn btn-sm btn-primary btn-block' type='submit' id='ol_submit'><i class='fa fa-sign-in'></i> 로그인</button>
			</div>
			<div class='btn-size'>
				<a href='<?php echo G5_BBS_URL ?>/register.php' class='btn btn-sm btn-dark btn-block' role='button'><i class='fa fa-user-o'></i> 회원가입</a>
			</div>
		</div>
	</form>

	<div class='sw-item'>
		<div class='sw-item-l'>
			<div class='block-item'>
				<input type="checkbox" name="auto_login" value="1" id="auto_login"> <label for='auto_login'>자동로그인</label>
			</div>
		</div>
		<div class='sw-item-r'>
			<div class='block-item'>
				<a href="<?php echo G5_BBS_URL ?>/password_lost.php" id="ol_password_lost"><i class='fa fa-search'></i> 회원정보 찾기</a>
			</div>
		</div>
		<div class='clearfix'></div>
	</div>
</div>


<script type='text/javascript'>
$(document).ready(function(){
	$("#auto_login").click(function(){
        if ($(this).is(":checked")) {
            if(!confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?"))
                return false;
        }
    });
});

function fhead_submit(f){
    return true;
}
</script>