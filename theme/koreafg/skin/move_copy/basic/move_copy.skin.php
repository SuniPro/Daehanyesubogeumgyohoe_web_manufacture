<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

add_stylesheet('<link rel="stylesheet" href="'.SW_MOVE_COPY_SKIN_URL.'/style.css">', 0);
?>

<div class="sub-title">
	<i class="fa fa-commenting-o"></i> <?php echo $g5['title'];?>
</div>

<div class='alert alert-default' role='alert'>
	<?php echo $act ?>할 게시판을 한개 이상 선택하여 주십시오.
</div>

<form name="fboardmoveall" method="post" action="./move_update.php" onsubmit="return fboardmoveall_submit(this);">
<input type="hidden" name="sw" value="<?php echo $sw ?>">
<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
<input type="hidden" name="wr_id_list" value="<?php echo $wr_id_list ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
<input type="hidden" name="stx" value="<?php echo $stx ?>">
<input type="hidden" name="spt" value="<?php echo $spt ?>">
<input type="hidden" name="sst" value="<?php echo $sst ?>">
<input type="hidden" name="sod" value="<?php echo $sod ?>">
<input type="hidden" name="page" value="<?php echo $page ?>">
<input type="hidden" name="act" value="<?php echo $act ?>">
<input type="hidden" name="url" value="<?php echo get_text(clean_xss_tags($_SERVER['HTTP_REFERER'])); ?>">

	<div class='container'>
		<table class='table'>
		<thead>
			<tr>
				<th scope="col">
					<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
					<label for="chkall" class="empty-label"><span class='sound_only'>현재 페이지 게시판 전체</span></label>
				</th>
				<th scope="col">게시판</th>
			</tr>
		</thead>
		<tbody>
			<?php for ($i=0; $i<count($list); $i++) {
			$atc_mark = '';
			$atc_bg = '';
			if ($list[$i]['bo_table'] == $bo_table) { // 게시물이 현재 속해 있는 게시판이라면
			$atc_mark = '<span class="copymove_current">현재<span class="sound_only">게시판</span></span>';
			$atc_bg = 'copymove_currentbg';
			}
			?>
			<tr class="<?php echo $atc_bg; ?>">
				<td class="td_chk">
					<input type="checkbox" value="<?php echo $list[$i]['bo_table'] ?>" id="chk<?php echo $i ?>" name="chk_bo_table[]">
					<label for="chk<?php echo $i ?>" class="empty-label"><span class='sound_only'><?php echo $list[$i]['bo_table'] ?></span></label>
				</td>
				<td>
					<label for="chk<?php echo $i ?>">
					<?php
					echo $list[$i]['gr_subject'] . ' &gt; ';
					$save_gr_subject = $list[$i]['gr_subject'];
					?>
					<?php echo $list[$i]['bo_subject'] ?> (<?php echo $list[$i]['bo_table'] ?>)
					<?php echo $atc_mark; ?>
					</label>
				</td>
			</tr>
			<?php } ?>
		</tbody>
		</table>
	</div>

	<div class="center-block text-center">
		<button type="submit" value="<?php echo $act ?>" class="btn btn-sm btn-danger" id='btn_submit'><?php echo $act ?></button>
	</div>
</form>

<br />
<br />
<br />