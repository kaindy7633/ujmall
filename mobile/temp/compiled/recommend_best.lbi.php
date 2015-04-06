<style>
.scroll_best {text-align: center; margin:0px 8px;}
.scroll_best .hd {height: 20px; overflow: hidden; font-size: 0; position:absolute; top:22px; right:0px;}
.scroll_best .hd ul {display: inline-block; padding-top: 5px;}
.scroll_best .hd li {display: inline-block; width: 6px; height: 6px; background: #ffffff; margin: 0 1px; vertical-align: top; overflow: hidden; -webkit-border-radius: 8px; -moz-border-radius: 6px; border-radius: 6px;}
.scroll_best .hd .on {background: #FFD05C;}
</style>

<?php if ($this->_var['best_goods']): ?>
<section class="index_floor">
<div class="floor_body" >
<h2> <span class="title_l"></span><span class="title_r"></span> 精品推荐 </h2>
<div id="scroll_best" class="scroll_best">
<div class="bd">
<ul>
  <?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_80575900_1427423928');$this->_foreach['best_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['best_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_80575900_1427423928']):
        $this->_foreach['best_goods']['iteration']++;
?>
  <li> <a href="<?php echo $this->_var['goods_0_80575900_1427423928']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_80575900_1427423928']['name']); ?>">
    <div class="products_kuang"> <img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['goods_0_80575900_1427423928']['thumb']; ?>"> </div>
    <div class="goods_name"> <?php echo $this->_var['goods_0_80575900_1427423928']['name']; ?> </div>
    <span class="price"><?php if ($this->_var['goods_0_80575900_1427423928']['promote_price']): ?><?php echo $this->_var['goods_0_80575900_1427423928']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods_0_80575900_1427423928']['shop_price']; ?><?php endif; ?></span> </a></li>
  
  <?php if ($this->_foreach['best_goods']['iteration'] % 3 == 0 && $this->_foreach['best_goods']['iteration'] != $this->_foreach['best_goods']['total']): ?>
</ul>
<ul>
<?php endif; ?> 
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
<div class="hd">
  <ul>
  </ul>
</div>
</div>
</div>
</section>
<?php endif; ?> 
<script type="text/javascript">
		TouchSlide({ 
			slideCell:"#scroll_best",
			titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
			effect:"leftLoop", 
			autoPage:true, //自动分页
			//switchLoad:"_src" //切换加载，真实图片路径为"_src" 
		});
	</script>