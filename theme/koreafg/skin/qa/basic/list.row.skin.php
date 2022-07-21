<div class="list-board">
<div class="qa-head border-black board-list-top-line">
	<span class="num hidden-xs">번호</span>
	<span class="reply">답변</span>
	<span class="subject">제목</span>
	<span class="name hidden-xs">이름</span>
	<span class="date hidden-xs">날짜</span>
	<?php if ($is_checkbox) { ?>
		<span class="chk">
			<label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
			<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
		</span>
	<?php } ?>
</div>
<div class='qa-shdow-wrap'>
	<div class='qa-shadow'><img src='<?=$qa_skin_url?>/img/shadow.png'></div>
</div>
<ul id="list-container" class="board-list">
<?php
$n = $list_cnt;
for ($i=0; $i<$list_cnt; $i++) {
	$qa_date = $list[$i]['date'];
?>
<li class="list-item">
	<div class="num hidden-xs"><?php echo ($list[$i]['num']) ? $list[$i]['num'] : $n; ?></div>
	<div class="reply">
		<?php if($list[$i]['qa_status']) { ?>
			<span class="square-success">완료</span>
		<?php } else { ?>
			<span class="square-danger">대기</span>
		<?php } ?>
	</div>
	<div class="subject">
		<a href="<?php echo $list[$i]['view_href']; ?>" class="ellipsis">
			<?php echo ($list[$i]['category']) ? '<span class="square-info">'.$list[$i]['category'].'</span>' : ''; ?>
			<?php echo $list[$i]['subject']; ?>
			<?php echo $list[$i]['icon_file']; ?>
		</a>
		<div class="subj-item font-12 visible-xs">
			<span class="xs-name"><i class="fa fa-user"></i> <?php echo $list[$i]['name']; ?></span>
			<span><i class="fa fa-clock-o"></i> <?php echo $qa_date; ?></span>
		</div>
	</div>
	<div class="name hidden-xs"><?php echo $list[$i]['name']; ?></div>
	<div class="date hidden-xs"><?php echo $qa_date; ?></div>
	<?php if ($is_checkbox) { ?>
		<div class="chk">
			<label for="chk_qa_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject']; ?></label>
			<input type="checkbox" name="chk_qa_id[]" value="<?php echo $list[$i]['qa_id'] ?>" id="chk_qa_id_<?php echo $i ?>">
		</div>
	<?php } ?>
</li>
<?php $n--;} ?>
</ul>
<?php if ($i == 0) { ?>
	<div class="list-none text-center text-muted">문의글이 없습니다.</div>
<?php } ?>
</div>