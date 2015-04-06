<?php

define('IN_ECS', true);

require('../includes/init.php');
include('../includes/cls_json.php');
$json   = new JSON;
/* 载入语言文件 */
require_once('../languages/zh_cn/user.php');

$user_id = $_SESSION['user_id'];

if ($_POST['act'] == 'signin')
{

    $username = !empty($_POST['user']) ? trim($_POST['user']) : '';
    $password = !empty($_POST['pwd']) ? trim($_POST['pwd']) : '';
    $result   = array('code' => 0, 'info' => '');

    if ($user->login($username, $password))
    {
        update_user_info();  //更新用户信息
        recalculate_price(); // 重新计算购物车中的商品价格
        //$smarty->assign('user_info', get_user_info());
        $result['code'] = 1;
       
		$user = get_user_info();
		/*查找代付款的数据   jx*/
		$user_id = $user['user_id'];
		$sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('order_info')."WHERE user_id = '$user_id' AND pay_status = 0";
		$user['payment'] = $GLOBALS['db']->getOne($sql);
		/*查找代发货的数据   jx*/
		$sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('order_info')."WHERE user_id = '$user_id' AND shipping_status = 0";
		$user['deliver'] = $GLOBALS['db']->getOne($sql);
		/*查找代收货的数据   jx*/
		$sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('order_info')."WHERE user_id = '$user_id' AND shipping_status = 1";
		$user['receipt'] = $GLOBALS['db']->getOne($sql);
		/*查找全部订单数据   jx*/
		$sql = "SELECT COUNT(*) FROM ".$GLOBALS['ecs']->table('order_info')."WHERE user_id = '$user_id'";
		$user['quan'] = $GLOBALS['db']->getOne($sql);
		/*查询购物车的商品数量  jx*/
		$sql = "SELECT SUM(goods_number) from ".$GLOBALS['ecs']->table('cart')." where user_id = $user_id";
		$user['number'] = $GLOBALS['db']->getOne($sql);
		$result['info']=$user;
       // $ucdata = empty($user->ucdata)? "" : $user->ucdata;
        //$result['ucdata'] = $ucdata;
    }
    else
    {
        $result['info'] = $_LANG['login_failure'];
    }
    die($json->encode($result));
}
elseif($_POST['act'] == 'getinfo'){
	$result   = array('code' => 0, 'info' => '');
	$userid = intval($_POST['user_id']);
	if($userid > 0){
		$result['code'] = 1;
        $result['info']=get_user_info($userid);
	}else{
		$result['info']='用户信息获取失败，请重新登陆!';
	}
	die($json->encode($result));
}
?>