
<?php if ($this->_var['top_goods']): ?>
<div id="hotSale" class="mod_search_sidlist mb" style="">

    <h2 class="search_title">销量排行榜</h2>
    <div class="sidlist_box sidlist_slide">
        <ul>
         <?php $_from = $this->_var['top_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_50684800_1427423849');$this->_foreach['top_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['top_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_50684800_1427423849']):
        $this->_foreach['top_goods']['iteration']++;
?> 
         <?php
			$index=$index+1;
              $GLOBALS['smarty']->assign('index', $index);
		?>
            <li productid="9497" style="margin-left: 45px;">
                <a class="pro_img_small"  href="<?php echo $this->_var['goods_0_50684800_1427423849']['url']; ?>">
                    <img width="90" height="90" src="<?php echo $this->_var['goods_0_50684800_1427423849']['thumb']; ?>"></img>
                    <sup class="nub<?php echo $this->_var['index']; ?>" style="display: block;"></sup>
                </a>
                <p class="price">
                    <span class="color_red"><?php echo $this->_var['goods_0_50684800_1427423849']['shop_price']; ?></span>
                </p>
                <p class="name"><a  href="<?php echo $this->_var['goods_0_50684800_1427423849']['url']; ?>"><?php echo $this->_var['goods_0_50684800_1427423849']['short_name']; ?></a></p>
                <u style="right: 52px;"></u>
            </li>
             <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
 </div>
<?php endif; ?>


