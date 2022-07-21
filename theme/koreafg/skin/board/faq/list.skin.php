<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');
include_once($board_skin_path.'/func.lib.php');

$category_option_md = get_category_list();
$category_option = get_select_category_list();

$write_pages = get_paging_custom(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, './board.php?bo_table='.$bo_table.$qstr.'&amp;page=');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
?>
<link rel="stylesheet" href="<?=$board_skin_url?>/style.css">
<link rel="stylesheet" href="<?=$board_skin_url?>/selectric/selectric.plus.css">

<div id='faq-container'>
	<!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
	<div class="faq-cate">
	<div id='category_box' style='margin-bottom:30px;height:30px;width:100%;' class='hidden-md hidden-lg'>
		<div class='category_area' style='width:200px;display:none;float:right;'>
		<select name='bo_category' id='bo_category'>
		<?=$category_option?>
		</select>
		</div>
	</div>

	<nav class="hidden-sm hidden-xs">
		<ul class="pagination-tabs">
		<?php echo $category_option_md ?>
		</ul>
	</nav>
	</div>
    <?php } ?>
    <!-- } 게시판 카테고리 끝 -->

	<?
	if ($list_href || $is_checkbox || $write_href) {
		echo "<div class='dropdown text-right visible-xs dropup' style='margin:10px 0;'>";
		echo "<button class='btn btn-white btn-sm dropdown-toggle' type='button' id='list-btn-group-top' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
		echo "<i class='fa fa-cog'></i>";
		echo "</button>";
		if ($list_href || $write_href) {
			echo " <button type='button' class='btn btn-white btn-sm btn-search-top'><i class='fa fa-search'></i> <span class='hidden-sm hidden-xs'> 검색</span></button>";
			if ($list_href) {
				echo "<a href='$list_href' class='btn btn-white btn-sm'><i class='fa fa-bars'></i> <span class='hidden-sm hidden-xs'>목록</span></a> ";
			}
			if ($write_href) {
				echo "<a href='$write_href' class='btn btn-dark btn-sm'><i class='fa fa-pencil'></i> <span class='hidden-sm hidden-xs'> 글쓰기</span></a>";
			}
		}
		
		echo "<div class='dropdown-menu' aria-labelledby='list-btn-group-top'>";
		if ($is_checkbox) {
			echo "<a class='dropdown-item btn-checkbox'>";
			echo "<i class='fa fa-check'></i> 전체선택";
			echo "</a>";
			echo "<button type='submit' name='btn_submit' class='dropdown-item' onclick='document.pressed=this.value' value='선택이동'>";
			echo "<i class='fa fa-arrows'></i> 선택이동";
			echo "</button>";
			echo "<button type='submit' name='btn_submit' class='dropdown-item' onclick='document.pressed=this.value' value='선택복사'>";
			echo "<i class='fa fa-clipboard'></i> 선택복사";
			echo "</button>";
			echo "<button type='submit' name='btn_submit' class='dropdown-item' onclick='document.pressed=this.value' value='선택삭제'>";
			echo "<i class='fa fa-times'></i> 선택삭제";
			echo "</button>";
			if ($rss_href) {
				echo "<a href='$rss_href' class='dropdown-item'>";
				echo "<i class='fa fa-rss'> RSS</i>";
				echo "</a>";
			}
			if ($admin_href) {
				echo "<a href='$admin_href' class='dropdown-item' target='_blank'>";
				echo "<i class='fa fa-gear'></i> 관리자";
				echo "</a>";
			}
		}
		echo "</div>";
		echo "</div>";

		echo "<div class='btn_bo_user hidden-xs' style='margin:10px 0;'>";
		echo "<div class='row'>";
		echo "<div class='col-sm-6'>";
		echo "<div class='btn-group'>";
		if ($is_checkbox) {
			echo "<button type='button' class='btn btn-white btn-sm btn-checkbox'>";
			echo "<i class='fa fa-check'> <span class='hidden-sm hidden-xs'> 전체선택</span></i>";
			echo "</button>";
			echo "<button type='submit' name='btn_submit' class='btn btn-white btn-sm' onclick='document.pressed=this.value' value='선택이동'>";
			echo "<i class='fa fa-arrows'></i> <span class='hidden-sm hidden-xs'>선택이동</span>";
			echo "</button>";
			echo "<button type='submit' name='btn_submit' class='btn btn-white btn-sm' onclick='document.pressed=this.value' value='선택복사'>";
			echo "<i class='fa fa-clipboard'></i> <span class='hidden-sm hidden-xs'>선택복사</span>";
			echo "</button>";
			echo "<button type='submit' name='btn_submit' class='btn btn-white btn-sm' onclick='document.pressed=this.value' value='선택삭제'>";
			echo "<i class='fa fa-times'></i> <span class='hidden-sm hidden-xs'>선택삭제</span>";
			echo "</button>";
		}
		echo "</div>";
		echo "</div>";
		echo "<div class='col-sm-6 text-right'>";
		echo "<div class='btn-group'>";
		if ($rss_href) {
			echo "<a href='$rss_href' class='btn btn-sm btn-primary' role='button'>";
			echo "<i class='fa fa-rss'> <span class='hidden-sm hidden-xs'> RSS</span></i>";
			echo "</a>";
		}
		if ($admin_href) {
			echo "<a href='$admin_href' class='btn btn-sm btn-danger' role='button' target='_blank'>";
			echo "<i class='fa fa-gear'></i> <span class='hidden-sm hidden-xs'> 관리자</span>";
			echo "</a>";
		}
		if ($list_href || $write_href) {
			if ($list_href) {
				echo "<a href='$list_href' class='btn btn-white btn-sm'><i class='fa fa-bars'></i> <span class='hidden-sm hidden-xs'>목록</span></a> ";
			}
			if ($write_href) {
				echo "<a href='$write_href' class='btn btn-dark btn-sm'><i class='fa fa-pencil'></i> <span class='hidden-sm hidden-xs'> 글쓰기</span></a>";
			}
			echo " <button type='button' class='btn btn-white btn-sm btn-search-top'><i class='fa fa-search'></i> <span class='hidden-sm hidden-xs'> 검색</span></button>";
		}
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
    }
	?>

	<div class="list-tsearch">
		<form name="fhsearch" method="get" role="form" class="form">
			<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
			<input type="hidden" name="sca" value="<?php echo $sca ?>">
			<div class="row justify-content-center">
				<div class="col-md-2 col-sm-5">
					<div class="form-group">
						<select name="sfl" id="sfl" class="form-control form-control-sm">
							<option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
							<option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
							<option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
							<option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
							<option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
							<option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
							<option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
						</select>
					</div>
				</div>
				<div class="col-md-4 col-sm-7">
					<div class="form-group">
						<div class="form-group">
							<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" id="stx" class="form-control form-control-sm" maxlength="20" placeholder="검색어">
						</div>
					</div>
				</div>
				<div class="col-md-2 col-sm-5">
					<div class="form-group">
						<select name="sop" id="sop" class="form-control form-control-sm">
							<option value="or"<?php echo get_selected($sop, "or") ?>>또는</option>
							<option value="and"<?php echo get_selected($sop, "and") ?>>그리고</option>
						</select>	
					</div>
				</div>
				<div class="col-md-2 col-sm-7">
					<div class="form-group">
						<button type="submit" class="btn btn-dark btn-sm btn-block"><i class="fa fa-search"></i> 검색</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<!-- } 게시판 검색 끝 -->
	
	<form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

	<div id='accordion' role='tablist' aria-multiselectable='true'>
	<?
	for ($i=0; $i<count($list); $i++) {
		$attach_list = '';
		if ($list[$i]['link']) {
			// 링크
			for ($k=1; $k<=count($list[$i]['link']); $k++) {
				if ($list[$i]['link'][$k]) {
					$attach_list .= '<a class="list-group-item break-word" href="'.$list[$i]['link_href'][$k].'" target="_blank">';
					$attach_list .= '<i class="fa fa-link"></i> '.cut_str($list[$i]['link'][$k], 70).' &nbsp;<span class="blue">+ '.$list[$i]['link_hit'][$k].'</span></a>'.PHP_EOL;
				}
			}
		}

		// 가변 파일
		$j = 0;
		if ($list[$i]['file']['count']) {
			for ($k=0; $k<count($list[$i]['file']); $k++) {
				if (isset($list[$i]['file'][$k]['source']) && $list[$i]['file'][$k]['source'] && !$list[$i]['file'][$k]['view']) {
					if ($board['bo_download_point'] < 0 && $j == 0) {
						$attach_list .= '<a class="list-group-item"><i class="fa fa-bell red"></i> 다운로드시 <b>'.number_format(abs($board['bo_download_point'])).'</b>포인트 차감 (최초 1회 / 재다운로드시 차감없음)</a>'.PHP_EOL;
					}
					$file_tooltip = '';
					if($list[$i]['file'][$k]['content']) {
						$file_tooltip = ' data-original-title="'.strip_tags($list[$i]['file'][$k]['content']).'" data-toggle="tooltip"';
					}
					$attach_list .= '<a class="list-group-item break-word view_file_download at-tip" href="'.$list[$i]['file'][$k]['href'].'"'.$file_tooltip.'>';
					$attach_list .= '<span class="pull-right hidden-xs text-muted"><i class="fa fa-clock-o"></i> '.date("Y.m.d H:i", strtotime($list[$i]['file'][$k]['datetime'])).'</span>';
					$attach_list .= '<i class="fa fa-download"></i> '.$list[$i]['file'][$k]['source'].' ('.$list[$i]['file'][$k]['size'].') &nbsp;<span class="orangered">+ '.$list[$i]['file'][$k]['download'].'</span></a>'.PHP_EOL;
					$j++;
				}
			}
		}

		// 수정, 삭제 링크
		$update_href = $delete_href = '';
		// 로그인중이고 자신의 글이라면 또는 관리자라면 비밀번호를 묻지 않고 바로 수정, 삭제 가능
		if (($member['mb_id'] && ($member['mb_id'] == $list[$i]['mb_id'])) || $is_admin) {
			$update_href = './write.php?w=u&amp;bo_table='.$bo_table.'&amp;wr_id='.$list[$i][wr_id].'&amp;page='.$page.$qstr;
			set_session('ss_delete_token', $token = uniqid(time()));
			$delete_href ='./delete.php?bo_table='.$bo_table.'&amp;wr_id='.$list[$i][wr_id].'&amp;token='.$token.'&amp;page='.$page.urldecode($qstr);
		}
		else if (!$list[$i]['mb_id']) { // 회원이 쓴 글이 아니라면
			$update_href = './password.php?w=u&amp;bo_table='.$bo_table.'&amp;wr_id='.$list[$i][wr_id].'&amp;page='.$page.$qstr;
			$delete_href = './password.php?w=d&amp;bo_table='.$bo_table.'&amp;wr_id='.$list[$i][wr_id].'&amp;page='.$page.$qstr;
		}

		// 최고, 그룹관리자라면 글 복사, 이동 가능
		$copy_href = $move_href = '';
		if ($list[$i]['wr_reply'] == '' && ($is_admin == 'super' || $is_admin == 'group')) {
			$copy_href = './move.php?sw=copy&amp;bo_table='.$bo_table.'&amp;wr_id='.$list[$i][wr_id].'&amp;page='.$page.$qstr;
			$move_href = './move.php?sw=move&amp;bo_table='.$bo_table.'&amp;wr_id='.$list[$i][wr_id].'&amp;page='.$page.$qstr;
		}

		echo "<div class='card'>";
		echo "<div class='card-header' role='tab' id='heading-{$i}' data-parent='#accordion' href='#collapse-{$i}' aria-expanded='true' aria-controls='collapse-{$i}'>";
		echo "<h4 class='card-title'>";
		if ($is_checkbox) {
			echo "<span class='bl-chk'>";
			echo "<input type='checkbox' name='chk_wr_id[]' value='{$list[$i][wr_id]}' id='chk_wr_id_{$i}' class='item_chk'>";
			echo "<label for='chk_wr_id_{$i}' class='empty-label'></label>";
			echo "</span>";
		}
		echo "<a data-toggle='collapse' data-target='#collapse-{$i}'>{$list[$i]['subject']}</a>";
		echo "</h4>";
		echo "</div>";
		echo "<div id='collapse-{$i}' class='card-collapse collapse ";
		if($i==0) echo "in";
		echo "' role='tabcard' aria-labelledby='heading-{$i}'>";
		echo "<div class='card-body'>";

		if($attach_list) {
			echo '<div class="list-group">'.$attach_list.'</div>'.PHP_EOL;
		}

		// 이미지 상단 출력
		$img_count = count($list[$i]['file']);
		if($img_count) {
			echo '<div class="view-img">'.PHP_EOL;
			for ($k=0; $k<=count($list[$i]['file']); $k++) {
				if ($list[$i]['file'][$k]['view']){
					echo get_view_thumbnail($list[$i]['file'][$k]['view']);
				}
			}
			echo '</div>'.PHP_EOL;
		}

		echo get_view_thumbnail($list[$i]['content']);

		echo "<div class='h40'></div>";

		echo "<div class='list-btn text-right'>";
		echo "<div class='btn-group' role='group'>";
		if ($copy_href) { 
			echo "<a role='button' href='".$copy_href."' class='btn btn-white btn-sm' onclick='board_move(this.href); return false;' title='복사'>";
			echo "<i class='fa fa-clipboard'></i><span class='hidden-xs'> 복사</span>";
			echo "</a>";
		} 
		if ($move_href) { 
			echo "<a role='button' href='".$move_href."' class='btn btn-white btn-sm' onclick='board_move(this.href); return false;' title='이동'>";
			echo "<i class='fa fa-share'></i><span class='hidden-xs'> 이동</span>";
			echo "</a>";
		} 
		if ($delete_href) { 
			echo "<a role='button' href='".$delete_href."' class='btn btn-white btn-sm' title='삭제' onclick='del(this.href); return false;'>";
			echo "<i class='fa fa-times'></i><span class='hidden-xs'> 삭제</span>";
			echo "</a>";
		} 
		if ($update_href) { 
			echo "<a role='button' href='".$update_href."' class='btn btn-white btn-sm' title='수정'>";
			echo "<i class='fa fa-plus'></i><span class='hidden-xs'> 수정</span>";
			echo "</a>";
		}
		if ($scrap_href) {
			echo "<a role='button' href='".$scrap_href."' target='_blank' class='btn btn-white btn-sm' onclick='win_scrap(this.href); return false;' title='스크랩'>";
			echo "<i class='fa fa-paperclip'></i><span class='hidden-xs'> 스크랩</span>";
			echo "</a>";
		}
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
	}
	?>
	</div>
	<?
	if (count($list) == 0) {
		echo "<div class='nodata'>게시물이 없습니다.</div>";
	}

	if ($list_href || $is_checkbox || $write_href) {
		echo "<div class='btn_bo_user' style='margin:10px 0 50px 0;'>";
		echo "<div class='btn_gr_l'>";
		if ($is_checkbox) {
			echo "<div class='btn-group'>";
			echo "<button type='submit' name='btn_submit' class='btn btn-sm btn-white' onclick='document.pressed=this.value' value='선택이동'>";
			echo "<i class='fa fa-arrows'></i> <span class='hidden-sm hidden-xs'>선택이동</span>";
			echo "</button>";
			echo "<button type='submit' name='btn_submit' class='btn btn-sm btn-white' onclick='document.pressed=this.value' value='선택복사'>";
			echo "<i class='fa fa-clipboard'></i> <span class='hidden-sm hidden-xs'>선택복사</span>";
			echo "</button>";
			echo "<button type='submit' name='btn_submit' class='btn btn-sm btn-white' onclick='document.pressed=this.value' value='선택삭제'>";
			echo "<i class='fa fa-times'></i> <span class='hidden-sm hidden-xs'>선택삭제</span>";
			echo "</button>";
			echo "</div>";
		}
		echo "</div>";
		echo "<div class='btn_gr_r'>";
		if ($list_href || $write_href) {
			if ($list_href) {
				echo "<a href='$list_href' class='btn btn-sm btn-white'><i class='fa fa-bars'></i> <span class='hidden-sm hidden-xs'>목록</span></a> ";
			}
			if ($write_href) {
				echo "<a href='$write_href' class='btn btn-sm btn-dark'><i class='fa fa-pencil'></i> <span class='hidden-sm hidden-xs'> 글쓰기</span></a>";
			}
		}
		echo "</div>";
		echo "<div class='cl'></div>";
		echo "</div>";
	}
	?>
	</form>

	<?php echo $write_pages;  ?>

	
</div>
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<script type='text/javascript' src='<?=$board_skin_url?>/selectric/jquery.selectric.js'></script>
<script type='text/javascript'>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href){
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}

$(function() {
	// Initialize Selectric and bind to 'change' event
	$('#bo_category').selectric();
	$(".category_area").show();
	$('#bo_category').on('change', function() {
		var url="./board.php?bo_table=<?php echo $bo_table;?>&sca="+$(this).val();
		if("<?=$sfl?>") url+="&sfl=<?=urlencode($sfl)?>";
		if("<?=$stx?>") url+="&stx=<?=urlencode($stx)?>";
		if("<?=$sop?>") url+="&sop=<?=urlencode($sop)?>";

		$(window.document.location).attr('href',url);
	});

    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

	$(".card-body").viewimageresize();
});
</script>

<?php if ($is_checkbox) { ?>
<script type='text/javascript'>
$(document).ready(function(){
	$(".btn-checkbox").click(function(){
		if($(this).hasClass("is_checked")){
			$(this).removeClass("is_checked").find("span").html("전체선택");
			$(".item_chk").prop('checked', false);
		}else{
			$(this).addClass("is_checked").find("span").html("선택해제");
			$(".item_chk").prop('checked', true);
		}
	});
});

function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>