<?
function sw_slide_skin_movie($url){
	$url=urldecode($url);
	$info=parse_url($url);
	
	if($info[host]=="www.youtube.com" || $info[host] == "m.youtube.com"){
		list($v, $id)=explode("=",$info[query]);

		$vid=$id;

		$tag_url="https://www.youtube.com/embed/$vid?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=$vid";
	}else if($info[host]=="youtu.be"){
		list($v, $id)=explode("/",$info[path]);

		$vid=$id;

		$tag_url="https://www.youtube.com/embed/$vid?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=$vid";
	}

	if($tag_url) $tags="<iframe src='$tag_url' frameborder='0' allowfullscreen width='100%' height='100%' style='width:100%;height:100%;'></iframe>";
	else $tags='file';

	return $tags;
}
?>