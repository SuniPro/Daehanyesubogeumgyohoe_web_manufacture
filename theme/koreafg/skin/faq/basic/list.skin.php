<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once($faq_skin_path.'/func.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$faq_skin_url.'/style.css">', 0);

if ($admin_href){
    echo '<div class="admin_btn"><a href="'.$admin_href.'" class="btn btn-danger btn-sm" role="button">FAQ 수정</a></div>';
}
?>

<!-- FAQ 시작 { -->
<?php
if ($himg_src)
    echo '<div id="faq_himg" class="faq_img"><img src="'.$himg_src.'" alt=""></div>';

// 상단 HTML
echo '<div id="faq_hhtml">'.conv_content($fm['fm_head_html'], 1).'</div>';
?>

<div class="list-tsearch">
	<form class="form" role="form" name="faq_search_form" method="get">
    <input type="hidden" name="fm_id" value="<?php echo $fm_id;?>">
		<div class="row justify-content-center">
			<div class="col-md-9 col-sm-7">
				<div class="form-group input-group">
					<span class="input-group-addon"><i class="fa fa-tags"></i></span>
				    <input type="text" name="stx" value="<?php echo $stx; ?>" id="stx" class="form-control form-control-sm" placeholder="검색어">
				</div>
			</div>
			<div class="col-md-3 col-sm-5">
				<div class="form-group">
					<button type="submit" class="btn btn-dark btn-sm btn-block"><i class="fa fa-search"></i> 검색하기</button>
				</div>
			</div>
		</div>
	</form>
</div>
<!-- } 게시판 검색 끝 -->

<?php
if(count($faq_master_list) ){
?>
<aside class="faq-category">
	<div class="div-tab tabs trans-top hidden-xs">
		<ul class="pagination-tabs">
		<?php
		foreach($faq_master_list as $v){
			$category_active = '';
			if($v['fm_id'] == $fm_id){ // 현재 선택된 카테고리라면
				$category_active = ' class="active"';
			}
		?>
			<li<?php echo $category_active;?>>
			<a href="<?php echo $category_href;?>?fm_id=<?php echo $v['fm_id'];?>">
			<?php echo $category_msg.$v['fm_subject'];?>
			</a>
			</li>
		<?php }	?>
	</div>
	<div class="dropdown visible-xs">
		<a id="categoryLabel" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary btn-block">
			카테고리
		</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="categoryLabel">
		<?php
		foreach($faq_master_list as $v){
			$category_selected = '';
			if($v['fm_id'] == $fm_id){ // 현재 선택된 카테고리라면
				$category_selected = ' class="selected"';
			}
		?>
			<li<?php echo $category_selected;?>>
				<a class="dropdown-item" href="<?php echo $category_href;?>?fm_id=<?php echo $v['fm_id'];?>">
					<?php echo $category_msg.$v['fm_subject'];?>
				</a>
			</li>
		<?php }	?>
		</ul>
	</div>
</aside>
<!-- } 게시판 카테고리 끝 -->
<? } ?>

<div class='list_area'>	
	<?php // FAQ 내용
    if( count($faq_list) ){

	$i = 1;
	foreach($faq_list as $key=>$v){
                if(empty($v))
                    continue;

		$card_name='collapse-'.$i;
	?>
		<div class="card">
			<div class="card-header" role="tab" id="heading-<?php echo $i;?>" data-toggle="collapse" data-parent="#accordion" href="#<?=$card_name?>" aria-expanded="true" aria-controls="<?=$card_name?>">
				<h4 class="card-title">
				<?php echo conv_content($v['fa_subject'], 1); ?>
				</h4>
			</div>
			<div id="<?=$card_name?>" class="card-collapse collapse <? if($i==1) echo 'in'?>" role="tabcard" aria-labelledby="heading-<?php echo $i;?>">
				<div class="card-body">
				<?php echo conv_content($v['fa_content'], 1); ?>
				</div>
			</div>
		</div>
	<?php
		$i ++;
	}

    } else {
        if($stx){
            echo '<p class="empty_list">검색된 게시물이 없습니다.</p>';
        } else {
            echo '<div class="empty_list">등록된 FAQ가 없습니다.';
            if($is_admin)
                echo '<br><a href="'.G5_ADMIN_URL.'/faqmasterlist.php">FAQ를 새로 등록하시려면 FAQ관리</a> 메뉴를 이용하십시오.';
            echo '</div>';
        }
    }
    ?>
</div>

<?php echo get_paging_custom($page_rows, $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr.'&amp;page='); ?>

<?php
// 하단 HTML
echo '<div id="faq_thtml">'.conv_content($fm['fm_tail_html'], 1).'</div>';

if ($timg_src)
    echo '<div id="faq_timg" class="faq_img"><img src="'.$timg_src.'" alt=""></div>';
?>
<!-- } FAQ 끝 -->

<?php
if ($admin_href){
    echo '<div class="admin_btn"><a href="'.$admin_href.'" class="btn btn-danger btn-sm" role="button">FAQ 수정</a></div>';
}
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<script>
$(function() {
    $(".closer_btn").on("click", function() {
        $(this).closest(".con_inner").slideToggle();
    });
});

function faq_open(el)
{
    var $con = $(el).closest("li").find(".con_inner");

    if($con.is(":visible")) {
        $con.slideUp();
    } else {
        $("#faq_con .con_inner:visible").css("display", "none");

        $con.slideDown(
            function() {
                // 이미지 리사이즈
                $con.viewimageresize2();
            }
        );
    }

    return false;
}
</script>