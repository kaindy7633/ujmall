<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title><?php echo $this->_var['page_title']; ?></title>
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<script src="themesmobile/68ecshopcom_mobile/js/modernizr.js"></script>
<link rel="stylesheet" href="themesmobile/68ecshopcom_mobile/css/ecsmart.css">
<script type="text/javascript" src="themesmobile/68ecshopcom_mobile/js/jquery.js"></script>
<script type="text/javascript" src="themesmobile/68ecshopcom_mobile/js/ecsmart.js"></script>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,utils.js,shopping_flow.js')); ?>
</head>
<body>
<header id="header" class='header'>
<h1><?php if ($this->_var['step'] == 'cart'): ?>购物车<?php elseif ($this->_var['step'] == 'login'): ?>登录<?php elseif ($this->_var['step'] == 'consignee'): ?>填写收货地址<?php elseif ($this->_var['step'] == 'checkout'): ?>确认订单<?php elseif ($this->_var['step'] == 'done'): ?>提交订单<?php endif; ?></h1>
<a href="javascript:history.back(-1)" class="back">返回</a>
</header>
<div id="tbh5v0">
<div class="screen-wrap fullscreen login">
<?php if ($this->_var['step'] == 'cart'): ?>
<div class="step_flow">
  <ul>
    <li class="current">1.购物车列表</li>
    <li>2.确认订单</li>
    <li>3.购买成功</li>
  </ul>
</div>
<?php if ($this->_var['goods_list']): ?>


<section class="cart_floor">
  <div id="J_promoteWrapper1">
  <form id="formCart" name="formCart" method="post" action="flow.php">
    <ul id="J_itemList_ul">
    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['name']['iteration']++;
?>
     <li class="J_item">
     <a class="shanchu" href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_goods&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; "></a>
        <div class="J_moveRight">
          <label>
          <div> <a class="img_wrap J_ytag cartlist" href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><img width="100%" height="100%" src="<?php echo $this->_var['goods']['goods_thumb']; ?>"></a>
            <div class="gd_info">
              <p class="name"><?php echo $this->_var['goods']['goods_name']; ?></p>
              <p class="promotion"><?php if ($this->_var['goods']['goods_attr']): ?><?php echo $this->_var['goods']['goods_attr']; ?><?php endif; ?></p>
              <p class="value"><span class="price"><?php echo $this->_var['goods']['goods_price']; ?></span></p>
              <div class="act_wrap"> 
                <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['is_gift'] == 0 && $this->_var['goods']['parent_id'] == 0): ?>
                    	                
		<a href="javascript:;" onclick="minus_num(<?php echo $this->_var['goods']['rec_id']; ?>,<?php echo $this->_var['goods']['goods_id']; ?>);" id="jiannum<?php echo $this->_var['goods']['rec_id']; ?>"  class="J_reduce add y_hover <?php if ($this->_var['goods']['goods_number'] < 2): ?>btn_disabled<?php endif; ?> J_ytag"></a><input type="text" onKeyDown='if(event.keyCode == 13) event.returnValue = false' name="goods_number[<?php echo $this->_var['goods']['rec_id']; ?>]" id="goods_number_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>" class="num"  onblur="change_price(<?php echo $this->_var['goods']['rec_id']; ?>,<?php echo $this->_var['goods']['goods_id']; ?>)"/><input type="hidden" id="hidden_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>"><a href="javascript:;" onclick='javascript:add_num(<?php echo $this->_var['goods']['rec_id']; ?>,<?php echo $this->_var['goods']['goods_id']; ?>)' class="J_add add y_hover reduce  J_ytag"></a>
		
              <div align="right" bgcolor="#ffffff" id="subtotal_<?php echo $this->_var['goods']['rec_id']; ?>"><?php echo $this->_var['goods']['subtotal']; ?></div>
	     
 <?php else: ?>
			<?php echo $this->_var['goods']['goods_number']; ?>
				<?php endif; ?>
                </div>
                
            </div>
            
          </div>
          </label>
        </div>
      </li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
     </ul>
<input type="hidden" name="step" value="update_cart">
                
</form>
  </div>
  
</section>


<script>
	  function add_num(rec_id,goods_id)
	 {
		document.getElementById("goods_number_"+rec_id+"").value++;
		if(document.getElementById("goods_number_"+rec_id+"").value > 1)
		{
			document.getElementById("jiannum"+rec_id).className = 'J_reduce add y_hover J_ytag';
			}else
			{
			document.getElementById("jiannum"+rec_id).className = 'J_reduce add y_hover J_ytag btn_disabled';
			}
		var number = document.getElementById("goods_number_"+rec_id+"").value;
		Ajax.call('flow.php', 'step=update_group_cart&rec_id=' + rec_id +'&number=' + number+'&goods_id=' + goods_id, changePriceResponse, 'GET', 'JSON');
	 }

	function minus_num(rec_id,goods_id)
	{
		if (document.getElementById("goods_number_"+rec_id+"").value>1)
		{
			document.getElementById("goods_number_"+rec_id+"").value--;
			if(document.getElementById("goods_number_"+rec_id+"").value > 1)
		{
			document.getElementById("jiannum"+rec_id).className = 'J_reduce add y_hover J_ytag';
			}else
			{
			document.getElementById("jiannum"+rec_id).className = 'J_reduce add y_hover J_ytag btn_disabled';
			}
		}
		var number = document.getElementById("goods_number_"+rec_id+"").value;
		Ajax.call('flow.php', 'step=update_group_cart&rec_id=' + rec_id +'&number=' + number+'&goods_id=' + goods_id, changePriceResponse, 'GET', 'JSON');
	}

function change_price(rec_id,goods_id)
{
	var r = /^[1-9]+[0-9]*]*$/;
	var number = document.getElementById("goods_number_"+rec_id+"").value;
	if (!r.test(number))
	{
		alert("您输入的格式不正确！");
		document.getElementById("goods_number_"+rec_id+"").value=document.getElementById("hidden_"+rec_id+"").value;
	}
	else
	{
		Ajax.call('flow.php','step=update_group_cart&rec_id=' + rec_id +'&number=' + number+'&goods_id=' + goods_id, changePriceResponse, 'GET', 'JSON');
	}
}

function changePriceResponse(result)
{
if(result.error == 1)
{
	alert(result.content);
	document.getElementById("goods_number_"+result.rec_id+"").value =result.number;
	document.getElementById("hidden_"+result.rec_id+"").value =result.number;
}
else
{
	document.getElementById("hidden_"+result.rec_id+"").value =result.number;
	document.getElementById('cart_amount_desc').innerHTML = result.cart_amount_desc;//购物车商品总价说明
	show_div_text = "恭喜您！ 商品数量修改成功！ ";

}

}
</script>



<?php if ($this->_var['fittings_list']): ?>
<div class="content2" style="background:#f5f5f5; padding-bottom:50px;">
       <div class="sameShop">
                <h4>商品相关配件</h4>
                <ul>
                    <li>
                     <?php $_from = $this->_var['fittings_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'fittings');$this->_foreach['fittings_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fittings_list']['total'] > 0):
    foreach ($_from AS $this->_var['fittings']):
        $this->_foreach['fittings_list']['iteration']++;
?>
                            <a href="<?php echo $this->_var['fittings']['url']; ?>" style="margin-bottom:10px;">
                                <img src="<?php echo $this->_var['option']['static_path']; ?><?php echo $this->_var['fittings']['goods_thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['fittings']['goods_name']); ?>">
                                <span><?php echo $this->_var['fittings']['shop_price']; ?></span>
                            </a>
                          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 	
                    </li>
                </ul>
       </div>  
</div>
<?php endif; ?>

<section class="cart">
  <div class="section_wrap cart_buy">
    <div id="J_wrapperCartTop">
      <p>总计（不含运费）</p>
      <p class="price y_pf"><b id="cart_amount_desc"><?php echo $this->_var['shopping_money']; ?></b></p>
      <a href="flow.php?step=checkout" class="btn_buy J_submitCart y_hover J_ytag">去结算</a> 
    </div>
  </div>
</section>       
<?php else: ?>
<section id="cart-content">
    <div class="qb_tac" style="padding:50px 0"><img src="themesmobile/68ecshopcom_mobile/img/icon_cart_empty.png" width="100" height="95"><br>购物车还没有加入过商品哦</div>
    <div class="qb_gap" style="width:60%; margin:0 auto;"><a href="./" class="mod_btn btn_strong" >马上逛逛</a></div>
</section>
<?php echo $this->fetch('library/footer_nav.lbi'); ?>
<script language="javascript">
$(function(){ 
$('input[type=text],input[type=password]').bind({ 
focus:function(){ 
 $(".global-nav").css("display",'none'); 
}, 
blur:function(){ 
 $(".global-nav").css("display",'flex'); 
} 
}); 
}) 
</script>
<?php endif; ?>
<?php endif; ?>


<?php if ($this->_var['step'] == 'login'): ?>
<div class="step_flow">
  <ul>
    <li >1.购物车列表</li>
    <li class="current">2.确认订单</li>
    <li>3.购买成功</li>
  </ul>
</div>
<style>
body {background-color: #ffffff !important;}</style>
<script>
      $().ready(function(){
          //登录切换
          $("#logRegTab li").bind("click", function () {
              if (this.id == "mob_log") {
                  $("#mob_log").removeClass("currl");
                  $("#acc_log").addClass("currr");
                  $("#phonearea").removeClass("hide");
                  $("#accountarea").addClass("hide");
              } else {
                  $("#acc_log").removeClass("currr");
                  $("#mob_log").addClass("currl");
                  $("#phonearea").addClass("hide");
                  $("#accountarea").removeClass("hide");
              }
			  $(".btn_log").css("color","#FFFEFE");
          });
	  });
  </script>
          <?php echo $this->smarty_insert_scripts(array('files'=>'user.js')); ?>
        <script type="text/javascript">
        <?php $_from = $this->_var['lang']['flow_login_register']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        
        function checkLoginForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          return true;
        }

        function checkSignupForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.trim(frm.elements['username'].value).match(/^\s*$|^c:\\con\\con$|[%,\'\*\"\s\t\<\>\&\\]/))
          {
            alert(username_invalid);
            return false;
          }

          if (Utils.isEmpty(frm.elements['email'].value)) {
            alert(email_not_null);
            return false;
          }

          if (!Utils.isEmail(frm.elements['email'].value)) {
            alert(email_invalid);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          if (frm.elements['password'].value.length < 6) {
            alert(password_lt_six);
            return false;
          }

          if (frm.elements['password'].value != frm.elements['confirm_password'].value) {
            alert(password_not_same);
            return false;
          }
          return true;
        }
        
        </script>
 <div class="m311 log_reg_box">
    <ul class="tab" id="logRegTab">
      <li id="mob_log" class="curr"><span><font>登录</font></span></li>
      <li id="acc_log" class="curr currr"><span><font>免费注册</font></span></li>
    </ul>
    
    <div id="logRegTabCon">
      <div class="log_reg_item" id="phonearea"> 
        
    <section class="innercontent" >

      <form action="flow.php?step=login" name="loginForm" id="loginForm" onsubmit="return checkLoginForm(this)" method="post" class="c-form login-form">
        <fieldset>
          <div class="field username">
            <div class="c-form-search">
              <input type="text" name="username" placeholder="请输入用户名/邮箱" value=""/>
            </div>
          </div>
          <div class="field pwd">
            <input type="password" name="password" placeholder="密码" class="c-form-txt-normal"/>
          </div>
              <?php if ($this->_var['enabled_register_captcha']): ?>
                    <div class="field identifyCode">
                        <div class="c-form-search">
                            <div class="codeTxt">
                            <input type="text" name="captcha" placeholder="验证码" class="c-f-text"/>
                          
                            </div>
                            <div class="codePhoto">
                            <img class="check-code-img" src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="<?php echo $this->_var['lang']['comment_captcha']; ?>"  title="<?php echo $this->_var['lang']['captcha_tip']; ?>" onClick="this.src='captcha.php?is_login=1&'+Math.random()" height="35"/></div>
                        </div>
                        
                    </div>
                    <?php endif; ?>
                    

          <div class="field submit-btn">
            <input type="submit" class="c-btn-oran-big1" onclick="member_login()" value="登 录">
            
            <input type="hidden" name="act" value="act_login">
			<input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>">
          </div>
          <div class="field">
            <label class="bf1 login_ffri"><input type="checkbox" name="remember" value="1" checked="" >&nbsp;保存登录信息</label>
            
               <a class="login_ffleft" href="user.php?act=get_password">找回密码</a>

          <?php if ($this->_var['anonymous_buy'] == 1): ?><div style="height:10px; line-height:10px; clear:both"></div>
                
<div class="tips" style="margin-top:20px;">
				<a href="flow.php?step=consignee&amp;direct_shopping=1" class="big">不打算登录，直接购买</a>
			</div>
            
           </div><?php endif; ?>
<div style="height:20px; line-height:20px; clear:both"></div>
  <div class="field">

          <div style="height:10px; line-height:10px; clear:both"></div>
           	使用合作网站账号登录：
           </div>
           <div class="signIn_coo" >
       <ul class="coo_panel cssBox">
                
                    <li class="box_flex_1">
                        <a href="user.php?act=oath&type=qq"><div class="btn_qq" ></div></a>
                    </li>
                    <li class="box_flex_1">
                        <a href="user.php?act=oath&type=alipay"><div class="btn_alipay" ></div></a>
                    </li>
                    <li class="box_flex_1">
                        <a href="user.php?act=oath&type=weibo"><div class="btn_weibo"></div></a>
                    </li>
                 
                   </ul>
		</div>
        
            <input name="act" type="hidden" value="signin" />
        </fieldset>
      </form>
    </section>
    

      </div>
      <div class="log_reg_item hide" id="accountarea"> 
      <section class="innercontent">

<form action="flow.php?step=login" method="post"  name="formUser" id="registerForm" onsubmit="return checkSignupForm(this)" >
<fieldset>
<div class="field username">
<div class="c-form-search st" style="background-position: 7px 10px;">
<input type="text" name="username" id="username" placeholder="账户名" class="c-f-text"  onblur="is_registered(this.value);"/>
                        </div>
                        <div class="tips" ><span id="username_notice"></span></div>
                    </div>
                     <div class="field email">
                        <div class="c-form-search st">
                            <input type="email" name="email" placeholder="邮箱地址" value="" class="c-f-text" id="email" onblur="checkEmail(this.value);"  />
                        </div>
                        <div class="tips"><span id="email_notice"></span></div>
                    </div>
                    
                 
                    <div class="field pwd">
                        <div class="ptxt st">
                            <input type="password" name="password" id="password1" onblur="check_password(this.value);" value="" placeholder="密码" class="c-f-text"/>
                        </div>
                        <div class="tips"><span id="password_notice"> </span></div>
                    </div>
                     <div class="field pwd">
                        <div class="ptxt st">
                            <input type="password" name="confirm_password" id="conform_password" onblur="check_conform_password(this.value);" value="" placeholder="确认密码" class="c-f-text">
                        </div>
                         <div class="tips"><span id="conform_password_notice"> </span></div>
                    </div>
                 
                    <?php if ($this->_var['enabled_register_captcha']): ?>
                    <div class="field identifyCode">
                        <div class="c-form-search">
                            <div class="codeTxt">
                                <input name="captcha" type="text" value="" placeholder="验证码" class="c-f-text">
                            </div>
                            <div class="codePhoto">
                                <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="<?php echo $this->_var['lang']['comment_captcha']; ?>" title="<?php echo $this->_var['lang']['captcha_tip']; ?>" onClick="this.src='captcha.php?'+Math.random()" height="35" class="check-code-img"/>
                            </div>
                        </div>
                        
                    </div>
                    <?php endif; ?>
                    <div class="field submit-btn">
            <input type="checkbox" style="display:none" name="agreement" value="1" checked="checked" required>
                        <input type="submit" class="c-btn-orange" value="注 册">
                    <input name="act" type="hidden" value="signup" />
                        
                    </div>

                </fieldset>
       </form> 
</section>
         
      </div>
    </div>
    
  </div>
<?php endif; ?>

<?php if ($this->_var['step'] == 'consignee'): ?>

<div class="step_flow  ">
  <ul >
    <li >1.购物车列表</li>
    <li class="current">2.确认订单</li>
    <li>3.购买成功</li>
  </ul>
  </div>
 
   <?php echo $this->smarty_insert_scripts(array('files'=>'region.js')); ?>
        <script type="text/javascript">
          region.isAdmin = false;
          <?php $_from = $this->_var['lang']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

          
          onload = function() {
            if (!document.all)
            {
              document.forms['theForm'].reset();
            }
          }
          
        </script>
  
   <?php $_from = $this->_var['consignee_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('sn', 'consignee');if (count($_from)):
    foreach ($_from AS $this->_var['sn'] => $this->_var['consignee']):
?>
		<?php if (! $this->_var['consignee']['consignee']): ?><a href="javascript:void(0);" class="textlink fl">新增收货地址+</a><div class="clearfix"></div><?php endif; ?>
        <form action="flow.php" method="post" name="theForm" id="theForm" onsubmit="return checkConsignee(this)">
      	<?php echo $this->fetch('library/consignee.lbi'); ?>           
		</form>	
   <div style=" height:10px; line-height:10px; clear:both;"></div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<script type="text/javascript">
<?php $_from = $this->_var['lang']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</script>

<?php endif; ?>
<?php if ($this->_var['step'] == 'checkout'): ?>
<div class="step_flow">
  <ul>
    <li >1.购物车列表</li>
    <li class="current">2.确认订单</li>
    <li>3.购买成功</li>
  </ul>
  </div>
 <form action="flow.php" method="post" name="theForm" id="theForm" onsubmit="return checkOrderForm(this)">
  <script type="text/javascript">
        var flow_no_payment = "<?php echo $this->_var['lang']['flow_no_payment']; ?>";
        var flow_no_shipping = "<?php echo $this->_var['lang']['flow_no_shipping']; ?>";
  </script>
<div class="content ptop0">
<div class="panel panel-default info-box">
    <div class="panel-heading">
      <h3 class="panel-title" style="border:none; padding:0; margin:0; height:22px; line-height:22px;"><span class="icon-info"></span>收货信息</h3>
    </div>
    
    <div class="panel-body info-address">
      <div class="title">
        <a href="flow.php?step=consignee" style="display:block; color:#333333">
          <span class="i-icon-arrow-right"></span>
          <span class="text">收货人：<font style="font-weight:bold; font-size:14px;"><?php echo htmlspecialchars($this->_var['consignee']['consignee']); ?></font></span><span class="address_phone"><?php echo $this->_var['consignee']['tel']; ?></span>
          <p class="text-limit">地址：<?php echo htmlspecialchars($this->_var['consignee']['address']); ?></p>              
        </a>
      </div>
    </div>
   <div class="panel-body">
      <div class="title" id="timetitle" style="border-bottom:#eeeeee 1px solid;">
        <span class="i-icon-arrow-down" id="showip"></span>
                <span class="text" id="peisongtime">送货时间不限</span>
              </div>
            
      <ul class="nav nav-list-sidenav" id="show68" style="display:none;">
        <li><span class="icon-radio active"></span><p>送货时间不限</p></li>
        <li><span class="icon-radio "></span><p>只双休日/节假日送货(工作日不用送)</p></li>
        <li><span class="icon-radio "></span><p>只工作日(双休日/节假日不用送)</p></li>
	  </ul>
        <input name='best_time'  id="best_time" value="送货时间不限" type="hidden" >
    </div> 
    
  </div>

			  <div class="panel panel-default info-box">
              <div class="panel-heading">
      <h3 class="panel-title" style="border:none; padding:0; margin:0; height:22px; line-height:22px;"><span class="icon-pay"></span>配送/支付</h3>
    </div>
            <?php if ($this->_var['total']['real_goods_count'] != 0): ?>
          
    

    <div class="panel-body">
    
      <div class="title" id="peisongtitle" style="border-bottom:1px solid #eeeeee;">
        <span class="i-icon-arrow-down" id="peisongip"></span>
                <span class="text">配送方式</span><a href="javascript:void(0)" title="<?php echo $this->_var['lang']['modify']; ?><?php echo $this->_var['lang']['goods_list']; ?>" class="link">必选</a><em class="qxz" id="empeisong">请选择配送方式</em>
              </div>
      <ul class="nav nav-list-sidenav" id="peisong68" style="display:none;">
            <?php $_from = $this->_var['shipping_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');$this->_foreach['shipping_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['shipping_list']['total'] > 0):
    foreach ($_from AS $this->_var['shipping']):
        $this->_foreach['shipping_list']['iteration']++;
?>
						
                        <li>
                        <label for="shipping_method_<?php echo $this->_var['shipping']['shipping_id']; ?>"><input name="shipping" type="radio" value="<?php echo $this->_var['shipping']['shipping_id']; ?>" <?php if ($this->_var['order']['shipping_id'] == $this->_var['shipping']['shipping_id']): ?>checked="true"<?php endif; ?> supportCod="<?php echo $this->_var['shipping']['support_cod']; ?>" insure="<?php echo $this->_var['shipping']['insure']; ?>" onclick="selectShipping(this)"/><?php echo $this->_var['shipping']['shipping_name']; ?></label>
                        <?php if ($this->_var['shipping']['shipping_fee'] != 0): ?><?php echo $this->_var['shipping']['format_shipping_fee']; ?><?php else: ?><?php echo $this->_var['lang']['free']; ?><?php endif; ?>
					</li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                       <!--配送保价 <li><label for="ECS_NEEDINSURE" class="ralabel">
                        	<input class="pay-radio" type="checkbox" name="need_insure" value="1" id="ECS_NEEDINSURE" onclick="selectInsure(this.checked)"  <?php if ($this->_var['order']['need_insure']): ?>checked="true"<?php endif; ?>  style="margin-top:6px"/><?php echo $this->_var['lang']['need_insure']; ?>
                            </label>
                         </li>-->
                         
 
	  </ul>
      
      
              
    </div>

 <?php else: ?>
				<input type="hidden" name="shipping" value="-1" checked="checked"/>
				<?php endif; ?>
                
               <?php if ($this->_var['is_exchange_goods'] != 1 || $this->_var['total']['real_goods_count'] != 0): ?>  
             <div class="panel-body">
    
      <div class="title" id="zhifutitle" style="border-bottom:1px solid #eeeeee;">
        <span class="i-icon-arrow-down" id="zhifuip"></span>
                <span class="text">支付方式</span><a href="javascript:void(0)" title="<?php echo $this->_var['lang']['modify']; ?><?php echo $this->_var['lang']['goods_list']; ?>" class="link">必选</a><em class="qxz" id="emzhifu">请选择支付方式</em>
              </div>
      <ul class="nav nav-list-sidenav" id="zhifu68" style="display:none;">
                <?php if ($this->_var['iswei']): ?>
         <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
<?php if ($this->_var['payment']['pay_id'] == "6" || $this->_var['payment']['pay_id'] == "4" || $this->_var['payment']['pay_id'] == "3"): ?>	

						<li><label for="payment_method_<?php echo $this->_var['payment']['pay_id']; ?>" ><input type="radio" name="payment" value="<?php echo $this->_var['payment']['pay_id']; ?>" <?php if ($this->_var['order']['pay_id'] == $this->_var['payment']['pay_id']): ?> checked="checked"<?php endif; ?> isCod="<?php echo $this->_var['payment']['is_cod']; ?>" onclick="selectPayment(this)" <?php if ($this->_var['cod_disabled'] && $this->_var['payment']['is_cod'] == "1"): ?>disabled="true"<?php endif; ?> class="pay-radio" style="margin-top:6px"/><?php echo $this->_var['payment']['pay_name']; ?>
							</label><?php echo $this->_var['payment']['format_pay_fee']; ?>
						</li>
                        <?php endif; ?>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				
                        
                      <?php else: ?>
                          <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
                        <?php if ($this->_var['payment']['pay_id'] != "6"): ?>
                        <li>
							<label for="payment_method_<?php echo $this->_var['payment']['pay_id']; ?>" class="ralabel">		
								<input type="radio" name="payment" value="<?php echo $this->_var['payment']['pay_id']; ?>" <?php if ($this->_var['order']['pay_id'] == $this->_var['payment']['pay_id']): ?> checked="checked"<?php endif; ?> isCod="<?php echo $this->_var['payment']['is_cod']; ?>" onclick="selectPayment(this)" <?php if ($this->_var['cod_disabled'] && $this->_var['payment']['is_cod'] == "1"): ?>disabled="true"<?php endif; ?> class="pay-radio"/><?php echo $this->_var['payment']['pay_name']; ?>
							</label>	
						</li>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        <?php endif; ?>
                </ul> 
      
      
              
    </div>

   
                
            <?php else: ?>
				<input type="radio" name="payment" value="-1" checked="checked" style="display:none"/>
				<?php endif; ?>       
 <?php if ($this->_var['inv_content_list']): ?>
 <div class="panel-body">
    
      <div class="title" id="fapiaotitle" style="border-bottom:1px solid #eeeeee;">
        <span class="text">是否开发票</span><span class="isfapiao fr" >
            <i class="fl"></i>
            <ins>否</ins>
         </span>
              </div>
              
      <ul class="nav nav-list-sidenav" id="fapiao68" style="display:none;">
       
						<li>
                        <input type="checkbox" name="need_inv" value="1"  id="ECS_NEEDINV" style="display:none;"/>
                        <?php if ($this->_var['inv_type_list']): ?>
                        
							<?php echo $this->_var['lang']['invoice_type']; ?><select name="inv_type" disabled="disabled" id="ECS_INVTYPE" onchange="changeNeedInv()">
							<?php echo $this->html_options(array('options'=>$this->_var['inv_type_list'],'selected'=>$this->_var['order']['inv_type'])); ?></select>
							<?php endif; ?>
							<?php echo $this->_var['lang']['invoice_title']; ?>
							<input type="text" name="inv_payee" value="<?php echo $this->_var['order']['inv_payee']; ?>" disabled="disabled" class="txt1" id="ECS_INVPAYEE" onblur="changeNeedInv()"/>
                             </br></br>
                            <?php echo $this->_var['lang']['invoice_content']; ?>
							<select name="inv_content" disabled="disabled" id="ECS_INVCONTENT" onchange="changeNeedInv()">
						<?php echo $this->html_options(array('values'=>$this->_var['inv_content_list'],'output'=>$this->_var['inv_content_list'],'selected'=>$this->_var['order']['inv_content'])); ?>
							</select>
						</li>
                
 
	  </ul>
      
</div>

      <script>
      	 	$('.isfapiao').click(function(){
		    if( $(".isfapiao i").attr('class') == 'fr'){
				 $(".isfapiao i").removeClass("fr");
				 $(".isfapiao i").addClass("fl");
				 $(".isfapiao ins").html('否');
				$("#ECS_NEEDINV").attr("checked",false);
			
				document.getElementById("fapiao68").style.display="none";
	var obj        = document.getElementById('ECS_NEEDINV');
  var objType    = document.getElementById('ECS_INVTYPE');
  var objPayee   = document.getElementById('ECS_INVPAYEE');
  var objContent = document.getElementById('ECS_INVCONTENT');
  var needInv    = obj.checked ? 1 : 0;
  var invType    = obj.checked ? (objType != undefined ? objType.value : '') : '';
  var invPayee   = obj.checked ? objPayee.value : '';
  var invContent = obj.checked ? objContent.value : '';
  objType.disabled = objPayee.disabled = objContent.disabled = ! obj.checked;
  if(objType != null)
  {
    objType.disabled = ! obj.checked;
  }

  Ajax.call('flow.php?step=change_needinv', 'need_inv=' + needInv + '&inv_type=' + encodeURIComponent(invType) + '&inv_payee=' + encodeURIComponent(invPayee) + '&inv_content=' + encodeURIComponent(invContent), orderSelectedResponse, 'GET');
  
				}
				else{
				 $(".isfapiao i").removeClass("fl");
				 $(".isfapiao i").addClass("fr");
				 $(".isfapiao ins").html('是');
				 $("#ECS_NEEDINV").attr("checked",true);
					var obj        = document.getElementById('ECS_NEEDINV');
  var objType    = document.getElementById('ECS_INVTYPE');
  var objPayee   = document.getElementById('ECS_INVPAYEE');
  var objContent = document.getElementById('ECS_INVCONTENT');
  var needInv    = obj.checked ? 1 : 0;
  var invType    = obj.checked ? (objType != undefined ? objType.value : '') : '';
  var invPayee   = obj.checked ? objPayee.value : '';
  var invContent = obj.checked ? objContent.value : '';
  objType.disabled = objPayee.disabled = objContent.disabled = ! obj.checked;
  if(objType != null)
  {
    objType.disabled = ! obj.checked;
  }

  Ajax.call('flow.php?step=change_needinv', 'need_inv=' + needInv + '&inv_type=' + encodeURIComponent(invType) + '&inv_payee=' + encodeURIComponent(invPayee) + '&inv_content=' + encodeURIComponent(invContent), orderSelectedResponse, 'GET');
				$("#fapiao68").slideToggle("slow");
				document.getElementById("fapiao68").style.display="block";
			
		}
});
      </script> 
<?php endif; ?>      
    
                
                
    </div>


    
            
<div class="panel panel-default info-box">
              <div class="panel-heading">
      <h3 class="panel-title" style="border:none; padding:0; margin:0; height:22px; line-height:22px;"><span class="icon-money"></span>订单优惠</h3>
    </div>

   <?php if ($this->_var['allow_use_surplus']): ?>  
    <div class="panel-body">
    
      <div class="title" id="yuetitle" style="border-bottom:1px solid #eeeeee;">
        <span class="i-icon-arrow-down" id="yueip"></span>
                <span class="text"><?php echo $this->_var['lang']['use_surplus']; ?></span><em class="qxz" id="emyue">请选择<?php echo $this->_var['lang']['use_surplus']; ?></em>
              </div>
      <ul class="nav nav-list-sidenav" id="yue68" style="display:none;">
          	<li>
						<input type="text" name="surplus" value="<?php echo empty($this->_var['order']['surplus']) ? '0' : $this->_var['order']['surplus']; ?>" id="ECS_SURPLUS" onblur="changeSurplus(this.value)"<?php if ($this->_var['disable_surplus']): ?> disabled="disabled"<?php endif; ?> class="txt1" style="width:50px;"/>&nbsp;<?php echo $this->_var['lang']['your_surplus']; ?>&nbsp;<span class="price"><?php echo empty($this->_var['your_surplus']) ? '0' : $this->_var['your_surplus']; ?></span><span id="ECS_SURPLUS_NOTICE"></span>
			</li>
                         
 
	  </ul>
      
      
              
    </div>

   <?php endif; ?>



 <?php if ($this->_var['allow_use_integral']): ?> 
    <div class="panel-body">
    
      <div class="title" id="jifentitle" style="border-bottom:1px solid #eeeeee;">
        <span class="i-icon-arrow-down" id="jifenip"></span>
                <span class="text"><?php echo $this->_var['lang']['use_integral']; ?></span><em class="qxz" id="emjifen">请选择<?php echo $this->_var['lang']['use_integral']; ?></em>
              </div>
      <ul class="nav nav-list-sidenav" id="jifen68" style="display:none;">
         	<li>
			<input type="text" name="integral" value="<?php echo empty($this->_var['order']['integral']) ? '0' : $this->_var['order']['integral']; ?>" id="ECS_INTEGRAL" onblur="changeIntegral(this.value)" class="txt1"  style="width:50px;"/>&nbsp;<?php echo $this->_var['lang']['can_use_integral']; ?><span class="price points"><?php echo empty($this->_var['your_integral']) ? '0' : $this->_var['your_integral']; ?><?php echo $this->_var['points_name']; ?></span>&nbsp;&nbsp;<?php echo $this->_var['lang']['noworder_can_integral']; ?><?php echo $this->_var['order_max_integral']; ?><?php echo $this->_var['points_name']; ?><span id="ECS_INTEGRAL_NOTICE"></span> 
						</li>
	  </ul>
      
      
              
    </div>

  

   <?php endif; ?>
   
   

<?php if ($this->_var['allow_use_bonus']): ?>
    <div class="panel-body">
    
      <div class="title" id="hongbaotitle" style="border-bottom:1px solid #eeeeee;">
        <span class="i-icon-arrow-down" id="hongbaoip"></span>
                <span class="text">使用红包</span><em class="qxz" id="emhongbao">请选择红包</em>
              </div>
      <ul class="nav nav-list-sidenav" id="hongbao68" style="display:none;">
         	<li>
			<?php if ($this->_var['bonus_list']): ?>
								<?php echo $this->_var['lang']['select_bonus']; ?>
								<select name="bonus" onchange="changeBonus(this.value)" id="ECS_BONUS">
								<option value="0"<?php if ($this->_var['order']['bonus_id'] == 0): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['lang']['please_select']; ?></option>
								<?php $_from = $this->_var['bonus_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bonus');if (count($_from)):
    foreach ($_from AS $this->_var['bonus']):
?>
								<option value="<?php echo $this->_var['bonus']['bonus_id']; ?>"<?php if ($this->_var['order']['bonus_id'] == $this->_var['bonus']['bonus_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['bonus']['type_name']; ?>[<?php echo $this->_var['bonus']['bonus_money_formated']; ?>]</option>

								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								</select>
								<?php echo $this->_var['lang']['or']; ?><?php echo $this->_var['lang']['enter_bonus_sn']; ?>
						
							<?php endif; ?>
								<input type="text" name="bonus_sn" value="<?php echo $this->_var['order']['bonus_sn']; ?>" class="txt1" id="bonus-sn"  placeholder="输入红包序列号"/>
								<input type="button" name="validate_bonus" value="<?php echo $this->_var['lang']['validate_bonus']; ?>" class="btn1" onclick="validateBonus(document.forms['theForm'].elements['bonus_sn'].value)"/>
						</li>
	  </ul>
      
      
              
    </div>

  

   <?php endif; ?>
   
   
   
   
   <?php if ($this->_var['card_list']): ?>
    <div class="panel-body">
    
      <div class="title" id="hekatitle" style="border-bottom:1px solid #eeeeee;">
        <span class="i-icon-arrow-down" id="hekaip"></span>
                <span class="text">使用贺卡</span><em class="qxz" id="emheka">请选择贺卡</em>
              </div>
      <ul class="nav nav-list-sidenav" id="heka68" style="display:none;">
         	      <li> <input type="radio" class="radio"  name="card" value="0" <?php if ($this->_var['order']['card_id'] == 0): ?>checked="true"<?php endif; ?> onclick="selectCard(this)" /><?php echo $this->_var['lang']['no_card']; ?></li>
		    <?php $_from = $this->_var['card_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
           <li><input type="radio" class="radio"  name="card"  id="card_<?php echo $this->_var['card']['card_id']; ?>" value="<?php echo $this->_var['card']['card_id']; ?>" <?php if ($this->_var['order']['card_id'] == $this->_var['card']['card_id']): ?>checked="true"<?php endif; ?> onclick="selectCard(this)"  /><label for="card_<?php echo $this->_var['card']['card_id']; ?>"><?php echo $this->_var['card']['card_name']; ?>[<?php echo $this->_var['card']['format_card_fee']; ?>]</label>
           </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	  </ul>
      
      
              
    </div>


   <?php endif; ?>
   
      
<?php if ($this->_var['pack_list']): ?>
    <div class="panel-body">
    
      <div class="title" id="baozhuangtitle" style="border-bottom:1px solid #eeeeee;">
        <span class="i-icon-arrow-down" id="baozhuangip"></span>
                <span class="text"><?php echo $this->_var['lang']['goods_package']; ?></span><em class="qxz" id="embaozhuang">请选择<?php echo $this->_var['lang']['goods_package']; ?></em>
              </div>
      <ul class="nav nav-list-sidenav" id="baozhuang68" style="display:none;">
         	        <li> <input type="radio" class="radio"  name="pack" value="0" <?php if ($this->_var['order']['pack_id'] == 0): ?>checked="true"<?php endif; ?> onclick="selectPack(this)" /><?php echo $this->_var['lang']['no_pack']; ?></li>
         <?php $_from = $this->_var['pack_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pack');if (count($_from)):
    foreach ($_from AS $this->_var['pack']):
?>
		  <li><input type="radio" class="radio" name="pack" id="pack_<?php echo $this->_var['pack']['pack_id']; ?>" value="<?php echo $this->_var['pack']['pack_id']; ?>" <?php if ($this->_var['order']['pack_id'] == $this->_var['pack']['pack_id']): ?>checked="true"<?php endif; ?> onclick="selectPack(this)" /><label for="pack_<?php echo $this->_var['pack']['pack_id']; ?>"><?php echo $this->_var['pack']['pack_name']; ?>[<?php echo $this->_var['pack']['format_pack_fee']; ?>]</label></li>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
	  </ul>
      
      
              
    </div>


   <?php endif; ?>
   
   
   
   <div class="panel-body">
    
      <div class="title" id="fuyantitle" style="border-bottom:1px solid #eeeeee;">
        <span class="i-icon-arrow-down" id="fuyanip"></span>
                <span class="text">订单附言</span>
              </div>
      <ul class="nav nav-list-sidenav" id="fuyan68" style="display:none;">
         	    <li>
<textarea name="postscript" class="voucher-num" value=""  autocomplete="off" id="postscript"><?php echo htmlspecialchars($this->_var['order']['postscript']); ?></textarea>
               </li>
	  </ul>
      
      
              
    </div>


</div>
      
	

<div class="panel panel-default info-box">
    <div class="panel-heading" style="position:relative;">
      <h3 class="panel-title" style="border:none; text-align:left; padding:0; margin:0; height:22px; line-height:22px;"><span style="text-align:left"><span class="icon-goodsnum"></span>商品列表</span></h3>
      <?php if ($this->_var['allow_edit_cart']): ?><a href="flow.php" title="<?php echo $this->_var['lang']['modify']; ?><?php echo $this->_var['lang']['goods_list']; ?>" class="link">修改</a><?php endif; ?>
    </div>
    
   <div class="con-ct   fo-con">
    <ul class="ct-list">
            <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                    <li style="border-bottom:#D9D9D9 1px solid;">
                    	<ul class="sp_list">
						<li class="sp_list_li1">
                             <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" class="link" target="_blank" style="color:#4f92d4;"><?php echo sub_str($this->_var['goods']['goods_name'],15); ?></a>
                         </li>
                         <li class="sp_list_li2">×&nbsp;<?php echo $this->_var['goods']['goods_number']; ?></li>
                         <li class="sp_list_li3"><?php echo $this->_var['goods']['subtotal']; ?></li>
                         </ul>
                     </li>
                     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                     </ul>
                         <?php echo $this->fetch('library/order_total.lbi'); ?>
            
			
    </div>

  </div>
<div class="pay-btn">
				<input type="submit" class="sub-btn btnRadius" value="提交订单"/>
                <input type="hidden" name="step" value="done">
			</div>
		</div>
 </form>
<?php endif; ?>


<?php if ($this->_var['step'] == 'done'): ?>
<div class="step_flow">
  <ul>
    <li >1.购物车列表</li>
    <li >2.确认订单</li>
    <li class="current">3.购买成功</li>
  </ul>
  </div>
<div class="content ptop0" style="margin-top:10px;">	
			<div class="con-ct radius shadow fo-con">
				<ul class="ct-list">
                <li><?php echo $this->_var['lang']['remember_order_number']; ?>：<font color="#FF6600"><?php echo $this->_var['order']['order_sn']; ?></font></li>
                 <li><?php if ($this->_var['order']['shipping_name']): ?><?php echo $this->_var['lang']['select_shipping']; ?><?php echo $this->_var['lang']['colon']; ?><em><?php echo $this->_var['order']['shipping_name']; ?></em><?php endif; ?></li>
               <li> <?php echo $this->_var['lang']['select_payment']; ?><?php echo $this->_var['lang']['colon']; ?><em><?php echo $this->_var['order']['pay_name']; ?></em></li>
				<li><?php echo $this->_var['lang']['order_amount']; ?><?php echo $this->_var['lang']['colon']; ?><em class="price"><?php echo $this->_var['total']['amount_formated']; ?></em></li>        
                </ul>
                
                </div>
        <?php if ($this->_var['pay_online']): ?>
        <?php if ($this->_var['iswei']): ?>
   <?php if ($this->_var['order']['pay_id'] == 6): ?>
       <div class="pay-btn"><a href="weixinpay.php?oid=<?php echo $this->_var['order']['order_id']; ?>" class="sub-btn btnRadius">微支付</a></div>
       <?php else: ?>
       	<div class="pay-btn"><a href="./pay/alipayapi.php?out_trade_no=<?php echo $this->_var['order']['order_sn']; ?>&total_fee=<?php echo $this->_var['total']['amount_formated_wap']; ?>" class="sub-btn btnRadius">去支付宝支付</a></div>
<?php endif; ?>
		<?php else: ?>
           	<div class="pay-btn"><a href="./pay/alipayapi.php?out_trade_no=<?php echo $this->_var['order']['order_sn']; ?>&total_fee=<?php echo $this->_var['total']['amount_formated_wap']; ?>" class="sub-btn btnRadius">去支付宝支付</a></div>
            <?php endif; ?>
			<?php endif; ?>
            
              
             <?php if ($this->_var['virtual_card']): ?>
             <div class="con-ct radius shadow fo-con">
				<ul class="ct-list">
					<?php $_from = $this->_var['virtual_card']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vgoods');$this->_foreach['virtual_card'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['virtual_card']['total'] > 0):
    foreach ($_from AS $this->_var['vgoods']):
        $this->_foreach['virtual_card']['iteration']++;
?>
					<?php $_from = $this->_var['vgoods']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');$this->_foreach['vgoods_info'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['vgoods_info']['total'] > 0):
    foreach ($_from AS $this->_var['card']):
        $this->_foreach['vgoods_info']['iteration']++;
?>
					<li>
						<span class="type"><?php echo $this->_var['vgoods']['goods_name']; ?></span>
						<?php if ($this->_var['card']['card_sn']): ?><span class="id"><strong><?php echo $this->_var['lang']['card_sn']; ?><?php echo $this->_var['lang']['colon']; ?></strong><?php echo $this->_var['card']['card_sn']; ?></em></span><?php endif; ?>
						<?php if ($this->_var['card']['card_password']): ?><span class="serial_code"><strong><?php echo $this->_var['lang']['card_password']; ?><?php echo $this->_var['lang']['colon']; ?></strong><em><?php echo $this->_var['card']['card_password']; ?></em></span><?php endif; ?>
						<?php if ($this->_var['card']['end_date']): ?><span class="expire_date"><strong><?php echo $this->_var['lang']['end_date']; ?><?php echo $this->_var['lang']['colon']; ?></strong><em><?php echo $this->_var['card']['end_date']; ?></em></span><?php endif; ?>
					</li>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</ul>
                </div>
                <div class="con-ct radius shadow fo-con">
                <ul class="ct-list"><li><?php echo $this->_var['order_submit_back']; ?></li></ul>
              </div>
			<?php endif; ?>
</div>
<?php endif; ?>
<?php if ($this->_var['step'] != 'cart'): ?>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<?php endif; ?>
<?php if ($this->_var['step'] != 'cart'): ?>
<?php echo $this->fetch('library/footer_nav.lbi'); ?>
<script language="javascript">
$(function(){ 
$('input[type=text],input[type=password]').bind({ 
focus:function(){ 
 $(".global-nav").css("display",'none'); 
}, 
blur:function(){ 
 $(".global-nav").css("display",'flex'); 
} 
}); 
}) 
</script>
<?php endif; ?>
  </div>
  </div>
  <script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
</script>

</body>
</html>

