<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css" media="screen">', 0);

?>

<div class="sub-title">
	<i class="fa fa-diamond"></i><?php echo $g5['title'];?>
</div>

<div class="point-skin">
	<table class="div-table table">
	<thead>
	<tr>
		<th class="text-center" scope="col">일시</th>
		<th class="text-center" scope="col">내용</th>
		<th class="text-center" scope="col">만료</th>
		<th class="text-center" scope="col">지급</th>
		<th class="text-center" scope="col">사용</th>
		<th width="20"></th>
	</tr>
	</thead>
	<tbody>
	<?php
	$sum_point1 = $sum_point2 = $sum_point3 = 0;

	$sql = " select *
				{$sql_common}
				{$sql_order}
				limit {$from_record}, {$rows} ";
	$result = sql_query($sql);
	for ($i=0; $row=sql_fetch_array($result); $i++) {
		$point1 = $point2 = 0;
		if ($row['po_point'] > 0) {
			$point1 = '+' .number_format($row['po_point']);
			$sum_point1 += $row['po_point'];
		} else {
			$point2 = number_format($row['po_point']);
			$sum_point2 += $row['po_point'];
		}

		$po_content = $row['po_content'];

		$expr = '';
		if($row['po_expired'] == 1)
			$expr = ' red';
	?>
	<tr>
		<td class="text-center"><?php echo $row['po_datetime']; ?></td>
		<td class="po-content"><?php echo $po_content; ?></td>
		<td class="text-center font-11<?php echo $expr; ?>">
			<?php if ($row['po_expired'] == 1) { ?>
			만료<?php echo substr(str_replace('-', '', $row['po_expire_date']), 2); ?>
			<?php } else echo $row['po_expire_date'] == '9999-12-31' ? '&nbsp;' : $row['po_expire_date']; ?>
		</td>
		<td class="text-right"><?php echo $point1; ?></td>
		<td class="text-right"><?php echo $point2; ?></td>
		<td></td>
	</tr>
	<?php
	}

	if ($i == 0)
		echo '<tr><td class="text-center" colspan="6">자료가 없습니다.</td></tr>';
	else {
		if ($sum_point1 > 0)
			$sum_point1 = "+" . number_format($sum_point1);
		$sum_point2 = number_format($sum_point2);
	}
	?>
	</tbody>
	<tfoot>
	<tr class="active">
		<th></th>
		<th scope="row">소계</th>
		<th></th>
		<td align="right"><b><?php echo $sum_point1; ?></b></td>
		<td align="right"><b><?php echo $sum_point2; ?></b></td>
		<td></td>
	</tr>
	<tr class="bg-black">
		<th></th>
		<th scope="row">보유포인트</th>
		<th></th>
		<td align="right"><b><?php echo number_format($member['mb_point']); ?></b></td>
		<td></td>
		<td></td>
	</tr>
	</tfoot>
	</table>
	
	<?php echo get_paging_custom(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr.'&amp;page='); ?>

	<p class="text-center">
		<button type="button" class="btn btn-dark btn-sm" onclick="window.close();">닫기</button>
	</p>
</div>