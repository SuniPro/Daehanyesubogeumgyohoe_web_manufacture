<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" type="text/css" href="<?=$sw_skin_url?>/style.css">
<style>
@media (min-width: 1200px){
    .container { max-width: 1300px; }
}
</style>

<style>
:after,:before{content:''}
.clearfix {display: block;}
.clearfix:after{content: '';display: table;clear: both;}

.skip {position:absolute;width:1px;height:1px;margin:0;padding:0;background:none; font-size:3px; color:transparent; line-height: 0}

/* 공통 */
p{margin: 0; padding: 0; border: 0; font-size: inherit; font-family: inherit; vertical-align: baseline;}
button,[type="button"],[type="reset"],[type="submit"] {background-color:transparent; cursor: pointer; }
/* 텝메뉴 */
.skip, caption, legend {overflow:hidden; font-size:0;}
input, textarea, select, button {margin:0; padding:0; border:0 none transparent; box-sizing:border-box;}
.wrap {position:relative; width:1300px; margin-right:auto; margin-left:auto;}
@media all and (max-width:1200px) {
	.wrap {width:1000px;}
}
@media all and (max-width:1000px) {
	.wrap {width:auto; margin-right:0; margin-left:0; padding-right:2%; padding-left:2%;}
}
.tab_menu {overflow:hidden; position:relative; font-size:0; line-height:0; text-align:center; transition:padding-bottom 0.25s linear;}
.tab_nav {position:relative; z-index:20;}
.tab_contents {position:relative; z-index:10; font-size:16px; line-height:1.6em;}
.tab_list {position:relative;}
/*.tab_list.clearfix > .tab_item {float:left;}*/
.tab_content {display:none; text-align:left;}
.tab_content.active {display:block;}
.tab_content.active {display:block;}
.tab_list > .tab_item {display:inline-block; vertical-align:top;}
.tab_list > .tab_item > .tab_content {display:block; visibility:hidden; opacity:0; position:absolute; top:100%; left:0; width:100%; transition-property:visibility, opacity; transition-duration:0.25s; transition-timing-function:linear;}
.tab_list > .active > .tab_content {visibility:visible; opacity:1;}
    
/* 새글 스킨 (latest) */
.tl_notice_latest_wrap {margin: 30px 0; }
.lt_notice {position: relative;}
.lt_notice .lt_title {display: none;}
.lt_notice .lt_more {display: none;}
.lt_notice .a-item {padding: 0; border:0; background-color:#fff; word-break: break-all; padding:0px 4px 4px 0px }
.lt_notice .a-item .img-box { position:relative; cursor:pointer; display:none}
.lt_notice .a-item .img-box img { -webkit-transform: scale(1); transform: scale(1);transition: all 1s ease;-webkit-transition: all 1s ease;}
.lt_notice .a-item .img-box img:hover { -webkit-transform: scale(1.1); transform: scale(1.1);}
.lt_notice .a-item .info { height:227px;display: block;text-decoration: none;padding:30px;  border: 4px solid transparent; transition: all 0.3s; }
.lt_notice .a-item .info:hover { border:4px solid #5187c5; box-shadow:3px 3px 3px 3px #ddd;}
.lt_notice .a-item .info .date { display:block; clear:both; font-size:14px; color:#666; padding-bottom:40px}
.lt_notice .a-item .info .subject { font-weight:700; font-size:17px; padding-bottom:20px}
.lt_notice .a-item .info .substance {color:#666; margin-top:9px; font-size:14px; line-height:1.6;}
.lt_notice .a-item .info .time {color:tomato; font-size:0.9em;text-align:right;}
.lt_notice .a-item .more {width: 131px;margin:0px 0px 30px 30px; border: 1px solid #ddd;padding: 12px 0 12px 0; line-height:12px; font-size:14px; background: none;}
.lt_notice .a-item .more:hover {background-color: #001e3a;color: #FFF;cursor: pointer;opacity: 1;transition: all 0.5s;}

.owl-carousel .owl-nav .owl-prev, .owl-carousel .owl-nav .owl-next, .owl-carousel .owl-dot { display: none;}  
.owl-carousel .owl-nav .owl-prev, .owl-carousel .owl-nav .owl-next, .owl-carousel .owl-dot { display: none;}

</style>

<section class="notice">
    <h2 class="skip">소식</h2>
    <div class="wrap">
        <div class="notice_tab clearfix">
            <div class="tab_menu">
                <div class="tab_panel">
                    <ul class="tab_list clearfix">
                        <li class="tab_item active"><button type="button" title="선택됨" class="tab_button"><span>총회소식</span></button></li>
                        <li class="tab_item"><button type="button" class="tab_button"><span>공지사항</span></button></li>                        
                    </ul>
                </div>
            </div>
            
            <div id="a1" class="tab_content active">
                <h3 class="skip">총회소식</h3>
                <?=latest("theme/sj_basic1","07_01",8,25)?>                
                <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=07_01" class="more"><span>더보기</span></a>
            </div>
            <div id="a1" class="tab_content">
                <h3 class="skip">공지사항</h3>
                <?=latest("theme/sj_basic1","07_02",8,25)?>
                <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=07_02" class="more"><span>더보기</span></a>
            </div>  
        </div>
    </div>
</section>
<script>
    $('.latest-carousel').owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        dots:true,
        navSpeed:700,
        navText:['<i class="xi-angle-left"></i> ', '<i class="xi-angle-right"></i> '],
        responsive:{
            0:{
                items:1
            },
            640:{
                items:2
            },
            1000:{
                items:3
            }
        }
    })
</script>



 6<script>
$(function(){
    var titleHeight = 0;
    var titleNum = [52,48,24];
    function setOverHeight(){
        if($(window).width() > 1000){
            titleHeight = titleNum[0];
        } else if($(window).width() > 640){
            titleHeight = titleNum[1];
        } else if($(window).width() > 360){
            titleHeight = titleNum[2];
        }
    }
    setOverHeight();
    $(window).resize(function(){
        setOverHeight();
        setNewContent($noticeLi);

    });

    // 주요소식(notice) 탭
    var $noticeTab = $('.notice_tab'),
        $noticeButton = $noticeTab.find('.tab_button'),
        $noticeContent = $noticeTab.find('.tab_content');

    $noticeButton.click(function () {
        var $this = $(this),
            thisTitle = $this.find('span').text(),
            index = $noticeButton.index(this);
        $noticeButton.parent().removeAttr('title').removeClass('active');
        $this.parent().addClass('active').attr('title',thisTitle +' 열림');
        $noticeContent.addClass('active').attr('title','열림');
        $noticeContent.eq(index).addClass('active').siblings('.tab_content').removeClass('active').removeAttr('title');
        setOverHeight();
        setNewContent($noticeContent.eq(index).find('li'));

    }).triggerHandler('click');

    function setNewContent(elem){
        setTimeout(function(){
            elem.each(function (){
                var $this = $(this),
                    $thisTitle = $this.find('.title p');
                $thisTitle.height() > titleHeight ? $this.addClass('over') : $this.removeClass('over');
            });
        },10);
    }
})
</script>

<div class='container m-g'>
    <div class='m-subj'>복음교회 겔러리</div>
    <?=latest("theme/sj_img_list","07_03",6,25)?>
</div>    


<div class='container m-g'>
	<div class='m-subj'>교회별유튜브</div>
	<div class='m-latest'>
		<?=latest("theme/portfolio","07_04",10,50)?>
	</div>
</div>



<div class='container m-partner'>
	<div class='m-subj'>후원의 손길</div>
	<!--<div class='m-caption'>함께하는 사람들</div>-->
	<div class='m-latest'>
		<div class="row">
			<div class="col">
				<?=sw_skin("layout/etc/partner")?>
			</div>
		</div>
	</div>
</div>