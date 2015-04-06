      <style>
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
background: url(themes/68ecshop_xiaomi/images/arrow.gif) no-repeat scroll 38px -16px transparent;
padding-right: 20px;
    line-height: 40px;
    border-right: 1px solid #E1E1E1;
    height: 40px;

}
.arrow.current {
		color: #c10000;
	background-position: 38px 16px
}
.arrow.ASC, .cat_r .sort .arrow.DESC {
background-position: 38px -46px;
}
 .arrow.current.ASC{
	background-position: 38px -76px
}
 .arrow.current.DESC {

}
       </style>
<div class="mod_search_select clearfix mt" id="rankOpDiv" style="height: 40px;
border: 1px solid #DDD;
box-shadow: 0px 1px 2px #E0E0E0;
background: none repeat scroll 0% 0% #FAFAFA;
font-family: "Microsoft Yahei";
margin-bottom: 10px;">
<div class="sort_b">
<span class="box" style="float:left; width:60px;line-height: 40px;border-right: 1px solid #E1E1E1; height:40px;">商品排序：</span>
  <form method="GET"  name="listform" style="width:500px; float:left;" >
  
<a href="exchange.php?<?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?><?php if ($this->_var['key'] != "sort" && $this->_var['key'] != "order"): ?><?php echo $this->_var['key']; ?>=<?php echo $this->_var['item']; ?>&<?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>page=<?php echo $this->_var['pager']['page']; ?>&sort=goods_id&order=<?php if ($this->_var['pager']['search']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#list" class="box arrow <?php if ($this->_var['pager']['search']['sort'] == 'goods_id'): ?>current <?php echo $this->_var['pager']['order']; ?><?php endif; ?>">上架</a>


<a  href="exchange.php?display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=exchange_integral&order=<?php if ($this->_var['pager']['sort'] == 'exchange_integral' && $this->_var['pager']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#goods_list" class="box arrow aup <?php if ($this->_var['pager']['sort'] == 'exchange_integral'): ?>current <?php echo $this->_var['pager']['order']; ?><?php endif; ?>">积分</a>



<a  href="exchange.php?<?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?><?php if ($this->_var['key'] != "sort" && $this->_var['key'] != "order"): ?><?php echo $this->_var['key']; ?>=<?php echo $this->_var['item']; ?>&<?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>page=<?php echo $this->_var['pager']['page']; ?>&sort=last_update&order=<?php if ($this->_var['pager']['search']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#list" class="box arrow aup <?php if ($this->_var['pager']['sort'] == 'last_update'): ?>current <?php echo $this->_var['pager']['order']; ?><?php else: ?><?php endif; ?>">更新</a>

                  <input type="hidden" name="category" value="<?php echo $this->_var['category']; ?>" />
  <input type="hidden" name="display" value="<?php echo $this->_var['pager']['display']; ?>" id="display" />
  <input type="hidden" name="brand" value="<?php echo $this->_var['brand_id']; ?>" />
  <input type="hidden" name="filter_attr" value="<?php echo $this->_var['filter_attr']; ?>" />
  <input type="hidden" name="page" value="<?php echo $this->_var['pager']['page']; ?>" />
  <input type="hidden" name="sort" value="<?php echo $this->_var['pager']['sort']; ?>" />
  <input type="hidden" name="order" value="<?php echo $this->_var['pager']['order']; ?>" />
  </form>
  </div>

</div>
<div class="bd"> 
  
  <?php if ($this->_var['pager']['display'] == 'list'): ?>
  <div class="goodsList"> 
    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?> 
    <ul class="clearfix bgcolor"<?php if (($this->_foreach['goods_list']['iteration'] - 1) % 2 == 0): ?>id=""<?php else: ?>id="bgcolor"<?php endif; ?>>
    
    <li class="thumb"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" /></a></li>
    <li class="goodsName"> <a href="<?php echo $this->_var['goods']['url']; ?>" class="f6"> 
      <?php if ($this->_var['goods']['goods_style_name']): ?> 
      <?php echo $this->_var['goods']['goods_style_name']; ?><br />
      <?php else: ?> 
      <?php echo $this->_var['goods']['goods_name']; ?><br />
      <?php endif; ?> 
      </a> 
      <?php if ($this->_var['goods']['goods_brief']): ?> 
      <?php echo $this->_var['lang']['goods_brief']; ?><?php echo $this->_var['goods']['goods_brief']; ?><br />
      <?php endif; ?> 
    </li>
    <li> 
      <?php echo $this->_var['lang']['exchange_integral']; ?><?php echo $this->_var['goods']['exchange_integral']; ?>
      
      <?php if ($this->_var['show_marketprice']): ?> 
      <?php echo $this->_var['lang']['market_price']; ?><font class="shop"><?php echo $this->_var['goods']['market_price']; ?></font><br />
      <?php endif; ?> 
  
    </li>
    <li class="action"> <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>);" class="abg f6"><?php echo $this->_var['lang']['favourable_goods']; ?></a> <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)">立即购买</a> </li>
    </ul>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
  </div>
  <?php elseif ($this->_var['pager']['display'] == 'grid'): ?>
  
  <div class="xm-goods-list-wrap">
    <ul class="xm-goods-list clearfix">
   <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['name']['iteration']++;
?>
      <?php if ($this->_var['goods']['goods_id']): ?>
      <li>
        <div class="xm-goods-item">
          <div class="item-thumb"> <a target="_blank" href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="" /></a> </div>
          <h3 class="item-name"><a target="_blank" href="<?php echo $this->_var['goods']['url']; ?>"><?php echo $this->_var['goods']['goods_name']; ?></a></h3>
          <div class="item-price"> 
          
      <?php echo $this->_var['lang']['exchange_integral']; ?> <del><?php echo $this->_var['goods']['exchange_integral']; ?></del>
   
  	 </div>
          <div class="item-action"> <a class="action-add-cart xmAddShopCart" href="<?php echo $this->_var['goods']['url']; ?>" ><span class="icon-common icon-common-plus"></span>立即兑换 </div>
          
   
        </div>
      </li>
      <?php endif; ?> 
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
  </div>
  <?php elseif ($this->_var['pager']['display'] == 'text'): ?>
  <div class="goodsList"> 
    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?> 
    <ul class="clearfix bgcolor"<?php if (($this->_foreach['goods_list']['iteration'] - 1) % 2 == 0): ?>id=""<?php else: ?>id="bgcolor"<?php endif; ?>>
    
    <li class="goodsName"> <a href="<?php echo $this->_var['goods']['url']; ?>" class="f6 f5"> 
      <?php if ($this->_var['goods']['goods_style_name']): ?> 
      <?php echo $this->_var['goods']['goods_style_name']; ?><br />
      <?php else: ?> 
      <?php echo $this->_var['goods']['goods_name']; ?><br />
      <?php endif; ?> 
      </a> 
      <?php if ($this->_var['goods']['goods_brief']): ?> 
      <?php echo $this->_var['lang']['goods_brief']; ?><?php echo $this->_var['goods']['goods_brief']; ?><br />
      <?php endif; ?> 
    </li>
    <li> 
      <?php if ($this->_var['show_marketprice']): ?> 
      <?php echo $this->_var['lang']['market_price']; ?><font class="market"><?php echo $this->_var['goods']['market_price']; ?></font><br />
      <?php endif; ?> 
      <?php if ($this->_var['goods']['promote_price'] != ""): ?> 
      <?php echo $this->_var['lang']['promote_price']; ?><font class="shop"><?php echo $this->_var['goods']['promote_price']; ?></font><br />
      <?php else: ?> 
      <?php echo $this->_var['lang']['shop_price']; ?><font class="shop"><?php echo $this->_var['goods']['shop_price']; ?></font><br />
      <?php endif; ?> 
    </li>
    <li class="action"> <a href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>);" class="abg f6"><?php echo $this->_var['lang']['favourable_goods']; ?></a> <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)">立即购买</a> </li>
    </ul>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
  </div>
  <?php endif; ?> 
  
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