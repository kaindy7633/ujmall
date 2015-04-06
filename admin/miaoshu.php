<?php

/**
 * ECSHOP 商品管理程序
 * ============================================================================
 * 版权所有 2005-2010 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: wangleisvn $
 * $Id: goods.php 17114 2010-04-16 07:13:03Z wangleisvn $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');


if (empty($_REQUEST['act']))
{
    $_REQUEST['act'] = 'update';
}
else
{
    $_REQUEST['act'] = trim($_REQUEST['act']);
}

if ($_REQUEST['act'] == 'update')
{
    include_once(ROOT_PATH . 'includes/fckeditor/fckeditor.php'); // 包含 html editor 类文件

    /* 创建 html editor */
    create_html_editor('goods_desc', $goods['goods_desc']);
	
	$goods_desc = $_REQUEST['goods_desc'];
	$id = $_REQUEST['goods_id'];
	if($id != '')
	{
		if($goods_desc != '')
		{
			$goods_id = explode(',',$id);
			for($i = 0 ; $i<count($goods_id) ; $i++)
			{
				$sql = "update ". $GLOBALS['ecs']->table('goods') ." set goods_desc = '$goods_desc' where goods_id = '$goods_id[$i]'";
				$db->query($sql);
				sys_msg('批量修改描述成功！');
			}
		}
	}
	else
	{
		if($goods_desc != '')
		{
			$sql = "update ". $GLOBALS['ecs']->table('goods') ." set goods_desc = '$goods_desc' where 1=1";
			$db->query($sql);
			sys_msg('批量修改描述成功！');
		}	
	}
	$smarty->display('miaoshu.htm');
}
?>