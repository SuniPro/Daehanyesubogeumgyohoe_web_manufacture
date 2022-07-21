<?
//메뉴를 반환
function get_menu_list($page_arr=array()){
	global $g5;

	$sql="select * from {$g5['menu_table']}
		where me_use='1'
		and length(me_code)='2'
		order by me_order,me_id";
	$result=sql_query($sql,false);

	$menu_data_topmenu="";
	$menu_data_momenu="";
	$menu_data_submenu="";
	for ($i=0; $row=sql_fetch_array($result); $i++){
		$sql2="select * from {$g5['menu_table']}
				where me_use='1'
				and length(me_code)='4'
				and substring(me_code, 1, 2)='{$row['me_code']}'
				order by me_order, me_id ";
		$result2=sql_query($sql2);
		$num2=sql_num_rows($result2);
			
		if($num2>0){
			$n ++;

			$menu_data_topmenu.="[menu href='$row[me_link]' target='_".$row[me_target]."' menu]";
			$menu_data_momenu.="[menu href='#' menu]";

			$menu_data_topmenu.=$row['me_name'];
			$menu_data_momenu.=$row['me_name'];

			$menu_data_topmenu.="[arrow]";
			$menu_data_momenu.="[arrow]";
			
			$menu_data_topmenu.="[submenu]";
			$menu_data_momenu.="[submenu]";

			for ($k=0; $row2=sql_fetch_array($result2); $k++){
				if($k>0){
					$menu_data_topmenu.="[divider]";
					$menu_data_momenu.="[divider]";
				}
			
				if($page_arr[page_title]==$row['me_name']){
					if($page_arr[page_sub_title]==$row2['me_name']){
						$menu_data_submenu.="[item href='$row2[me_link]' target='_".$row2[me_target]."' class='active' item]{$row2[me_name]} [item-arrow]";
					}else{
						$menu_data_submenu.="[item href='$row2[me_link]' target='_".$row2[me_target]."' item]{$row2[me_name]} [item-arrow]";
					}
				}
				
				$menu_data_topmenu.="[item href='$row2[me_link]' target='_".$row2[me_target]."' item]{$row2[me_name]} [item-arrow]";
				$menu_data_momenu.="[item href='$row2[me_link]' target='_".$row2[me_target]."' item]{$row2[me_name]} [item-arrow]";
				
			}

			$menu_data_topmenu.="[/submenu]";
			$menu_data_topmenu.="[/menu]";

			$menu_data_momenu.="[/submenu]";
			$menu_data_momenu.="[/menu]";
		}else{
			$menu_data_topmenu.="[menu href='$row[me_link]' target='_".$row['me_target']."' menu]";
			$menu_data_topmenu.=$row['me_name'];
			$menu_data_topmenu.="[/menu]";

			
			$menu_data_momenu.="[menu href='$row[me_link]' target='_".$row['me_target']."' menu]";
			$menu_data_momenu.=$row['me_name'];
			$menu_data_momenu.="[/menu]";
		}
	}

	$menu_data[topmenu]=$menu_data_topmenu;
	$menu_data[momenu]=$menu_data_momenu;
	$menu_data[submenu]=$menu_data_submenu;

	return $menu_data;
}

function get_page_title(){
	global $g5,
		$pagelist,
		$_SERVER,
		$qaconfig,
		$faq_list,
		$co,
		$fm,
		$fm_id,
		$bo_table,
		$board,
		$member,
		$group;

	$mkey="p00";
	$snum=000;
	$skey=0;
	$h_url=$_SERVER['PHP_SELF'];
	$r_url=$_SERVER['REQUEST_URI'];
	$r_url_arr=explode("?",$r_url);
	$r_url=$r_url_arr[1];
	$h_ary=explode('/',$h_url);
	$chk_url=$h_ary[count($h_ary)-1];
	//$pagelist[$mkey][]=array("000","NONAME",G5_URL."/".$chk_url,"self");

	if($co[co_id]){
		//내용관리
		$mkey="c00";
		$chk_url="/bbs/content.php?co_id=$co[co_id]";
		$pagelist[$mkey][]=array("000",$co['co_subject'],G5_URL."/".$chk_url,"self",true,true);
	}else if($qaconfig[qa_title]){
		//1:1 문의
		$mkey="q00";
		$chk_url="/bbs/qalist.php";
		$pagelist[$mkey][]=array("000",$qaconfig['qa_title'],G5_URL."/".$chk_url,"self",true,true);
	}else if($fm['fm_subject']){
		//faq
		$mkey="f00";
		$chk_url="/bbs/faq.php?fm_id=$fm_id";
		$pagelist[$mkey][]=array("000",$fm['fm_subject'],G5_URL."/".$chk_url,"self",true,true);
	}else if($bo_table){
		$mkey="b00";
		$chk_url="/bbs/board.php?bo_table=$bo_table";
		$pagelist[$mkey][]=array("000",$board[bo_subject],G5_URL."/".$chk_url,"self",true,true);
	}else if($group['gr_id']){
		$mkey="b00";
		$chk_url="/bbs/group.php?gr_id=$group[gr_id]";
		$pagelist[$mkey][]=array("000",$group[gr_subject],G5_URL."/".$chk_url,"self",true,true);
	}else{
		foreach($pagelist as $key => $val){
			for($i=0; $i<count($pagelist[$key]); $i++){
				$purl=$pagelist[$key][$i][2];
				if(strpos($purl,$chk_url)){
					$mkey=$key;
					$snum=$pagelist[$key][$i][0];
					$skey=$i;

					$is_break=true;
				}
			}

			if($is_break) break;
		}
	}
	
	//메뉴 설정에 지정된 메뉴
	$sql="SELECT * from {$g5['menu_table']}
	where me_link like '%{$chk_url}'";
	$row=sql_fetch($sql);

	if($row[me_id]){
		$s_code=substr($row[me_code],0,2);
		$mkey="m".$s_code;

		$k=0;

		if(strlen($row[me_code])==2){
			$pagelist[$mkey][]=array('000',$row[me_name],$row[me_link],$row[me_target],true,true);
		}else{
			$sql2="SELECT * from {$g5['menu_table']}
			where me_code='$s_code'";
			$row2=sql_fetch($sql2);

			$pagelist[$mkey][]=array('000',$row2[me_name],$row2[me_link],$row2[me_target],true,true);
		}
		
		$sql3="SELECT * from {$g5['menu_table']}
		where me_code like '{$s_code}%'
		and length(me_code)='4'
		and me_link='$row[me_link]'
		order by me_order, me_id";
		$res3=sql_query($sql3);

		for($i=0; $row3=sql_fetch_array($res3); $i++){
			$k ++;
			$l_code="0".substr($row3[me_code],2,2);
			if(strpos($row3[me_link],$chk_url)!== false){
				$snum=$l_code;
				$skey=$k;
			}

			$pagelist[$mkey][]=array($l_code,$row3[me_name],$row3[me_link],$row3[me_target],true,true);
		}
	}
	
	$pages=array();

	if($mkey){
		$pages[page]=$pagelist[$mkey];
		$pages[set]=$snum;
		$pages[page_title]=$pagelist[$mkey][0][1];
		$pages[page_link]=$pagelist[$mkey][0][2];
		$pages[page_target]=$pagelist[$mkey][0][3];
		$pages[page_sub_title]=$pagelist[$mkey][$skey][1];
		$pages[page_sub_link]=$pagelist[$mkey][$skey][2];
		$pages[page_sub_target]=$pagelist[$mkey][$skey][3];

		$pages[use_leftmenu]='y';
		$pages[use_pagetitle]='y';

		if($pagelist[$mkey][$skey][4]==false) $pages[use_leftmenu]='n';
		if($pagelist[$mkey][$skey][4]==true) $pages[use_leftmenu]='y';
		if($pagelist[$mkey][$skey][5]==false) $pages[use_pagetitle]='n';
		if($pagelist[$mkey][$skey][5]==true) $pages[use_pagetitle]='y';

		if($r_url) $pages[page_sub_link].="?$r_url";
	}
	return $pages;
}

//페이징의 디자인을 변경
function get_paging_custom($write_pages, $cur_page, $total_page, $url, $add=""){
    $url=preg_replace('#&amp;page=[0-9]*#', '', $url) . '&amp;page=';

    $str='';
    if ($cur_page > 1) {
        $str .= '<li class="page-item"><a href="'.$url.'1'.$add.'" class="page-link"><i class="fa fa-angle-double-left"></i></a></li>'.PHP_EOL;
    }

    $start_page=(((int)(($cur_page - 1 ) / $write_pages )) * $write_pages)+1;
    $end_page=$start_page + $write_pages - 1;

    if ($end_page >= $total_page) $end_page=$total_page;

    if ($start_page > 1){
		$str .= '<li class="page-item"><a href="'.$url.($start_page-1).$add.'" class="page-link"><i class="fa fa-angle-left"></i></a></li>'.PHP_EOL;
	}

    if ($total_page > 1) {
        for ($k=$start_page;$k<=$end_page;$k++) {
            if ($cur_page != $k)
                $str .= '<li class="page-item"><a href="'.$url.$k.$add.'" class="page-link">'.$k.'</a></li>'.PHP_EOL;
            else
                $str .= '<li class="page-item active"><a href="#" class="page-link">'.$k.'</a></li>'.PHP_EOL;
        }
    }

    if ($total_page > $end_page){
		$str .= '<li class="page-item"><a href="'.$url.($end_page+1).$add.'" class="page-link"><i class="fa fa-angle-right"></i></a></li>'.PHP_EOL;
	}

    if ($cur_page < $total_page) {
        $str .= '<li class="page-item"><a href="'.$url.$total_page.$add.'" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>'.PHP_EOL;
	}

    if ($str)
        return "<nav class='board-pagination'><ul class='pagination pagination-board pagination-board-sm'>$str</ul></nav>";
    else
        return "";
}

//SIWONS 스킨 로드
function sw_skin($skin,$option=array()){
	global $g5,$board,$is_member,$is_admin,$member;
	
	$sw_skin_path=SW_SKIN_PATH.'/'.$skin;
	$sw_skin_url=SW_SKIN_URL.'/'.$skin;

	$g5[sw_skin_path]=$sw_skin_path;
	$g5[sw_skin_url]=$sw_skin_url;

	include $sw_skin_path.'/skin.php';
}

//동영상 태그 반환
function sw_view_movie($url){
	if(gettype($url)=="array"){
		for($i=0; $i<count($url); $i++){
			$v_url=$url[$i];
			
			$chk_video=sw_check_video_url($v_url);
			if($chk_video){
				$tga_list[]=sw_get_video_tags($v_url);
			}
		}
	}else{
		$chk_video=sw_check_video_url($url);
		if($chk_video){
			$tga_list[]=sw_get_video_tags($url);
		}
	}

	return $tga_list;
}

//동영상 URL인지 체크
function sw_check_video_url($url){
	//보편적으로 많이 사용하는 동영상만 체크
	$host_list=array(
		array("youtu.be|www.youtube.com|m.youtube.com","youtube","유튜브"),
		array("vimeo.com","vimeo","비메오"),
		array("tvpot.daum.net|tv.kakao.com","daum","다음"),
		array("www.facebook.com","facebook","페이스북"),
		array("serviceapi.nmv.naver.com|serviceapi.rmcnmv.naver.com|tvcast.naver.com","naver","네이버")
	);

	$video_info="";
	
	for($i=0; $i<count($host_list); $i++){
		$chk_domain=explode("|",$host_list[$i][0]);
		for($s=0; $s<count($chk_domain); $s++){
			$info=@parse_url($url);

			if($info['host']==$chk_domain[$s]){
				$video_info=array($chk_domain[$s],$host_list[$i][1]);
				break;
			}
		}

		if($video_info) break;
	}

	return $video_info;
}

//동영상 URL에서 태그를 반환
function sw_get_video_tags($url,$w="480",$h="880"){
	$info=sw_get_video_info($url);

	$vlist = $info['vlist'] ? '&list='.$info['vlist'] : '';
	$start = $info['start'] ? '&start='.$info['start'] : '';
	$autoplay = ($autoplayvideo || $info['auto']) ? '&autoplay=1' : '';
	$show = '<iframe width="'.$w.'" height="'.$h.'" src="https://www.youtube.com/embed/'.$info['vid'].'?autohide=1&vq=hd720&wmode=opaque'.$vlist.$autoplay.$start.'" frameborder="0"'.$fullscreen.'></iframe>';

	return $show;
}

//동영상 URL에서 이미지를 반환
function sw_get_video_image($url,$is_thumb=false){
	$url_info=sw_get_video_info($url);

	if(!$is_thumb){
		$image="hqdefault.jpg";
	}else{
		$image="0.jpg";
	}

	$image_url="https://img.youtube.com/vi/{$url_info[vid]}/$image";

	return $image_url;
}

function sw_get_video_info($url){
	$info=@parse_url($url);
	if(isset($info['query']) && $info['query']){
		parse_str($info['query'],$query); 
	}

	if($info['host']=="youtu.be") { //유튜브
		$video['type']='youtube';
		$video['vid']=trim(str_replace("/","", trim($info['path'])));
		$video['vid']=substr($video['vid'], 0, 11);
		$video['vlist']=(isset($query['list']) && $query['list']) ? $query['list'] : '';
		$query['autoplay']=(isset($query['autoplay']) && $query['autoplay']) ? $query['autoplay'] : '';
		$video['auto']=(isset($option['auto']) && $option['auto']) ? $option['auto'] : $query['autoplay'];
		$video['start']=(isset($option['start']) && $option['start']) ? $option['start'] : $query['start'];
		$video['s']=(isset($option['s']) && $option['s']) ? $option['s'] : $query['s'];
	} else if($info['host']=="www.youtube.com" || $info['host']=="m.youtube.com") { //유튜브
		$video['type']='youtube';
		if(preg_match('/\/embed\//i', $video['video_url'])) {
			list($youtube_url, $youtube_opt)=explode("/embed/", $video['video_url']);
			$vids=explode("?", $youtube_opt);
			$video['vid']=$vids[0];
		} else {
			$video['vid']=(isset($query['v']) && $query['v']) ? $query['v'] : '';
			$video['vlist']=(isset($query['list']) && $query['list']) ? $query['list'] : '';
		}
		$query['autoplay']=(isset($query['autoplay']) && $query['autoplay']) ? $query['autoplay'] : '';
		$video['auto']=(isset($option['auto']) && $option['auto']) ? $option['auto'] : $query['autoplay'];
		$video['start']=(isset($option['start']) && $option['start']) ? $option['start'] : $query['start'];
		$video['s']=(isset($option['s']) && $option['s']) ? $option['s'] : $query['s'];
	}

	return $video;
}
?>