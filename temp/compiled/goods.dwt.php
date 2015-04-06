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
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="themes/68ecshop_xiaomi/css/style/style.css" />
<link type="text/css" rel="stylesheet" href="themes/68ecshop_xiaomi/css/style/MagicZoom.css" />
<link type="text/css" rel="stylesheet" href="themes/68ecshop_xiaomi/css/product_detail_b_page.css" />
<style>
.Right{float:right;}
.Left{float:left;}

.vip_price_info_show{ 
	font-size:12px; 
	font-family:"Courier New"; 
	float:right; 
	margin-right:80px; 
	margin-top:2px;
	/* IE HACK */ 
	float:none\9; 
	height:30px\9;
	line-height:23px\9;
	display:inline-block\9;
	margin:0 0 0 15px\9;
}
.vip_price_info_show a{color:#FF3C3C;}

p.there_pay_note{height:30px; line-height:30px; font-size:12px; text-indent:75px; clear:both;}
p.there_pay_note a{color:#06C;}
</style>
<SCRIPT src="themes/68ecshop_xiaomi/js/mz-packed.js" type=text/javascript></SCRIPT>
<script type="text/javascript" src="themes/68ecshop_xiaomi/js/action.js"></script>


<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.6.2.min.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>
<script type="text/javascript">
function $id(element) {
  return document.getElementById(element);
}
//切屏--是按钮，_v是内容平台，_h是内容库
function reg(str){
  var bt=$id(str+"_b").getElementsByTagName("h2");
  for(var i=0;i<bt.length;i++){
    bt[i].subj=str;
    bt[i].pai=i;
    bt[i].style.cursor="pointer";
    bt[i].onclick=function(){
      $id(this.subj+"_v").innerHTML=$id(this.subj+"_h").getElementsByTagName("blockquote")[this.pai].innerHTML;
      for(var j=0;j<$id(this.subj+"_b").getElementsByTagName("h2").length;j++){
        var _bt=$id(this.subj+"_b").getElementsByTagName("h2")[j];
        var ison=j==this.pai;
        _bt.className=(ison?"":"h2bg");
      }
    }
  }
  $id(str+"_h").className="none";
  $id(str+"_v").innerHTML=$id(str+"_h").getElementsByTagName("blockquote")[0].innerHTML;
}

</script>
</head>
<body style="background:#fff">
<script type="text/javascript">(function(){var screenWidth=window.screen.width;if(screenWidth>=1280){document.body.className="root_body";window.LOAD=true;}else{window.LOAD=false;}})()</script>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div class="block clearfix top_ad">

<?php echo $this->fetch('library/ad_position.lbi'); ?>

</div>

<div class="block box">
 <div id="ur_here" style="padding-bottom:5px; margin-top:10px;">
  <?php echo $this->fetch('library/ur_here.lbi'); ?>
 </div>
</div>

<div class="blank5"></div>
<div class="block clearfix">
<div class="goods_title">

     <h2 class="goods_sub_title red" id="JS_attr_sub_title">
	<?php echo $this->_var['goods']['act_title']; ?>
    </h2>
    </div>
    
   <div id="goodsInfo" class="clearfix">
   <div class="sub_l">
     
    <div id="show_pic" class="imgInfo" style="overflow: visible;width:385px; text-align:center;border: 1px solid #E9E9E9;background-color: #FFF;">
     
     <div style="width:380px; height:380px; margin-top:30px; margin-bottom:30px; margin-left:7px;">
     <?php if ($this->_var['pictures']): ?>
     <A href="<?php echo $this->_var['pictures']['0']['img_url']; ?>" id="goodsPic" class="MagicZoom" title=""  rel="selectors-effect:false;zoom-fade:true;thumb-change:mouseover;">
	 <img style="border:0px;padding:0;" id="img_url" src="<?php echo $this->_var['goods']['goods_img']; ?>" /></A>
     <?php else: ?>
     <img src="<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>"/>
     <?php endif; ?>	
     </div>	  
     <div class="blank5"></div>
     
     <div class="blank5"></div>
     
     <?php echo $this->fetch('library/goods_gallery.lbi'); ?>
     
    </div>
    

<div class="product_rel" style="margin-top:514px;">
    <div class="prod_l"><p class="product_id"><span><?php echo $this->_var['lang']['goods_sn']; ?></span><?php echo $this->_var['goods']['goods_sn']; ?></p></div>
             
        <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
      
        <a class="bds_tsina"></a>
        <a class="bds_tqq"></a>
      
        <span class="bds_more"></span>
        
        </div>
        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=0" ></script>
        <script type="text/javascript" id="bdshell_js"></script>
        <script type="text/javascript">
        document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
        </script>
        
    <p class="collect">
       <a rel="collect" href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>)">
    	<i></i>收藏<span id="detailFavNums"><?php 
$k = array (
  'name' => 'goods_collect',
  'goods_id' => $this->_var['id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></span>
        </a>
    </p>

</div>
</div>
      
                  <div class="mod_sku" id="detail_sku_main" style=" float:right">
                    <form action="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
                    <div class="prodname">
                    <h1  id="productMainName"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></h1>
                    <strong style="display: block;" id="productSubName"><?php echo $this->_var['goods']['goods_brief']; ?></strong>
                    </div>

                
        
        <div class="unit_light clearfix">
           <?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?>
                <ul class="mod_main  no_intel">
                    <li class="inte_check">
                        <div class="pricebox">
      						<?php echo $this->smarty_insert_scripts(array('files'=>'lefttime.js')); ?>
                            <span class="price_tag" id="price_lable"><em>特卖价</em></span>
                            <span class="price_num" id="current_price"><?php echo $this->_var['goods']['promote_price']; ?></span>
                            <del><em></em><?php echo $this->_var['goods']['shop_price']; ?></del>
                            <span class="price_countdown" style="color:#333; font-family:宋体">仅剩<span class="counttime" id="leftTime" ><?php echo $this->_var['lang']['please_waiting']; ?></span></span>   
                        </div>                      
                    </li>
                </ul>
                <?php else: ?>
                  <ul class="mod_main  no_intel">
                    <li class="inte_check">
                        <div class="pricebox">
                            <span class="price_tag" id="price_lable"><em>价格：</em></span>
                            <span class="price_num" id="current_price"><?php echo $this->_var['goods']['shop_price']; ?></span>
                            <span class="vip_price_info_show">加入<strong style="color:#C00">U+</strong>VIP年费会员，享更低折扣价格，<a href="javascript:void()">加入VIP年费会员</a></span>
                            <p class="there_pay_note">此商品支持&nbsp;<a href="javascript:void()">货到付款</a></p>
                        </div>                      
                    </li>
                </ul>
 			<?php endif; ?>
            <div class="p_sub" id="skuGoodCommentRate">
                <div class="subcon">
                    
                    <div class="mod_paise">
                        <p class="paise" style="">好评率 <span class="paise_rate"><?php echo $this->_var['haopinglv']; ?>%</span></p>
                        <p class="paise_num"><i></i>&nbsp;<a href="#goodsComment" id="goodsToComment"><?php echo $this->_var['review_count']; ?></a></p>
                    </div>
                </div>

            </div>
        </div>
  
	 
	<div class="mod_quote clearfix">
	    <div class="quote_main">
   
<div class="mod_address">
<p id="mod_salesvolume" class="mod_send_intergal mod_salesvolume clearfix"><span>销量：</span><?php echo $this->_var['order_num']; ?></p>
 
<ul style="width:565px; margin-left:9px;">
       <li style=" height:30px; line-height:30px; width:100%;">
      <font style="color:#333"><?php echo $this->_var['lang']['market_price']; ?></font><font class="market"><?php echo $this->_var['goods']['market_price']; ?></font>  
	  </li>
        <?php if ($this->_var['goods']['goods_brand'] != "" && $this->_var['cfg']['show_brand']): ?>
	  <li style=" height:30px; line-height:30px; ">
       <font style="color:#333"><?php echo $this->_var['lang']['goods_brand']; ?></font>
       <a href="<?php echo $this->_var['goods']['goods_brand_url']; ?>"  style="color:#CC0000">[<?php echo $this->_var['goods']['goods_brand']; ?>]</a> 
	  </li>
      <li style="height:30px; line-height:30px; font-size:12px;">送货至：<a href="javascript:void()" style="display:inline-block; border:1px solid #ccc; width:60px; height:30px; inline-height:30px; text-align:center;">旺苍县城</a>&nbsp;<strong>现货</strong>，当日18:00前下单并付款，预计30分钟-2小时内送达<br />此商品由U+易购自营提供&nbsp;&nbsp;<a href="javascript:void()" style="color:#06F">运费说明</a></li>
	  <?php endif; ?>  
       <div style="height:10px; line-height:10px; clear:both;"></div>
      <li>
      	<?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
?>
     <font style=" float:left; height:30px; line-height:30px; color:#333;width: 64px;font-size: 14px;font-family:微软雅黑;white-space: nowrap;overflow: hidden;
text-overflow: ellipsis;"> <?php echo $this->_var['spec']['name']; ?></font>
	    <div class="catt">
        
        <?php if ($this->_var['spec']['attr_type'] == 1): ?>
        <?php if ($this->_var['cfg']['goodsattr_style'] == 1): ?>
        <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
        <a <?php if ($this->_var['key'] == 0): ?>class="cattsel"<?php endif; ?> onclick="changeAtt(this)" href="javascript:;" name="<?php echo $this->_var['value']['id']; ?>" title="<?php echo $this->_var['value']['label']; ?>"><?php echo $this->_var['value']['label']; ?>
        <input style="display:none" id="spec_value_<?php echo $this->_var['value']['id']; ?>" type="radio" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" <?php if ($this->_var['key'] == 0): ?>checked<?php endif; ?> /></a>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
        <?php else: ?>
        <select name="spec_<?php echo $this->_var['spec_key']; ?>">
        <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
        <option label="<?php echo $this->_var['value']['label']; ?>" value="<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['label']; ?> <?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?><?php if ($this->_var['value']['price'] != 0): ?><?php echo $this->_var['value']['format_price']; ?><?php endif; ?></option>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </select>
        <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
        <?php endif; ?>
        <?php else: ?>
        <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
        <label for="spec_value_<?php echo $this->_var['value']['id']; ?>">
        <input type="checkbox" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>" onclick="changePrice()" />
        <?php echo $this->_var['value']['label']; ?> [<?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?> <?php echo $this->_var['value']['format_price']; ?>] </label>
        <br />
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
        <?php endif; ?>
  </div>
  <div style="height:10px; line-height:10px; clear:both;"></div>
      
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </li>
</ul>  
</div>
   
        		
			<div class="mod_cuputing  clearfix">
			    <div class=" clearfix">
			        <div class="computing_item">
                    <script language="javascript" type="text/javascript">  function goods_cut(){var num_val=document.getElementById('number');  var new_num=num_val.value;  var Num = parseInt(new_num);  if(Num>1)Num=Num-1;  num_val.value=Num;}  function goods_add(){var num_val=document.getElementById('number');  var new_num=num_val.value;  var Num = parseInt(new_num);  Num=Num+1;  num_val.value=Num;} </script> 
			            <div class="computing_num">
			                <input value="1" class="num" data-min="1" id="number" type="text" onblur="changePrice();">
			            </div>
			            <div class="computing_act">
			                <input class="add" type="button" onclick="goods_add();changePrice();">
			                <input class="no_reduce" type="button"  onclick="goods_cut();changePrice();">
			            </div>
			        </div>
			        <div class="cartbox">	            
		                	  <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="buy_btn4"><span>加入购物车</span></a>
					</div> 
			    </div>
			</div>
          	
</div>
							
						<div class="quote_sub">
                         
                        <div class="mod_pay clearfix" id="productskuFwbz" data-tpa="DETAIL_SKU_PAY_WAYS">
                            <ul class="pay_service" id="payServiceList">
                           
							       
							       <li class="haigou-hide-1"> <a target="_blank"><i></i>正品保障</a></li>
							       <li class="haigou-hide-1"> <a class="commit3" target="_blank"><i></i>售后无忧</a></li>
		                    	<li><a class="ser_unreturn">不支持7天无理由退货</a></li>
		                    	<li id="zengpiao-service"><a>增票服务</a></li>
                            </ul>
                            
			                   <div class="paylist" id="paylist">
				                   <a href="javascript:void(0);" class="paybtn">支付方式<i></i></a>                           
							       <ul>
							       
								   		<li>货到付款</li><li>网上支付</li><li>银行转账</li>
								 </ul>
							
			                </div>

                        </div>
                        
                   
                        <div class="mod_chat">
                            <div class="mobile_show " style=" position:relative">
                            	<a id="qrImg1" target="_blank" >
                                	<img class="mobile_img" src="themes/68ecshop_xiaomi/images/qcode.png" alt="" width="15" height="15">
                            	</a>
                                <span class="mobile_price">
                                  	U+易购客户端下单更方便
                                </span>
                                <i></i>
                            </div>
                            <div class="mobile_hover1" >
                               	<div class="mobile_img"><canvas style="display:none;"height="126" width="126"></canvas><img src="erweima_png.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" width=90 height=90></div>
                                <img src="" class="mobilezoom">
                            </div>
                        </div>
                      <script>
					  $(function(){
						$('.mod_chat').hover(function(){
								$('.mobile_hover1').fadeIn();
								$('.mobile_hover1 .mobilezoom').attr('src','themes/68ecshop_xiaomi/images/mobile.gif')
							},function(){
								$('.mobile_hover1').fadeOut();
								$('.mobile_hover1 .mobilezoom').attr('src','themes/68ecshop_xiaomi/images/mobile.gif')
							})  
					  })
							
					</script>
					</div>
                   </div>
				</form>
                </div>
                    
   </div>
<div class="blank"></div>

<script>
<!--
/*第一种形式 第二种形式 更换显示样式*/
function setTabglo(name,cursel,n){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
con.style.display=i==cursel?"block":"none";
menu.className=i==cursel?" current":"";
}
}
//-->
</script>

	
	
	
</div>
<DIV class="w clearfix group_area mt10" style="width:1200px; margin:0 auto;">
       <div class="grid_4" style="float:left; width:210px;margin-top:10px;">
        
	<div style="display: block;" id="detail_relatedCategoryAndBrand" calltype="hessian" class="mod_box related_list" data-tpa="DATAIL_LEFT_REL_BRAND">
	    <ul class="tabs clearfix">
	    		<li id="detail_relatedRecommTitle0" class="li1 selected">相关分类</li>
	        	<li id="detail_relatedRecommTitle1" class=""></li>
	    </ul>
	    	<ul style="display: block;" id="detail_relatedRecommContent0" attrtype="0" class="list_item">
            <?php
		 $parent_cat_id = get_parent_cat_id($GLOBALS['smarty']->_var['goods']['cat_id']);
		 $GLOBALS['smarty']->assign('child_cat',get_child_cat($parent_cat_id));
?>
<?php $_from = $this->_var['child_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['child_cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['child_cat']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['child_cat']['iteration']++;
?>
<li class="fst_item"><a href="<?php echo $this->_var['cat']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['cat']['name']); ?>"><em>■</em><span><?php echo htmlspecialchars($this->_var['cat']['name']); ?></span></a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	    	</ul>
	</div>

 
<div id="detail_cheapAdPM" class="mod_box same_goods" style="display:none;" data-tpa="DATAIL_LEFT_CHEAPADPM"></div>
 <?php echo $this->fetch('library/goods_related.lbi'); ?>
<?php echo $this->fetch('library/top101.lbi'); ?>
		
        
        
        
        
        
        </div>
<DIV class="Right group_r" style="width:980px;">
<DIV class=frameLay style=" margin:10px auto; height:320px;  _height:330px;">
<DIV class="showMyHome Left" style="position:relative; ">

<DIV class=layHead>
<DIV class="tabNav Left" >
<?php echo $this->fetch('library/wenzhangtit1.lbi'); ?>
</DIV>
</DIV>
<DIV class=layBody style="padding:0px; height:270px; _height:270px; ">

<DIV class="tabBody layBody" id=con_gloa_1 style="display:block;padding-top:0px; padding-left:0px;height:270px; _height:270px; ">

	  <?php echo $this->fetch('library/goods_compose.lbi'); ?>
	  
 
 </DIV>
  <DIV class="tabBody layBody" id=con_gloa_2 style="display:none; padding-top:0px; height:406px; ">

 <?php echo $this->fetch('library/goods_fittings.lbi'); ?>
  
  </DIV>
  

</DIV>

 
</DIV>
</DIV>
<?php if ($this->_var['best_goods']): ?>
<div class="extra_area mt10" style="overflow:hidden; width:980px;">
	<div class="extra_title">
		<ul id="JS_extra_change" class="extra_abs">
			<li id="JS_extra_po" class="current">精品推荐</li></ul>
	</div>
			<div  class="popular">
		<div class="stage">
			<table><tr>
            <?php
$GLOBALS['smarty']->assign('hot_goods', get_cat_recommend_goods('best', get_children($GLOBALS['smarty']->_var['goods']['cat_id']), 4));
?>
 <?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_item');$this->_foreach['cat_item_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat_item_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_item']):
        $this->_foreach['cat_item_goods']['iteration']++;
?>
				<td>
					<div class="list" style="padding:0 60px 0px 20px;*padding:0 20px;">
						<div class="img_box"><a href="<?php echo $this->_var['goods_item']['url']; ?>" title="<?php echo $this->_var['goods_item']['name']; ?>" target="_blank"><img src="<?php echo $this->_var['goods_item']['thumb']; ?>" alt="<?php echo $this->_var['goods_item']['name']; ?>" width="120" height="120" /></a></div>
						<div class="info" style=" color:#333">
							<?php echo $this->_var['goods_item']['short_style_name']; ?><br/>
							<span class="red yen"><?php echo $this->_var['goods_item']['shop_price']; ?></span><br />
                            <span></span><br />
							 &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:addToCart(<?php echo $this->_var['goods_item']['id']; ?>)"><img src="themes/68ecshop_xiaomi/images/goodscartbtn.gif"></a>
						</div>
					</div>
				</td>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>					
				</tr></table>
		</div>
			</div>
		</div>					    
		    		    
<?php endif; ?>
<style>
#product-detail{margin:-40px  0 0; padding-top:40px ; border:none;}
</style>
<div class="blank"></div>
 <div class="blank"></div>
   
     <div class="box">
     <div class="box_1 " id="product-detail" >

        <div id="com_b" class="clearfix" style="height: 40px;border: 1px solid #E5E5E5;box-shadow: 1px 1px 2px rgba(221, 221, 221, 0.6);background-color: #FAFAFA; width:978px;">
        <h2> <a href="#product-detail"  >商品描述</a></h2>
        <h2 class="h2bg"><a href="#product-detail"  >商品参数</a></h2>
        <?php if ($this->_var['package_goods_list']): ?>
        <h2 class="h2bg" style="color:red;"><a href="#product-detail"  ><?php echo $this->_var['lang']['remark_package']; ?></a></h2>
        <?php endif; ?>
		<h2 class="h2bg"><a href="#product-detail"  >用户评论</a></h2>
<h2 class="h2bg"><a href="#product-detail"  >售后服务</a></h2>
<h2 class="h2bg"  style="border-right:#E1E1E1 1px solid;"><a href="#product-detail"  >常见问题</a></h2>

        </div>

      <div id="com_v" ></div>

      <div id="com_h" style="border:1px solid red" >
       <blockquote>        <div class="blank"></div>
       <?php if ($this->_var['properties']): ?>
       <DIV style="BORDER-RIGHT: #eee 1px solid; PADDING-RIGHT: 20px; BORDER-TOP: #eee 1px solid; PADDING-LEFT: 20px; PADDING-BOTTOM: 10px; MARGIN: 10px 0px; BORDER-LEFT: #eee 1px solid; PADDING-TOP: 10px; BORDER-BOTTOM: #eee 1px solid; BACKGROUND-COLOR: #f9f9f9; TEXT-ALIGN: left">
<TABLE cellSpacing=0 cellPadding=2 width="100%" border=0>
  <TBODY>
  
   <?php $_from = $this->_var['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');$this->_foreach['name31'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name31']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
        $this->_foreach['name31']['iteration']++;
?>
    <?php if (($this->_foreach['name31']['iteration'] <= 1)): ?>
    <?php $_from = $this->_var['property_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'property');$this->_foreach['name12'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name12']['total'] > 0):
    foreach ($_from AS $this->_var['property']):
        $this->_foreach['name12']['iteration']++;
?>
     <?php if ($this->_foreach['name12']['iteration'] < 10): ?>
    <?php if (($this->_foreach['name12']['iteration'] - 1) % 3 == 0): ?>
  <TR>
  <?php endif; ?>
  
    <TD style=" COLOR: #999; LINE-HEIGHT: 30px; text-align:left;" 
    vAlign=top><?php echo htmlspecialchars($this->_var['property']['name']); ?>&nbsp;：&nbsp;<?php echo $this->_var['property']['value']; ?></TD>
 <?php if ($this->_foreach['name12']['iteration'] % 3 == 0): ?>
  </TR>
  <?php endif; ?>
   <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </TBODY></TABLE></DIV>
<?php endif; ?>
        <?php echo $this->_var['goods']['goods_desc']; ?>
            	<?php echo $this->fetch('library/comments.lbi'); ?>
<div class="blank"></div>
	
       </blockquote>
       <blockquote>        <div class="blank"></div>
       
        
        <div class="guige" id="JS_Tab_body_tupian">
	<div class="tab_title " style="width:968px;">
	<span class="icon"></span><h2>规格参数</h2>
</div>
<table class="norm_info mt10">
	
	<tr>
		<th colspan="2" class="norm_title f14">规格参数</th>
	</tr>
     <?php $_from = $this->_var['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
?>
        <?php $_from = $this->_var['property_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'property');if (count($_from)):
    foreach ($_from AS $this->_var['property']):
?>
		<tr>
		<th class="r norm_left"><?php echo htmlspecialchars($this->_var['property']['name']); ?></th>
		<td><?php echo $this->_var['property']['value']; ?></td>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        
	</tr>
	
	</table>
</div>        <div class="blank"></div>
       </blockquote>
     
       <?php if ($this->_var['package_goods_list']): ?>
       <blockquote>        <div class="blank"></div>
     
       <?php $_from = $this->_var['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods']):
?>
        <strong><?php echo $this->_var['package_goods']['act_name']; ?></strong><br />
        <table width="100%" border="0" cellpadding="3" cellspacing="1" class="norm_info mt10" bgcolor="#dddddd">
        <tr>
        <td bgcolor="#FFFFFF" style="padding:20px;">
          <?php $_from = $this->_var['package_goods']['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['goods_list']):
?>
          <a href="goods.php?id=<?php echo $this->_var['goods_list']['goods_id']; ?>" target="_blank"><font class="f1"><?php echo $this->_var['goods_list']['goods_name']; ?><?php echo $this->_var['goods_list']['goods_attr_str']; ?></font></a> &nbsp;&nbsp;X <?php echo $this->_var['goods_list']['goods_number']; ?><br />
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </td>
          <td bgcolor="#FFFFFF" style="padding:20px;">
          <strong><?php echo $this->_var['lang']['old_price']; ?></strong><font class="market"><?php echo $this->_var['package_goods']['subtotal']; ?></font><br />
          <strong><?php echo $this->_var['lang']['package_price']; ?></strong><font class="shop"><?php echo $this->_var['package_goods']['package_price']; ?></font><br />
          <strong><?php echo $this->_var['lang']['then_old_price']; ?></strong><font class="shop"><?php echo $this->_var['package_goods']['saving']; ?></font><br />
          </td>
          <td bgcolor="#FFFFFF" style="padding:20px;">
          <a href="javascript:addPackageToCart(<?php echo $this->_var['package_goods']['act_id']; ?>)" style="background:transparent"><img src="themes/68ecshop_xiaomi/images/bnt_buy_1.gif" alt="<?php echo $this->_var['lang']['add_to_cart']; ?>" /></a>
          </td>
        </tr>
       </table>
        <div class="blank"></div>
       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
       
       
     </blockquote>
       <?php endif; ?>
	   <blockquote>        <div class="blank"></div>
     	<?php echo $this->fetch('library/comments.lbi'); ?>
		
	 </blockquote>
	 
     
	  <blockquote>       
     <div class="blank"></div>
   <?php echo $this->fetch('library/shouhou.lbi'); ?>
     	</blockquote>
     <blockquote>       
     <div class="blank"></div>
     <?php echo $this->fetch('library/dinggou.lbi'); ?>
		
	 </blockquote>
     <blockquote>
       <div class="blank"></div>
     	 </blockquote>
      </div>

	 
     </div>
    </div>
    <script type="text/javascript">
    <!--
    reg("com");
    //-->
    </script>


	  

    </DIV>
</DIV>
<script type="text/javascript">
var obj11 = document.getElementById("com_b");
var top11 = getTop(obj11);
var isIE6 = /msie 6/i.test(navigator.userAgent);
window.onscroll = function(){

	var bodyScrollTop = document.documentElement.scrollTop || document.body.scrollTop;
	if (bodyScrollTop > top11){
		obj11.style.position = (isIE6) ? "absolute" : "fixed";
		obj11.style.top = (isIE6) ? bodyScrollTop + "px" : "0px";
	} else {
		obj11.style.position = "static";
	}
}
function getTop(e){

	var offset = e.offsetTop;
	if(e.offsetParent != null) offset += getTop(e.offsetParent);
	return offset;
}
</script>
</div>
<div style="height:0px; line-height:0px; clear:both;"></div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>

</body>
<script type="text/javascript">
var goods_id = <?php echo $this->_var['goods_id']; ?>;
var goodsattr_style = <?php echo empty($this->_var['cfg']['goodsattr_style']) ? '1' : $this->_var['cfg']['goodsattr_style']; ?>;
var gmt_end_time = <?php echo empty($this->_var['promote_end_time']) ? '0' : $this->_var['promote_end_time']; ?>;
<?php $_from = $this->_var['lang']['goods_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var goodsId = <?php echo $this->_var['goods_id']; ?>;
var now_time = <?php echo $this->_var['now_time']; ?>;


onload = function(){
  changePrice();
  fixpng();
  try {onload_leftTime();}
  catch (e) {}
}

/**
 * 点选可选属性或改变数量时修改商品价格的函数
 */
function changePrice()
{
  var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
  var qty = document.forms['ECS_FORMBUY'].elements['number'].value;

  Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
}

/**
 * 接收返回的信息
 */
function changePriceResponse(res)
{
  if (res.err_msg.length > 0)
  {
    alert(res.err_msg);
  }
  else
  {
    document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;

    if (document.getElementById('ECS_GOODS_AMOUNT'))
      document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
  }
}
/**
 * 颜色选择器
 */
function changeAtt(t) {
t.lastChild.checked='checked';
for (var i = 0; i<t.parentNode.childNodes.length;i++) {
        if (t.parentNode.childNodes[i].className == 'cattsel') {
            t.parentNode.childNodes[i].className = '';
        }
    }
t.className = "cattsel";
changePrice();
}

</script>

</html>
