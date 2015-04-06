<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" /><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<title><?php echo $this->_var['page_title']; ?></title>




<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />

<link rel="stylesheet" href="themes/68ecshop_xiaomi/css/tuangou.min.css" type="text/css" media="screen" charset="utf-8" />
<link href="themes/68ecshop_xiaomi/css/search_table2.css" rel="stylesheet" type="text/css">
<script language="javascript"> 
<!--
/*屏蔽所有的js错误*/
function killerrors() { 
return true; 
} 
window.onerror = killerrors; 
//-->
</script>

<?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,common.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.6.2.min.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>
<script type="text/javascript" src="themes/68ecshop_xiaomi/js/libs/jquery18.js" ></script>
</head>
<body style="background:none">
<script type="text/javascript">(function(){var screenWidth=window.screen.width;if(screenWidth>=1280){document.body.className="root_body";window.LOAD=true;}else{window.LOAD=false;}})()</script>
<script >
var Tday = new Array();
var daysms = 24 * 60 * 60 * 1000
var hoursms = 60 * 60 * 1000
var Secondms = 60 * 1000
var microsecond = 1000
var DifferHour = -1
var DifferMinute = -1
var DifferSecond = -1
function clock(key)
{
   var time = new Date()
   var hour = time.getHours()
   var minute = time.getMinutes()
   var second = time.getSeconds()
   var timevalue = ""+((hour > 12) ? hour-12:hour)
   timevalue +=((minute < 10) ? ":0":":")+minute
   timevalue +=((second < 10) ? ":0":":")+second
   timevalue +=((hour >12 ) ? " PM":" AM")
   var convertHour = DifferHour
   var convertMinute = DifferMinute
   var convertSecond = DifferSecond
   var Diffms = Tday[key].getTime() - time.getTime()
   DifferHour = Math.floor(Diffms / daysms)
   Diffms -= DifferHour * daysms
   DifferMinute = Math.floor(Diffms / hoursms)
   Diffms -= DifferMinute * hoursms
   DifferSecond = Math.floor(Diffms / Secondms)
   Diffms -= DifferSecond * Secondms
   var dSecs = Math.floor(Diffms / microsecond)
  
   if(convertHour != DifferHour) a=DifferHour+"</font>天";
   if(convertMinute != DifferMinute) b=DifferMinute+"</font>时";
   if(convertSecond != DifferSecond) c=DifferSecond+"</font>分"
     d=dSecs+"</font>秒"
     if (DifferHour>0) {a=a}
     else {a=''}
   document.getElementById("leftTime"+key).innerHTML = a + b + c + d; //显示倒计时信息


}
</script>

<?php echo $this->fetch('library/page_header.lbi'); ?>
	<div class="tugouWrap w" style="width:1190px; margin:0 auto;">
	<div class="tg_pos"><span class="pos_icon"></span> <?php echo $this->fetch('library/ur_here.lbi'); ?> </div>
<DIV class="tuan_list_container clearfix" id=tuan_list >
 <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
        $this->_foreach['name']['iteration']++;
?>
        <?php if ($this->_var['goods']['goods_name'] != ''): ?>
    <DIV class="tg_list" >
<DIV class=tg_goods onmouseover="this.className='tg_goods active';" 
onmouseout="this.className='tg_goods';">
<P class=name><A title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" 
href="pro_goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target=_blank><?php echo sub_str($this->_var['goods']['goods_name'],15); ?></A> </P>
<P class=tg_pic><A title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" 
href="pro_goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target=_blank><IMG 
height=176 alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" width=176 
src="<?php echo $this->_var['goods']['goods_img']; ?>"></A> 
<SPAN class=tg_info><SPAN class=Left  id="leftTime<?php echo $this->_var['key']; ?>"><?php echo $this->_var['lang']['please_waiting']; ?></SPAN>
<SPAN 
class=Right>已团购：<B><?php echo $this->_var['goods']['count1']; ?></B>件</SPAN></SPAN> </P><A 
class="delstl gogo <?php if ($this->_var['goods']['goods_number'] == 0): ?>over<?php endif; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" 
href="pro_goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target=_blank><STRONG 
class=yen><?php echo $this->_var['goods']['promote_price']; ?></STRONG><SPAN style=" color:#fff;"><em style="background:url(themes/68ecshop_xiaomi/images/discount.png) no-repeat; width:51px; height:17px; line-height:17px;display: block;padding-left: 10px;"><B><?php echo $this->_var['goods']['zhekou']; ?></B>折</em> <BR><I style="color:#999; padding-top:5px;"><?php echo $this->_var['goods']['shop_price']; ?></I></SPAN></A> 
</DIV>
   <?php if ($this->_var['goods']['is_shipping']): ?>
  <P class="icon bwl"></P>
   <?php endif; ?>
</DIV>
<script>
Tday[<?php echo $this->_var['key']; ?>] = new Date("<?php echo $this->_var['goods']['gmt_end_time']; ?>");  
window.setInterval(function()    
{clock(<?php echo $this->_var['key']; ?>);}, 1000);    
</script>

<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

<div style="height:0px; line-height:0px; clear:both"></div>
<div style="float:right; margin-right:24px;">	
<?php echo $this->fetch('library/pages.lbi'); ?>
</div></div>

</div>


<?php echo $this->fetch('library/page_footer.lbi'); ?>
    


</body>
</html>
