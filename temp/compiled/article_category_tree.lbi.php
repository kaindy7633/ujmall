<?
$GLOBALS['smarty']->assign('article_categories',   article_categories_tree(0)); //文章分类树
?>
<style type="text/css">

.help_menu {}
.help_menu .help_con{border:1px solid #d4d4d4;}
.help_menu .title {position:relative; height:30px; border:1px solid #d4d4d4;}
.help_menu .title h2{background:url(themes/68ecshop_xiaomi/images/menu_tit.png) repeat-x; height:30px; line-height:31px; font-size:14px; padding-left:18px; color:#333; cursor:pointer;}
.help_menu .title img {position:absolute; right:0; top:0;}
.help_menu ul {padding:0;}
.help_menu ul li.one {background:url(themes/68ecshop_xiaomi/images/menu_sub_tit.jpg) no-repeat; height:29px; line-height:29px;font-size:12px; padding-left:19px; color:#333; font-weight:normal; border-top:1px solid #d4d4d4; cursor:pointer;}
.help_menu ul li.two {padding-left:30px; height:30px; line-height:30px; background:url(themes/68ecshop_xiaomi/images/present.gif) no-repeat 30px center;}
.help_menu ul li.two a:hover {color:#F90; text-decoration:underline;}
</style>

<?php if ($this->_var['article_categories']): ?>
<div class="help_menu">
    <div class="title"><h2><?php echo $this->_var['lang']['article_cat']; ?></h2></div>
    <div class="help_con">
  	<ul>
     <?php $_from = $this->_var['article_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat_0_35536900_1427427284');if (count($_from)):
    foreach ($_from AS $this->_var['cat_0_35536900_1427427284']):
?>
	  <li class="one"><span><a href="<?php echo $this->_var['cat_0_35536900_1427427284']['url']; ?>"><?php echo htmlspecialchars($this->_var['cat_0_35536900_1427427284']['name']); ?></a></span></li>
      <?php $_from = $this->_var['cat_0_35536900_1427427284']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child_0_35548000_1427427284');if (count($_from)):
    foreach ($_from AS $this->_var['child_0_35548000_1427427284']):
?>
          <li class="two" > <a href="<?php echo $this->_var['child_0_35548000_1427427284']['url']; ?>" style="background-image:none;"><?php echo htmlspecialchars($this->_var['child_0_35548000_1427427284']['name']); ?></a></li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </ul>
  </div> 
  
</div>
<?php endif; ?>


