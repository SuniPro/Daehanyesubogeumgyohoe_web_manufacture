$(function(){
	$(".tab-content").find(".tab-more").show(); //탭형 최신글 스킨에서는 더보기 버튼을 표시
	$('[data-toggle="tooltip"]').tooltip();
});

//검색어 입력창 체크 스크립트
function fsearchbox_submit(f){
	if (f.stx.value.length < 2) {
		alert("검색어는 두글자 이상 입력하십시오.");
		f.stx.select();
		f.stx.focus();
		return false;
	}

	// 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
	var cnt = 0;
	for (var i=0; i<f.stx.value.length; i++) {
		if (f.stx.value.charAt(i) == ' ')
			cnt++;
	}

	if (cnt > 1) {
		alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
		f.stx.select();
		f.stx.focus();
		return false;
	}

	return true;
}