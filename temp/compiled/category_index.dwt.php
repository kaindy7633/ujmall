<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="canonical" href="">

 
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,index.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.6.2.min.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>

<link href="themes/68ecshop_xiaomi/css/global_site_channel.css" rel="stylesheet" type="text/css">
<link href="themes/68ecshop_xiaomi/css/yhdfood_index.css" rel="stylesheet" type="text/css">

</head>
<body id="comParamId" data-param="{&quot;globalPageCode&quot;:&quot;YHD_SEARCH&quot;,&quot;currPageId&quot;:&quot;52&quot;}" class="w1200">
<?php echo $this->fetch('library/page_header.lbi'); ?>

<div id="yhdFood" class="clearfix">
<?php echo $this->fetch('library/category_index.lbi'); ?>
<div class="container clearfix">
<div class="con_right fr">

<div class="saleArea mt30" id="saleArea">
<h3 class="th3" style="border-bottom:2px solid #000">
<span>
<b>促销专区</b>
</span>
</h3>
<div class="proArea">
<div class="modeBox" id="sale_mode_box" style="top: 0px;">
<div class="proMode" id="proMode1">
<ul>
<li class="btn_arrow fl btn_arrow_l"><a class="btn_left" href="javascript:;"></a></li>
<li class="proList">
<div class="dlBox" id="dlBox_0" style="width: 99999px; position: absolute; left:0px;;">
<?php $_from = $this->_var['promotion_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');$this->_foreach['promotion_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['promotion_foreach']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
        $this->_foreach['promotion_foreach']['iteration']++;
?>
<a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo $this->_var['goods']['name']; ?>"  style="float: left;">
<dl>
<dt>
<img src="<?php echo $this->_var['goods']['thumb']; ?>" width="200" height="200">
<span class="title"><?php echo htmlspecialchars($this->_var['goods']['name']); ?></span>
<span class="price"><?php echo $this->_var['goods']['promote_price']; ?></span>
<span class="text" style="width: 0px; overflow: hidden;"><?php echo htmlspecialchars($this->_var['goods']['name']); ?></span>
</dt>
</dl>
</a>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</li>
<li class="btn_arrow fr btn_arrow_r"><a class="btn_right" href="javascript:;"></a></li>
</ul> 
</div>
</div>
</div>
</div>
<script>
$(function(){
	var num01=0;
	var gg_as = $('#proMode1 .proList a').length;
	$('#proMode1 .btn_arrow_r').click(function(){
		 num01++;
		 if(num01>parseInt(gg_as/4)){
			num01=(parseInt(gg_as/4));
			$('.proList #dlBox_0').css('left',-(num01)*880);
			
		 }
		$('.proList #dlBox_0').animate({left:-num01*880},500);	 
	})
	$('#proMode1 .btn_arrow_l').click(function(){
		 num01--;
		 if(num01<0){
			num01=0;
			$('.proList #dlBox_0').css('left',-num01*880);
			
		 }
		$('.proList #dlBox_0').animate({left:-num01*880},500);	 
	})
})
</script>

<?php echo $this->fetch('library/pinpaiqijiandian.lbi'); ?>


<?php
	$GLOBALS['smarty']->assign('cat_name',get_cat_name_ex($GLOBALS['smarty']->_var['category']));
	$GLOBALS['smarty']->assign('child_cat',get_child_cat($GLOBALS['smarty']->_var['category']));
  
    $GLOBALS['smarty']->assign('get_cat_brands', get_cat_brands($GLOBALS['smarty']->_var['category'], 24));
	?>
 <?php $_from = $this->_var['childcat_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['cat']['iteration']++;
?>
<div class="col_b mt35">
<h3 class="th3">
<span>
  
       <?php
			$GLOBALS['smarty']->assign('child_cat',get_subcat_list($GLOBALS['smarty']->_var['cat']['cat_id']));
	    ?>
         
       <b><?php echo $this->_var['cat']['cat_name']; ?></b><s></s>
  
</span>
</h3>
<div class="colmain clearfix">

<div class="colmain_a">

                      <script>
/*鼠标移过，左右按钮显示*/
$("#playBox").hover(function(){
	$(this).find(".prev,.next").fadeTo("show",0.1);
},function(){
	$(this).find(".prev,.next").hide();
})
/*鼠标移过某个按钮 高亮显示*/
$(".prev,.next").hover(function(){
	$(this).fadeTo("show",0.7);
},function(){
	$(this).fadeTo("show",0.1);
})
$("#playBox").slide({titCell:".btn_box" , mainCell:".img_box" , effect:"fold", autoPlay:true, delayTime:700 , autoPage:true});
</script>
<div id="playBox">
<ul class="img_box">
   <?php
$GLOBALS['smarty']->assign('qiehuan',get_advlist('频道页面-小分类ID'.$GLOBALS['smarty']->_var['cat']['cat_id'].'-楼层左边轮播图片', 3));
?> 
   
      <?php $_from = $this->_var['qiehuan']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
        <li><a href="<?php echo $this->_var['ad']['url']; ?>"><img width="205" height="300" src="<?php echo $this->_var['ad']['image']; ?>"></img></a></li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
 	<div class="pre" style="display:none"></div>
    <div class="next" style="display:none"></div>
    <div class="btn_box">
      <ul>
      
      </ul>
    </div>
</div>

<div class="food_item">
<dl class="borb">
<dt>热卖分类</dt>
<dd class="clearfix">

      <?php
			$GLOBALS['smarty']->assign('child_cat',get_subcat_list($GLOBALS['smarty']->_var['cat']['cat_id']));
	    ?>
          <?php $_from = $this->_var['child_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat1');$this->_foreach['name112'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name112']['total'] > 0):
    foreach ($_from AS $this->_var['cat1']):
        $this->_foreach['name112']['iteration']++;
?> 
         <?php if ($this->_foreach['name112']['iteration'] < 7): ?>
        <a target="_blank" href="<?php echo $this->_var['cat1']['url']; ?>"><?php echo htmlspecialchars($this->_var['cat1']['cat_name']); ?></a>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</dd>
</dl>
<dl class="borb">
<dt>促销活动</dt>
<dd class="clearfix">
     <?php
$GLOBALS['smarty']->assign('wenzhang1',get_advlist('频道页面-小分类ID'.$GLOBALS['smarty']->_var['cat']['cat_id'].'-文章', 1));
?> 
     
<?php $_from = $this->_var['wenzhang1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
<a target="_blank" href="<?php echo $this->_var['ad']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['article']['ad_code']); ?>" style=" height:auto; width:180px;"><?php echo $this->_var['ad']['ad_code']; ?></a>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</dd>
</dl>
</div>
</div>


<div class="colmain_c" id="tabRank">
<h3>
<s></s>
</h3>
<div class="saleTop">
<ul class="biaosheng">
	<div class="mc">
   
<?php
$children = get_children($GLOBALS['smarty']->_var['cat']['cat_id']);
$GLOBALS['smarty']->assign( 'bestGoods1',get_category_recommend_goods('hot', $children));
?>
                <?php $_from = $this->_var['bestGoods1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['top_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['top_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['top_goods']['iteration']++;
?>
                   <?php if ($this->_foreach['top_goods']['iteration'] < 6): ?>
<li <?php if (($this->_foreach['top_goods']['iteration'] <= 1)): ?> class="on"<?php endif; ?>>
<div class="big"><s><?php echo $this->_foreach['top_goods']['iteration']; ?></s><dl><dd class="thumb"><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"><img width="115" height="115" title="" src="<?php echo $this->_var['goods']['thumb']; ?>"></a></dd><dd class="title"><a  href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"><?php echo $this->_var['goods']['short_style_name']; ?></a></dd><dd class="price red" realprice="y"><?php echo $this->_var['goods']['shop_price']; ?></dd></dl>
</div>
</li>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>
</div>
<style>
.biaosheng .mc li.on .big{height:185px;}
.biaosheng .mc li.on .thumb{display:block;}
.biaosheng .mc li.on .big .title{padding: 0px 10px;height: 18px;line-height: 18px;overflow: hidden;color: #666;}
.biaosheng .mc li.on .price{display:block;}
.biaosheng .mc li .big{height:60px;}
.biaosheng .mc li .thumb{display:none;}
.biaosheng .mc li .big .title{padding: 0px 10px;height: 60px;line-height: 60px;overflow: hidden;color: #333;}
.biaosheng .mc li .price{display:none;}
</style>
<script>
$(function(){
	$('.biaosheng .mc li').mouseover(function(){
		$(this).addClass('on').siblings().removeClass('on');
	})	
})
</script>

	<script language="javascript">
function setTab(name,cursel,n){

	for(i=1;i<=n;i++){
	
        var menub=document.getElementById(name+i);
        var con=document.getElementById("con_"+name+"_"+i);
        menub.className=i==cursel?"hover":"";
        con.style.display=i==cursel?"block":"none";
    }
}
</script>
	
        <div class="colmain_b clearfix">
            <div id="hotnews_caption">
                <ul class="floor_nav">
                  <?php
			$GLOBALS['smarty']->assign('child_cat',get_subcat_list($GLOBALS['smarty']->_var['cat']['cat_id']));
	    ?>
          <?php $_from = $this->_var['child_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat1');$this->_foreach['name112'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name112']['total'] > 0):
    foreach ($_from AS $this->_var['cat1']):
        $this->_foreach['name112']['iteration']++;
?> 
         <?php if ($this->_foreach['name112']['iteration'] < 5): ?>   
          	<li <?php if (($this->_foreach['name112']['iteration'] <= 1)): ?>class="hover" <?php endif; ?>  id="top<?php echo $this->_foreach['cat']['iteration']; ?><?php echo $this->_foreach['name112']['iteration']; ?>" onMouseOver="setTab('top<?php echo $this->_foreach['cat']['iteration']; ?>',<?php echo $this->_foreach['name112']['iteration']; ?>,4)" ><span><?php echo htmlspecialchars($this->_var['cat1']['cat_name']); ?></span><s></s></li>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>      
                </ul>
              
            </div>
              <div>
                 <?php $_from = $this->_var['child_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat1');$this->_foreach['childer0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['childer0']['total'] > 0):
    foreach ($_from AS $this->_var['cat1']):
        $this->_foreach['childer0']['iteration']++;
?> 
                 <?php if ($this->_foreach['childer0']['iteration'] < 5): ?>
                          <?php
$children = get_children($GLOBALS['smarty']->_var['cat1']['cat_id']);
$GLOBALS['smarty']->assign( 'bestGoods1',get_category_recommend_goods('hot', $children));
?>
    <ul class="floor_list" <?php if (($this->_foreach['childer0']['iteration'] <= 1)): ?>style="display: block;"<?php else: ?>style="display: none;"<?php endif; ?> id="con_top<?php echo $this->_foreach['cat']['iteration']; ?>_<?php echo $this->_foreach['childer0']['iteration']; ?>">
     <?php $_from = $this->_var['bestGoods1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['top_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['top_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['top_goods']['iteration']++;
?>
                 <?php if ($this->_foreach['top_goods']['iteration'] < 7): ?>
             <li id="top2b<?php echo $this->_foreach['top_goods']['iteration']; ?>" ><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"><span class="tltj"></span></a><a href="<?php echo $this->_var['goods']['url']; ?>" class="floor_list_p" target="_blank"><img width="115" height="115"  src="<?php echo $this->_var['goods']['thumb']; ?>"></a><a  class="floor_list_d" href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"><span class="floor_list_title"><?php echo htmlspecialchars($this->_var['goods']['name']); ?></span><span class="floor_list_price"><?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></span></a>
</li> <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> </ul>
     <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
  </div>
        </div>
    </div>

</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

</div>
<div class="con_left fl">
<div style="width:206px; height:30px; display:none;"><?php echo $this->_var['top_cat_name1']; ?></div>

<div class="cateMenu">
<ul>
<li>
  <?php $_from = get_categories_tree(0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['cat0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat0']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['cat0']['iteration']++;
?>
                  <?php if ($this->_var['current_cat_pr_id'] == $this->_var['cat']['id']): ?>
                  <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['namechild'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['namechild']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['namechild']['iteration']++;
?>	
                   <?php if ($this->_foreach['namechild']['iteration'] < 6): ?>	
<div class="cate_tag">
<div class="cate_item" style="display: none; top: 0px;">
<div class="itemBox">
<dl>
<dt><a href="<?php echo $this->_var['child']['url']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a></dt>
<dd>
<?php
                $iteration=$iteration+1;
                $GLOBALS['smarty']->assign('iteration',$iteration);
                ?>
				 <?php $_from = $this->_var['child']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer');$this->_foreach['childer0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['childer0']['total'] > 0):
    foreach ($_from AS $this->_var['childer']):
        $this->_foreach['childer0']['iteration']++;
?>
<a href="<?php echo $this->_var['childer']['url']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['childer']['name']); ?></a>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
</dd>
</dl>
</div>
<?php
	 $cat_info = get_cat_info_ex($GLOBALS['smarty']->_var['cat']['id']);

	$GLOBALS['smarty']->assign('index_image',get_advlist('导航菜单-'.$cat_info['cat_id'].'-右侧菜单', 1));
	  ?>
<div>
   <?php $_from = $this->_var['index_image']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
<a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank">
<img src="<?php echo $this->_var['ad']['image']; ?>" width="600" height="180">
</a>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</div>
<div class="item">
<h3>
<a href="<?php echo $this->_var['child']['url']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a>
</h3>
<div class="cate_child">
<ul>
<?php
                $iteration=$iteration+1;
                $GLOBALS['smarty']->assign('iteration',$iteration);
                ?>
				 <?php $_from = $this->_var['child']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer');$this->_foreach['childer0'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['childer0']['total'] > 0):
    foreach ($_from AS $this->_var['childer']):
        $this->_foreach['childer0']['iteration']++;
?>
				 <?php if ($this->_foreach['childer0']['iteration'] < 7): ?>
                 <li>
			<a title="<?php echo $this->_var['childer']['name']; ?>" href="<?php echo $this->_var['childer']['url']; ?>"><?php echo $this->_var['childer']['name']; ?></a>
            </li>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>
</div>
</div>
 <?php endif; ?> <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> <?php endif; ?> <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
</li>
</ul>
</div>


<div class="tryMode mt35" >
<h3>
<s>猜你喜欢</s>
</h3>
<div class="tryBox" id="feeProdBox">
<ul>
 <?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
<li><dl> <dt><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"><img width="80" height="80" src="<?php echo $this->_var['goods']['thumb']; ?>"></a></dt> <dd class="title"><a  href="<?php echo $this->_var['goods']['url']; ?>"><?php echo $this->_var['goods']['short_style_name']; ?></a></dd> <dd class="price">价格：<span class="red"><?php echo $this->_var['goods']['shop_price']; ?></span></dd> <dd class="price">市价：<span style="text-decoration:line-through"><?php echo $this->_var['goods']['market_price']; ?></span></dd></dl>
</li>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>
</div>
</div>
</div>
</div>

<div id="provinceboxDiv"></div>
<script type="text/javascript">
if(lazyLoadImageObjArry){
lazyLoadImageObjArry.push("friendlinkLazyLoad");
lazyLoadImageObjArry.push("footerbannerLazyLoad");
lazyLoadImageObjArry.push("footerbanner2LazyLoad");
}
</script>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body></html>