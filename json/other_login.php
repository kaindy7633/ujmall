<?php
/*
*
*��������¼�ӿ�
*
*
*/
	require('includes/safety_mysql.php');
	define('IN_ECS', true);
	require('includes/init.php');
	$access_token = $_POST['access_token'];
	
	$row = $db -> getRow("SELECT * FROM ".$ecs->table('users')." WHERE `qq_token`='$access_token' ");
	$result=array();
	if(empty($row)){//��һ�ε�¼
		$add = array(  
			'qq_token' => $access_token
		); 
		$set=$db->autoExecute($ecs->table('users'), $add, 'INSERT');
		if($set){
			$row = $db -> getRow("SELECT * FROM ".$ecs->table('users')." WHERE `qq_token`='$access_token' ");
				
			/*���Ҵ����������   jx*/
			$user_id = $row['user_id'];
			$sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('order_info')."WHERE user_id = '$user_id' AND pay_status = 0";
			$row['payment'] = $GLOBALS['db']->getOne($sql);
			/*���Ҵ�����������   jx*/
			$sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('order_info')."WHERE user_id = '$user_id' AND shipping_status = 0";
			$row['deliver'] = $GLOBALS['db']->getOne($sql);
			/*���Ҵ��ջ�������   jx*/
			$sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('order_info')."WHERE user_id = '$user_id' AND shipping_status = 1";
			$row['receipt'] = $GLOBALS['db']->getOne($sql);
			/*����ȫ����������   jx*/
			$sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('order_info')."WHERE user_id = '$user_id'";
			$row['quan'] = $GLOBALS['db']->getOne($sql);
			/*��Ա�ȼ�    jx*/
			if($row['user_rank'] == 0)
			{
				$row['user_rank'] = "�ǻ�Ա";
				$result['info']=$row;
			}else
			{
				$rank_id = $row['user_rank'];
				$sql = "SELECT rank_name FROM ".$GLOBALS['ecs']->table('user_rank')."WHERE rank_id='$rank_id'";
				$row['user_rank'] = $GLOBALS['db']->getOne($sql);
				$result['info'] = $row; 
			}
			$result['code']=1;
			$result['info']=$row;
		}else{
			$result['code']=0;
			$result['info']="��¼ʧ�ܣ�";
		}
		
	}else{
			/*���Ҵ����������   jx*/
			$user_id = $row['user_id'];
			$sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('order_info')."WHERE user_id = '$user_id' AND pay_status = 0";
			$row['payment'] = $GLOBALS['db']->getOne($sql);
			/*���Ҵ�����������   jx*/
			$sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('order_info')."WHERE user_id = '$user_id' AND shipping_status = 0";
			$row['deliver'] = $GLOBALS['db']->getOne($sql);
			/*���Ҵ��ջ�������   jx*/
			$sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('order_info')."WHERE user_id = '$user_id' AND shipping_status = 1";
			$row['receipt'] = $GLOBALS['db']->getOne($sql);
			/*����ȫ����������   jx*/
			$sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('order_info')."WHERE user_id = '$user_id'";
			$row['quan'] = $GLOBALS['db']->getOne($sql);
			/*��Ա�ȼ�    jx*/
			if($row['user_rank'] == 0)
			{
				$row['user_rank'] = "�ǻ�Ա";
				$result['info']=$row;
			}else
			{
				$rank_id = $row['user_rank'];
				$sql = "SELECT rank_name FROM ".$GLOBALS['ecs']->table('user_rank')."WHERE rank_id='$rank_id'";
				$row['user_rank'] = $GLOBALS['db']->getOne($sql);
				$result['info'] = $row; 
			}

		$result['code']=1;
		$result['info']=$row;
	}
	
	print_r(json_encode($result));
?>

