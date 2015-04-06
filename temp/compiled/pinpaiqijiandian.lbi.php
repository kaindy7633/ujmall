<div class="brandArea mt30">
<h3 class="th3">
<span>
<b>品牌旗舰店</b>
<s></s>
</span>
</h3>
<div class="brandBox">
<ul class="left">
 <?php
		 $GLOBALS['smarty']->assign('topleft1',get_advlist('频道页-分类ID'.$GLOBALS['smarty']->_var['category'].'-左侧图片',4));
	  ?>
      <?php $_from = $this->_var['topleft1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad_0_66891600_1427427701');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad_0_66891600_1427427701']):
        $this->_foreach['index_image']['iteration']++;
?>
	  <li>
	   <a href="<?php echo $this->_var['ad_0_66891600_1427427701']['url']; ?>" target="_blank"><img src="<?php echo $this->_var['ad_0_66891600_1427427701']['image']; ?>" width="120" height="120"/></a>
	  </li>
    
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
</ul>
<ul class="mid">
 <?php
		 $GLOBALS['smarty']->assign('topmid',get_advlist('频道页-分类ID'.$GLOBALS['smarty']->_var['category'].'-中间图片',1));
	  ?>
        <?php $_from = $this->_var['topmid']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad_0_66902100_1427427701');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad_0_66902100_1427427701']):
        $this->_foreach['index_image']['iteration']++;
?>
<li>
<a href="<?php echo $this->_var['ad_0_66902100_1427427701']['url']; ?>" target="_blank">
<img src="<?php echo $this->_var['ad_0_66902100_1427427701']['image']; ?>" width="390" height="241">
</a>
</li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
<ul class="right">
 <?php
		 $GLOBALS['smarty']->assign('topright',get_advlist('频道页-分类ID'.$GLOBALS['smarty']->_var['category'].'-右侧图片',2));
	  ?>
   <?php $_from = $this->_var['topright']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad_0_66911700_1427427701');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad_0_66911700_1427427701']):
        $this->_foreach['index_image']['iteration']++;
?>
	  <li>
	   <a href="<?php echo $this->_var['ad_0_66911700_1427427701']['url']; ?>" target="_blank"><img src="<?php echo $this->_var['ad_0_66911700_1427427701']['image']; ?>" width="120" height="120"/></a>
	  </li>
    
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
<ul class="last">
 <?php
		 $GLOBALS['smarty']->assign('topright1',get_advlist('频道页-分类ID'.$GLOBALS['smarty']->_var['category'].'-最后图片',1));
	  ?>
       <?php $_from = $this->_var['topright1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad_0_66921100_1427427701');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad_0_66921100_1427427701']):
        $this->_foreach['index_image']['iteration']++;
?>
<li>
<a href="<?php echo $this->_var['ad_0_66921100_1427427701']['url']; ?>">
<img src="<?php echo $this->_var['ad_0_66921100_1427427701']['image']; ?>"  width="219" height="241">
</a>
</li>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>
</div>