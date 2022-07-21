<?
if(!function_exists("get_latest_category_list")){
	function get_latest_category_list($bo_table){
		global $g5;

		$board=sql_fetch(" select * from {$g5['board_table']} where bo_table = '$bo_table' ");

		$category_option = '';
		if ($board['bo_use_category']){
			$is_category = true;
			$category_href = G5_BBS_URL.'/board.php?bo_table='.$bo_table;

			$category_option .= "<div data-filter='*' class='current ";
			if ($sca==''){
				$category_option .= "active";
			}
			$category_option .= "' data-href='{$category_href}'><a href='#' {$a_option}>ALL</a></div>";

			$categories = explode('|', $board['bo_category_list']); // 구분자가 , 로 되어 있음
			for ($i=0; $i<count($categories); $i++){
				$a_option="";
				$category = trim($categories[$i]);
				if ($category=='') continue;
				
				$href=$category_href."&amp;sca=".urlencode($category);
				$cate_name=md5($category);
				
				$category_option .= "<div ";
				if ($category==$sca) { // 현재 선택된 카테고리라면
					$category_option .= 'class="active"';
				}

				$category_option .= "data-filter='.{$cate_name}' data-href='{$href}'><a href='#' {$a_option}>".$category_msg.$category."</a></div>";
			}
		}

		return $category_option;
	}
}
?>