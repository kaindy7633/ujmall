<?php

/**
 * ��ҳ
*/
	define('IN_ECS', true);
	require('includes/init.php');
	$result=array();
	$first=$_GET['first'];
	$field=$_GET['field'];	
	
	
	if($first=="Y"){
		$article = $db -> getAll("SELECT article_id,title FROM  ".$ecs->table('article')." WHERE  cat_id= 2 AND is_open=1 order by article_id asc  LIMIT 0 , 5");
		$result['article']=$article;
		$banner = $db -> getAll("SELECT ad_name,ad_code,ad_link FROM  ".$ecs->table('ad')." WHERE position_id='323' and start_time<='".time()."' and end_time>='".time()."' LIMIT 0 , 5");
		$result['banner']=$banner;
		
		$adList1 = $db -> getAll("SELECT ad_name,ad_code,ad_link FROM  ".$ecs->table('ad')." WHERE position_id='324' and start_time<='".time()."' and end_time>='".time()."' order by ad_id asc LIMIT 0 , 4");
		$result['adList1']=$adList1;
		
		$adList2 = $db -> getAll("SELECT ad_name,ad_code,ad_link FROM  ".$ecs->table('ad')." WHERE position_id='325' and start_time<='".time()."' and end_time>='".time()."' order by ad_id asc LIMIT 0 , 3");
		$result['adList2']=$adList2;
	}
	//jx
	//app头部名称
	$result['app_title'] = 'ECSHOP开发中心';
	//楼层名称
	$result['app_lou1'] = '掌上秒杀';
	$result['app_lou2'] = '值得买';
	$result['app_lou3'] = '精品特惠';
	$result['app_lou4'] = '精品选购';
	$result['app_lou5'] = '新品上市';
	$result['app_lou6'] = '热卖商品';
	
	//分享
	$result['app_fenxiang'] = '分享内容';
	
	//关于我们的
	$result['app_id'] = '5';
	//地图
		//经纬度
		$result['app_J'] = '39.900715';
		$result['app_W'] = '119.538457';
		//企业名称
		$result['enterprisename'] = "ECSHOP开发中心";
		//企业简介
		$result['enterprise'] = "ECSHO行业“第一品牌”";
	
	//短信内容
	$result['app_more'] = "发送短信内容";
	/*
	 *修改九宫格跳转到指定的品牌
	 *
	 *brand("品牌的ID","品牌的名称");
	 *九宫格名称
	 *
	 *修改九宫格跳转到指定的商品类目
	 *
	 *category("类目的ID","类目的名称");
	 *九宫格名称
	 *
	 */
	//九宫格
		//第一行第一个
		$result['indexMenu1'] = "gourl('category.html','商品类目')";
		$result['indexMenuName1'] = '商品类目';
		//第一行第二个
		$result['indexMenu2'] = "gourl('brand_list.html','商品品牌')";
		$result['indexMenuName2'] = '商品品牌';
		//第一行第三个
		$result['indexMenu3'] = "gourl('user.html','用户中心')";
		$result['indexMenuName3'] = "用户中心";
		//第一行第四个
		$result['indexMenu4'] = "gourl('article_cat.html','文章分类')";
		$result['indexMenuName4'] = "文章分类";
		//第二行第一个
		$result['indexMenu5'] = "gourl('goods_promote_list.html','促销列表')";
		$result['indexMenuName5'] = "促销列表";
		//第二行第二个
		$result['indexMenu6'] = "openPage('share.html','分享给朋友')";
		$result['indexMenuName6'] = "分享";
		//第二行第三个
		$result['indexMenu7'] = "ShowMap()";
		$result['indexMenuName7'] = "地图";
		//第二行第四个
		$result['indexMenu8'] = "CallGeiveMe()";
		$result['indexMenuName8'] = "联系我们";
		
	/*
	 *换组修改代码开始
	 *
	 *
	 */
	
	
	$timeVal=time();
	$sql="SELECT goods_id,goods_name,shop_price,promote_price,goods_thumb,is_hot,is_new,is_best,is_promote,promote_end_date,promote_start_date,click_count FROM  ".$ecs->table('goods')."  WHERE is_promote='1' AND is_delete = '0' AND is_on_sale = '1' AND promote_end_date>='$timeVal'  order by add_time desc LIMIT 0,9 ";
	$result['is_promote']=$db -> getAll($sql);
	
	$sql="SELECT goods_id,goods_name,shop_price,promote_price,goods_thumb,is_hot,is_new,is_best,is_promote,promote_end_date,promote_start_date,click_count FROM  ".$ecs->table('goods')."  WHERE is_new='1' AND is_delete = '0' AND is_on_sale = '1' order by add_time desc LIMIT 0,9 ";
	$result['is_news']=$db -> getAll($sql);
	
	$sql="SELECT goods_id,goods_name,shop_price,promote_price,goods_thumb,is_hot,is_new,is_best,is_promote,promote_end_date,promote_start_date,click_count FROM  ".$ecs->table('goods')."  WHERE is_best='1' AND is_delete = '0' AND is_on_sale = '1' order by add_time desc LIMIT 0,9 ";
	$result['is_best']=$db -> getAll($sql);
	
	$sql="SELECT goods_id,goods_name,shop_price,promote_price,goods_thumb,is_hot,is_new,is_best,is_promote,promote_end_date,promote_start_date,click_count FROM  ".$ecs->table('goods')."  WHERE is_hot='1' AND is_delete = '0' AND is_on_sale = '1' order by add_time desc LIMIT 0,9 ";
	$result['is_hot']=$db -> getAll($sql);
	
	
	/*
	 *换组修改代码结束
	 *
	 *
	 */
	 
	 /*
	|===============================================================
	| 获取联系电话
	|===============================================================
	|
	|
	*/
	
	$sql="SELECT value FROM ".$ecs->table('shop_config')." WHERE id='115'";
	$shop_config=$db ->getRow($sql);
	$result['phone1'] = explode("-",$shop_config['value']);
	$result['phone'] = implode("",$result['phone1']);
	 
	print_r(json_encode($result));
	// $result['lmname']="array(
           // '1'=>('name'=>gourl('2','卧室'),'lname'=>'商品类目'),
          // '2'=>('name'=>gourl('3','卧室3'),'lname'=>'商品类目3')
         // )";
		//$result['lmname'] = "array(array([id] => 1 [name] =>gourl('2','卧室')[lmname] =>商品类目))"; 
?>

