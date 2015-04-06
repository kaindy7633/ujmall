
<style type="text/css">

.help_menu {}
.help_menu .help_con{border:1px solid #FF6F3D}
.help_menu .title {background:#FF6F3D; height:40px; text-indent:20px; font-size:14px; font-weight:bold; color:#FFF; text-align:left; line-height:40px; position:relative}

.help_menu ul {padding:0;}
.help_menu ul li.one {font-weight:bold; height:30px; line-height:30px; background:url(themes/68ecshop_xiaomi/images/helpnavbg.gif) repeat-x; color:#666; text-indent:10px; margin-bottom:8px;}
.help_menu ul li.two {padding-left:30px;  height:30px; line-height:30px; background:url(themes/68ecshop_xiaomi/images/present.gif) no-repeat 30px center;}
.help_menu ul li.two a:hover {color:#F90; text-decoration:underline;}
</style>

<?php if ($this->_var['helps']): ?>
<div class="left_menu">
            <ul class="column" id="help_list">
                <li><h2>帮助中心</h2>
                    <ul >
                       <?php $_from = $this->_var['helps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');if (count($_from)):
    foreach ($_from AS $this->_var['help_cat']):
?>
                        <li><h3><?php echo $this->_var['help_cat']['cat_name']; ?></h3>
                            <ul style="display:none">
                            <?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                                <li><a href="help.php?id=<?php echo $this->_var['item']['article_id']; ?>"><?php echo sub_str($this->_var['item']['short_title'],13); ?></a></li>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </ul>
                        </li>
                          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </li>
            </ul>
        </div>


<?php endif; ?>