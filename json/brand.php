<?php

/**
 * 商品品牌
*/
	require('includes/safety_mysql.php');
	define('IN_ECS', true);
	require('includes/init.php');
	
	$result = $db -> getAll("SELECT brand_id,brand_name FROM  ".$ecs->table('brand')."  order by sort_order asc");
	

	print_r(json_encode($result));
	
?>