<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');
?>
<link rel="stylesheet" href="<?=G5_THEME_URL?>/pages/style.css">

<div class="sub_container_bt">
    <div class="panel panel-default">        
        <div class="hidden-xs prf_header_lg">
            <div class="organization">
                <img src="<?=G5_THEME_URL?>/pages/img/01_04_01.jpg" alt="조직도" usemap="#prfMap"/>                
            </div>
        </div>        
        <div class="prf_header visible-xs">
            <img src="<?=G5_THEME_URL?>/pages/img/01_04_01.jpg" alt="조직도" border="0" /> 
        </div>
    </div>
</div>



<?php
include_once(G5_THEME_PATH.'/tail.php');
?>