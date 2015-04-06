 <?php
 $cat_id = 1;//修改数字1为想要调用的分类ID
 $this->assign('cat_info', get_wap_cat_info($cat_id));
 $this->assign('thiscid1', get_wap_parent_id_tree($cat_id));
 $this->assign('cat_goods2', get_cat_id_goods_list($cat_id,6));   
?>
<section class="index_floor">
<div class="floor_body ">
<h2>
<span class="title_l"></span><span class="title_r"></span><a href="<?php echo $this->_var['cat_info']['url']; ?>" class="more"></a>
<?php echo $this->_var['cat_info']['name']; ?>
</h2>

<ul class="clearfix">
	<?php $_from = $this->_var['cat_goods2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_83310900_1427423928');$this->_foreach['cat_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_83310900_1427423928']):
        $this->_foreach['cat_goods']['iteration']++;
?>
                   
                    <li style="visibility: visible;">
                        <a href="<?php echo $this->_var['goods_0_83310900_1427423928']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_0_83310900_1427423928']['name']); ?>">
                         <div class="products_kuang">
                        <img src="../<?php echo $this->_var['goods_0_83310900_1427423928']['thumb']; ?>">
                   
                         </div>
                       <div class="goods_name">
                     <?php echo $this->_var['goods_0_83310900_1427423928']['short_name']; ?>
                        </div>
                         <span class="price"><?php if ($this->_var['goods_0_83310900_1427423928']['promote_price']): ?><?php echo $this->_var['goods_0_83310900_1427423928']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods_0_83310900_1427423928']['shop_price']; ?><?php endif; ?></span> 
                        </a>
                        
                    </li>
               
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    
<li></li>
<li></li>
</ul>
<div class="floor_key clearfix">
<?php $_from = $this->_var['thiscid1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['list']):
        $this->_foreach['name']['iteration']++;
?>
<A href="<?php echo $this->_var['list']['url']; ?>"><?php echo $this->_var['list']['name']; ?></A>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</div>
</section>


