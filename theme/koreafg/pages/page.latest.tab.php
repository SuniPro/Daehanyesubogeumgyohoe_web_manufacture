<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');
?>
<link rel="stylesheet" href="<?=G5_THEME_URL?>/pages/style.css">

<!--
탭형 최신글의 탭은 부트스트랩의 class가 사용되었습니다.
부트스트랩을 알고 계신분이시라면 수정하는데 어려움은 없으실 것입니다.

만약 이부분의 적용법을 모르시겠으면 문의 주시기 바랍니다.
지식이 얕아 글로써 설명을 잘 못하겠습니다...
-->

<!-- 탭형 최신글 -->
<div class='page-subj'>목록형 최신글 탭형</div>
<div class='row'>
	<div class='col-xl-4 col-lg-4'>
		<div style='margin-top:20px;'>
			<nav class="nav nav-tabs" id="myTab-1" role="tablist">
				<a href="#tab_notice" class="nav-item nav-link active" id="nav-tab-1" data-toggle="tab" role="tab" aria-controls="tab_notice" aria-selected="true">공지사항</a>
			</nav>

			<div class='tab-content'>
				<div class='tab-pane fade show active' role='tabpanel' id='tab_notice' aria-labelledby="tab_notice">
				<?=latest("theme/list","notice",5)?>
				</div>
			</div>
		</div>
	</div>

	<div class='col-xl-4 col-lg-4'>
		<div style='margin-top:20px;' role='tabpanel'>
			<nav class="nav nav-tabs" id="myTab-2" role="tablist">
				<a href="#tab_notice2" class="nav-item nav-link active" id="nav-tab-2" data-toggle="tab" role="tab" aria-controls="tab_notice2" aria-selected="true">공지사항</a>
				<a href="#tab_recult2" class="nav-item nav-link" id="nav-tab-3" data-toggle="tab" role="tab" aria-controls="tab_recult2" aria-selected="false">채용정보</a>
			</nav>

			<div class='tab-content'>
				<div class='tab-pane fade show active' role='tabpanel' id='tab_notice2' aria-labelledby="tab_notice2">
				<?=latest("theme/list","notice",5)?>
				</div>
				<div class='tab-pane fade' role='tabpanel' id='tab_recult2' aria-labelledby="tab_recult2">
				<?=latest("theme/list","recult",5)?>
				</div>
			</div>
		</div>
	</div>	

	<div class='col-xl-4 col-lg-4'>
		<div style='margin-top:20px;' role='tabpanel'>
			<nav class="nav nav-tabs" id="myTab-3" role="tablist">
				<a href="#tab_notice3" class="nav-item nav-link active" id="nav-tab-4" data-toggle="tab" role="tab" aria-controls="tab_notice3" aria-selected="true">공지사항</a>
				<a href="#tab_recult3" class="nav-item nav-link" id="nav-tab-5" data-toggle="tab" role="tab" aria-controls="tab_recult3" aria-selected="false">채용정보</a>
				<a href="#tab_webzine3" class="nav-item nav-link" id="nav-tab-6" data-toggle="tab" role="tab" aria-controls="tab_webzine3" aria-selected="false">채용정보</a>
			</nav>

			<div class='tab-content'>
				<div class='tab-pane fade show active' role='tabpanel' id='tab_notice3' aria-labelledby="tab_notice3">
				<?=latest("theme/list","notice",5)?>
				</div>
				<div class='tab-pane fade' role='tabpanel' id='tab_recult3' aria-labelledby="tab_recult3">
				<?=latest("theme/list","recult",5)?>
				</div>
				<div class='tab-pane fade' role='tabpanel' id='tab_webzine3' aria-labelledby="tab_webzine3">
				<?=latest("theme/list","webzine",5)?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- 탭형 최신글 섞어 쓰기 -->
<div class='page-subj' style='margin-top:80px;'>탭형 섞어쓰기</div>
<div class='row'>
	<div class='col-xl-6 col-lg-6'>
		<div style='margin-top:20px;'>
			<nav class="nav nav-tabs" id="myTab-4" role="tablist">
				<a href="#tab_notice4" class="nav-item nav-link active" id="nav-tab-7" data-toggle="tab" role="tab" aria-controls="tab_notice4" aria-selected="true">채용정보</a>
				<a href="#tab_gallery4" class="nav-item nav-link" id="nav-tab-8" data-toggle="tab" role="tab" aria-controls="tab_gallery4" aria-selected="false">갤러리</a>
				<a href="#tab_webzine4" class="nav-item nav-link" id="nav-tab-9" data-toggle="tab" role="tab" aria-controls="tab_webzine4" aria-selected="false">보도자료</a>
			</nav>

			<div class='tab-content'>
				<div class='tab-pane fade show active' role='tabpanel' id='tab_notice4' aria-labelledby="tab_notice4">
				<?=latest("theme/list","recult",7)?>
				</div>
				<div class='tab-pane fade' role='tabpanel' id='tab_gallery4' aria-labelledby="tab_gallery4">
				<?=latest("theme/img_list","gallery",5)?>
				</div>
				<div class='tab-pane fade' role='tabpanel' id='tab_webzine4' aria-labelledby="tab_webzine4">
				<?=latest("theme/webzine","webzine",3)?>
				</div>
			</div>
		</div>
	</div>

	<div class='col-xl-6 col-lg-6'>
		<div style='margin-top:20px;'>
			<nav class="nav nav-tabs" id="myTab-5" role="tablist">
				<a href="#tab_product5" class="nav-item nav-link active" id="nav-tab-10" data-toggle="tab" role="tab" aria-controls="tab_product5" aria-selected="true">제품소개</a>
				<a href="#tab_gallery5" class="nav-item nav-link" id="nav-tab-11" data-toggle="tab" role="tab" aria-controls="tab_gallery5" aria-selected="false">갤러리</a>
				<a href="#tab_webzine5" class="nav-item nav-link" id="nav-tab-12" data-toggle="tab" role="tab" aria-controls="tab_webzine5" aria-selected="false">보도자료</a>
			</nav>

			<div class='tab-content'>
				<div class='tab-pane fade show active' role='tabpanel' id='tab_product5' aria-labelledby="tab_product5">
				<?=latest("theme/webzine","product",3)?>
				</div>
				<div class='tab-pane fade' role='tabpanel' id='tab_gallery5' aria-labelledby="tab_gallery5">
				<?=latest("theme/img","gallery",6)?>
				</div>
				<div class='tab-pane fade' role='tabpanel' id='tab_webzine5' aria-labelledby="tab_webzine5">
				<?=latest("theme/img_list","webzine",6)?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>