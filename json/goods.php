<?php

/**
 * 商品内容
*/
	ob_start();
	
	require('includes/safety_mysql.php');
	define('IN_ECS', true);
	require('../includes/init.php');
	//require('../includes/lib_goods.php');
    $act = isset($_REQUEST['act'])  ? trim($_REQUEST['act']) : '';
    $atxt = isset($_REQUEST['atxt'])  ? trim($_REQUEST['atxt']) : '';
	$goods_id = isset($_REQUEST['goods_id'])  ? intval($_REQUEST['goods_id']) : 0;
	$user_id = isset($_REQUEST['user_id'])  ? intval($_REQUEST['user_id']) : 0;
	$result=array();
	/*查找后台配置的库存管理*/
	$sql="SELECT value FROM ".$ecs->table('shop_config')." WHERE id='207'";
	$use_storage=$db ->getRow($sql);
	$result['use_storage']=$use_storage;
	
	/*每100积分可抵多少元现金*/
	$sql="SELECT value FROM ".$ecs->table('shop_config')." WHERE id='211'";
	$shop_config=$db ->getRow($sql);
	$shop_config_integral=$shop_config['value'];
	
	/*获取商品的图片*/
    if(empty($act))
    {  
	$sql="SELECT img_url FROM ".$ecs->table('goods_gallery')." WHERE goods_id='$goods_id'  LIMIT 0 ,5 ";
	$goods_gallery = $db -> getAll($sql);
	/*获取商品的评论*/
	//$sql="SELECT user_name,content,add_time FROM ".$ecs->table('comment')." WHERE id_value='$goods_id'  LIMIT 0 ,5 ";
	//$comment = $db -> getAll($sql);
	
	/*获取商品的类型*/
	
	$sql="SELECT attr.goods_attr_id,attr.attr_value,attribute.attr_name 
	FROM ".$ecs->table('goods_attr')." AS attr,".$ecs->table('attribute')." AS attribute  
	WHERE attr.goods_id='$goods_id' AND attr.attr_id=attribute.attr_id ;";
	
	$sql="SELECT a.attr_id, a.attr_name, a.attr_group, a.is_linked, a.attr_type, g.goods_attr_id, g.attr_value, g.attr_price FROM ".$ecs->table('goods_attr')." AS g LEFT JOIN  ".$ecs->table('attribute')."  AS a ON a.attr_id = g.attr_id WHERE a.attr_group='0' AND  g.goods_id = '$goods_id' ORDER BY a.sort_order, g.attr_price, g.goods_attr_id";
	$res = $db -> getAll($sql);
	$goods_attr=array();
	$attr=array();
	$list=array();
	
	if(count($res)!=0){
		foreach ($res AS $row)
		{
			
			
				$arr[$row['attr_id']]['attr_id'] = $row['attr_id'];
				$arr[$row['attr_id']]['attr_type'] = $row['attr_type'];
				$arr[$row['attr_id']]['name']     = $row['attr_name'];
				$arr[$row['attr_id']]['values'][] = array(
															'label'        => $row['attr_value'],
															'price'        => $row['attr_price'],
															
															'id'           => $row['goods_attr_id']
															);
		
		}
		foreach($arr AS $key =>$row){
			$goods_attr[]=$row;
		}
	}
    
    $atr_price=0;
    foreach ($goods_attr AS $key=>$val)
    {


        if($val['attr_type']==1)
        {        //echo $val['attr_id'];
            $atr_price+=$val['values'][0]['price'];
        }
        
    }
    //exit;

	$sql="SELECT click_count FROM ".$ecs->table('goods')." WHERE goods_id='$goods_id'";
	$goods=$db ->getRow($sql);
	$click_count=$goods['click_count']+1;
	$db -> query("update ".$ecs->table('goods')." set click_count = '$click_count' where goods_id = '$goods_id'");
	
	/*获取商品详细信息*/
	$sql="SELECT 
		goods_sn,
		goods_name,
		click_count,
		brand_id,
		goods_number,
		goods_weight,
		shop_price,
		market_price,
		promote_price,
		promote_start_date,
		promote_end_date,
		goods_desc,
		is_real,
		is_promote,
		integral,
		give_integral,
		rank_integral
	FROM ".$ecs->table('goods')." WHERE goods_id='$goods_id'";
	$goods=$db ->getRow($sql);
	$goods_price = $goods['shop_price'];
    $goods['shop_price']+=$atr_price;
	
	$goods['integral']=$goods['integral']/$shop_config_integral*100;
	if($goods['give_integral']==-1){
		if($goods['is_promote']==1&&$goods['promote_start_date']<gmtime()&&$goods['promote_end_date']>gmtime()){
			$goods['give_integral']=$goods['promote_price'];
		}else{
			$goods['give_integral']=$goods['shop_price'];
		}
	}
	if($goods['rank_integral']==-1){
		if($goods['is_promote']==1&&$goods['promote_start_date']<gmtime()&&$goods['promote_end_date']>gmtime()){
			$goods['rank_integral'] = intval($goods['promote_price']);
		}else{
			$goods['rank_integral'] = intval($goods['shop_price']);
		}
	}
	$goods['shop_atr'] = $goods['shop_price']+$atr_price;//不是促销商品的总价格（加上属性价格）
	$goods['promote_atr'] = $goods['promote_price']+$atr_price;//促销商品的总价格（加上属性价格）
	$result['linked_goods']=get_linked_goods($goods_id);
	$result['goods']=$goods;
	$result['goods_gallery']=$goods_gallery;
	$result['goods_attr']=$goods_attr;
	$result['user_rank_info']=get_rank_info($user_id);
	$result['user_rank_prices']=get_user_rank_prices($goods_id, $goods_price,$user_id,$atr_price,$goods['promote_price']);
	$result['is_collect_goods']=is_collect_goods($goods_id,$user_id);
	
	print_r(json_encode($result));
  }
  elseif(!empty($atxt))
  {
      	$sql="SELECT 
		shop_price,
		promote_price,
		promote_start_date,
		promote_end_date,
		is_promote
		FROM ".$ecs->table('goods')." WHERE goods_id='$goods_id'";
	   $goods=$db ->getRow($sql);
	   $shop_pricr = $goods['shop_price'];
   // 取得商品的促销价格或者是本店价格
	if($goods['is_promote'] == 1 && $goods['promote_start_date'] < gmtime() && $goods['promote_end_date'] > gmtime() && $goods['shop_price'] > $goods['promote_price'])
	{
		$result['shop_price_shao'] = $goods['promote_price'];
	}else
	{
		$result['shop_price_shao']= $goods['shop_price'];
	}
	if($goods['is_promote'] == 1 && $goods['promote_start_date'] < gmtime() && $goods['promote_end_date'] > gmtime())
	{
		$result['shop_price'] = $goods['promote_price'];
	}else
	{
		$result['shop_price']= $goods['shop_price'];
	}
	//取得商品的属性价格
    $atr_price=0;
    $goods_att=explode('@',$atxt);
    foreach ($goods_att as $val)
    {
        if(!empty($val))
        {
            $sql="SELECT `attr_price` FROM " .$ecs->table('goods_attr')." WHERE goods_id='$goods_id' AND `goods_attr_id`='$val'";
            $atr_price+=$db->getOne($sql);
        }
        
    }
	$result['cart_price'] = $result['shop_price_shao']+$atr_price;		//本店售价加上属性价格
	$result['is_promote'] = $goods['is_promote'];
	$result['promote_start_date'] = $goods['promote_start_date'];
	$result['promote_end_date'] = $goods['promote_end_date'];
	$result['user_rank_info']=get_rank_info($user_id);
	$result['user_rank_prices']=get_user_rank_prices($goods_id, $shop_pricr,$user_id,$atr_price,$goods['promote_price']);
	$result['linked_goods']=get_linked_goods($goods_id);
	
	print_r(json_encode($result));
  }
	
/*=====================================ecshop的一些函数方法======================================*/
	
	
	
/**
 * 获得指定商品的各会员等级对应的价格
 *
 * @access  public
 * @param   integer     $goods_id
 * @return  array
 */

function get_user_rank_prices($goods_id, $shop_price,$user_id,$atr_price,$promote_price)
{
	$user_rank = $GLOBALS['db']->getOne("SELECT user_rank FROM " . $GLOBALS['ecs']->table('users') . " WHERE user_id = '$user_id'");
    $sql = "SELECT rank_id, IFNULL(mp.user_price, r.discount * $shop_price / 100) AS price, r.rank_name, r.discount " .
            'FROM ' . $GLOBALS['ecs']->table('user_rank') . ' AS r ' .
            'LEFT JOIN ' . $GLOBALS['ecs']->table('member_price') . " AS mp ".
                "ON mp.goods_id = '$goods_id' AND mp.user_rank = r.rank_id " .
            "WHERE r.show_price = 1 OR r.rank_id = '$user_rank'";
    $res = $GLOBALS['db']->query($sql);
    $arr = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {

        $arr[] = array(
                        'rank_name' => htmlspecialchars($row['rank_name']),
						'rank_id'   => $row['rank_id'],
                        'price'     => price_format($row['price']),
						'price_promote'=>price_format($promote_price+$atr_price),
						'price_shop'=> price_format($row['price']+$atr_price));
    }
    return $arr;
}
/**
 * 获得会员等级
 *
 * @access  public
 * @param   integer     $goods_id
 * @return  array
 */
function get_rank_info($user_id)
{
    $user_rank = $GLOBALS['db']->getOne("SELECT user_rank FROM " . $GLOBALS['ecs']->table('users') . " WHERE user_id = '$user_id'");
	
	$sql = "SELECT rank_name FROM " . $GLOBALS['ecs']->table('user_rank') . " WHERE rank_id = '$user_rank'";
    $row = $GLOBALS['db']->getRow($sql);
	$rank_name=$row['rank_name'];
	
	return array('rank_name'=>$rank_name);
}
	

/*------------------------------------------------------ */
//-- PRIVATE FUNCTION
/*------------------------------------------------------ */

/**
 * 获得指定商品的关联商品
 *
 * @access  public
 * @param   integer     $goods_id
 * @return  array
 */
function get_linked_goods($goods_id)
{
    $sql = 'SELECT g.goods_id, g.goods_name, g.goods_thumb, g.goods_img, g.shop_price AS org_price, ' .
                "IFNULL(mp.user_price, g.shop_price * '1') AS shop_price, ".
                'g.market_price, g.promote_price, g.promote_start_date, g.promote_end_date ' .
            'FROM ' . $GLOBALS['ecs']->table('link_goods') . ' lg ' .
            'LEFT JOIN ' . $GLOBALS['ecs']->table('goods') . ' AS g ON g.goods_id = lg.link_goods_id ' .
            "LEFT JOIN " . $GLOBALS['ecs']->table('member_price') . " AS mp ".
                    "ON mp.goods_id = g.goods_id AND mp.user_rank = '0' ".
            "WHERE lg.goods_id = '$goods_id' AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ".
            "LIMIT " . $GLOBALS['_CFG']['related_goods_number'];
    $res = $GLOBALS['db']->query($sql);
	
    $arr = array();
	$arr2 = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $arr2['goods_id']     = $row['goods_id'];
        $arr2['goods_name']   = $row['goods_name'];
       // $arr2['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ? sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
        $arr2['goods_thumb']  = get_image_path($row['goods_id'], $row['goods_thumb'], true);
        //$arr2['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
        //$arr2['market_price'] = price_format($row['market_price']);
        $arr2['shop_price']   = price_format($row['shop_price']);
       // $arr2['url']          = build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);

        if ($row['promote_price'] > 0)
        {
            $arr2['promote_price'] = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
            $arr2['formated_promote_price'] = price_format($arr[$row['goods_id']]['promote_price']);
        }
        else
        {
            $arr2['promote_price'] = 0;
        }
		$arr[] = $arr2;
    }

    return $arr;
}

/**
 * 判断用户是否收藏
 *
 * @param   string  $goods_id    商品编号
 * @param   string  $user_id    用户编号
 *
 * @return  布尔值
 */
 function is_collect_goods($goods_id,$user_id)
{
$sql="SELECT * 
	FROM  ".$GLOBALS['ecs']->table('collect_goods')." WHERE user_id='$user_id' and goods_id='$goods_id'";
	
	$isCollect=$GLOBALS['db'] ->getRow($sql);
	
	if(!empty($isCollect)){return true;}else{return false;}
}	

ob_end_flush();
?>

