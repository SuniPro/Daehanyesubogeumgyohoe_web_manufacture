<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');
?>
<link rel="stylesheet" href="<?=G5_THEME_URL?>/pages/style.css">
<div class="sub_container">    
    <div class="sub_T">사회부 임원</div>
    <div class="scroll_tb visible-xs"> <span>&lt;</span> 좌우로 스크롤하시면 내용이 보입니다.<span>&gt;</span> </div>
    <div class="table_scroll">
        <table width="100%" border="0" cellspacing="0">
            <caption class="sound_only">사회부 임원 내용 표</caption>
            <tbody>
                <tr>
                    <th width="20%" align="center" class="th5_left" scope="col">직위</th>
                    <th width="15%" align="center" class="th5_right" scope="col">성명</th>
                    <th width="30%" align="center" class="th5_right" scope="col">교회명</th>                        
                </tr>
                <tr>
                    <th align="center" class="th1_left" scorp="row">부장</th>
                    <td align="center" class="th1_right">김도봉 목사</td>
                    <td align="center" class="th1_right">믿음의교회</td>                        
                </tr>                
                <tr>
                    <th align="center" rowspan="3" class="th1_left" scorp="row">부원</th>
                    <td align="center" class="th1_right">김성묵 목사</td>
                    <td align="center" class="th1_right">본향교회</td>                        
                </tr>
                <tr>                        
                    <td align="center" class="th1_right">신정혜 목사</td>
                    <td align="center" class="th1_right">예본교회</td>                        
                </tr>                
                <tr>                        
                    <td align="center" class="th1_right">이종숙 목사</td>
                    <td align="center" class="th1_right">포도나무교회</td>                        
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="sub_container">
    <h4>사회부 사업</h4>
    <div class="sub_T">사업내용</div>
    <p class="point2 marginB1">1) 목회자 지원 : 설명절에 어려운 교회 쌀20Kg 지원</p>
    <p class="point2 marginB1">2) 재해 지원 사업 : 자연재해, 목회자 질병, 기타 필요시 지원</p>
    <p class="point2 marginB1">3) 사모·사부의 날 </p>
    <p class="point2 marginB1">4) 포스퀘어중창단 후원</p>    
</div>


<div class="sub_container">
    <div class="sub_T">교육부 문의</div>
    <div class="inner">
        <div class="txt">
            <div class="le">
                <div class="img">
                    <img src="<?=G5_THEME_URL?>/pages/img/03_05_01.jpg" alt="장광진 목사">
                </div>
            </div>
            <div class="ri">                            
                <div class="gr">
                    <ul>
                        <li class="ti"><span>사회부장 : </span></li>
                        <li class="co">김도봉 목사</li>
                    </ul>
                    <ul>
                        <li class="ti"><span>이&nbsp; 메&nbsp; 일 : </span></li>
                        <li class="co">rtb119@naver.com</li>
                    </ul>                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>