<?php

/**
 * 订单详情
*/
ob_start();
	define('IN_ECS', true);

	require('../includes/init.php');
	include('../includes/cls_json.php');
	require('includes/safety_mysql.php');
	$json   = new JSON;


	$smarty->template_dir = ROOT_PATH . 'json/tpl';//app部分模板所在位置
	$order_id = isset($_REQUEST['order_id'])  ? intval($_REQUEST['order_id']) : 0;
	$result=array();
	$sql="SELECT * FROM  ".$ecs->table('order_info')." WHERE order_id='$order_id' ";
	//print_r($sql);
	$res = $db -> getAll($sql);
	for($i=0;$i<count($res);$i++)
	{
		$res[$i]['add_time']=local_date($GLOBALS['_CFG']['time_format'], $res[$i]['add_time']);//下单时间
		$res[$i]['confirm_time']=local_date($GLOBALS['_CFG']['time_format'], $res[$i]['confirm_time']);//确定时间
		if($res[$i]['order_status']==0){
			$res[$i]['order_status']="未确认";
		}else if($res[$i]['order_status']==1){
			$res[$i]['order_status']="已确认";
		}else if($res[$i]['order_status']==2){
			$res[$i]['order_status']="已取消";
		}else if($res[$i]['order_status']==3){
			$res[$i]['order_status']="无效";
		}else if($res[$i]['order_status']==4){
			$res[$i]['order_status']="退货";
		}else if($res[$i]['order_status']==5){
			$res[$i]['order_status']="已确认";
		}
		$res[$i]['shipping_time']=local_date($GLOBALS['_CFG']['time_format'], $res[$i]['shipping_time']);//配送时间
		if($res[$i]['shipping_status']==0){
			$res[$i]['shipping_status']="未发货";
		}else if($res[$i]['shipping_status']==1){
			$res[$i]['shipping_status']="已发货";
		}else if($res[$i]['shipping_status']==2){
			$res[$i]['shipping_status']="已收货";
		}else if($res[$i]['shipping_status']==3){
			$res[$i]['shipping_status']="备货中";
		}else if($res[$i]['shipping_status']==5){
			$res[$i]['shipping_status']="配货中";
		}
		$res[$i]['pay_time']=local_date($GLOBALS['_CFG']['time_format'], $res[$i]['pay_time']);//支付时间
		
		if($res[$i]['pay_status']==0){
			$res[$i]['pay_status']="未付款";
		}else if($res[$i]['pay_status']==1){
			$res[$i]['pay_status']="付款中";
		}else if($res[$i]['pay_status']==2){
			$res[$i]['pay_status']="已付款";
		}
	}
	//$result['orderInfo']=$res;
	
	$sql ="SELECT g.goods_thumb,s.* FROM ".$ecs->table('order_goods')."as s,".$ecs->table('goods')." as g WHERE s.order_id='$order_id' AND s.goods_id=g.goods_id";
	$resa = $db -> getAll($sql);
	//print_r($sql);
	
	$smarty->assign('order_info',$res);
	$smarty->assign('order_goods',$resa);
	
	$result['result'] = $smarty->fetch('order_app.lib');
	//file_put_contents('./22.txt',$result);
	print_r(json_encode($result));
ob_end_flush();
?>