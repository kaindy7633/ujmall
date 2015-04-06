<?php

/**
 * 收藏商品列表
*/
	require('includes/safety_mysql.php');
	define('IN_ECS', true);
	require('includes/init.php');
	$uid = isset($_REQUEST['uid'])  ? intval($_REQUEST['uid']) : 0;
	$page=$_GET['page']*5;
	
	$sql="SELECT g.add_time,g.goods_id,g.goods_name,g.shop_price,g.goods_thumb,g.is_hot,g.is_new,g.is_best,g.click_count FROM  ".$ecs->table('goods')."  AS g,".$ecs->table('collect_goods')."  AS c WHERE g.goods_id=c.goods_id and c.user_id =$uid order by g.goods_id asc   LIMIT $page,5";

	$res = $db -> getAll($sql);
	for($i=0;$i<count($res);$i++){
		$res[$i]['add_time']=date('Y-m-d h:m',$res[$i]['add_time']);
	}
	
	print_r(json_encode($res));
	
	
?>