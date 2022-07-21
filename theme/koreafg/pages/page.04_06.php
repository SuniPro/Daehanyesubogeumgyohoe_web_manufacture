<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');
?>
<link rel="stylesheet" href="<?=G5_THEME_URL?>/pages/style.css">
<div class="sub_container">
    <h4>영남지방회</h4>    
    <div class="scroll_tb visible-xs"> <span>&lt;</span> 좌우로 스크롤하시면 내용이 보입니다.<span>&gt;</span> </div>
    <div class="table_scroll">
        <table width="100%" border="0" cellspacing="0">
            <caption class="sound_only">영남지방회 내용 표</caption>
            <tbody>
                <tr>
                    <th width="10%" align="center" class="th5_left" scope="col">연번</th>
                    <th width="15%" align="center" class="th5_right" scope="col">교회명</th>
                    <th width="15%" align="center" class="th5_right" scope="col">담임목회자</th>
                    <th width="35%" align="center" class="th5_right" scope="col">주소</th>
                    <th width="15%" align="center" class="th5_right" scope="col">전화번호</th>                    
                    <th width="30%" align="center" class="th5_right" scope="col">이메일</th>
                </tr>
                <tr>
                    <th align="center" class="th1_left" scorp="row">1</th>
                    <td align="center" class="th1_right">늘단비교회</td>
                    <td align="center" class="th1_right">최방주 목사</td>
                    <td align="center" class="th1_right">44481 울산 중구 동천3길11</td>
                    <td align="center" class="th1_right">070-4085-7820</td>                    
                    <td align="center" class="th1_right"></td>
                </tr>
                <tr>
                    <th align="center" class="th1_left" scorp="row">2</th>
                    <td align="center" class="th1_right">주동산교회</td>
                    <td align="center" class="th1_right">강진호 목사</td>
                    <td align="center" class="th1_right">37403 경북 청송군 진보면 어무길6-4</td>
                    <td align="center" class="th1_right">054-874-0191</td>                    
                    <td align="center" class="th1_right">kulove67@daum.ne</td>
                </tr>
                <tr>
                    <th align="center" class="th1_left" scorp="row">3</th>
                    <td align="center" class="th1_right">시온산교회</td>
                    <td align="center" class="th1_right">최춘석전도사</td>
                    <td align="center" class="th1_right">52616 진주시 일반성면 동부로 2062 에이원604호</td>
                    <td align="center" class="th1_right"></td>                    
                    <td align="center" class="th1_right">thelife70@daum.net</td>
                </tr>                
            </tbody>
        </table>
    </div>
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>