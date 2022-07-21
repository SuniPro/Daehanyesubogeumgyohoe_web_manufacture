<?
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_LIB_PATH.'/thumbnail.lib.php');

add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$bo_gallery_width=1920;
$bo_gallery_height=969;
//$thumb = $list[$i]['wr_movie_url'];
?>
<section class="main-slider">
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
            if($thumb['src']){
                echo "<div class='item image'>";
                    echo "<figure>";
                        echo "<div class='slide-image slide-media' style='background-image:url({$thumb['src']});'>";
                            echo "<img data-lazy='$thumb[src]' class='image-entity'/>";
                        echo "</div>";
                        echo "<p class='caption lh1-5 ko'>{$list[$i][content]}</p>";
                    echo "</figure>";
                echo "</div>";
            } else if ($list[$i]['wr_movie_url']) {
                echo "<div class='item youtube'>";
                    $movie_code = explode("watch?v=", $list[$i]['wr_movie_url']);
                    echo "<iframe class='embed-player slide-media' src='https://www.youtube.com/embed/$movie_code[1]?t=133s&enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=1&playlist=$movie_code[1]&start=1' frameborder='0' allowfullscreen style='height:100vh;'></iframe>";
                    echo "<p class='caption lh1-5 ko'>복음교회 영상</p>";
                echo "</div>";
            }
        }
    ?>
</section>

