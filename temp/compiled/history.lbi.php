
<?php

$GLOBALS['smarty']->assign('cainixihuan',   get_cainixihuan()); //猜你喜欢
?>
<?php if ($this->_var['cainixihuan']): ?>
<script type="text/javascript" src="themes/68ecshop_xiaomi/js/scrollpic.js"></script>
<DIV class=w style="width:1210px;">
<DIV id=product-track style="border-top: 2px solid #999;margin-top:10px;overflow: hidden;">
  <DIV class=right style="margin:0; padding:0; float:right;width: 1000px;">
    <DIV class="m m2" id=maybe-like style="border-width: 0px 1px 1px;border-style: solid;border-color: #DDD;">
      <DIV class=mt  style=" background:none;border-width: 0px;padding: 0px;height: 28px;">
        <H2>根据浏览猜你喜欢</H2>
        <DIV class=extra></DIV>
      </DIV>
      <DIV class=mc  style="border-width: 0px;margin-top: 10px;overflow: hidden;position: relative;height: 250px;">
        
        <a class="guess-control" id="guess-forward" style="display: block;z-index: 1;background: url(themes/68ecshop_xiaomi/images/l.png);overflow: hidden;width: 45px;
cursor: pointer;text-indent: -9999px;background-repeat: no-repeat;position: absolute;top: 100px;height: 50px;">&lt;</a><a class="guess-control" id="guess-backward"  style="display: block;z-index: 1;background:url(themes/68ecshop_xiaomi/images/r.png);overflow: hidden;width: 45px;
cursor: pointer;text-indent: -9999px;background-repeat: no-repeat;position: absolute;top: 100px;height: 50px;right: 10px;
left: auto;">&gt;</a>
        <div id="guess-scroll" >
 <ul class="lh" style="float:left;">
 <?php $_from = $this->_var['cainixihuan']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
   <li style="float:left; width:144px; padding:10px 20px; text-align:center">
              <div class="p-img"> <a target="_blank" title="<?php echo $this->_var['goods']['goods_name']; ?>" href="<?php echo $this->_var['goods']['url']; ?>"><img height="130" width="130" alt="<?php echo $this->_var['goods']['goods_name']; ?>" src="<?php echo $this->_var['goods']['goods_thumb']; ?>"></a></div>
              <div class="p-name"> <a target="_blank" title="<?php echo $this->_var['goods']['goods_name']; ?>" href="<?php echo $this->_var['goods']['url']; ?>"><?php echo sub_str($this->_var['goods']['goods_name'],20); ?></a> </div>
              <div class="p-comm"> <span class="star sa5"></span><br/>
                <a target="_blank" href="<?php echo $this->_var['goods']['url']; ?>">(已有<?php echo $this->_var['goods']['evaluation']; ?>人评价)</a> </div>
              <div class="p-price"> <strong ><?php echo $this->_var['goods']['shop_price']; ?></strong> </div>
            </li>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
        </DIV>
      </DIV>
      </DIV>
      <script language=javascript type=text/javascript>

		var scrollPic_01 = new ScrollPic();
		scrollPic_01.scrollContId   = "guess-scroll"; //内容容器ID
		scrollPic_01.arrLeftId      = "guess-forward";//左箭头ID
		scrollPic_01.arrRightId     = "guess-backward"; //右箭头ID
if(pageConfig.wideVersion&&pageConfig.compatible){
	scrollPic_01.frameWidth     = 908;//显示框宽度
	scrollPic_01.pageWidth      = 184; //翻页宽度
	}else{
		scrollPic_01.frameWidth     = 710;//显示框宽度
		scrollPic_01.pageWidth      = 173; //翻页宽度
		}
		scrollPic_01.speed          = 10; //移动速度(单位毫秒，越小越快)
		scrollPic_01.space          = 10; //每次移动像素(单位px，越大越快)
		scrollPic_01.autoPlay       = true; //自动播放
		scrollPic_01.autoPlayTime   = 3; //自动播放间隔时间(秒)

		scrollPic_01.initialize(); //初始化

</script>
    
    </DIV>
    <DIV class=left style="padding: 0px;float: left;margin: 0px;width: 210px;">
      <DIV class="m m2" id=recent-view-track  style="border-right:none; border-top:none;">
        <DIV class=mt>
          <H2>最近浏览</H2>
        </DIV>
        <DIV class=mc style="border-width: 0px;margin-top: 10px;overflow: hidden;position: relative;height: 250px;">
          <ul id='history_list' style="overflow-y: auto;height: 250px;">
          <?php 
$k = array (
  'name' => 'history',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>
          <li style="text-align:right;"><span ><a onclick="clear_history()" href="javascript:void(0);" style="color:#005AA0;">清空最近浏览商品>>&nbsp;</a></span></li>
          </ul>
         
        </DIV>
      </DIV>
      </DIV>
    <SPAN class=clr></SPAN></DIV>
</DIV>

<script type="text/javascript">
if (document.getElementById('history_list').innerHTML.replace(/\s/g,'').length<1)
{
    document.getElementById('history_div').style.display='none';
}
else
{
    document.getElementById('history_div').style.display='block';
}
function clear_history()
{
Ajax.call('user.php', 'act=clear_history',clear_history_Response, 'GET', 'TEXT',1,1);
}
function clear_history_Response(res)
{
document.getElementById('history_list').innerHTML = '<?php echo $this->_var['lang']['no_history']; ?>';
}
</script> 
<?php endif; ?>