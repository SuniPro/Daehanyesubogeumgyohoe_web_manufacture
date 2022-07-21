<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

//--------------------------------------------------------------------------
// 가변 파일
$file_script = "";
$file_length = -1;
// 수정의 경우 파일업로드 필드가 가변적으로 늘어나야 하고 삭제 표시도 해주어야 합니다.
if ($w == "u") {
    for ($i=0; $i<$file['count']; $i++) {
        if ($file[$i]['source']) {
			$file_script .= "add_file(\"";
			if ($is_file_content) {
				$file_script .= "<div class='col-md-5'><div class='form-group'><input type='text'name='bf_content[$i]' value='".addslashes(get_text($file[$i]['bf_content']))."' class='form-control form-control-sm' placeholder='이미지에 대한 내용을 입력하세요.'></div></div>";
			}
			$file_script .= "<div class='col-md-12'><div class='form-group'><label class='checkbox-inline'><input type='checkbox' name='bf_file_del[$i]' value='1'> {$file[$i]['source']}({$file[$i]['size']}) 파일 삭제</label> | <a href='{$file[$i]['href']}'>열기</a></div></div>";
			$file_script .= "\");\n";
        } else {
            $file_script .= "add_file('');\n";
		}
    }
    $file_length = $file['count'] - 1;
}

if ($file_length < 0) {
    $file_script .= "add_file('');\n";
    $file_length = 0;
}
//--------------------------------------------------------------------------

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/selectric/selectric.plus.css">', 1);
?>

<!-- 게시물 작성/수정 시작 { -->
<form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
<input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
<input type="hidden" name="w" value="<?php echo $w ?>">
<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
<input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
<input type="hidden" name="sca" value="<?php echo $sca ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
<input type="hidden" name="stx" value="<?php echo $stx ?>">
<input type="hidden" name="spt" value="<?php echo $spt ?>">
<input type="hidden" name="sst" value="<?php echo $sst ?>">
<input type="hidden" name="sod" value="<?php echo $sod ?>">
<input type="hidden" name="page" value="<?php echo $page ?>">
	<div class="write-wrap board-write-top-line">
	<?php
	$option = '';
	$option_hidden = '';
	if ($is_notice || $is_html || $is_secret || $is_mail) {
		if ($is_notice) {
			$option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'><label class="control-label sp-label" for="notice">공지</label>';
		}

		if ($is_html) {
			if ($is_dhtml_editor) {
				$option_hidden .= '<input type="hidden" value="html1" name="html">';
			} else {
				$option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'><label class="control-label sp-label" for="html">HTML</label>';
			}
		}

		if ($is_secret) {
			if ($is_admin || $is_secret==1) {
				$option .= "\n".'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'><label class="control-label sp-label" for="secret">비밀글</label>';
			} else {
				$option_hidden .= '<input type="hidden" name="secret" value="secret">';
			}
		}

		if ($is_mail) {
			$option .= "\n".'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'><label class="control-label sp-label" for="mail">답변메일받기</label>';
		}
	}

	echo $option_hidden;
	?>

	<?php if ($is_name) { ?>
	<div class="form-group has-feedback clearfix">
		<div class='row'>
			<label class="col-md-2 control-label" for="wr_name">이름<strong class="sound_only">필수</strong></label>
			<div class="col-md-10">
				<div class="input-group">
					<input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="form-control form-control-sm" size="10" maxlength="20">
					<span class="input-group-addon">
						<span class="fa fa-check"></span>
					</span>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<?php if ($is_password) { ?>
	<div class="form-group has-feedback clearfix">
		<div class='row'>
			<label class="col-md-2 control-label" for="wr_password">비밀번호<strong class="sound_only">필수</strong></label>
			<div class="col-md-10">
				<div class="input-group">
					<input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="form-control form-control-sm"	maxlength="20">
					<? if($password_required){ ?>
					<span class="input-group-addon">
						<span class="fa fa-check"></span>
					</span>
					<? } ?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<?php if ($is_email) { ?>
	<div class="form-group clearfix">
		<div class='row'>
			<label class="col-md-2 control-label" for="wr_email">E-mail</label>
			<div class="col-md-10">
				<input type="text" name="wr_email" id="wr_email" value="<?php echo $email ?>" class="form-control form-control-sm email" size="50" maxlength="100">
			</div>
		</div>
	</div>
	<?php } ?>

	<?php if ($is_homepage) { ?>
	<div class="form-group clearfix">
		<div class='row'>
			<label class="col-md-2 control-label" for="wr_homepage">홈페이지</label>
			<div class="col-md-10">
				<input type="text" name="wr_homepage" id="wr_homepage" value="<?php echo $homepage ?>" class="form-control form-control-sm" size="50">
			</div>
		</div>
	</div>
	<?php } ?>

	<?php if ($is_category) { ?>
	<div class="form-group clearfix">
		<div class='row'>
			<label class="col-md-2 control-label">분류</label>
			<div class="col-md-10">
				<select name="ca_name" id="ca_name" required class="form-control form-control-sm">
					<option value="">선택하세요</option>
					<?php echo $category_option ?>
				</select>
			</div>
		</div>
	</div>
	<?php } ?>

	<?php if ($option) { ?>
	<div class="form-group clearfix">
		<div class='row'>
			<label class="col-md-2 control-label">옵션</label>
			<div class="col-md-10">
				<div class="h10 visible-xs"></div>
				<?php echo $option ?>
			</div>
		</div>
	</div>
	<?php } ?>

	<? include_once("$board_skin_path/movie_form.php") ?>

	<div class='form-group clearfix'>
		<div class='row'>
			<label class='col-md-2 control-label'>제목</label>
			<div class='col-md-10'>
				<div class='input-group'>
				<input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="form-control form-control-sm" size="50" maxlength="255">
				<?php 
				if ($is_member) { // 임시 저장된 글 기능 ?>
				<span class='input-group-btn'>
				<button type="button" id="btn_autosave" data-toggle="modal" data-target="#autosaveModal" class="btn btn-white btn-sm">저장 (<span id="autosave_count"><?php echo $autosave_count; ?></span>)</button>
				</span>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<div class="form-group clearfix" style='margin-bottom:0;'>
		<div class='row'>
			<div class="col-md-12">
			<?php if($write_min || $write_max) { ?>
				<!-- 최소/최대 글자 수 사용 시 -->
				<div class="well well-sm" style="margin-bottom:15px;">
					현재 <strong><span id="char_count"></span></strong> 글자이며, 최소 <strong><?php echo $write_min; ?></strong> 글자 이상, 최대 <strong><?php echo $write_max; ?></strong> 글자 이하까지 쓰실 수 있습니다.
				</div>
			<?php } ?>
			<?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
			</div>
		</div>
	</div>

	<?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
	<div class="form-group clearfix">
		<div class='row'>
			<label class="col-md-2 control-label" for="wr_link<?php echo $i ?>">관련 링크 #<?php echo $i ?></label>
			<div class="col-md-10">
				<input type="text" name="wr_link<?php echo $i ?>" value="<?php echo $write['wr_link'.$i]; ?>" id="wr_link<?php echo $i ?>" class="form-control form-control-sm" size="50">
			</div>
		</div>
	</div>
	<?php } ?>

	<?php if ($is_file) { ?>
	<div class="form-group clearfix">
		<div class='row'>
			<label class="col-md-2 control-label hidden-xs">첨부파일</label>
			<div class="col-md-10">
				<p class="form-control-static text-muted" style="padding:0px; padding-top:10px;">
					<span class="cursor" onclick="add_file();"><i class="fa fa-plus-circle fa-lg"></i> 파일추가</span>
					&nbsp;
					<span class="cursor" onclick="del_file();"><i class="fa fa-times-circle fa-lg"></i> 파일삭제</span>
				</p>
				<table id="variableFiles" class='table'></table>
			</div>
		</div>
	</div>
	<script>
	var flen = 0;
	function add_file(delete_code) {
		var upload_count = <?php echo (int)$board['bo_upload_count']; ?>;
		if (upload_count && flen >= upload_count) {
			alert("이 게시판은 "+upload_count+"개 까지만 파일 업로드가 가능합니다.");
			return;
		}

		var objTbl;
		var objNum;
		var objRow;
		var objCell;
		var objContent;
		if (document.getElementById)
			objTbl = document.getElementById("variableFiles");
		else
			objTbl = document.all["variableFiles"];

		objNum = objTbl.rows.length;
		objRow = objTbl.insertRow(objNum);
		objCell = objRow.insertCell(0);

		objContent = "<div class='row'>";
		objContent += "<div class='col-md-7'><div class='form-group'><div class='input-group input-group-sm'><span class='input-group-addon'>파일 "+(objNum+1)+"</span><input type='file' class='form-control form-control-sm' name='bf_file[]' title='파일 용량 <?php echo $upload_max_filesize; ?> 이하만 업로드 가능'></div></div></div>";
		if (delete_code) {
			objContent += delete_code;
		} else {
			<?php if ($is_file_content) { ?>
			objContent += "<div class='col-md-5'><div class='form-group'><input type='text'name='bf_content[]' class='form-control form-control-sm' placeholder='이미지에 대한 내용을 입력하세요.'></div></div>";
			<?php } ?>
			;
		}
		objContent += "</div>";

		objCell.innerHTML = objContent;

		flen++;
	}

	<?php
		echo $file_script; //수정시에 필요한 스크립트
	?>

	function del_file() {
		// file_length 이하로는 필드가 삭제되지 않아야 합니다.
		var file_length = <?php echo (int)$file_length; ?>;
		var objTbl = document.getElementById("variableFiles");
		if (objTbl.rows.length - 1 > file_length) {
			objTbl.deleteRow(objTbl.rows.length - 1);
			flen--;
		}
	}
	</script>
	<?php } ?>

	<?php if ($is_guest) { //자동등록방지  ?>
	<div class='row'>
	<div class='col-md-12'>
	<div class="well well-sm text-center">
		<?php echo $captcha_html; ?>
	</div>
	</div>
	</div>
	<?php } ?>

	<div class="write-btn pull-center">
		<button type="submit" id="btn_submit" accesskey="s" class="btn btn-dark btn-sm"><i class="fa fa-check"></i> <b>작성완료</b></button>
		<a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn btn-white btn-sm" role="button">취소</a>
	</div>
	</div>
</form>

<?php if ($is_member) { // 임시 저장된 글 기능 ?>
	<script src="<?php echo G5_JS_URL; ?>/autosave.js"></script>
	<?php if($editor_content_js) echo $editor_content_js; ?>
	<div class="modal fade" id="autosaveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="myModalLabel">임시 저장된 글 목록</h4>
				</div>
				<div class="modal-body">
					<div id="autosave_wrapper">
						<div id="autosave_pop">
							<ul></ul>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<script type='text/javascript'>
<?php if($write_min || $write_max) { ?>
// 글자수 제한
var char_min = parseInt(<?php echo $write_min; ?>); // 최소
var char_max = parseInt(<?php echo $write_max; ?>); // 최대
check_byte("wr_content", "char_count");

$(function() {
	$("#wr_content").on("keyup", function() {
		check_byte("wr_content", "char_count");
	});
});
<?php } ?>

function html_auto_br(obj) {
	if (obj.checked) {
		result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
		if (result)
			obj.value = "html2";
		else
			obj.value = "html1";
	}
	else
		obj.value = "";
}

function fwrite_submit(f) {

	<?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

	var subject = "";
	var content = "";
	$.ajax({
		url: g5_bbs_url+"/ajax.filter.php",
		type: "POST",
		data: {
			"subject": f.wr_subject.value,
			"content": f.wr_content.value
		},
		dataType: "json",
		async: false,
		cache: false,
		success: function(data, textStatus) {
			subject = data.subject;
			content = data.content;
		}
	});

	if (subject) {
		alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
		f.wr_subject.focus();
		return false;
	}

	if (content) {
		alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
		if (typeof(ed_wr_content) != "undefined")
			ed_wr_content.returnFalse();
		else
			f.wr_content.focus();
		return false;
	}

	if (document.getElementById("char_count")) {
		if (char_min > 0 || char_max > 0) {
			var cnt = parseInt(check_byte("wr_content", "char_count"));
			if (char_min > 0 && char_min > cnt) {
				alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
				return false;
			}
			else if (char_max > 0 && char_max < cnt) {
				alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
				return false;
			}
		}
	}

	<?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

	document.getElementById("btn_submit").disabled = "disabled";

	return true;
}

$(function(){
	$("#wr_content").addClass("form-control form-control-sm write-content");
});
</script>