 <div class="mod_floor_title fushi">
        <div data-tpc="1">
        <a class="bt" target="_blank" href="category.php?id=63">保健、药品、成人用品</a>
        </div>
        <div class="keyword" data-tpc="63">
         <?php
 $this->assign('thiscid1', get_parent_id_tree(11));//调用父级分类的下级分类
 ?>
  <?php $_from = $this->_var['thiscid1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list_0_30787000_1427417391');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['list_0_30787000_1427417391']):
        $this->_foreach['name']['iteration']++;
?>
   <?php if ($this->_foreach['name']['iteration'] > 6): ?> 
 <A href="<?php echo $this->_var['list_0_30787000_1427417391']['url']; ?>" target=_blank ><?php echo $this->_var['list_0_30787000_1427417391']['name']; ?></A>|
 <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      
        </div>
        </div>