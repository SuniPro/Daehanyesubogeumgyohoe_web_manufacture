<?
function sns_share_icon($url, $title, $img='', $icon='', $eol='') {
	global $g5,$config;
	
	$sns_url = $url;
	$sns_msg = str_replace('\"', '"', strip_tags($title));
	$sns_msg = str_replace('\'', '', $sns_msg);
	$sns_send  = G5_BBS_URL.'/sns_send.php?longurl='.urlencode($sns_url).'&amp;title='.urlencode($sns_msg);
	$sns_img = ($icon) ? $icon : $g5[sw_skin_url].'/img/sns';

	$eol = ($eol) ? '' : PHP_EOL;
	
	$is_kakao = false;
	if($config['cf_kakao_js_apikey'] && IS_MOBILE_DEVICE) {
		if(!defined('G5_KAKAO')) {
			define('G5_KAKAO', true);
			echo '<script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>'.PHP_EOL;
			echo '<script src="'.G5_JS_URL.'/kakaolink.js"></script>'.PHP_EOL;
			echo '<script>Kakao.init("'.$config['cf_kakao_js_apikey'].'");</script>'.PHP_EOL;
		}

		$is_kakao = true;
	}

	$sns = array();
	$sns[] = array('facebook', 'facebook', 'Facebook','페이스북');
	$sns[] = array('twitter', 'twitter', 'Twitter','트위터');
	$sns[] = array('googleplus', 'gplus', 'GooglePlus','구글 플러스');
	$sns[] = array('kakaostory', 'kakaostory', 'KakaoStory','카카오스토리');
	$sns[] = array('kakaotalk', 'kakaotalk', 'KakaoTalk','카카오톡');
	$sns[] = array('naverband', 'naverband', 'NaverBand','네이버 밴드');
	$sns[] = array('naver', 'naver', 'Naver','네이버');
	$sns[] = array('tumblr', 'tumblr', 'Tumblr','텀블러');
	$sns[] = array('pinterest', 'pinterest', 'Pinterest','핀터레스트');

	$sns_cnt = count($sns);

	$sns_icon = '';
	for($i=0; $i < $sns_cnt; $i++) {

		$sns_href = $sns_send.'&amp;sns='.$sns[$i][1];

		if($sns[$i][0] == 'pinterest') {

			if(!$img) continue;

			$sns_href .= '&amp;img='.urlencode($img);
		}

		if($sns[$i][0] == 'kakaotalk') {

			if(!$is_kakao) continue;

			$thumb = ($img) ? sns_thumbnail($img, 300, 0) : array('src'=>'', 'height'=>'');
			$sns_icon .= '<li><a href="'.$sns_href.'" onclick="kakaolink_send(\''.$sns_msg.'\',\''.$sns_url.'\',\''.$thumb['src'].'\', \'300\', \''.$thumb['height'].'\'); return false;" target="_blank">';
			$sns_icon .= '<img src="'.$sns_img.'/'.$sns[$i][0].'.png" class="sns-icon" data-original-title="'.$sns[$i][3].'" data-toggle="tooltip" data-html="true" data-placement="top"></a></li>'.$eol;
		} else {
			$sns_icon .= '<li><a href="'.$sns_href.'" onclick="send_sns(\''.$sns[$i][0].'\',\''.$sns_href.'\'); return false;">';
			$sns_icon .= '<img src="'.$sns_img.'/'.$sns[$i][0].'.png" target="_blank" class="sns-icon" data-original-title="'.$sns[$i][3].'" data-toggle="tooltip" data-placement="top"></a></li>'.$eol;
		}
	}

    return $sns_icon;
}

echo sns_share_icon('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], SW_COMPANY_NAME, $seometa['img']['src']);
?>

<script type='text/javascript'>
function send_sns(id,url) {
	switch(id) {
		case 'facebook'		: window.open(url, "win_facebook", "menubar=0,resizable=1,width=600,height=400"); break;
		case 'twitter'		: window.open(url, "win_twitter", "menubar=0,resizable=1,width=600,height=400"); break;
		case 'googleplus'	: window.open(url, "win_googleplus", "menubar=0,resizable=1,width=600,height=600"); break;
		case 'naverband'	: window.open(url, "win_naverband", "menubar=0,resizable=1,width=410,height=540"); break;
		case 'naver'		: window.open(url, "win_naver", "menubar=0,resizable=1,width=450,height=540"); break;
		case 'kakaostory'	: window.open(url, "win_kakaostory", "menubar=0,resizable=1,width=500,height=500"); break;
		case 'tumblr'		: window.open(url, "win_tumblr", "menubar=0,resizable=1,width=540,height=600"); break;
		case 'pinterest'	: window.open(url, "win_pinterest", "menubar=0,resizable=1,width=800,height=500"); break;
	}
    return false;
}
</script>