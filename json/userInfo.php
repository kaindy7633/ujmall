<?php

/**
 * 获取登录信息
*/
	require('includes/safety_mysql.php');
	define('IN_ECS', true);
	require('includes/init.php');
	$user=$_REQUEST['uid'];
	$act=$_REQUEST['act'];
	$result=array();
	if($act=="get"){
		$row = $db -> getRow("SELECT * FROM ".$ecs->table('users')."  WHERE  `user_id`='$user'");
		$result['code']="get";
		$result['info']=$row;
		print_r(json_encode($result));
		exit();
	}
	if($act=="edit_info"){
	$user_name=$_REQUEST['user_name'];
	$mobile_phone=$_REQUEST['mobile_phone'];
	$email=$_REQUEST['email'];
	$sex=$_REQUEST['sex'];
	$sql="update ".$ecs->table('users')." set 
							
							mobile_phone = '$mobile_phone',
							email = '$email',
							sex = '$sex'
						where user_id = '$user'";
	$row = $db -> query($sql);
	
	$result['code']="update";
	if($row){	
		$result['info']="1";
	}else{
		$result['info']="0";

	}
	
	print_r(json_encode($result));
	exit();
	}
	
	
	
	
?>