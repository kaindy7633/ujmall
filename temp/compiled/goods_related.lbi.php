<?php if ($this->_var['related_goods']): ?>
<div class="mod_box mod_product_box"><div class="box_hd"><strong>看过本商品的用户还看过</strong></div><div class="box_list">
<ul>
     <?php $_from = $this->_var['related_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'releated_goods_data');if (count($_from)):
    foreach ($_from AS $this->_var['releated_goods_data']):
?>
<li><a class="pro_img" href="<?php echo $this->_var['releated_goods_data']['url']; ?>"><img alt="" src="<?php echo $this->_var['releated_goods_data']['goods_thumb']; ?>" height="115" width="115"></a><p class="pro_tit"><a href="<?php echo $this->_var['releated_goods_data']['url']; ?>" target="_blank"><?php echo $this->_var['releated_goods_data']['short_name']; ?></a></p><p class="pro_price"><span class="color_red"> <?php if ($this->_var['releated_goods_data']['promote_price'] != 0): ?><?php echo $this->_var['releated_goods_data']['formated_promote_price']; ?> 
          <?php else: ?> 
          <?php echo $this->_var['releated_goods_data']['shop_price']; ?> 
          <?php endif; ?></span><del> <?php echo $this->_var['releated_goods_data']['market_price']; ?> </del><a class="commandbtn"  href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)">加入购物车</a></p></li>      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></ul></div></div>

<?php endif; ?>
