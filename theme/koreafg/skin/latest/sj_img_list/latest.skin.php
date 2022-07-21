<?
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$bo_gallery_width=400;
$bo_gallery_height=260;
?>

<div class="container m-g">	
	<div class="row">
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
                
                echo "<div class='col-md-4' style='margin-bottom:20px;'>";
                    echo "<div class='card-group'>";
                        echo "<div class='card'>";
                            echo "<a href='{$list[$i][href]}'>";
                                echo "<div class='img-gallery-item img-over' data-url='{$list[$i][href]}' data-img='{$thumb[ori]}'>";
                                    echo "<div class='img_box'>";
                                        if($thumb['src']){
                                            echo "<img src='$thumb[src]' class='img-fluid' style='width:100%;'>";
                                        }else{
                                            echo "<img src='$latest_skin_url/noimage.png' class='img-fluid' style='width:100%;'>";
                                        }                                        
                                    echo "</div>";
                                echo "</div>";
                            echo "</a>";
                            echo "<div class='card-body'>";
                                echo "<h5 class='card-title ks4'><a href='{$list[$i][href]}'><strong style='font-size:20px;'>{$list[$i][subject]}</strong></a></h5>";                               
                                //echo "<p class='card-text ks3 f14' style='height:75px;'>{$list[$i][content]}</p>";
                                echo "<p class='card-text ks3 f14' style='height:75px;'>" . cut_str($list[$i]['content'], 100) . "</p>";
                                echo "<p class='card-text'><small class='text-muted'>{$list[$i][datetime]}</small></p>";
                            echo "</div>";
                            
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
        ?>
    </div>
</div>

