<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.php');
?>
<link rel="stylesheet" href="<?=G5_THEME_URL?>/pages/style.css">
<style>
.bh_bookmark_list_wrap{ clear:both; }
.bh_bookmark_list_ul_n{ font-size:0; word-break:keep-all; margin-bottom:20px; }
.bh_bookmark_list_ul_n li:first-child{ margin-left:0; }
.bh_bookmark_list_ul_n li.bh_bookmark_list3{ float:left; width:49%; border:1px solid #e7e7e7; margin-bottom:20px; }
.bh_bookmark_list_ul_n li.bh_bookmark_list3 .bh_doctor_box_n{ position:relative; }
.bh_bookmark_list_ul_n li.bh_bookmark_list3:nth-child(even){ float:right; }
.bh_doctor_box_n{ border:2px solid #fff; background:#f9f9f9; padding:15px; *zoom:1; overflow:hidden; position:relative; }
.bh_bookmark_list .bh_doctor_box_n{ border:2px solid #fff; background:#f9f9f9; padding:27px 15px; *zoom:1; overflow:hidden; position:relative; }
.bh_doctor_box_n:hover{ border:2px solid #2D58B6; }
.bh_doctor_box_n:after{ content:""; clear:both; display:block; }
.bh_doctor_img_n{ display:inline-block; float:left; height:176px; overflow:hidden; margin:0; width:auto; border:1px solid #ddd; background:#EDEEF0; _font-size:176px; line-height:176px; position:relative; width:144px; }
.bh_doctor_img_n:after{ content:" "; margin-left:-0.6em; white-space:pre; }
.bh_doctor_img_n .ico_seoul{ position:absolute; top:0; right:0; }
.bh_doctor_img_n .ico_seoul img{ width:auto; }
.bh_doctor_img_n img{ vertical-align: middle; display:block; margin-left:0px; width:auto !important; height:100% !important; }
.bh_doctor_introduce3{ padding:0; width:64%; width:calc(100% - 161px); float:left; height:auto; padding:3px 0 0 15px; }
.bh_doctor_introduce3 .bh_heart{ position:absolute; top:20px; right:20px; }
.bh_doctor_name_n{ font-size:21px; color:#1a1a1a; margin-bottom:10px; height:28px; }
.bh_doctor_name_n strong{ font-weight:600; display:inline-block; margin-right:5px; line-height:26px; vertical-align:middle; }
.bh_doctor_name_n strong em{ font-weight:normal; font-size:16px; }
.bh_doctor_name_n span{ font-size:13px; color:#2d58b6; letter-spacing:-0.25px; font-weight:600; display:inline-block; padding:0 9px; border:1px solid #25a9f1; border-radius:3px; line-height:24px; vertical-align:middle; }
.bh_doctor_dept_n{ font-size:14px; line-height:22px; letter-spacing:-0.5px; color:#444; margin-bottom:14px; padding-left:2px; }
.bh_doctor_dept_n dt{ font-weight:600; color: #0094aa; }
.bh_doctor_dept_n dd{ font-size:13px; color:#666; min-height:66px; /*height:80px !important;*/ overflow:hidden; word-wrap:break-word; }
.bh_bookmark_list .bh_doctor_dept_n dd{ font-size:13px; color:#666; min-height:38px; height:38px !important; overflow:hidden; word-wrap:break-word; line-height:19px; }

@media screen and (max-width: 1023px) {    
    .bh_bookmark_list_ul_n li.bh_bookmark_list3{ float:right; width:99%; width:calc(100% - 2px); border:1px solid #e7e7e7; margin-bottom:20px; }
    .bh_bookmark_list3{ width:49%; }
    .bh_bookmark_list_wrap{ clear:both; }
    .bh_bookmark_list_ul_n{ font-size:0; word-break:keep-all; margin-bottom:20px; text-align:left; }
}

@media screen and (max-width: 640px) {
    .bh_doctor_introduce3{ padding:0; width:calc(100% - 161px); float:left; height:auto; padding:3px 0 0 0; margin-left:15px; }
}

@media screen and (max-width: 480px) {
    .bh_bookmark_list_ul_n{ margin-bottom:10px; }
    .bh_doctor_img_n{ display:inline-block; float:left; height:auto; overflow:hidden; margin:0; width:auto; border:1px solid #ddd; background:#EDEEF0; _font-size:auto; line-height:100%; position:relative; width:80px; margin-bottom:25px; }
    .bh_doctor_img_n:after{ content:" "; margin-left:-0.6em; white-space:pre; }
    .bh_doctor_img_n img{ vertical-align: middle; display:block; margin-left:0px; width:100% !important; height:auto !important; }
    .bh_doctor_introduce3{ padding:0 ; width:calc(100% - 97px); float:left; height:auto; padding:3px 0 0 0; margin-left:15px; }
    .bh_doctor_dept_n dd { color: #666; font-size: 13px; height: auto !important; min-height: 100% !important; overflow: hidden; overflow-wrap: break-word; }
    .bh_doctor_box_n { background: #f9f9f9 none repeat scroll 0 0; border: 2px solid #fff; overflow: hidden; padding: 10px 10px 40px 10px; position: relative; }    
    .bh_doctor_dept_n dd{ min-height:70px; }
    .bh_bookmark_list .bh_doctor_dept_n{ padding-bottom:19px; }
    .bh_bookmark_list .bh_doctor_dept_n dd{ min-height:19px; height:19px !important; overflow:hidden; text-overflow:ellipsis; overflow-wrap: break-word; }
    .bh_doctor_introduce3 .bh_heart { position: absolute; right: 10px; top: 20px; }
}

@media screen and (max-width: 360px) {
    .bh_doctor_name_n strong{ font-size:21px; width:130px; }
    .bh_doctor_dept_n dd{ min-height:70px; }
    .bh_bookmark_list_ul_n li.bh_bookmark_list3{ float:left !important; width:calc(100% - 2px); border:1px solid #e7e7e7; margin-bottom:10px; }
}
</style>
<div class="bh_bookmark_list_wrap" style="">    					
    <ul class="bh_bookmark_list_ul_n fix">        
		<li class="bh_bookmark_list3">
		    <div class="bh_doctor_box_n">
			    <div class="bh_doctor_img_n"><img src="<?=G5_THEME_URL?>/pages/img/06_05_img01-1.jpg" style="width:165px;" alt="김영균 의료진 사진" /></div>
			    <div class="bh_doctor_introduce3">				    
					<div class="bh_doctor_name_n">
					    <strong>탐슨선교사 부부</strong>
				    </div>
					<dl class="bh_doctor_dept_n">
						<dt>(Arthur & Evelyn Thompson)</dt>
						<dd>
						    국제복음교회 선교사, 초대 한국 감독<br>
						    재단법인 대한예수교복음선교회 설립<br>
						    대한복음신학교 설립
				        </dd>
				    </dl>				    
				</div>
            </div>
        </li>
        <li class="bh_bookmark_list3">
		    <div class="bh_doctor_box_n">
			    <div class="bh_doctor_img_n"><img src="<?=G5_THEME_URL?>/pages/img/06_05_img01-2.jpg" style="width:165px;" alt="김영균 의료진 사진" /></div>
			    <div class="bh_doctor_introduce3">				    
					<div class="bh_doctor_name_n">
					    <strong>김신옥 목사</strong>
				    </div>
					<dl class="bh_doctor_dept_n">						
						<dd>
						    대한예수교복음선교회 제1대, 제2대 총회장<br>
                            1984년 대한예수교복음선교회 총회 설립<br>
                            대전복음교회 원로목사<br>
                            학교법인 대성학원 이사장<br>
                            학교법인 복음신학원 이사장
				        </dd>
				    </dl>				    
				</div>
            </div>
        </li>
        <li class="bh_bookmark_list3">
		    <div class="bh_doctor_box_n">
			    <div class="bh_doctor_img_n"><img src="<?=G5_THEME_URL?>/pages/img/06_05_img01-3.jpg" style="width:165px;" alt="김영균 의료진 사진" /></div>
			    <div class="bh_doctor_introduce3">				    
					<div class="bh_doctor_name_n">
					    <strong>최부영 목사</strong>
				    </div>
					<dl class="bh_doctor_dept_n">						
						<dd>
						    대한예수교복음선교회 제3대, 제6대 총회장<br>
                            학교법인 복음신학원 설립허가<br>
                            복음신학대학원대학교 설립허가<br>
                            동대전교회 원로목사<br>
                            2008년 소천
				        </dd>
				    </dl>				    
				</div>
            </div>
        </li>
        <li class="bh_bookmark_list3">
		    <div class="bh_doctor_box_n">
			    <div class="bh_doctor_img_n"><img src="<?=G5_THEME_URL?>/pages/img/06_05_img01-4.jpg" style="width:165px;" alt="김영균 의료진 사진" /></div>
			    <div class="bh_doctor_introduce3">				    
					<div class="bh_doctor_name_n">
					    <strong>오창도 목사</strong>
				    </div>
					<dl class="bh_doctor_dept_n">						
						<dd>
						    대한예수교복음선교회 제4대, 제5대 총회장<br>
                            중앙복음교회 원로목사<br>
                            2007년 소천
				        </dd>
				    </dl>				    
				</div>
            </div>
        </li>
        <li class="bh_bookmark_list3">
		    <div class="bh_doctor_box_n">
			    <div class="bh_doctor_img_n"><img src="<?=G5_THEME_URL?>/pages/img/06_05_img01-5.jpg" style="width:165px;" alt="김영균 의료진 사진" /></div>
			    <div class="bh_doctor_introduce3">				    
					<div class="bh_doctor_name_n">
					    <strong>이창우 목사</strong>
				    </div>
					<dl class="bh_doctor_dept_n">						
						<dd>
						    대한예수교복음교회 제7대, 제8대, 제12대, 제13대 총회장<br>
                            교단명칭변경(대한예수교복음선교회->대한예수교복음교회)<br>
                            2010년 교단창립 40주년 기념대회 개최<br>
                            총회본부 이전(대전 서구 탄방동 634)<br>
                            수정복음교회 담임목사
				        </dd>
				    </dl>				    
				</div>
            </div>
        </li>
        <li class="bh_bookmark_list3">
		    <div class="bh_doctor_box_n">
			    <div class="bh_doctor_img_n"><img src="<?=G5_THEME_URL?>/pages/img/06_05_img01-6.jpg" style="width:165px;" alt="김영균 의료진 사진" /></div>
			    <div class="bh_doctor_introduce3">				    
					<div class="bh_doctor_name_n">
					    <strong>임재군 목사</strong>
				    </div>
					<dl class="bh_doctor_dept_n">						
						<dd>
						    대한예수교복음교회 제9대, 제10대 초회장<br>
                            영광복음교회 담임목사
				        </dd>
				    </dl>				    
				</div>
            </div>
        </li>
        <li class="bh_bookmark_list3">
		    <div class="bh_doctor_box_n">
			    <div class="bh_doctor_img_n"><img src="<?=G5_THEME_URL?>/pages/img/06_05_img01-7.jpg" style="width:165px;" alt="김영균 의료진 사진" /></div>
			    <div class="bh_doctor_introduce3">				    
					<div class="bh_doctor_name_n">
					    <strong>최충규 목사</strong>
				    </div>
					<dl class="bh_doctor_dept_n">						
						<dd>
						    대한예수교복음교회 제11대 총회장<br>
                            한국기독교총연합회 청년분과 위원회 위원장, 부회장<br>
                            목양복음교회 담임목사
				        </dd>
				    </dl>				    
				</div>
            </div>
        </li>
        <li class="bh_bookmark_list3">
		    <div class="bh_doctor_box_n">
			    <div class="bh_doctor_img_n"><img src="<?=G5_THEME_URL?>/pages/img/06_05_img01-8.jpg" style="width:165px;" alt="김영균 의료진 사진" /></div>
			    <div class="bh_doctor_introduce3">				    
					<div class="bh_doctor_name_n">
					    <strong>안영권 목사</strong>
				    </div>
					<dl class="bh_doctor_dept_n">						
						<dd>
						    대한예수교복음교회 제14대, 제15대 총회장<br>
                            예뜰교회(구.대전복음교회) 담임목사<br>
                            제1회 복아시아복음가족대회 개최
				        </dd>
				    </dl>				    
				</div>
            </div>
        </li>
        <li class="bh_bookmark_list3">
		    <div class="bh_doctor_box_n">
			    <div class="bh_doctor_img_n"><img src="<?=G5_THEME_URL?>/pages/img/06_05_img01-9.jpg" style="width:165px;" alt="김영균 의료진 사진" /></div>
			    <div class="bh_doctor_introduce3">				    
					<div class="bh_doctor_name_n">
					    <strong>임춘수 목사</strong>
				    </div>
					<dl class="bh_doctor_dept_n">						
						<dd>
						    대한예수교복음교회 제16대, 제17대 총회장<br>
                            참빛복음교회 담임목사<br>
                            한국교회총연합회 창립에 참여, 공동회장<br>
                            포스퀘어 북아시아 의장
				        </dd>
				    </dl>				    
				</div>
            </div>
        </li>
        <li class="bh_bookmark_list3">
		    <div class="bh_doctor_box_n">
			    <div class="bh_doctor_img_n"><img src="<?=G5_THEME_URL?>/pages/img/06_05_img01-10.jpg" style="width:165px;" alt="김영균 의료진 사진" /></div>
			    <div class="bh_doctor_introduce3">				    
					<div class="bh_doctor_name_n">
					    <strong>정인석 목사</strong>
				    </div>
					<dl class="bh_doctor_dept_n">						
						<dd>
						    대한예수교복음교회 제18대 총회장<br>
                            예일교회 담임목사
				        </dd>
				    </dl>				    
				</div>
            </div>
        </li>
		
    </ul>
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>