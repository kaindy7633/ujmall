<?php

/**
 * 用户地址列表
*/
	
	$act=$_REQUEST['act'];
	

	
	define('IN_ECS', true);
	require('../includes/init.php');     
	require('includes/safety_mysql.php');
	
	
	$result=array();
	if($act=="upinfo"){

		$id = isset($_REQUEST['id'])  ? intval($_REQUEST['id']) : 0;
		$uid = isset($_REQUEST['uid'])  ? intval($_REQUEST['uid']) : 0;
		$consignee=$_REQUEST['consignee'];
		$tel=$_REQUEST['tel'];
		$email=$_REQUEST['email'];
		$zipcode=$_REQUEST['zipcode'];
		$address=$_REQUEST['address'];
        $country=$_REQUEST['country'];
		$province=$_REQUEST['province'];
		$city=$_REQUEST['city'];
		$district=$_REQUEST['district'];
		$res = $db -> query("update ".$ecs->table('user_address')." set 
							consignee = '$consignee',
							mobile = '$tel',
							email = '$email',
							zipcode = '$zipcode',
							address = '$address',
							country = '$country',
							province = '$province',
							city = '$city',
							district = '$district'
						where address_id = '$id'");
		$address_id = $db -> query("update ".$ecs->table('users')." set 
							address_id = '$id'
						where user_id = '$uid'");
		$result['act']="update";
		if($res){
			$result['code']=1;
			$result['info']="修改成功！";
		}else{
			$result['code']=0;
			$result['info']="修改失败！";
		}
	}
	if($act=="add"){
		$consignee=$_REQUEST['consignee'];
		$user_id=$_REQUEST['uid'];
		$tel=$_REQUEST['tel'];
		$email=$_REQUEST['email'];
		$zipcode=$_REQUEST['zipcode'];
		$address=$_REQUEST['address'];
        $country=$_REQUEST['country'];
		$province=$_REQUEST['province'];
		$city=$_REQUEST['city'];
		$district=$_REQUEST['district'];
		/* $res = $db -> query("INSERT INTO  `shangcheng`.`ecs_user_address` (
					`address_id` ,
					`address_name` ,
					`user_id` ,
					`consignee` ,
					`email` ,
					`country` ,
					`province` ,
					`city` ,
					`district` ,
					`address` ,
					`zipcode` ,
					`tel` ,
					`mobile` ,
					`sign_building` ,
					`best_time`
					)
					VALUES (
					NULL ,  '',  '$user_id',  '$consignee',  '$email',  '1',  '$province',  '$city',  '$district',  '$address',  '$zipcode',  '$tel',  '',  '',  ''
					);"); */
		$address = array(
        'user_id'    => $user_id,
        'address_id' => "",
        'country'    => $country,
        'province'   => $province,
        'city'       => $city,
        'district'   => $district,
        'address'    => $address,
        'consignee'  => $consignee,
        'email'      => $email,
        'mobile'        => $tel,
        'best_time'  => '',
        'sign_building' => '',
        'zipcode'       => $zipcode,
        );
		/* 插入一条新记录 */
        $res=$db->autoExecute($ecs->table('user_address'), $address, 'INSERT');
        $address_id = $db->insert_id();
		$set_defaut_address= $db -> query("update ".$ecs->table('users')." set 
							address_id = '$address_id'
						where user_id = '$user_id'");
		$result['add']="add";
		
		if($res>0){
			$result['code']=1;
			$result['info']="添加成功！";
		}else{
			$result['code']=0;
			$result['info']="添加失败！";
		}
	}
	if($act=="del"){
		$id = isset($_REQUEST['id'])  ? intval($_REQUEST['id']) : 0;
		$user_id = isset($_REQUEST['uid'])  ? intval($_REQUEST['uid']) : 0;
		
		$sql="DELETE FROM ".$ecs->table('user_address')." WHERE address_id='$id' AND user_id = '$user_id' ";
		$res=$db -> query($sql);
		$result['act']="del";
		if($res){
			$result['code']=1;
			$result['info']="删除成功！";
		}else{
			$result['code']=0;
			$result['info']="删除失败！";
		}
		
	}
	
	print_r(json_encode($result));

?>