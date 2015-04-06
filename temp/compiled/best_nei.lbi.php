<?php if ($this->_var['best_goods']): ?>
<div class="mod_hot_offers mt20 clearfix">
 <h2 class="search_title">精品推荐</h2>
    <div class="clearfix">
        <ul>
            <?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['best_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['best_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['best_goods']['iteration']++;
?>
            <li>
              <a class="pro_img_big" href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"><img width="160" height="160"  src="<?php echo $this->_var['goods']['thumb']; ?>"></img></a>
				<a class="tip" href="" title="" onclick="" target="_blank"></a>
			<p class="price"><span class="color_red">  <?php if ($this->_var['goods']['promote_price'] != ""): ?>
            <?php echo $this->_var['goods']['promote_price']; ?>
            <?php else: ?>
            <?php echo $this->_var['goods']['shop_price']; ?>
            <?php endif; ?><i></i></span><del> <?php echo $this->_var['goods']['market_price']; ?></del></p>
<p class="name"><a  href="<?php echo $this->_var['goods']['url']; ?>" target="_blank"><?php echo $this->_var['goods']['name']; ?></a></p>
<p class="comment" style="margin-top:3px;"><i></i>
    <a  href="" target="_blank" ><?php echo $this->_var['goods']['evaluation']; ?></a></p>
            </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
    </div>

</div>
<?php endif; ?>