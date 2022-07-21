<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');
?>
<link rel="stylesheet" href="<?=G5_THEME_URL?>/pages/style.css">
<div class="sub_container">
    <h4>외국인지방회</h4>    
    <div class="scroll_tb visible-xs"> <span>&lt;</span> 좌우로 스크롤하시면 내용이 보입니다.<span>&gt;</span> </div>
    <div class="table_scroll">
        <table width="100%" border="0" cellspacing="0">
            <caption class="sound_only">외국인지방회 내용 표</caption>
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
                    <td align="center" class="th1_right">김해이주민교회</td>
                    <td align="center" class="th1_right">수베디 목사</td>
                    <td align="center" class="th1_right">50915 경남 김해시 호계로517번길 25-1</td>
                    <td align="center" class="th1_right">055-334-7940</td>                    
                    <td align="center" class="th1_right">subedi@daum.net</td>
                </tr>
                <tr>
                    <th align="center" class="th1_left" scorp="row">2</th>
                    <td align="center" class="th1_right">베트남선교교회</td>
                    <td align="center" class="th1_right">조나단 티엔 목사</td>
                    <td align="center" class="th1_right">50915 경남 김해시 분성로335번길 3-3</td>
                    <td align="center" class="th1_right"></td>                    
                    <td align="center" class="th1_right">msthienchicago@gmail.com</td>
                </tr>
                <tr>
                    <th align="center" class="th1_left" scorp="row">3</th>
                    <td align="center" class="th1_right">광주퓨어가스펠교회</td>
                    <td align="center" class="th1_right">크리스찬 도에크파 목사</td>
                    <td align="center" class="th1_right">61213 광주 북구 우치로 14-1</td>
                    <td align="center" class="th1_right"></td>                    
                    <td align="center" class="th1_right"></td>
                </tr>
                <tr>
                    <th align="center" class="th1_left" scorp="row">4</th>
                    <td align="center" class="th1_right">디아스포라 네팔교회</td>
                    <td align="center" class="th1_right">아이작 목사</td>
                    <td align="center" class="th1_right">17911 경기도 평택시 평택1로9번길22, 3층</td>
                    <td align="center" class="th1_right"></td>                    
                    <td align="center" class="th1_right"></td>
                </tr>    
            </tbody>
        </table>
    </div>
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>