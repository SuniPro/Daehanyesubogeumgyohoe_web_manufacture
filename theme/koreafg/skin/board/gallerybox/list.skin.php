<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');
include $board_skin_path.'/func.lib.php';

$list_type=$board[bo_1]; //게시판 설정에서 여분필드 1의 값이 1 이면 일반목록, 2이면 일반목록-isotope, 3이면 무한스크롤, 4이면 더보기 버튼형

if(!$list_type || $list_type>4){
	$list_type=1;
}

$cols=floor(12/$board[bo_gallery_cols]);

$category_option_md = get_category_list();
$category_option = get_select_category_list();

$write_pages = get_paging_custom(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, './board.php?bo_table='.$bo_table.$qstr.'&amp;page=');
?>
<link rel="stylesheet" href="<?=$board_skin_url?>/style.css">
<link rel="stylesheet" href="<?=$board_skin_url?>/selectric/selectric.plus.css">

<script type="text/javascript" src="<?=$board_skin_url?>/jquery.isotope.js"></script>

<div class='board-list-loader-wrap'><div class='board-list-loader'></div></div>

<div id='board-container'>
	<div class="list-tsearch tsearch-top">
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

	<!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
	<div class="gallery-cate">
		<div id='category_box' style='margin-bottom:30px;height:30px;width:100%;' class='hidden-md hidden-lg'>
			<div style='width:200px;display:none;float:right;' class='category_area'>
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
	<div class='gallery-item-wrap' data-list-num="<?=$board[bo_gallery_cols]?>">
		<div class='gallery-item-row'>
		<?
		for ($i=0; $i<count($list); $i++) {
			$ca_name=md5($list[$i]['ca_name']);

			if($list[$i][wr_thumb]){
				$thumb[src]=$list[$i][wr_thumb];
				$thumb[ori]=$thumb[src];
			}else{
				$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'],'',false,false);
			}
		?>
		
		<div class="gallery-items <?=$ca_name?> img-over" data-img='<?=$thumb[ori]?>' data-url='<?=$list[$i][href]?>' data-title='<?=$list[$i][subject]?>' data-caption='<?=$list[$i][datetime2]?>' data-type='masonry' style='width:<?=(100/$board[bo_gallery_cols])?>%;'>
			<div class='border1'></div>
			<div class='gallery-item-loading-wrap'>
				<div class="gallery-spinner">
					<div class="skin-loader gallery-rect1"></div>
					<div class="skin-loader gallery-rect2"></div>
					<div class="skin-loader gallery-rect3"></div>
					<div class="skin-loader gallery-rect4"></div>
					<div class="skin-loader gallery-rect5"></div>
				</div>
			</div>
			<?
			if ($is_checkbox) {
				$idx=$list[$i][wr_id];
				echo "<div class='chk-wrap'>";
				echo "<div class='chk-item'>";
				echo "<input type='checkbox' name='chk_wr_id[]' value='{$list[$i][wr_id]}' id='chk_wr_id_{$idx}' class='item_chk'>";
				echo "<label for='chk_wr_id_{$idx}' class='empaty-label'></label>";
				echo "</div>";
				echo "</div>";
			}
			?>
			<div class="gallery-item">
				<div class="gallery-img">
					<!-- <a href="<?=$list[$i][href]?>"> -->
						<? if($thumb[src]){ ?>
						<img src="<?=$thumb[src]?>">
						<? }else{ ?>
						<img src='<?=$board_skin_url?>/img/noimage.png'>
						<? } ?>
					<!-- </a> -->
				</div>
			</div>
		</div>

		<? } ?>
		</div>
		<div class='clearfix'></div>
	</div>
	<?
	if (count($list) == 0) {
		echo "<div class='nodata'>게시물이 없습니다.</div>";
	}
	
	if($list_type==1){
		if ($list_href || $is_checkbox || $write_href) {
			echo "<div class='dropdown text-right visible-xs dropup' style='margin:10px 0 50px 0;'>";
			echo "<button class='btn btn-white btn-sm dropdown-toggle' type='button' id='list-btn-group' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
			echo "<i class='fa fa-cog'></i>";
			echo "</button>";
			if ($list_href || $write_href) {
				echo " <button type='button' class='btn btn-white btn-sm btn-search-bottom'><i class='fa fa-search'></i> <span class='hidden-sm hidden-xs'> 검색</span></button>";
				if ($list_href) {
					echo "<a href='$list_href' class='btn btn-white btn-sm'><i class='fa fa-bars'></i> <span class='hidden-sm hidden-xs'>목록</span></a> ";
				}
				if ($write_href) {
					echo "<a href='$write_href' class='btn btn-dark btn-sm'><i class='fa fa-pencil'></i> <span class='hidden-sm hidden-xs'> 글쓰기</span></a>";
				}
			}
			
			echo "<div class='dropdown-menu' aria-labelledby='list-btn-group'>";
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
			}
			echo "</div>";
			echo "</div>";

			echo "<div class='btn_bo_user hidden-xs' style='margin:10px 0 50px 0;'>";
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
			if ($list_href || $write_href) {
				if ($list_href) {
					echo "<a href='$list_href' class='btn btn-white btn-sm '><i class='fa fa-bars'></i> <span class='hidden-sm hidden-xs'>목록</span></a> ";
				}
				if ($write_href) {
					echo "<a href='$write_href' class='btn btn-dark btn-sm'><i class='fa fa-pencil'></i> <span class='hidden-sm hidden-xs'> 글쓰기</span></a>";
				}
				echo " <button type='button' class='btn btn-white btn-sm btn-search-bottom'><i class='fa fa-search'></i> <span class='hidden-sm hidden-xs'> 검색</span></button>";
			}
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
    }
	?>
	</form>

	<?
	if($list_type==1 || $list_type==2){
		echo $write_pages;
	}else if($list_type==3){
		include $board_skin_path.'/_inc.list.scroll.php';
	}else if($list_type==4){
		include $board_skin_path.'/_inc.list.more.php';
	}
	?>

	<div class="list-tsearch tsearch-bottom">
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
<script type="text/javascript" src="<?=$board_skin_url?>/script.js"></script>
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