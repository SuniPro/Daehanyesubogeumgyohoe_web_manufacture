$(document).ready(function(){
	$(function($){
		var $vision_wrap = $('.vision_img');
		var $vision_div = $('.vision_img > div');
		var $vision_img5 = $('.vision_img5 ul li');

		$('.vision_img1').fadeIn(400);		
		$('.vision_img2').fadeIn(400);
		$('.vision_img3').fadeIn(400);
		$('.vision_img4').fadeIn(400);
		$('.vision_img5').fadeIn(400);

//		$(window).scroll(function(){
//			var scltop = $(window).scrollTop();
//			$.each($vision_div, function(idx, item){
//				if (scltop <= 300) {
//					$('.vision_img2').delay(1000).fadeIn(400);
//				} else if (scltop <= 400) {
//					$('.vision_img3').delay(1000).fadeIn(400);
//				} else if (scltop <= 500) {
//					$('.vision_img4').delay(1000).fadeIn(400);
//				} else if (scltop <= 600) {
//					$('.vision_img5').delay(1000).fadeIn(400);
//				}
//			})
//		});

		$('.vision_map1').click(function(e){
			e.preventDefault();
			$vision_img5.hide();
			$vision_img5.eq(0).show();
		});
		$('.vision_map2').click(function(e){
			e.preventDefault();
			$vision_img5.hide();
			$vision_img5.eq(1).show();
		});
		$('.vision_map3').click(function(e){
			e.preventDefault();
			$vision_img5.hide();
			$vision_img5.eq(2).show();
		});

	});
	
	
	$(function(){
		// �쒕툕 �ㅻ퉬寃뚯씠��
		var $sncH2 = $('.sncUl li ul li h2 a');
		var $sndUl_list = $('.sndUl_list');

		$sncH2.click(function(e){
			e.preventDefault();

			var $target = $(this).parent().parent().parent().parent();
			var idx = $target.index()

			if(!$(this).hasClass('active')) {
				$sncH2.removeClass('active');
				$sndUl_list.stop().slideUp(400);
				$('.snd'+idx+'Ul_list').stop().slideDown(400);
			}else{
				$('.snd'+idx+'Ul_list').stop().slideUp(400);
			}

			$(this).toggleClass('active');

		});

		$('.subCont_wrap').mouseenter(function(){
			$sndUl_list.slideUp();
			$sncH2.removeClass('active');
			$('.sncUl li ul li h2 a').blur();
		});
	});
	
	
	
	// �쒕툕硫붾돱 �ㅻ퉬寃뚯씠�� �ㅽ겕濡�
	var subNav_wrap = $(".subNav_wrap"),
		subNav_m_wrap = $('.subNav_m_wrap');
	
    subNav_sticky = "subNav_sticky";
    subTop_wrap = $('.subTop_wrap').height();  
    
    $(window).scroll(function() {
  	//  console.log($(window).scrollTop())
 	
    	if($(window).scrollTop() > 200){
    		$('.subCont_wrap').css('padding','30px 0 20px');	
    	}else{
    		$('.subCont_wrap').css('padding','0 0 20px');
    	}
  	});
    
    
    

    if( $(window).width() >= 1200 ) { 
    	$(window).scroll(function() {
	  	  if( $(this).scrollTop() > subTop_wrap ) {
	  		subNav_wrap.addClass(subNav_sticky);		
	  	  } else {
	  		subNav_wrap.removeClass(subNav_sticky);		
	  	  }
	  	});
	}
    if( $(window).width() < 1200 ) {
		subNav_wrap.removeClass(subNav_sticky);
	}	
    
    $(window).resize(function(){
    	if( $(window).width() >= 1200 ) {   
        	$(window).scroll(function() {
    	  	  if( $(this).scrollTop() > subTop_wrap ) {
    	  		subNav_wrap.addClass(subNav_sticky);		
    	  	  } else {
    	  		subNav_wrap.removeClass(subNav_sticky);		
    	  	  }
    	  	});
    	}
        if( $(window).width() < 1200 ) {
    		subNav_wrap.removeClass(subNav_sticky);
    	}	
    })
    
    
    $(function(){
    	var acodian = {
    		click: function(target) {
    		var _self = this,
    			$target = $(target);
    			$target.on('click', function(e) {
    				e.preventDefault();
    				var $this = $(this);
    				if ($this.next('.accordion_wrap dd').css('display') == 'none') {
    					$('.accordion_wrap dd').slideUp();
    					_self.onremove($target);

    					$this.addClass('on');
    					$this.next().slideDown();
    				} else {
    					$('.accordion_wrap dd').slideUp();
    					_self.onremove($target);
    				}
    			});
    		},
    		onremove: function($target) {
    			$target.removeClass('on');
    		}
    	};
    	acodian.click('.accordion_wrap dt');
    });

    // ��찓��
    // jQuery(function($){
//     	// List Tab Navigation
//     	var tab_list = $('div.tab.list');
//     	var tab_list_i = tab_list.find('>ul>li');
//     	tab_list_i.find('>ul').hide();
//     	tab_list.find('>ul>li[class=active]').find('>ul').show();
//     	//tab_list.css('height', tab_list.find('>ul>li.active>ul').height()+100);
//     	function listTabMenuToggle(event){
//     		var t = $(this);
//     		tab_list_i.find('>ul').hide();
//     		t.next('ul').show();
//     		tab_list_i.removeClass('active');
//     		t.parent('li').addClass('active');
//     		//tab_list.css('height', t.next('ul').height()+100);
//     		return false;
//     	}
//     	tab_list_i.find('>a[href=#]').click(listTabMenuToggle).focus(listTabMenuToggle);
    // });

    // �쒕툕 �ㅻ퉬寃뚯씠��
    $(function () {

    	var $sub_depth1 = $('.subNav_m_cont > h2');
    	var $sub_depth2_wrap = $('.subNav_m_2depth');
    	var $sub_depth2 = $('.subNav_m_2depth > ul > li > a');
    	var $sub_depth3_wrap = $('.subNav_m_3depth');

    	$sub_depth1.on({
            click:function(e){
    			e.preventDefault();

    			if(!$(this).hasClass('on')){
    				$sub_depth2_wrap.slideDown(400);
    			} else {
    				$sub_depth2.removeClass('on');
    				$sub_depth2_wrap.slideUp(400);				
    			}

    			$(this).toggleClass('on');
            }
    	});

    	$sub_depth2.on({
            click:function(e){

    			var sub_depth3_wrap = $(this).next('div');

    			if( $(this).siblings('.subNav_m_3depth')[0] ) {	// depth2 踰꾪듉 �대┃ �� depth3_wrap �놁쑝硫� a 留곹겕 �ㅽ뻾
    				e.preventDefault();
    			}


    			if(!$(this).hasClass('on') == true){
    				$sub_depth2.removeClass('on');
    				$sub_depth3_wrap.slideUp(400);
    				sub_depth3_wrap.slideDown(400);
    			} else {
    				sub_depth3_wrap.slideUp(400);
    			}

    			$(this).toggleClass('on');
            }
    	});

    });





    /* Star Zoom Control */
    var Browser = { a : navigator.userAgent.toLowerCase() };
    Browser = {
    		ie : /*@cc_on true || @*/ false,
    		ie6 : Browser.a.indexOf('msie 6') != -1,
    		ie7 : Browser.a.indexOf('msie 7') != -1,
    		ie8 : Browser.a.indexOf('msie 8') != -1,
    		opera : !!window.opera,
    		safari : Browser.a.indexOf('safari') != -1,
    		safari3 : Browser.a.indexOf('applewebkit/5') != -1,
    		mac : Browser.a.indexOf('mac') != -1,
    		chrome : Browser.a.indexOf('chrome') != -1,
    		firefox : Browser.a.indexOf('firefox') != -1
    	};

    // 湲곕낯 Zoom
    var nowZoom = 100;
    // 理쒕� Zoom
    var maxZoom = 120;
    // 理쒖냼 Zoom
    var minZoom = 90;
    // 議곗젅 鍮꾩쑉
    var setZoom = 5;

    // �붾㈃�ш린 �뺣�
    var jsBrowseSizeUp = function() {

    	if( Browser.chrome ) {
    		if( nowZoom < maxZoom ) {
    			nowZoom += setZoom; // 5%�� 利앷�
    			document.body.style.zoom = nowZoom + "%";
    		}
    		else{
    			alert('理쒕� �뺣��낅땲��.');
    		}
    	}
    	else if( Browser.opera ) {
    		alert('�ㅽ럹�쇰뒗 �붾㈃�ш린 湲곕뒫�� 吏��먰븯吏� �딆뒿�덈떎.\n釉뚮씪�곗� �댁쓽 �뺣�/異뺤냼 湲곕뒫�� �댁슜�섏떆湲� 諛붾엻�덈떎.');
    	}
    	else if( Browser.safari || Browser.safari3 || Browser.mac ) {
    		alert('�ы뙆由�, 留μ� �붾㈃�ш린 湲곕뒫�� 吏��먰븯吏� �딆뒿�덈떎.\n釉뚮씪�곗� �댁쓽 �뺣�/異뺤냼 湲곕뒫�� �댁슜�섏떆湲� 諛붾엻�덈떎.');
    	}
    	else if( Browser.firefox ) {
    		alert('�뚯씠�댄룺�ㅻ뒗 �붾㈃�ш린 湲곕뒫�� 吏��먰븯吏� �딆뒿�덈떎.\n釉뚮씪�곗� �댁쓽 �뺣�/異뺤냼 湲곕뒫�� �댁슜�섏떆湲� 諛붾엻�덈떎.');
    	}
    	else {
    		if( nowZoom < maxZoom ) {
    			nowZoom += setZoom; //5%�� 利앷�
    			document.body.style.position = "relative";
    			document.body.style.zoom = nowZoom + "%";
    		}
    		else{
    			alert('理쒕� �뺣��낅땲��.');
    		}
    	}
    };

    // �붾㈃�ш린 異뺤냼
    var jsBrowseSizeDown = function() {

    	if( Browser.chrome ) {
    		if( nowZoom > minZoom ) {
    			nowZoom -= setZoom; //5%�� 利앷�
    			document.body.style.zoom = nowZoom + "%";
    		}
    		else{
    			alert('理쒖냼 異뺤냼�낅땲��.');
    		}
    	}
    	else if( Browser.opera ) {
    		alert('�ㅽ럹�쇰뒗 �붾㈃�ш린 湲곕뒫�� 吏��먰븯吏� �딆뒿�덈떎.\n釉뚮씪�곗� �댁쓽 �뺣�/異뺤냼 湲곕뒫�� �댁슜�섏떆湲� 諛붾엻�덈떎.');
    	}
    	else if( Browser.safari || Browser.safari3 || Browser.mac  ) {
    		alert('�ы뙆由�, 留μ� �붾㈃�ш린 湲곕뒫�� 吏��먰븯吏� �딆뒿�덈떎.\n釉뚮씪�곗� �댁쓽 �뺣�/異뺤냼 湲곕뒫�� �댁슜�섏떆湲� 諛붾엻�덈떎.');
    	}
    	else if( Browser.firefox ) {
    		alert('�뚯씠�댄룺�ㅻ뒗 �붾㈃�ш린 湲곕뒫�� 吏��먰븯吏� �딆뒿�덈떎.\n釉뚮씪�곗� �댁쓽 �뺣�/異뺤냼 湲곕뒫�� �댁슜�섏떆湲� 諛붾엻�덈떎.');
    	}
    	else {
    		if( nowZoom > minZoom ) {
    			nowZoom -= setZoom; //5%�� 利앷�
    			document.body.style.position = "relative";
    			document.body.style.zoom = nowZoom + "%";
    		}
    		else{
    			alert('理쒖냼 異뺤냼�낅땲��.');
    		}
    	}
    };

    // �붾㈃�ш린 �먮옒��濡�(100%)
    var jsBrowseSizeDefault = function() {
    	nowZoom = 100;
    	document.body.style.zoom = nowZoom + "%";
    };
    /* End Zoom Control */

    /* �뚯궗�뚭컻�곸긽 */
    $(function () {

    	$('.cv_list li a').click( function(e) {
    		e.preventDefault();

    		$('.cv_list li').removeClass('on');
    		if( !$(this).parent().hasClass('on') ) {
    			$(this).parent().addClass('on');
    		}
    	});

    });

    // �ъ쟾�뺣낫怨듦컻
    // $(function () {
    //
//     	var $preFormation_list = $('.preFormation_list li a');
//     	var $preFormation_cont = $('.preFormation_cont');
    //
//     	$preFormation_list.on({
//             click:function(e){
//     			e.preventDefault();
    //
//     			if(!$(this).hasClass('on')){
//     				$preFormation_list.removeClass('on');
//     				$preFormation_cont.stop().slideDown(400);
//     			} else {
//     				$preFormation_cont.stop().slideUp(400);
//     			}
    //
//     			$(this).toggleClass('on');
//             }
//     	});
    //
    // });

    // �꾨젰ICT�⑹뼱�ъ쟾
    $(function () {

    	var $initialConsonant_en = $('.initialConsonant_cont.en');
    	var $initialConsonant_ko = $('.initialConsonant_cont.ko');
    	var $btn_en = $('.btn_en');
    	var $btn_ko = $('.btn_ko');

    	$btn_en.on({
            click:function(){
    			$initialConsonant_en.show();
    			$initialConsonant_ko.hide();
            }
    	});

    	$btn_ko.on({
            click:function(){
    			$initialConsonant_en.hide();
    			$initialConsonant_ko.show();
            }
    	});

    });
    
    
    /*email*/
    $(document).ready(function(){
    	$("#email_3").change(function(){
    		var email_3 = $(this).val();
    		if(email_3 == "etc") { //吏곸젒�낅젰�쇰븣
    			$("input[name='email_2']").val('');  //�대찓�� �꾨찓�몄엯�λ컯�� 珥덇린��.
    			$("input[name='email_2']").attr('readonly', false); //吏곸젒�낅젰 媛��ν븯�꾨줉 readonly留됯린
    		}
    	   else {
    		   $("input[name='email_2']").val(email_3); //�대찓�� �꾨찓�� �낅젰諛뺤뒪�� �좏깮�� �몄뒪�몃벑濡�.
    		   $("input[name='email_2']").attr('readonly', true); //readonly濡� 吏곸젒�낅젰 留됯린.
    	   }
       });
    });


    /*allCheck*/
    $(function(){
    	$(".allCheck").click(function(){
    		if($(".allCheck").prop("checked")) {
    			$("input[type=checkbox]").prop("checked",true);
    		} else {
    			$("input[type=checkbox]").prop("checked",false);
    		}
    	})
    })

    /*Accessibility Layer Popup*/
    // �묎렐�� 愿��� �ъ빱�� 媛뺤젣 �대룞
    function accessibilityFocus() {
    	$(document).on('keydown', '[data-focus-prev], [data-focus-next]', function(e){
    		var next = $(e.target).attr('data-focus-next'),
    		prev = $(e.target).attr('data-focus-prev'),
    		target = next || prev || false;

    		if(!target || e.keyCode != 9) {
    			return;
    		}

    		if( (!e.shiftKey && !!next) || (e.shiftKey && !!prev) ) {
    			setTimeout(function(){
    				$('[data-focus="' + target + '"]').focus();
    			}, 1);
    		}
    	});
    }

    function tooltip() {
    	var openBtn = '[data-tooltip]',
    	closeBtn = '.tooltip-close';

    	function getTarget(t) {
    		return $(t).attr('data-tooltip');
    	}

    	function open(t) {
    		var showTarget = $('[data-tooltip-con="' + t + '"]');
    		showTarget.show().focus();
    		showTarget.find('.tooltip-close').data('activeTarget', t);
    	}

    	function close(t) {
    		var activeTarget = $('[data-tooltip-con="' + t + '"]');
    		activeTarget.hide();
    		$('[data-tooltip="' + t + '"]').focus();
    	}



    	$(document)
    	.on('click', openBtn, function(e){
    		e.preventDefault();

    		// �붾㈃�� �믪씠�� �덈퉬瑜� 蹂��섎줈 留뚮벊�덈떎.
    		//var maskHeight = $(document).height();
    		//var maskWidth = $(window).width();

    		// 留덉뒪�ъ쓽 �믪씠�� �덈퉬瑜� �붾㈃�� �믪씠�� �덈퉬 蹂��섎줈 �ㅼ젙�⑸땲��.
    		//$('.mask').css({'width':maskWidth,'height':maskHeight});

    		// fade �좊땲硫붿씠�� : 1珥� �숈븞 寃�寃� �먮떎媛� 80%�� 遺덊닾紐낆쑝濡� 蹂��⑸땲��.
    		$('.mask').fadeIn(1000);
    		$('.mask').fadeTo("slow",0.8);

    		// �덉씠�� �앹뾽�� 媛��대뜲濡� �꾩슦湲� �꾪빐 �붾㈃�� �믪씠�� �덈퉬�� 媛��대뜲 媛믨낵 �ㅽ겕濡� 媛믪쓣 �뷀븯�� 蹂��섎줈 留뚮벊�덈떎.
    		// var left = ( $(window).scrollLeft() + ( $(window).width() - $('.chart-pop').width()) / 2 );
    		// var top = ( $(window).scrollTop() + ( $(window).height() - $('.chart-pop').height()) / 2);

    		// css �ㅽ��쇱쓣 蹂�寃쏀빀�덈떎.
    		// $('.chart-pop').css({'left':left,'top': top, 'position':'absolute' });
    		//$('.chart-pop').css({ 'left':'50%','top': '50%', 'position':'fixed', 'margin-left': - $('.chart-pop').width() / 2, 'margin-top': - $('.chart-pop').height() / 2 });

    		// �덉씠�� �앹뾽�� �꾩썎�덈떎.
    		open(getTarget(e.target));
    	})
    	.on('click', closeBtn, function(e) {
    		e.preventDefault();
    		close($(this).data('activeTarget'));
    		$('.mask').hide();
    	 })

    	 // �� 寃��� 留덉뒪�щ� �대┃�쒖뿉�� 紐⑤몢 �쒓굅�섎룄濡� 泥섎━�⑸땲��.
    	 $('.mask').click(function () {
    		 $(this).hide();
    		 $('.chart-pop').hide();
    	 });
     }
    
    tooltip();
	accessibilityFocus();
	
	
	$(function(){
		/*
		if( $(window).width() < 1200 ) { // Tablet and Mobile
			if(!$('.originalView_wrap').parents('.oc_wrap')[0]) { // .oc_wrap(議곗쭅�꾩뿉�� �ъ슜)�� �덈뒗 遺�紐④� �놁쑝硫� �대깽�� on
				$('.originalView_wrap img').click( function() {
					doImgPop($(this).attr('src'));
				});

				$('.originalView_wrap button').click( function() {
					doImgPop($(this).parent().find('img:visible').attr('src'));
				});
			}
		}
		else {
			if(!$('.originalView_wrap').parents('.oc_wrap')[0]) { // .oc_wrap(議곗쭅�꾩뿉�� �ъ슜)�� �덈뒗 遺�紐④� �놁쑝硫� �대깽�� off
				$('.originalView_wrap img, .originalView_wrap button').off("click");
			}
		}
		*/

		// .originalView_wrap button click event
		$('.originalView_wrap button').click( function() {
			doImgPop($(this).parent().find('img:visible').attr('src'));
		});

		// [START] 議곗쭅�꾩슜 �꾩껜蹂닿린 踰꾪듉 �대┃ �대깽��
		var thisSrc,
				strSrc,
				largeImgSrc;

		$('.oc_wrap .originalView_wrap img').click( function() {
			thisSrc = $(this).attr('src'),
			strSrc = thisSrc.substr(0, thisSrc.length - 4),
			largeImgSrc = strSrc + "_1400.jpg";

			doImgPop(largeImgSrc);
		});

		$('.whole_btn').click( function() {
			thisSrc = $(this).parents('.oc_wrap').find('.originalView_wrap img').attr('src'),
			strSrc = thisSrc.substr(0, thisSrc.length - 4),
			//largeImgSrc = strSrc + "_1400.png"; // �뺤옣�� 蹂�寃�(png -> jpg). 2018.06.28
			largeImgSrc = strSrc + "_1400.jpg";

			doImgPop(largeImgSrc);
		});
		// [END]

	/*
		$(window).resize(function(){
			if( $(window).width() < 1200 ) { // Tablet and Mobile
				if(!$('.originalView_wrap').parents('.oc_wrap')[0]) { // .oc_wrap(議곗쭅�꾩뿉�� �ъ슜)�� �덈뒗 遺�紐④� �놁쑝硫� �대깽�� on
					$('.originalView_wrap img').click( function() {
						doImgPop($(this).attr('src'));
					});

					$('.originalView_wrap button').click( function() {
						doImgPop($(this).parent().find('img:visible').attr('src'));
					});
				}

			}
			else {
				if(!$('.originalView_wrap').parents('.oc_wrap')[0]) { // .oc_wrap(議곗쭅�꾩뿉�� �ъ슜)�� �덈뒗 遺�紐④� �놁쑝硫� �대깽�� off
					$('.originalView_wrap img, .originalView_wrap button').off("click");
				}
			}
		});
		*/
	});


	// �대�吏� �대┃�� �먮낯 �ш린濡� �앹뾽 蹂닿린
	function doImgPop(img){
		img1= new Image();
		img1.src=(img);
		imgControll(img);
	}

	function imgControll(img){
		if((img1.width!=0)&&(img1.height!=0)) {
	    viewImage(img);
	  }
	  else {
	     controller="imgControll('"+img+"')";
	     intervalID=setTimeout(controller,20);
	  }
	}
	function viewImage(img){
		W=img1.width;
		H=img1.height;
		O="width="+W+",height="+H+",scrollbars=yes";
		imgWin=window.open("","",O);
		imgWin.document.write("<html><head><title>�대�吏��곸꽭蹂닿린</title><meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' /></head>");
		imgWin.document.write("<body topmargin=0 leftmargin=0 style='width: 100%'>");
		imgWin.document.write("<img style='padding: 20px 20px 60px 20px;' src="+img+">");
		imgWin.document.write("<a href='javascript:window.close()' style='position: fixed; left: 0; bottom: 0; display: inline-block; width: 100%; text-align: center; padding: 10px; background-color: #555; color: #fff; text-decoration: none;'>�リ린</a>");
		imgWin.document.close();
	}


	$(function(){

		// function uploadChange(file) {
		// 	var el = file.parentNode.parentNode.getElementsByTagName("*");
		//
		// 	for( var i = 0; i < el.length; ++i ) {
		// 		var node = el[i];
		//
		// 		if( node.className == "file-text") {
		// 			node.innerHTML = file.value;
		// 			break;
		// 		}
		// 	}
		// }


	/*
		var uploadFile = $('.fileBox .uploadBtn');
		uploadFile.on('change', function(){
			if(window.FileReader){
				var filename = $(this)[0].files[0].name;
			}else{
				var filename = $(this).val().split('/').pop().split('\\').pop();
			}
			$(this).parent().find('.fileName').val(filename);
		});
	*/
	});










	/*tab*/

	$(function(){
		$('.video .tab li').click(function(e){
			e.preventDefault();
			var onTab = $(this).attr('data-tab');
			$('.video .tab li').removeClass('on');
			$('.video .tabContent').removeClass('on');
			$(this).addClass('on');
			$('#' + onTab).addClass('on');
		})
	});


	$(function(){
		$('.boardSwipe').click(function(e){
			e.preventDefault();
			$(this).fadeOut();
		})
	});


	/* �ъ씠�몃㏊ */
	$(function() {
		
		function siteMapPc() {
			if( $(window).width() >= 1200 ) { // PC
				
				if(!$('.sitemapAll').hasClass('on')){
					$('.sitemapUl > li > ul > li > a, .sitemapUl > li > ul > li > ul > li > a').off('click');
					
					$('.sitemapUl > li > ul > li > a, .sitemapUl > li > ul > li > ul > li > a').on('click', function(e) {
						if( $(this).siblings('ul')[0] ) {
							e.preventDefault();
						}
				
					});
					
					$('.sitemapUl > li > ul > li > a, .sitemapUl > li > ul > li > ul > li > a').on('click', function(e) {
						if( $(this).siblings('ul')[0] ) {
							e.preventDefault();
				
							if( !$(this).parent().hasClass('on') ) {
								$(this).parent().addClass('on');
							}
							else {				
								$(this).parent().removeClass('on');
							}
						}
					});
					/*
					$('.sitemapUl > li > ul > li').on('mouseleave blur', function(e) {
				
						if( $(this).find('ul')[0] ) {
							e.preventDefault();
				
							$(this).removeClass('on');
						}
				
					});	
					*/
				}else{
					return false;
				}
				
			}
		}
		
		function siteMapMobile() {
			if( $(window).width() < 1200 ) { // Tablet and Mobile
				$('.sitemapUl > li > ul > li > a, .sitemapUl > li > ul > li > ul > li > a').off('click mouseenter focus mouseleave blur');
				
				$('.sitemapUl > li > ul > li > a').on('click', function(e) {
					if( $(this).siblings('ul')[0] ) {
						e.preventDefault();
						
						if( !$(this).parent().hasClass('on') ) {
							$('.sitemapUl > li > ul > li, .sitemapUl > li > ul > li > ul > li').removeClass('on');
							$(this).parent().addClass('on');
						}
						else {				
							$(this).parent().removeClass('on');
						}
					}
			
				});
			
				$('.sitemapUl > li > ul > li > ul > li > a').on('click', function(e) {
					if( $(this).siblings('ul')[0] ) {
						e.preventDefault();
						
						if( !$(this).parent().hasClass('on') ) {
							$(this).parent().addClass('on');
						}
						else {				
							$(this).parent().removeClass('on');
						}
					}
			
				});
			}
		}
		
		siteMapPc();
		siteMapMobile();
		
		$(window).resize(function(){
			siteMapPc();
			siteMapMobile();
		});
		
		
		
	});
	
	
	/* �붾（�� ���쒖씠誘몄� */
	$('.overview_cont .owl-carousel').owlCarousel({
		items: 1,
		margin: 0,
		nav : true,
		loop : true
	});	
	
	
	$(function(){	
		$('.branchUl li a').click(function(e){
			e.preventDefault();

			var _idx = $('.branchUl a').index(this),		
				section = $('.mapsWrap > div').eq(_idx),
				offsetTop = section.offset().top;
			
			$('html, body').stop().animate({
				scrollTop :offsetTop + 0
			}, 800);
			return false;	
		});
	});
	
	
	
	$('.overview_cont .owl-dots button').each(function(index){
		var idx = index + 1;	
		$(this).children('span').append('<span class="skip">' + idx + '踰� 諛곕꼫</span>');		
	});
	
	if(($('.snd2Ul_wrap h2 a span').text() == '�ъ씠�몃㏊')||
		($('.snd2Ul_wrap h2 a span').text() == '�듯빀寃���')||
		($('.snd2Ul_wrap h2 a span').text() == '媛쒖씤�뺣낫痍④툒諛⑹묠')||
		($('.snd2Ul_wrap h2 a span').text() == '臾몄쓽泥�'))
	{
		$('.snd2Ul_list').css('width','33.33%')
	}
	
	/*das �덉갹*/
	$('.rntjdeh_wrap ul li a').attr('onclick', "window.open(this.href, '_blank', 'width="+$(window).width()+", height="+$(window).width()/2+", scrollbars=yes'); return false;")
	
	if( $(window).width() >= 1200 ) {
		$('.rntjdeh_wrap ul li a').attr('onclick', "window.open(this.href, '_blank', 'width=1400, height=800, scrollbars=yes'); return false;")
	}
	$(window).resize(function(){
		$('.rntjdeh_wrap ul li a').attr('onclick', "window.open(this.href, '_blank', 'width="+$(window).width()+", height="+$(window).width()/2+", scrollbars=yes'); return false;")
		
		if( $(window).width() >= 1200 ) {
			$('.rntjdeh_wrap ul li a').attr('onclick', "window.open(this.href, '_blank', 'width=1400, height=800, scrollbars=yes'); return false;")
		}
	});
	
	/*das focus*/
	$('.rntjdeh_cont').on('mouseenter focus', function(){
		$('.rntjdeh_detail').stop().fadeOut();	
		$(this).find('.rntjdeh_detail').stop().fadeIn();
	})
	
	$('.rntjdeh_detail a').on('click blur', function(){
		$(this).parent('.rntjdeh_detail').stop().fadeOut();
	});
	
	/*sitemap*/
	$('.sitemapAll button').on('click', function(){		
		
		$('.sitemapAll').toggleClass('on');			
		if($('.sitemapAll').hasClass('on')){
			$('.sitemapUl ul li').addClass('on');
			$(this).find('span').text('紐⑤몢�リ린');
			$('.sitemapUl a').off('mouseenter mouseover mouseleave mouseout focus blur')
		}else{
			$('.sitemapUl ul li').removeClass('on');
			$(this).find('span').text('紐⑤몢�닿린');
		}
		
	});
	
	//�쒕툕 top �ㅻ뜑怨좎젙
    $('.depth_wrap').css('top','120px');
    
    $(window).scroll(function () {    	
        if (!$('.quickPageUl li').hasClass('active')) {
            $('.quickPageUl').fadeOut();
        } else {
            $('.quickPageUl').fadeIn();
        }
       	$('.depth_wrap').removeClass('on');        		
    });
    
    /*�쒕툕 �щ씪�대뱶諛곕꼫*/
    $('.solution_img').after('<div class="solution_imgTxt"><strong>�붾（�섏씠誘몄� �쒕ぉ</strong></div>');
    if($('.subCont_wrap').hasClass('tabs')){
    	$('.tabContent.on .solution_imgTxt').html($('.tabContent.on .owl-item.active .overview_txt strong').text())
    	$('.tab li a').on('click', function(){
    		var _dataTab = $(this).parent().attr('data-tab');
        	$('div#'+_dataTab+' .solution_imgTxt').html($('div#' + _dataTab + ' .owl-item.active .overview_txt strong').text())    	
        	if($('div#' + _dataTab + ' .owl-item.active .overview_txt strong').text() == ''){
        		$('div#'+_dataTab+' .solution_imgTxt').html($('div#' + _dataTab + ' .owl-item .overview_txt strong').eq(0).text());
        	}
        });
    	$('.overview_cont .owl-nav button').on('click', function(){
    		$('.tabContent.on .solution_imgTxt').html($('.tabContent.on .owl-item.active .overview_txt strong').text())
        });
    	$('.owl-stage').on('touchend', function(){
        	$('.tabContent.on .solution_imgTxt').html($('.tabContent.on .owl-item.active .overview_txt strong').text())
        });
    	
    	$('.solution_img .owl-dots button').on('click', function(){
    		var _idx = 0 ;
    		$(this).each(function(idx){
    			_idx = $(this).index(idx);    			
    		});		
    		
    		$('.tabContent.on .solution_imgTxt').html($('.owl-stage').find('> .owl-item').not('.owl-item.cloned').find("div.overview_txt strong").eq(_idx).text());    		
    	});
    }else{
    	$('.solution_imgTxt').html($('.owl-item.active .overview_txt strong').text())
    	$('.overview_cont .owl-nav button').on('click', function(){
    		$('.solution_imgTxt').html($('.owl-item.active .overview_txt strong').text())
        });
    	$('.owl-stage').on('touchend', function(){
        	$('.solution_imgTxt').html($('.owl-item.active .overview_txt strong').text())
        });
    	$('.solution_img .owl-dots button').on('click', function(){
    		var _idx = 0 ;
    		$(this).each(function(idx){
    			_idx = $(this).index(idx);
    			console.log(_idx);
    		});		
    		
    		$('.solution_imgTxt').html($('.owl-stage').find('> .owl-item').not('.owl-item.cloned').find("div.overview_txt strong").eq(_idx).text());
    		console.log($('.owl-stage').find('> .owl-item').not('.owl-item.cloned').find("div.overview_txt strong").eq(_idx).text());
    	});
    }
	
    
    if($(window).width < 1200){
    	var _itemHeight = $(window).width() / 2;
        $('.overview_cont .owl-item').height(_itemHeight);
        $(window).resize(function(){
        	var _itemHeight = $(window).width() / 2;
            $('.overview_cont .owl-item').height(_itemHeight);
        });
        
        $('.owl-stage').on('touchend', function(){
        	$('.tabContent.on .solution_imgTxt').html($('.tabContent.on .owl-item.active .overview_txt strong').text())
        }); 

    }
    
    $('.noBg_2 li').on('click', function(){
    	var dataTab = $(this).attr('data-tab');    	
    	if($(this).attr('data-tab') == 'tab2'){
    		$('.contentBox.nobg_2').css('background','none');
    	}else{
    		$('.contentBox.nobg_2').css('background','#f3f4f7');
    	}
    });
    
    
    setTimeout(function(){
		if($(window).width() > 767){
			var ipapmHeight = $('.ipapm_wrap').height();
			var functionHeight = $('.function_wrap').height();
			
			if(ipapmHeight < functionHeight){		
				$('.ipapm_wrap').css('height',functionHeight + 2);		
			}else{
				$('.function_wrap').css('height',ipapmHeight + 2);
			}
		}else{
			$('.ipapm_wrap').css('height',"auto");		
			$('.function_wrap').css('height',"auto");
		}		
	}, 1000);
	
	$(window).resize(function(){
		if($(window).width() > 767){
			var ipapmHeight = $('.ipapm_wrap').height();
			var functionHeight = $('.function_wrap').height();
			
			console.log(ipapmHeight);
			console.log(functionHeight);
			
			if(ipapmHeight < functionHeight){		
				$('.ipapm_wrap').css('height',functionHeight + 2);		
			}else{
				$('.function_wrap').css('height',ipapmHeight + 2);
			}
		}else{
			$('.ipapm_wrap').css('height',"auto");		
			$('.function_wrap').css('height',"auto");
		}
	});
	
	var agent=navigator.userAgent.toLowerCase();
	if((navigator.appName == 'Netscape' && agent.indexOf('trident') != -1) || (agent.indexOf("msie") != -1)){		
		var popupBody = $('.browserPopup_wrap').parent().height();	
		$('.browserPopup_wrap').css({'height':popupBody, 'overflow':'auto'});
	}else{
		return false;
	}
});