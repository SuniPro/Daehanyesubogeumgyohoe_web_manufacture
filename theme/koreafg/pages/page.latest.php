<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');
?>
<link rel="stylesheet" href="<?=G5_THEME_URL?>/pages/style.css">

<div class='page-subj'>일반 목록형</div>
<div class='row'>
	<div class='col-xl-4 col-lg-4' style='margin-top:20px;'>
		<?=latest("theme/list","notice",5)?>
	</div>

	<div class='col-xl-4 col-lg-4' style='margin-top:20px;'>
		<?=latest("theme/list","recult",5)?>
	</div>

	<div class='col-xl-4 col-lg-4' style='margin-top:20px;'>
		<?=latest("theme/list","webzine",5)?>
	</div>
</div>

<div class='page-subj' style='margin-top:80px;padding:0;'>일반 목록형 - 2</div>
<div class='row'>
	<div class='col-xl-4 col-lg-4' style='margin-top:20px;'>
		<?=latest("theme/list_date","notice",2)?>
	</div>
	<div class='col-xl-8 col-lg-8' style='margin-top:20px;'>
		<?=latest("theme/list_date_slide","recult",10)?>
	</div>
</div>

<div class='page-subj' style='margin-top:80px;padding:0;'>갤러리형</div>
<div class='row'>
	<div class='col-xl-4 col-lg-4' style='margin-top:20px;'>
		<?=latest("theme/gallery","gallery",5)?>
	</div>

	<div class='col-xl-4 col-lg-4' style='margin-top:20px;'>
		<?=latest("theme/gallery","product",5)?>
	</div>

	<div class='col-xl-4 col-lg-4' style='margin-top:20px;'>
		<?=latest("theme/gallery","webzine",5)?>
	</div>
</div>

<div class='row' style='margin-top:40px;padding:0;'>
	<div class='col-xl-12 col-lg-12' style='margin-top:20px;'>
		<?=latest("theme/gallery_full","gallery",5)?>
	</div>
</div>

<div class='page-subj' style='margin-top:80px;padding:0;'>갤러리 큐브형</div>
<?=latest("theme/gallery_max","gallery",20)?>

<div class='page-subj' style='margin-top:80px;padding:0;'>웹진형</div>
<div class='row'>
	<div class='col-xl-4 col-lg-4' style='margin-top:20px;'>
		<?=latest("theme/webzine","gallery",3)?>
	</div>

	<div class='col-xl-4 col-lg-4' style='margin-top:20px;'>
		<?=latest("theme/webzine","product",3)?>
	</div>

	<div class='col-xl-4 col-lg-4' style='margin-top:20px;'>
		<?=latest("theme/webzine","webzine",3)?>
	</div>
</div>

<div class='row' style='margin-top:40px;padding:0;'>
	<div class='col-xl-6 col-lg-6' style='margin-top:20px;'>
		<?=latest("theme/webzine","gallery",3)?>
	</div>

	<div class='col-xl-6 col-lg-6' style='margin-top:20px;'>
		<?=latest("theme/webzine","product",3)?>
	</div>
</div>

<div class='page-subj' style='margin-top:80px;padding:0;'>웹진형 - 2</div>
<?=latest("theme/webzine_date","gallery",20)?>

<div class='page-subj' style='margin-top:80px;padding:0;'>이미지 강조형</div>
<div class='row'>
	<div class='col-xl-4 col-lg-4' style='margin-top:20px;'>
		<?=latest("theme/img","gallery",6)?>
	</div>

	<div class='col-xl-4 col-lg-4' style='margin-top:20px;'>
		<?=latest("theme/img","product",6)?>
	</div>

	<div class='col-xl-4 col-lg-4' style='margin-top:20px;'>
		<?=latest("theme/img","webzine",6)?>
	</div>
</div>

<div class='row' style='margin-top:40px;padding:0;'>
	<div class='col-xl-6 col-lg-6' style='margin-top:20px;'>
		<?=latest("theme/img","gallery",6)?>
	</div>

	<div class='col-xl-6 col-lg-6' style='margin-top:20px;'>
		<?=latest("theme/img","product",6)?>
	</div>

</div>

<div class='page-subj' style='margin-top:80px;padding:0;'>혼합형</div>
<div class='row'>
	<div class='col-xl-4 col-lg-4' style='margin-top:20px;'>
		<?=latest("theme/img_list","gallery",6)?>
	</div>

	<div class='col-xl-4 col-lg-4' style='margin-top:20px;'>
		<?=latest("theme/img_list","movie",6)?>
	</div>

	<div class='col-xl-4 col-lg-4' style='margin-top:20px;'>
		<?=latest("theme/img_list","webzine",6)?>
	</div>
</div>

<div class='row' style='margin-top:40px;padding:0;'>
	<div class='col-xl-6 col-lg-6' style='margin-top:20px;'>
		<?=latest("theme/img_list","gallery",6)?>
	</div>

	<div class='col-xl-6 col-lg-6' style='margin-top:20px;'>
		<?=latest("theme/img_list","product",6)?>
	</div>
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>