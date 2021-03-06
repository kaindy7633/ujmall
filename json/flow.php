<?php
ob_start();
define('IN_ECS', true);

require('../includes/init.php');
include('../includes/cls_json.php');
require('./includes/lib_order.php');

$json   = new JSON;
/* 载入语言文件 */
require_once('../languages/zh_cn/shopping_flow.php');
require_once('../languages/zh_cn/user.php');

$_LANG['your_discount'] = '根据优惠活动<a href="javascript:void(0)" onclick="activity()"><font color=red>%s</font></a>，您可以享受折扣 %s';

$userid = intval($_REQUEST['userid']);
if($userid > 0){
    //需要获取用户登陆的相关信息
    $_SESSION['user_id'] = $userid;
}
$smarty->assign('lang',             $_LANG);

$smarty->template_dir = ROOT_PATH . 'json/tpl';//app部分模板所在位置


/*
 * 获取购物车中的商品
 */
if (!empty($_REQUEST['act']) && $_REQUEST['act'] == 'selcart')
{
	
    $res    = array('error' => 0, 'result' => '', 'message' => '');
    

  /* 取得商品列表，计算合计 */
    $cart_goods = get_cart_goods();
	if(count($cart_goods['goods_list'])<=0){
		$res['error'] = 1;
		$res['message'] = '请先添加商品！';
		die($json->encode($res));
	}


    /* 取得优惠活动 */
    $favourable_list = favourable_list($_SESSION['user_rank']);

	if($favourable_list){
		$new_fav = array();
		foreach($favourable_list as $key => $val){
			if(isset($cart_goods['goods_list'][$val['supplier_id']])){
				$cart_goods['goods_list'][$val['supplier_id']]['favourable'][] = $val;
			}
		}
	}
	//echo "<pre>";
	//print_r($cart_goods['goods_list']);
	
	foreach($cart_goods['goods_list'] as $k=>$v){
		$discount = compute_discount($k);
		if(is_array($discount)){
			$cart_goods['goods_list'][$k]['discount']['discount'] = $discount['discount'];
			$favour_name = empty($discount['name']) ? '' : join(',', $discount['name']);
			$cart_goods['goods_list'][$k]['discount']['your_discount'] = sprintf($_LANG['your_discount'], $favour_name, price_format($discount['discount']));
		}
	}
	
	//选择优惠活动中的赠品时所要执行的部分_start
	if(isset($_REQUEST['is_ajax']) && intval($_REQUEST['is_ajax']) > 0){
		$res    = array('error' => 0, 'result' => '');
		if (isset($_REQUEST['suppid']))
		{
			$smarty->assign('favourable_list', $cart_goods['goods_list'][intval($_REQUEST['suppid'])]['favourable']);
			$res['result'] =  $smarty->fetch("favourable_app.lbi");
		}
		else
		{
			$res['result'] = '您一个商品都没选，这怎么行捏！！真的不行哦！';
		}	
		die($json->encode($res));
	}
    //选择优惠活动中的赠品时所要执行的部分_end
	$sql_where = $_SESSION['user_id']>0 ? "user_id='". $_SESSION['user_id'] ."' " : "session_id = '" . SESS_ID . "' AND user_id=0 ";
	$sql = "SELECT SUM(goods_number) from ".$GLOBALS['ecs']->table('cart')." where $sql_where";
	$res['number'] = $GLOBALS['db']->getOne($sql);
	$res['result'] = $cart_goods;
	die($json->encode($res));
}

/*
 * 修改购物车中商品的数量
 */
if($_REQUEST['step']=='update_group_cart')
{
	$result = array('error' => 0, 'message' => '', 'content' => '', 'goods_id' => '');
	$rec_id = intval($_REQUEST['rec_id']);
	$number = intval($_REQUEST['number']);
	$goods_id = intval($_REQUEST['goods_id']);
	//$result['suppid'] = intval($_REQUEST['suppid']);
	$result['rec_id'] = $rec_id;
	$result['number']=$number;


	//if ($GLOBALS['_CFG']['use_storage'] == 1)
	//{
	$goods_number = $GLOBALS['db']->getOne("select goods_number from ".$GLOBALS['ecs']->table('goods')." where goods_id='$goods_id'");
	if($number>$goods_number)
	{
	$result['error'] = 1;
	$result['content'] ='对不起,您选择的数量超出库存您最多可购买'.$goods_number."件";
	$result['number']=$GLOBALS['db']->getOne("select goods_number from ".$GLOBALS['ecs']->table('cart')." where rec_id = '$rec_id'");
	die($json->encode($result));
	}

	//}
	$sql = "UPDATE " . $GLOBALS['ecs']->table('cart') . " SET goods_number = '$number' WHERE rec_id = $rec_id";
	$GLOBALS['db']->query($sql);

	/* 取得商品列表，计算合计 */
	$cart_goods = get_cart_goods();

	//折扣活动
	$result['your_discount'] = '';
	//$discount = compute_discount($result['suppid']);
	if(is_array($discount)){
		$favour_name = empty($discount['name']) ? '' : join(',', $discount['name']);
		$result['your_discount'] = sprintf($_LANG['your_discount'], $favour_name, price_format($discount['discount']));
	}

	$subtotal = $GLOBALS['db']->getONE("select goods_price * goods_number AS subtotal from ".$GLOBALS['ecs']->table('cart')." where rec_id = $rec_id");
	$result['subtotal'] = price_format($subtotal, false);
	//$result['cart_amount_desc'] = sprintf($_LANG['shopping_money'], $cart_goods['total']['goods_price']);
	$result['cart_amount_desc'] = $cart_goods['total']['goods_price'];
	$shopping_money = sprintf($_LANG['shopping_money'], $cart_goods['total']['goods_price']);
	$result['market_amount_desc'] = $shopping_money;
	if ($_CFG['show_marketprice'])
	{
		$market_price_desc= sprintf($_LANG['than_market_price'],$cart_goods['total']['market_price'], $cart_goods['total']['saving'], $cart_goods['total']['save_rate']);
		$result['market_amount_desc'].= "，".$market_price_desc ;
	}

	die($json->encode($result));
}

/*------------------------------------------------------ */
//-- 添加商品到购物车
/*------------------------------------------------------ */
elseif ($_REQUEST['step'] == 'add_to_cart')
{

    $_REQUEST['goods']=strip_tags(urldecode($_REQUEST['goods']));
    $_REQUEST['goods'] = json_str_iconv($_REQUEST['goods']);
    
    $result = array('error' => 0, 'message' => '', 'content' => '', 'goods_id' => '');
    if (!empty($_REQUEST['goods_id']) && empty($_REQUEST['goods']))
    {
        if (!is_numeric($_REQUEST['goods_id']) || intval($_REQUEST['goods_id']) <= 0)
        {
            $result['error'] = ERR_NOT_EXISTS;
            $result['message'] = '非法操作！';
        	die($json->encode($result));
        }
        $goods_id = intval($_REQUEST['goods_id']);
        exit;
    }

    if (empty($_REQUEST['goods']))
    {
        $result['error'] = 1;
        die($json->encode($result));
    }

    $goods = $json->decode($_REQUEST['goods']);

    /* 检查：如果商品有规格，而post的数据没有规格，把商品的规格属性通过JSON传到前台 */
    if (empty($goods->spec) AND empty($goods->quick))
    {
        $sql = "SELECT a.attr_id, a.attr_name, a.attr_type, ".
            "g.goods_attr_id, g.attr_value, g.attr_price " .
        'FROM ' . $GLOBALS['ecs']->table('goods_attr') . ' AS g ' .
        'LEFT JOIN ' . $GLOBALS['ecs']->table('attribute') . ' AS a ON a.attr_id = g.attr_id ' .
        "WHERE a.attr_type != 0 AND g.goods_id = '" . $goods->goods_id . "' " .
        'ORDER BY a.sort_order, g.attr_price, g.goods_attr_id';

        $res = $GLOBALS['db']->getAll($sql);

        if (!empty($res))
        {
            $spe_arr = array();
            foreach ($res AS $row)
            {
                $spe_arr[$row['attr_id']]['attr_type'] = $row['attr_type'];
                $spe_arr[$row['attr_id']]['name']     = $row['attr_name'];
                $spe_arr[$row['attr_id']]['attr_id']     = $row['attr_id'];
                $spe_arr[$row['attr_id']]['values'][] = array(
                                                            'label'        => $row['attr_value'],
                                                            'price'        => $row['attr_price'],
                                                            'format_price' => price_format($row['attr_price'], false),
                                                            'id'           => $row['goods_attr_id']);
            }
            $i = 0;
            $spe_array = array();
            foreach ($spe_arr AS $row)
            {
                $spe_array[]=$row;
            }
            $result['error']   = ERR_NEED_SELECT_ATTR;
            $result['goods_id'] = $goods->goods_id;
            $result['parent'] = $goods->parent;
            $result['message'] = $spe_array;

            die($json->encode($result));
        }
    }

    /* 更新：如果是一步购物，先清空购物车 */
    //if ($_CFG['one_step_buy'] == '1')
    if(isset($_REQUEST['isbuy']) && $_REQUEST['isbuy'] == 'now')
    {
        if($userid <= 0){
        	$result['error']   = 0;
        	$result['message'] = '请选登陆！';
        	die($json->encode($result));
        }else{
        	clear_cart();
        }
    }

    /* 检查：商品数量是否合法 */
    if (!is_numeric($goods->number) || intval($goods->number) <= 0)
    {
        $result['error']   = 1;
        $result['message'] = $_LANG['invalid_number'];
    }
    /* 更新：购物车 */
    else
    {
        if(!empty($goods->spec))
        {
            foreach ($goods->spec as  $key=>$val )
            {
                $goods->spec[$key]=intval($val);
            }
        }
        // 更新：添加到购物车
        if (addto_cart($goods->goods_id, $goods->number, $goods->spec, $goods->parent))
        {
            if ($_CFG['cart_confirm'] > 2)
            {
                $result['message'] = '';
            }
            else
            {
                $result['message'] = $_CFG['cart_confirm'] == 1 ? $_LANG['addto_cart_success_1'] : $_LANG['addto_cart_success_2'];
            }

            $result['content'] = insert_cart_info();
            $result['one_step_buy'] = $_CFG['one_step_buy'];
        }
        else
        {
            $result['message']  = $err->last_message();
            $result['error']    = $err->error_no;
            $result['goods_id'] = stripslashes($goods->goods_id);
            if (is_array($goods->spec))
            {
                $result['product_spec'] = implode(',', $goods->spec);
            }
            else
            {
                $result['product_spec'] = $goods->spec;
            }
        }
    }
	$rows = $GLOBALS['db']->getRow("select goods_brief,shop_price,goods_name,promote_end_date,promote_start_date,promote_price,goods_thumb from ".$GLOBALS['ecs']->table('goods')." where goods_id=".$goods->goods_id);
	$time1 = gmtime();
	if ($time1 >= $rows['promote_start_date'] && $time1 <= $rows['promote_end_date'] && $rows['promote_price'] > 0)
	{
		$result['shop_price'] = price_format($rows['promote_price']);
	}else{
		$result['shop_price'] = price_format($rows['shop_price']);
	}
	$result['goods_name'] = $rows['goods_name'];
	$result['goods_thumb'] = $rows['goods_thumb'];
	$result['goods_brief'] = $rows['goods_brief'];
	$result['goods_id'] = $goods->goods_id;
	$sql_where = $_SESSION['user_id']>0 ? "user_id='". $_SESSION['user_id'] ."' " : "session_id = '" . SESS_ID . "' AND user_id=0 ";//添加 www.68ecshop.com
	$sql = 'SELECT SUM(goods_number) AS number, SUM(goods_price * goods_number) AS amount' .
	' FROM ' . $GLOBALS['ecs']->table('cart') .
	" WHERE ".$sql_where." AND rec_type = '" . CART_GENERAL_GOODS . "'";
	$rowss = $GLOBALS['db']->GetRow($sql);
	$result['goods_price'] = price_format($rowss['amount']);
	$result['goods_number'] = $rowss['number'];
    $result['confirm_type'] = !empty($_CFG['cart_confirm']) ? $_CFG['cart_confirm'] : 2;
    die($json->encode($result));
}
elseif ($_REQUEST['step'] == 'add_favourable')
{
	$result = array('error' => 0, 'message' => '', 'content' => '');
    /* 取得优惠活动信息 */
    $act_id = intval($_POST['act_id']);
    $favourable = favourable_info($act_id);
    if (empty($favourable))
    {
        //show_message($_LANG['favourable_not_exist']);
        $result['error'] = 1;
        $result['message'] = $_LANG['favourable_not_exist'];
        die($json->encode($result));
    }

    /* 判断用户能否享受该优惠 */
    if (!favourable_available($favourable))
    {
        //show_message($_LANG['favourable_not_available']);
        $result['error'] = 1;
        $result['message'] = $_LANG['favourable_not_available'];
        die($json->encode($result));
    }

    /* 检查购物车中是否已有该优惠 */
    $cart_favourable = cart_favourable();
    if (favourable_used($favourable, $cart_favourable))
    {
        //show_message($_LANG['favourable_used']);
        $result['error'] = 1;
        $result['message'] = $_LANG['favourable_used'];
        die($json->encode($result));
    }
    
    $_POST['gift'] = array_filter(explode(',',$_POST['gift']));

    /* 赠品（特惠品）优惠 */
    if ($favourable['act_type'] == FAT_GOODS)
    {
        /* 检查是否选择了赠品 */
        if (empty($_POST['gift']))
        {
            //show_message($_LANG['pls_select_gift']);
            $result['error'] = 1;
        	$result['message'] = $_LANG['pls_select_gift'];
        	die($json->encode($result));
        }

		$sql_where = $_SESSION['user_id']>0 ? "user_id='". $_SESSION['user_id'] ."' " : "session_id = '" . SESS_ID . "' AND user_id=0 ";//添加 www.68ecshop.com
        /* 检查是否已在购物车 */
        $sql = "SELECT goods_name" .
                " FROM " . $ecs->table('cart') .
                " WHERE $sql_where " .
                " AND rec_type = '" . CART_GENERAL_GOODS . "'" .
                " AND is_gift = '$act_id'" .
                " AND goods_id " . db_create_in($_POST['gift']);
        $gift_name = $db->getCol($sql);
        if (!empty($gift_name))
        {
            //show_message(sprintf($_LANG['gift_in_cart'], join(',', $gift_name)));
            $result['error'] = 1;
        	$result['message'] = sprintf($_LANG['gift_in_cart'], join(',', $gift_name));
        	die($json->encode($result));
        }

        /* 检查数量是否超过上限 */
        $count = isset($cart_favourable[$act_id]) ? $cart_favourable[$act_id] : 0;
        if ($favourable['act_type_ext'] > 0 && $count + count($_POST['gift']) > $favourable['act_type_ext'])
        {
            //show_message($_LANG['gift_count_exceed']);
            $result['error'] = 1;
        	$result['message'] = $_LANG['gift_count_exceed'];
        	die($json->encode($result));
        }

        /* 添加赠品到购物车 */
        foreach ($favourable['gift'] as $gift)
        {
            if (in_array($gift['id'], $_POST['gift']))
            {
                add_gift_to_cart($act_id, $gift['id'], $gift['price']);
            }
        }
    }
    elseif ($favourable['act_type'] == FAT_DISCOUNT)
    {
        add_favourable_to_cart($act_id, $favourable['act_name'], cart_favourable_amount($favourable) * (100 - $favourable['act_type_ext']) / 100);
    }
    elseif ($favourable['act_type'] == FAT_PRICE)
    {
        add_favourable_to_cart($act_id, $favourable['act_name'], $favourable['act_type_ext']);
    }
    
    die($json->encode($result));
    /* 刷新购物车 */
    ecs_header("Location: flow.php\n");
    exit;
}

/*------------------------------------------------------ */
//-- 删除购物车中的商品
/*------------------------------------------------------ */

elseif ($_REQUEST['step'] == 'drop_goods')
{
	$result = array('error' => 0, 'message' => '', 'content' => '');
    $rec_id = intval($_GET['id']);
    flow_drop_cart_goods($rec_id);
    
    die($json->encode($result));
    ecs_header("Location: flow.php\n");
    exit;
}

/*
 * 结算页面
 */
elseif ($_REQUEST['step'] == 'checkout')
{
	$result = array('error' => 0, 'result' => '');
	
/*------------------------------------------------------ */
    //-- 订单确认
    /*------------------------------------------------------ */
	
	/*
     * 检查用户是否已经登录
     * 如果没有登录则跳转到登录和注册页面
     */
    if ($_SESSION['user_id'] == 0)
    {
        $result['error'] = 2;
		$result['result'] = $_LANG['no_goods_in_cart'];
		die($json->encode($result));
        exit;
    }

 /* 取得购物类型 */
	$flow_type = isset($_SESSION['flow_type']) ? intval($_SESSION['flow_type']) : CART_GENERAL_GOODS;

    /* 团购标志 */
    if ($flow_type == CART_GROUP_BUY_GOODS)
    {
        $smarty->assign('is_group_buy', 1);
    }
    /* 积分兑换商品 */
    elseif ($flow_type == CART_EXCHANGE_GOODS)
    {
        $smarty->assign('is_exchange_goods', 1);
    }
    else
    {
        //正常购物流程  清空其他购物流程情况
        $_SESSION['flow_order']['extension_code'] = '';
    }
    
    if($flow_type != CART_EXCHANGE_GOODS){
    	//非积分兑换形式的商品
    	/* 代码增加_start  By  www.68ecshop.com */
		$sel_cartgoods_count = count($_REQUEST['sel_cartgoods']);
		$_SESSION['sel_cartgoods'] =  $sel_cartgoods_count>0 ? (implode(",", $_REQUEST['sel_cartgoods'])) : $_SESSION['sel_cartgoods'];
		/* 代码增加_end   By  www.68ecshop.com */
		
		//验证购物车中提交过来的商品中参加的活动是否都正常start
		$_REQUEST['sel_goods'] = $_SESSION['sel_cartgoods'];
		$favourable_list = favourable_list($_SESSION['user_rank'],false);
		if($favourable_list){
			$sql_where = $_SESSION['user_id']>0 ? "user_id='". $_SESSION['user_id'] ."' " : "session_id = '" . SESS_ID . "' AND user_id=0 ";
			foreach($favourable_list as $fk=>$fv){
				if(!$fv['available']){
					$sql = "select count(rec_id) as num from ". $ecs->table('cart') .
					" WHERE $sql_where " .
	        		"AND is_gift = ".$fv['act_id'];
					if($db->getOne($sql) > 0){
						$result['error'] = 1;
						$result['result'] = '购物车中参加['.$fv['act_name'].']活动的商品未满足条件，请重新设置或者将其赠品删除';
						die($json->encode($result));
						//show_message('购物车中参加['.$fv['act_name'].']活动的商品未满足条件，请重新设置或者将其赠品删除', '', '', 'warning');
					}
				}
			}
			unset($sql_where);
		}
	
		//验证购物车中提交过来的商品中参加的活动是否都正常end
    }

    /* 检查购物车中是否有商品 */
    /* 代码增加_end  By www.68ecshop.com */
	$sql_where = $_SESSION['user_id']>0 ? "user_id='". $_SESSION['user_id'] ."' " : "session_id = '" . SESS_ID . "' AND user_id=0 ";

    $sql = "SELECT COUNT(*) FROM " . $ecs->table('cart') .
        " WHERE $sql_where " .
        "AND parent_id = 0 AND is_gift = 0 AND rec_type = '$flow_type'";

/* 代码增加_end  By www.68ecshop.com */
    if ($db->getOne($sql) == 0)
    {
    	$result['error'] = 1;
		$result['result'] = $_LANG['no_goods_in_cart'];
		die($json->encode($result));
        //show_message($_LANG['no_goods_in_cart'], '', '', 'warning');
    }

    /*
     * 检查用户是否已经登录
     * 如果用户已经登录了则检查是否有默认的收货地址
     * 如果没有登录则跳转到登录和注册页面
     */
    if (empty($_SESSION['direct_shopping']) && $_SESSION['user_id'] == 0)
    {
        /* 用户没有登录且没有选定匿名购物，转向到登录页面 */
    	$result['error'] = 2;
		$result['result'] = $_LANG['no_goods_in_cart'];
		die($json->encode($result));
    	
       // ecs_header("Location: flow.php?step=login\n");
        //exit;
    }
    
    $consignee = get_consignee($_SESSION['user_id']);
    
    //$smarty->assign('consignee', $consignee);
    if(!empty($consignee) && $_SESSION['user_id'] > 0){
		$consignee['address_short_name'] .=  get_region_info($consignee['province'])."-";
		$consignee['address_short_name'] .=  get_region_info($consignee['city'])."-";
		$consignee['address_short_name'] .=  get_region_info($consignee['district'])."&nbsp;";
		$consignee['address_short_name'] .=  sub_str($consignee['address'],16);
		$consignee['address_short_name'] .=  $consignee['zipcode'] ? (",".$consignee['zipcode']) : "";
    }

	/* 代码增加_start  By  www.68ecshop.com */
   $smarty->assign('consignee_list', $consignee);
   $smarty->assign('shop_province_list', get_regions(1, $_CFG['shop_country']));
	/* 代码增加_end  By  www.68ecshop.com */
   
   /* 对商品信息赋值 */
    $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计
    /*
     * 分供货商显示商品
     */
    $cart_ids = $cart_goods_new = array();
    if(count($cart_goods)>0){
    	foreach($cart_goods as $key => $val){
    		$cart_goods_new['0']['goodlist'][] = $val;
			$cart_ids[] = $val['rec_id'];
    	}
    }
	$_SESSION['sel_cartgoods'] = (isset($_SESSION['sel_cartgoods']) && !empty($_SESSION['sel_cartgoods'])) ? $_SESSION['sel_cartgoods'] : implode(',',$cart_ids);//针对app添加
    
    if ($flow_type != CART_EXCHANGE_GOODS && $flow_type != CART_GROUP_BUY_GOODS)
    {
	    foreach($cart_goods_new as $k => $v){
			$discount = compute_discount($k);
			if(is_array($discount)){
				$cart_goods_new[$k]['zhekou']['discount'] = $discount['discount'];
				$favour_name = empty($discount['name']) ? '' : join(',', $discount['name']);
				$cart_goods_new[$k]['zhekou']['your_discount'] = sprintf($_LANG['your_discount'], $favour_name, price_format($discount['discount']));
			}
	    }
    }
    /* 对是否允许修改购物车赋值 */
    if ($flow_type != CART_GENERAL_GOODS || $_CFG['one_step_buy'] == '1')
    {
        $smarty->assign('allow_edit_cart', 0);
    }
    else
    {
        $smarty->assign('allow_edit_cart', 1);
    }

    /*
     * 取得购物流程设置
     */
    $smarty->assign('config', $_CFG);
    /*
     * 取得订单信息
     */
    $order = flow_order_info();
    $smarty->assign('order', $order);

    /*
     * 计算订单的费用
     */
    $total = order_fee($order, $cart_goods, $consignee);


    $smarty->assign('total', $total);
    $smarty->assign('shopping_money', sprintf($_LANG['shopping_money'], $total['formated_goods_price']));
    $smarty->assign('market_price_desc', sprintf($_LANG['than_market_price'], $total['formated_market_price'], $total['formated_saving'], $total['save_rate']));
   
   
   /* 取得配送列表 */
    $region            = array($consignee['country'], $consignee['province'], $consignee['city'], $consignee['district']);
    $shipping_list     = available_shipping_list($region);
    $cart_weight_price = cart_weight_price($flow_type);
    $insure_disabled   = true;
    $cod_disabled      = true;

    // 查看购物车中是否全为免运费商品，若是则把运费赋为零
    //$sql = 'SELECT count(*) FROM ' . $ecs->table('cart') . " WHERE `session_id` = '" . SESS_ID. "' AND `extension_code` != 'package_buy' AND `is_shipping` = 0";
    $sql = 'SELECT count(*) FROM ' . $ecs->table('cart') . " WHERE $sql_where AND `extension_code` != 'package_buy' AND `is_shipping` = 0";
    $shipping_count = $db->getOne($sql);

    foreach ($shipping_list AS $key => $val)
    {
        $shipping_cfg = unserialize_config($val['configure']);
        $shipping_fee = ($shipping_count == 0 AND $cart_weight_price['free_shipping'] == 1) ? 0 : shipping_fee($val['shipping_code'], unserialize($val['configure']),
        $cart_weight_price['weight'], $cart_weight_price['amount'], $cart_weight_price['number']);

        $shipping_list[$key]['format_shipping_fee'] = price_format($shipping_fee, false);
        $shipping_list[$key]['shipping_fee']        = $shipping_fee;
        $shipping_list[$key]['free_money']          = price_format($shipping_cfg['free_money'], false);
        $shipping_list[$key]['insure_formated']     = strpos($val['insure'], '%') === false ?
            price_format($val['insure'], false) : $val['insure'];

        /* 当前的配送方式是否支持保价 */
        if ($val['shipping_id'] == $order['shipping_id'])
        {
            $insure_disabled = ($val['insure'] == 0);
            $cod_disabled    = ($val['support_cod'] == 0);
        }
    }

    $smarty->assign('shipping_list',   $shipping_list);
    $smarty->assign('insure_disabled', $insure_disabled);
    $smarty->assign('cod_disabled',    $cod_disabled);
    
    /* 取得支付列表 */
    if ($order['shipping_id'] == 0)
    {
        $cod        = true;
        $cod_fee    = 0;
    }
    else
    {
        $shipping = shipping_info($order['shipping_id']);
        $cod = $shipping['support_cod'];

        if ($cod)
        {
            /* 如果是团购，且保证金大于0，不能使用货到付款 */
            if ($flow_type == CART_GROUP_BUY_GOODS)
            {
                $group_buy_id = $_SESSION['extension_id'];
                if ($group_buy_id <= 0)
                {
                    //show_message('error group_buy_id');
                     	$result['error'] = 1;
						$result['result'] = 'error group_buy_id';
						die($json->encode($result));
                }
                $group_buy = group_buy_info($group_buy_id);
                if (empty($group_buy))
                {
                    //show_message('group buy not exists: ' . $group_buy_id);
                    $result['error'] = 1;
						$result['result'] = 'group buy not exists: ' . $group_buy_id;
						die($json->encode($result));
                }

                if ($group_buy['deposit'] > 0)
                {
                    $cod = false;
                    $cod_fee = 0;

                    /* 赋值保证金 */
                    $smarty->assign('gb_deposit', $group_buy['deposit']);
                }
            }

            if ($cod)
            {
                $shipping_area_info = shipping_area_info($order['shipping_id'], $region);
                $cod_fee            = $shipping_area_info['pay_fee'];
            }
        }
        else
        {
            $cod_fee = 0;
        }
    }

    // 给货到付款的手续费加<span id>，以便改变配送的时候动态显示
    $payment_list = available_payment_list(1, $cod_fee);
    if(isset($payment_list))
    {
        foreach ($payment_list as $key => $payment)
        {
            if ($payment['is_cod'] == '1')
            {
                $payment_list[$key]['format_pay_fee'] = '<span id="ECS_CODFEE">' . $payment['format_pay_fee'] . '</span>';
            }
            /* 如果有易宝神州行支付 如果订单金额大于300 则不显示 */
            if ($payment['pay_code'] == 'yeepayszx' && $total['amount'] > 300)
            {
                unset($payment_list[$key]);
            }
            /* 如果有余额支付 */
            if ($payment['pay_code'] == 'balance')
            {
                /* 如果未登录，不显示 */
                if ($_SESSION['user_id'] == 0)
                {
                    unset($payment_list[$key]);
                }
                else
                {
                    if ($_SESSION['flow_order']['pay_id'] == $payment['pay_id'])
                    {
                        $smarty->assign('disable_surplus', 1);
                    }
                }
            }
        }
    }
    $smarty->assign('payment_list', $payment_list);
    

    $user_info = user_info($_SESSION['user_id']);
   

    /* 如果使用余额，取得用户余额 */
    if ((!isset($_CFG['use_surplus']) || $_CFG['use_surplus'] == '1')
        && $_SESSION['user_id'] > 0
        && $user_info['user_money'] > 0)
    {
        // 能使用余额
        $smarty->assign('allow_use_surplus', 1);
        $smarty->assign('your_surplus', $user_info['user_money']);
    }

    /* 如果使用积分，取得用户可用积分及本订单最多可以使用的积分 */
    if ((!isset($_CFG['use_integral']) || $_CFG['use_integral'] == '1')
        && $_SESSION['user_id'] > 0
        && $user_info['pay_points'] > 0
        && ($flow_type != CART_GROUP_BUY_GOODS && $flow_type != CART_EXCHANGE_GOODS))
    {
        // 能使用积分
        $keyong = flow_available_points();// 可用积分
        foreach($keyong as $k=>$v){
        	$cart_goods_new[$k]['jifen'] = $v;
        }
        
        $smarty->assign('allow_use_integral', 1);
        //$smarty->assign('order_max_integral', $keyong);  
        $smarty->assign('your_integral',      $user_info['pay_points']); // 用户积分
    }

    /* 如果使用红包，取得用户可以使用的红包及用户选择的红包 */
    if ((!isset($_CFG['use_bonus']) || $_CFG['use_bonus'] == '1')
        && ($flow_type != CART_GROUP_BUY_GOODS && $flow_type != CART_EXCHANGE_GOODS))
    {
        // 取得用户可用红包
        $user_bonus = user_bonus($_SESSION['user_id'], $total['goods_price']);
        if (!empty($user_bonus))
        {
            foreach ($user_bonus AS $key => $val)
            {
                $user_bonus[$key]['bonus_money_formated'] = price_format($val['type_money'], false);
				if(isset($cart_goods_new['0'])){
					$cart_goods_new['0']['redbag'][] = $user_bonus[$key];
				}
            }
            
            $smarty->assign('bonus_list', $user_bonus);
        }

        // 能使用红包
        $smarty->assign('allow_use_bonus', 1);
    }
    $smarty->assign('goods_list', $cart_goods_new);

    /* 如果使用缺货处理，取得缺货处理列表 */
    if (!isset($_CFG['use_how_oos']) || $_CFG['use_how_oos'] == '1')
    {
        if (is_array($GLOBALS['_LANG']['oos']) && !empty($GLOBALS['_LANG']['oos']))
        {
            $smarty->assign('how_oos_list', $GLOBALS['_LANG']['oos']);
        }
    }

    /* 保存 session */
    $_SESSION['flow_order'] = $order;
	
	
	$res['result'] =  $smarty->fetch("checkout_app.lbi");
	$res['shipping_id'] = intval($order['shipping_id']);
	die($json->encode($res));
}

elseif ($_REQUEST['step'] == 'select_shipping')
{
    /*------------------------------------------------------ */
    //-- 改变配送方式
    /*------------------------------------------------------ */
    $result = array('error' => 0,'message'=>'', 'content' => '', 'need_insure' => 0);

    /* 取得购物类型 */
    $flow_type = isset($_SESSION['flow_type']) ? intval($_SESSION['flow_type']) : CART_GENERAL_GOODS;

    /* 获得收货人信息 */
    $consignee = get_consignee($_SESSION['user_id']);

    /* 对商品信息赋值 */
    $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计

    if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
    {
    	$result['error'] = 1;
        $result['message'] = $_LANG['no_goods_in_cart'];
    }
    else
    {
        /* 取得购物流程设置 */
        $smarty->assign('config', $_CFG);

        /* 取得订单信息 */
        $order = flow_order_info();

        $order['shipping_id'] = intval($_REQUEST['shipping']);
        $regions = array($consignee['country'], $consignee['province'], $consignee['city'], $consignee['district']);
        $shipping_info = shipping_area_info($order['shipping_id'], $regions);
		
		
        /* 计算订单的费用 */
        $total = order_fee($order, $cart_goods, $consignee);
		$total['shipping_desc'] = $shipping_info['shipping_desc'];
        $smarty->assign('total', $total);

        /* 取得可以得到的积分和红包 */
        $smarty->assign('total_integral', cart_amount(false, $flow_type) - $total['bonus'] - $total['integral_money']);
        $smarty->assign('total_bonus',    price_format(get_total_bonus(), false));

        /* 团购标志 */
        if ($flow_type == CART_GROUP_BUY_GOODS)
        {
            $smarty->assign('is_group_buy', 1);
        }

        $result['cod_fee']     = $shipping_info['pay_fee'];
		$result['support_cod'] = $shipping_info['support_cod'];
		
        if (strpos($result['cod_fee'], '%') === false)
        {
            $result['cod_fee'] = price_format($result['cod_fee'], false);
        }
		 $result['need_insure'] = ($shipping_info['insure'] > 0) ? 1 : 0;
        $result['content']     = $smarty->fetch('app/order_total_app.lbi');

		/* 代码增加_start  By  www.68ecshop.com */
		$result['supplier_shipping']     = $smarty->fetch('app/order_supplier_shipping_app.lbi');
		/* 代码增加_end   By  www.68ecshop.com */
		$result['pickup_content']     =  '';
		if(intval($_REQUEST['pickup']) > 0){//目前没有此功能app端
			$sql = 'select * from ' . $ecs->table('pickup_point') .
				' where city_id=' . $consignee['city'];
			$pickup_point_list = $db->getAll($sql);
				$smarty->assign('pickup_point_list',      $pickup_point_list);
				$result['pickup_content']     = $smarty->fetch('library/pickup.lbi');
		}
    }

    echo $json->encode($result);
    exit;
}


elseif ($_REQUEST['step'] == 'select_insure')
{
    /*------------------------------------------------------ */
    //-- 选定/取消配送的保价
    /*------------------------------------------------------ */
	$result = array('error' => 0,'message'=>'', 'content' => '');

	$_GET['insure'] = !empty($_GET['insure']) ? urldecode($_GET['insure']) : '';
    /* 取得购物类型 */
    $flow_type = isset($_SESSION['flow_type']) ? intval($_SESSION['flow_type']) : CART_GENERAL_GOODS;

    /* 获得收货人信息 */
    $consignee = get_consignee($_SESSION['user_id']);

    /* 对商品信息赋值 */
    $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计

    if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
    {
        $result['error'] = $_LANG['no_goods_in_cart'];
    }
    else
    {
        /* 取得购物流程设置 */
        $smarty->assign('config', $_CFG);

        /* 取得订单信息 */
        $order = flow_order_info();

        $order['need_insure'] = intval($_REQUEST['insure']);


    }
     /* 保存 session */


 $_SESSION['flow_order'] = $order;
 $total = order_fee($order, $cart_goods, $consignee);
 $smarty->assign('total', $total);
$result['content'] = $smarty->fetch('app/order_total_app.lbi');

    die($json->encode($result));
}

elseif ($_REQUEST['step'] == 'select_payment')
{
    /*------------------------------------------------------ */
    //-- 改变支付方式
    /*------------------------------------------------------ */
    $result = array('error' => '', 'content' => '', 'need_insure' => 0, 'payment' => 1);

    /* 取得购物类型 */
    $flow_type = isset($_SESSION['flow_type']) ? intval($_SESSION['flow_type']) : CART_GENERAL_GOODS;

    /* 获得收货人信息 */
    $consignee = get_consignee($_SESSION['user_id']);

    /* 对商品信息赋值 */
    $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计

    if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
    {
        $result['error'] = $_LANG['no_goods_in_cart'];
    }
    else
    {
        /* 取得购物流程设置 */
        $smarty->assign('config', $_CFG);

        /* 取得订单信息 */
        $order = flow_order_info();

        $order['pay_id'] = intval($_REQUEST['payment']);
        $payment_info = payment_info($order['pay_id']);
        $result['pay_code'] = $payment_info['pay_code'];

        /* 保存 session */
        $_SESSION['flow_order'] = $order;

        /* 计算订单的费用 */
        $total = order_fee($order, $cart_goods, $consignee);
        $smarty->assign('total', $total);

        /* 取得可以得到的积分和红包 */
        $smarty->assign('total_integral', cart_amount(false, $flow_type) - $total['bonus'] - $total['integral_money']);
        $smarty->assign('total_bonus',    price_format(get_total_bonus(), false));

        /* 团购标志 */
        if ($flow_type == CART_GROUP_BUY_GOODS)
        {
            $smarty->assign('is_group_buy', 1);
        }

        $result['content'] = $smarty->fetch('library/order_total_app.lbi');
    }

    echo $json->encode($result);
    exit;
}

elseif ($_REQUEST['step'] == 'change_bonus')
{
    /*------------------------------------------------------ */
    //-- 改变红包
    /*------------------------------------------------------ */
    $result = array('error' => 0,'message'=>'', 'content' => '');

    /* 取得购物类型 */
    $flow_type = isset($_SESSION['flow_type']) ? intval($_SESSION['flow_type']) : CART_GENERAL_GOODS;

    /* 获得收货人信息 */
    $consignee = get_consignee($_SESSION['user_id']);

    /* 对商品信息赋值 */
    $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计

    if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
    {
    	$result['error'] = 1;
        $result['message'] = $_LANG['no_goods_in_cart'];
        die($json->encode($result));
    }
    else
    {
        /* 取得购物流程设置 */
        $smarty->assign('config', $_CFG);

		$result['suppid'] = $suppid = intval($_GET['suppid']);

        /* 取得订单信息 */
        $order = flow_order_info();

        $bonus = bonus_info(intval($_GET['bonus']));

        if ((!empty($bonus) && $bonus['user_id'] == $_SESSION['user_id'] && $bonus['supplier_id'] == $suppid) || intval($_GET['bonus']) == 0)
        {
			$bonus_info = (isset($order['bonus_id_info'])) ? $order['bonus_id_info'] : array();
			if(intval($_GET['bonus']) == 0){
				unset($bonus_info[$suppid]);
			}else{
				$bonus_info[$suppid] = $_GET['bonus'];
			}
			$order['bonus_id_info'] = $bonus_info = array_filter($bonus_info);
            $order['bonus_id'] = implode(',',$bonus_info);//intval($_GET['bonus']);

			$bonus_sn_info = (isset($order['bonus_sn_info'])) ? $order['bonus_sn_info'] : array();
			unset($bonus_sn_info[$suppid]);
			$order['bonus_sn_info'] = $bonus_sn_info = array_filter($bonus_sn_info);
			$order['bonus_sn'] = implode(',',$bonus_sn_info);
        }
        else
        {
            $order['bonus_id'] = 0;
            $result['error'] = 1;
            $result['message'] = $_LANG['invalid_bonus'];
        }

        /* 计算订单的费用 */
        $total = order_fee($order, $cart_goods, $consignee);
        $smarty->assign('total', $total);

        /* 团购标志 */
        if ($flow_type == CART_GROUP_BUY_GOODS)
        {
            $smarty->assign('is_group_buy', 1);
        }

        $result['content'] = $smarty->fetch('app/order_total_app.lbi');
    }

    die($json->encode($result));
}

/* 验证红包序列号 */
elseif ($_REQUEST['step'] == 'validate_bonus')
{

    $result = array('error' => 0,'message'=>'', 'content' => '');

	$result['suppid'] = $suppid = intval($_GET['suppid']);

	$bonus_sn = intval($_REQUEST['bonus_sn']);
    if (is_numeric($bonus_sn) && $bonus_sn>0)
    {
        $bonus = bonus_info(0, $bonus_sn);
    }
    else
    {
        $bonus = array();
    }
    /* 取得购物类型 */
    $flow_type = isset($_SESSION['flow_type']) ? intval($_SESSION['flow_type']) : CART_GENERAL_GOODS;

    /* 获得收货人信息 */
    $consignee = get_consignee($_SESSION['user_id']);

    /* 对商品信息赋值 */
    $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计

    if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
    {
    	$result['error'] = 1;
        $result['message'] = $_LANG['no_goods_in_cart'];
    }
    else
    {
		
        /* 取得购物流程设置 */
        $smarty->assign('config', $_CFG);

        /* 取得订单信息 */
        $order = flow_order_info();
		$bonus_info = (isset($order['bonus_sn_info'])) ? $order['bonus_sn_info'] : array();
		$bonus_id_info = (isset($order['bonus_id_info'])) ? $order['bonus_id_info'] : array();
		

        if (((!empty($bonus) && $bonus['user_id'] == $_SESSION['user_id']) || ($bonus['type_money'] > 0 && empty($bonus['user_id']))) && $bonus['order_id'] <= 0)
        {
			
            //$order['bonus_kill'] = $bonus['type_money'];
            $now = gmtime();
            if ($now > $bonus['use_end_date'])
            {
                
				$order['bonus_sn'] = '';
				//$order['bonus_sn'] = implode(',',$bonus_info);//$bonus_sn;
				$result['error'] = 1;
                $result['message']=$_LANG['bonus_use_expire'];
            }
            else
            {
				$bonus_info[$suppid] = $bonus_sn;
				//$order['bonus_kill'] = $bonus['send_type'];
				$order['bonus_sn_info'] = $bonus['bonus_info'];//$bonus_info = array_filter($bonus_info);
                $order['bonus_sn'] = $bonus['bonus_sn'];//implode(',',$bonus['bonus_info']);//$bonus_sn;
				//unset($bonus_id_info[$suppid]);
				//$order['bonus_id_info'] = $bonus_id_info = array_filter($bonus_id_info);
				$order['bonus_id'] = $bonus['bonus_id'];//implode(',',$bonus_id_info);
				 /* 计算订单的费用 */
				$total = order_fee($order, $cart_goods, $consignee);

				if($total['goods_price']<$bonus['min_goods_amount'])
				{
				 $order['bonus_id'] = '';
				 /* 重新计算订单 */
				 $total = order_fee($order, $cart_goods, $consignee);
				 $result['error'] = 1;
				 $result['message'] = sprintf($_LANG['bonus_min_amount_error'], price_format($bonus['min_goods_amount'], false));
				}
				$smarty->assign('total', $total);

				/* 团购标志 */
				if ($flow_type == CART_GROUP_BUY_GOODS)
				{
					$smarty->assign('is_group_buy', 1);
				}

				$result['content'] = $smarty->fetch('app/order_total_app.lbi');
				
            }
        }
        else
        {
			$order['bonus_sn'] = '';//$bonus_sn;
			$result['error'] = 1;
			$result['message']=$_LANG['bonus_not_exist'];
        }
		//echo "<pre>";
		//print_r($order);
       
    }
    die($json->encode($result));
}

elseif ($_REQUEST['step'] == 'change_integral')
{
    /*------------------------------------------------------ */
    //-- 改变积分
    /*------------------------------------------------------ */
	
	$result = array('error' => 0,'message'=>'', 'content' => '');

    $points    = floatval($_GET['points']);
    $result['suppid'] = $suppid		= intval($_GET['suppid']);
    $user_info = user_info($_SESSION['user_id']);
    
    

    /* 取得订单信息 */
    $order = flow_order_info();
    
    $integral_info = (isset($order['integral_info'])) ? $order['integral_info'] : array();
    $integral_info[$suppid] = $points;
    
    $order['integral_info'] = $integral_info;

    $flow_points = flow_available_points();  // 该订单允许使用的积分
    $user_points = $user_info['pay_points']; // 用户的积分总数
    
    //所有订单的总积分
    $points_all = array_sum($integral_info);

    if ($points_all > $user_points)
    {
    	$result['error'] = 1;
        $result['message'] = $_LANG['integral_not_enough'];
    }
    elseif ($points > $flow_points[$suppid])
    {
    	$result['error'] = 1;
        $result['message'] = sprintf($_LANG['integral_too_much'], $flow_points[$suppid]);
    }
    else
    {
        /* 取得购物类型 */
        $flow_type = isset($_SESSION['flow_type']) ? intval($_SESSION['flow_type']) : CART_GENERAL_GOODS;

        $order['integral'] = $points_all;

        /* 获得收货人信息 */
        $consignee = get_consignee($_SESSION['user_id']);

        /* 对商品信息赋值 */
        $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计

        if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
        {
        	$result['error'] = 1;
            $result['message'] = $_LANG['no_goods_in_cart'];
        }
        else
        {
            /* 计算订单的费用 */
            $total = order_fee($order, $cart_goods, $consignee);
            $smarty->assign('total',  $total);
            $smarty->assign('config', $_CFG);

            /* 团购标志 */
            if ($flow_type == CART_GROUP_BUY_GOODS)
            {
                $smarty->assign('is_group_buy', 1);
            }

            $result['content'] = $smarty->fetch('app/order_total_app.lbi');
        }
    }
    die($json->encode($result));
}

elseif ($_REQUEST['step'] == 'change_surplus')
{
    /*------------------------------------------------------ */
    //-- 改变余额
    /*------------------------------------------------------ */

	$result = array('error' => 0,'message'=>'', 'content' => '');
	
    $surplus   = floatval($_GET['surplus']);
    $result['suppid'] = $suppid		= intval($_GET['suppid']);
    $user_info = user_info($_SESSION['user_id']);
    
    /* 取得订单信息 */
    $order = flow_order_info();
    $surplus_info = (isset($order['surplus_info'])) ? $order['surplus_info'] : array();
	$surplus_info[$suppid] = $surplus;

    if ($user_info['user_money'] + $user_info['credit_line'] < array_sum($surplus_info))
    {
    	$result['error'] = 1;
        $result['message'] = $_LANG['surplus_not_enough'];
    }
    else
    {
        /* 取得购物类型 */
        $flow_type = isset($_SESSION['flow_type']) ? intval($_SESSION['flow_type']) : CART_GENERAL_GOODS;

        /* 取得购物流程设置 */
        $smarty->assign('config', $_CFG);

        /* 获得收货人信息 */
        $consignee = get_consignee($_SESSION['user_id']);

        /* 对商品信息赋值 */
        $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计

        if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
        {
        	$result['error'] = 1;
            $result['message'] = $_LANG['no_goods_in_cart'];
        }
        else
        {
            
		    
		    $order['surplus_info'] = $surplus_info;
            $order['surplus'] = array_sum($surplus_info);//$surplus;

            /* 计算订单的费用 */
            $total = order_fee($order, $cart_goods, $consignee);
            $smarty->assign('total', $total);

            /* 团购标志 */
            if ($flow_type == CART_GROUP_BUY_GOODS)
            {
                $smarty->assign('is_group_buy', 1);
            }

            $result['content'] = $smarty->fetch('app/order_total_app.lbi');
        }
    }
    die($json->encode($result));
}

elseif ($_REQUEST['step'] == 'done')
{
	$suppids = explode(',',$_POST['suppids']);
	if(isset($_POST['bonus'])){
		$_POST['bonus'] = array_combine($suppids, explode(',',$_POST['bonus']));
	}
	if(isset($_POST['bonus_sn'])){
		$_POST['bonus_sn'] = array_combine($suppids, explode(',',$_POST['bonus_sn']));
	}
	if(isset($_POST['integral'])){
		$_POST['integral'] = array_combine($suppids, explode(',',$_POST['integral']));
	}
	if(isset($_POST['surplus'])){
		$_POST['surplus'] = array_combine($suppids, explode(',',$_POST['surplus']));
	}
    include_once('../includes/lib_clips.php');
    include_once('../includes/lib_payment.php'); 
    
    $result = array('error'=>0,'result'=>'');
	/* 代码增加_start  By www.68ecshop.com */
	$id_ext ="";
	if ($_SESSION['sel_cartgoods'])
	{
		$id_ext = " AND rec_id in (". $_SESSION['sel_cartgoods'] .") ";
	}
	/* 代码增加_end  By www.68ecshop.com */

    /* 取得购物类型 */
    $flow_type = isset($_SESSION['flow_type']) ? intval($_SESSION['flow_type']) : CART_GENERAL_GOODS;
    
    /* 代码增加_end  By www.68ecshop.com */
	$sql_where = $_SESSION['user_id']>0 ? "user_id='". $_SESSION['user_id'] ."' " : "session_id = '" . SESS_ID . "' AND user_id=0 ";


    /* 检查购物车中是否有商品 */
    $sql = "SELECT COUNT(*) FROM " . $ecs->table('cart') .
        " WHERE $sql_where " .
        "AND parent_id = 0 AND is_gift = 0 AND rec_type = '$flow_type'";
    /* 代码增加_end  By www.68ecshop.com */
    if ($db->getOne($sql) == 0)
    {
        //show_message($_LANG['no_goods_in_cart'], '', '', 'warning');
        $result['error'] = 11;
		$result['result'] = $_LANG['no_goods_in_cart'];
		die($json->encode($result));
    }

    /* 检查商品库存 */
    /* 如果使用库存，且下订单时减库存，则减少库存 */
    if ($_CFG['use_storage'] == '1' && $_CFG['stock_dec_time'] == SDT_PLACE)
    {
        $cart_goods_stock = get_cart_goods();
        $_cart_goods_stock = array();
        foreach ($cart_goods_stock['goods_list'] as $value)
        {
            $_cart_goods_stock[$value['rec_id']] = $value['goods_number'];
        }
        flow_cart_stock($_cart_goods_stock);
        unset($cart_goods_stock, $_cart_goods_stock);
    }

    /*
     * 检查用户是否已经登录
     * 如果用户已经登录了则检查是否有默认的收货地址
     * 如果没有登录则跳转到登录和注册页面
     */
    if (empty($_SESSION['direct_shopping']) && $_SESSION['user_id'] == 0)
    {
    	$result['error'] = 2;
		$result['result'] = '请先登陆!';
		die($json->encode($result));
        /* 用户没有登录且没有选定匿名购物，转向到登录页面 */
        ecs_header("Location: flow.php?step=login\n");
        exit;
    }

    $consignee = get_consignee($_SESSION['user_id']);

    /* 检查收货人信息是否完整 */
    if (!check_consignee_info($consignee, $flow_type))
    {
        /* 如果不完整则转向到收货人信息填写界面 */
    	$result['error'] = 3;
		$result['result'] = '请先设置收货地址';
		die($json->encode($result));
        ecs_header("Location: flow.php?step=consignee\n");
        exit;
    }

	/* 订单中的商品 */
    $cart_goods = cart_goods($flow_type);
    
	$cart_goods_new = array();
    if(count($cart_goods)>0){
    	foreach($cart_goods as $key => $val){
    		$cart_goods_new['0']['goodlist'][$val['rec_id']] = $val;
    		$cart_goods_new['0']['referer'] = $val['seller'];
    	}
    }
    //echo "<pre>";
    //print_r($cart_goods);
    //print_r($cart_goods_new);

    if (empty($cart_goods))
    {
        //show_message($_LANG['no_goods_in_cart'], $_LANG['back_home'], './', 'warning');
        $result['error'] = 21;
		$result['result'] = $_LANG['no_goods_in_cart'];
		die($json->encode($result));
    }

    /* 检查商品总额是否达到最低限购金额 */
    if ($flow_type == CART_GENERAL_GOODS && cart_amount(true, CART_GENERAL_GOODS) < $_CFG['min_goods_amount'])
    {
        //show_message(sprintf($_LANG['goods_amount_not_enough'], price_format($_CFG['min_goods_amount'], false)));
        $result['error'] = 31;
		$result['result'] = sprintf($_LANG['goods_amount_not_enough'], price_format($_CFG['min_goods_amount'], false));
		die($json->encode($result));
    }

    
    //此订单拆分订单后的订单信息
    $order_info = array();
    //组装拆分的子订单数组信息start
    foreach ($cart_goods_new as $ckey=>$cval){
    	
    	$cart_goods = $cval['goodlist'];

	    $_POST['how_oos'] = isset($_POST['how_oos']) ? intval($_POST['how_oos']) : 0;
	    $_POST['card_message'] = isset($_POST['card_message']) ? compile_str($_POST['card_message']) : '';
	    $_POST['inv_type'] = !empty($_POST['inv_type']) ? compile_str($_POST['inv_type']) : '';
	    $_POST['inv_payee'] = isset($_POST['inv_payee']) ? compile_str($_POST['inv_payee']) : '';
	    $_POST['inv_content'] = isset($_POST['inv_content']) ? compile_str($_POST['inv_content']) : '';
	    $_POST['postscript'] = isset($_POST['postscript']) ? compile_str($_POST['postscript']) : '';
	    
	    $order_integral = isset($_POST['integral']) ? $_POST['integral'] : array();
	    $order_bonus_id = isset($_POST['bonus']) ? $_POST['bonus'] : array();
	    $order_bonus_sn = isset($_POST['bonus_sn']) ? $_POST['bonus_sn'] : array();
	    $order_surplus = isset($_POST['surplus']) ? $_POST['surplus'] : array();
	
	    $order = array(
	        'shipping_id'     => intval($_POST['shipping']),
	        'pay_id'          => intval($_POST['payment']),
	        'pack_id'         => isset($_POST['pack']) ? intval($_POST['pack']) : 0,
	        'card_id'         => isset($_POST['card']) ? intval($_POST['card']) : 0,
	        'card_message'    => trim($_POST['card_message']),
	        'surplus'         => isset($order_surplus[$ckey]) ? floatval($order_surplus[$ckey]) : 0.00,
	        'integral'        => isset($order_integral[$ckey]) ? intval($order_integral[$ckey]) : 0,
	        'bonus_id'        => isset($order_bonus_id[$ckey]) ? intval($order_bonus_id[$ckey]) : 0,
	        'need_inv'        => empty($_POST['need_inv']) ? 0 : 1,
	        'inv_type'        => $_POST['inv_type'],
	        'inv_payee'       => trim($_POST['inv_payee']),
	        'inv_content'     => $_POST['inv_content'],
	        'postscript'      => trim($_POST['postscript']),
	        'how_oos'         => isset($_LANG['oos'][$_POST['how_oos']]) ? addslashes($_LANG['oos'][$_POST['how_oos']]) : '',
	        'need_insure'     => isset($_POST['need_insure']) ? intval($_POST['need_insure']) : 0,
	        'user_id'         => $_SESSION['user_id'],
	        'add_time'        => gmtime(),
	        'order_status'    => OS_UNCONFIRMED,
	        'shipping_status' => SS_UNSHIPPED,
	        'pay_status'      => PS_UNPAYED,
	        'agency_id'       => get_agency_by_regions(array($consignee['country'], $consignee['province'], $consignee['city'], $consignee['district'])),
	    	'supplier_id'	  => $ckey
	        );

	    /* 扩展信息 */
	    if (isset($_SESSION['flow_type']) && intval($_SESSION['flow_type']) != CART_GENERAL_GOODS)
	    {
	        $order['extension_code'] = $_SESSION['extension_code'];
	        $order['extension_id'] = $_SESSION['extension_id'];
	    }
	    else
	    {
	        $order['extension_code'] = '';
	        $order['extension_id'] = 0;
	    }
	
	    /* 检查积分余额是否合法 */
	    $user_id = $_SESSION['user_id'];
	    if ($user_id > 0)
	    {
	        $user_info = user_info($user_id);
	
	        $order['surplus'] = min($order['surplus'], $user_info['user_money'] + $user_info['credit_line']);
	        if ($order['surplus'] < 0)
	        {
	            $order['surplus'] = 0;
	        }
	
	        // 查询用户有多少积分
	        $flow_points = flow_available_points();  // 该订单允许使用的积分
	        $user_points = $user_info['pay_points']; // 用户的积分总数

	
	        $order['integral'] = min($order['integral'], $user_points, $flow_points['0']);
			
			 if ($order['integral'] < 0)
	        {
	            $order['integral'] = 0;
	        }
	    }
	    else
	    {
	        $order['surplus']  = 0;
	        $order['integral'] = 0;
	    }
		
	    /* 检查红包是否存在 */
	    if ($order['bonus_id'] > 0)
	    {
	        $bonus = bonus_info($order['bonus_id']);
	
	        if (empty($bonus) || $bonus['user_id'] != $user_id || $bonus['order_id'] > 0 || $bonus['min_goods_amount'] > cart_amount_new(array_keys($cart_goods),true, $flow_type))
	        {
	            $order['bonus_id'] = 0;
	        }else{
	        	
	        }
	    }
	    elseif (isset($_POST['bonus_sn'][$ckey]))
	    {
	        $bonus_sn = intval($_POST['bonus_sn'][$ckey]);
	        $bonus = bonus_info(0, $bonus_sn);
	        $now = gmtime();
	        if (empty($bonus) || $bonus['user_id'] > 0 || $bonus['order_id'] > 0 || $bonus['min_goods_amount'] > cart_amount_new(array_keys($cart_goods),true, $flow_type) || $now > $bonus['use_end_date'])
	        {
	        }
	        else
	        {
	            if ($user_id > 0)
	            {
	                $sql = "UPDATE " . $ecs->table('user_bonus') . " SET user_id = '$user_id' WHERE bonus_id = '$bonus[bonus_id]' LIMIT 1";
	                $db->query($sql);
	            }
	            $order['bonus_id'] = $bonus['bonus_id'];//$bonus['bonus_id'];
	            $order['bonus_sn'] = $bonus_sn;
	        }
	    }
	    
    	/* 判断是不是实体商品 */
	    foreach ($cart_goods AS $val)
	    {
	        /* 统计实体商品的个数 */
	        if ($val['is_real'])
	        {
	            $is_real_good=1;
	        }
	    }
	    if(isset($is_real_good))
	    {
	        $sql="SELECT shipping_id FROM " . $ecs->table('shipping') . " WHERE shipping_id=".$order['shipping_id'] ." AND enabled =1"; 
	        if(!$db->getOne($sql))
	        {
	           show_message($_LANG['flow_no_shipping']);
	        }
	    }
	
	    /* 收货人信息 */
	    foreach ($consignee as $key => $value)
	    {
	        $order[$key] = addslashes($value);
	    }
	    
		/* 代码增加_start  By  www.68ecshop.com */
		$order['best_time'] = isset($_POST['best_time']) ? trim($_POST['best_time']) : '';
		/* 代码增加_end  By  www.68ecshop.com */
	
	   
	    /* 订单中的总额 */
	    $total = order_fee($order, $cart_goods, $consignee);
	    $order['bonus']        = $total['bonus'];
	    $order['goods_amount'] = $total['goods_price'];
	    $order['discount']     = $total['discount'];
	    $order['surplus']      = $total['surplus'];
	    $order['tax']          = $total['tax'];
	
	    // 购物车中的商品能享受红包支付的总额
	    $discount_amout = compute_discount_amount($ckey);
	    // 红包和积分最多能支付的金额为商品总额
	    $temp_amout = $order['goods_amount'] - $discount_amout;
	    if ($temp_amout <= 0)
	    {
	        $order['bonus_id'] = 0;
	    }
	
	    /* 配送方式 */
	    if ($order['shipping_id'] > 0)
	    {
	        $shipping = shipping_info($order['shipping_id']);
	        $order['shipping_name'] = addslashes($shipping['shipping_name']);
	    }
	    $order['shipping_fee'] = $total['shipping_fee'];
	    $order['insure_fee']   = $total['shipping_insure'];
	
	    /* 支付方式 */
	    if ($order['pay_id'] > 0)
	    {
	        $payment = payment_info($order['pay_id']);
	        $order['pay_name'] = addslashes($payment['pay_name']);
	    }
	    $order['pay_fee'] = $total['pay_fee'];
	    $order['cod_fee'] = $total['cod_fee'];
	
	    /* 商品包装 */
	    if ($order['pack_id'] > 0)
	    {
	        $pack               = pack_info($order['pack_id']);
	        $order['pack_name'] = addslashes($pack['pack_name']);
	    }
	    $order['pack_fee'] = $total['pack_fee'];
	
	    /* 祝福贺卡 */
	    if ($order['card_id'] > 0)
	    {
	        $card               = card_info($order['card_id']);
	        $order['card_name'] = addslashes($card['card_name']);
	    }
	    $order['card_fee']      = $total['card_fee'];
	
	    $order['order_amount']  = number_format($total['amount'], 2, '.', '');
	
    	/* 如果全部使用余额支付，检查余额是否足够 */
	    if ($payment['pay_code'] == 'balance' && $order['order_amount'] > 0)
	    {
	        if($order['surplus'] >0) //余额支付里如果输入了一个金额
	        {
	            $order['order_amount'] = $order['order_amount'] + $order['surplus'];
	            $order['surplus'] = 0;
	        }
	        if ($order['order_amount'] > ($user_info['user_money'] + $user_info['credit_line']))
	        {
	            //show_message($_LANG['balance_not_enough']);
	            $result['error'] = 41;
				$result['result'] = $_LANG['balance_not_enough'];
				die($json->encode($result));
	        }
	        else
	        {
	            $order['surplus'] = $order['order_amount'];
	            $order['order_amount'] = 0;
	        }
	    }
	
	    /* 如果订单金额为0（使用余额或积分或红包支付），修改订单状态为已确认、已付款 */
	    if ($order['order_amount'] <= 0)
	    {
	        $order['order_status'] = OS_CONFIRMED;
	        $order['confirm_time'] = gmtime();
	        $order['pay_status']   = PS_PAYED;
	        $order['pay_time']     = gmtime();
	        $order['order_amount'] = 0;
	    }
	
	    $order['integral_money']   = $total['integral_money'];
	    $order['integral']         = $total['integral'];
	
	    if ($order['extension_code'] == 'exchange_goods')
	    {
	        $order['integral_money']   = 0;
	        $order['integral']         = $total['exchange_integral'];
	    }
	
	    $order['from_ad']          = !empty($_SESSION['from_ad']) ? $_SESSION['from_ad'] : '0';
	    //$order['referer']          = !empty($_SESSION['referer']) ? addslashes($_SESSION['referer']) : '';
	    $order['referer']          = $cval['referer'];
	
	    /* 记录扩展信息 */
	    if ($flow_type != CART_GENERAL_GOODS)
	    {
	        $order['extension_code'] = $_SESSION['extension_code'];
	        $order['extension_id'] = $_SESSION['extension_id'];
	    }
	
	    $affiliate = unserialize($_CFG['affiliate']);
	    if(isset($affiliate['on']) && $affiliate['on'] == 1 && $affiliate['config']['separate_by'] == 1)
	    {
	        //推荐订单分成
	        $parent_id = get_affiliate();
	        if($user_id == $parent_id)
	        {
	            $parent_id = 0;
	        }
	    }
	    elseif(isset($affiliate['on']) && $affiliate['on'] == 1 && $affiliate['config']['separate_by'] == 0)
	    {
	        //推荐注册分成
	        $parent_id = 0;
	    }
	    else
	    {
	        //分成功能关闭
	        $parent_id = 0;
	    }
	    $order['parent_id'] = $parent_id;
		
	    	/* 代码增加_start   By www.ecshop68.com */
		/*  自提功能
			获取订单确认页选择的自提点
		*/
		$pickup_point = isset($_POST['pickup_point']) ? $_POST['pickup_point'] : 0;
		if($pickup_point > 0)
			$order['is_pickup'] = 1;
		else
			$order['is_pickup'] = 0;
		$order['pickup_point'] = $pickup_point;
		/* 代码增加_end   By www.ecshop68.com */
		//$order['order_sn'] = get_order_sn();
		
		if(count($order)>0){
			$order_info[$ckey] = $order;
		}
		unset($order);
    }
    //组装拆分的子订单数组信息end
    
    
    //判断是否拆分为多个订单,多个订单就生成父订单id号
    $del_patent_id = 0;
    if(count($order_info)>1){
    	$error_no = 0;
	    do
	    {
	        $save['order_sn'] = get_order_sn(); //获取新订单号
	        $GLOBALS['db']->autoExecute($GLOBALS['ecs']->table('order_info'), $save, 'INSERT');
	        $error_no = $GLOBALS['db']->errno();
	
	        if ($error_no > 0 && $error_no != 1062)
	        {
	            die($GLOBALS['db']->errorMsg());
	        }
	    }
	    while ($error_no == 1062); //如果是订单号重复则重新提交数据
	    $del_patent_id = $parent_order_id = $db->insert_id();
    }else{
    	$parent_order_id = 0;
    }
    
    $all_order_amount = 0;//记录订单所需支付的总金额
    //用来展示用的数组数据
    $split_order = array();
    $split_order['sub_order_count'] = count($order_info);
    //生成订单
    foreach($order_info as $ok=>$order){
    	
    	$cart_goods = $cart_goods_new[$ok]['goodlist']; 
    	
    	$id_ext_new = " AND rec_id in (". implode(',',array_keys($cart_goods)) .") ";
    	
    	//获取佣金id
    	//$order['rebate_id'] = get_order_rebate($ok);
    	
    	//下单来源
		$order['froms'] = 'app';
    	
    	$order['parent_order_id'] = $parent_order_id;
	     /* 插入订单表 */
	    $error_no = 0;
	    do
	    {
	        $order['order_sn'] = get_order_sn(); //获取新订单号
	        $GLOBALS['db']->autoExecute($GLOBALS['ecs']->table('order_info'), $order, 'INSERT');
	
	        $error_no = $GLOBALS['db']->errno();
	
	        if ($error_no > 0 && $error_no != 1062)
	        {
	            die($GLOBALS['db']->errorMsg());
	        }
	    }
	    while ($error_no == 1062); //如果是订单号重复则重新提交数据
	
	    $new_order_id = $db->insert_id();
	    $order['order_id'] = $new_order_id;
	    
	    $parent_order_id = ($parent_order_id>0) ? $parent_order_id : $new_order_id;
	
	    /* 插入订单商品 下面这个SQL有修改 by www.ecshop68.com 注意末尾那个字段 */
	    /* 代码增加_start  By www.68ecshop.com */
	    $sql = "INSERT INTO " . $ecs->table('order_goods') . "( " .
	                "order_id, goods_id, goods_name, goods_sn, product_id, goods_number, market_price, ".
	                "goods_price, goods_attr, is_real, extension_code, parent_id, is_gift, goods_attr_id) ".
	            " SELECT '$new_order_id', goods_id, goods_name, goods_sn, product_id, goods_number, market_price, ".
	                "goods_price, goods_attr, is_real, extension_code, parent_id, is_gift, goods_attr_id  ".
	            " FROM " .$ecs->table('cart') .
	            " WHERE $sql_where AND rec_type = '$flow_type' "; //$id_ext_new 
	    /* 代码增加_end  By www.68ecshop.com */
	    $db->query($sql);
	    /* 修改拍卖活动状态 */
	    if ($order['extension_code']=='auction')
	    {
	        $sql = "UPDATE ". $ecs->table('goods_activity') ." SET is_finished='2' WHERE act_id=".$order['extension_id'];
	        $db->query($sql);
	    }
	
	    /* 处理余额、积分、红包 */
	    if ($order['user_id'] > 0 && $order['surplus'] > 0)
	    {
	        log_account_change($order['user_id'], $order['surplus'] * (-1), 0, 0, 0, sprintf($_LANG['pay_order'], $order['order_sn']));
	    }
	    if ($order['user_id'] > 0 && $order['integral'] > 0)
	    {
	        log_account_change($order['user_id'], 0, 0, 0, $order['integral'] * (-1), sprintf($_LANG['pay_order'], $order['order_sn']));
	    }
	
	
	    if ($order['bonus_id'] > 0 && $temp_amout > 0)
	    {
	        use_bonus($order['bonus_id'], $new_order_id);
	    }
	    $split_order['suborder_list'][$ok]['order_sn'] = $order['order_sn'];
	    $split_order['suborder_list'][$ok]['order_amount_formated'] = price_format($order['order_amount']);
	    
	
	    /* 如果使用库存，且下订单时减库存，则减少库存 */
	    if ($_CFG['use_storage'] == '1' && $_CFG['stock_dec_time'] == SDT_PLACE)
	    {
	        change_order_goods_storage($order['order_id'], true, SDT_PLACE);
	    }
	
	    /* 给商家发邮件 */
	    /* 增加是否给客服发送邮件选项 */
	    if ($_CFG['send_service_email'] && $_CFG['service_email'] != '')
	    {
	        $tpl = get_mail_template('remind_of_new_order');
	        $smarty->assign('order', $order);
	        $smarty->assign('goods_list', $cart_goods);
	        $smarty->assign('shop_name', $_CFG['shop_name']);
	        $smarty->assign('send_date', date($_CFG['time_format']));
	        $content = $smarty->fetch('str:' . $tpl['template_content']);
	        send_mail($_CFG['shop_name'], $_CFG['service_email'], $tpl['template_subject'], $content, $tpl['is_html']);
	    }
	
    /* 如果需要，发短信 */
    if ($_CFG['sms_order_placed'] == '1' && $_CFG['sms_shop_mobile'] != '')
    {
       // include_once('includes/cls_sms.php');
        //$sms = new sms();
        //$msg = $order['pay_status'] == PS_UNPAYED ?
        //    $_LANG['order_placed_sms'] : $_LANG['order_placed_sms'] . '[' . $_LANG['sms_paid'] . ']';
       // $sms->send($_CFG['sms_shop_mobile'], sprintf($msg, $order['consignee'], $order['tel']),'', 13,1);
    }
	    /* 如果订单金额为0 处理虚拟卡 */
	    if ($order['order_amount'] <= 0)
	    {
	    	/* 代码增加_start  By www.68ecshop.com */
	    	$sql = "SELECT goods_id, goods_name, goods_number AS num FROM ".
	               $GLOBALS['ecs']->table('cart') .
	                " WHERE is_real = 0 AND extension_code = 'virtual_card'".
	                " AND $sql_where AND rec_type = '$flow_type'";
	        /* 代码增加_end  By www.68ecshop.com */
	        $res = $GLOBALS['db']->getAll($sql);
	
	        $virtual_goods = array();
	        foreach ($res AS $row)
	        {
	            $virtual_goods['virtual_card'][] = array('goods_id' => $row['goods_id'], 'goods_name' => $row['goods_name'], 'num' => $row['num']);
	        }
	
	        if ($virtual_goods AND $flow_type != CART_GROUP_BUY_GOODS)
	        {
	            /* 虚拟卡发货 */
	            if (virtual_goods_ship($virtual_goods,$msg, $order['order_sn'], true))
	            {
	                /* 如果没有实体商品，修改发货状态，送积分和红包 */
	                $sql = "SELECT COUNT(*)" .
	                        " FROM " . $ecs->table('order_goods') .
	                        " WHERE order_id = '$order[order_id]' " .
	                        " AND is_real = 1";
	                if ($db->getOne($sql) <= 0)
	                {
	                    /* 修改订单状态 */
	                    update_order($order['order_id'], array('shipping_status' => SS_SHIPPED, 'shipping_time' => gmtime()));
	
	                    /* 如果订单用户不为空，计算积分，并发给用户；发红包 */
	                    if ($order['user_id'] > 0)
	                    {
	                        /* 取得用户信息 */
	                        $user = user_info($order['user_id']);
	
	                        /* 计算并发放积分 */
	                        $integral = integral_to_give($order);
	                        log_account_change($order['user_id'], 0, 0, intval($integral['rank_points']), intval($integral['custom_points']), sprintf($_LANG['order_gift_integral'], $order['order_sn']));
	
	                        /* 发放红包 */
	                        send_order_bonus($order['order_id']);
	                    }
	                }
	            }
	        }
	
	    }
	    
    	$all_order_amount += $order['order_amount'];
    	//user_uc_call('add_feed', array($order['order_id'], BUY_GOODS)); //推送feed到uc
    }
    /* 清空购物车 */
    clear_cart($flow_type);
    /* 清除缓存，否则买了商品，但是前台页面读取缓存，商品数量不减少 */
    clear_all_files();
    
    //删除父订单记录
    if($del_patent_id > 0){
    	$sql="delete from ".$GLOBALS['ecs']->table('order_info')." where order_id='$del_patent_id' ";
		$GLOBALS['db']->query($sql);
    }
	/* 代码增加_start  By  www.68ecshop.com */
	//$split_order = split_order($new_order_id);
	$smarty->assign('split_order',      $split_order);
	/* 如果需要，发短信 */
	if(count($split_order['suborder_list']) > 0){
		foreach($split_order['suborder_list'] as $key => $val){
			$supplier_ids[$key] = $val['order_sn'];
		}
	}
	
	
	//$supplier_ids = array_keys();
//	include_once('send.php');
	
//	send_sms($supplier_ids,'您有一条新订单，订单号为：ordersn请注意查看。【shopname】',1);
	
	/* 取得支付信息，生成支付代码 */
	if ($split_order['sub_order_count'] >1)
	{
		$order['order_sn'] = $parent_order_id; 
		/* 插入支付日志 */
    	$order['log_id'] = insert_pay_log($order['order_sn'], $order['order_amount'], PAY_ORDER);
	}else{
		/* 插入支付日志 */
    	$order['log_id'] = insert_pay_log($order['order_id'], $order['order_amount'], PAY_ORDER);
	}
	$order['order_amount'] = $all_order_amount; //替换为总金额去支付
	
	

	
	
	if ($order['order_amount'] > 0)
    {
		$result['result']['order_sn'] = $order['order_sn'];
		$result['result']['allmoney'] = $order['order_amount'];
		
        $payment = payment_info($order['pay_id']);

        include_once('../includes/modules/payment/' . $payment['pay_code'] . '.php');

        $pay_obj    = new $payment['pay_code'];

        $pay_online = $pay_obj->get_code($order, unserialize_config($payment['pay_config']));

        $order['pay_desc'] = $payment['pay_desc'];
        $result['result']['pay_code'] = $payment['pay_code'];
        $result['result']['pay_online'] = $pay_online;

        //$smarty->assign('pay_online', $pay_online);
    }
	if(!empty($order['shipping_name']))
    {
        $order['shipping_name']=trim(stripcslashes($order['shipping_name']));
    }

    /* 订单信息 */
    $smarty->assign('order',      $order);
	$smarty->assign('total',      $total);
    
    unset($_SESSION['flow_consignee']); // 清除session中保存的收货人信息
    unset($_SESSION['flow_order']);
    unset($_SESSION['direct_shopping']);
    die($json->encode($result));
}

/**
 * 取得某用户等级当前时间可以享受的优惠活动
 * @param   int     $user_rank      用户等级id，0表示非会员  
 * @param   int     $is_have        是否判断已经选择赠品
 * @return  array
 */
function favourable_list($user_rank,$is_have=true)
{
    /* 购物车中已有的优惠活动及数量 */
    $used_list = cart_favourable();

    /* 当前用户可享受的优惠活动 */
    $favourable_list = array();
    $user_rank = ',' . $user_rank . ',';
    $now = gmtime();
	if(isset($_REQUEST['suppid'])){
    	$tj = " AND supplier_id=".$_REQUEST['suppid'];
    }else{
    	$tj = '';
    }
    $sql = "SELECT * " .
            "FROM " . $GLOBALS['ecs']->table('favourable_activity') .
            " WHERE CONCAT(',', user_rank, ',') LIKE '%" . $user_rank . "%'" .
            " AND start_time <= '$now' AND end_time >= '$now'" .$tj.
            " AND act_type = '" . FAT_GOODS . "'" .
            " ORDER BY sort_order";
    $res = $GLOBALS['db']->query($sql);
    while ($favourable = $GLOBALS['db']->fetchRow($res))
    {
        $favourable['start_time'] = local_date($GLOBALS['_CFG']['time_format'], $favourable['start_time']);
        $favourable['end_time']   = local_date($GLOBALS['_CFG']['time_format'], $favourable['end_time']);
        $favourable['formated_min_amount'] = price_format($favourable['min_amount'], false);
        $favourable['formated_max_amount'] = price_format($favourable['max_amount'], false);
        $favourable['gift']       = unserialize($favourable['gift']);
		$_REQUEST['suppid'] = $favourable['supplier_id'] = $favourable['supplier_id'];

        foreach ($favourable['gift'] as $key => $value)
        {
            $favourable['gift'][$key]['formated_price'] = price_format($value['price'], false);
            $sql = "SELECT COUNT(*) FROM " . $GLOBALS['ecs']->table('goods') . " WHERE is_on_sale = 1 AND goods_id = ".$value['id'];
            $is_sale = $GLOBALS['db']->getOne($sql);
            if(!$is_sale)
            {
                unset($favourable['gift'][$key]);
            }
            $goods_thumb = $GLOBALS['db']->getOne("SELECT `goods_thumb` FROM " . $GLOBALS['ecs']->table('goods') . " WHERE `goods_id`='{$value['id']}'");
            $favourable['gift'][$key]['goods_thumb'] = get_image_path($value['id'], $goods_thumb, true);
        }

        $favourable['act_range_desc'] = act_range_desc($favourable);
        $favourable['act_type_desc'] = sprintf($GLOBALS['_LANG']['fat_ext'][$favourable['act_type']], $favourable['act_type_ext']);

        /* 是否能享受 */
        $favourable['available'] = favourable_available($favourable);
        if ($favourable['available'] && $is_have)
        {
            /* 是否尚未享受 */
            $favourable['available'] = !favourable_used($favourable, $used_list);
        }
        $favourable_list[] = $favourable;
    }
    
    

    return $favourable_list;
}

/**
 * 取得购物车中已有的优惠活动及数量
 * @return  array
 */
function cart_favourable()
{
	$sql_where = $_SESSION['user_id']>0 ? "user_id='". $_SESSION['user_id'] ."' " : "session_id = '" . SESS_ID . "' AND user_id=0 ";//添加 www.68ecshop.com
    $list = array();
	/* 代码修改_start  By  www.68ecshop.com  将这块替换掉*/
    $sql = "SELECT is_gift, COUNT(*) AS num " .
            "FROM " . $GLOBALS['ecs']->table('cart') .
            " WHERE $sql_where " .
            " AND rec_type = '" . CART_GENERAL_GOODS . "'" .
            " AND is_gift > 0" .
            " GROUP BY is_gift";
	/* 代码修改_end  By  www.68ecshop.com  */
    $res = $GLOBALS['db']->query($sql);
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $list[$row['is_gift']] = $row['num'];
    }

    return $list;
}

/**
 * 根据购物车判断是否可以享受某优惠活动
 * @param   array   $favourable     优惠活动信息
 * @return  bool
 */
function favourable_available($favourable)
{
    /* 会员等级是否符合 */
    $user_rank = $_SESSION['user_rank'];
    if (strpos(',' . $favourable['user_rank'] . ',', ',' . $user_rank . ',') === false)
    {
        return false;
    }

    /* 优惠范围内的商品总额 */
    $amount = cart_favourable_amount($favourable);

    /* 金额上限为0表示没有上限 */
    return $amount >= $favourable['min_amount'] &&
        ($amount <= $favourable['max_amount'] || $favourable['max_amount'] == 0);
}

/**
 * 购物车中是否已经有某优惠
 * @param   array   $favourable     优惠活动
 * @param   array   $cart_favourable购物车中已有的优惠活动及数量
 */
function favourable_used($favourable, $cart_favourable)
{
    if ($favourable['act_type'] == FAT_GOODS)
    {
        return isset($cart_favourable[$favourable['act_id']]) &&
            $cart_favourable[$favourable['act_id']] >= $favourable['act_type_ext'] &&
            $favourable['act_type_ext'] > 0;
    }
    else
    {
        return isset($cart_favourable[$favourable['act_id']]);
    }
}

/**
 * 取得优惠范围描述
 * @param   array   $favourable     优惠活动
 * @return  string
 */
function act_range_desc($favourable)
{
    if ($favourable['act_range'] == FAR_BRAND)
    {
        $sql = "SELECT brand_name FROM " . $GLOBALS['ecs']->table('brand') .
                " WHERE brand_id " . db_create_in($favourable['act_range_ext']);
        return join(',', $GLOBALS['db']->getCol($sql));
    }
    elseif ($favourable['act_range'] == FAR_CATEGORY)
    {
        $sql = "SELECT cat_name FROM " . $GLOBALS['ecs']->table('category') .
                " WHERE cat_id " . db_create_in($favourable['act_range_ext']);
        return join(',', $GLOBALS['db']->getCol($sql));
    }
    elseif ($favourable['act_range'] == FAR_GOODS)
    {
        $sql = "SELECT goods_name FROM " . $GLOBALS['ecs']->table('goods') .
                " WHERE goods_id " . db_create_in($favourable['act_range_ext']);
        return join(',', $GLOBALS['db']->getCol($sql));
    }
    else
    {
        return '';
    }
}

/**
 * 取得购物车中某优惠活动范围内的总金额
 * @param   array   $favourable     优惠活动
 * @return  float
 */
function cart_favourable_amount($favourable)
{
	$sql_where = $_SESSION['user_id']>0 ? "c.user_id='". $_SESSION['user_id'] ."' " : "c.session_id = '" . SESS_ID . "' AND c.user_id=0 ";//添加 www.68ecshop.com
    /* 查询优惠范围内商品总额的sql */
	/* 代码修改_start  By  www.68ecshop.com  将这块替换掉*/
    $sql = "SELECT SUM(c.goods_price * c.goods_number) " .
            "FROM " . $GLOBALS['ecs']->table('cart') . " AS c, " . $GLOBALS['ecs']->table('goods') . " AS g " .
            "WHERE c.goods_id = g.goods_id " .
            "AND $sql_where " .
            "AND c.rec_type = '" . CART_GENERAL_GOODS . "' " .
            "AND c.is_gift = 0 " .
            "AND c.goods_id > 0 ";
	/* 代码修改_end  By  www.68ecshop.com  */

    /* 根据优惠范围修正sql */
    if ($favourable['act_range'] == FAR_ALL)
    {
        // sql do not change
    }
    elseif ($favourable['act_range'] == FAR_CATEGORY)
    {
        /* 取得优惠范围分类的所有下级分类 */
        $id_list = array();
        $cat_list = explode(',', $favourable['act_range_ext']);
        foreach ($cat_list as $id)
        {
            $id_list = array_merge($id_list, array_keys(cat_list(intval($id), 0, false)));
        }

        $sql .= "AND g.cat_id " . db_create_in($id_list);
    }
    elseif ($favourable['act_range'] == FAR_BRAND)
    {
        $id_list = explode(',', $favourable['act_range_ext']);

        $sql .= "AND g.brand_id " . db_create_in($id_list);
    }
    else
    {
        $id_list = explode(',', $favourable['act_range_ext']);

        $sql .= "AND g.goods_id " . db_create_in($id_list);
    }
    
    $sql .= (isset($_REQUEST['sel_goods']) && !empty($_REQUEST['sel_goods'])) ? " AND c.rec_id in (". $_REQUEST['sel_goods'] .") " : "";
    
    //计算某个店铺的商品总额
	// if(isset($_REQUEST['suppid'])){
		// $sql .= " AND g.supplier_id=".intval($_REQUEST['suppid']);
	// }
	//echo $sql;

    /* 优惠范围内的商品总额 */
    return $GLOBALS['db']->getOne($sql);
}

/**
 * 添加优惠活动（赠品）到购物车
 * @param   int     $act_id     优惠活动id
 * @param   int     $id         赠品id
 * @param   float   $price      赠品价格
 */
function add_gift_to_cart($act_id, $id, $price)
{
    $sql = "INSERT INTO " . $GLOBALS['ecs']->table('cart') . " (" .
                "user_id, session_id, goods_id, goods_sn, goods_name, market_price, goods_price, ".
                "goods_number, is_real, extension_code, parent_id, is_gift, rec_type ) ".
            "SELECT '$_SESSION[user_id]', '" . SESS_ID . "', goods_id, goods_sn, goods_name, market_price, ".
                "'$price', 1, is_real, extension_code, 0, '$act_id', '" . CART_GENERAL_GOODS . "' " .
            "FROM " . $GLOBALS['ecs']->table('goods') .
            " WHERE goods_id = '$id'";
    $GLOBALS['db']->query($sql);
}

/**
 * 删除购物车中的商品
 *
 * @access  public
 * @param   integer $id
 * @return  void
 */
function flow_drop_cart_goods($id)
{
    /* 取得商品id */
    $sql = "SELECT * FROM " .$GLOBALS['ecs']->table('cart'). " WHERE rec_id = '$id'";
    $row = $GLOBALS['db']->getRow($sql);
    if ($row)
    {
		$sql_where = $_SESSION['user_id']>0 ? "user_id='". $_SESSION['user_id'] ."' " : "session_id = '" . SESS_ID . "' AND user_id=0 ";//添加 www.68ecshop.com
        //如果是超值礼包
        if ($row['extension_code'] == 'package_buy')
        {
/* 代码修改_start  By  www.68ecshop.com  将这块替换掉*/
        	
            $sql = "DELETE FROM " . $GLOBALS['ecs']->table('cart') .
                    " WHERE $sql_where " .
                    "AND rec_id = '$id' LIMIT 1";
/* 代码修改_end  By  www.68ecshop.com  */
        }

        //如果是普通商品，同时删除所有赠品及其配件
        elseif ($row['parent_id'] == 0 && $row['is_gift'] == 0)
        {
            /* 检查购物车中该普通商品的不可单独销售的配件并删除 */
            $sql = "SELECT c.rec_id
                    FROM " . $GLOBALS['ecs']->table('cart') . " AS c, " . $GLOBALS['ecs']->table('group_goods') . " AS gg, " . $GLOBALS['ecs']->table('goods'). " AS g
                    WHERE gg.parent_id = '" . $row['goods_id'] . "'
                    AND c.goods_id = gg.goods_id
                    AND c.parent_id = '" . $row['goods_id'] . "'
                    AND c.extension_code <> 'package_buy'
                    AND gg.goods_id = g.goods_id
                    AND g.is_alone_sale = 0";
            $res = $GLOBALS['db']->query($sql);
            $_del_str = $id . ',';
            while ($id_alone_sale_goods = $GLOBALS['db']->fetchRow($res))
            {
                $_del_str .= $id_alone_sale_goods['rec_id'] . ',';
            }
            $_del_str = trim($_del_str, ',');

			/* 代码修改_start  By  www.68ecshop.com  将这块替换掉*/
            $sql = "DELETE FROM " . $GLOBALS['ecs']->table('cart') .
                    " WHERE $sql_where " .
                    "AND (rec_id IN ($_del_str) OR parent_id = '$row[goods_id]' OR is_gift <> 0)";
			/* 代码修改_end  By  www.68ecshop.com  */
        }

        //如果不是普通商品，只删除该商品即可
        else
        {
			/* 代码修改_start  By  www.68ecshop.com  将这块替换掉*/
            $sql = "DELETE FROM " . $GLOBALS['ecs']->table('cart') .
                    " WHERE $sql_where " .
                    "AND rec_id = '$id' LIMIT 1";
			/* 代码修改_end  By  www.68ecshop.com  */
        }

        $GLOBALS['db']->query($sql);
    }

    flow_clear_cart_alone();
}

/**
 * 删除购物车中不能单独销售的商品
 *
 * @access  public
 * @return  void
 */
function flow_clear_cart_alone()
{
    /* 查询：购物车中所有不可以单独销售的配件 */
	$sql_where = $_SESSION['user_id']>0 ? "c.user_id='". $_SESSION['user_id'] ."' " : "c.session_id = '" . SESS_ID . "' AND c.user_id=0 ";//添加 www.68ecshop.com

/* 代码修改_start  By  www.68ecshop.com  将这块替换掉*/
    $sql = "SELECT c.rec_id, gg.parent_id
            FROM " . $GLOBALS['ecs']->table('cart') . " AS c
                LEFT JOIN " . $GLOBALS['ecs']->table('group_goods') . " AS gg ON c.goods_id = gg.goods_id
                LEFT JOIN" . $GLOBALS['ecs']->table('goods') . " AS g ON c.goods_id = g.goods_id
            WHERE $sql_where 
            AND c.extension_code <> 'package_buy'
            AND gg.parent_id > 0
            AND g.is_alone_sale = 0";
/* 代码修改_end  By  www.68ecshop.com  */
    $res = $GLOBALS['db']->query($sql);
    $rec_id = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $rec_id[$row['rec_id']][] = $row['parent_id'];
    }

    if (empty($rec_id))
    {
        return;
    }
$sql_where = $_SESSION['user_id']>0 ? "user_id='". $_SESSION['user_id'] ."' " : "session_id = '" . SESS_ID . "' AND user_id=0 ";//添加 www.68ecshop.com


    /* 查询：购物车中所有商品 */
	/* 代码修改_start  By  www.68ecshop.com  将这块替换掉*/
    $sql = "SELECT DISTINCT goods_id
            FROM " . $GLOBALS['ecs']->table('cart') . "
            WHERE $sql_where 
            AND extension_code <> 'package_buy'";
	/* 代码修改_end  By  www.68ecshop.com  */
    $res = $GLOBALS['db']->query($sql);
    $cart_good = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $cart_good[] = $row['goods_id'];
    }

    if (empty($cart_good))
    {
        return;
    }

    /* 如果购物车中不可以单独销售配件的基本件不存在则删除该配件 */
    $del_rec_id = '';
    foreach ($rec_id as $key => $value)
    {
        foreach ($value as $v)
        {
            if (in_array($v, $cart_good))
            {
                continue 2;
            }
        }

        $del_rec_id = $key . ',';
    }
    $del_rec_id = trim($del_rec_id, ',');

    if ($del_rec_id == '')
    {
        return;
    }

    /* 删除 */
	/* 代码修改_start  By  www.68ecshop.com  将这块替换掉*/
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('cart') ."
            WHERE $sql_where 
            AND rec_id IN ($del_rec_id)";
	/* 代码修改_end  By  www.68ecshop.com  */
    $GLOBALS['db']->query($sql);
}

/**
 * 获得用户的可用积分
 *
 * @access  private
 * @return  integral
 */
function flow_available_points()
{
   /* 代码修改_start  By  www.68ecshop.com  将这块替换掉*/
	$sql_where = $_SESSION['user_id']>0 ? "c.user_id='". $_SESSION['user_id'] ."' " : "c.session_id = '" . SESS_ID . "' AND c.user_id=0 ";
    $sql = "SELECT SUM(g.integral * c.goods_number) as integral ".
            "FROM " . $GLOBALS['ecs']->table('cart') . " AS c, " . $GLOBALS['ecs']->table('goods') . " AS g " .
            "WHERE $sql_where AND c.goods_id = g.goods_id AND c.is_gift = 0 AND g.integral > 0 " .
            "AND c.rec_type = '" . CART_GENERAL_GOODS . "' GROUP BY g.goods_id";
   /* 代码修改_end  By  www.68ecshop.com */
    $info = $GLOBALS['db']->getAll($sql);
    $ret = array();
    foreach($info as $key => $val){
    	$ret['0'] = integral_of_value(intval($val['integral']));
    }
    return $ret;
}

/**
 * 检查订单中商品库存
 *
 * @access  public
 * @param   array   $arr
 *
 * @return  void
 */
function flow_cart_stock($arr)
{
    foreach ($arr AS $key => $val)
    {
        $val = intval(make_semiangle($val));
        if ($val <= 0 || !is_numeric($key))
        {
            continue;
        }
/* 代码修改_start  By  www.68ecshop.com  将这块替换掉*/
        $sql_where = $_SESSION['user_id']>0 ? "user_id='". $_SESSION['user_id'] ."' " : "session_id = '" . SESS_ID . "' AND user_id=0 ";
        $sql = "SELECT `goods_id`, `goods_attr_id`, `extension_code` FROM" .$GLOBALS['ecs']->table('cart').
               " WHERE rec_id='$key' AND $sql_where";
        $goods = $GLOBALS['db']->getRow($sql);
/* 代码修改_end  By  www.68ecshop.com  */

        $sql = "SELECT g.goods_name, g.goods_number, c.product_id ".
                "FROM " .$GLOBALS['ecs']->table('goods'). " AS g, ".
                    $GLOBALS['ecs']->table('cart'). " AS c ".
                "WHERE g.goods_id = c.goods_id AND c.rec_id = '$key'";
        $row = $GLOBALS['db']->getRow($sql);

        //系统启用了库存，检查输入的商品数量是否有效
        if (intval($GLOBALS['_CFG']['use_storage']) > 0 && $goods['extension_code'] != 'package_buy')
        {
            if ($row['goods_number'] < $val)
            {
                show_message(sprintf($GLOBALS['_LANG']['stock_insufficiency'], $row['goods_name'],
                $row['goods_number'], $row['goods_number']));
                exit;
            }

            /* 是货品 */
            $row['product_id'] = trim($row['product_id']);
            if (!empty($row['product_id']))
            {
                $sql = "SELECT product_number FROM " .$GLOBALS['ecs']->table('products'). " WHERE goods_id = '" . $goods['goods_id'] . "' AND product_id = '" . $row['product_id'] . "'";
                $product_number = $GLOBALS['db']->getOne($sql);
                if ($product_number < $val)
                {
                    show_message(sprintf($GLOBALS['_LANG']['stock_insufficiency'], $row['goods_name'],
                    $row['goods_number'], $row['goods_number']));
                    exit;
                }
            }
        }
        elseif (intval($GLOBALS['_CFG']['use_storage']) > 0 && $goods['extension_code'] == 'package_buy')
        {
            if (judge_package_stock($goods['goods_id'], $val))
            {
                show_message($GLOBALS['_LANG']['package_stock_insufficiency']);
                exit;
            }
        }
    }

}

	ob_end_flush();
?>
