<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$write_pages = get_paging_custom(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "?gr_id={$gr_id}&amp;view={$view}&amp;mb_id={$mb_id}&amp;page=");

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$new_skin_url.'/style.css">', 0);
?>

<div class="list-tsearch">
	<form name="fnew" method="get">
		<div class="row">
			<div class="col-md-2 col-sm-6">
				<div class="form-group">
					<?php echo str_replace('id="gr_id"','id="gr_id" class="form-control form-control-sm"',$group_select) ?>
				</div>
			</div>
			<div class="col-md-2 col-sm-6">
				<div class="form-group">
					<div class="form-group">
						<select name="view" id="view" class="form-control form-control-sm">
						<option value="">전체게시물
						<option value="w">원글만
						<option value="c">코멘트만
					</select>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" name="mb_id" value="<?php echo $mb_id ?>" id="mb_id" class="form-control form-control-sm" maxlength="20" placeholder="검색어">
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<button type="submit" class="btn btn-dark btn-sm btn-block"><i class="fa fa-search"></i> 검색</button>
				</div>
			</div>
		</div>
	</form>
</div>

<form name="fnewlist" method="post" action="#" onsubmit="return fnew_submit(this);">
<input type="hidden" name="sw"       value="move">
<input type="hidden" name="view"     value="<?php echo $view; ?>">
<input type="hidden" name="sfl"      value="<?php echo $sfl; ?>">
<input type="hidden" name="stx"      value="<?php echo $stx; ?>">
<input type="hidden" name="bo_table" value="<?php echo $bo_table; ?>">
<input type="hidden" name="page"     value="<?php echo $page; ?>">
<input type="hidden" name="pressed"  value="">
<div class='new-head board-list-top-line'>
	<?php if ($is_admin) { ?>
	<span class="new-row-chk"><input type="checkbox" id="all_chk"><label for='all_chk' class='empty-label'></label></span>
	<? } ?>
	<span class='new-row-gr hidden-xs'>그룹</span>
	<span class='new-row-title'>제목</span>
	<span class='new-row-name hidden-sm hidden-xs'>이름</span>
	<span class='new-row-date hidden-sm hidden-xs'>일시</span>
</div>
<div class='new-shdow-wrap'>
	<div class='new-shadow'><img src='<?=$new_skin_url?>/img/shadow.png'></div>
</div>
<ul class='new-body'>
<?php
for($i=0; $i<count($list); $i++){
	$num = $total_count - ($page - 1) * $config['cf_page_rows'] - $i;

	echo "<li class='new-item'>";
	if($is_admin){
		echo "<div class='new-row-chk'>";
		echo "<input type='checkbox' name='chk_bn_id[]' value='{$i}' id='chk_bn_id_{$i}'>";
		echo "<label for='chk_bn_id_{$i}' class='empty-label'></label>";
		echo "<input type='hidden' name='bo_table[{$i}]' value='{$list[$i][bo_table]}'>";
		echo "<input type='hidden' name='wr_id[{$i}]' value='{$list[$i][wr_id]}'>";
		echo "</div>";
	}

	echo "<div class='new-row-gr d-block d-sm-none'>";
	echo "<a href='./new.php?gr_id={$list[$i][gr_id]}'>{$list[$i][gr_subject]}</a>";
	echo "</div>";
	echo "<div class='new-row-title'>";

	echo "<a href='{$list[$i][href]}' class='ellipsis b-subj'><span class='text-danger'>{$list[$i][comment]}</span>{$list[$i][wr_subject]}</a>";

	echo "<div class='new-row-title-s'>";
	echo "<span class='d-md-none d-lg-none rp'>{$list[$i][name]}</span>";
	echo "<span class='d-block d-sm-none'>";
	echo "<a href='./new.php?gr_id={$list[$i][gr_id]}'>";
	echo $list[$i][gr_subject];
	echo "</a> ";
	echo "<i class='fa fa-angle-right'></i> ";
	echo "</span>";
	echo "<span class='rp'>";
	echo "<a href='./board.php?bo_table={$list[$i][bo_table]}'><i class='fa fa-window-maximize'></i> {$list[$i][bo_subject]}</a>";
	echo "</span>";
	echo "<span class='hidden-md hidden-lg'><i class='fa fa-clock-o'></i> {$list[$i][datetime2]}</span>";
	echo "</div>";
	echo "</div>";
	echo "<div class='new-row-name hidden-sm hidden-xs'>";
	echo $list[$i]['name'];
	echo "</div>";
	echo "<div class='new-row-date hidden-sm hidden-xs'>";
	echo $list[$i]['datetime2'];
	echo "</div>";
	echo "</li>";
}
?>
</ul>

<? if ($is_admin) { ?>
<button type='submit' name='btn_submit' class='btn btn-white btn-sm' onclick='document.pressed=this.value' value='선택삭제' style='margin-top:10px;'>
<i class='fa fa-times'></i> <span class='hidden-sm hidden-xs'>선택삭제</span>
</button>
<? } ?>
</form>

<script type='text/javascript'>
document.getElementById("gr_id").value = "<?php echo $gr_id ?>";
document.getElementById("view").value = "<?php echo $view ?>";
</script>

<?php if ($is_admin) { ?>
<script>
$(function(){
    $('#all_chk').on("click",function(){
         $('[name="chk_bn_id[]"]').prop('checked', $(this).is(":checked"));
    });
});

function fnew_submit(f)
{
    f.pressed.value = document.pressed;

    var cnt = 0;
    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_bn_id[]" && f.elements[i].checked)
            cnt++;
    }

    if (!cnt) {
        alert(document.pressed+"할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if (!confirm("선택한 게시물을 정말 "+document.pressed+" 하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다")) {
        return false;
    }

    f.action = "./new_delete.php";

    return true;
}
</script>
<?php } ?>

<?php echo $write_pages ?>
<!-- } 전체게시물 목록 끝 -->