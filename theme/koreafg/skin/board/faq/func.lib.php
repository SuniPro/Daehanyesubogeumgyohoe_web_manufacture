<?
function get_category_list(){
	global $board,$bo_table,$sca;

	$category_option = '';
	if ($board['bo_use_category']) {
		$is_category = true;
		$category_href = G5_BBS_URL.'/board.php?bo_table='.$bo_table;

		$category_option .= "<li ";
		if ($sca==''){
			$category_option .= "class='active'";
		}
		
		$category_option .="><a href='$category_href'>전체</a></li>";

		$categories = explode('|', $board['bo_category_list']); // 구분자가 , 로 되어 있음
		for ($i=0; $i<count($categories); $i++){
			$category = trim($categories[$i]);
			if ($category=='') continue;

			$category_option .= "<li ";
			if ($category==$sca) { // 현재 선택된 카테고리라면
				$category_option .= "class='active'";
			}
			$category_option .= "><a href='".($category_href."&amp;sca=".urlencode($category))."'>".$category_msg.$category."</a></li>";
		}
	}

	return $category_option;
}

function get_select_category_list(){
	global $board,$bo_table,$sca;

	$category_option = '';
	if ($board['bo_use_category']) {
		$is_category = true;
		$category_href = G5_BBS_URL.'/board.php?bo_table='.$bo_table;

		$category_option .= "<option value='' ";
		if ($sca==''){
			$category_option .= 'selected';
		}
		$category_option .= '>전체</option>';

		$categories = explode('|', $board['bo_category_list']); // 구분자가 , 로 되어 있음
		for ($i=0; $i<count($categories); $i++) {
			$category = trim($categories[$i]);
			if ($category=='') continue;
			$category_option .= "<option value='".($category_href."&amp;sca=".urlencode($category))."'";
			$category_msg = '';
			if ($category==$sca) { // 현재 선택된 카테고리라면
				$category_option .= 'selected';
			}
			$category_option .= '>'.$category_msg.$category.'</option>';
		}
	}

	return $category_option;
}
?>