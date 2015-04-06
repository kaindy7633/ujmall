<?php if ($this->_var['hot_goods']): ?>
<div id="hotProducts" style="" class="mod_search_sidlist mb clearfix" data-tpa="SEARCH_LEFT_HOT_PRODUCTS"><h2 class="search_title">热卖推荐</h2>
<div class="sidlist_box"><ul>
     <?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['hot_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hot_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['hot_goods']['iteration']++;
?>
<li id="ad_36003529" inshop="1"><a target="_blank" onclick="" href="<?php echo $this->_var['goods']['url']; ?>" class="pro_img_big"><img src="<?php echo $this->_var['goods']['thumb']; ?>" title="" height="160" width="160"></a><a class="tip" id="promotionLeft_36003529" target="_blank" title="" href="<?php echo $this->_var['goods']['url']; ?>"></a><p class="price"><span class="color_red"><?php if ($this->_var['goods']['promote_price'] != ""): ?>
            <?php echo $this->_var['goods']['promote_price']; ?>
            <?php else: ?>
            <?php echo $this->_var['goods']['shop_price']; ?>
            <?php endif; ?></span><del><?php echo $this->_var['goods']['market_price']; ?></del></p><p class="name"><a target="_blank" onclick="" href="" ><?php echo $this->_var['goods']['short_style_name']; ?> </a></p><p class="comment" style="height:auto; margin-top:2px;"> <i></i> <a id="cmt_30687239" cmct="362" onclick="" target="_blank" href="#goodsComment"><?php echo $this->_var['goods']['evaluation']; ?></a></p></li>
   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul></div></div>
<?php endif; ?>


