
  <?php $_from = $this->_var['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article_item');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['article_item']):
        $this->_foreach['name']['iteration']++;
?>
  <li> <a href="<?php echo $this->_var['article_item']['url']; ?>" target="_blank"><?php echo $this->_var['article_item']['short_title']; ?></a> </li>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
