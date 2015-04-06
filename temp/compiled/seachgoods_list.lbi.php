<style type="text/css">
    .filter {
	border: 1px solid #F5C77B;
	color: #565656;
	border-top: 2px solid #F5C77B;
	padding: 0 10px;
	margin-bottom:15px;
		background: #F8F9F1;
}
.filter .title1 {
	height: 32px;
	padding: 15px 15px 0px 0px;
}
.filter .title1 .seacher_recom {
	width: 590px;
	padding-bottom: 6px
}
 .filter .title1 .seacher_recom span, .cat_r .filter .title .seacher_recom strong {
	line-height: 18px
}
 .filter .title1 .icon {
	width: 6px;
	overflow: hidden;
	display: inline-block;
	margin-right: 3px
}
 .filter .title1 .icon span {
	display: inline-block;
	margin-left: -6px;
	background:
}
.reset_icon {
	position: absolute;
	top: 0;
	right: 0;
	display: inline-block;
*zoom:1;
*display:inline;
	overflow: hidden;
	width: 96px;
	height: 21px;
	margin: 6px 6px 0 0;
	text-indent: -9999em
}
.filter .title1 .Right a:hover {
	background-position: -53px -173px
}
 .filter .title1 .Right .red {
	font-size: 14px;
	font-weight: bolder;
	color: #d50102
}
 .filter .list {
	background: #F8F9F1;
	padding: 12px 15px 7px;
}
 .filter .filter_table {
	width: 100%;
}
 .filter .filter_table td {
	padding-top: 10px;
	padding-bottom: 10px
}
 .filter .lable {
	width: 100px;
	vertical-align: middle;
	text-align: right;
	color: #333;
	font-weight: bold
}
 .filter .scat, .cat_r .filter .value {
	padding-left: 20px;
	padding-right: 10px
}
 .filter .selected .scat span {
	display: inline-block;
	height: 13px;
	line-height: 13px;
	padding: 3px;
	padding-left: 5px;
	border: 1px solid #CFCFCF;
}
 .filter .selected .scat span a {
	display: inline-block;
	width: 13px;
	height: 13px;
	color: #fff;
	line-height: 13px;
	background:url(themes/68ecshop_xiaomi/images/close.jpg) no-repeat;
	text-align: center;
	margin-left: 4px;
	vertical-align: top
}
 .filter .selected .scat span a:hover {
	color: #fff!important;
	text-decoration: none
}
 .filter .selected .scat .clear {
	display: inline-block;
	padding: 3px 5px;
	border: 1px solid #e7e7e7;
	height: 13px;
	line-height: 13px;
	color: #787878
}
.filter .value a {
	display: inline-block;
	line-height: 16px;
	margin-bottom: 1px;
	padding: 1px 2px
}
 .filter .value a span {
	color: #999
}
 .filter .value a:hover, .cat_r .filter .value a.current {
	background:#EABC57;
	color: #fff!important;
	text-decoration: none
}
 .filter .value a:hover span, .cat_r .filter .value a.current span {
	color: #fff
}
 .filter .brand .value .more {
	display: inline-block;
	width: 52px;
	height: 20px;
	padding: 0;
	background: url(themes/68ecshop_xiaomi/images/category/bg0311.png) -97px -15px no-repeat;
	vertical-align: top;
	margin-top: -20px
}
.filter .brand .value .more.current {
	background-position: -97px -35px
}
 .filter .brand .value .slide {
	background-position: -97px -15px
}
 .filter .brand .brand_list {
	padding-right: 80px
}
 .box {
	display: inline-block;
	height: 20px;
	padding: 0 10px;
	line-height:20px
}
 .arrow {
background: url(themes/68ecshop_xiaomi/images/arrow.gif) no-repeat scroll 50px -15px transparent;
padding-right: 20px;
}
.arrow.current {
		color: #c10000;
	background-position: 50px 16px
}
.arrow.ASC, .cat_r .sort .arrow.DESC {
background-position: 50px -46px;
}
 .arrow.current.ASC{
	background-position: 50px -76px
}
 .arrow.current.DESC {

}
</style>
<div id="plist" data-tpa="SEARCH_MAIN_LIST">
<div class="mod_search_select clearfix mt" id="rankOpDiv">
<div class="sort_b">
<span class="box" style="float:left; width:60px;line-height: 40px;border-right: 1px solid #E1E1E1; height:40px;">商品排序：</span>
  <form method="GET"  name="listform" style="width:500px; float:left; padding-top:0px;" >
  
<a  href="search.php?<?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?><?php if ($this->_var['key'] != "sort" && $this->_var['key'] != "order"): ?><?php echo $this->_var['key']; ?>=<?php echo $this->_var['item']; ?>&<?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>page=<?php echo $this->_var['pager']['page']; ?>&sort=goods_id&order=<?php if ($this->_var['pager']['search']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#list" class="box arrow <?php if ($this->_var['pager']['search']['sort'] == 'goods_id'): ?>current <?php echo $this->_var['pager']['search']['order']; ?><?php endif; ?>">上架</a>


<a  href="search.php?<?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?><?php if ($this->_var['key'] != "sort" && $this->_var['key'] != "order"): ?><?php echo $this->_var['key']; ?>=<?php echo $this->_var['item']; ?>&<?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>page=<?php echo $this->_var['pager']['page']; ?>&sort=shop_price&order=<?php if ($this->_var['pager']['search']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#list" class="box arrow aup <?php if ($this->_var['pager']['search']['sort'] == 'shop_price'): ?>current <?php echo $this->_var['pager']['search']['order']; ?><?php endif; ?>">价格</a>



<a  href="search.php?<?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?><?php if ($this->_var['key'] != "sort" && $this->_var['key'] != "order"): ?><?php echo $this->_var['key']; ?>=<?php echo $this->_var['item']; ?>&<?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>page=<?php echo $this->_var['pager']['page']; ?>&sort=last_update&order=<?php if ($this->_var['pager']['search']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#list" class="box arrow aup <?php if ($this->_var['pager']['search']['sort'] == 'last_update'): ?>current <?php echo $this->_var['pager']['search']['order']; ?><?php else: ?><?php endif; ?>">更新</a>
                  <input type="hidden" name="category" value="<?php echo $this->_var['category']; ?>" />
  <input type="hidden" name="display" value="<?php echo $this->_var['pager']['display']; ?>" id="display" />
  <input type="hidden" name="brand" value="<?php echo $this->_var['brand_id']; ?>" />
  <input type="hidden" name="price_min" value="<?php echo $this->_var['price_min']; ?>" />
  <input type="hidden" name="price_max" value="<?php echo $this->_var['price_max']; ?>" />
  <input type="hidden" name="filter_attr" value="<?php echo $this->_var['filter_attr']; ?>" />
  <input type="hidden" name="page" value="<?php echo $this->_var['pager']['page']; ?>" />
  <input type="hidden" name="sort" value="<?php echo $this->_var['pager']['sort']; ?>" />
  <input type="hidden" name="order" value="<?php echo $this->_var['pager']['order']; ?>" />
  </form>
</div>
<div class="search_select_page">
<div class="select_page_btn">
<?php if ($this->_var['pager']['page_prev']): ?>
	  <a href="<?php echo $this->_var['pager']['page_prev']; ?>" class="prev" ></a>
	  <?php else: ?>
	  <a class="prev_no"></a>
	  <?php endif; ?>
	  <?php if ($this->_var['pager']['page_next']): ?>
	  <a href="<?php echo $this->_var['pager']['page_next']; ?>" class="next" ></a>
	  <?php else: ?>
	  <a class="next_no"></a>
	  <?php endif; ?>
</div>
<div class="select_page_num">
<span><?php echo $this->_var['pager']['page']; ?></span>/<?php echo $this->_var['pager']['page_count']; ?>
<input id="currentPageNum" type="hidden" value="1">
</div>
</div>
</div>
<div id="search_table" class="search_table">
<div class="mod_search_list">
<ul class="clearfix" id="itemSearchList">
 <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?> 
  <?php if ($this->_var['goods']['goods_id']): ?>
<li class="search_item">
<div class="search_item_box">
<a class="search_prod_img" href="<?php echo $this->_var['goods']['url']; ?>">
<img width="200" height="200" src="<?php echo $this->_var['goods']['goods_thumb']; ?>" >
</a>

   
<div class="item_promotion_text" style="display:block;">
<a><?php echo $this->_var['goods']['goods_name']; ?></a>
 <?php if ($this->_var['goods']['is_hot']): ?>
 <sup class="ico_search_list" style="display:'';">热卖</sup>
 <?php elseif ($this->_var['goods']['is_best']): ?>
		<sup class="ico_search_list" style="display:'';">精品</sup>
         <?php elseif ($this->_var['goods']['is_promotion']): ?>
		<sup class="ico_search_list" style="display:'';">促销</sup>
			 <?php elseif ($this->_var['goods']['is_new']): ?>
		<sup class="ico_search_list" style="display:'';">新品</sup>
			 <?php endif; ?> 
</div>
<div class="pricebox clearfix">
<span class="color_red price" ><?php echo $this->_var['goods']['shop_price']; ?></span>
<del><?php echo $this->_var['goods']['market_price']; ?></del>
</div>
<p class="title"><a class="title"> <?php echo $this->_var['goods']['goods_name']; ?></a></p>
   <form name="ECS_FORMBUY">
<div class="item_act clearfix">
<div class="shopping_num"> 
 <script language="javascript" type="text/javascript">  
									 
									 function goods_cut($val){  
									 var num_val=document.getElementById('number_'+$val);  
									 var new_num=num_val.value;  
									 var Num = parseInt(new_num);  
									 if(Num>1)Num=Num-1;  
									 num_val.value=Num;  
									 } 
									 
									 function goods_add($val){ 
									  var num_val=document.getElementById('number_'+$val);  
									  var new_num=num_val.value;  
									  var Num = parseInt(new_num);  
									  Num=Num+1;  
									  num_val.value=Num;  
									  }
			</script> 
           
              
<input  id="number_<?php echo $this->_var['goods']['goods_id']; ?>" name="number" type="text" value="1" onblur="changePrice();" onfocus="if(value=='1') {value=''}" size="4" maxlength="5"/><span><a class="add"  onclick="goods_add(<?php echo $this->_var['goods']['goods_id']; ?>);">加</a><a class="dis_decrease" onclick="goods_cut(<?php echo $this->_var['goods']['goods_id']; ?>);">减</a></span></div> 
<div class="shopping_act fl">
<a class="buy_btn1" href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)">加入购物车</a>
</div>
</div>
 </form>
<p class="comment">
<i></i>
<a href="#goodsComment"><?php echo $this->_var['goods']['comment_count']; ?></a>
</p>
<div class="item_status clearfix"></div>
<u class="bg_border"><?php echo $this->_var['goods']['comment_count']; ?></u>

</div>
</li>
      <?php endif; ?>
             <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>   
</ul>
</div>
<script type="Text/Javascript" language="JavaScript">
<!--

function selectPage(sel)
{
  sel.form.submit();
}

//-->
</script> 
<script type="text/javascript">
window.onload = function()
{
  Compare.init();
  fixpng();
}
<?php $_from = $this->_var['lang']['compare_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
<?php if ($this->_var['key'] != 'button_compare'): ?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php else: ?>
var button_compare = '';
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
</script>
 <script type="text/javascript">
var goods_id = <?php echo $this->_var['goods_id']; ?>;
var goodsattr_style = <?php echo empty($this->_var['cfg']['goodsattr_style']) ? '1' : $this->_var['cfg']['goodsattr_style']; ?>;
var gmt_end_time = <?php echo empty($this->_var['promote_end_time']) ? '0' : $this->_var['promote_end_time']; ?>;
<?php $_from = $this->_var['lang']['goods_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var goodsId = <?php echo $this->_var['goods_id']; ?>;
var now_time = <?php echo $this->_var['now_time']; ?>;


onload = function(){
  changePrice();
  try {onload_leftTime();}
  catch (e) {}
}

/**
 * 点选可选属性或改变数量时修改商品价格的函数
 */
function changePrice()
{
  var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
  var qty = document.forms['ECS_FORMBUY'].elements['number'].value;

  Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
}

/**
 * 接收返回的信息
 */
function changePriceResponse(res)
{
  if (res.err_msg.length > 0)
  {
    alert(res.err_msg);
  }
  else
  {
    document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;

    if (document.getElementById('ECS_GOODS_AMOUNT'))
      document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
  }
}
document.getElementById('print').innerHTML=document.getElementById('source').innerHTML;

</script>



