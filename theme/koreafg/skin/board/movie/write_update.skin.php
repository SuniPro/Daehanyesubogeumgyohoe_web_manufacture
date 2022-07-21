<?
if($w==''){
	if(!$wr['wr_id']) $wr=get_write($write_table, $wr_id);

	if (!isset($wr['wr_movie_url'])){
		@sql_query(" ALTER TABLE $write_table ADD `wr_movie_url` VARCHAR(255) NOT NULL DEFAULT '' AFTER `wr_10` ", true);
		@sql_query(" ALTER TABLE $write_table ADD `wr_use_movie_image` VARCHAR(11) NOT NULL DEFAULT '' AFTER `wr_movie_url` ", true);
	}
	
	if (!isset($wr['wr_thumb'])){
		@sql_query(" ALTER TABLE $write_table ADD `wr_thumb` VARCHAR(255) NOT NULL DEFAULT '' AFTER `wr_use_movie_image` ", true);
	}
}

if($wr_use_movie_image=='y'){
	$wr_thumb=sw_get_video_image($wr_movie_url);
}else{
	$wr_use_movie_image="";
	$wr_thumb="";
}

sql_query(
	"UPDATE $write_table set
	wr_movie_url='$wr_movie_url',
	wr_use_movie_image='$wr_use_movie_image',
	wr_thumb='$wr_thumb'
	where wr_id='$wr_id'"
);
?>