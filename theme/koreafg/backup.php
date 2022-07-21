<link rel="stylesheet" href="https://www.h-point.co.kr/assets/app/css/swiper.min.css"><!-- RENEWAL 2021 -->
<style>
* { margin: 0; padding: 0; -webkit-box-sizing: border-box; box-sizing: border-box; }
button { font-family: "Noto Sans KR"; font-weight: 400; font-size: 18px; color: #111; text-align: left; background: none; border: 0; cursor: pointer; outline-style: none; overflow: visible; }
.dim_full { position: fixed; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.4); z-index: 1000; }

/*********** etc ***********/
.swiper-pagination.type1 { position: static; height: 8px; }
.swiper-pagination.type1 .swiper-pagination-bullet { width: 8px; height: 8px; border-radius: 50%; background-color: #fff; opacity: 1; margin: 0 4px; -webkit-transition: .3s; transition: .3s; vertical-align: top; }
.swiper-pagination.type1 .swiper-pagination-bullet-active { background-color: #29d5b1; }
.swiper-pagination.type2 { position: static; height: 6px; }
.swiper-pagination.type2 .swiper-pagination-bullet { width: 6px; height: 6px; border-radius: 50%; background-color: #fff; opacity: 1; margin: 0 4px; -webkit-transition: .3s; transition: .3s; vertical-align: top; }
.swiper-pagination.type2 .swiper-pagination-bullet-active { background-color: #000; }
.swiper-pagination.type3 { position: static; height: 12px; }
.swiper-pagination.type3 .swiper-pagination-bullet { width: 12px; height: 12px; border-radius: 50%; background-color: #ddd; opacity: 1; margin: 0 6px; -webkit-transition: .3s; transition: .3s; vertical-align: top; }
.swiper-pagination.type3 .swiper-pagination-bullet-active { background-color: #4e2bf4; }
.swiper-button-disabled { opacity: 0 !important; }
.swiper-button-prev.type1, .swiper-button-next.type1 { position: absolute; top: 50%; -webkit-transform: translateY(-50%); -ms-transform: translateY(-50%); transform: translateY(-50%); width: 15px; height: 30px; opacity: 1; margin-top: 0; }
.swiper-button-prev.type2, .swiper-button-next.type2 { display: inline-block; position: static; width: 32px; height: 28px; opacity: 1; margin-top: 0; vertical-align: top; }
.swiper-button-prev.type3, .swiper-button-next.type3 { display: inline-block; position: static; width: 10px; height: 14px; opacity: 1; margin-top: 0; vertical-align: middle; }
.swiper-button-prev.type4, .swiper-button-next.type4 { position: absolute; top: 50%; -webkit-transform: translateY(-50%); -ms-transform: translateY(-50%); transform: translateY(-50%); width: 26px; height: 52px; opacity: 1; margin-top: 0; }
.swiper-button-prev.type1 { left: 0; background-image: url("/assets/app/img/common/ic_arrow4.png"); background-repeat: no-repeat; background-size: auto; background-position: center; }
.swiper-button-prev.type2 { background-image: url("/assets/app/img/common/ic_arrow5.png"); background-repeat: no-repeat; background-size: auto; background-position: center; }
.swiper-button-prev.type3 { background-image: url("/assets/app/img/common/ic_arrow9.png"); background-repeat: no-repeat; background-size: contain; background-position: center center; margin-left: 25px; }
.swiper-button-prev.type4 { left: 0; background-image: url("/assets/app/img/common/ic_arrow10.png"); background-repeat: no-repeat; background-size: auto; background-position: center; }
.swiper-button-next.type1 { right: 0; background-image: url("/assets/app/img/common/ic_arrow4.png"); background-repeat: no-repeat; background-size: auto; background-position: center; -webkit-transform: translateY(-50%) rotate(180deg); -ms-transform: translateY(-50%) rotate(180deg); transform: translateY(-50%) rotate(180deg); }
.swiper-button-next.type2 { background-image: url("/assets/app/img/common/ic_arrow5.png"); background-repeat: no-repeat; background-size: auto; background-position: center; -webkit-transform: translateX(30px) rotate(180deg); -ms-transform: translateX(30px) rotate(180deg); transform: translateX(30px) rotate(180deg); }
.swiper-button-next.type3 { background-image: url("/assets/app/img/common/ic_arrow9.png"); background-repeat: no-repeat; background-size: contain; background-position: center center; -webkit-transform: rotate(180deg); -ms-transform: rotate(180deg); transform: rotate(180deg); }
.swiper-button-next.type4 { right: 0; background-image: url("/assets/app/img/common/ic_arrow10.png"); background-repeat: no-repeat; background-size: auto; background-position: center; -webkit-transform: translateY(-50%) rotate(180deg); -ms-transform: translateY(-50%) rotate(180deg); transform: translateY(-50%) rotate(180deg); }
.swiper-tools { position: static; }
.swiper-tools .swiper-pagination { position: static; display: inline-block; width: 140px; height: 2px; background-color: #ccc; vertical-align: middle; }
.swiper-tools .swiper-pagination .swiper-pagination-progressbar-fill { position: absolute; left: 0; top: 0; width: 100%; height: 100%; -webkit-transform-origin: left top; -ms-transform-origin: left top; transform-origin: left top; background-color: #111; }
.swiper-tools .swiper-count { display: inline-block; vertical-align: middle; margin: 0 5px; font-family: "HGGGothicssi"; font-weight: 800; font-size: 18px; color: #ccc; }
.swiper-tools .swiper-count span { display: inline-block; font-family: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; letter-spacing: inherit; text-align: center; opacity: .5; }
.swiper-tools .swiper-count span.active_num { width: 30px; color: #111; opacity: 1; }
.swiper-tools .swiper-count span.all_num { width: 30px; }
.swiper-tools .btn-swiper-play { display: inline-block; vertical-align: middle; margin-left: 15px; -webkit-transition: .3s; transition: .3s; width: 12px; }
.swiper-tools .btn-swiper-play span { display: block; text-indent: -99999px; overflow: hidden; opacity: .5; }
.swiper-tools .btn-swiper-play.paused span { width: 11px; height: 11px; border-left: 2px solid #ccc; border-right: 2px solid #ccc; }
.swiper-tools .btn-swiper-play.play span { width: 0px; height: 0px; border-right: 6px solid transparent; border-top: 6px solid transparent; border-bottom: 6px solid transparent; border-left: 6px solid #ccc; }
.swiper-tools.v2 .swiper-pagination { background-color: rgba(255, 255, 255, 0.5); }
.swiper-tools.v2 .swiper-pagination .swiper-pagination-progressbar-fill { background-color: #fff; }
.swiper-tools.v2 .swiper-count { color: #fff; }
.swiper-tools.v2 .swiper-count span.active_num { color: #fff; }
.swiper-tools.v2 .btn-swiper-play.paused span { border-left: 2px solid rgba(255, 255, 255, 0.5); border-right: 2px solid rgba(255, 255, 255, 0.5); }
.swiper-tools.v2 .btn-swiper-play.play span { border-left: 6px solid rgba(255, 255, 255, 0.5); }
.swiper-scrollbar, .swiper-container-horizontal > .swiper-scrollbar { position: absolute; left: 0; bottom: 0; width: 100%; height: 1px; background: #eee; border-radius: 0; }
.swiper-scrollbar-drag, .swiper-container-horizontal > .swiper-scrollbar-drag { height: 2px; border-radius: 2px; background: #4e2bf4; margin-top: -0.5px; }
.video_container { position: relative; width: 100%; padding-bottom: 54%; }
.video_container iframe { position: absolute; left: 0; width: 100%; height: 100%; }

/*********** popup ***********/
.popup_ui { width: 100%; height: 100%; position: fixed; left: 0; top: 0; }
.popup_ui .pop_container { width: 100%; height: 100%; position: relative; overflow-x: hidden; overflow-y: auto; z-index: 1001; }
.popup_ui .pop_layer { background-color: #fff; }
.popup_ui.type_modal .pop_layer { position: absolute; left: 50%; top: 70px; -webkit-transform: translateX(-50%); -ms-transform: translateX(-50%); transform: translateX(-50%); width: calc(100% - 60px); max-width: 600px; /* 각 팝업css에서 사이즈 조절 */ border-radius: 25px; padding: 60px 40px; }
.popup_ui.type_modal .pop_layer:after { content: ''; display: block; width: 100%; height: 70px; position: absolute; left: 0; bottom: -70px; }
.popup_ui.type_full .pop_layer { width: 100%; height: 100%; overflow-y: auto; }
.popup_ui.type_full .btn_pop_close { right: 20px; top: 20px; }
.popup_ui .pop_tit { font-family: "Noto Sans KR"; font-weight: 700; font-size: 22px; color: #111; margin-bottom: 40px; }
.popup_ui .pop_tit2 { font-family: "HGGGothicssi"; font-weight: 800; font-size: 30px; color: #111; margin-bottom: 40px; }
.popup_ui .pop_body { width: 100%; }
.popup_ui .pop_body .btn_ac a, .popup_ui .pop_body .btn_ac button { margin-left: 10px; }
.popup_ui .pop_body .btn_ac a:first-child, .popup_ui .pop_body .btn_ac button:first-child { margin-left: 0; }
.popup_ui .pop_inner_scroll { margin-right: -40px; padding-right: 40px; overflow-y: auto; }
.popup_ui .btn_pop_close { position: absolute; right: 20px; top: 20px; width: 21px; height: 21px; background-image: url("/assets/app/img/common/ic_x1.png"); background-repeat: no-repeat; background-size: contain; background-position: center center; }

/*------------------- 에러페이지 공통 ---------------------*/
#etc .errorpage { text-align: center; }
#etc .errorpage .logo { display: inline-block; margin-bottom: 30px; }
#etc .errorpage .box { padding: 60px 50px; }
#etc .errorpage .tit { font-family: "Noto Sans KR"; font-weight: 700; font-size: 30px; color: #111; letter-spacing: -0.8px; padding-top: 110px; background-image: url("/assets/app/img/common/ic_caution1.png"); background-repeat: no-repeat; background-size: auto; background-position: center top; }
#etc .errorpage .txt1 { font-family: "Noto Sans KR"; font-weight: 400; font-size: 24px; color: #111; letter-spacing: -0.8px; margin-top: 15px; }
#etc .errorpage .txt1 em { font-weight: 700; }
#etc .errorpage .txt2 { font-family: "Noto Sans KR"; font-weight: 400; font-size: 16px; color: #999; letter-spacing: -0.5px; margin-top: 10px; }
#etc .errorpage .btn_area { margin-top: 50px; }

/*------------------- 알림 팝업 공통 ---------------------*/
.popup_ui .alert_common .tit { font-family: "Noto Sans KR"; font-weight: 700; font-size: 26px; color: #111; }
.popup_ui .alert_common .tit em { font-family: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; letter-spacing: inherit; color: #4e2bf4; }
.popup_ui .alert_common .t_txt1 { margin-top: 25px; }
.popup_ui .alert_common .t_txt1 em { font-family: inherit; font-weight: inherit; font-size: inherit; line-height: inherit; letter-spacing: inherit; color: #111; }
.popup_ui .alert_common .btn_ac { margin-top: 45px; }

/*------------------- 영상팝업 ---------------------*/
.pop_video .pop_layer { max-width: 1104px !important; }
.pop_video .btn_ac { margin-top: 40px; }
.pop_video .btn_ac a, .pop_video .btn_ac button { width: 220px; }

/*------------------- 모달 팝업 배너 ---------------------*/
.pop_mobal_banner .pop_layer { max-width: 540px !important; padding: 0 !important; background-color: transparent; }
.pop_mobal_banner .swiper-slide img { width: 100%; border-radius: 25px; }
.pop_mobal_banner .swiper-pagination { margin-top: 20px; }
.pop_mobal_banner .swiper-button-prev { left: -55px; }
.pop_mobal_banner .swiper-button-next { right: -55px; }
.pop_mobal_banner .btn_not_today { position: absolute; right: 46px; top: -33px; }
.pop_mobal_banner .btn_not_today label { cursor: pointer; position: relative; font-family: "Noto Sans KR"; font-weight: 400; font-size: 14px; color: #fff; padding-left: 25px; }
.pop_mobal_banner .btn_not_today label::before { content: ""; position: absolute; left: 0; top: 2px; width: 16px; height: 16px; border: 2px solid #fff; }
.pop_mobal_banner .btn_not_today label::after { content: ""; position: absolute; left: 4px; top: 6px; width: 8px; height: 8px; background-color: #fff; opacity: 0; -webkit-transition: opacity .1s; transition: opacity .1s; }
.pop_mobal_banner .btn_not_today input[type="checkbox"]:checked + label::after { opacity: 1; }
.pop_mobal_banner .btn_pop_close { right: 0; top: -30px; background-image: url("/assets/app/img/common/ic_x2.png"); }

@media screen and (max-width: 768px) {
    .swiper-pagination.type1 .swiper-pagination-bullet { width: 6px; height: 6px; }
    .swiper-pagination.type2 .swiper-pagination-bullet { background-color: #4e2bf4; opacity: 0.4; }
    .swiper-pagination.type2 .swiper-pagination-bullet-active { opacity: 1; }
    .swiper-pagination.type3 { height: 6px; }
    .swiper-pagination.type3 .swiper-pagination-bullet { width: 6px; height: 6px; margin: 0 3px; }
    .swiper-button-prev.type3, .swiper-button-next.type3 { display: none; }
    .swiper-tools { text-align: center; }
    .swiper-tools .swiper-pagination { max-width: 166px; height: 1px; width: 50%; height: 1px; }
    .swiper-tools .swiper-count { font-size: 11px; }
    .swiper-tools .swiper-count span.active_num { width: 20px; }
    .swiper-tools .swiper-count span.all_num { width: 20px; }
    .swiper-tools .btn-swiper-play { width: 8px; margin-left: 0; }
    .swiper-tools .btn-swiper-play.paused span { width: 8px; height: 9px; }
    .swiper-tools .btn-swiper-play.play span { border-right: 5px solid transparent; border-top: 5px solid transparent; border-bottom: 5px solid transparent; border-left: 5px solid #ccc; }
    .popup_ui.type_modal .pop_layer { border-radius: 12px; padding: 40px 20px; }
    .popup_ui.type_modal .pop_layer:after { height: 30px; bottom: -30px; }
    .popup_ui .pop_tit2 { font-family: "HGGGothicssi"; font-weight: 800; font-size: 20px; color: #111; margin-bottom: 20px; }
    .popup_ui .pop_body .btn_ac a, .popup_ui .pop_body .btn_ac button { margin-left: 16px; }
    .popup_ui .pop_inner_scroll { margin-right: -20px; padding-right: 20px; }
    .popup_ui .btn_pop_close { right: 15px; top: 15px; background-image: url("/assets/app/img/common/mo/ic_x1.png"); background-repeat: no-repeat; background-size: 15px; background-position: right top; }
    
    .popup_ui .alert_common .tit { font-size: 16px; }
    .popup_ui .alert_common .t_txt1 { margin-top: 15px; }
    .popup_ui .alert_common .btn_ac { margin-top: 30px; }
    .pop_video .pop_tit { font-size: 16px; margin-bottom: 20px; }
}
.popup_ui { z-index: 1000; }
/*# sourceMappingURL=../../../sourcemaps/assets/app/css/screen.ui.css.map */
</style>

<script type="text/javascript" src="https://www.h-point.co.kr/js/hdgm/cookie.js"></script>
<script type="text/javascript" src="https://www.h-point.co.kr/assets/app/js/swiper.min.js"></script><!-- RENEWAL 2021 -->
<script type="text/javascript" src="https://www.h-point.co.kr/assets/app/js/common-pub.js"></script><!-- RENEWAL 2021 -->
<script type="text/javascript" src="https://www.h-point.co.kr/assets/app/js/page-pub.js"></script><!-- RENEWAL 2021 -->

<script language="javascript">
	$(function(){
        if(document.documentMode != undefined && document.documentMode <10 && getCookie("browserUpdate") != "IE9") {
            commonPub.modalPopOpenSelf('pop_browser_update');
            var openCertPopup = function(certType) {
                var width = 420;
				var height = 600;
				var isIOS = $("input[name=isIOS]").val();
				var actionUrl = "/cu/cert/requestTelecomCert.nhd?isPopup=Y&isIOS=" + isIOS;
				if(certType == "ipin") {
					width = 445;
					height = 550;
					var certPurpose = $("input[name=certPurpose]").val();
					actionUrl = "/cu/cert/requestIpinCert.nhd?certPurpose="+certPurpose + "&isPopup=Y&isIOS=" + isIOS;
				}
				certPopupOpenYn = window.open(actionUrl, "certPopup", "width="+width+",height="+height+",scrollbars=no,toolbar=no,location=no,directories=no,status=no");
			};
		}
		var allHide = true;
		$(".ancmLayer div.mainPop").each(function() {
			if( $(this).css("display") != "none")
			{
				allHide = false;
			}
	    });
		if( allHide)
		{
			$(".ancmLayer").fadeOut(0);
		}
		var width;
		var height;
		var top;
		var left;
		var param;
    });
	
	function closeLayer( index, ancmSeq) {        
		$("#ancmLayer"+index).fadeOut(0);
		var allHide = true;
		$(".ancmLayer div.mainPop").each(function() {
			if( $(this).css("display") != "none") {
				allHide = false;
			}
	    });
		if( $("#mainPopChk"+index).prop( "checked")) {	
			var nPeriod = $("#mainPopChk"+index).val();
			if( nPeriod != 0) {
				setCookie( "mainPop_" + ancmSeq, "Y", nPeriod);
			}
		}
		if( allHide) {
			$(".ancmLayer").fadeOut(0);
		}
	}
</script>

<!------- 팝업 배너 ------->
<div class="popup_ui type_modal pop_mobal_banner" style="display: none;">
    <div class="dim_full"></div>
	<div class="pop_container">
	    <div class="pop_layer">
		    <div class="pop_body">
		        <!-- slide -->
				<div class="swiper-container">
				    <ul class="swiper-wrapper">
					    <li class="swiper-slide">
						    <a href='https://www.h-point.co.kr/introduce/benefit.nhd' target='_blank'>
							    <img src="https://www.h-point.co.kr/cma/image/1000469048.nhd" alt="">												
				            </a>
				        </li>
				         <li class="swiper-slide">
						    <a href='https://www.h-point.co.kr/introduce/benefit.nhd' target='_blank'>
							    <img src="https://www.h-point.co.kr/cma/image/1000469048.nhd" alt="">												
				            </a>
				        </li>
				    </ul>
				</div>
				<!-- slide -->
				<div class="swiper-pagination type1"></div>
                <div class="swiper-button-prev type1 mo_none"></div>
				<div class="swiper-button-next type1 mo_none"></div>
            </div>
			<span class="btn_not_today">
				<input type="checkbox" id="mainNotToday">
				<label for="mainNotToday">오늘 다시보지 않기</label>
			</span>
			<button class="btn_pop_close" type="button" id="closeMainBtmBnr"><span class="hidden">레이어 닫기</span></button>
        </div>
    </div>
</div>
<script>
	if(getCookie("mainNotToday") != "mainNotToday") {
		commonPub.modalPopOpenSelf('pop_mobal_banner');
		page.banner.popBannerSlide();
	}
	$('#closeMainBtmBnr').on('click', function(){				
		commonPub.layerPopClose($('.pop_mobal_banner'));
		if($("#mainNotToday").is(":checked")){
            setCookie("mainNotToday", "mainNotToday", 1);
        }
    })
</script>