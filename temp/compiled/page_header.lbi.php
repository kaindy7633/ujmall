<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
</script>
<script language="javascript"> 
<!--
/*屏蔽所有的js错误*/
function killerrors() { 
return true; 
} 
window.onerror = killerrors; 
//-->
</script>
<?php
function get_subcate_byurl($url)
{
	$rs = strpos($url,"category");
	if($rs!==false)
	{
		preg_match("/\d+/i",$url,$matches);
		$cid = $matches[0];
		$cat_arr = array();
		$sql = "select * from ".$GLOBALS['ecs']->table('category')." where parent_id=".$cid." and is_show=1 ORDER BY sort_order ASC, cat_id ASC";
		$res = $GLOBALS['db']->getAll($sql);
		
		foreach($res as $idx => $row)
		{
			$cat_arr[$idx]['id']   = $row['cat_id'];
            $cat_arr[$idx]['name'] = $row['cat_name'];
            $cat_arr[$idx]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);
			$cat_arr[$idx]['children'] = get_clild_list($row['cat_id']);
		}

		return $cat_arr;
	}
	else 
	{
		return false;
	}
}

function get_clild_list($pid)
{
    $sql_sub = "select * from ".$GLOBALS['ecs']->table('category')." where parent_id=".$pid." and is_show=1 ORDER BY sort_order ASC, cat_id ASC";
	$subres = $GLOBALS['db']->getAll($sql_sub);
	if($subres)
	{
		foreach ($subres as $sidx => $subrow)
		{
			$children[$sidx]['id']=$subrow['cat_id'];
			$children[$sidx]['name']=$subrow['cat_name'];
			$children[$sidx]['url']=build_uri('category', array('cid' => $subrow['cat_id']), $subrow['cat_name']);
		}
	}
	else 
	{
		$children = null;
	}
			
	return $children;
}
?>
<style type="text/css">
.sub_nav{border:1px solid red;position: absolute;z-index: -1;top: 0px;right: 0px;width:79px;padding-top: 21px;border: 1px solid #CCC; background:#fff; padding-left:9px; display:none;
}
a{color:#333; font-family:宋体; font-size:12px;}
</style>
<link rel="stylesheet" type="text/css" href="themes/68ecshop_xiaomi/css/base.min.css" />
<link href="themes/68ecshop_xiaomi/css/global_site_index_new.css" rel="stylesheet" type="text/css"/>
<script>
			$(document).ready(function() {  
					$(".hd_show_sort").css('display','none');
					$('.hd_all_sort_link').mouseover(function(){
						$(".hd_allsort_out").css('display','block');
						$("#subNav_8").css('display','block');
					});
					$('#subNav_8').mouseover(function(){
						$(".hd_allsort_out").css('display','block');
						$("#subNav_8").css('display','block');
						//$(this).attr("class","active");
						
					});
					
					$('#allSortOuterbox').mouseout(function(){
						$(".hd_allsort_out").css('display','none');
						$("#subNav_8").hide();
						//$(this).attr("class","active");
					});
					
					$('#j_allsort li').mouseover(function(){
						$(".hd_show_sort").css('display','none');
						$(this).find('.hd_show_sort').css('display','block');
					});
				
			});
</script>
<script>
$(function(){
	$('.hd_unlogin_wrap').mouseover(function(){
		$('.hd_user_center').show();	
	}).mouseout(function(){
		$('.hd_user_center').hide();	
	})
})
</script>

<script type="text/javascript">
var isWidescreen=screen.width>=1280;
if(isWidescreen){document.getElementsByTagName("body")[0].className="w1200";}
</script>
<div class="hd_global_top_bar" id="global_top_bar">
<div class="wrap clearfix">
<div class="hd_topbar_left clearfix">
<div class="hd_unlogin_wrap" data-addclass="hd_unlogin_hover" id="global_unlogin" data-tpa="YHD_GLOBAl_TOP_UNLOGIN">
<div class="hd_login clearfix" id="ECS_MEMBERZONE">
				  <?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
				</div>
<em class="hd_login_arrow"></em>
</div>
</div>
<div class="hd_top_manu clearfix" data-tpa="YHD_GLOBAl_TOP_MENU">
<ul class="clearfix">
			<li class="hd_menu_tit hd_my_order" onmouseover="showSubNav('subNav_1');" onmouseout="hideSubNav('subNav_1');">
<a class="hd_menu" href="index.php"><s></s>我的U+</a>
					<ul  id="subNav_1" class="sub_nav">
                        <li><a href="user.php?act=order_list">我的订单</a></li>
                        <li><a href="">我的积分</a></li>
                        <li><a href="">我的抵用券</a></li>
                        <li><a href="user.php?act=collection_list">我的收藏夹</a></li>
                        <li><a href="" >评价商品</a></li>
                        <li><a href="">会员专享</a></li>
                	</ul>

			</li>
			
            <li class="hd_menu_tit" onmouseover="showSubNav('subNav_2');" onmouseout="hideSubNav('subNav_2');">
                <a href="javascript:void(0);" class="hd_menu">
                <span style="vertical-align:middle;">&nbsp;&nbsp;&nbsp;&nbsp;收藏夹</span></a>
                	<ul id="subNav_2" class="sub_nav">
	<li><a href="user.php?act=collection_list" rel="nofollow">商品收藏</a></li>
                    </ul>
        	</li>
            <li class="hd_menu_tit" onmouseover="showSubNav('subNav_3');" onmouseout="hideSubNav('subNav_3');">
            	<a href="#" class="hd_menu"><i class="hd_mobile_icon"></i>手机U+</a>
            	<div class="hd_mobile_show" id="subNav_3" >
                   <p class="hd_mobile_tips">扫描二维码下载客户端</p>
                    <div class="hd_mobile_list clearfix">
                    	<i></i>
	                    <div class="hd_mobile_tab">
			            	<a href=""  class="hd_iphone">iPhone</a>
							<a href="" class="hd_ipad">iPad</a>
							<a href="" class="hd_android">Android</a>
	                    </div>
	                    <div class="hd_mobile_content">
	                       <img src="themes/68ecshop_xiaomi/images/wenxin.jpg">
	                    </div>
                    </div>
	            </div>
            </li>
            
	        <li class="hd_menu_tit" onmouseover="showSubNav('subNav_4');" onmouseout="hideSubNav('subNav_4');">
            	<a href="" class="hd_menu"><s class="khfw"></s>客户服务</a>
                	<ul id="subNav_4" class="sub_nav">
                       <li><a href="user.php?act=track_packages">包裹跟踪</a></li>
                        <li><a href="" >常见问题</a></li>
                        <li><a href="help.php?id=21" >在线退换货</a></li>
                        <li><a href="help.php?id=38">在线投诉</a></li>
                        <li><a href="">配送范围</a></li>
                    </ul>
            </li>
            
            <li class="hd_menu_tit" onmouseover="showSubNav('subNav_5');" onmouseout="hideSubNav('subNav_5');">
            	<a href="#" class="hd_menu">网站导航</a>
                <div class="hd_site_nav" id="subNav_5" >
                	<em></em>
	                	<ul class="clearfix">
                        <li><a href="user.php?act=profile">用户信息</a></li>
                        <li><a href="user.php?act=order_list">我的订单 </a></li>
                        <li><a href="user.php?act=address_list">收货地址</a></li>
                        <li><a href="user.php?act=collection_list" >我的收藏</a></li>
                        <li><a href="user.php?act=message_list">我的留言</a></li>
                        <li><a href="user.php?act=bonus">我的红包</a></li>
                        <li><a href="user.php?act=comment_list">我的评论</a></li>
                        <li><a href="user.php?act=account_log">资金管理</a></li>
                        </ul>
                        <ul class="clearfix">
                        <li><a  href="article_cat.php?id=5" >新手上路</a></li>
                        <li><a  href="article_cat.php?id=6">手机常识</a></li>
                        <li><a  href="article_cat.php?id=8">服务保证</a></li>
                        <li><a  href="article_cat.php?id=9" >联系我们</a></li>
                        </ul>
                </div>
            </li>
            
			</ul>
<span class="hd_follow_us" >关注我们：</span>
    <a class="hd_weixin hd_menu_tit" onmouseover="showSubNav('subNav_6');" onmouseout="hideSubNav('subNav_6');" style="margin-left:5px">
        <div class="hd_weixin_show" id="subNav_6" class="sub_nav">
            <i></i>
            <p>扫码关注<br>粮贸超市官方微信</p>
            <img src="themes/68ecshop_xiaomi/images/lm_weixin.jpg">
        </div>
    </a>
    
    <a class="hd_weibo hd_menu_tit" onmouseover="showSubNav('subNav_7');" onmouseout="hideSubNav('subNav_7');" style="margin-left:10px">
        <div class="hd_weixin_show" id="subNav_7" class="sub_nav">
            <i></i>
            <p>扫码关注<br>粮贸超市官方微博</p>
            <img src="themes/68ecshop_xiaomi/images/lm_weibo.jpg">
        </div>
    </a>
		</div>
	</div>
</div>
<div class="wrap clearfix" id="site_header">
	<div id="logo_areaID" class="hd_logo_area fl clearfix" >
         <a href="index.php" class="fl" data-ref="index_1">
			<img src="themes/68ecshop_xiaomi/images/logo.png">
		</a>
        <div class="logo_area_right fl">
        </div>
    </div>
<div class="hd_head_search">

 <form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()">
	<div class="hd_search_form clearfix">
	<div class="hd_search_wrap clearfix" data-tpa="YHD_GLOBAl_HEADER_SEARCH">
  		<input name="keywords" type="text" id="keyword" value="<?php echo htmlspecialchars($this->_var['search_keywords']); ?>"class="hd_input_test"  autocomplete="off" />
		<input  type="submit" class="hd_search_btn" style="width:98px; text-align:center;" value="搜索&nbsp;&nbsp;&nbsp;&nbsp;" >
	</div>
	</div>
<p class="hd_hot_search">
  <?php $_from = $this->_var['searchkeywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'val');if (count($_from)):
    foreach ($_from AS $this->_var['val']):
?>
<a href='search.php?keywords=<?php echo urlencode($this->_var['val']); ?>'><?php echo $this->_var['val']; ?></a>
   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
</p>
  </form>
</div>
    <div class="hd_prism_wrap" id="hdPrismWrap">
    	<div class="hd_prism hd_welfare" id="hdPrismCoupon">
    		<u style="display:none;" id="hdPrismCouponNum"></u>
    		<a href="user.php?act=account_log" class="hd_prism_tab">
                <em></em>
                <p>资金</p>
            </a>
            <div class="hd_prism_show global_loading" id="hdPrismCouponList">
            </div>
    	</div>
    	
    	<div class="hd_prism hd_order" id="hdPrismOrder">
            <u style="display:none;" id="hdPrismOrderNum"></u>
            <a href="user.php?act=order_list" class="hd_prism_tab">
                <em></em>
                <p>订单查询</p>
            </a>
            <div class="hd_prism_show global_loading" id="hdPrismOrderList">
            </div>
		</div>
		
    </div>
</div>
<div id="headerNav" class="hd_header_nav ">
<div class="hd_fixed_bg"></div>
<div class="wrap clearfix">
<div id="allSortOuterbox" class="not_index">
<div class="hd_all_sort_link fl" ><a href="" class="fl">所有商品分类</a></div>
<div class="hd_allsort_out_box_new"  id="subNav_8" style="display:none;">
<div class="hd_allsort_out">
<ul class="hd_allsort " id="j_allsort">
   <?php $_from = get_categories_tree(0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['cat0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat0']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['cat0']['iteration']++;
?>
<li class="" data-color="hd_sort_color" data-background="" data-tpa="YHD_GLOBAl_HEADER_CATEGORY_12" data-mrt="1">
<h3><i  class="hd_iconfont itemHd<?php echo $this->_foreach['cat0']['iteration']; ?>"></i>
<a href="<?php echo $this->_var['cat']['url']; ?>"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a>
</h3>

<div  class="hd_show_sort">

<div class="hd_sort_list_wrap clearfix">

<div class="hd_sort_list">
     <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['cat_cat_id'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_cat_id']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['cat_cat_id']['iteration']++;
?>
    <dl class="clearfix" data-tpc="<?php echo $this->_foreach['cat_cat_id']['iteration']; ?>" <?php if ($this->_foreach['cat_cat_id']['iteration'] % 2 == 1): ?> style="display:none"<?php endif; ?>>
    <dt class="clearfix">
    <a href="<?php echo $this->_var['child']['url']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a>
    </dt>
     <?php $_from = $this->_var['child']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer');if (count($_from)):
    foreach ($_from AS $this->_var['childer']):
?>
    <dd>
    <a href="<?php echo $this->_var['childer']['url']; ?>"><?php echo htmlspecialchars($this->_var['childer']['name']); ?></a>
    </dd>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </dl>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>

<div class="hd_sort_list" >
     <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['cat_cat_id'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_cat_id']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['cat_cat_id']['iteration']++;
?>
<dl class="clearfix" data-tpc="<?php echo $this->_foreach['cat_cat_id']['iteration']; ?>" <?php if ($this->_foreach['cat_cat_id']['iteration'] % 2 == 0): ?> style="display:none"<?php endif; ?> >
<dt class="clearfix">
<a href="<?php echo $this->_var['child']['url']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a>
</dt>
 <?php $_from = $this->_var['child']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer');if (count($_from)):
    foreach ($_from AS $this->_var['childer']):
?>
<dd>
<a href="<?php echo $this->_var['childer']['url']; ?>"><?php echo htmlspecialchars($this->_var['childer']['name']); ?></a>
</dd>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</dl>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>

<div class="hd_sort_spot clearfix">
<ul>
<ul>
<?php
	 $cat_info = get_cat_info_ex($GLOBALS['smarty']->_var['cat']['id']);

	$GLOBALS['smarty']->assign('index_image',get_advlist('导航菜单-'.$cat_info['cat_id'].'-左侧广告', 1));
	  ?>
      
       <?php $_from = $this->_var['index_image']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
                    <li class="spot_big global_loading"><a href="<?php echo $this->_var['ad']['url']; ?>"><img src="<?php echo $this->_var['ad']['image']; ?>"></a></li>

        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        
<?php


	$GLOBALS['smarty']->assign('index_image2',get_advlist('导航菜单-'.$cat_info['cat_id'].'-右侧广告', 2));
	  ?>
      
       <?php $_from = $this->_var['index_image2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
     
                    <li class="spot_item global_loading"><a href="<?php echo $this->_var['ad']['url']; ?>"><img src="<?php echo $this->_var['ad']['image']; ?>"></a></li>

        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

</ul>
</div>
</div>
 </div>
</li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div> </div>
</div>

<div class="headerNavWrap" id="global_menu">
<ul id="wideScreenTabShowID" class="headerNavMain clearfix">
<li  <?php if ($this->_var['navigator_list']['config']['index'] == 1): ?> class="cur"<?php endif; ?>  style="z-index:799"><a href="index.php">首页</a></li>
  <?php $_from = $this->_var['navigator_list']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
<li style="z-index:798" <?php if ($this->_var['nav']['active'] == 1): ?> class="cur"<?php endif; ?> <?php if ($this->_var['nav']['opennew'] == 1): ?>target="_blank" <?php endif; ?>><a href="<?php echo $this->_var['nav']['url']; ?>"  target="_blank" ><?php echo $this->_var['nav']['name']; ?></a></li>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>
     <div class="hd_mini_cart" id="ECS_CARTINFO"><?php 
$k = array (
  'name' => 'cart_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></DIV>
<div class="hd_mobile_wrap">
<a id="global_right_pic" href="">
<i><img src="themes/68ecshop_xiaomi/images/shouji.jpg"></i> 手机下单惊喜多！
</a>
</div>
</div>
</div>
<div class="wrap hd_detail_banner" id="global_head_adv_div" style="display:none">
<a id="global_head_adv_href" href="#">
<img id="global_head_img">
</a>
</div>
</div>
        
        <script>
var x=window.x||{};
x.personalInfo=function(info){
    var oinfo=document.getElementById(info);
  
     oinfo.t=null;
     oinfo.v=null;
   oinfo.onmouseover=function(){
       clearTimeout(oinfo.v);  //清除掉鼠标移开时候的延时。
       oinfo.t=setTimeout(function(){//设置延时触发，也就是300毫秒后，如果鼠标还在层上面，则触发事件。
            if(oinfo.offsetTop>150)    {
			
              oinfo.className="hd_mini_cart";}
        else{
    
            oinfo.className="hd_mini_cart";
            }
        },300);
        };
    oinfo.onmouseout=function(){
        clearTimeout(oinfo.t);//清除mouseover延时，也就是说，只要鼠标一离开这个层，立马清空这个延时。
        oinfo.v=setTimeout(function(){
        oinfo.style.zIndex=2;
     
          oinfo.className="hd_mini_cart";},300);
        }
    }
	x.personalInfo('ECS_CARTINFO');
</script>
<script language="javascript" type="text/javascript">
function showSubNav(id){
document.getElementById(id).style.display='block';
}
function hideSubNav(id){
document.getElementById(id).style.display='none';
}
</script>