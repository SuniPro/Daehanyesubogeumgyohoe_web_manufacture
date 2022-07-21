<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" type="text/css" href="<?=$sw_skin_url?>/css/mainslide.css">
<link rel="stylesheet" type="text/css" href="<?=$sw_skin_url?>/css/slick.css">
<script src="<?=$sw_skin_url?>/js/jquery.lettering.js"></script>
<script src="<?=$sw_skin_url?>/js/slick.min.js"></script>
<script src="<?=$sw_skin_url?>/js/mainslide.js"></script>
<?
include_once($sw_skin_path.'/skin.lib.php');

$movie_url="https://youtu.be/W0LHTWG-UmQ"; //유튜브 동영상 공유 URL 및 주소 또는 동영상 파일 경로 (파일은 mp4 권장)
$mov=sw_slide_skin_movie($movie_url);
?>

<?=latest("theme/mainslide","mainslide",3,50)?>
<!--
<section class="main-slider">
    <div class="item youtube">https://www.youtube.com/watch?v=NddFg70ot5A
        
	    <iframe class="embed-player slide-media" src="https://www.youtube.com/embed/NddFg70ot5A?t=133s&enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=1&playlist=NddFg70ot5A&start=1" frameborder="0" allowfullscreen style="height:100vh;"></iframe> 
		<p class="caption lh1-5 ko">소프트존 5.4<br>YOUTUBE SLIDE</p>
    </div>
</section>
-->
<script>
    var slideWrapper = $(".main-slider"),
    iframes = slideWrapper.find('.embed-player'),
    lazyImages = slideWrapper.find('.slide-image'),
    lazyCounter = 0;
    
    // POST commands to YouTube or Vimeo API
    function postMessageToPlayer(player, command) {
        if (player == null || command == null) return;
        player.contentWindow.postMessage(JSON.stringify(command), "*");
    }
    
    // When the slide is changing
    function playPauseVideo(slick, control) {
        var currentSlide, slideType, startTime, player, video;
        currentSlide = slick.find(".slick-current");
        slideType = currentSlide.attr("class").split(" ")[1];
        player = currentSlide.find("iframe").get(0);
        startTime = currentSlide.data("video-start");
        
        if (slideType === "vimeo") {
            switch (control) {
                case "play":
                if ((startTime != null && startTime > 0 ) && !currentSlide.hasClass('started')) {
                    currentSlide.addClass('started');
                    postMessageToPlayer(player, {
                        "method": "setCurrentTime",
                        "value" : startTime
                    });
                }
                postMessageToPlayer(player, {
                    "method": "play",
                    "value" : 1
                });
                break;
                case "pause":
                postMessageToPlayer(player, {
                    "method": "pause",
                    "value": 1
                });
                break;
            }
        } else if (slideType === "youtube") {
            switch (control) {
                case "play":
                postMessageToPlayer(player, {
                    "event": "command",
                    "func": "mute"
                });
                postMessageToPlayer(player, {
                    "event": "command",
                    "func": "playVideo"
                });
                break;
                case "pause":
                postMessageToPlayer(player, {
                    "event": "command",
                    "func": "pauseVideo"
                });
                break;
            }
        } else if (slideType === "video") {
            video = currentSlide.children("video").get(0);
            if (video != null) {
                if (control === "play"){
                    video.play();
                } else {
                    video.pause();
                }
            }
        }
    }
    
    // Resize player
    function resizePlayer(iframes, ratio) {
        if (!iframes[0]) return;
        var win = $(".main-slider"),
        width = win.width(),
        playerWidth,
        height = win.height(),
        playerHeight,
        ratio = ratio || 16/9;
        iframes.each(function(){
            var current = $(this);
            if (width / ratio < height) {
                playerWidth = Math.ceil(height * ratio);
                current.width(playerWidth).height(height).css({
                    left: (width - playerWidth) / 2,
                    top: 0
                });
            } else {
                playerHeight = Math.ceil(width / ratio);
                current.width(width).height(playerHeight).css({
                    left: 0,
                    top: (height - playerHeight) / 2
                });
            }
        });
    }
    
    // DOM Ready
    $(function() {
        // Initialize
        slideWrapper.on("init", function(slick){
            slick = $(slick.currentTarget);
            setTimeout(function(){
                playPauseVideo(slick,"play");
            }, 1000);
            resizePlayer(iframes, 16/9);
        });
        slideWrapper.on("beforeChange", function(event, slick) {
            slick = $(slick.$slider);
            playPauseVideo(slick,"pause");
        });
        slideWrapper.on("afterChange", function(event, slick) {
            slick = $(slick.$slider);
            playPauseVideo(slick,"play");
        });
        slideWrapper.on("lazyLoaded", function(event, slick, image, imageSource) {
            lazyCounter++;
            if (lazyCounter === lazyImages.length){
                lazyImages.addClass('show');
                // slideWrapper.slick("slickPlay");
            }
        });
        
        //start the slider
        slideWrapper.slick({
            fade:true,
            autoplay:true,
            autoplaySpeed:6000,
            lazyLoad:"progressive",
            speed:600,
            arrows:true,
            //dots:true,
            //arrows: true,
            cssEase:"cubic-bezier(0.87, 0.03, 0.41, 0.9)"
        });
    });
    
    // Resize event
    $(window).on("resize.slickVideoPlayer", function(){  
        resizePlayer(iframes, 16/9);
        
});
</script>
