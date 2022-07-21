<div class='top-wrap'>
	<div class="container">
		<div class='row'>
			<div class='col col-5'>
				<div class='d-none d-xl-block'>
					<ul>
						<li>
							<a href="javascript://" onclick="window.external.AddFavorite(parent.location.href,document.title);">
								<i class='fa fa-bookmark-o'></i> 북마크
							</a>
						</li>
						<li>
							<a href="<? echo (G5_IS_MOBILE) ? "tel:".SW_COMPANY_TEL : "#" ?>">
								<i class='fa fa-phone'></i> Call us: <?=SW_COMPANY_TEL?>
							</a>
						</li>
						<li>
							<a href="mailto:<?=SW_COMPANY_EMAIL?>">
								<i class='fa fa-envelope-o'></i> <?=SW_COMPANY_EMAIL?>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class='col col-7' style='text-align:right;'>
				<ul>
					<?php if ($is_member) {  ?>
					<?php if ($is_admin) {  ?>
					<li>
						<a href="<?php echo G5_ADMIN_URL ?>/index.php" target='_blank'>
							<span class='t-admin'><i class='fa fa-star'></i> 관리자</span>
						</a>
					</li>
					<? } ?>
					<!--
					<li>
						<a href="javascript:;" onclick="sidebar_open('sidebar-user');">
							<span class='t-user'><i class="fa fa-user-circle-o"></i> <?php echo $member['mb_nick'];?></span>
						</a>
					</li>
					<li>|</li>
					-->
					<li>
						<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" id="ol_after_memo" class="win_memo">
							<span class='t-user'><i class="fa fa-sticky-note-o "></i> (<?php echo number_format($memo_not_read) ?>)</span>
						</a>
					</li>
					<li>
						<a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank" id="ol_after_pt" class="win_point">
							<span class='t-user'><i class="fa fa-diamond"></i> <?php echo number_format($member['mb_point']) ?>P</span>
						</a>
					</li>
					<li>
						<a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank" id="ol_after_scrap" class="win_scrap">
							<span class='t-user'><i class="fa fa-thumb-tack"></i></span>
						</a>
					</li>
					<li>
						<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">
							<i class='fa fa-sign-in'></i> 정보수정
						</a>
					</li>
					<li>
						<a href="<?php echo G5_BBS_URL ?>/logout.php">
							<i class='fa fa-power-off'></i> 로그아웃
						</a>
					</li>
					<? }else{ ?>
					<li>
						<a href="<?php echo G5_BBS_URL ?>/register.php">
							<i class='fa fa-sign-in'></i> 회원가입
						</a>
					</li>
					<li>
						<a href="<?php echo G5_BBS_URL ?>/login.php">
							<i class='fa fa-power-off'></i> 로그인
						</a>
					</li>
					<li>
						<a href="<?php echo G5_BBS_URL ?>/password_lost.php" id="ol_password_lost">
							<i class='fa fa-search'></i> 정보찾기
						</a>
					</li>
					<? } ?>
					<li>
						<a href="<?php echo G5_BBS_URL ?>/new.php">
						<i class='fa fa-comments-o'></i> 새글
						</a>
					</li>
					<li>
						<a href="<?php echo G5_BBS_URL ?>/current_connect.php">
							<i class='fa fa-users'></i> 접속자 <?php echo connect('theme/basic'); // 현재 접속자수, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정  ?>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>