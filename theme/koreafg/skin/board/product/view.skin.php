<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

$board[bo_gallery_view_width]=730;
$board[bo_gallery_view_height]=487;

if ($view['link']) {
	// 링크
	for ($i=1; $i<=count($view['link']); $i++) {
		if ($view['link'][$i]) {
			$attach_list .= '<a class="list-group-item break-word" href="'.$view['link_href'][$i].'" target="_blank">';
			$attach_list .= '<i class="fa fa-link"></i> '.cut_str($view['link'][$i], 70).' &nbsp;<span class="blue">+ '.$view['link_hit'][$i].'</span></a>'.PHP_EOL;
		}
	}
}

// 가변 파일
$j = 0;
if ($view['file']['count']) {
	for ($i=0; $i<count($view['file']); $i++) {
		if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
			if ($board['bo_download_point'] < 0 && $j == 0) {
				$attach_list .= '<a class="list-group-item"><i class="fa fa-bell red"></i> 다운로드시 <b>'.number_format(abs($board['bo_download_point'])).'</b>포인트 차감 (최초 1회 / 재다운로드시 차감없음)</a>'.PHP_EOL;
			}
			$file_tooltip = '';
			if($view['file'][$i]['content']) {
				$file_tooltip = ' data-original-title="'.strip_tags($view['file'][$i]['content']).'" data-toggle="tooltip"';
			}
			$attach_list .= '<a class="list-group-item break-word view_file_download at-tip" href="'.$view['file'][$i]['href'].'"'.$file_tooltip.'>';
			$attach_list .= '<span class="pull-right hidden-xs text-muted"><i class="fa fa-clock-o"></i> '.date("Y.m.d H:i", strtotime($view['file'][$i]['datetime'])).'</span>';
			$attach_list .= '<i class="fa fa-download"></i> '.$view['file'][$i]['source'].' ('.$view['file'][$i]['size'].') &nbsp;<span class="orangered">+ '.$view['file'][$i]['download'].'</span></a>'.PHP_EOL;
			$j++;
		}
	}
}
?>
<link rel="stylesheet" href="<?=$board_skin_url?>/style.css" media="screen">
<div class='view-wrap'>
	<div class='row'>
		<div class='col-md-7'>
			<div class="owl-carousel product-carousel">
			<?
			$sql = " select bf_file from {$g5['board_file_table']}
			where bo_table = '$bo_table'
			and wr_id = '$view[wr_id]'
			and bf_type between '1'
			and '3'
			order by bf_no asc ";
			$res=sql_query($sql);

			for($i=0; $row = sql_fetch_array($res); $i++){
				if($row['bf_file']){
					$filepath = G5_DATA_PATH.'/file/'.$bo_table;
					$thumb = thumbnail($row[bf_file], $filepath, $filepath, $board['bo_gallery_view_width'], $board['bo_gallery_view_height'], false, true);
					echo "<div class='item'><img src='".G5_DATA_URL.'/file/'.$bo_table.'/'.$thumb."' style='width:100%;'></div>";

					$img_list[]=G5_DATA_URL.'/file/'.$bo_table.'/'.$thumb;
				}
			}

			if($i==0){
				echo "<div class='item'><img src='$board_skin_url/img/noimage.png' class='img-fluid'></div>";
			}
			?>
			</div>
			<div class='product-thumb'>
				<div class='arw arw-l'><a href='#prev' class='prev-item'><i class='fa fa-long-arrow-left'></i></a></div>
				<div class='thumb-wrap'>
					<div class='owl-carousel thumb-carousel'>
					<?
					for($i=0; $i<count($img_list); $i++){
						echo "<div class='item' data-idx='{$i}'><img src='{$img_list[$i]}' class='img-fluid'></div>";
					}
					?>
					</div>
				</div>
				<div class='arw arw-r'><a href='#next' class='next-item'><i class='fa fa-long-arrow-right'></i></a></div>
			</div>
		</div>
		<div class='col-sm-12 hidden-md hidden-lg ht'></div>
		<div class='col-md-5'>
			<div class='view-subj board-view-subj'><? echo $view[wr_subject]; ?></div>
			<ul class='product-list'>
				<? if($view[ca_name]){ ?>
				<li>
					<span class='t'>분류</span>
					<span class='c'><?=$view[ca_name]?></span>
				</li>
				<? 
				}

				for($b=2; $b<=10; $b++){
					$bo_subj=$board["bo_{$b}_subj"];

					if($bo_subj){
						$bo_name="wr_".$b;
						$bo_data=$view[$bo_name];
						echo "<li>";
						echo "<span class='t'>$bo_subj</span>";
						echo "<span class='c'>$bo_data</span>";
						echo "</li>";
					}
				}
				?>
			</ul>
			<?
			// SNS 보내기
			if ($board['bo_use_sns']) {
				echo "<div class='sns-icon-box'>";
				include $board_skin_path.'/sns.skin.php';
				echo "</div>";
			}
			?>
		</div>
	</div>

	<div class='view-content-wrap'>
		<div class='view-detail-subj'>상세 상품 설명</div>
		<?
		if($attach_list) {
			echo '<div class="list-group'.$view_font.'">'.$attach_list.'</div>'.PHP_EOL;
		}
		?>
		<?=$view[wr_content]?>
	</div>

	<div class="dropdown text-right visible-xs dropup" style='margin-top:50px;'>
		<button class="btn btn-white btn-sm dropdown-toggle" type="button" id="view-btn-group" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class='fa fa-cog'></i>
		</button>
		<a href="<?php echo $list_href ?>" class="btn btn-info btn-sm">
			<i class="fa fa-bars"></i><span class="hidden-xs"> 목록</span>
		</a>
		<?php if ($write_href) { ?>
			<a href="<?php echo $write_href ?>" class="btn btn-dark btn-sm"<?php echo $modal_target;?>>
				<i class="fa fa-pencil"></i> 글쓰기
			</a>
		<?php } ?>
		<div class="dropdown-menu" aria-labelledby="view-btn-group">
			<?php if ($prev_href) { ?>
				<a href="<?php echo $prev_href.$modal_query; ?>" class="dropdown-item" title="이전글">
					<i class="fa fa-chevron-circle-left"></i> 이전
				</a>
			<?php } ?>
			<?php if ($next_href) { ?>
				<a href="<?php echo $next_href.$modal_query; ?>" class="dropdown-item" title="다음글">
					<i class="fa fa-chevron-circle-right"></i> 다음
				</a>
			<?php } ?>
			<?php if ($copy_href) { ?>
				<a href="<?php echo $copy_href ?>" class="dropdown-item" onclick="board_move(this.href); return false;" title="복사">
					<i class="fa fa-clipboard"></i> 복사
				</a>
			<?php } ?>
			<?php if ($move_href) { ?>
				<a href="<?php echo $move_href ?>" class="dropdown-item" onclick="board_move(this.href); return false;" title="이동">
					<i class="fa fa-share"></i> 이동
				</a>
			<?php } ?>
			<?php if ($delete_href) { ?>
				<a href="<?php echo $delete_href ?>" class="dropdown-item" title="삭제" onclick="del(this.href); return false;">
					<i class="fa fa-times"></i> 삭제
				</a>
			<?php } ?>
			<?php if ($update_href) { ?>
				<a href="<?php echo $update_href ?>" class="dropdown-item" title="수정">
					<i class="fa fa-plus"></i> 수정
				</a>
			<?php } ?>					
			<?php if ($scrap_href) { ?>
				<a href="<?php echo $scrap_href;  ?>" target="_blank" class="dropdown-item" onclick="win_scrap(this.href); return false;" title='스크랩'>
					<i class="fa fa-paperclip"></i> 스크랩
				</a>
			<?php } ?>
			<?php if ($search_href) { ?>
				<a href="<?php echo $search_href ?>" class="dropdown-item">
					<i class="fa fa-search"></i> 검색
				</a>
			<?php } ?>
			<?php if ($reply_href) { ?>
				<a href="<?php echo $reply_href ?>" class="dropdown-item"<?php echo $modal_target;?>>
					<i class="fa fa-commenting"></i> 답변
				</a>
			<?php } ?>
		</div>
	</div>

	<div class="text-right hidden-xs" style='margin-top:50px;'>
		<div class="btn-group" role="group">
			<?php if ($prev_href) { ?>
				<a role="button" href="<?php echo $prev_href.$modal_query; ?>" class="btn btn-white btn-sm" title="이전글">
					<i class="fa fa-chevron-circle-left"></i><span class="hidden-xs"> 이전</span>
				</a>
			<?php } ?>
			<?php if ($next_href) { ?>
				<a role="button" href="<?php echo $next_href.$modal_query; ?>" class="btn btn-white btn-sm" title="다음글">
					<i class="fa fa-chevron-circle-right"></i><span class="hidden-xs"> 다음</span>
				</a>
			<?php } ?>
			<?php if ($copy_href) { ?>
				<a role="button" href="<?php echo $copy_href ?>" class="btn btn-white btn-sm" onclick="board_move(this.href); return false;" title="복사">
					<i class="fa fa-clipboard"></i><span class="hidden-xs"> 복사</span>
				</a>
			<?php } ?>
			<?php if ($move_href) { ?>
				<a role="button" href="<?php echo $move_href ?>" class="btn btn-white btn-sm" onclick="board_move(this.href); return false;" title="이동">
					<i class="fa fa-share"></i><span class="hidden-xs"> 이동</span>
				</a>
			<?php } ?>
			<?php if ($delete_href) { ?>
				<a role="button" href="<?php echo $delete_href ?>" class="btn btn-white btn-sm" title="삭제" onclick="del(this.href); return false;">
					<i class="fa fa-times"></i><span class="hidden-xs"> 삭제</span>
				</a>
			<?php } ?>
			<?php if ($update_href) { ?>
				<a role="button" href="<?php echo $update_href ?>" class="btn btn-white btn-sm" title="수정">
					<i class="fa fa-plus"></i><span class="hidden-xs"> 수정</span>
				</a>
			<?php } ?>					
			<?php if ($scrap_href) { ?>
				<a role="button" href="<?php echo $scrap_href;  ?>" target="_blank" class="btn btn-white btn-sm" onclick="win_scrap(this.href); return false;" title='스크랩'>
					<i class="fa fa-paperclip"></i><span class="hidden-xs"> 스크랩</span>
				</a>
			<?php } ?>
			<?php if ($search_href) { ?>
				<a role="button" href="<?php echo $search_href ?>" class="btn btn-white btn-sm">
					<i class="fa fa-search"></i><span class="hidden-xs"> 검색</span>
				</a>
			<?php } ?>
				<a role="button" href="<?php echo $list_href ?>" class="btn btn-white btn-sm">
					<i class="fa fa-bars"></i><span class="hidden-xs"> 목록</span>
				</a>
			<?php if ($reply_href) { ?>
				<a role="button" href="<?php echo $reply_href ?>" class="btn btn-white btn-sm"<?php echo $modal_target;?>>
					<i class="fa fa-commenting"></i><span class="hidden-xs"> 답변</span>
				</a>
			<?php } ?>
			<?php if ($write_href) { ?>
				<a role="button" href="<?php echo $write_href ?>" class="btn btn-dark btn-sm"<?php echo $modal_target;?>>
					<i class="fa fa-pencil"></i><span class="hidden-xs"> 글쓰기</span>
				</a>
			<?php } ?>
		</div>
	</div>
</div>

<script type='text/javascript'>
var prd_owl=$('.product-carousel');
var thumb_owl=$('.thumb-carousel');

$(document).ready(function(){
	prd_owl.owlCarousel({
		loop: true,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1000: {
				items: 1
			}
		}
	});

	thumb_owl.owlCarousel({
		margin:5,
		loop: true,
		autoplay:false,
		responsive: {
			0: {
				items: 2
			},
			600: {
				items: 3
			},
			1000: {
				items: 5
			}
		}
	});

	$(document).on("click",".product-thumb a",function(){
		if($(this).hasClass("prev-item")){
			thumb_owl.trigger('prev.owl.carousel');
		}else{
			thumb_owl.trigger('next.owl.carousel');
		}
	});
	
	$(document).on("click",".product-thumb .item",function(){
		var idx=$(this).data("idx");

		prd_owl.trigger('to.owl.carousel',idx);
	});
});
</script>