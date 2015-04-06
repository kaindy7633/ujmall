<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $this->_var['lang']['cp_home']; ?><?php if ($this->_var['ur_here']): ?> - <?php echo $this->_var['ur_here']; ?> <?php endif; ?></title>
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="styles/general.css" rel="stylesheet" type="text/css" />
    <link href="styles/main.css" rel="stylesheet" type="text/css" />
    <?php echo $this->smarty_insert_scripts(array('files'=>'../js/transport.js,common.js')); ?>
    <script language="JavaScript">
        <!--
        // 这里把JS用到的所有语言都赋值到这里
        <?php $_from = $this->_var['lang']['js_languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        //-->
    </script>
</head>
<body>

<h1>
    <span class="action-span1"><a href="index.php?act=main"><?php echo $this->_var['lang']['cp_home']; ?></a> </span><span id="search_id" class="action-span1"> - 功能变量</span>
    <div style="clear:both"></div>
</h1>

<?php echo $this->smarty_insert_scripts(array('files'=>'../js/utils.js,selectzone.js,colorselector.js')); ?>
<script type="text/javascript" src="../js/calendar.php?lang=<?php echo $this->_var['cfg_lang']; ?>"></script>
<link href="../js/calendar/calendar.css" rel="stylesheet" type="text/css" />
<!-- 通用信息 -->
<div class="list-div" id="listDiv">
<table width="100%" cellspacing="1" cellpadding="2" id="list-table">
  <tr>
    <th>功能名称</th>
    <th>主功能命令</th>
	<th>扩展功能命令</th>
	<th>积分赠送方式<img src="images/notice.gif" width="16" height="16" border="0" title="用户通过微信使用此功能时赠送积分"></th>
	<th>赠送分值</th>
	<th>赠送上限</th>
	<th>请求量</th>
	<th>操作</th>
  </tr>
	<?php $_from = $this->_var['keywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
  <tr>
	<td><?php echo $this->_var['item']['keyname']; ?></td>
	<td><?php echo $this->_var['item']['key']; ?></td>
	<td><?php echo $this->_var['item']['keys']; ?></td>
	<td>
	<?php if ($this->_var['item']['jf_type'] == 0): ?>无赠送<?php endif; ?>
	<?php if ($this->_var['item']['jf_type'] == 1): ?>一次性赠送<?php endif; ?>
	<?php if ($this->_var['item']['jf_type'] == 2): ?>按日赠送<?php endif; ?>
	</td>
	<td><?php echo $this->_var['item']['jf_num']; ?></td>
	<td><?php echo $this->_var['item']['jf_maxnum']; ?></td>
	<td><?php echo $this->_var['item']['clicks']; ?></td>
	<td><a href="weixin.php?act=keywords&id=<?php echo $this->_var['item']['id']; ?>"><?php echo $this->_var['lang']['edit']; ?></a></td>
  </tr>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </table>

</div>
<!-- end goods form -->
<?php echo $this->smarty_insert_scripts(array('files'=>'validator.js,tab.js')); ?>

<script language="JavaScript">
var goodsId = '<?php echo $this->_var['goods']['goods_id']; ?>';
var elements = document.forms['theForm'].elements;
var sz1 = new SelectZone(1, elements['source_select1'], elements['target_select1']);
var sz2 = new SelectZone(2, elements['source_select2'], elements['target_select2'], elements['price2']);
var sz3 = new SelectZone(1, elements['source_select3'], elements['target_select3']);
var marketPriceRate = <?php echo empty($this->_var['cfg']['market_price_rate']) ? '1' : $this->_var['cfg']['market_price_rate']; ?>;
var integralPercent = <?php echo empty($this->_var['cfg']['integral_percent']) ? '0' : $this->_var['cfg']['integral_percent']; ?>;


onload = function()
{

    if (document.forms['theForm'].elements['auto_thumb'])
    {
        handleAutoThumb(document.forms['theForm'].elements['auto_thumb'].checked);
    }

    // 检查新订单
    startCheckOrder();
    
        <?php $_from = $this->_var['user_rank_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
        set_price_note(<?php echo $this->_var['item']['rank_id']; ?>);
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        
        document.forms['theForm'].reset();
    }

    function setAttrList(result, text_result)
    {
        document.getElementById('tbody-goodsAttr').innerHTML = result.content;
    }


            
</script>
<?php echo $this->fetch('pagefooter.htm'); ?>
