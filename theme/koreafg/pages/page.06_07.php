<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');
?>
<link rel="stylesheet" href="<?=G5_THEME_URL?>/pages/style.css">

<div class="sub_container_bt">
    <div class="panel panel-default">        
        <div class="hidden-xs prf_header_lg">
            <div class="organization">
                <img src="<?=G5_THEME_URL?>/pages/img/06_07_01.jpg" alt="조직도" usemap="#prfMap"/>                
            </div>
        </div>        
        <div class="prf_header visible-xs">
            <img src="<?=G5_THEME_URL?>/pages/img/06_07_01.jpg" alt="조직도" border="0" /> 
        </div>
    </div>
</div>

<style>

.gu_contents_depth3{ display:none; }
.gu_contents_depth3.on{ display:block; }
.gu_contents_depth4{display:none;}
.gu_contents_depth4.on{display:block;}
.gu_contents_wrap{ padding-top:60px; position:relative; }

.gu_grid{ position:relative; max-width:1432px; width:100%; margin:0 auto; padding:0 44px;*zoom:1; -webkit-box-sizing:border-box; -moz-box-sizing:border-box; box-sizing:border-box; }
.gu_grid:after{ display:block; content:""; clear:both; }
.gu_grid .gu_title{ font-size:40px; font-weight:700; line-height:56px; word-break:break-word; -ms-word-break:break-all; }
.gu_grid>div{ display:inline-block; vertical-align:top; }
.gu_grid .gu_left_grid{ width:384px; margin-right:72px; float:left; }
.gu_grid .gu_right_grid{ width:calc(100% - 456px); float:right; }

.gu_grid_sm{ max-width:1116px; padding:0; }
.gu_grid_sm .gu_title{ font-size:32px; font-weight:700; line-height:48px; word-break:break-word; -ms-word-break:break-all; }
.gu_grid_sm .gu_left_grid{ width:228px; margin-right:48px; }
.gu_grid_sm .gu_right_grid{ width:840px; }

.gu_title + .gu_sort_area:nth-child(2){ margin-top:48px; }

.gu_btn_down_pdf{ position: relative; }
.gu_btn_down_pdf a{ display: inline-block; font-size: 18px; line-height: 48px; position: relative; color:#000; }
.gu_btn_down_pdf a:before{ content: ''; width: 0%; height: 1px; background: #000; position: absolute; bottom: 0; left: 0; -webkit-transition: all 0.3s; -moz-transition: all 0.3s; -ms-transition: all 0.3s; -o-transition: all 0.3s; transition: all 0.3s; }
.gu_btn_down_pdf a span{ position: relative; padding-right: 38px; display: inline-block; }
.gu_btn_down_pdf a span:before{ content: ''; background: url("../images/common/m_ico_download_pdf.png") no-repeat 0 0 / contain; width: 24px; height: 24px; position: absolute; top: 50%; right: 0; margin-top: -12px; }
.gu_btn_down_pdf a:hover:before{ width: 100% } 

@media all and (max-width: 1280px){
    .gu_grid{ max-width:1104px; padding:0 56px; }
    .gu_grid>div{ display:inline-block; vertical-align:top; }
    .gu_grid .gu_left_grid{ width:234px; margin-right:48px; }
    .gu_grid .gu_right_grid{ width:calc(100% - 282px); }
    
    .gu_tab_depth3{margin-bottom:40px;}
    
    .gu_tab_depth4{padding:40px 0 32px}
    
    .gu_contents_wrap{ padding-top:56px; }
}
@media all and (max-width: 1080px){
    #INDICATOR{display: none}

    .gu_contents_wrap{ padding-top:42px; }

    .gu_grid{ max-width:1104px; padding:0 34px; }
    .gu_grid>div{ display:inline-block; vertical-align:top; }

    .gu_grid .gu_title{ font-size:24px; line-height:32px; word-break:break-all; }
    .gu_grid_sm .gu_title{ font-size:24px; line-height:32px; word-break:break-all; }
    .gu_grid .gu_title br{ display:none; }

    .gu_grid .gu_left_grid{ width:147px; margin-right:24px; }
    .gu_grid .gu_right_grid{ width:calc(100% - 171px); }

    .gu_table tbody td.download span:before { background-image: url(../images/common/m_ico_download_pdf.png); height: 20px; width: 20px; right: -30px; background-size: contain; }
        
    .gu_title + .gu_sort_area:nth-child(2){ margin-top:32px; }
    .gu_sort_area .gu_sort_name:before { background-image: url("../images/common/m_ico_arrow_black_bottom.png"); width: 10px; height: 6px; background-size: contain; }

    .gu_btn_sm_box.gu_btn_arrow a span:before { background-image: url('../images/common/m_ico_arrow_black_right.png'); width: 8px; height: 12px; margin-top: -6px; background-size: contain; }
    .gu_btn_sm_box.gu_btn_arrow a:hover span:before{background-image:url('../images/common/m_ico_arrow_black_right.png');  background-size: contain;}

    .gu_btn_down_pdf a{ font-size:14px; }
    .gu_btn_down_pdf a:hover:before{ width:0; }
    .gu_btn_down_pdf a span{ padding-right:30px; }

    .gu_btn_down_pdf a span:before{ width: 20px; height: 20px; margin-top: -10px; background-image: url("../images/common/m_ico_download_pdf.png"); background-size: contain; }
}

/* ================================== Mobile css ================================== */
@media all and (max-width: 766px){
    .gu_contents_wrap{ padding-top: 40px; }

    .gu_grid{ padding:0 4px; }
    .gu_grid .gu_left_grid{ float:none; width:100%; display:block; margin-right:0; }
    .gu_grid .gu_right_grid{ float:none; width:100%; display:block; }
    
    .gu_table tbody td.download span:before { right: -24px; }
	
}

/** CI */
#INTRO_BRAND_CI{max-width: 100%;}

#INTRO_BRAND_CI img{max-width:100%;}
#INTRO_BRAND_CI .logo_area img{max-width: 600px;}
#INTRO_BRAND_CI .logo_area img.mobile{width: 88%}
#INTRO_BRAND_CI .gu_grid .gu_right_grid .top_copy{font-size:22px; line-height:38px;margin-bottom:60px;}
#INTRO_BRAND_CI .gu_grid .gu_right_grid .copy{font-size:18px; line-height:32px; color:#444; margin-bottom:60px;}
#INTRO_BRAND_CI .gu_grid .gu_right_grid .gu_btn_down_pdf{margin-bottom:80px;}
#INTRO_BRAND_CI .gu_grid .gu_right_grid .gu_btn_down_pdf a{margin-right:40px;}
#INTRO_BRAND_CI .gu_grid .gu_right_grid .logo_area .mobile{display:none;}

#INTRO_BRAND_CI .full_img{padding-bottom:160px;}
</style>

<div id="INTRO_BRAND_CI" class="gu_contents_depth3 on">
    <div class="gu_contents_wrap">
        <div class="gu_grid">
            <div class="gu_left_grid">
                <div class="gu_title">로고</div>
            </div>
            <div class="gu_right_grid">
                <div class="top_copy">
                	<img src="<?=G5_THEME_URL?>/pages/img/06_07_img01-2.jpg" alt="">
                </div>
                <div class="gu_btn_down_pdf">
                    <!--<a class="kr_sd_500 file-download" target="_blank" data-name="Doosan Logo AI" href="/download/intro/brand/doosan_ci.ai"><span>AI 다운로드</span></a>-->
                    <a class="kr_sd_500 file-download" target="_blank" data-name="Doosan Logo JPG" href="<?=G5_THEME_URL?>/pages/img/06_07_img01-2.jpg"><span>JPG 다운로드</span></a>
                </div>
            </div>
        </div>
        <div class="gu_grid">
            <div class="gu_left_grid">
                <div class="gu_title">로고</div>
            </div>
            <div class="gu_right_grid">
                <div class="top_copy">
                	<img src="<?=G5_THEME_URL?>/pages/img/06_07_img01-3.jpg" alt="">
                </div>
                <div class="gu_btn_down_pdf">
                    <!--<a class="kr_sd_500 file-download" target="_blank" data-name="Doosan Logo AI" href="/download/intro/brand/doosan_ci.ai"><span>AI 다운로드</span></a>--->
                    <a class="kr_sd_500 file-download" target="_blank" data-name="Doosan Logo JPG" href="<?=G5_THEME_URL?>/pages/img/06_07_img01-3.jpg"><span>JPG 다운로드</span></a>
                </div>
            </div>
        </div>
        <div class="gu_grid">
            <div class="gu_left_grid">
                <div class="gu_title">로고</div>
            </div>
            <div class="gu_right_grid">
                <div class="top_copy">
                	<img src="<?=G5_THEME_URL?>/pages/img/06_07_img01-4.jpg" alt="">
                </div>
                <div class="gu_btn_down_pdf">
                    <!--<a class="kr_sd_500 file-download" target="_blank" data-name="Doosan Logo AI" href="/download/intro/brand/doosan_ci.ai"><span>AI 다운로드</span></a>--->
                    <a class="kr_sd_500 file-download" target="_blank" data-name="Doosan Logo JPG" href="<?=G5_THEME_URL?>/pages/img/06_07_img01-4.jpg"><span>JPG 다운로드</span></a>
                   
        </a>
                </div>
            </div>
        </div>
    </div>
</div>




	


<?php
include_once(G5_THEME_PATH.'/tail.php');
?>