<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh_cn" lang="zh_cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>多文件上传组件</title>
</head>
<body bgcolor="#ffffff" style="text-align:center;">
<script language="javascript">
function challs_flash_update(){
	var a={};
	a.FormName = "Filedata";
	a.url="ad1.php"; 
	a.parameter="type=images&folder=toimages"; 
	a.typefile=["Images (*.gif,*.png,*.jpg)","*.gif;*.png;*.jpg"];
	a.UpSize=0;
	a.fileNum=0;
	a.size=2;
	return a ;
}

function challs_flash_onComplete(a){
	var name=a.fileName;
	var size=a.fileSize;
	var time=a.updateTime;
	var type=a.fileType;
	document.getElementById('str').value+=name+",";
}
</script>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="408" height="323" id="update_" align="middle"><param name="allowFullScreen" value="false" /><param name="allowScriptAccess" value="always" /><param name="movie" value="update_.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" /><embed src="update_.swf" quality="high" bgcolor="#ffffff" width="408" height="323" name="update_" align="middle" allowScriptAccess="always" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>
<div id="show" style="margin-top:20px; width:500px; text-align:left;"><input type="text" id="str"></div>
</body>
</html>
