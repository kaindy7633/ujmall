<?php

/**
 * 删除评论
*/
	require('includes/safety_mysql.php');
	define('IN_ECS', true);
	require('includes/init.php');
	$comment_id = isset($_REQUEST['comment_id'])  ? intval($_REQUEST['comment_id']) : 0;
	$sql = "DELETE FROM ".$ecs->table('comment')." WHERE comment_id = '$comment_id' OR  parent_id = '$comment_id'";
	$res=$db -> query($sql);
	file_put_contents('./3.txt',$res);
	$result=array();
	if($res){
		$result['code']="1";
		$result['info']="删除成功！";
	}else{
		$result['code']="0";
		$result['info']="删除失败！";
	}
	
	print_r(json_encode($result));
	
	
?>