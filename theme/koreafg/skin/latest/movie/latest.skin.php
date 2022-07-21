<?
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$bo_gallery_width=270;
$bo_gallery_height=300;
?>
<div class="con01 on">    
    <div class="inner">
		<ul>
            <?
                for ($i=0; $i<count($list); $i++) {
                    if($list[$i][wr_thumb]){
                        $thumb[src]=$list[$i][wr_thumb];
                        $thumb[ori]=$thumb[src];
                    }else{
                        $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $bo_gallery_width, $bo_gallery_height, false, true);
                    }
		
                    $date=date("m-d",strtotime($list[$i]['wr_datetime']));
                    $list[$i][content]=cut_str(strip_tags($list[$i][content]),150);
                    echo "<li>";
                        echo "<a href='{$list[$i][href]}'>";
                            echo "<div class='img-gallery-item img-over' data-url='{$list[$i][href]}' data-img='{$list[$i][wr_movie_url]}'>";
                                echo "<div class='img_box'>";
                                    if($thumb['src']){
                                        echo "<img src='$thumb[src]' class='img-fluid' style='width:100%;'>";
                                    }else{
                                        echo "<img src='$latest_skin_url/noimage.png' class='img-fluid' style='width:100%;'>";
                                    }
                                echo "</div>";
                            echo "</div>";
                            echo "<div class='text_box'>";
                                echo "<span>NEWS</span>";
                                echo "<strong>{$list[$i][subject]}</strong>";
                                echo "<p>{$list[$i][content]}</p>";
                            echo "</div>";
                        echo "</a>";
                    echo "</li>";
                }
            ?>
        </ul>	
	</div>
</div>

