<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta name="Generator" content="ECSHOP v2.7.3" /><script src="//www.google-analytics.com/analytics.js" async=""></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit">




<meta name="tp_page" content="0.0">

<title><?php echo $this->_var['page_title']; ?></title>




<script type="text/javascript" src="themes/68ecshop_xiaomi/js/libs/jquery18.js" ></script>


<link href="themes/68ecshop_xiaomi/css/global_site_base.css" rel="stylesheet" type="text/css">
<link href="themes/68ecshop_xiaomi/css/global_yhdLib.css" type="text/css" rel="stylesheet"></head>

<body id="comParamId" data-param="{&quot;globalPageCode&quot;:&quot;YHD_CMS&quot;,&quot;currPageId&quot;:&quot;0&quot;}">
<script>

(function(w) {
	// 定义一个数组存储页面error log。
var errorLogs = [],
	ERROR = 'error',
	URL = 'url',
	LINE = 'line',
	flag = 0;
var _this = {
	globalErrorWrap: function(sMsg, sUrl, sLine) {
		var log = {
			MSG: sMsg,
			URL: sUrl,
			LINE: sLine
		};
		errorLogs.push(log);
		if (flag == 1) {
			_this.globalNodifyErrorLog();
		}
		return false;
	},
	//处理error log集合
	globalNodifyErrorLog: function() {
		flag = 1;
		if (errorLogs != null && errorLogs.length > 0) {
			for (var i = 0; error=errorLogs[i]; i++) {
				appendErrorLog(error)
			}
			errorLogs = [];
		}
	}
};

//处理单个error

function appendErrorLog(log) {
	var error = [];
	for (var i in log) {
		error.push(i + ":" + log[i] + "<br>");
	}
	var errorLogDiv = document.getElementById("global_error_log");
	var div=document.createElement("div");
	div.innerHTML=error.join("");
	errorLogDiv.appendChild(div);
}

w["globalErrorLog"] = _this;
})(window);

window.onerror = globalErrorLog.globalErrorWrap;

</script>
 <?php echo $this->fetch('library/page_header.lbi'); ?>

<div class="wrap hd_detail_banner" id="global_head_adv_div" style="display:none">
	<a id="global_head_adv_href" href="#">
		<img id="global_head_img">
	</a>
</div>

 
<style>
.red,a.red{color:#cc0000;}
.blue,a.blue{color:#0066cc;}
.clearfix{zoom:1;}
.clearfix:after{content:"";display:block;height:0;line-height:0;clear:both;visibility:hidden;}
.left_menu{width:205px; float:left;}
.l24{line-height:24px;}
.left_menu .column,.left_menu .column2{border:1px solid #d4d4d4;}
.left_menu h2{background:url(themes/68ecshop_xiaomi/images/menu_tit.png) repeat-x; height:30px; line-height:31px; font-size:14px; padding-left:18px; color:#333; cursor:pointer;}
.left_menu h3{background:url(themes/68ecshop_xiaomi/images/menu_sub_tit.jpg) no-repeat; height:29px; line-height:29px;font-size:12px; padding-left:19px; color:#333; font-weight:normal; border-top:1px solid #d4d4d4; cursor:pointer;}
.left_menu h3.on{background:url(http://image.yihaodianimg.com/images/help/images/menu_sub_tit_on.jpg) no-repeat; color:#cc0000; font-weight:bold;}
.column a{background:url(http://image.yihaodianimg.com/images/help/images/listimg.png) no-repeat 0px 7px; height:24px; line-height:24px;padding-left:10px; margin-left:10px;}
.right_content{width:980px; float:right;}
.left_menu .column2 dl{background: #FFF url(http://image.yihaodianimg.com/images/help/images/sub_listbg.png) repeat-x; line-height:24px; padding-right:12px; padding-bottom:10px;}
.left_menu .column2 dt{font-weight:bold; color:#333; padding-left:17px;}
.left_menu .column2 dd{padding-left:70px;}
.left_menu .column2 .tit{width:70px; text-align:right; margin-left:-70px; float:left;}
/*面包屑*/
.crumb{background:url(http://image.yihaodianimg.com/images/help/images/homeico.gif) no-repeat 0px 5px; height:21px; line-height:21px;}
.crumb a{background:url(http://image.yihaodianimg.com/images/help/images/crumb_arrow.gif) no-repeat 5px 0px; padding-left:23px; height:21px; display:inline-block;}
.crumb a.home{background:none;}
/*帮助中心首页*/
.help_list dt{height:24px; line-height:24px; border-bottom:1px dashed #666666; color:#333; margin-top:5px;}
.help_list dd{line-height:24px; margin-top:5px; margin-bottom:10px;}
.help_list ul li{float:left; color:#cccccc; padding-right:10px; white-space:nowrap;}
.help_list li a{margin-right:10px; color:#0066cc;}
.help_list li a.red{color:#C00;}
/*2012-10-30 by zx*/
.help_icon{display:inline-block;margin-top:10px;}
.help_icon a{display:block;float:left;margin-right:50px;}
.help_icon span{background:url(http://image.yihaodianimg.com/images/cms/zhouxuan/help/helpCenterIcon.png) no-repeat;display:inline-block;height:61px;width:61px;vertical-align:middle;}
.help_icon span.help_icon01{background-position:0 0;}
.help_icon span.help_icon02{background-position:-117px 0;}
.help_icon span.help_icon03{background-position:-231px 0;}
.help_icon span.help_icon04{background-position:-351px 0;}
.help_icon span.help_icon05{background-position:-472px 0;}
/*联系客服*/
.help_box{border:1px solid #dbdbdb; margin-top:10px;}
.help_box h3{background:url(http://image.yihaodianimg.com/images/help/images/headline_bg.png) repeat-x; height:35px; padding-left:17px; font-size:14px; font-weight:bold; color:#333; line-height:35px;}
.help_detail{padding:6px 22px;}
.help_detail dl{line-height:20px;}
.help_detail dt{font-weight:bold; margin-top:10px;}
.help_detail dd{margin-bottom:10px;}
.ml220{margin-left:220px;}
.txt_indent{text-indent:2em;}
.mt10{margin-top:10px;}
a.btn{height:18px; line-height:18px; background:#EAEAEA; border:1px solid #B3B3B3; padding:1px 5px; font-weight:normal; margin-right:18px;}
a.btn:hover{text-decoration:none;}
/*网上支付*/
.blue_tab{border-collapse:collapse; border:1px solid #D0EBF9;}
.blue_tab th,.blue_tab td{padding:10px 0px; text-align:center;border:1px solid #D0EBF9;}
.blue_tab th{background:#EBF9FC;}
.complain{background:url(http://image.yihaodianimg.com/images/help/images/complain.png) no-repeat; width:18px; height:18px; vertical-align:middle; display:inline-block;}
/*帮助中心搜索框*/
.help_search{padding:10px 20px; border:1px solid #DBDBDB; background:#F5F5F5; color:#333; margin-top:10px; line-height:20px;}
.search_ipt{width:315px; height:18px; padding-left:3px; line-height:18px; border:1px solid #DBDBDB; color:#CCCCCC; vertical-align:middle;}
.help_sbtn{background:url(http://image.yihaodianimg.com/images/nll/help/search_btn.png ) no-repeat; width:60px; height:20px; line-height:20px; text-align:center; color:#FFF; border:0px; margin-left:10px; font-size:12px; font-weight:bold; cursor:pointer; vertical-align:middle; margin-right:22px;}
.help_search a{margin-right:8px;}
.help_sresult{background:url(http://image.yihaodianimg.com/images/nll/help/result_titbg.png) repeat-x; font-size:14px; color:#333333; font-weight:bold; height:34px; line-height:34px; padding:0px 18px; border-top:1px solid #DBDBDB;border-left:1px solid #DBDBDB;border-right:1px solid #DBDBDB;border-bottom:1px solid #CC0000;}
.result_detail{border-left:1px solid #DBDBDB; border-right:1px solid #DBDBDB; border-bottom:1px solid #DBDBDB; padding:10px;}
.result_detail dl{border-bottom:1px solid #F3F3F3; line-height:22px; padding-bottom:15px;}
.result_detail dt{font-weight: bold; padding-left:10px; padding-top:10px;}
.result_detail dd{padding-left:10px;}
.result_detail dt span,.result_detail dd span{color:#C00;}
/*帮助中心退换货流程*/
.goods_apply{width:712px; height:283px;background:url(http://image.yihaodianimg.com/images/cms/zhouxuan/help/application.png) no-repeat; position:relative;}
.hide{display:none;}
.tips_box{position:absolute; background:#fffde6; border:1px solid #ffd8a3; padding:6px; width:270px; font-size:12px;color:#333; line-height:20px; top:45px;}
.tips_box s{background:url(http://image.yihaodianimg.com/images/cms/zhouxuan/help/arrow.png) no-repeat; width:13px; height:8px; display:block; position:absolute; top:-8px; left:14px;}
.goods_apply a{display:block;position:absolute;cursor:pointer; color:#333;text-decoration:none;}
.thhsq{width:80px;height:33px;top:170px;left:23px;}
.shcg{width:80px;height:33px;top:81px;left:186px;}
.smhh{width:80px;height:33px;top:28px;left:297px;}
.smqj{width:80px;height:33px;top:81px;left:297px;}
.gkjh{width:80px;height:33px;top:134px;left:297px;}
.dj{width:60px;height:33px;top:108px;left:400px;}
.fhsb{width:100px;height:44px;top:54px;left:503px;}
.fx{width:60px;height:33px;top:-3px;left:636px;}
.hh{width:60px;height:33px;top:50px;left:636px;}
.th{width:60px;height:33px;top:103px;left:636px;}
.bfhsb{width:100px;height:44px;top:168px;left:503px;}
.ywfh{width:80px;height:33px;top:168px;left:636px;}
.shsb{width:80px;height:33px;top:247px;left:186px;}
/* -S-liuwentao */
/*选项卡*/
.Viola_tab{margin-top:10px;}
.Viola_tab ul.tab_Data{padding:0 10px;margin:0 10px;height:28px;background:url(http://d7.yihaodianimg.com/N04/M01/7A/F4/CgQDr1IxLzyAawSAAAAEL1tloN070700.png) 0 -28px repeat-x;}
.Viola_tab ul.tab_Data li{float:left;height:26px;width:80px;margin-right:10px;background:url(http://d7.yihaodianimg.com/N04/M01/7A/F4/CgQDr1IxLzyAawSAAAAEL1tloN070700.png) 0 0 repeat-x;border:1px solid #CFDEE8;color:#0066CC;line-height:26px;text-align:center;cursor:pointer;}
.Viola_tab ul.tab_Data li.cur{background:#fff;border-bottom:1px solid #fff;color:#666666;font-weight:bold;}
.good_medal{display:inline-block;height:15px;width:22px;background:url(http://d9.yihaodianimg.com/N00/M06/F4/19/CgMBmVJ6_hSAL5rbAAADVTUW5Ho03600.jpg) 0 0 no-repeat;}
.margin_center{margin:0 auto;}
.blue_tab td.text_left{padding-left:5px;padding-right:5px;text-align:left;}
.bg_blue{background:#DEEDF9;line-height:28px;}
.big_title{text-align:center;font-size:14px;padding:10px 0;}
.small_title{background:#DEEDF9;line-height:26px;padding-left:10px;}
/*抵用券支付的表格样式*/
.tab_coupon{border: 1px solid #000;border-collapse: collapse;font-family: 'Microsoft YaHei';}
.tab_coupon th{text-align: left;}
.tab_coupon th,.tab_coupon td{height:22px;padding-left:10px;border: 1px solid #000;}
/*侵权举报表格*/
.tab_power{border: 1px solid #000;border-collapse: collapse;}
.tab_power th{height:30px;border: 1px solid #000;}
.tab_power td{padding:8px;border: 1px solid #000;}

.help_detail .purple_table{border:1px solid #8064a2;border-bottom:0 none;font:bold 12px "microsoft yahei";}
.help_detail .purple_table th{color:#FFF;background-color:#8064a2;}
.help_detail .purple_table td{text-align:center;height:23px;border-bottom:1px solid #8064a2;}
</style>  
<div id="container" style="width:1200px;">
    <div class="clearfix mt10">
         <?php echo $this->fetch('library/help_menu.lbi'); ?>   
        <div class="right_content">
        	       <div style="width:980px; overflow:hidden"><?php echo $this->fetch('library/ur_here.lbi'); ?> </div>
            <div class="help_box">
            	<h3> <?php echo htmlspecialchars($this->_var['article']['title']); ?></h3>
                <div class="help_detail">
                 <?php if ($this->_var['article']['content']): ?>
          <?php echo $this->_var['article']['content']; ?>
         <?php endif; ?> 
                </div>
                <?php if ($this->_var['article']['open_type'] == 2 || $this->_var['article']['open_type'] == 1): ?><br />
         <div><a href="<?php echo $this->_var['article']['file_url']; ?>" target="_blank"><?php echo $this->_var['lang']['relative_file']; ?></a></div>
          <?php endif; ?>
            <div class="page" style="margin-bottom:10px; margin-left:20px;">
         
          <?php if ($this->_var['next_article']): ?>
            <?php echo $this->_var['lang']['next_article']; ?>:<a href="<?php echo $this->_var['next_article']['url']; ?>" class="f6"><?php echo $this->_var['next_article']['title']; ?></a><br />
          <?php endif; ?>
          
          <?php if ($this->_var['prev_article']): ?>
            <?php echo $this->_var['lang']['prev_article']; ?>:<a href="<?php echo $this->_var['prev_article']['url']; ?>" class="f6"><?php echo $this->_var['prev_article']['title']; ?></a>
          <?php endif; ?>
         </div>
            </div>
            
        </div>
    </div>
</div>
 


   
   <div style="height:0px; line-height:0px; clear:both;"></div>
      <?php echo $this->fetch('library/page_footer.lbi'); ?>   

 
  		<script type="text/javascript" src="themes/68ecshop_xiaomi/js/global_site_top.js" charset="utf-8"></script>
<script type="text/javascript" src="themes/68ecshop_xiaomi/js/global_site_bottom.js" charset="utf-8"></script>

<script type="text/javascript">
/*左侧菜单*/
jQuery(function(){
	jQuery("#help_list").find("h3").next("ul").hide();
	jQuery("#help_list").find("h3").eq(4).addClass("on")
	jQuery("#help_list").find("h3").eq(4).next("ul").show();
	jQuery("#help_list").find("h3").click(function(){
		var sub_list2 = jQuery(this).next("ul");
		if(sub_list2.is( ":visible")){
			sub_list2.slideUp();
			jQuery(this).removeClass("on");
		}else{
			jQuery("#help_list").find("h3").removeClass("on");
			jQuery("#help_list").find("h3").next().slideUp();
			sub_list2.slideDown();
			jQuery(this).addClass("on");
		}
	})
})
</script>
</body></html>