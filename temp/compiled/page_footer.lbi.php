<div id="footerServiceLinkId"><div class="ft_service_link clearfix" data-tpa="YHD_GLOBAl_FOOTER_HELP">
<div id="bottomHelpLinkId" class="ft_help_list clearfix">
 <?php $_from = $this->_var['helps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');$this->_foreach['helps'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['helps']['total'] > 0):
    foreach ($_from AS $this->_var['help_cat']):
        $this->_foreach['helps']['iteration']++;
?>
<dl>
<dt><?php echo $this->_var['help_cat']['cat_name']; ?></dt>
<?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
<dd>
<a href="help.php?id=<?php echo $this->_var['item']['article_id']; ?>"><?php echo sub_str($this->_var['item']['short_title'],9); ?></a>
</dd><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</dl>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</div>
</div>

<div class="ft_code_wrap clearfix" data-tpa="YHD_GLOBAl_HEADER_MOBILE">
<div class="ft_mobile_code clearfix">
<img src="themes/68ecshop_xiaomi/images/kehutu.png">
<dl>
<dt>U+易购手机客户端</dt>
<dd>随时随地，随便购！</dd>
<dd>
<a href="#" class="ft_iphone"><i></i>iPhone</a>
<a href="#" class="ft_ipad" ><i></i>iPad</a>
<a href="#" class="ft_android" ><i></i>Android</a>
</dd>
</dl>
</div>
<div class="ft_mobile_code clearfix">
<img src="themes/68ecshop_xiaomi/images/lm_weixin.jpg" width="100">
<dl>
<dt>粮贸超市官方微信</dt>
<dd>万千优惠资讯抢先收到，互动、查物流一步搞定！</dd>
</dl>
</div>
</div>

<div id="footer" data-tpa="YHD_GLOBAl_FOOTER">
<div class="ft_footer_service">
<a href="javascript:void()"><span class="s1"></span>满额包邮</a>
<a href="javascript:void()"><span class="s2"></span>正品保障</a>
<a href="javascript:void()"><span class="s3"></span>售后无忧</a>
<a href="javascript:void()"><span class="s4"></span>准时送达</a>
</div>
<p class="ft_footer_link">
 <?php if ($this->_var['txt_links']): ?>
 <?php $_from = $this->_var['txt_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['link']):
        $this->_foreach['name']['iteration']++;
?> 
<a href="<?php echo $this->_var['link']['url']; ?>" target="_blank"><?php echo $this->_var['link']['name']; ?></a>
 <?php if (! ($this->_foreach['nav_bottom_list']['iteration'] == $this->_foreach['nav_bottom_list']['total'])): ?> 
    | 
    <?php endif; ?> 
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 		 <?php endif; ?>
</p>
<p class="ft_footer_link">
 <?php if ($this->_var['navigator_list']['bottom']): ?>
   				<?php $_from = $this->_var['navigator_list']['bottom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav_0_34042100_1428107723');$this->_foreach['nav_bottom_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_bottom_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav_0_34042100_1428107723']):
        $this->_foreach['nav_bottom_list']['iteration']++;
?>
<a href="<?php echo $this->_var['nav_0_34042100_1428107723']['url']; ?>" target="_blank"><?php echo $this->_var['nav_0_34042100_1428107723']['name']; ?></a>

<?php if (! ($this->_foreach['nav_bottom_list']['iteration'] == $this->_foreach['nav_bottom_list']['total'])): ?> 
    | 
    <?php endif; ?> 
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 		 <?php endif; ?>
</p>
<p class="ft_footer_link"><?php echo $this->_var['copyright']; ?></p>
<small class="ft_pic_link">
<a href=""><img src="themes/68ecshop_xiaomi/images/bottom1.gif"></a>|
<a href=""><img src="themes/68ecshop_xiaomi/images/bottom2.jpg"></a>|
<a href=""><img src="themes/68ecshop_xiaomi/images/bottom3.jpg"></a>|
<a href=""><img src="themes/68ecshop_xiaomi/images/bottom4.gif"></a>|
<a href=""><img src="themes/68ecshop_xiaomi/images/bottom5.png"></a>|
<a href=""><img src="themes/68ecshop_xiaomi/images/bottom6.png"></a>|
<a href=""><img src="themes/68ecshop_xiaomi/images/bottom7.gif"></a>|
<a href=""><img src="themes/68ecshop_xiaomi/images/bottom8.jpg"></a>|
<a href=""><img src="themes/68ecshop_xiaomi/images/bottom9.png"></a>|
</small>
</div>

 <script type="text/javascript" src="themes/68ecshop_xiaomi/js/script.js"></script>
<style type="text/css">
/*main css*/
.izl-rmenu{position:fixed;right:0px;bottom:10px; width:74px;background:url(themes/68ecshop_xiaomi/images/r_b.png) 0px bottom no-repeat;z-index:999;}
.izl-rmenu .btn{width:72px;height:73px;margin-bottom:1px;cursor:pointer;position:relative;}
.izl-rmenu .btn-qq{background:url(themes/68ecshop_xiaomi/images/r_qq.png) 0px 0px no-repeat;background-color:#6da9de;}
.izl-rmenu .btn-qq:hover{background-color:#488bc7;}
.izl-rmenu a.btn-qq,.izl-rmenu a.btn-qq:visited{background:url(themes/68ecshop_xiaomi/images/r_qq.png) 0px 0px no-repeat;background-color:#6da9de;text-decoration:none;display:block;}
.izl-rmenu .btn-wx{background:url(themes/68ecshop_xiaomi/images/r_wx.png) 0px 0px no-repeat;background-color:#78c340;}
.izl-rmenu .btn-wx:hover{background-color:#58a81c;}
.izl-rmenu .btn-wx .pic{position:absolute;right:72px;top:-7px;display:none;width:90px;height:90px;}
.izl-rmenu .btn-phone{background:url(themes/68ecshop_xiaomi/images/r_phone.png) 0px 0px no-repeat;background-color:#fbb01f;}
.izl-rmenu .btn-phone:hover{background-color:#ff811b;}
.izl-rmenu .btn-phone .phone{background-color:#ff811b;position:absolute;width:160px;left:-160px;top:0px;line-height:73px;color:#FFF;font-size:18px;text-align:center;display:none;}
.izl-rmenu .btn-top{background:url(themes/68ecshop_xiaomi/images/r_top.png) 0px 0px no-repeat;background-color:#666666;display:none;}
.izl-rmenu .btn-top:hover{background-color:#444;}
</style>
<div id="top"></div>
<div>
