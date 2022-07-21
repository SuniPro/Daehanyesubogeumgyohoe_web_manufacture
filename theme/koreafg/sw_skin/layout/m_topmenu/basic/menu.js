/************************
*************************
    Mobile Menu v1.0
    (c) 2015 George Lieu
    licensed under MIT
************************
************************/

;(function($) {
    'use strict';    
    $.fn.mobileMenu = function(options) {        
        var defaults = {
            MenuWidth    : 250,
            OpenSlideSpeed    : 1,
            CloseSlideSpeed    : 1,
            WindowsMaxWidth : 767,
            PagePush     : true,
            FromLeft     : true,
            Overlay  : true,
            CollapseMenu : true,
            ClassName : "mobile-menu",
			isAni : false,
			OpenEasing : "Power3.easeInOut",
			CloseEasing : "Power3.easeInOut",
			CloseBtn:true
        };        
        return this.each(function() {
            var config = $.extend({}, defaults, options);            
            var self = $(this);
            var overlay = $('#mobile-overlay'), body = $('body'), page = $('#page'), isOpen = false, expandOneHasOpened = false, expandTowHasOpened = false;
            var expandheight = 0, mmCssClass = "";
            mmInit();
            $('.mm-toggle').click(function() {
                self.css({'height':($(window).height()+$("#mobile-top-wrap").outerHeight())+"px"});

                if (config.Overlay == true) {
                    overlay.css('height', $(window).height());
                }                
                !isOpen ? mmOpen() : mmClose();
            });            
            function mmInit (){
				if(config.CloseBtn==false){
					self.find(".mobile-menu-close").hide();
				}

                if (config.FromLeft == true) {
					self.find(".mobile-menu-close").addClass("mmc-l");
                    self.css('left', -(config.MenuWidth));
                } else {
					self.find(".mobile-menu-close").addClass("mmc-r");
                    self.css('right', -(config.MenuWidth));
                }
                self.find('ul:first').addClass(config.ClassName);
                mmCssClass = config.ClassName;
                
                self.css('width', config.MenuWidth);
                self.find('.'+mmCssClass+' ul').css('display', 'none');
            }               
            function getMmHeight() {
                var totalHeight = 0;
                var docHeight = $(window).height()+$("#mobile-top-wrap").outerHeight();// - $("#mobile-top-wrap").outerHeight();
				
                self.find('.'+mmCssClass+' > li').each(function(i){
                    var mmItemHeight = $(this).height();
                    totalHeight += mmItemHeight;
                });
                if (docHeight >= totalHeight ) {
                    totalHeight = docHeight;
                }
				
                return docHeight;
            }

            function mmOpen() {				
                body.addClass('mmPushBody');
				$(".menu-trigger").addClass("active");

                if (config.Overlay == true) {
                    overlay.addClass('mm-overlay');
                } else {
                    overlay.addClass('mm-overlay').css('opacity', 0);
                }
                self.css({display : 'block'});
                if (config.FromLeft == true) {
                    if (config.PagePush == true) {
						if(config.isAni==false){
							TweenLite.killTweensOf(page);
							TweenLite.to(page,config.OpenSlideSpeed,{
								"left":config.MenuWidth,
								ease:config.OpenEasing,
								onStart:function(){
									config.isAni=true;
								},
								onComplete:function(){
									config.isAni=false;
								}
							});
						}
                    }
					if(config.isAni==false){
						TweenLite.killTweensOf(self);
						TweenLite.to(self,config.OpenSlideSpeed,{
							"left":0,
							ease:config.OpenEasing,
							onStart:function(){
								config.isAni=true;
							},
							onComplete:function(){
								self.css('height', getMmHeight());            
								isOpen = true;
								config.isAni=false;
							}
						});
					}
                } else {
                    if (config.PagePush == true) {
						if(config.isAni==false){
							TweenLite.killTweensOf(page);
							TweenLite.to(page,config.OpenSlideSpeed,{
								"left":-(config.MenuWidth),
								ease:config.OpenEasing,
								onStart:function(){
									config.isAni=true;
								},
								onComplete:function(){
									config.isAni=false;
								}
							});
						}
                    }
					if(config.isAni==false){
						TweenLite.killTweensOf(self);
						TweenLite.to(self,config.OpenSlideSpeed,{
							"right":0,
							ease:config.OpenEasing,
							onStart:function(){
								config.isAni=true;
							},
							onComplete:function(){
								self.css('height', getMmHeight());            
								isOpen = true;
								config.isAni=false;
							}
						});
					}
                }
                if(!expandOneHasOpened) {
                    expandOneHasOpened = true;
                } 
            }
            function mmClose() {
				$(".menu-trigger").removeClass("active");
                if (config.FromLeft == true) {
                    if (config.PagePush == true) {
						if(config.isAni==false){
							TweenLite.killTweensOf(page);
							TweenLite.to(page,config.CloseSlideSpeed,{
								"left":0,
								ease:config.CloseEasing,
								onStart:function(){
									config.isAni=true;
								},
								onComplete:function(){
									config.isAni=false;
								}
							});
						}
					}
					if(config.isAni==false){
						TweenLite.killTweensOf(self);
						TweenLite.to(self,config.CloseSlideSpeed,{
							"left":-(config.MenuWidth),
							ease:config.CloseEasing,
							onStart:function(){
								config.isAni=true;
							},
							onComplete:function(){
								body.removeClass('mmPushBody');
								overlay.css('height', 0).removeClass('mm-overlay');
								self.css('display', 'none');
								isOpen = false;
								config.isAni=false;
							}
						});
					}
                } else {
                    if (config.PagePush == true) {
						if(config.isAni==false){
							TweenLite.killTweensOf(page);
							TweenLite.to(page,config.CloseSlideSpeed,{
								"left":0,
								ease:config.CloseEasing,
								onStart:function(){
									config.isAni=true;
								},
								onComplete:function(){
									config.isAni=false;
								}
							});
						}
                    }
					if(config.isAni==false){
						TweenLite.killTweensOf(self);
						TweenLite.to(self,config.CloseSlideSpeed,{
							"right":-(config.MenuWidth),
							ease:config.CloseEasing,
							onStart:function(){
								config.isAni=true;
							},
							onComplete:function(){
								body.removeClass('mmPushBody');
								overlay.css('height', 0).removeClass('mm-overlay');
								self.css('display', 'none');            
								isOpen = false;
								config.isAni=false;
							}
						});
					}                
                }                
            }
            $(window).resize(function() {
                if ($(window).width() >= config.WindowsMaxWidth && isOpen) { 
                    if (self.css('left') != -(config.MenuWidth)) {
                        mmClose();
                    }
                }
            });

			$('#mobile-menu > .mobile-menu-close').click(function(){
				mmClose();
			});
			
            // second level menu
            $('.'+mmCssClass+' > li a').click(function(){
				if (config.CollapseMenu == true){
                    var secondLevelSpan = $('.'+mmCssClass+' li');
                    if (secondLevelSpan.hasClass('open') && $(this).next().next().css('display') === 'none') {   
                        $('.'+mmCssClass+' li ul').slideUp(500,"Power3.easeOut");

						$(this).find("i").stop().animate({"rotateZ":0});
                    }
                }

				if($(this).nextAll('.'+mmCssClass+' ul').is(":visible") != true){
					if($(this).attr('smenu')!='1'){
						$("#mobile-menu").find('.'+mmCssClass+' a i').stop().animate({"rotationZ":"0"},"2000","Power3.easeOut");
						$("#mobile-menu").find('.'+mmCssClass+' ul').slideUp(500,"Power3.easeOut");
					}
				}
				
				var obj=$(this).parent();
				if(obj.find("ul").is(":visible")){
					$(this).find("i").stop().animate({"rotationZ":"0"},"2000","Power3.easeOut");
				}else{
					$(this).find("i").stop().animate({"rotationZ":"405deg"},"2000","Power3.easeOut");
				}

                $(this).nextAll('.'+mmCssClass+' ul').slideToggle({
					"complete":function(){
						if (config.CollapseMenu == true) {
							$(this).promise().done(function(){
								self.css('height', getMmHeight());
							});
						} else {
							self.css('height', getMmHeight());
						}
					}
				},300,"Power3.easeOut");

                $(this).toggleClass('open');

                if(!expandTowHasOpened) {
                    expandTowHasOpened = true;
                }
            });
            overlay.click(function(){
                 mmClose();
            });
        });
    };    
})(jQuery);