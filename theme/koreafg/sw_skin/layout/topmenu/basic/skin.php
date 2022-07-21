<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" type="text/css" href="<?=$sw_skin_url?>/style.css">
<? 
if(SW_USE_TOP_MENU=='1'){
	//include_once("$sw_skin_path/top.php");
}
?>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
<style>
/* 고통사항 */
    @media (min-width: 1200px) {
        .container { max-width: 1200px; }
    }
/* 투명 */
#header:before{background:rgba(0,0,0,.1);border-bottom:1px solid rgba(255,255,255,.08);}
#header .logo > a{background-image:url(<?=$sw_skin_url?>/img/logooff.png);}
#head_menu > li > a, .etc dd, .etc li {color:#fff;}

.all-menu > em > em, .all-menu > em > em:before, .all-menu > em > em:after{background:#fff;}
#header.active:before, #header.search-active:before, #header.fixed:before{background:#fff;border-bottom:1px solid #fff;}
#header.active .logo > a, #header.search-active .logo > a, #header.fixed .logo > a{background-image:url(<?=$sw_skin_url?>/img/logoon.png);}
#header.active #head_menu > li > a, #header.active .etc dd, #header.active .etc li #header.search-active .etc dd, #header.search-active .etc li #header.search-active #head_menu > li > a, #header.fixed #head_menu > li > a, #header.fixed .etc dd, #header.fixed .etc li {color:#000;}
#header.active .all-menu > em > em, #header.active .all-menu > em > em:before, #header.active .all-menu > em > em:after, #header.search-active .all-menu > em > em, #header.search-active .all-menu > em > em:before, #header.search-active .all-menu > em > em:after, #header.fixed .all-menu > em > em, #header.fixed .all-menu > em > em:before, #header.fixed .all-menu > em > em:after{background:#000;}
</style>

<header id="header">
    <div class="headerWrap">
        <h1 class="logo"><a href="/">큰이야기</a></h1>
        <div class="etc">
            <ul class="mn">
                <?php if ($is_member) {  ?>
				<?php if ($is_admin) {  ?>
                <li><a href="<?php echo G5_ADMIN_URL ?>/index.php"><span>관리자</span></a></li>
                <? } ?>
                <li><a href="<?php echo G5_BBS_URL ?>/logout.php"><span>로그아웃</span></a></li>
                <? }else{ ?>
                <li><a href="<?php echo G5_BBS_URL ?>/login.php"><span>로그인</span></a></li>
                <li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
                <? } ?>
                <li class="last">                    
                    <a href="javascript:void(0);" class="all-menu">
                        <span class="IR">전체메뉴</span>
                        <em>
                        <span class="sr-only">닫기버튼</span>
                        <em></em>
                        </em>
                    </a>
                </li>
            </ul>
        </div>
        
        <nav id="gnb" class="gnb gnb-default">
            <ul id="head_menu" class="topmenu">
                <?
					$tmenu=$g5[menu_list][topmenu];
					$tmenu=str_replace("[menu ","<li class='lnb2'><a ",$tmenu);
					$tmenu=str_replace(" menu]"," >",$tmenu);
					$tmenu=str_replace("[/menu]","</a></li>",$tmenu);
					$tmenu=str_replace("[submenu]","<div class='submenu'><ul class='sub10'>",$tmenu);
					$tmenu=str_replace("[/submenu]","</ul></div>",$tmenu);
					$tmenu=str_replace("[divider]","",$tmenu);
					$tmenu=str_replace("[item ","<li class='sub01'><a ",$tmenu);
					$tmenu=str_replace(" item]"," >",$tmenu);
					$tmenu=str_replace("[/item]","</a></li>",$tmenu);
					$tmenu=str_replace("[arrow]","</a>",$tmenu);
					$tmenu=str_replace("[item-arrow]","",$tmenu);
					
					echo $tmenu;
				?>
               <!--
                <li class="lnb2 mnfirst"><a href="/menu.es?mid=a11001000000">복지정보</a>
                    <div class="submenu" style="display:none;">
                        <ul class="sub10">
                            <li class="sub01 subfirst"><a href="/menu.es?mid=a11001000000">세종시 지원사업</a></li>
                            <li class="sub02"><a href="https://www.bokjiro.go.kr/ssis-teu/index.do" target="_blank" title="새창으로 이동" class="linkWindow">정부 지원사업</a></li>
                            <li class="sub03 sublast"><a href="/menu.es?mid=a11003000000">도움되는 사이트</a></li>
                        </ul>
                    </div>
                </li>  
                -->              
            </ul>
        </nav>
        <nav id="gnb_all" class="gnb all-menu-wrap">
            <div class="head-menu-wrap">
                <strong class="tit">ALL MENU</strong>
                <ul class="moblie_login">
					<li><a href="/login_search.es?sid=a1">로그인</a></li>
					<li><a href="/menu.es?mid=a11402000000">회원가입</a></li>
				</ul>
				<ul id="head_menu_all" class="topmenu_all">
                    <?
                        $tmenu=$g5[menu_list][topmenu];
                        $tmenu=str_replace("[menu ","<li class='lnb2'><a ",$tmenu);
                        $tmenu=str_replace(" menu]"," >",$tmenu);
                        $tmenu=str_replace("[/menu]","</a></li>",$tmenu);
                        $tmenu=str_replace("[submenu]","<div class='submenu'><ul class='sub10'>",$tmenu);
                        $tmenu=str_replace("[/submenu]","</ul></div>",$tmenu);
                        $tmenu=str_replace("[divider]","",$tmenu);
                        $tmenu=str_replace("[item ","<li class='sub01'><a ",$tmenu);
                        $tmenu=str_replace(" item]"," >",$tmenu);
                        $tmenu=str_replace("[/item]","</a></li>",$tmenu);
                        $tmenu=str_replace("[arrow]","</a>",$tmenu);
                        $tmenu=str_replace("[item-arrow]","",$tmenu);

                        echo $tmenu;
					?>                
			    </ul>
			</div>
		</nav>
	</div>
</header>
	
<script src="<?=$sw_skin_url?>/js/ScrollMagic.min.js"></script>
<script src="<?=$sw_skin_url?>/js/menu.js"></script>
<script>
    $(function() {    
        //상단픽스
        var headerOffset = $("#header").offset();
        $(window).scroll(function() {
            if ($(document).scrollTop() > (headerOffset.top + 100)) {
                $("#header").addClass("fixed");
            }
            else {
                $("#header").removeClass("fixed");
            }
        });
        function initScrollMagic() {
            var controller = new ScrollMagic.Controller();

        }
    });
</script> 

