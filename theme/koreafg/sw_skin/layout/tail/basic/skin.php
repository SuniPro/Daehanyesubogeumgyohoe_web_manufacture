<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" type="text/css" href="<?=$sw_skin_url?>/style.css">

<footer>
	<div class='ft-wrap'>
		<div class='ft-bg'></div>
		<div class='ft-info'>
			<div class='container'>
				<div class='row'>
					<div class='col-md-4'>
						<div class='ft-logo'><img src='<?=$sw_skin_url?>/img/logo.png'></div>
						<ul class='ft-info-1'>
							<li>
								<i class="fa fa-map-marker"></i>
								<div class="c">
								<p><?=SW_COMPANY_FULL_ADDR?></p>
								</div>
							</li>
							<li>
								<i class="fa fa-phone"></i>
								<div class="c">
								<p>Tel : <?=SW_COMPANY_TEL?></p>
								<p>Fax : <?=SW_COMPANY_FAX?></p>
								</div>
							</li>
							<li>
								<i class="fa fa-globe"></i>
								<div class="c">
								<p>Email : <?=SW_COMPANY_EMAIL?></p>
								<p>Web : <?=$_SERVER[HTTP_HOST]?></p>
								</div>
							</li>
						</ul>
					</div>
					<div class='col-md-4'>
						<div class='ft-subj'>INFOMATION</div>
						<ul class='ft-info-2'>
							<li>회사명 : <?=SW_COMPANY_NAME?></li>
							<li>대표 : 대표자명</li>
							<li>사업자등록번호 : 000-00-00000</li>
							<li>통신판매업신고번호 : 제00-서울00-0000호</li>
							<li>개인정보책임자 : 책임자명</li>
						</ul>
					</div>
					<div class='col-md-4'>
						<div class='ft-subj'>Social Network Service</div>
						<ul class='ft-sns'><? include_once("$sw_skin_path/sns.php") ?></ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class='ft-copy'>
		© Copyright 2018 by <span><?=SW_COMPANY_NAME?></span> All Rights Reserved.
	</div>
</footer>