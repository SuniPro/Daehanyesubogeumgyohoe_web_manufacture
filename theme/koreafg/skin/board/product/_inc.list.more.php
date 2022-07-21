<?
if(count($list)>=$list_page_rows){
?>
<button type='button' class='btn btn-sm btn-info btn-block more-search'><span>View More</span> <i class='fa fa-angle-double-down'></i></button>
<div class='alert alert-warning more-loader-btn'><span>Loading...</span> <i class="fa fa-spinner fa-pulse fa-fw"></i></div>
<? } ?>
<br />
<br />
<br />
<br />

<script type='text/javascript'>
var bo_table="<?=$bo_table?>";
var qstr="<?=str_replace('&amp;','&',$qstr)?>";
var page = "<?=$page?>";
var total = "<?=$total_page?>";
var bbs_url = "<?=G5_BBS_URL?>";
var url=bbs_url+'/board.php';

$(".more-search").on("click",function(){
	page ++;
	if(page<=total){
		$.ajax({
			type:"GET",
			url:url,
			timeout:10000,
			data:'bo_table='+bo_table+qstr+'&page='+page,
			beforeSend: function() { //ajax 시작전
				$(".more-search").hide();
				$(".more-loader-btn").show();
			},
			success:function(data){
				var html_data = data.match(/<div class=\'row product-item-row\'>([\S\s]+)<\/div>/);

				var new_elm=$(html_data[0]).find(".product-items");
				$(".product-item-row").append(new_elm).imagesLoaded(function(){
					$(".product-item-row").isotope('appended',new_elm);
				});
				if(page<=total){
					$(".more-search").show();
				}
				$(".more-loader-btn").hide();
			}
		});
	}else{
		$(".more-search").removeClass("btn-info").addClass("btn-light").addClass("disabled").prop("disabled",true).html("더이상 자료가 없습니다.");
	}
});
</script>