<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>
<div class="card">
	<div class="card-header">
		<h3 class="card-title"><i class="fa fa-comment fa-lg lightgray"></i> <b><?php echo get_text($answer['qa_subject']); ?></b></h3>
	</div>
	<div class="card-body">
		<?php echo conv_content($answer['qa_content'], $answer['qa_html']); ?>
		<p class="text-right text-muted">
			<i class="fa fa-clock-o"></i> <?php echo date("y-m-d H:i", strtotime($answer['qa_datetime'])) ?>
		</p>
	</div>
</div>

<div class="print-hide ans-btn">
	<a href="<?php echo $rewrite_href; ?>" class="btn btn-dark btn-sm pull-left"><i class="fa fa-comments"></i> 추가질문</a>
	<?php if($answer_update_href || $answer_delete_href) { ?>
		<div class="btn-group pull-right">
			<?php if($answer_update_href) { ?>
				<a href="<?php echo $answer_update_href; ?>" class="btn btn-info btn-sm"><i class="fa fa-plus"></i> 답변수정</a>
			<?php } ?>
			<?php if($answer_delete_href) { ?>
				<a href="<?php echo $answer_delete_href; ?>" class="btn btn-danger btn-sm" onclick="del(this.href); return false;"><i class="fa fa-times"></i> 답변삭제</a>
			<?php } ?>
		</div>
	<?php } ?>
	<div class="clearfix"></div>
</div>
