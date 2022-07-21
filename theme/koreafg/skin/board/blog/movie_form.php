<div class="form-group clearfix">
	<div class='row'>
		<label class="col-md-2 control-label" for="wr_homepage">대표 동영상 URL</label>
		<div class="col-md-10">
			<input type="text" name="wr_movie_url" id="wr_movie_url" value="<?php echo $write[wr_movie_url] ?>" class="form-control form-control-sm" placeholder="유튜브 동영상 URL">
			<div>
				<input type='checkbox' name='wr_use_movie_image' value='y' id='wr_use_movie_image' <? if($write[wr_use_movie_image]) echo "checked" ?>>
				<label for='wr_use_movie_image'>대표 이미지로 사용</label>
			</div>
		</div>
	</div>
</div>
