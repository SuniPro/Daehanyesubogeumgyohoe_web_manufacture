$(function() {
    relateSiteSlide();
    setTimeout(function() {
        $('body').addClass('start');
    }, 100);
    $('#gnb').gnb();    
    $('.all-menu').click(function() {
        $(this).toggleClass('active');
        $('#header').toggleClass('allmenu-active');
        $('#gnb_all .topmenu_all .mnfirst > a').focus();
    });    
    $('#gnb_all .topmenu_all .mnlast .sublast a').on('focusout', function(){
        $('.headerWrap .etc .mn .last a').focus();
    });  
    $('#header').mouseover(function() {
        $(this).addClass('active');
    });
    $('#header').mouseout(function() {
        $(this).removeClass('active');
    });      
});

function relateSiteSlide() { }
(function($) {
    $.fn.gnb = function(options) {
        var settings = $.extend({
            'actionType': 'mouseenter focusin', // 메뉴가 동작하는 액션 (반응형일 때는 무조건 click)
            'classAdd': '#header', // 활성화 시 클래스가 추가되는 요소 (공란일 경우 오버되는 a 링크 부모 li에만 클래스 추가됨)
            'responsive': true, // 반응형일 때
            'responsiveWidth': '1024', // 반응형 가로 사이즈 (+1)
            'responsiveBtn': true, // true 시 PC에서도 주메뉴를 전체메뉴로 사용, false 시 반응형일 때 메뉴 활성화 버튼으로 사용
            'controller': '.AllMn', // 사이트맵 등에 사용될 버튼명 (반응형일 때 메뉴 활성화 버튼으로 사용)
            'controllerActive': '#header', // 컨트롤러를 눌렀을 때 클래스가 추가되는 요소
            'controllerClass': 'active' // 컨트롤러를 눌렀을 때 추가되는 클래스명
        },
        options);        
        return this.each(function() {
            var $selecter = $(this);            
            if (settings.responsive == true) {
                $(window).on('load resize', function() {
                    $(document).off('mousemove');
                    $selecter.off();
                    $selecter.find('a').off();
                    if ($(window).width() >= settings.responsiveWidth) {
                        gnbAction();
                    }                    
                }).resize();
            }           
            function gnbAction() {
                // 메뉴 활성화
                $selecter.find('a').on(settings.actionType, function() {
                    // 황서화시 클래스 추가
                    $selecter.find('li').removeClass('active');
                    $(this).parent('li').addClass('active');
                    
                    if ($(this).parents('.submenu').length > 0) {
                        $(this).parents('li').siblings('li').removeClass('active');
                        $(this).parents('li').addClass('active');
                    }
                    
                    // 활성화 시 클래스가 추가되는 요소가 존재하는 경우
                    if (settings.classAdd != '') {
                        $(settings.classAdd).addClass('active');
                    }
                });
                gnbOut();
            }
            
            function gnbOut() {
            }
            
            function gnbControl() {
                $('#header').find(settings.controller).on('click', function() {
                    $('#header').removeClass('fixed');
                    if ($(settings.controllerActive).hasClass(settings.controllerClass) == false) {
                        $('html, body').scrollTop(0);
                        $(settings.controllerActive).addClass(settings.controllerClass);
                    }
                    else {
                        $(settings.controllerActive).removeClass(settings.controllerClass);
                    }
                    return false;
                });
            }
        });
    };
}
(jQuery));

