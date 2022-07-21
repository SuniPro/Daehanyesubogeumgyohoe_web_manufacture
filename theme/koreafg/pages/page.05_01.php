<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');
?>
<link rel="stylesheet" href="<?=G5_THEME_URL?>/pages/style.css">

<div class="sub_container_bt">
    <div class="panel panel-default">        
        <div class="hidden-xs prf_header_lg">
            <div class="organization">
                <img src="<?=G5_THEME_URL?>/pages/img/img0701_01.jpg" alt="조직도" usemap="#prfMap"/>                
            </div>
        </div>        
        <div class="prf_header visible-xs">
            <img src="<?=G5_THEME_URL?>/pages/img/img0701_01.jpg" alt="조직도" border="0" /> 
        </div>
        
		<div class="tabmenu">
            <ul>
                <li data-tab="#his01"><a href="#">해외선교부</a></li>
                <li data-tab="#his02"><a href="#">교단 파송 선교사 현황</a></li>                			
            </ul>
        </div>
        <section id="his01" class="hisWrap">
            <div class="sub_container">
                <h4>해외선교부</h4>
                <div class="sub_T">해외선교부 임원</div>
                <div class="scroll_tb visible-xs"> <span>&lt;</span> 좌우로 스크롤하시면 내용이 보입니다.<span>&gt;</span> </div>
                <div class="table_scroll">
                    <table width="100%" border="0" cellspacing="0">
                        <caption class="sound_only">해외선교부 임원 내용 표</caption>
                        <tbody>
                            <tr>
                                <th width="20%" align="center" class="th5_left" scope="col">직위</th>
                                <th width="15%" align="center" class="th5_right" scope="col">성명</th>
                                <th width="30%" align="center" class="th5_right" scope="col">교회명</th>                        
                            </tr>
                            <tr>
                                <th align="center" class="th1_left" scorp="row">부장</th>
                                <td align="center" class="th1_right">장광진 목사</td>
                                <td align="center" class="th1_right">IFC소망 교회</td>                        
                            </tr>
                            <tr>
                                <th align="center" rowspan="2" class="th1_left" scorp="row">부원</th>
                                <td align="center" class="th1_right">구본천 목사</td>
                                <td align="center" class="th1_right">엘림 교회</td>                        
                            </tr>
                            <tr>                        
                                <td align="center" class="th1_right">김선희 목사</td>
                                <td align="center" class="th1_right">반석 교회</td>                        
                            </tr>
                            <tr>
                                <th align="center" rowspan="2" class="th1_left" scorp="row">부설기관</th>
                                <td align="center" class="th1_right">문화선교위원회</td>
                                <td align="center" class="th1_right">엘림 교회</td>                        
                            </tr>
                            <tr>                        
                                <td align="center" class="th1_right">한반도회복위원회</td>
                                <td align="center" class="th1_right">생명빛교회, 전용우 목사</td>                        
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        
            <div class="sub_container">
                <div class="sub_T">해외선교부 사업</div>
                <div class="scroll_tb visible-xs"> <span>&lt;</span> 좌우로 스크롤하시면 내용이 보입니다.<span>&gt;</span> </div>
                <div class="table_scroll">
                    <table width="100%" border="0" cellspacing="0">
                        <caption class="sound_only">해외선교부 임원 내용 표</caption>
                        <tbody>
                            <tr>
                                <th width="20%" align="center" class="th5_left" scope="col">사업내용</th>
                                <th width="15%" align="center" class="th5_right" scope="col">일정</th>                            
                            </tr>
                            <tr>
                                <th align="center" class="th1_left" scorp="row">
                                    해외 선교사역 및 국내거주 외국인 <br>
                                    선교사역 정기 및 특별 지원
                                </th>
                                <td align="center" class="th1_right">매월 또는 특별한 경우</td>                                                  
                            </tr>
                            <tr>
                                <th align="center" class="th1_left" scorp="row">해외선교소식편지</th>
                                <td align="center" class="th1_right">연 2회 </td>                                                  
                            </tr>
                            <tr>
                                <th align="center" class="th1_left" scorp="row">선교사 파송식</th>
                                <td align="center" class="th1_right">총회기간 선교의 밤 또는 필요한 때 </td>                                                  
                            </tr>
                            <tr>
                                <th align="center" class="th1_left" scorp="row">선교사가족 도서 및 성탄선물 보내기</th>
                                <td align="center" class="th1_right">11월</td>                                                  
                            </tr>
                            <tr>
                                <th align="center" class="th1_left" scorp="row">건신대학원대학교 외국인 학생 초청 만찬</th>
                                <td align="center" class="th1_right">11월</td>                                                  
                            </tr>
                            <tr>
                                <th align="center" class="th1_left" scorp="row">선교사가족 포스터</th>
                                <td align="center" class="th1_right">9월</td>                                                  
                            </tr>
                            <tr>
                                <th align="center" class="th1_left" scorp="row">선교지 방문</th>
                                <td align="center" class="th1_right">여름 또는 겨울</td>                                                  
                            </tr>
                            <tr>
                                <th align="center" class="th1_left" scorp="row">기타사업</th>
                                <td align="center" class="th1_right">필요시</td>                                                  
                            </tr>                        
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="sub_container">
                <div class="sub_T">총회 해외선교헌금 계좌 안내</div>
                <p class="point2 marginB1">통합선교비 계좌 : 농협 462-17-006334 대한예수교복음교회</p>
            </div>
            <div class="sub_container">
                <div class="sub_T">해외선교부 문의</div>
                <p class="point2 marginB1">이메일 : kwangjin.jang@gmail.com</p>
                <p class="point2 marginB1">Tel. +82-42-221-0774</p>
            </div>
        </section>
        <section id="his02" class="hisWrap">            
            <div class="sub_container">                        
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img01.jpg" alt="장광진 목사">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">장광진 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">순회</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">
                                        교단파송 연도: 1999년 10월<br>
                                        교회 파송 연도: 1993년 12월
                                    </li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">순회 선교</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="" alt="선교사 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">김미리암 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">창의지역</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">교단파송 연도: 2005년 9월</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="" alt="선교사 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">천부장 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">창의지역</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">교단파송 연도: 2012년 9월</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="" alt="선교사 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">성공한 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">창의지역</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">미정</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">미정</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img05.jpg" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">김영원 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">러시아, 사할린</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">교단파송 연도: 2002년 9월</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        교회명: 사할린 꼬르사꼬브 교회
                                        사역: 교회사역, 농업 기술 교육
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">드미트리 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">러시아</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">미정</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        미정
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img07.jpg" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">김용춘 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">일본, 오사카</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">교단파송 연도: 2006년 1월</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        교회명: 오사카복음교회, 셋쯔교회, 쭈루미샬롬교회<br>
                                        사역: 교회사역, 목회자 지도자 양성
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img08.jpg" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">원대식(폴리캅) 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">이탈리아, 로마</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">
                                        교단파송 연도: 2007년 9월<br>
                                        해외정착.타기관 파송 연도: 1992년 9월
                                    </li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        교회명: 로마 포스퀘어교회<br>
                                        사역: 교회사역, 리더 제자양성, 교회 개척 지원사역
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img09.jpg" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">
                                        오요한 선교사<br>
                                        임화자(프리실라) 목사
                                    </li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">이탈리아, 로마</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">
                                        교단파송 연도: 2010년 9월<br>
                                        해외정착.타기관 파송 연도: 1995년 11월

                                    </li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        교회명: 로마 포스퀘어교회<br>
                                        사역: 교회사역, 리더 제자양성
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img10.jpg" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">유숙영(한나) 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">이탈리아, 로마</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">
                                        교단파송 연도: 2014년 9월<br>
                                        해외정착.타기관 파송 연도: 1992년 9월
                                    </li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        교회명: 로마 포스퀘어교회<br>
                                        사역: 교회사역, 리더 제자양성, 교회 개척 지원사역

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img11.jpg" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">강성은(스테반) 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">리투아니아, 빌뉴스</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">
                                        교단파송 연도: 2007년 6월<br>
                                        해외정착.타기관 파송 연도: 1991년
                                    </li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        교회명: 리투아니아 포스퀘어교회<br>
                                        사역: 교회사역, 제자양성 사역
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">배상덕 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">독일</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">미정</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">미정</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img13.jpg" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">박영철(스테파노스) 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">독일, 드레스덴</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">
                                        교단파송 연도: 2015년<br>
                                        해외정착.타기관 파송 연도: 1996년
                                    </li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        교회명: 드레스덴 은혜교회<br>
                                        사역: 교회 사역
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img14.jpg" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">최영자 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">몽골, 울란바타르</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">교단파송 연도: 2010년 9월</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        교회명: 주님의 기쁨 교회<br>
                                        사역: 교회 사역
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img15.jpg" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">노재웅 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">필리핀, 다스마리냐스</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">교단파송 연도: 2010년 9월</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        교회명: 필리핀 세한교회, 필리핀 예일교회<br>
                                        사역: 교회사역, 구제사역
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img16.jpg" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">양영목(다윗) 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">오스트리아, 비엔나</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">
                                        교단파송 연도: 2013년<br>
                                        해외정착.타기관 파송 연도: 1992년
                                    </li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        교회명: J.H.U. 포스퀘어교회<br>
                                        사역: 교회사역, 오스트리아 중심의 유럽 현지인 사역 18개국 출신의 국제교회
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img17.jpg" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">이종철(아브라함) 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">영국, 런던</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">
                                        교단파송 연도: 2014년<br>
                                        해외정착.타기관 파송 연도: 2001년
                                    </li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        교회명: 런던생명샘교회<br>
                                        사역: 교회사역, 청년 제자양성사역
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img18.jpg" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">방인갑(다니엘) 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">체코, 프리덱미스텍</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">
                                        교단파송 연도: 2015년<br>
                                        해외정착.타기관 파송 연도: 1994년 12월
                                    </li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        교회명: 체코소망교회<br>
                                        사역: 한인교회, 현지인교회, 출소자, 집시, 노숙자 사역
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">권태연 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">미정</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">교단파송 연도: 2015년</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">미정</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img20.jpg" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">탕발테 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">인도, 마니푸르</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">
                                        교단파송 연도: 2016년<br>
                                        해외정착.타기관 파송 연도: 2010년
                                    </li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        교회명: 르비딤 교회<br>
                                        사역: 교회사역, 구제사역
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img21.jpg" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">
                                        전태열(다비데) 목사<br>
                                        박재윤(안나) 목사
                                    </li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">이탈리아, 밀라노</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">
                                        교단파송 연도: 2017년 9월<br>
                                        해외정착.타기관 파송 연도: 2001년 11월
                                    </li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        교회명: 밀라노 포스퀘어교회<br>
                                        사역: 교회사역, 8개국 출신의 국제교회
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img22.jpg" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">김현영 목사</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">독일, 뮌헨</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">
                                        교단파송 연도: 2018년<br>
                                        해외정착.타기관 파송 연도: 2006년
                                    </li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        교회명: 아가페 교회<br>
                                        사역: 교회사역, 말씀사역, 가정사역
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner">
                    <div class="txt">
                        <div class="le">
                            <div class="img">
                                <img src="<?=G5_THEME_URL?>/pages/img/0701_img23.jpg" alt="러시아, 사할린 이미지">
                            </div>
                        </div>
                        <div class="ri">                            
                            <div class="gr">
                                <ul>
                                    <li class="ti"><span>성 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 명 : </span></li>
                                    <li class="co">
                                        최영범(갈렙) 목사<br>
                                        김정애(아가페) 목사
                                    </li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>국가 &nbsp; 및 &nbsp; &nbsp; 도시 : </span></li>
                                    <li class="co">독일, 로렐라이</li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>선교사 파송 연혁 : </span></li>
                                    <li class="co">
                                        교단파송 연도: 2019년<br>
                                        해외정착.타기관 파송 연도: 1998년
                                    </li>
                                </ul>
                                <ul>
                                    <li class="ti"><span>사 &nbsp; 역 &nbsp;&nbsp;&nbsp; 내 &nbsp; 용 : </span></li>
                                    <li class="co">
                                        교회명: 로렐라이 충만교회<br>
                                        사역: 교회사역, 현지인 및 한인 전도, 찬양선교
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>        
        </section>
    </div>
</div>


<script type="text/javascript">
$(function(){

	//연혁
	hisScroll = function(){
		$(window).scroll(function(){
			$('.historyList .hBox').each(function(i){
				var bottom_of_object = $(this).offset().top + $(this).outerHeight() + 70; //구역의총높이
				var bottom_of_window = $(window).scrollTop() + $(window).height(); //
				if (bottom_of_window > bottom_of_object) {
					$(this).animate({'opacity':'1'},2000);
				}
			});
			$('.historyList .centerLine').stop().animate({'opacity':'1'},100);
		});
	}

	$('.tabmenu li a').each(function(){
		$(this).bind('click', function(e){
			 e.preventDefault();
			var target = $(this).parent().attr('data-tab');
			$('.tabmenu li').removeClass('on');
			$('.hisWrap').css({'display':'none'},800);
			$(''+target+'').focus();
			$(this).parent().addClass('on');
			$(''+target+'').fadeIn(300);
			hisScroll();		
			//$(hisScroll).removeAttr('style','');
		});
	});
	$('.tabmenu li:eq(0) a').click();


	//수상내역
	$('.awardsHistory .list').each(function(){
		$(this).bind('click',function(){
			 var th = $(this).children().children('.textBox').height();
			 console.log(th);
			if($(this).is('.on')){
				$(this).children('.detail').stop().animate({'height':'0'},500);
				$(this).removeClass('on');
			}else{
				$('.detail').stop().animate({'height':'0'},500);
				$(this).children('.detail').stop().animate({'height':th},500);
				$(this).children('.detail').slideDown();
				$('.awardsHistory .list').removeClass('on');
				$(this).addClass('on');
			}
		});
	});

	$('.awardsHistory .list:eq(0)').click();
	$('.stepHis .list').matchHeight();
});
</script>


<?php
include_once(G5_THEME_PATH.'/tail.php');
?>