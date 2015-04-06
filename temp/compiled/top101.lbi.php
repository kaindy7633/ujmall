
<?php if ($this->_var['top_goods']): ?>
<div  class="mod_box mod_search_sidlist clearfix">
<div class="box_hd">销量排行榜</div><div class="sidlist_box sidlist_slide">
        <ul>
         <?php $_from = $this->_var['top_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['top_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['top_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['top_goods']['iteration']++;
?> 
         <?php
			$index=$index+1;
              $GLOBALS['smarty']->assign('index', $index);
		?>
            <li><a  href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" class="pro_img_small"><img src="<?php echo $this->_var['goods']['thumb']; ?>" height="70" width="70"><sup class="nub<?php echo $this->_var['index']; ?>"></sup></a><p class="price"><span class="color_red"><?php echo $this->_var['goods']['shop_price']; ?></span></p><h3 class="name"><a  href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"><?php echo $this->_var['goods']['short_name']; ?></a></h3></li>
             <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
 </div>
<?php endif; ?>

