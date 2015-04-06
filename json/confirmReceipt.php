<?php

/**
 * 确认收货
*/
	ob_start();
	define('IN_ECS', true);
	require('./includes/init.php');
	$result=array();
	$result1=array();
	$order_sn = isset($_REQUEST['order_sn'])  ? $_REQUEST['order_sn'] : 0;
	$user_id = isset($_REQUEST['user_id'])  ? intval($_REQUEST['user_id']) : 0;
	
	/* 查询订单信息，检查状态 */
    $sql = "SELECT user_id, order_sn , order_status, shipping_status, pay_status FROM ".$ecs->table('order_info') ." WHERE order_sn = '$order_sn'";

    $order = $db->GetRow($sql);

   $row = $db -> query("update ".$ecs->table('order_info')." set shipping_status = '2' where order_sn = '$order_sn' AND `user_id`='$user_id'");
   
	if($row){
		$result['code']=1;
		$result['info']='订单取消成功！';
		/* 记录日志 */
            order_action($order['order_sn'], $order['order_status'], 2, $order['pay_status'], '买家通过APP确定收货', '买家');

	}else{
		$result['code']=0;
		$result['info']='订单取消失败！';
	}
	
	$sql="SELECT * FROM  ".$ecs->table('order_info')." WHERE order_sn='$order_sn' ";
	
	$res = $db -> getRow($sql);
	
	date_default_timezone_set('PRC');
		$res['add_time']=date('Y-m-d h:m:s',$res['add_time']);
		if($res['order_status']==0){
			$res['order_status']="未确认";
		}else if($res['order_status']==1){
			$res['order_status']="已确认";
		}else if($res['order_status']==2){
			$res['order_status']="已取消";
		}else if($res['order_status']==3){
			$res['order_status']="无效";
		}else if($res['order_status']==4){
			$res['order_status']="退货";
		}else if($res['order_status']==5){
			$res['order_status']="已分单";
		}
		
		if($res['shipping_status']==0){
			$res['shipping_status']="未发货";
		}else if($res['shipping_status']==1){
			$res['shipping_status']="已发货";
		}else if($res['shipping_status']==2){
			$res['shipping_status']="已收货";
		}else if($res['shipping_status']==3){
			$res['shipping_status']="备货中";
		}
		
		if($res['pay_status']==0){
			$res['pay_status']="未付款";
		}else if($res['pay_status']==1){
			$res['pay_status']="付款中";
		}else if($res['pay_status']==2){
			$res['pay_status']="已付款";
			
		}
	$result1['orderInfo']=$res;
	$order_id=$res['order_id'];
	$sql="SELECT goods_name, goods_price,goods_number,goods_attr
		FROM  ".$ecs->table('order_goods')." WHERE order_id='$order_id' ";
	//print_r($sql);
	$res = $db -> getAll($sql);
	$result1['orderGoods']=$res;
	$result['info']=$result1;
	print_r(json_encode($result));
/**
 * 记录订单操作记录
 *
 * @access  public
 * @param   string  $order_sn           订单编号
 * @param   integer $order_status       订单状态
 * @param   integer $shipping_status    配送状态
 * @param   integer $pay_status         付款状态
 * @param   string  $note               备注
 * @param   string  $username           用户名，用户自己的操作则为 buyer
 * @return  void
 */
 /*
function order_action($order_sn, $order_status, $shipping_status, $pay_status, $note = '', $username = null, $place = 0)
{
	//require('../includes/init.php');
   
        $username = "买家";
    

    $sql = 'INSERT INTO ' . $ecs->table('order_action') .
                ' (order_id, action_user, order_status, shipping_status, pay_status, action_place, action_note, log_time) ' .
            'SELECT ' .
                "order_id, '$username', '$order_status', '$shipping_status', '$pay_status', '$place', '$note', '" .gmtime() . "' " .
            'FROM ' . $ecs->table('order_info') . " WHERE order_sn = '$order_sn'";
    $db->query($sql);
}
*/
ob_end_flush();
?>