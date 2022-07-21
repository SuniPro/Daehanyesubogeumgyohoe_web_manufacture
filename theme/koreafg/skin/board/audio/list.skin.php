<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once($board_skin_path.'/func.lib.php');

$category_option_md = get_category_list();

$write_pages = get_paging_custom(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, './board.php?bo_table='.$bo_table.$qstr.'&amp;page=');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨

add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/selectric/selectric.plus.css">', 1);
?>
<link rel="stylesheet" href="<?=$board_skin_url?>/style.css">
<div id='board-container'>
	<!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
	<div id='category_box' style='margin-bottom:30px;height:30px;width:100%;'>
		<div class='category_area' style='width:200px;display:none;float:right;'>
		<select name='bo_category' id='bo_category'>
		<?=$category_option_md?>
		</select>
		</div>
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
	<div class='list_area'>
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
		<div id='list-board'>
			<div class='list-head div-head board-list-top-line'>
				<?php if ($is_checkbox) { ?>
				<span class="bl-chk">
					<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
					<label for='chkall' class='empty-label'></label>
				</span>
				<? } ?>
				<span class='bl-no hidden-xs'>No</span>
				<span class='bl-title'>제목</span>
				<span class='bl-name hidden-xs'>작성자</span>
				<span class='bl-date hidden-xs'><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>작성일</a></span>
				<span class='bl-hit hidden-sm hidden-xs'><?php echo subject_sort_link('wr_hit', $qstr2, 1) ?>조회</a></span>
				<?php if ($is_good) { ?>
					<span class='bl-hit hidden-sm hidden-xs'><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천</a></span>
				<?php } ?>
				<?php if ($is_nogood) { ?>
					<span class='bl-hit hidden-sm hidden-xs'><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천</a></span>
				<?php } ?>
				</span>
			</div>
			<div class='bo-shdow-wrap'>
				<div class='bo-shadow'><img src='<?=$board_skin_url?>/img/shadow.png'></div>
			</div>
			<ul class='list-body'>
				<?
				for ($i=0; $i<count($list); $i++) {

					$tr_class="";

					if ($list[$i]['is_notice']){ // 공지사항
						$tr_class='is_notice';
						$td_data="<div class='td-notice'>Notice</div>";
					}else if($wr_id==$list[$i]['wr_id']){
						$td_data="<span class='td-view'>열람중</span>";
					}else{
						$td_data=$list[$i]['num'];
					}

					echo "<li class='list-item $tr_class'>";
					
					if ($is_checkbox){
						echo "<div class='bl-chk'>";
						echo "<input type='checkbox' name='chk_wr_id[]' value='{$list[$i][wr_id]}' id='chk_wr_id_{$i}'>";
						echo "<label for='chk_wr_id_{$i}' class='empty-label'></label>";
						echo "</div>";
					}
					echo "<div class='bl-no hidden-xs'>";
					echo $td_data;
					echo "</div>";
					echo "<div class='bl-title'>";
					echo "<div class='subj'>";
					echo $list[$i]['icon_reply']." ";
					if ($is_category && $list[$i]['ca_name']){
						echo "<span class='title-cate'>[<a href='{$list[$i][ca_name_href]}'>{$list[$i][ca_name]}</a>]</span>";
					}
					echo "<a href='{$list[$i][href]}'>";

					if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new']." ";
					if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot']." ";
					if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file']." ";
					if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link']." ";
					if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret']." ";

					echo " ".$list[$i]['subject'];

					if ($list[$i]['comment_cnt']) {
						echo "<span class='cmt'>[".$list[$i]['comment_cnt']."]</span>";
					}
					echo "</a>";
					echo "</div>";
					echo "<div class='bl-title-i hidden-md hidden-lg'>";
					echo "<span class='bl-sub-info hidden-sm'><b>{$list[$i][name]}</b></span>";
					echo "<span class='bl-sub-info hidden-sm'><i class='fa fa-calendar'></i> {$list[$i][datetime2]}</span>";
					echo "<span class='bl-sub-info hidden-md'><i class='fa fa-eye'></i> {$list[$i][wr_hit]}</span>";
					if ($is_good) echo "<span class='bl-sub-info hidden-md'><i class='fa fa-thumbs-o-up'></i> {$list[$i][wr_good]}</span>";
					if ($is_nogood) echo "<span class='bl-sub-info hidden-md'><i class='fa fa-thumbs-o-down'></i> {$list[$i][wr_nogood]}</span>";
					echo "</div>";
					echo "</div>";
					echo "<div class='bl-name hidden-xs'>{$list[$i][name]}</div>";
					echo "<div class='bl-date hidden-xs'>{$list[$i][datetime2]}</div>";
					echo "<div class='bl-hit hidden-sm hidden-xs'>{$list[$i][wr_hit]}</div>";
					if ($is_good) {
						echo "<div class='bl-hit hidden-sm hidden-xs'>{$list[$i][wr_good]}</div>";
					}
					if ($is_nogood) {
						echo "<div class='bl-hit hidden-sm hidden-xs'>{$list[$i][wr_nogood]}</div>";
					}
					echo "</li>";
				}
				?>
			</ul>
			<div class='clearfix'></div>

			<?
			if (count($list) == 0) {
				echo "<div class='nodata'>게시물이 없습니다.</div>";
			}

			if ($list_href || $is_checkbox || $write_href) {
				echo "<div class='btn_bo_user' style='margin:10px 0 50px 0;'>";
				echo "<div class='btn_gr_l'>";
				echo "<div class='btn-group'>";
				if ($is_checkbox) {
					echo "<button type='submit' name='btn_submit' class='btn btn-sm btn-white' onclick='document.pressed=this.value' value='선택이동'>";
					echo "<i class='fa fa-arrows'></i> <span class='hidden-sm hidden-xs'>선택이동</span>";
					echo "</button>";
					echo "<button type='submit' name='btn_submit' class='btn btn-sm btn-white' onclick='document.pressed=this.value' value='선택복사'>";
					echo "<i class='fa fa-clipboard'></i> <span class='hidden-sm hidden-xs'>선택복사</span>";
					echo "</button>";
					echo "<button type='submit' name='btn_submit' class='btn btn-sm btn-white' onclick='document.pressed=this.value' value='선택삭제'>";
					echo "<i class='fa fa-times'></i> <span class='hidden-sm hidden-xs'>선택삭제</span>";
					echo "</button>";
				}
				echo "</div>";
				echo "</div>";
				echo "<div class='btn_gr_r'>";
				echo "<div class='btn-group btn-group-sm'>";
				if ($list_href || $write_href) {
					if ($list_href) {
						echo "<a href='$list_href' class='btn btn-sm btn-white'><i class='fa fa-bars'></i> <span class='hidden-sm hidden-xs'>목록</span></a> ";
					}
					if ($write_href) {
						echo "<a href='$write_href' class='btn btn-sm btn-dark'><i class='fa fa-pencil'></i> <span class='hidden-sm hidden-xs'> 글쓰기</span></a>";
					}
				}
				echo "</div>";
				echo "</div>";
				echo "<div class='cl'></div>";
				echo "</div>";
			}
			?>
			</div>
		</form>
	</div>

	<?php echo $write_pages;  ?>
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
</div>

<script type='text/javascript' src='<?=$board_skin_url?>/selectric/jquery.selectric.js'></script>
<script type='text/javascript'>
$(document).ready(function(){
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
});
</script>

<?php if ($is_checkbox) { ?>
<script type='text/javascript'>
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