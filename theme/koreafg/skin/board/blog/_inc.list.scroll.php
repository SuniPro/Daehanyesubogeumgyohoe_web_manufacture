<script type='text/javascript'>
var bo_table="<?=$bo_table?>";
var qstr="<?=$qstr?>";
var page = "<?=$page?>";
var total = "<?=$total_page?>";
var bbs_url = "<?=G5_BBS_URL?>";
var board_skin_url="<?=$board_skin_url?>";
var url=bbs_url+'/board.php?bo_table='+bo_table+qstr+'&amp;page=';
var is_isotope=true;

$(document).scroll(function() {
	var maxHeight = $(document).height();
	var currentScroll = $(window).scrollTop()+$(window).height();
	
	if (maxHeight<=currentScroll+100 && is_isotope){
		page ++;

		is_isotope=false;

		if(page<=total){
			$(".board-list-loader-wrap").show();

			$.ajax({
				type:"GET",
				url:url,
				timeout:10000,
				data:{"page":page},
				success:function(data){
					var html_data = data.match(/<div class=\'row blog-item-row\'>([\S\s]+)<\/div>/);

					var new_elm=$(html_data[0]).find(".blog-items");

					$(".blog-item-row").append(new_elm).imagesLoaded(function(){
						$(".blog-item-row").find(".blog-item-loading-wrap").fadeOut(300);
						$(".blog-item-row").isotope('appended',new_elm);
					});

					is_isotope=true;

					$(".board-list-loader-wrap").hide();
				}
			});
		}
	}
});
</script>