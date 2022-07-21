<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

//1차 메뉴
    $first_menu = array(
        "총회안내" =>  G5_URL."/page/page.01_01.php",
        "우리가 믿는것" =>  G5_URL."/page/page.02_01.php",
        "총회부서" =>  G5_URL."/page/page.03_01.php",        
        "지방회" =>  G5_URL."/page/page.04_01.php",
        "선교지" =>  G5_URL."/page/page.05_01.php",
        "자료실" =>  G5_BBS_URL."/bbs/board.php?bo_table=06_01",
        "열린마당" =>  G5_BBS_URL."/bbs/board.php?bo_table=07_01",
        
    );
?>
<link rel="stylesheet" type="text/css" href="<?=$sw_skin_url?>/style.css">

<? if(SW_USE_SUB_MENU==1 && $g5[page_ary][use_leftmenu]=='y'){ ?>

<div class="location">
    <div class="container clearfix">
        <a href="/" class="home"> <i class="xi-home-o"><span class="sr-only">HOME</span></i></a>
        <ul class="clearfix">
            <li class="dropdown">
                <a class="dropdown-toggle" href="#" id="dropdown-loc-menu-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span><?=$g5[page_ary][page_title]?></span><i class="xi-angle-down-thin angle-down"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown-loc-menu-1">
                    <? while( list($k,$v) = each($first_menu) ){ ?>
                    <a class="dropdown-item" href="<?=$v?>" target="<?=$first_menu_target[$k]?>"><?=$k?></a>
                    <?} reset($first_menu); ?>                    
                </div>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" href="#" id="dropdown-loc-menu-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                    <span><?=$g5[page_ary][page_sub_title]?></span><i class="xi-angle-down-thin angle-down"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown-loc-menu-2">
                    <?
                        $stmenu=$g5[menu_list][submenu];
                        $stmenu=str_replace("[item ","<a class='dropdown-item'",$stmenu);
                        $stmenu=str_replace(" item]",">",$stmenu);
                        $stmenu=str_replace("[/item]","",$stmenu);
                        $stmenu=str_replace("[item-arrow]","</a>",$stmenu);

                        echo $stmenu;
                    ?>                    
                </div>
            </li>
        </ul>
        <button id="print" class="print" title="프린트 하기"><i class="xi-print"><span class="sr-only">프린트 하기</span></i></button>
    </div>
</div>
<? } ?>

<div class='container lm-wrap'>
	<div class='content-wrap'>
		
	