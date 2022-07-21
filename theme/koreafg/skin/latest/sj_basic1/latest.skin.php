<?
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$bo_gallery_width=1920;
$bo_gallery_height=969;
//$thumb = $list[$i]['wr_movie_url'];
?>

<div class="lt_notice"> 
    <div class="owl-carousel owl-theme latest-carousel">
        <?
            for ($i=0; $i<count($list); $i++) {
                if($list[$i][wr_thumb]){
                    $thumb[src]=$list[$i][wr_thumb];
                    $thumb[ori]=$thumb[src];
                }
                else{
                    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $bo_gallery_width, $bo_gallery_height, false, true);
                }

                $date=date("m-d",strtotime($list[$i]['wr_datetime']));
                $list[$i][content]=cut_str(strip_tags($list[$i][content]),150);
                
                echo "<div class='a-item'>";
                    echo "<div class='page'>";
                        echo "<a href='{$list[$i][href]}' class='info'>";
                            echo "<div class='date'>$date</div>";
                            echo "<div class='subject'><strong>{$list[$i][subject]}</strong></div>";
                            echo "<div class='substance'>{$list[$i][content]}</div>";
                        echo "</a>";
                        echo "<input type='button' class='more' value='자세히 보기' onClick='location.href='http://sample26.tloghost.kr/bbs/board.php?bo_table=tl_notice&amp;wr_id=3'>";
                    echo "</div>";
                echo "</div>";
            }
        ?>
        
        
    </div>    
</div>



