<div class="row">
	<div class="col">
		<div class="owl-carousel com-carousel">
			<div class="item">
				<a href='#'><img src='<?=$sw_skin_url?>/img/partner/com_img1.png'></a>
			</div>
			<div class="item">
				<a href='#'><img src='<?=$sw_skin_url?>/img/partner/com_img2.png'></a>
			</div>
			<div class="item">
				<a href='#'><img src='<?=$sw_skin_url?>/img/partner/com_img3.png'></a>
			</div>
			<div class="item">
				<a href='#'><img src='<?=$sw_skin_url?>/img/partner/com_img4.png'></a>
			</div>
		</div>
	</div>
</div>

<script type='text/javascript'>
var cc=$('.com-carousel');
cc.owlCarousel({
	margin:10,
	loop: true,
	autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
	responsive: {
		0: {
			items: 2
		},
		600: {
			items: 4
		},
		1000: {
			items: 6
		}
	}
})
</script>