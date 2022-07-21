<style>
@import url(http://cdn.jsdelivr.net/font-nanum/1.0/nanumbarungothic/nanumbarungothic.css);
#viewerDiv { position:relative; height:0px; overflow:hidden; max-width:100%; }
#viewerIframe { position:absolute; top:0px; left:0px; width:100%; height:100%; display:block; }
#titleTable { color:#000000; font-family:'Nanum Barun Gothic'; font-weight:bold; padding:12px; background-color:#f7d7e4; margin-bottom:6px; border:1px solid #cccccc; }
.listTd { color:#000000; font-family:'Nanum Barun Gothic'; padding:12px; text-align:center; cursor:pointer; background-color:#eeeeee; }
</style>	
<script>
officeList = [".pdf", "docx", "docm", "dotm", "dotx", ".doc", "xlsx", "xlsb", ".xls", "xlsm", "pptx", "ppsx", ".ppt", "pptm", "potm", ".ppm", "potx", "ppsm"];
function viewerFile() {
	officeNumber = 0;
	for (office in officeList) if (officeList[office] == arguments[0].toLowerCase().slice(-4)) officeNumber += 1;
	if (officeNumber < 1) viewerOffice = "<img style=display:block;width:100% src=" + "<?php echo $board_skin_url."/none.jpg"; ?>" + ">";
	else if (arguments[0].toLowerCase().slice(-4) == ".pdf") {
		if (("win16win32win64macmacintel").indexOf(navigator.platform.toLowerCase()) < 0) viewerOffice = "<iframe id=viewerIframe src=<?php echo $board_skin_url."/pdf/web/viewer.html?file="; ?>" + arguments[0] + " frameborder=0></iframe>";
		else viewerOffice = "<iframe id=viewerIframe src=" + arguments[0] + " frameborder=0></iframe>";
	}	
	else viewerOffice = "<iframe id=viewerIframe src=https://view.officeapps.live.com/op/embed.aspx?src=" + arguments[0] + " frameborder=0></iframe>";
	viewerDiv.innerHTML = viewerOffice;
	viewerDiv.style.paddingBottom = arguments[1] + '%';			
}
viewerHeight = [<?php echo $view['wr_1']; ?>];
<?php
for ($i=0; $i<count($view['file']); $i++) {
	if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
?>
downHref = "<?php echo $view['file'][$i]['href']; ?>";
this["viewer_" + <?php echo $i + 1; ?>] = ["<?php echo $view['file'][$i]['path']."/".$view['file'][$i]['file']; ?>", "<?php echo $view['file'][$i]['source']; ?>", downHref.replace(/amp;/gi, ""), viewerHeight[<?php echo $i; ?>]]; 
<?php
	}
}
?>
textSize = ("win16win32win64macmacintel").indexOf(navigator.platform.toLowerCase()) < 0 ? '13px' : '16px';
//document.write("<table id=titleTable style=width:100%;font-size:" + textSize + " cellpadding=0 cellspacing=0>");
//document.write("<td style=text-align:left;cursor:pointer onclick=viewerMode('prev') onmouseover=style.color='#c00000' onmouseout=style.color='#000000'>◀◀</td><td id=listTitle style=text-align:center></td>");
//document.write("<td style=text-align:right;cursor:pointer onclick=viewerMode('next') onmouseover=style.color='#c00000' onmouseout=style.color='#000000'>▶▶</td></table>");
document.write("<div id=viewerDiv style=width:100%></div>");
document.write("<table style=width:100%;table-layout:fixed;background-color:#cccccc;margin-top:6px cellpadding=0 cellspacing=1>");
document.write("<col width=80%></col><col width=20%></col>");
for (viewerTotal = 0; this["viewer_" + (viewerTotal + 1)]; viewerTotal++);
goNumber = 1;
function viewerMode() {
	if (arguments[0] == 'prev') this["file_" + (goNumber = goNumber == 1 ? viewerTotal : goNumber - 1)].onclick();
	else this["file_" + (goNumber = goNumber == viewerTotal ? 1 : goNumber + 1)].onclick();
}
for (file = 1; file <= viewerTotal; file++) {
	document.write("<tr><td id=file_" + file + " class=listTd style=font-size:" + textSize + ">" + this['viewer_' + file][1] + "</td><td id=download_" + file + " class=listTd style=font-size:" + textSize + ">다운로드</td></tr>");
	this["file_" + file].thisNum = this["download_" + file].thisNum = file;
	this["file_" + file].fileSrc = this['viewer_' + file][0];
	this["file_" + file].onclick = function() {
		scrollTo(0, 0);
		viewerFile(this.fileSrc, parent["viewer_" + this.thisNum][3]);
		for (file = 1; file <= viewerTotal; file++) {
			parent["file_" + file].style.backgroundColor = parent["download_" + file].style.backgroundColor = '#eeeeee';
			parent["file_" + file].style.fontWeight = parent["download_" + file].style.fontWeight = 'normal';
		}
		parent["file_" + this.thisNum].style.backgroundColor = '#f7d7e4';
		parent["download_" + this.thisNum].style.backgroundColor = '#d5e6f9';
		parent["file_" + this.thisNum].style.fontWeight = parent["download_" + this.thisNum].style.fontWeight = 'bold';
		listTitle.innerText = this.innerText;
		goNumber = thisNum;
	}
	this["download_" + file].onclick = function() { location.href = parent['viewer_' + this.thisNum][2]; }
	this["file_" + file].onmouseover = this["download_" + file].onmouseover = function() { this.style.color='#c00000'; }
	this["file_" + file].onmouseout = this["download_" + file].onmouseout = function() { this.style.color='#000000'; }
}
<?php if ($view['wr_2'] == "change") echo $view['wr_content']; ?>
document.write("</table>");
file_1.onclick();
</script>