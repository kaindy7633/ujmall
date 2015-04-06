<div id="append_parent"></div>
<?php if ($this->_var['user_info']): ?> 
<label style="font-family:'Courier New', Courier, monospace; font-size:12px" onmouseover="showSubNav('subNav_7');" onmouseout="hideSubNav('subNav_7');">
    <span class="hd_hi">Hi,</span>
    <a  href="user.php"  target="_blank" class="blue_link" ><?php echo $this->_var['user_info']['username']; ?></a> / 
    <a href="user.php?act=logout" class="blue_link"><?php echo $this->_var['lang']['user_logout']; ?></a>
</label>

<div class="hd_user_center">
    <div class="clearfix" style="font-family:宋体;"  >
        <div class="fl"><a class="hd_avata_box" href="" target="_blank" data-ref="YHD_TOP_userpic_nonlogin"></a></div>
        <div class="hd_growth_box" style="font-family:宋体;">
            <a class="hd_vip_earn" href="user.php?act=login" target="_blank" data-ref="YHD_TOP_vip_nonlogin">会员专享，欢迎登录</a>
            <p class="hd_my_yhd"><a href="index.php" target="_blank" data-ref="YHD_TOP_myyihaodian_nonlogin" style="font-family:'Courier New', Courier, monospace">欢迎进入我的U+</a></p>
        </div>
    </div>
    <div class="hd_message" style="font-family:宋体;">
        <a href="user.php?act=account_log" target="_blank" data-ref="YHD_TOP_userjifen_nonlogin">资金</a>
        <a href="user.php?act=bonus" target="_blank" data-ref="YHD_TOP_userxunzhang_nonlogin">红包</a>
    </div>
</div>

<?php else: ?> 
<label style="font-family:'Courier New', Courier, monospace; font-size:12px">
    <span class="hd_hi">Hi,</span>
    <a href="user.php?act=login" class="blue_link">登录</a> / 
    <a href="user.php?act=register"  class="blue_link" target="_blank">注册</a>
</label>
<div class="hd_user_center">
<div class="clearfix" style="font-family:宋体;"  >
<div class="fl">
<a class="hd_avata_box" href="" target="_blank" data-ref="YHD_TOP_userpic_nonlogin"></a>
</div>
<div class="hd_growth_box" style="font-family:宋体;">
<a class="hd_vip_earn" href="user.php?act=login" target="_blank" data-ref="YHD_TOP_vip_nonlogin">会员专享，欢迎登录</a>
<p class="hd_my_yhd"><a href="index.php" target="_blank" data-ref="YHD_TOP_myyihaodian_nonlogin" style="font-family:'Courier New', Courier, monospace">欢迎进入我的U+</a></p>
</div>
</div>
<div class="hd_message" style="font-family:宋体;">
<a href="user.php?act=account_log" target="_blank" data-ref="YHD_TOP_userjifen_nonlogin">资金</a>
<a href="user.php?act=bonus" target="_blank" data-ref="YHD_TOP_userxunzhang_nonlogin">红包</a>
</div>
</div>
<?php endif; ?>
