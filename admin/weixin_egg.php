<?php
define ( 'IN_ECS', true );
require (dirname ( __FILE__ ) . '/includes/init.php');
$act = trim ( $_REQUEST ['act'] );
switch ($act){
	case "list"://list
		$aid = intval($_GET['aid']);
		if($_POST){
			$title = getstr($_POST ['title']);
			$content = getstr($_POST ['content']);
			$isopen = intval($_POST ['isopen']);
			$type = intval($_POST ['type']);
			$num = intval($_POST ['num']);
			$overymd = getstr($_POST ['overymd']);
			$tpl = intval($_POST ['tpl']) ? intval($_POST ['tpl']) : 1;
			if($aid > 0){
				$ret = $db->query ( 
					"UPDATE `weixin_act` SET 
					`title`='$title',
					`content`='$content',
					`isopen`='$isopen',
					`type`='$type',
					`tpl`='$tpl',
					`overymd`='$overymd',
					`num`='$num'
					 WHERE `aid`=$aid;" );
			}else{
				$ret = $db->query ( 
					"insert into `weixin_act` (title,content,isopen,type,tpl,overymd,num) 
					value ('$title','$content','$isopen','$type','$tpl','$overymd','$num');"
				);
			}
			$link [] = array ('href' => 'weixin_egg.php?act=list','text' => '活动管理');
			sys_msg ( '处理成功', 0, $link );
		}elseif($aid > 0){
			$act = $db->getRow ( "SELECT * FROM `weixin_act` where aid=$aid" );
			$smarty->assign('action_link',  array('text' => "奖项管理", 'href'=>'weixin_egg.php?act=listall&aid='.$aid));
			$smarty->assign ( 'act', $act );
			$smarty->display ( 'weixin/act_show.html' );
			return;
		}
		$act = $db->getAll ( "SELECT * FROM `weixin_act`" );
		$smarty->assign ( 'actList', $act );
		$smarty->display ( 'weixin/act_list.html' );
		break;
	case "listall":
		$aid = intval($_GET['aid']);
		$actList = $db->getAll ( "SELECT * FROM `weixin_actlist` where aid=$aid" );
		$smarty->assign ( 'actList', $actList );
		$smarty->display ( 'weixin/act_listall.html' );
		break;
	case "add"://add and edit
		$lid = intval($_GET['lid']);
		$aid = intval($_GET['aid']) ? intval($_GET['aid']) : 1;
		$title = getstr($_POST ['title']);
		$awardname = getstr($_POST ['awardname']);
		$randnum = round($_POST ['randnum'],2);
		$isopen = intval($_POST ['isopen']);
		$num = intval($_POST ['num']);
		if($lid > 0){
			$actList = $db->getRow ( "SELECT * FROM `weixin_actlist` where lid=$lid" );
			$smarty->assign ( 'actList', $actList );
			$sql = "update weixin_actlist set title='$title',randnum=$randnum,num=$num,isopen=$isopen,awardname='$awardname' where lid=$lid";
		}else{
			$sql = "insert into weixin_actlist (title,randnum,isopen,num,aid,awardname) 
			value ('$title','$randnum','$isopen','$num',$aid,'$awardname')";
		}
		if($_POST){
			$ret = $db->query($sql);
			$link [] = array ('href' => 'weixin_egg.php?act=list&aid='.$aid,'text' => '活动管理');
			sys_msg ( '处理成功', 0, $link );
		}else{
			$smarty->display ( 'weixin/act_add.html' );
		}
		break;
	case "log":
		$lid = intval($_GET['lid']);
		if($lid > 0){
			$ret = $db->query("update weixin_actlog set issend=1 where lid=$lid");
			$link [] = array ('href' => 'weixin_egg.php?act=log','text' => '获奖管理');
			sys_msg ( '处理成功', 0, $link );
		}
		$sql = "SELECT weixin_actlog.*,weixin_user.nickname FROM `weixin_actlog` 
		left join weixin_user on weixin_actlog.uid=weixin_user.ecuid 
		where code!='' order by lid desc";
		$log = $db->getAll ( $sql );
		
		$qcode_list = qcode_list();
		$smarty->assign('log',   $qcode_list['qcode_list']);
	    $smarty->assign('filter',       $qcode_list['filter']);
	    $smarty->assign('record_count', $qcode_list['record_count']);
	    $smarty->assign('page_count',   $qcode_list['page_count']);
		if($_GET['is_ajax'] == 1){
			make_json_result($smarty->fetch('weixin/act_log.html'), '', array('filter' => $qcode_list['filter'], 'page_count' => $qcode_list['page_count']));
		}else{
		    $smarty->assign('full_page',    1);
			$smarty->display ( 'weixin/act_log.html' );
		}
		break;
}

function getstr($str){
	return htmlspecialchars($str,ENT_QUOTES);
}

function qcode_list(){
	$result = get_filter();
	$filter['keywords'] = empty($_REQUEST['keywords']) ? '' : trim($_REQUEST['keywords']);
	if($filter['keywords']){
		$where = " and weixin_actlog.code like '%{$filter['keywords']}%'";
	}
	$sql = " `weixin_actlog` 
		left join weixin_user on weixin_actlog.uid=weixin_user.ecuid left join weixin_act on weixin_actlog.aid=weixin_act.aid
		where code!='' {$where} order by lid desc";
	
	$filter['record_count'] = $GLOBALS['db']->getOne("SELECT COUNT(*) FROM ".$sql);
	$filter = page_and_size($filter);
	$filter['start'] = intval($filter['start']);
	$filter['page_size'] = intval($filter['page_size']);
	$user_list = $GLOBALS['db']->getAll("SELECT weixin_actlog.*,weixin_user.nickname,weixin_act.title,weixin_act.overymd FROM".$sql." limit {$filter['start']},{$filter['page_size']}");
	$arr = array('qcode_list' => $user_list, 'filter' => $filter,
			'page_count' => $filter['page_count'], 'record_count' => $filter['record_count']);
	return $arr;
}