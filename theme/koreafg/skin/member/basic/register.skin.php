<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<div class="alert alert-info" role="alert">
	<strong><i class="fa fa-exclamation fa-lg"></i> 회원가입약관 및 개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.</strong>
</div>

<form  name="fregister" id="fregister" action="<?php echo $register_action_url ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off" class="form" role="form">
	<div class="card">
		<div class="card-header card-dark"><strong><i class="fa fa-file-text-o fa-lg"></i> 회원가입약관</strong></div>
		<div class="card-body">
			<textarea class="form-control input-sm" rows="10" readonly><?php echo get_text($config['cf_stipulation']) ?></textarea>
		</div>
	</div>
	<div class="pull-right">
		<div class="is-chk">
			<input class="styled" type="checkbox" name="agree" value="1" id="agree11">
			<label for="agree11">회원가입약관에 동의합니다.</label>
		</div>
	</div>
	<div class='clearfix'></div>

	<div class="card mgt">
		<div class="card-header card-dark">
			<a data-toggle="collapse" href="#privacy" aria-expanded="false" aria-controls="privacy" class="view-agree">전문보기</a>
			<strong><i class="fa fa-user fa-lg"></i> 개인정보처리방침안내</strong>
		</div>
		<div class="card-body collapse" id="privacy" style="border-bottom:1px solid #ddd;">
			<div class="register-term">
			<?=$config[cf_privacy]?>
			</div>
		</div>
		<table class="table" style="border-top:0px;">
			<colgroup>
				<col width="40%">
				<col width="30%">
			</colgroup>
			<tbody>
			<tr>
				<th style="border-top:0px;">목적</th>
				<th style="border-top:0px;">항목</th>
				<th style="border-top:0px;">보유기간</th>
			</tr>
			<tr>
				<td>이용자 식별 및 본인여부 확인</td>
				<td>아이디, 이름, 비밀번호</td>
				<td>회원 탈퇴 시까지</td>
			</tr>
			<tr>
				<td>고객서비스 이용에 관한 통지, CS대응을 위한 이용자 식별</td>
				<td>연락처 (이메일, 휴대전화번호)</td>
				<td>회원 탈퇴 시까지</td>
			</tr>
			</tbody>
		</table>
	</div>
	
	<div class="pull-right">
		<div class="is-chk">
			<input class="styled" type="checkbox" name="agree2" value="1" id="agree21">
			<label for="agree21">개인정보처리방침안내의 내용에 동의합니다.</label>
		</div>
	</div>
	<div class='clearfix'></div>

    <div class="text-center" style='margin:30px 0px;'>
        <button type="submit" class="btn btn-dark btn-sm">회원가입</button>
    </div>
</form>

<script>
    function fregister_submit(f) {
        if (!f.agree.checked) {
            alert("회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree.focus();
            return false;
        }

        if (!f.agree2.checked) {
            alert("개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree2.focus();
            return false;
        }

        return true;
    }
</script>
