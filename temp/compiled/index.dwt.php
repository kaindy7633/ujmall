<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<title><?php echo $this->_var['page_title']; ?></title>




<style type="text/css">
.mod_iframe1{width:240px; height:220px;}
.mod_iframe1 .tabs {
    height: 32px;
}
.mod_iframe1 .tabs a {
    float: left;
    height: 31px;
    cursor: pointer;
    background: none repeat scroll 0% 0% #F7F7F7;
    line-height: 31px;
    border-right: 1px solid #EEE;
	border-left: 1px solid #EEE;
	border-bottom: 1px solid #EEE;
    border-width: 0px 1px 1px;
    border-style: none solid solid;
    border-color: -moz-use-text-color #EEE #EEE;
    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    border-image: none;
    margin-left: -1px;
    text-align: center;
    width: 119px;
}
.mod_iframe1 .tabs .hover{background:#Fff; border-top:1px solid #eee; border-bottom:0px;}
.content{width:240px; height:178px;}
.content ul li{width: 220px;height: 20px;line-height: 20px;margin-left: 20px;margin-top: 10px;}

#floorNative{width:1200px; margin:0 auto;}
#floorNative h2{color:#FF3300; font-family: "微软雅黑", "Courier New", Courier, monospace; padding:5px 0;}
#nativeContent{border-top:#FF3300 solid 2px;}
#nativeContent ul{width:100%; margin-top:5px;}
#nativeContent ul li.group_li_area{
	float:left;
	width:230px; 
	height:300px; 
	border:1px solid #efefef;
	margin-right:8px;
}


.title_gyttc a{color:#C00; font-weight:bold;}

</style>
 
 <?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.6.2.min.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,index.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>
<link type="text/css" rel="stylesheet" href="themes/68ecshop_xiaomi/css/global_site_index_new.css" />

<link type="text/css" rel="stylesheet" href="themes/68ecshop_xiaomi/css/seconde_time_development.css" />


</head>
<body  class="w1200" >
 <?php echo $this->fetch('library/page_header-index.lbi'); ?>
 <div style="clear:both; height:0px; line-height:0px"></div>
<div class="layout_main">

<div class="laybox banner_slider clearfix" id="firstScreen">
 <?php echo $this->fetch('library/index_ad3.lbi'); ?>
<div class="layout_col_b">
<div class="mod_exclusivity" data-tpa="YHD_HOME_BAMBOO_RIGHT_YHZX">
<h3>U+易购专享</h3>
<ol>
<li><a href="javascript:void()"><img src="themes/68ecshop_xiaomi/images/shiyong.png">0元试用</a></li>
<li><a href="javascript:void()" ><img src="themes/68ecshop_xiaomi/images/vip.jpg">会员俱乐部</a></li>
<li><a href="javascript:void()"><img src="themes/68ecshop_xiaomi/images/lipin.jpg">礼品卡</a></li>
</ol>
</div>
<script type="text/javascript">
function setContentTab(name, curr, n) {
    for (i = 1; i <= n; i++) {
        var menu = document.getElementById(name + i);
        var cont = document.getElementById("con_" + name + "_" + i);
        menu.className = i == curr ? "hover" : "";
        if (i == curr) {
            cont.style.display = "block";
        } else {
            cont.style.display = "none";
        }
    }
}
</script>
<div class="mod_iframe1">
<p class="tabs">
    <a id="two1" onmouseover="setContentTab('two',1,2)" class="hover">公告</a>
 	<a id="two2" onmouseover="setContentTab('two',2,2)">新闻</a>

</p>
				<div id="con_two_1" class="content" style="display: block;">
					 <ul class="news_list">
    			
<?php $this->assign('articles',$this->_var['articles_12']); ?><?php $this->assign('articles_cat',$this->_var['articles_cat_12']); ?><?php echo $this->fetch('library/cat_articles.lbi'); ?>

					</ul>
				</div>
                <div id="con_two_2" class="content" style="display:none;">
					 <ul class="news_list">
    				
<?php $this->assign('articles',$this->_var['articles_11']); ?><?php $this->assign('articles_cat',$this->_var['articles_cat_11']); ?><?php echo $this->fetch('library/cat_articles.lbi'); ?>

					</ul>
				</div>
</div>
</div>
</div>

 <?php echo $this->fetch('library/bannerxia.lbi'); ?>
        
        <div class="index_column_ad">
  
<?php $this->assign('ads_id','246'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>


        </div>
        
        
        <script>
         function adPlay(id){
		  $(id+' .trig_box li a').mouseover(function(){
		   $(this).addClass('cur').siblings().removeClass();
		   $(this).siblings().find('span').css('width',0)
		   $(this).find('span').css('width',30);
		   $(id+' .img_box').animate({left:-$(this).index()*330},500);
		  })
		  var num=0;
		  function autoplay(){
			num++;
			if(num>2){
			 num=0
			}
			$(id+' .trig_box li a span').css('width',0).hide();
			$(id+' .trig_box li a').eq(num).addClass('cur').siblings().removeClass();
			$(id+' .trig_box li a').eq(num).find('span').show().animate({width:30},2500);
			$(id+' .img_box').animate({left:-num*330},500);
		   }
		   $(id).hover(function(){
			clearInterval(mytime);
		   },function(){
			mytime=setInterval(autoplay,2500);
		   })
		   var mytime=setInterval(autoplay,2500);
		  }
		 adPlay('.slider_index_ad1');
		 adPlay('.slider_index_ad2');
		adPlay('.slider_index_ad3');
		 adPlay('.slider_index_ad4');
		 adPlay('.slider_index_ad5');
		 adPlay('.slider_index_ad6');
		 adPlay('.slider_index_ad7');
        </script>
        
            <div class="wrap mod_index_floor clearfix" id="floorSx" data-tpa="YHD_NHOME_SXHG">
         	<?php echo $this->fetch('library/title1.lbi'); ?>
            <div class="a_con">
     		<?php echo $this->fetch('library/title_1.lbi'); ?>
            <a>
            
<?php $this->assign('ads_id','257'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

            </a>
            </div>
            <div class="b_con">
            <div class="slider_index_ad1 slider_index_ad" id="sxSliderIndexAd">
            <ul class="img_box clearfix" data-tpc="5">
            
<?php $this->assign('ads_id','255'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

             
<?php $this->assign('ads_id','202'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

            
<?php $this->assign('ads_id','107'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

            </ul>
            <ul class="trig_box">
            <li class="clearfix">
            <a class="cur"><span></span></a>
            <a><span></span></a>
            <a><span></span></a>
            </li>
            </ul>
            </div>
            </div>
            <div class="c_con" data-tpc="6">
            <a> 
<?php $this->assign('ads_id','258'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            <a> 
<?php $this->assign('ads_id','259'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            </div>
            <div class="d_con" data-tpc="7">
            <a> 
<?php $this->assign('ads_id','260'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            </div>
            <div class="e_con" data-tpc="8">
            <a> 
<?php $this->assign('ads_id','261'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            <a> 
<?php $this->assign('ads_id','262'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            </div>
            </div>
            
             
                <div class="wrap mod_index_floor clearfix" id="floorSx" data-tpa="YHD_NHOME_SXHG">
                <?php echo $this->fetch('library/title2.lbi'); ?>
                <div class="a_con">
                <?php echo $this->fetch('library/title_2.lbi'); ?>
                <a>
                
<?php $this->assign('ads_id','263'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

                </a>
                </div>
                <div class="b_con">
                <div class="slider_index_ad slider_index_ad2" id="customSliderIndexAd_INDEX2_FLOOR7" >
                <ul class="img_box clearfix" data-tpc="5">
                
<?php $this->assign('ads_id','264'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

                 
<?php $this->assign('ads_id','265'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

                
<?php $this->assign('ads_id','266'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

                </ul>
                <ul class="trig_box">
                <li class="clearfix">
                <a class="cur"><span></span></a>
                <a><span></span></a>
                <a><span></span></a>
                </li>
                </ul>
                </div>
                </div>
                <div class="c_con" data-tpc="6">
                <a> 
<?php $this->assign('ads_id','267'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                <a> 
<?php $this->assign('ads_id','268'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                </div>
                <div class="d_con" data-tpc="7">
                <a> 
<?php $this->assign('ads_id','269'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                </div>
                <div class="e_con" data-tpc="8">
                <a> 
<?php $this->assign('ads_id','270'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                <a> 
<?php $this->assign('ads_id','271'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                </div>
                </div>
            
             
            <div class="wrap mod_index_floor clearfix" id="floorSx" data-tpa="YHD_NHOME_SXHG">
         	<?php echo $this->fetch('library/title3.lbi'); ?>
            <div class="a_con">
     		<?php echo $this->fetch('library/title_3.lbi'); ?>
            <a>
					
<?php $this->assign('ads_id','272'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

                    </a>
            </div>
            <div class="b_con">
            <div class="slider_index_ad slider_index_ad3" id="foodSliderIndexAd">
            <ul class="img_box clearfix" data-tpc="5">
						
<?php $this->assign('ads_id','273'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

                         
<?php $this->assign('ads_id','274'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

					
<?php $this->assign('ads_id','275'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

            </ul>
            <ul class="trig_box">
            <li class="clearfix">
            <a class="cur"><span></span></a>
            <a><span></span></a>
            <a><span></span></a>
            </li>
            </ul>
            </div>
            </div>
            <div class="c_con" data-tpc="6">
                    <a> 
<?php $this->assign('ads_id','276'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                    <a> 
<?php $this->assign('ads_id','277'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            </div>
            <div class="d_con" data-tpc="7">
                    <a> 
<?php $this->assign('ads_id','278'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            </div>
            <div class="e_con" data-tpc="8">
                    <a> 
<?php $this->assign('ads_id','279'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                    <a> 
<?php $this->assign('ads_id','280'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            </div>
            </div>
            
        
        <div class="wrap mod_index_floor clearfix">
    	<?php echo $this->fetch('library/title4.lbi'); ?>
        <div class="a_con">
       <?php echo $this->fetch('library/title_4.lbi'); ?>
       <a class="pic">
       
<?php $this->assign('ads_id','233'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

</a>
        </div>
        <div class="b_con">
        <div class="slider_index_ad slider_index_ad4" id="xhSliderIndexAd">
        <ul style="left: -660px;" class="img_box clearfix" data-tpc="5">
        
<?php $this->assign('ads_id','234'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

       
<?php $this->assign('ads_id','235'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

        
<?php $this->assign('ads_id','236'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

        </ul>
        <ul class="trig_box">
        <li class="clearfix">
        <a class=""><span style="width: 0px; overflow: hidden;"></span></a>
        <a class=""><span style="width: 0px; overflow: hidden;"></span></a>
        <a class="cur"><span style="width: 37.9686%; overflow: hidden;"></span></a>
        </li>
        </ul>
        </div>
        </div>
        <div class="c_con" data-tpc="6">
       
<?php $this->assign('ads_id','237'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
      
<?php $this->assign('ads_id','238'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

        </div>
        <div class="d_con" data-tpc="7">
         
<?php $this->assign('ads_id','239'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

        </div>
        <div class="e_con" data-tpc="8">
        <a>
        
<?php $this->assign('ads_id','240'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
        </div>
        <div class="f_con clearfix" data-tpc="9">
        <div class="f1">
       
<?php $this->assign('ads_id','241'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

        </div>
        <div class="f2">
        
<?php $this->assign('ads_id','242'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

        </div>
        <div class="f3">
       
<?php $this->assign('ads_id','243'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

        </div>
        <div class="f4">
        
<?php $this->assign('ads_id','244'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

        </div>
        <div class="f5">
       
<?php $this->assign('ads_id','245'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

        </div>
        </div>
        </div>
        
                     
            <div class="wrap mod_index_floor clearfix" id="floorSx" data-tpa="YHD_NHOME_SXHG">
         	<?php echo $this->fetch('library/title5.lbi'); ?>
            <div class="a_con">
     		<?php echo $this->fetch('library/title_5.lbi'); ?>
            <a>
					
<?php $this->assign('ads_id','281'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

                    </a>
            </div>
            <div class="b_con">
            <div class="slider_index_ad slider_index_ad5" id="customSliderIndexAd_INDEX2_FLOOR8">
            <ul class="img_box clearfix" data-tpc="5">
						
<?php $this->assign('ads_id','282'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

                         
<?php $this->assign('ads_id','283'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

					
<?php $this->assign('ads_id','284'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

            </ul>
            <ul class="trig_box">
            <li class="clearfix">
            <a class="cur"><span></span></a>
            <a><span></span></a>
            <a><span></span></a>
            </li>
            </ul>
            </div>
            </div>
            <div class="c_con" data-tpc="6">
                    <a> 
<?php $this->assign('ads_id','285'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                    <a> 
<?php $this->assign('ads_id','286'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            </div>
            <div class="d_con" data-tpc="7">
                    <a> 
<?php $this->assign('ads_id','287'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            </div>
            <div class="e_con" data-tpc="8">
                    <a> 
<?php $this->assign('ads_id','288'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                    <a> 
<?php $this->assign('ads_id','289'); ?><?php $this->assign('ads_num','0'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            </div>
            </div>
            
            
            <div class="wrap mod_index_floor clearfix" id="floor3c">
     	<?php echo $this->fetch('library/title6.lbi'); ?>
            <div class="a_con">
     		<?php echo $this->fetch('library/title_6.lbi'); ?>
            <a>
					
<?php $this->assign('ads_id','290'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

                    </a>
            </div>
            <div class="b_con">
            <div class="slider_index_ad slider_index_ad6" id="customSliderIndexAd_INDEX2_FLOOR8">
            <ul class="img_box clearfix" data-tpc="5">
						
<?php $this->assign('ads_id','291'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

                         
<?php $this->assign('ads_id','292'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>


					
<?php $this->assign('ads_id','293'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

            </ul>
            <ul class="trig_box">
            <li class="clearfix">
            <a class="cur"><span></span></a>
            <a><span></span></a>
            <a><span></span></a>
            </li>
            </ul>
            </div>
            </div>
           <div class="c_con" data-tpc="6">
                    <a> 
<?php $this->assign('ads_id','294'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                    <a> 
<?php $this->assign('ads_id','295'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            </div>
            <div class="d_con" data-tpc="7">
                    <a> 
<?php $this->assign('ads_id','296'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            </div>
            <div class="e_con" data-tpc="8">
                    <a> 
<?php $this->assign('ads_id','297'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                    <a> 
<?php $this->assign('ads_id','298'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            </div>
            </div>
            
            
            <div class="wrap mod_index_floor clearfix" id="floorLbsg" data-tpa="YHD_NHOME_LBSG">
               <?php echo $this->fetch('library/title7.lbi'); ?>
                <div class="a_con">
                <ul class="tag clearfix" data-tpc="3">
              <?php echo $this->fetch('library/title_7.lbi'); ?>
                </ul>
                
                <script>
                	$(function(){
					 var lis=$('#lbBrands ul li').length;
					 var num=0;
					 $('#lbBrands ul').append($('#lbBrands ul').html());
					 $('#lbBrands .btn_next').click(function(){
					  num++;
					  if(num>lis){
					   num=1;
					   $('#lbBrands ul').css('left',0)
					  }
					  $('#lbBrands ul').stop().animate({left:-num*100},500);
					 })
					 $('#lbBrands .btn_prev').click(function(e) {
					  num--
					  if(num<0){
					   num=lis-1;
					   $('#lbBrands ul').css('left',-lis*100)
					  }
					  $('#lbBrands ul').stop().animate({left:-num*100},500)
					  //alert(num)
					 
					 });
					})
                </script>
                <div class="brands" id="lbBrands">
                <div class="img_box">
                <ul style="left: -100px;" data-tpc="4">
                <li>
                  <?php $_from = $this->_var['brand_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');$this->_foreach['brand_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['brand_list']['total'] > 0):
    foreach ($_from AS $this->_var['brand']):
        $this->_foreach['brand_list']['iteration']++;
?>
                     <?php if ($this->_foreach['brand_list']['iteration'] < 5): ?>
                <a href="<?php echo $this->_var['brand']['url']; ?>"><img  src="data/brandlogo/<?php echo $this->_var['brand']['brand_logo']; ?>" width="100" height="40"></a>
                <?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </li>
                <li>
                                  <?php $_from = $this->_var['brand_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');$this->_foreach['brand_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['brand_list']['total'] > 0):
    foreach ($_from AS $this->_var['brand']):
        $this->_foreach['brand_list']['iteration']++;
?>
                     <?php if ($this->_foreach['brand_list']['iteration'] < 9 && $this->_foreach['brand_list']['iteration'] > 4): ?>

                <a href="<?php echo $this->_var['brand']['url']; ?>"><img  src="data/brandlogo/<?php echo $this->_var['brand']['brand_logo']; ?>" width="100" height="40"></a>
                               <?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </li>
                <li>
                                  <?php $_from = $this->_var['brand_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');$this->_foreach['brand_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['brand_list']['total'] > 0):
    foreach ($_from AS $this->_var['brand']):
        $this->_foreach['brand_list']['iteration']++;
?>
                       <?php if ($this->_foreach['brand_list']['iteration'] < 13 && $this->_foreach['brand_list']['iteration'] > 8): ?>

                 <a href="<?php echo $this->_var['brand']['url']; ?>"><img  src="data/brandlogo/<?php echo $this->_var['brand']['brand_logo']; ?>" width="100" height="40"></a>
                              <?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </li>
                </ul>
                </div>
                <a class="btn btn_prev" href="javascript:;"></a>
                <a class="btn btn_next" href="javascript:;"></a>
                </div>
                </div>
                <div class="b_con">
                <div class="slider_index_ad slider_index_ad7" id="lbSliderIndexAd">
                <ul class="img_box clearfix" style="left: -660px;" data-tpc="5">
                
<?php $this->assign('ads_id','306'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

             
<?php $this->assign('ads_id','307'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

                 
<?php $this->assign('ads_id','308'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

                </ul>
                <ul class="trig_box">
                <li class="clearfix">
                <a class=""><span style="width: 0px; overflow: hidden;"></span></a>
                <a class=""><span style="width: 0px; overflow: hidden;"></span></a>
                <a class="cur"><span style="width: 99.567%; overflow: hidden;"></span></a>
                </li>
                </ul>
                </div>
                </div>
                <div class="g_con" data-tpc="6">
                <a> 
<?php $this->assign('ads_id','309'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                </div>
                <div class="d_con" data-tpc="7">
                <a> 
<?php $this->assign('ads_id','310'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                </div>
                <div class="e_con" data-tpc="8">
                <a> 
<?php $this->assign('ads_id','311'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                </div>
                <div class="f_con clearfix" data-tpc="9">
                <div class="f1">
               <a> 
<?php $this->assign('ads_id','312'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                </div>
                <div class="f2">
                <a> 
<?php $this->assign('ads_id','313'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                </div>
                <div class="f3">
               <a> 
<?php $this->assign('ads_id','314'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                </div>
                <div class="f4">
                <a> 
<?php $this->assign('ads_id','315'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                </div>
                <div class="f5">
                 <a> 
<?php $this->assign('ads_id','316'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                </div>
                </div>
                </div>
            
            

           <div class="wrap mod_index_floor clearfix" id="floor3c" data-tpa="YHD_NHOME_LBSG">
     	<?php echo $this->fetch('library/title8.lbi'); ?>
            <div class="a_con">
     		<?php echo $this->fetch('library/title_8.lbi'); ?>
            <a>
					
<?php $this->assign('ads_id','317'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>

                    </a>
            </div>
            <div class="b_con">
            <div class="slider_index_ad slider_index_ad6" id="customSliderIndexAd_INDEX2_FLOOR8">
            <ul class="img_box clearfix" data-tpc="5">
						
<?php echo $this->fetch('library/ad_position.lbi'); ?>

                         
<?php echo $this->fetch('library/ad_position.lbi'); ?>


					
<?php echo $this->fetch('library/ad_position.lbi'); ?>

            </ul>
            <ul class="trig_box">
            <li class="clearfix">
            <a class="cur"><span></span></a>
            <a><span></span></a>
            <a><span></span></a>
            </li>
            </ul>
            </div>
            </div>
           <div class="c_con" data-tpc="6">
                    <a> 
<?php $this->assign('ads_id','319'); ?><?php $this->assign('ads_num','1'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                    <a> 
<?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            </div>
            <div class="d_con" data-tpc="7">
                    <a> 
<?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            </div>
            <div class="e_con" data-tpc="8">
                    <a> 
<?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
                    <a> 
<?php echo $this->fetch('library/ad_position.lbi'); ?>
</a>
            </div>
            </div>

            
            



</div>

<div class="wrap mod_index_floor clearfix" id="floorNative">
	<h2>U+团团</h2>
    <div id="nativeContent">
        <ul>
            <li class="group_li_area"><a href="#"><img src="themes/68ecshop_xiaomi/images/group_img_1.jpg" /></a></li>
            <li class="group_li_area"><a href="#"><img src="themes/68ecshop_xiaomi/images/group_img_2.jpg" /></a></li>
            <li class="group_li_area"><a href="#"><img src="themes/68ecshop_xiaomi/images/group_img_3.jpg" /></a></li>
            <li class="group_li_area"><a href="#"><img src="themes/68ecshop_xiaomi/images/group_img_4.jpg" /></a></li>
            <li class="group_li_area"><a href="#"><img src="themes/68ecshop_xiaomi/images/group_img_5.jpg" /></a></li>
        </ul>
    </div>
</div>

<div id="scence_guide" style="clear:both; background-color:#F9F9F9;"></div>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body></html>