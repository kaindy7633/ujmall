<?php
// 注意：使用组件上传，不可以使用 $_FILES["Filedata"]["type"] 来判断文件类型
mb_http_input("utf-8");
mb_http_output("utf-8");
function filekzm($a){
$c=strrchr($a,'.');
if($c){
	return $c;
	}else{
	return '';
	}
}
function makeDirectory($directoryName) {
	$directoryName = str_replace("\\","/",$directoryName);
	$dirNames = explode('/', $directoryName);
	$total = count($dirNames) ;
	$temp = '';
	for($i=0; $i<$total; $i++) {
		$temp .= $dirNames[$i].'/';
		if (!is_dir($temp)) {
			$oldmask = umask(0);
			if (!mkdir($temp, 0777)) exit("不能建立目录 $temp"); 
				umask($oldmask);
			}
		}
	return true;
	}
$type=filekzm($_FILES["Filedata"]["name"]);

$fileFormat = array('gif','jpg','jpge','png');
$maxSize = 0;
$overwrite = 1;	
if(isset($_FILES['Filedata'])){
	if($_FILES['Filedata']['name'] != ""){
		require_once("file_upload.php");
		$savePath = $_GET['type']."_images/".$_GET['folder'];
		makeDirectory($savePath);
		$f = new clsUpload($savePath, $fileFormat, $maxSize, $overwrite);
		$f->setThumb(1,160,198);
		if (!$f->run('Filedata',1)){
			$pic = $f->getInfo();
			//$pic = $_GET['folder'].$pic[0]['saveName'];
			}
		}
	}
//if ((($type == ".gif") || ($type == ".png") || ($type == ".jpeg") || ($type == ".jpg") || ($type == ".bmp")) && ($_FILES["Filedata"]["size"] < 200000)){
//	if ($_FILES["Filedata"]["error"] > 0){
//		echo "返回错误: " . $_FILES["Filedata"]["error"] . "<br />";
//		}else{
//			echo "上传的文件: " . $_FILES["Filedata"]["name"] . "<br />";
//			echo "文件类型: " . $type . "<br />";
//			echo "文件大小: " . ($_FILES["Filedata"]["size"] / 1024) . " Kb<br />";
//			echo "临时文件: " . $_FILES["Filedata"]["tmp_name"] . "<br />";
//			if (file_exists( $_FILES["Filedata"]["name"])){
//				echo $_FILES["Filedata"]["name"] . " already exists. ";
//				}else{
//					move_uploaded_file($_FILES["Filedata"]["tmp_name"],
//					$_FILES["Filedata"]["name"]);
//					echo "Stored in: " . $_FILES["Filedata"]["name"];
//				}
//			}
//		}else{
//		echo "上传失败，请检查文件类型和文件大小是否符合标准<br />文件类型：".$type.'<br />文件大小:'.($_FILES["Filedata"]["size"] / 1024) . " Kb";
//		}
?>