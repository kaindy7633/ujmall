<?php echo $this->fetch('pageheader.htm'); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,listtable.js')); ?>
<div id="tabbody-div">
<form name="theForm" method="post" action="weixin.php?act=addqcode&id=<?php echo $this->_var['qcode']['id']; ?>">
  <table width="100%">
  <tbody>
  <tr><th colspan="2" align="center">可以根据你的需要为商城商品或文章的永久二维码。生成后用户使用微信扫描后会收到商品或者文章的详细信息。</th></tr>
  <tr>
  <td class="label">二维码类型:</td>
  	<td><select name="type">
		<option value="1" <?php if ($this->_var['qcode']['type'] == 1): ?>selected<?php endif; ?>>商品详情二维码</option>
		<option value="2" <?php if ($this->_var['qcode']['type'] == 2): ?>selected<?php endif; ?>>文章详情二维码</option>
		<option value="3" <?php if ($this->_var['qcode']['type'] == 3): ?>selected<?php endif; ?>>自定义内容</option>
	</select></td>
  </tr>
  <tr>
    <td class="label">二维码内容:</td>
    <td><input type="text" name="content" size="32" value="<?php echo $this->_var['qcode']['content']; ?>">（根据选择的类型填写商品ID、文章ID、自定义文字）</td>
  </tr>
  <?php if ($this->_var['qcode']['qcode']): ?>
  <tr>
  	<td class="label">图片二维码:</td>
  	<td><img src="https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=<?php echo $this->_var['qcode']['qcode']; ?>" height="250"></td>
  </tr>
  <?php endif; ?>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" value="<?php echo $this->_var['lang']['button_submit']; ?>" class="button" />
    <input type="reset" value="<?php echo $this->_var['lang']['button_reset']; ?>" class="button" />
    </td>
  </tr>
</tbody></table>
</form>
</div>

<?php echo $this->fetch('pagefooter.htm'); ?>