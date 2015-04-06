<?php

/**
 * 获取登录信息
*/
	require('includes/safety_mysql.php');
	define('IN_ECS', true);
	require('includes/init.php');
	$user=$_POST['user'];
	$email=$_POST['email'];
	$sex=$_POST['sex'];
	$pwd=md5($_POST['pwd']);
	$result=array();
	$row = $db -> getRow("SELECT * FROM ".$ecs->table('users')."  WHERE  `user_name`='$user'");
	if(!empty($row)){
		$result['code']=2;
		$result['info']="该用户名已经存在";
		print_r(json_encode($result));
		exit();
	}
	$row = $db -> getRow("SELECT * FROM ".$ecs->table('users')."  WHERE  `email`='$email'");
	if(!empty($row)){
		$result['code']=3;
		$result['info']="该邮箱已经存在";
		print_r(json_encode($result));
		exit();
	}
	$add = array(  
		'user_name' => $user,
		'email' => $email, 
		'password' => $pwd, 
		'reg_time' => gmtime(), 
		'sex' => $sex
	); 
	$set=$db->autoExecute($ecs->table('users'), $add, 'INSERT');
	if($set){
		$row = $db -> getRow("SELECT * FROM ".$ecs->table('users')."  WHERE  `user_name`='$user'");
		$result['code']=1;
		$row['user_rank'] = "非会员";
		$row['quan'] = 0;
		$row['receipt'] = 0;
		$row['deliver'] = 0;
		$row['payment'] = 0;


		$result['info']=$row;
		print_r(json_encode($result));
		exit();
	}
	
	

?>