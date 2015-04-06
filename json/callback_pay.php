<?php

/**
 * 支付宝回调
*/
	require('includes/safety_mysql.php');
	define('IN_ECS', true);
	require('includes/init.php');
	
	if(!empty($_POST['notify_data'])){
		$notify_data = $_POST['notify_data'];
		$doc = new DOMDocument();
		$doc->loadXML($notify_data);
		if( ! empty($doc->getElementsByTagName( "notify" )->item(0)->nodeValue) ) {
			//商户订单号
			$out_trade_no = $doc->getElementsByTagName( "out_trade_no" )->item(0)->nodeValue;
			//支付宝交易号
			$trade_no = $doc->getElementsByTagName( "trade_no" )->item(0)->nodeValue;
			//交易状态
			$trade_status = $doc->getElementsByTagName( "trade_status" )->item(0)->nodeValue;
			
			if($trade_status  == 'TRADE_FINISHED') {
				
				$row = $db -> query("update ".$ecs->table('order_info')." set pay_status = '2' where order_sn = '$out_trade_no'");
				if($row){
					echo "success";	
				}else{
					echo "fail";	
				}
				
			}
			else if ($trade_status  == 'TRADE_SUCCESS') {
				
				$row = $db -> query("update ".$ecs->table('order_info')." set pay_status = '2' where order_sn = '$out_trade_no'");
			
				if($row){
					echo "success";	
				}else{
					echo "fail";	
				}
			}
		}
		/* $of = fopen('post.txt','w');//创建并打开dir.txt
		if($of){
		$str=date('Y-m-d h:m:s',time())."||";
		foreach ($_POST as $key => $value){
		$str.=$key."=>".$value."||";
		}
		 fwrite($of,$str);//把执行文件的结果写入txt文件
		}
		fclose($of); */
	}
	
	

?>