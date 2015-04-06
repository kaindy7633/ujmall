<?php

/**
 * 获取登录信息
*/
	require('includes/safety_mysql.php');
	define('IN_ECS', true);
	require('includes/init.php');
	$user=$_GET['uid'];
	$oldPwd=$_GET['oldPwd'];
	$pwd=$_GET['pwd'];
	$result=array();
	$row = $db -> getRow("SELECT * FROM ".$ecs->table('users')."  WHERE  `user_id`='$user';");
	
	if(empty($row)){
		$result['code']=0;
		$result['info']="非法操作！";
		print_r(json_encode($result));
		exit();
	}else {
		if(empty($row['ec_salt'])){
			if(md5($oldPwd)!=$row['password']){
				$result['code']=0;
				$result['info']="你输入的旧密码不正确！";
				print_r(json_encode($result));
				exit();
			}else{
				$pwd=md5($pwd);
			}
		}else{
			if(md5(md5($oldPwd).$row['ec_salt'])!=$row['password']){
				$result['code']=0;
				$result['info']="你输入的旧密码不正确！";
				print_r(json_encode($result));
				exit();
			}else{
				$pwd=md5(md5($pwd).$row['ec_salt']);
			}
		}
		
		
	}
	$row = $db -> query("update ".$ecs->table('users')." set password = '$pwd' where user_id = '$user'");
	if($row){
		$result['code']=1;
		$result['info']="你的密码修改成功！新密码：".$_GET['pwd'];
		print_r(json_encode($result));
		exit();
	}else{
		$result['code']=0;
		$result['info']="你修改密码失败！";
		print_r(json_encode($result));
		exit();
	}
	
	
?>