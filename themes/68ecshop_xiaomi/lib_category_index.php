<?php 
$GLOBALS['smarty']->assign('top_cat_name1',$GLOBALS['cat']['cat_name']."Ƶ��"); 
$GLOBALS['smarty']->assign('top_cat_name2',$GLOBALS['cat']['cat_name']); 
$GLOBALS['smarty']->assign('cat_id',$GLOBALS['cat_id']); 
$GLOBALS['smarty']->assign('topcat_info',get_topcat_info($GLOBALS['cat_id'])); 
$GLOBALS['smarty']->assign('flash_img_list',get_flash_img($GLOBALS['cat_id'])); 
$GLOBALS['smarty']->assign('subcat_list',get_subcat_list($GLOBALS['cat_id'])); 
$children = get_children($GLOBALS['cat_id']); 
$GLOBALS['smarty']->assign('goods_list_new',get_catindex_recommend_goods('new',$children)); 
$GLOBALS['smarty']->assign('goods_list_best',get_catindex_recommend_goods('best',$children)); 
$GLOBALS['smarty']->assign('goods_list_hot',get_catindex_recommend_goods('hot',$children)); 
$GLOBALS['smarty']->assign('childcat_goods',get_childcat_goods($GLOBALS['cat_id'])); 
$GLOBALS['smarty']->display('category_index.dwt',$GLOBALS['cache_id']); 
exit; 
function http() 
{ 
return (isset($_SERVER['HTTPS']) &&(strtolower($_SERVER['HTTPS']) != 'off')) ?'https://': 'http://'; 
} 
function get_domain() 
{ 
$protocol = http(); 
if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) 
{ 
$host = $_SERVER['HTTP_X_FORWARDED_HOST']; 
} 
elseif (isset($_SERVER['HTTP_HOST'])) 
{ 
$host = $_SERVER['HTTP_HOST']; 
} 
else 
{ 
if (isset($_SERVER['SERVER_PORT'])) 
{ 
$port = ':'.$_SERVER['SERVER_PORT']; 
if ((':80'== $port &&'http://'== $protocol) ||(':443'== $port &&'https://'== $protocol)) 
{ 
$port = ''; 
} 
} 
else 
{ 
$port = ''; 
} 
if (isset($_SERVER['SERVER_NAME'])) 
{ 
$host = $_SERVER['SERVER_NAME'] .$port; 
} 
elseif (isset($_SERVER['SERVER_ADDR'])) 
{ 
$host = $_SERVER['SERVER_ADDR'] .$port; 
} 
} 
return $protocol .$host; 
} 
function get_subcat_list($cat_id) 
{ 
$sql="select cat_id, cat_name from ".$GLOBALS['ecs']->table('category')." where parent_id= '$cat_id' and is_show=1 "; 
$res=$GLOBALS['db']->query($sql); 
$subcat_list=array(); 
while ($row = $GLOBALS['db']->fetchRow($res)) 
{ 
$row['url']  = build_uri('category',array('cid'=>$row['cat_id']),$row['cat_name']); 
$subcat_list[]=$row; 
} 
return $subcat_list; 
} 
function get_flash_img($cat_id) 
{ 
$sql="select * from ".$GLOBALS['ecs']->table("cat_flashimg") ." where cat_id='$cat_id' order by sort_order"; 
$res_fimg=$GLOBALS['db']->query($sql); 
$fimg_list=array(); 
while($row_fimg=$GLOBALS['db']->fetchRow($res_fimg)) 
{ 
$fimg_list[$row_fimg['img_id']]=$row_fimg; 
$fimg_list[$row_fimg['img_id']]['img_url']=  DATA_DIR .'/catflashimg/'.$row_fimg['img_url']; 
$fimg_list[$row_fimg['img_id']]['img_link']= $row_fimg['href_url']; 
$fimg_list[$row_fimg['img_id']]['img_title']=trim($row_fimg['img_title']); 
$fimg_list[$row_fimg['img_id']]['img_desc']=trim($row_fimg['img_desc']); 
} 
return $fimg_list; 
} 
function get_childcat_goods($pcat_id) 
{ 
$sql="select cat_name , cat_nameimg, cat_id  from ".$GLOBALS['ecs']->table('category') ." where parent_id=$pcat_id and is_show =1 and show_in_index=1 order by sort_order  limit 0,15 "; 
$res = $GLOBALS['db']->query($sql); 
$arr = array(); 
while ($row = $GLOBALS['db']->fetchRow($res)) 
{ 
$limit_num=10; 
$arr[$row['cat_id']]['cat_id']=$row['cat_id']; 
$arr[$row['cat_id']]['cat_name']=$row['cat_name']; 
$arr[$row['cat_id']]['cat_nameimg'] = $row['cat_nameimg'] ?DATA_DIR .'/'.$row['cat_nameimg'] : ''; 
$arr[$row['cat_id']]['url']=build_uri('category',array('cid'=>$row['cat_id']),$row['cat_name']); 
$sql="select cat_adimg_1, cat_adurl_1, cat_adimg_2, cat_adurl_2 from ".$GLOBALS['ecs']->table("category") ." where cat_id='".$row['cat_id'] ."' "; 
$cat_ad=$GLOBALS['db']->getRow($sql); 
if($cat_ad['cat_adimg_1'] or $cat_ad['cat_adimg_2']) 
{ 
$arr[$row['cat_id']]['cat_adimg_1'] =  DATA_DIR .'/'.$cat_ad['cat_adimg_1']; 
$arr[$row['cat_id']]['cat_adurl_1']=$cat_ad['cat_adurl_1']; 
$arr[$row['cat_id']]['cat_adimg_2'] =  DATA_DIR .'/'.$cat_ad['cat_adimg_2']; 
$arr[$row['cat_id']]['cat_adurl_2']=$cat_ad['cat_adurl_2']; 
} 
$children = get_children($row['cat_id']); 
$sql="select goods_id,goods_thumb,goods_name,shop_price,market_price from ".$GLOBALS['ecs']->table('goods')." AS g where g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 and g.is_catindex = 1 and ($children OR ".get_extension_goods($children) .") order by goods_id desc limit 0, $limit_num"; 
$res_c=$GLOBALS['db']->query($sql); 
while($row_c= $GLOBALS['db']->fetchRow($res_c)) 
{ 
$arr[$row['cat_id']]['children'][$row_c['goods_id']]['goods_thumb']      = get_image_path($row_c['goods_id'],$row_c['goods_thumb'],true); 
$arr[$row['cat_id']]['children'][$row_c['goods_id']]['goods_name']      = sub_str($row_c['goods_name'],12); 
$arr[$row['cat_id']]['children'][$row_c['goods_id']]['url']      =  build_uri('goods',array('gid'=>$row_c['goods_id']),$row_c['goods_name']); 
$arr[$row['cat_id']]['children'][$row_c['goods_id']]['market_price']      = price_format($row_c['market_price']); 
$arr[$row['cat_id']]['children'][$row_c['goods_id']]['shop_price']      = price_format($row_c['shop_price']); 
$arr[$row['cat_id']]['children'][$row_c['goods_id']]['is_ad']      = 0; 
} 
} 
return $arr; 
} 
function get_catindex_recommend_goods($type = '',$cats = '') 
{ 
$sql =  'SELECT g.goods_id, g.goods_name, g.goods_name_style, g.market_price, g.shop_price AS org_price, g.promote_price, '. 
"IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, ". 
'promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, goods_img '. 
'FROM '.$GLOBALS['ecs']->table('goods') .' AS g '. 
"LEFT JOIN ".$GLOBALS['ecs']->table('member_price') ." AS mp ". 
"ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ". 
'WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 '; 
switch ($type) 
{ 
case 'best': 
$sql .= ' AND is_best = 1'; 
break; 
case 'new': 
$sql .= ' AND is_new = 1'; 
break; 
case 'hot': 
$sql .= ' AND is_hot = 1'; 
break; 
} 
if (!empty($cats)) 
{ 
$sql .= " AND (".$cats ." OR ".get_extension_goods($cats) .")"; 
} 
$sql .=  ' ORDER BY g.sort_order, g.last_update DESC '; 
$res = $GLOBALS['db']->selectLimit($sql,5); 
$idx = 0; 
$goods = array(); 
while ($row = $GLOBALS['db']->fetchRow($res)) 
{ 
if ($row['promote_price'] >0) 
{ 
$promote_price = bargain_price($row['promote_price'],$row['promote_start_date'],$row['promote_end_date']); 
$goods[$idx]['promote_price'] = $promote_price >0 ?price_format($promote_price) : ''; 
} 
else 
{ 
$goods[$idx]['promote_price'] = ''; 
} 
$goods[$idx]['id']           = $row['goods_id']; 
$goods[$idx]['goods_name']         = $row['goods_name']; 
$goods[$idx]['brief']        = $row['goods_brief']; 
$goods[$idx]['brand_name']   = $row['brand_name']; 
$goods[$idx]['short_name']   = $GLOBALS['_CFG']['goods_name_length'] >0 ? 
sub_str($row['goods_name'],$GLOBALS['_CFG']['goods_name_length']) : $row['goods_name']; 
$goods[$idx]['market_price'] = price_format($row['market_price']); 
$goods[$idx]['shop_price']   = price_format($row['shop_price']); 
$goods[$idx]['goods_thumb']        = get_image_path($row['goods_id'],$row['goods_thumb'],true); 
$goods[$idx]['goods_img']    = get_image_path($row['goods_id'],$row['goods_img']); 
$goods[$idx]['url']          = build_uri('goods',array('gid'=>$row['goods_id']),$row['goods_name']); 
$goods[$idx]['short_style_name'] = add_style($goods[$idx]['short_name'],$row['goods_name_style']); 
$idx++; 
} 
return $goods; 
} 
function get_topcat_info($cat_id) 
{ 
$topcat_info = $GLOBALS['db']->getRow('SELECT cat_name, cat_index_rightad FROM '.$GLOBALS['ecs']->table('category') . 
" WHERE cat_id = '$cat_id'"); 
$topcat_info['cat_index_rightad']= $topcat_info['cat_index_rightad'] ?DATA_DIR.'/'.$topcat_info['cat_index_rightad'] : ''; 
return $topcat_info; 
} 

?>