<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />


<!--[if lt IE 9]>
    <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
    <script src="http://libs.baidu.com/jquery/2.1.1/jquery.min.js"></script>
<!--<![endif]-->


<script src="js/layer/layer.min.js"></script>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js,transport.js')); ?>


<script type="text/javascript">
//根据浏览器类型和版本更改DOM(由于IE不支持利用JS来更改INPUT的TYPE类型值)
$(document).ready(function(){
	if(is_Browser() == "IE(6.0)" || is_Browser() == "IE(7.0)" || is_Browser() == "IE(8.0)"){			//如果是IE6/7/8，则更改现有HTML代码
		//手机注册部分
		$("#regFromMobile ul li").eq(2).remove();
		$("#regFromMobile ul li").eq(1).remove();
		$("#regFromMobile ul li").eq(0).after('<li><div class="form_item"><label>设置密码：</label><input type="password" class="ipt gay_text" name="pwd" id="pwd" value="" onfocus="regStyleChange(this)" onblur="chkInput(this)"></div></li><li><div class="form_item"><label>确认密码：</label><input type="password" class="ipt gay_text" name="pwd" id="repwd" value="" onfocus="regStyleChange(this)" onblur="chkInput(this)"></div></li> ');
		//邮箱注册部分
		$("#regFromEmail ul li").eq(2).remove();
		$("#regFromEmail ul li").eq(1).remove();
		$("#regFromEmail ul li").eq(0).after('<li><div class="form_item"><label>设置密码：</label><input type="password" class="ipt gay_text" name="pwd" id="email_pwd" value="" onfocus="regStyleChange(this)" onblur="chkInput(this)"></div></li><li><div class="form_item"><label>确认密码：</label><input type="password" class="ipt gay_text" name="pwd" id="email_repwd" value="" onfocus="regStyleChange(this)" onblur="chkInput(this)"></div></li> ');
	}
})

//注册模式切换函数
function regModChange(obj){	
	var regDiv2 = $("div.regist_left div:nth-child(2)");	//获取左侧注册TAB菜单第二个DIV的对象
	var regDiv3 = $("div.regist_left div:nth-child(3)");	//获取左侧注册TAB菜单第三个DIV的对象
	
	if($(obj).text() == "手机注册"){							//如果手机注册部分被点击
		if(regDiv2.hasClass("none") == true){				//如果手机注册部分被隐藏
			regDiv2.removeClass("none");					//移除第二个手机注册部分的none样式，使其显示
			regDiv3.addClass("none");						//为邮箱注册部分DIV添加none样式，使其隐藏
			$("p.cur_tab").css("left","0");					//标题下方指示部分移动
		}
	}
	if($(obj).text() == "邮箱注册"){							//如果邮箱注册部分被点击
		if(regDiv3.hasClass("none") == true){				//如果邮箱注册部分被隐藏
			regDiv3.removeClass("none");					//移除邮箱注册部分的none样式，使其显示
			regDiv2.addClass("none");						//为手机注册部分DIV添加none样式，使其隐藏
			$("p.cur_tab").css("left","258px");				//标题下方指示部分移动
		}
	}
}

//注册页鼠标点击样式改变
function regStyleChange(obj){
	//inputName = obj.value;		//定义全局变量,在其他函数中使用
	switch($(obj).attr("id")){
		case "phone": 
			if($(obj).val() == "请输入手机号码"){
				$(obj).val(""); $(obj).css({color:"#0f0f0f", fontWeight:"bold"});
			}
		break;
		case "email": 
			if($(obj).val() == "请输入邮箱地址"){
				$(obj).val(""); $(obj).css({color:"#0f0f0f", fontWeight:"bold"});
			}
		break;
		case "pwd":
			if($("#phone").val() != "请输入手机号码"){
				$(obj).val(""); $(obj).attr("type","password"); $(obj).css({color:"#0f0f0f", fontWeight:"bold"});
			}   
		break;
		case "repwd": 
			if($("#phone").val() != "请输入手机号码"){
				obj.type = "password"; obj.value = ""; $(obj).css({color:"#0f0f0f", fontWeight:"bold"});
			} 
		break;
		case "email_pwd": 
			if($("#email").val() != "请输入邮箱地址"){
				obj.type = "password"; obj.value = ""; $(obj).css({color:"#0f0f0f", fontWeight:"bold"});
			}
		break;
		case "email_repwd": 
			if($("#email").val() != "请输入邮箱地址"){
				obj.type = "password"; obj.value = ""; $(obj).css({color:"#0f0f0f", fontWeight:"bold"});
			}
		break;
		case "validCode": $(obj).css({color:"#0f0f0f", fontWeight:"bold"}); break;
		case "emailValidCode": $(obj).css({color:"#0f0f0f", fontWeight:"bold"}); break;
	}
}
//注册页Input失去焦点判断，包括是否为空，格式是否合法
function chkInput(obj){
	switch($(obj).attr("id")){
		case "phone":
			if($(obj).val() == ""){
				$(obj).css({color:"#ccc", fontWeight:"normal"}); $(obj).val("请输入手机号码");
			}else{
				var userInput = $(obj).val();
				if(!/^(13[0-9]|14[0-9]|15[0-9]|17[0-9]|18[0-9])\d{8}$/i.test(userInput)){		//判断用户手机号是否正确
					$(obj).val("");				//清空输入
					$(obj).focus();				//输入框获得焦点
					$("div.errInfoShowErea").text("格式错误，请重新输入！").fadeIn("slow").delay(1000).fadeOut("slow");
					return false;
				}
				//ajax验证是否已被注册
				uName = trim($("#phone").val());		//处理用户输入的值
				$.ajax({type:"GET", url:"user.php", data:"act=is_registered&username="+uName, success:function(msg){
					if(msg == "false"){					//如果已被注册
						$(obj).focus();					//输入框获得焦点
						$("div.errInfoShowErea").text("对不起此手机号已被注册，请重新输入！").fadeIn("slow").delay(2000).fadeOut("slow");
						return false;	
					}
				}});	
			} 
		break;
		
		case "email":
			if($(obj).val() == ""){
				$(obj).css({color:"#ccc", fontWeight:"normal"}); $(obj).val("请输入邮箱地址");	
			}else{
				var userInput = $(obj).val();
				if(!/^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/.test(userInput)){		//判断EMAIL地址格式是否正确
					$(obj).val("");			//清空输入
					$(obj).focus();			//输入框获得焦点
					$("div.errInfoShowErea").text("格式错误，请重新输入！").fadeIn("slow").delay(1000).fadeOut("slow");
					return false;
				}
				//ajax验证Email是否已被注册
				uName = trim($("#email").val());		//处理用户输入的值
				$.ajax({type:"GET", url:"user.php", data:"act=is_registered&username="+uName, success:function(msg){
					if(msg == "false"){					//如果已被注册
						$(obj).val("");					//清空输入
						$(obj).focus();					//输入框获得焦点
						$("div.errInfoShowErea").text("对不起此Email已被注册，请重新输入！").fadeIn("slow").delay(2000).fadeOut("slow");
						return false;	
					}
				}});	
			}
		break;
		
		case "pwd":
			if($(obj).val() == ""){
				$(obj).attr("type") = "text"; $(obj).val("6-20个大小写英文字母、符号或数字"); $(obj).css({color:"#ccc", fontWeight:"normal"});	
			}else{
				var strpwd = trim($(obj).val());
				if((strpwd.length < 6) || (strpwd.length > 20)){			//判断用户输入密码长度是否合法
					$(obj).val("");			//清空输入
					$(obj).focus();			//输入框获得焦点
					$("div.errInfoShowErea").css("top","330px").text("密码长度有误，请重新输入！").fadeIn("slow").delay(1000).fadeOut("slow");	
				}	
			}
		break;
		
		case "repwd":
			if(obj.value == "" || obj.value == "请再次输入密码"){
				obj.type = "text"; obj.value = "请再次输入密码"; $(obj).css({color:"#ccc", fontWeight:"normal"});
			}else{
				var strrepwd = String(trim(obj.value));
				var strpwd = String(trim($("#pwd").val()));
				if(strrepwd != strpwd){			//判断用户输入密码长度是否合法
					obj.value = "";			//清空输入
					obj.focus();			//输入框获得焦点
					$("div.errInfoShowErea").css("top","380px").text("两次密码输入不一致，请重新输入！").fadeIn("slow").delay(1000).fadeOut("slow");	
				}		
			}
		break;
		
		case "email_pwd":
			if(obj.value == "" || obj.value == "6-20个大小写英文字母、符号或数字"){
				obj.type = "text"; obj.value = "6-20个大小写英文字母、符号或数字"; $(obj).css({color:"#ccc", fontWeight:"normal"});
			}else{
				var strpwd = trim(obj.value);
				if((strpwd.length < 6) || (strpwd.length > 20)){			//判断用户输入密码长度是否合法
					obj.value = "";			//清空输入
					obj.focus();			//输入框获得焦点
					$("div.errInfoShowErea").css("top","330px").text("密码长度有误，请重新输入！").fadeIn("slow").delay(1000).fadeOut("slow");	
				}	
			}
		break;
		
		case "email_repwd":
			if(obj.value == "" || obj.value == "请再次输入密码"){
				obj.type = "text"; obj.value = "请再次输入密码"; $(obj).css({color:"#ccc", fontWeight:"normal"});
			}else{
				var strrepwd = String(trim(obj.value));
				var strpwd = String(trim($("#email_pwd").val()));
				if(strrepwd != strpwd){			//判断用户输入密码长度是否合法
					obj.value = "";			//清空输入
					obj.focus();			//输入框获得焦点
					$("div.errInfoShowErea").css("top","380px").text("两次密码输入不一致，请重新输入！").fadeIn("slow").delay(1000).fadeOut("slow");	
				}
			}
		break;
		
		case "validCode":
			if(obj.value == ""){
				obj.value = ""; $(obj).css({color:"#ccc", fontWeight:"normal"});	
			}else{
				//向captcha.php发送请求当前验证码的AJAX
				$.ajax({type:"POST", url:"captcha.php", data:"uCode="+obj.value, success:function(data){
					if(data == "ERROR"){
						obj.value = "";			//清空输入
						obj.focus();			//输入框获得焦点
						$("div.errInfoShowErea").css("top","450px").text("验证码错误，请刷新后重新输入！").fadeIn("slow").delay(1000).fadeOut("slow");		
					}
				}});
			}
		break;
		
		case "emailValidCode":
			if(obj.value == ""){
				obj.value = ""; $(obj).css({color:"#ccc", fontWeight:"normal"});	
			}else{
				//向captcha.php发送请求当前验证码的AJAX
				$.ajax({type:"POST", url:"captcha.php", data:"uCode="+obj.value, success:function(data){
					if(data == "ERROR"){
						obj.value = "";			//清空输入
						obj.focus();			//输入框获得焦点
						$("div.errInfoShowErea").css("top","450px").text("验证码错误，请刷新后重新输入！").fadeIn("slow").delay(1000).fadeOut("slow");		
					}
				}});
			}
		break;
	}
}
//登录页点击输入用户名处理函数
function userLoginNameInputAct(obj){
	if($(obj).val() == "手机号码/Email" || $(obj).val() == ""){
		$(obj).val("").css({color:"#0f0f0f", fontWeight:"bold"});			//设置输入框内容为空并更改输入样式	
	}
}

//登录页用户名Input失去焦点处理函数
function userLoginNameBlurAct(obj){
	if($(obj).val() == ""){
		$(obj).val("手机号码/Email").css({color:"#cccccc", fontWeight:"normal"});			//设置输入框内容为空并更改输入样式	
	}
}

</script>
<link href="themes/68ecshop_xiaomi/css/global_site_index.css" rel="stylesheet" type="text/css"/>

<style type="text/css">
.isCorrectIconShow{width:18px; height:18px; display:none; background:url(themes/68ecshop_xiaomi/images/ok_err_icon.jpg) no-repeat 0 0;float: right; margin-right: 105px; margin-top: 20px;}
.errInfoShowErea{display:none; font-family:"Courier New"; width:252px; height:43px; line-height:50px; text-indent:15px; color:#FFFFFF; background:#fff url(themes/68ecshop_xiaomi/images/errInfoShow_bg.jpg) no-repeat; position:absolute; top:280px; left:404px; z-index:999;}
</style>
</head>
<body>
<div class="regist_header clearfix">
	<div class="wrap">
        <a href="index.php" class="logo"><img src="themes/68ecshop_xiaomi/images/logo.png" alt="" height="55"></a>
        <div class="regist_header_right clearfix">
        	<!--<a href="#" class="english_edition" id="edition" style="display:none">English</a>-->
            <div class="help_wrap">
                <a class="hd_menu" href="javascript:void()"><s class="help_ico"></s>帮助中心</a>
                <div class="hd_menu_list1">
                    <ul>
                        <li><a href="">包裹跟踪</a></li>
                        <li><a href="">常见问题</a></li>
                        <li><a href="">在线退换货</a></li>
                        <li><a href="">在线投诉</a></li>
                        <li><a href="">配送范围</a></li>
                    </ul>
                </div>
            </div>
            <script>
	$('.hd_menu').mouseenter(function(){
		$('.hd_menu_list1').stop().slideDown(100);	
	})
	$('.help_wrap').mouseleave(function(){
		$('.hd_menu_list1').stop().slideUp(100)	
	})
</script>
            <span class="fr" style="font-family:'Courier New' ">您好，欢迎光临U+易购！ <a href="user.php?act=login" class="blue_link">请登录</a></span>
        </div>
    </div>
  </div>

<?php if ($this->_var['action'] == 'register'): ?>
<link href="themes/68ecshop_xiaomi/css/index.css" rel="stylesheet" type="text/css"/>
<link href="themes/68ecshop_xiaomi/css/pc_register_find_update_pwd.css" rel="stylesheet" type="text/css"/>
<div class="regist_wrap">
    <div class="mod_regist_wrap">

    
    	<div class="regist_border clearfix">
        	<div class="regist_left" style="position:relative;">
        	    <div class="regist_tab">
                    <ul class="clearfix">
                        <li class="cur"><i class="r_mobile"></i><span onclick="javascript:regModChange(this);">手机注册</span></li>
                        <li><i class="r_mail"></i><span onclick="javascript:regModChange(this);">邮箱注册</span></li>
                    </ul>
                    <p class="cur_tab"><em></em></p>
                </div>
                

                <div id="regFromMobile" class="regist_form">
                	<ul class="clearfix">
                        <li>
                        	<div class="form_item"><label>手机号：</label>
                            <input type="text" class="ipt gay_text ipt_phone" value="请输入手机号码" id="phone" onfocus="regStyleChange(this)" onblur="chkInput(this)">
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label>设置密码：</label>
                                <input type="text" class="ipt gay_text" name="pwd" id="pwd" value="6-20个大小写英文字母、符号或数字" onfocus="regStyleChange(this)" onblur="chkInput(this)">
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label>确认密码：</label>
                                <input type="text" class="ipt gay_text" name="pwd" id="repwd" value="请再次输入密码" onfocus="regStyleChange(this)" onblur="chkInput(this)">
                            </div>
                        </li> 
                        <li class="verify_code cur_right">
                            <div class="form_item">
                                <label>验证码：</label>
                                <input type="text" class="ipt ipt_code gay_text" value="" id="validCode" name="validCode" maxlength="4" onfocus="regStyleChange(this)" onblur="chkInput(this)">
							</div>
                            &nbsp;<span><img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="height:45px; line-height:45px; width:100px; margin-top:5px;"  onClick="this.src='captcha.php?'+Math.random()" /></span><i class="change_code" style="height:45px; line-height:45px;">&nbsp;点击图片刷新验证码</i></span>
                        </li>
                        <li class="service_agreement" style="font-family:'Courier New'; font-size:12px ">点击注册，表示您同意U+易购
                            <a href="javascript:void()" class="blue_link" target="_blank">《服务协议》</a>
                        </li>    
                        <li class="regist_btn">
                            <button id="phone_reg_btn" type="button" onclick="javascript:regByPhoneSubmit();return false;">注册</button>
                        </li>
                    </ul>             
                </div>
				

                <div id="regFromEmail" class="regist_form none">
                    <ul class="clearfix">
                        <li>
                            <div class="form_item">
                                <label>邮箱：</label>
                                <input type="text" class="ipt gay_text ipt_username" value="请输入邮箱地址" id="email" name="user.email" autocomplete="off" maxlength="100" onfocus="regStyleChange(this)" onblur="chkInput(this)">
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label>设置密码：</label>
                                <input type="text" class="ipt gay_text" name="pwd" id="email_pwd" value="6-20个大小写英文字母、符号或数字" onfocus="regStyleChange(this)" onblur="chkInput(this)">
                            </div>
                        </li>
                        <li>
                            <div class="form_item">
                                <label>确认密码：</label>
                                <input type="text" class="ipt gay_text" name="pwd" id="email_repwd" value="请再次输入密码" onfocus="regStyleChange(this)" onblur="chkInput(this)">
                            </div>
                        </li>
                        <li class="verify_code cur_right">
                            <div class="form_item">
                                <label>验证码：</label>
                                <input type="text" class="ipt ipt_code gay_text" value="" id="emailValidCode" name="emailValidCode" onfocus="regStyleChange(this)" onblur="chkInput(this)" maxlength="4">    
                            </div>
                            &nbsp;<span><img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="height:45px; line-height:45px; width:100px; margin-top:5px;"  onClick="this.src='captcha.php?'+Math.random()" /></span><i class="change_code" style="height:45px; line-height:45px;">&nbsp;点击图片刷新验证码</i></span>
                           
                        </li>
                        <li class="service_agreement" style="font-family:'Courier New'; font-size:12px; ">点击注册，表示您同意U+易购
                        	<a href="javascript:void()" class="blue_link" target="_blank">《服务协议》</a>
                        </li>
                        <li class="regist_btn">
                            <button id="email_reg_btn" type="button" onclick="javascript:regByEmailSubmit();return false;">注册</button>
                        </li>
                    </ul>
                </div>
            </div>
            
                <div class="regist_right">
            		<a href="javascript:void()" class="regits_b2b">供应商注册</a>
                	<p>立即点击供应商注册！</p>
                	<div class="wireless_banner">
                    	<a id="imgLink" target="_blank" style="display:none"><img id="img" src="" width="180" height="160"></a>
                	</div>
            	</div>
        </div>
    

		
        <div class="errInfoShowErea"></div>
  	</div>
</div>
<?php endif; ?>


<?php if ($this->_var['action'] == 'login'): ?>
     <link href="themes/68ecshop_xiaomi/css/pc_login.css" rel="stylesheet" type="text/css"/>
	<div class="login_wrap">
		<div class="wrap clearfix">
          <form name="formLogin" action="user.php" method="post" onSubmit="return userLogin()">
			<div class="mod_login_wrap login_entry_css">
				<div class="clearfix" style="position: relative;">
	            	<div style="position: relative; padding-left: 160px; padding-right: 160px; height: 40px;">
	            		<h3 style="margin: 0 auto;float: none; width: 100%;">U+易购用户登录</h3>
	            	</div>
	            	<a style="position: absolute; right: 15px; top: 0px;" href="user.php?act=register" class="regist_new blue_link">注册新账号</a>
	            </div>
				<div class="login_form">
					<div class="form_item_wrap">
						
					    <div class="form_item">
					        <label class="user_ico"></label>
                            <input type="text" name="username" tabindex="1" value="手机号码/Email" class="ipt gay_text ipt_username" onfocus="javascript:userLoginNameInputAct(this)" onblur="javascript:userLoginNameBlurAct(this)" style="color:#CCCCCC">
					    </div>
					    <div class="form_item">
					        <label class="paswd_ico"></label>
					        <input  name="password" tabindex="2" class="ipt ipt_password" style="outline: none; color:#0f0f0f" onfocus="this.className='ipt ipt_password'" onblur="if (value ==''){this.className='ipt ipt_password'}" type="password" >
					        <a href="user.php?act=get_password" target="_blank" class="forget_pswd" tabindex="-1">忘记密码？</a>
					    </div>
					    <p class="auto_login">
                        <input id="remember" type="checkbox" name="remember" value="1"></input>
					    	<label for="remember" style="color:#999">记住我的用户名</label>
                            </p>
					     <input type="hidden" name="act" value="act_login" />
            <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
					    <button type="submit" class="login_btn">登录</button>
					</div>
					<div class="login_entry">
						<p>合作网站账号登录</p>
						<table width="230" border="0" cellpadding="0" cellspacing="0">
                <tr height="40">
                  <td><a style="text-decoration:none" href="user.php?act=oath&type=qq"><img src="themes/68ecshop_xiaomi/images/qq_login.gif"/></a></td>
                  <td><a style="text-decoration:none" href="user.php?act=oath&type=weibo"><img src="themes/68ecshop_xiaomi/images/sina_login.gif"/></a></td>
                  <td><a style="text-decoration:none" href="user.php?act=oath&type=alipay"><img src="themes/68ecshop_xiaomi/images/alipay_login.gif"/></a></td>
                  <td><a style="text-decoration:none" href="user.php?act=oath&type=taobao"><img src="themes/68ecshop_xiaomi/images/taobao_login.gif"/></a></td>
                </tr>
            </table>
					</div>
				</div>
			</div>
               </form>
			<div class="mod_left_banner"><a id="imgLink" target="_blank"><img id="img" src="themes/68ecshop_xiaomi/images/login_pic.jpg" height="300" width="400"></a></div>
		</div>
	</div>
<script>	
	pageInit();
	function getPageTag(){
        return 1;	 
    }
    $(document).ready(function(){
		loadImageUrl("1","Passport_Login_Ad_Click");
	});
</script>
<?php endif; ?>


    <?php if ($this->_var['action'] == 'get_password'): ?>
    <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
    <script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
     <link href="themes/68ecshop_xiaomi/style.css" rel="stylesheet" type="text/css"/>
       <link href="themes/68ecshop_xiaomi/css/pc_register_find_update_pwd.css" rel="stylesheet" type="text/css"/>
        <link href="themes/68ecshop_xiaomi/css/index.css" rel="stylesheet" type="text/css"/>
  <div class="suc_content reg-account nojsp">
  <div class="suc_kuang">
    <div class="hei_513" style="border:none">
<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post" name="getPassword" onsubmit="return submitPwdInfo();">
        <br />
        <table width="70%" border="0" align="center">
          <tr>
            <td colspan="2" align="center"><strong style="line-height:60px;"><?php echo $this->_var['lang']['username_and_email']; ?></strong></td>
          </tr>
          <tr>
            <td width="29%" align="right"><?php echo $this->_var['lang']['username']; ?></td>
            <td width="61%"><input name="user_name" type="text" size="30" class="inputBg" style="background:#FFF"; height="24px; line-height:24px;" /></td>
          </tr>
               <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
          <tr>
            <td align="right"><?php echo $this->_var['lang']['email']; ?></td>
            <td><input name="email" type="text" size="30" class="inputBg" style="background:#FFF"; height="24px; line-height:24px;" /></td>
          </tr>
          <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
          <tr>
            <td></td>
            <td><input type="hidden" name="act" value="send_pwd_email" />
              <input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue" style="border:none;" />
              <input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="bnt_blue_1" />
	    </td>
          </tr>
        </table>
        <br />
      </form>
  </div>
</div>
</div>
</div></div>
<?php endif; ?>

    <?php if ($this->_var['action'] == 'qpassword_name'): ?>
      <link href="themes/68ecshop_xiaomi/style.css" rel="stylesheet" type="text/css"/>
        <link href="themes/68ecshop_xiaomi/css/index.css" rel="stylesheet" type="text/css"/>
    <div class="suc_content reg-account nojsp">
  <div class="suc_kuang">
    <div class="hei_513">
<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post">
        <br />
        <table width="70%" border="0" align="center">
          <tr>
            <td colspan="2" align="center"><strong><?php echo $this->_var['lang']['get_question_username']; ?></strong></td>
          </tr>
          <tr>
            <td width="29%" align="right"><?php echo $this->_var['lang']['username']; ?></td>
            <td width="61%"><input name="user_name" type="text" size="30" class="inputBg" /></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="hidden" name="act" value="get_passwd_question" />
              <input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue" style="border:none;" />
              <input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="bnt_blue_1" />
	    </td>
          </tr>
        </table>
        <br />
      </form>
  </div>
</div>
</div>
    <div class="suc_botm"></div>
</div></div>
<?php endif; ?>

    <?php if ($this->_var['action'] == 'get_passwd_question'): ?>
         <link href="themes/68ecshop_xiaomi/style.css" rel="stylesheet" type="text/css"/>
        <link href="themes/68ecshop_xiaomi/css/index.css" rel="stylesheet" type="text/css"/>
    <div class="suc_content reg-account nojsp">
  <div class="suc_kuang">
    <div class="hei_513">
<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post">
        <br />
        <table width="70%" border="0" align="center">
          <tr>
            <td colspan="2" align="center"><strong><?php echo $this->_var['lang']['input_answer']; ?></strong></td>
          </tr>
          <tr>
            <td width="29%" align="right"><?php echo $this->_var['lang']['passwd_question']; ?>：</td>
            <td width="61%"><?php echo $this->_var['passwd_question']; ?></td>
          </tr>
          <tr>
            <td align="right"><?php echo $this->_var['lang']['passwd_answer']; ?>：</td>
            <td><input name="passwd_answer" type="text" size="20" class="inputBg" /></td>
          </tr>          <?php if ($this->_var['enabled_captcha']): ?>
          <tr>
            <td align="right"><?php echo $this->_var['lang']['comment_captcha']; ?></td>
            <td><input type="text" size="8" name="captcha" class="inputBg" />
            <img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /> </td>
          </tr>
          <?php endif; ?>
          <tr>
            <td> </td>
<td><input type="hidden" name="act" value="check_answer" />
              <input type="submit" name="submit" value="<?php echo $this->_var['lang']['submit']; ?>" class="bnt_blue" style="border:none;" />
              <input name="button" type="button" onclick="history.back()" value="<?php echo $this->_var['lang']['back_page_up']; ?>" style="border:none;" class="bnt_blue_1" />
	    </td>
          </tr>
        </table>
        <br />
      </form>
  </div>
</div>
</div>
    <div class="suc_botm"></div>
</div></div>
<?php endif; ?>
<?php if ($this->_var['action'] == 'reset_password'): ?>
    <script type="text/javascript">
    <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </script>
         <link href="themes/68ecshop_xiaomi/style.css" rel="stylesheet" type="text/css"/>
        <link href="themes/68ecshop_xiaomi/css/index.css" rel="stylesheet" type="text/css"/>
    <div class="suc_content reg-account nojsp">
  <div class="suc_kuang">
    <div class="hei_513">
<div class="usBox">
  <div class="usBox_2 clearfix">
    <form action="user.php" method="post" name="getPassword2" onSubmit="return submitPwd()">
      <br />
      <table width="80%" border="0" align="center">
        <tr>
          <td><?php echo $this->_var['lang']['new_password']; ?></td>
          <td><input name="new_password" type="password" size="25" class="inputBg" /></td>
        </tr>
        <tr>
          <td><?php echo $this->_var['lang']['confirm_password']; ?>:</td>
          <td><input name="confirm_password" type="password" size="25"  class="inputBg"/></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="hidden" name="act" value="act_edit_password" />
            <input type="hidden" name="uid" value="<?php echo $this->_var['uid']; ?>" />
            <input type="hidden" name="code" value="<?php echo $this->_var['code']; ?>" />
            <input type="submit" name="submit" value="<?php echo $this->_var['lang']['confirm_submit']; ?>" />
          </td>
        </tr>
      </table>
      <br />
    </form>
  </div>
</div>
</div>
    <div class="suc_botm"></div>
</div></div>
<?php endif; ?>

<div style="height:0px; line-height:0px; clear:both"></div>
<?php echo $this->fetch('library/page_footer1.lbi'); ?>
</body>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
</script>
</html>
