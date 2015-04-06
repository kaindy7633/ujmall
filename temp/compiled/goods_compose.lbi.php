<style>
.suit_check{display: block;
padding: 6px 5px;
width: 49px;
border: 1px solid #DEDEDE;
height: 14px;
color: #666;
line-height: 14px;
border-radius: 2px;
background-color: #F6F6F6;
background-image: -moz-linear-gradient(center top , #FEFEFE, #F5F5F5);
cursor: pointer;
margin-top:20px;}
ins{position: absolute;top: 120px;left:145px;width: 13px;height: 13px;background:url(themes/68ecshop_xiaomi/images/jialogo.jpg);font-size: 0px;line-height: 0;}
</style>
<script type="text/javascript">
function check(){
var result='<?php echo $this->_var['id']; ?>,';
var fid = document.getElementById('boxOne');
var box = fid.getElementsByTagName('input');

for(var i = 0; i < box.length; i++){
           if(box[i].type == 'checkbox' && box[i].checked){
                result = result + box[i].value + ',';
           }
        }
        //在Common.js文件中添加了addToCartNums方法
        addToCartNums(result);
}
function totalPrice(){
var re = /[￥元]/g;
<?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?>
  var result='<?php echo $this->_var['goods']['promote_price']; ?>';
  result=result.replace(re,'');
<?php else: ?>
  var result=<?php echo $this->_var['goods']['shop_price']; ?>;
<?php endif; ?>
//alert(result);
var fid = document.getElementById('boxOne');
var box = fid.getElementsByTagName('input');
var j=1;
for(var i = 0; i < box.length; i++){
    if(box[i].type == 'checkbox' && box[i].checked){
  var a = box[i].name;
     result =  Number(result) +  Number(a.replace(re, ''));
     j+=1;
    }
}
result_format='￥%s元';
re_re=/\%s/g;
result_format=result_format.replace(re_re, result);
document.getElementById("totalPrice").innerHTML=result_format;
document.getElementById("totalNum").innerHTML=j;
}
</script>
<div class="peitao clearfix mt10"  id="boxOne" style="width:980px; height:180px;">
<div class="main_goods Left" style="width:125px; height:200px;">
		<div class="img"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" width="115" height="115" alt="<?php echo $this->_var['goods']['goods_name']; ?>" />
        	<div class="info">
        <strong style="font-weight:500"><?php echo $this->_var['goods']['goods_name']; ?></strong><br>
        <span>本店价:</span>
        <?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?>
      <span class="red yen"><?php echo $this->_var['goods']['promote_price']; ?></span>
        <?php else: ?>
        <span class="red yen" style="font-weight:bold;"><?php echo $this->_var['goods']['shop_price']; ?></span>
        <?php endif; ?><br>
        <br/></div></div>
        <ins>+</ins>
   </div>
	<div class="extra_goods Right" style="width:780px;">
    <div class="overflow" style="width:780px;">
         <div class="stage"  style="width:780px; height:170px; overflow-x:scroll;">
        <table>
            <tr>
				<?php $_from = $this->_var['related_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'releated_goods_data_0_09907900_1427469383');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['releated_goods_data_0_09907900_1427469383']):
        $this->_foreach['name']['iteration']++;
?>	
                  <td>
				   <div class="list">
					<div class="img_box"><a href="<?php echo $this->_var['releated_goods_data_0_09907900_1427469383']['url']; ?>" title="<?php echo $this->_var['releated_goods_data_0_09907900_1427469383']['goods_name']; ?>" target="_blank"><img src="<?php echo $this->_var['releated_goods_data_0_09907900_1427469383']['goods_thumb']; ?>" alt="<?php echo $this->_var['releated_goods_data_0_09907900_1427469383']['goods_name']; ?>" width="100" height="100" /></a></div><div class="info" style="margin-left: 5px;width: 122px; float:right"><?php echo sub_str($this->_var['releated_goods_data_0_09907900_1427469383']['goods_name'],10); ?><br/>
         <span class="red yen"><strong style="float: left;color: #E60012;line-height: 24px;"><?php if ($this->_var['releated_goods_data_0_09907900_1427469383']['promote_price'] != 0): ?>
		<?php echo $this->_var['releated_goods_data_0_09907900_1427469383']['formated_promote_price']; ?>
		<?php else: ?>
		<?php echo $this->_var['releated_goods_data_0_09907900_1427469383']['shop_price']; ?>
		<?php endif; ?></strong></span><br /><br />
        <span class="suit_check" style="margin-top:5px;"><input type="checkbox" style="background:#fff" name="<?php if ($this->_var['releated_goods_data_0_09907900_1427469383']['promote_price'] != 0): ?><?php echo $this->_var['releated_goods_data_0_09907900_1427469383']['promote_price']; ?><?php else: ?><?php echo $this->_var['releated_goods_data_0_09907900_1427469383']['shop_price']; ?><?php endif; ?>" value="<?php echo $this->_var['releated_goods_data_0_09907900_1427469383']['goods_id']; ?>"  onClick="totalPrice()" checked=checked />&nbsp;&nbsp;搭配</span>
		
						</div>
					</div>
				</td>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</tr></table>
		</div>
        <div class="pt_result " style="display:block; margin-top:20px;">
 <span id="JS_pt_activity_goods">搭配购买更便捷</span>
		&nbsp;<span class="bold">总价：<span class="red yen f16" id="totalPrice"></span></span>
&nbsp;<a href="javascript:;" class="g2_btn1" onclick="check()" style="COLOR: #fff; ">&nbsp;加入购物车&nbsp;&nbsp;&nbsp;&nbsp;</a>
</div>
     </div>
	</div>
</div>
<script>totalPrice();</script>