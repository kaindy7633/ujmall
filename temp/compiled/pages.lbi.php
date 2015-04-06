
<form name="selectPageForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<?php if ($this->_var['pager']['page_count'] != 1): ?>
<div class="mod_turn_page clearfix mt20" style="display: block;">

<div class="turn_page clearfix" id="turnPageBottom">
<?php $_from = $this->_var['pager']['page_number']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_51811900_1427423849');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_51811900_1427423849']):
?>
<?php if ($this->_var['pager']['page'] == $this->_var['key']): ?>
<span class="page_cur"><?php echo $this->_var['key']; ?></span>
<?php else: ?>
<a href="<?php echo $this->_var['item_0_51811900_1427423849']; ?>"><?php echo $this->_var['key']; ?></a>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<a  href="<?php echo $this->_var['pager']['page_next']; ?>" class="page_next"><?php echo $this->_var['lang']['page_next']; ?><i></i></a>
</div>
</div>
<?php endif; ?>
</form>
<script type="Text/Javascript" language="JavaScript">
<!--

function selectPage(sel)
{
  sel.form.submit();
}

//-->
</script> 
