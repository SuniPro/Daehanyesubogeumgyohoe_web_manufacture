<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

$attach_list = '';
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
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<div>
	<div class="view-wrap">
		<section>
			<article>
				

				<div class="view-padding">
					<?php
						// 이미지 상단 출력
						$v_img_count = count($view['file']);
						if($v_img_count) {
							echo '<div class="view-img">'.PHP_EOL;
							for ($i=0; $i<=count($view['file']); $i++) {
								if ($view['file'][$i]['view']) {
									echo get_view_thumbnail($view['file'][$i]['view']);
								}
							}
							echo '</div>'.PHP_EOL;
						}
					 ?>

					<div itemprop="description" class="view-content">
						<?php echo get_view_thumbnail($view['content']); ?>
						<audio src="<?php echo G5_DATA_URL.'/file/'.$bo_table.'/'.$view['file'][0]['file']?>" controls autoplay loop><?php echo $view['wr_subject'] ?></audio>
					</div>
				</div>

				<?php if ($good_href || $nogood_href) { ?>
					<div class="print-hide" style='text-align:center;'>
						<?php if ($good_href) { ?>
							<a role='button' href="<?php echo $good_href.'&amp;'.$qstr ?>" id="good_button" class="btn btn-primary btn-sm"><i class="fa fa-thumbs-up"></i> <strong><?php echo number_format($view['wr_good']) ?></strong></a>
						<?php } ?>
						<?php if ($nogood_href) { ?>
							<a role='button' href="<?php echo $nogood_href.'&amp;'.$qstr ?>" id="nogood_button" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-down"></i> <strong><?php echo number_format($view['wr_nogood']) ?></strong></a>
						<?php } ?>
						<div class='good_nogood_msg' style='padding:15px 0;'></div>
					</div>
				<?php } else { //여백주기 ?>
					<div class="h40"></div>
				<?php } ?>

				<?php
				// SNS 보내기
				if ($board['bo_use_sns']) {
					echo "<div class='sns-icon-box'>";
					include_once($board_skin_path.'/sns.skin.php');
					echo "</div>";
				}
				?>
				
				<div class="view-author-none"></div>
			</article>
		</section>

		
	</div>
</div>

<script type='text/javascript'>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}

$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
	$("#good_button, #nogood_button").click(function() {
        excute_good(this.href, $(this));
        return false;
    });

    // 이미지 리사이즈
    $(".view-content").viewimageresize();
});

function excute_good(href, $el)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($el.attr("id")=='nogood_button') {
                    $(".good_nogood_msg").html("<i class='fa fa-thumbs-down'> 이 글을 비추천하셨습니다.");
                    $(".good_nogood_msg").fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $(".good_nogood_msg").html("<i class='fa fa-thumbs-up'> 이 글을 추천하셨습니다.");
                    $(".good_nogood_msg").fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>