<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" type="text/css" href="<?=$sw_skin_url?>/style.css">

<!--
<link rel="stylesheet" type="text/css" href="https://www.mss.go.kr/css/smba/np/common.css" />
-->

<footer id="footer">
    <script>
        var width = screen.width
        var height = screen.height
        var resolution = width + "x" + height;
        $('document').ready(function(){
            $.ajax({
                type: "POST",
                url: "/site/smba/ex/organchart/sub_bottom.do",
                data : {"ssMenuCode":"20000000000000000000000","ssSiteCode":"smba","resolution":resolution},
            });
        });
    </script>
    <div id="footer_inner">
        <div id="footer_link">
            <div class="link_box">
                <button type="button" class="open">한국 &middot; 기독교총회<span class="hidden">목록 펼치기</span></button>
                <div><h5>한국 &middot; 기독교총회</h5>
                    <ul>
                        <li><a href="http://new.pck.or.kr/" target="_blank" title="대한예수교장로회총회(새창열림)"><span>대한예수교장로회총회</span></a></li>
                        
				    </ul>
				    <button type="button" class="close">닫기</button>
                </div>
            </div>
            <div class="link_box">
                <button type="button" class="open">전국 &middot;복음교회<span class="hidden">목록 펼치기</span></button>
                <div><h5>전국 &middot;복음교회</h5>
                    <ul>
                        <li><a href="http://www.naver..com/" target="_blank" title="서울복음교회(새창열림)"><span>서울복음교회</span></a></li>                        
                    </ul>
                    <button type="button" class="close">닫기</button>
                </div>
            </div>
            <div class="link_box">
                <button type="button" class="open">전세계&middot;선교지<span class="hidden">목록 펼치기</span></button>
                <div><h5>전세계&middot;선교지</h5>
                    <ul>
                        <li><a href="http://naver.com/" target="_blank" title="프랑스 선교지(새창열림)"><span>프랑스선교지</span></a></li>                        
                    </ul>
                    <button type="button" class="close">닫기</button>
                </div>
            </div>
            
        </div>
        <div id="footer_sns"><h6>sns</h6>
            <ul>
                <!--
                <li class="fb"><a href="/" target="_blank"><span>페이스북</span></a></li>
                <li class="tw"><a href="/" target="_blank"><span>트위터</span></a></li>
                <li class="nb"><a href="/" target="_blank"><span>네이버블로그</span></a></li>
                -->
                <li class="yt"><a href="/" target="_blank"><span>유튜브 채널</span></a></li>
            </ul>
        </div>
        <div id="fnb">
            <ul>
                <li><a href="/">이용약관</a></li>
                <li><a href="/"><strong>개인정보처리방침</strong></a></li>                
                <li><a href="/">저작권 정책</a></li>
                <li><a href="/" target="_blank">공공데이터 이용정책</a></li>
                <li><a href="/" >고객만족도조사</a></li>                                
                
            </ul>
        </div>
        <address><?=SW_COMPANY_FULL_ADDR?> / 대표전화 : <?=SW_COMPANY_TEL?> / 이메일 : <?=SW_COMPANY_EMAIL?></address>
        <p>COPYRIGHT ⓒ 대한예수교복음교회. ALL RIGHTS RESERVED.</p>
    </div>
</footer>
<script>
    $(document).ready(function () {
        // 푸터 링크 영역
        $('#footer_link button.open').on('click', function () {
            var index = $('#footer_link button.open').index(this);
            $(this).toggleClass('active');
            $(this).parent().toggleClass('active');
            if (footer_link_status[index] == 0) {
                $(this).find('span').text('목록 접기');
                footer_link_status[index] = 1;
            }
            else {
                $(this).find('span').text('목록 펼치기');
                footer_link_status[index] = 0;
            }
        });
        $('#footer_link button.close').on('click', function () {
            $(this).parent().siblings('button.open').removeClass('active');
            $(this).parent().siblings('button.open').find('span').text('목록 펼치기');
            $(this).parent().parent().removeClass('active');
        });    
    });
</script>


