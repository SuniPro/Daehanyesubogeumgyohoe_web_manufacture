<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

$write_pages = get_paging_custom(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$search_query.'&amp;gr_id='.$gr_id.'&amp;srows='.$srows.'&amp;onetable='.$onetable.'&amp;page=');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$search_skin_url.'/style.css">', 0);
?>

<div class='search-area'>
	<div class="search-box">
		<form class="form" role="form" name="fsearch" onsubmit="return fsearch_submit(this);" method="get">
		<input type="hidden" name="srows" value="<?php echo $srows ?>">
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
						<label for="gr_id" class="sound_only">그룹</label>
						<select name="gr_id" id="gr_id" class="form-control form-control-sm">
							<option value="">전체그룹</option>
							<?php echo $group_option ?>
						</select>
						<script>$("#gr_id").val("<?php echo $gr_id ?>");</script>
					</div>
				</div>
				<div class="col-md-2 col-sm-6">
					<div class="form-group">
						<label for="sfl" class="sound_only">검색조건</label>
						<select name="sfl" id="sfl" class="form-control form-control-sm">
							<option value="wr_subject||wr_content"<?php echo get_selected($_GET['sfl'], "wr_subject||wr_content") ?>>제목+내용</option>
							<option value="wr_subject"<?php echo get_selected($_GET['sfl'], "wr_subject") ?>>제목</option>
							<option value="wr_content"<?php echo get_selected($_GET['sfl'], "wr_content") ?>>내용</option>
							<option value="mb_id"<?php echo get_selected($_GET['sfl'], "mb_id") ?>>회원아이디</option>
							<option value="wr_name"<?php echo get_selected($_GET['sfl'], "wr_name") ?>>이름</option>
						</select>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="form-group">
						<div class="form-group">
							<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
							<input type="text" name="stx" value="<?php echo $text_stx ?>" id="stx" required class="form-control form-control-sm" maxlength="20" placeholder="두글자 이상 입력">
						</div>
					</div>
				</div>
				<div class="col-md-2 col-sm-6">
					<div class="form-group">
						<select name="sop" id="sop" class="form-control form-control-sm">
							<option value="or"<?php echo get_selected($sop, "or") ?>>또는</option>
							<option value="and"<?php echo get_selected($sop, "and") ?>>그리고</option>
						</select>	
					</div>
				</div>
				<div class="col-md-2 col-sm-12">
					<div class="form-group">
						<button type="submit" class="btn btn-dark btn-sm btn-block"><i class="fa fa-search"></i> 검색</button>
					</div>
				</div>
			</div>
		</form>		
	</div>
<?php
if($stx){
	if($board_count){
		$sch_total=number_format($total_count);
		$str_board_list=str_replace("<li>","<div class='col-md-3'><div class='form-group'>",$str_board_list);
		$str_board_list=str_replace("</li>","</div></div>",$str_board_list);
		$str_board_list=str_replace("<a ","<a class='btn btn-white btn-sm btn-block' ",$str_board_list);

		if($sch_all) $sch_all="style='display:none'";

		echo "<div class='row'>";

        echo "<div class='col-md-3'>";
		echo "<div class='form-group'>";
		echo "<a href='?{$search_query}&amp;gr_id={$gr_id}' class='btn btn-dark btn-sm btn-block'>전체게시판 ($sch_total)</a>";
		echo "</div>";
		echo "</div>";

        echo $str_board_list;
		echo "</div>";

		$k=0;
		for($idx=$table_index, $k=0; $idx<count($search_table) && $k<$rows; $idx++){
			echo "<div class='search-item'>";
			echo "<div class='search-t'>";
			echo "<a href='./board.php?bo_table={$search_table[$idx]}&amp;{$search_query}'><strong>{$bo_subject[$idx]}</strong> 게시판 내 결과</a>";
			echo "</div>";
			
			for($i=0; $i<count($list[$idx]) && $k<$rows; $i++, $k++){
				if($list[$idx][$i]['wr_is_comment']){
					$comment_def="[댓글] ";
					$comment_href="#c_".$list[$idx][$i]['wr_id'];
					$fa_icon="commenting-o ";
				}else{
					$comment_def="";
					$comment_href="";
					$fa_icon="list-alt";
				}
				
				if($list[$idx][$i]['wr_thumb']){
					$thumb[src]=$list[$idx][$i]['wr_thumb'];
				}else{
					$thumb=get_list_thumbnail($search_table[$idx], $list[$idx][$i]['wr_id'], 100, 100,false,true); // 썸네일
				}
				echo "<div class='search-c'>";
				echo "<div class='sc-img'>";
				echo "<div class='holder'>";
				if($thumb[src]){
					echo "<img src='$thumb[src]' width=100 height=100>";
				}else{
					echo "<i class='fa fa-{$fa_icon}'></i>";
				}
				echo "</div>";
				echo "</div>";
				echo "<div class='sc-conn'>";
				echo "<div class='sc-t ellipsis'>";
				echo "<a href='{$list[$idx][$i][href]}{$comment_href}'>{$comment_def}{$list[$idx][$i][subject]}</a>";
				echo "</div>";
				echo "<div class='sc-c'>";
				echo "<a href='{$list[$idx][$i][href]}{$comment_href}'><p>{$list[$idx][$i][content]}</p></a>";
				echo "</div>";
				echo "<div class='sc-f'>";
				echo "<div class='sc-f-l'>";
				echo "<span class='users'>{$list[$idx][$i][name]}</span>";
				if($list[$idx][$i][ca_name]){
					echo "&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-tag'></i> {$list[$idx][$i][ca_name]}";
				}
				echo "&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-clock-o'></i> {$list[$idx][$i][wr_datetime]}";
				echo "</div>";
				echo "<div class='sc-f-r'>";
				echo "<a href='{$list[$idx][$i][href]}{$comment_href}' target='_blank'>+ 새창</a>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
			}
			echo "<div class='search-more'>";
			echo "<a href='./board.php?bo_table={$search_table[$idx]}&amp;{$search_query}'>";
			echo "<strong>{$bo_subject[$idx]}</strong>";
			echo " 검색 결과 더보기 <i class='fa fa-angle-double-right'></i>";
			echo "</a>";
			echo "</div>";
			echo "</div>";
		}
	}else{
		echo "<div class='nodata'>검색된 자료가 없습니다.</div>";
	}
}
?>
<?php echo $write_pages ?>
</div>

<script type='text/javascript'>
function fsearch_submit(f){
	if (f.stx.value.length < 2) {
		alert("검색어는 두글자 이상 입력하십시오.");
		f.stx.select();
		f.stx.focus();
		return false;
	}

	// 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
	var cnt = 0;
	for (var i=0; i<f.stx.value.length; i++) {
		if (f.stx.value.charAt(i) == ' ')
			cnt++;
	}

	if (cnt > 1) {
		alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
		f.stx.select();
		f.stx.focus();
		return false;
	}

	f.action = "";
	return true;
}
</script>