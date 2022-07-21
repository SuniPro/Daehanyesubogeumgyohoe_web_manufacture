<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$qa_skin_url.'/style.css" media="screen">', 0);

$is_view = false;
$list_cnt = count($list);

$categories = explode('|', $qaconfig['qa_category']); // 구분자가 | 로 되어 있음
$ca_cnt = count($categories);

$list_pages = preg_replace('/(\.php)(&amp;|&)/i', '$1?', get_paging_custom(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, './qalist.php'.$qstr.'&amp;page='));
?>

<section class="qa-list">
	<div class="tsearch-box">
		<form name="fsearch" method="get" role="form" class="form">
			<input type="hidden" name="sca" value="<?php echo $sca ?>">
			<div class="row justify-content-center">
				<div class="col-md-4 col-sm-7">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-search"></i></span>
							<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="form-control form-control-sm" maxlength="15" placeholder="검색어">
						</div>
					</div>
				</div>
				<div class="col-md-2 col-sm-5">
					<div class="form-group">
						<button type="submit" class="btn btn-dark btn-sm btn-block"><i class="fa fa-search"></i> 검색</button>
					</div>
				</div>
			</div>
		</form>
	</div>

	<?php if($category_option){ ?>
		<aside class="list-category">
		<div class="cate-tab tabs hidden-xs">
			<ul class="pagination-tabs">
				<li<?php echo (!$sca) ? ' class="active"' : '';?>>
					<a href="./qalist.php">
						전체<?php if(!$sca) echo '('.number_format($total_count).')';?>
					</a>
				</li>
				<?php for ($i=0; $i < $ca_cnt; $i++) { ?>
					<li<?php echo ($categories[$i] == $sca) ? ' class="active"' : '';?>>
						<a href="./qalist.php?sca=<?php echo urlencode($categories[$i]);?>">
							<?php echo $categories[$i];?><?php if($categories[$i] == $sca) echo '('.number_format($total_count).')';?>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>
		<div class="dropdown visible-xs">
			<a id="categoryLabel" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary btn-block">
				<?php echo ($sca) ? $sca : '전체';?>(<?php echo number_format($total_count);?>)
			</a>
			<ul class="dropdown-menu" role="menu" aria-labelledby="categoryLabel">
				<li<?php if(!$sca) echo ' class="selected"';?>>
					<a class='dropdown-item' href="./qalist.php">전체</a>
				</li>
				<?php for ($i=0; $i < $ca_cnt; $i++) { ?>
					<li<?php if($categories[$i] == $sca) echo ' class="selected"';?>>
						<a class='dropdown-item' href="./qalist.php?sca=<?php echo urlencode($categories[$i]);?>"><?php echo $categories[$i];?></a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</aside>
	<? } ?>

	<div class="list-wrap">
		<form name="fqalist" id="fqalist" action="./qadelete.php" onsubmit="return fqalist_submit(this);" method="post" role="form" class="form">
		<input type="hidden" name="stx" value="<?php echo $stx; ?>">
		<input type="hidden" name="sca" value="<?php echo $sca; ?>">
		<input type="hidden" name="page" value="<?php echo $page; ?>">

		<? include_once($qa_skin_path.'/list.row.skin.php'); ?>

		<div class="list-btn-box">
			<?php if ($list_href || $write_href) { ?>
				<div class="form-group pull-right list-btn">
					<div class="btn-group">
						<?php if ($list_href) { ?>
							<a href="<?php echo $list_href ?>" class="btn btn-dark btn-sm">
							<i class="fa fa-bars"></i> <span class='hidden-sm hidden-xs'>목록</span>
							</a>
						<?php } ?>
						<?php if ($write_href) { ?>
							<a href="<?php echo $write_href ?>" class="btn btn-primary btn-sm">
							<i class="fa fa-pencil"></i> <span class='hidden-sm hidden-xs'>문의하기</span>
							</a>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
			<?php if ($is_checkbox || $admin_href || $setup_href) { ?>
				<div class="form-group list-btn">
					<div class="btn-group btn-group-sm">
						<?php if ($is_checkbox) { ?>
							<button type='submit' class='btn btn-sm btn-white' onclick='document.pressed=this.value' value='선택삭제'>
							<i class='fa fa-times'></i> <span class='hidden-sm hidden-xs'>선택삭제</span>
							</button>
						<?php } ?>
						<?php if ($admin_href) { ?>
							<a href="<?php echo $admin_href ?>" class="btn btn-danger btn-sm">
								<i class="fa fa-cog"></i> <span class='hidden-sm hidden-xs'> 관리자</span>
							</a>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
			<div class="clearfix"></div>
		</div>
		</form>
	</div>

	<?php if($is_checkbox) { ?>
		<noscript>
		<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
		</noscript>
	<?php } ?>

	<div class="list-page text-center">
		<ul class="pagination pagination-sm en">
			<?=$list_pages?>
		</ul>
	</div>

	<div class="clearfix"></div>

</section>
<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fqalist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_qa_id[]")
            f.elements[i].checked = sw;
    }
}

function fqalist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_qa_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다"))
            return false;
    }

    return true;
}
</script>
<?php } ?>
