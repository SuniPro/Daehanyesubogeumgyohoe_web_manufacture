<?
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$bo_gallery_width=1920;
$bo_gallery_height=969;
//$thumb = $list[$i]['wr_movie_url'];
?>
<ul class="notice_box">
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
            echo "<li class='new'>";
                echo "<a href='{$list[$i][href]}'>";
                    echo "<div class='title'><p>{$list[$i][subject]}</p></div>";
                    echo "<em>$date</em>";
                echo "</a>";
            echo "</li>";        
        }
    ?>
</ul>
   

