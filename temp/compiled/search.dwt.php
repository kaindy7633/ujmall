<?php
/* 代码增加_start Byjdy */
$is_category_index=$GLOBALS['db']->getOne("select category_index from ". $GLOBALS['ecs']->table('category') ." where cat_id=". $GLOBALS['smarty']->_var['category']);
if ( $is_category_index == '1' and !$_REQUEST['price_min'] and !$_REQUEST['price_max'] and !$_REQUEST['brand'] and !$_REQUEST['filter_attr'])
{
	require_once ("themes/". $GLOBALS['_CFG']['template'] ."/lib_category_index.php" );	
}
/* 代码增加_end Byjdy */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<title><?php echo $this->_var['page_title']; ?></title>



<link href="themes/68ecshop_xiaomi/css/global_site_simplify.css" rel="stylesheet" type="text/css">
<link href="themes/68ecshop_xiaomi/css/search_table2.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="themes/68ecshop_xiaomi/js/libs/jquery18.js" ></script>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,utils.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>
</head>
<body id="comParamId" data-param="{&quot;globalPageCode&quot;:&quot;YHD_SEARCH&quot;,&quot;currPageId&quot;:&quot;52&quot;}" class="w1200">
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div class="searchwrap wrap">
<input id="csstype" name="csstype" value="simplify" type="hidden">
<input id="searchword" value="" reqmode="0" type="hidden"><input id="searchCategory" value="20947" type="hidden">
<input id="curCategoryIdToGlobal" value="20947" type="hidden">
<input id="pflag" value="0" type="hidden">
<input id="categoryIdForPms" value="20947" type="hidden">
<input id="categoryIdForAdv" value="20947" type="hidden">
<input id="matchCategoryIdForAdv" value="0" type="hidden">
<input id="mandyRunable" value="0" type="hidden">
<input id="ad_nextblockStartIndex" value="22" type="hidden">
<input id="ad_currentPageno" value="0" type="hidden">

<!--<div style="height:44px;"></div>-->
<div class="mod_search_crumb" data-tpa="SEARCH_MAIN_CRUMB">
<div class="crumbSlide" style="margin:0px; margin-top:10px;">
<div class="crumbClip">
<?php echo $this->fetch('library/ur_here.lbi'); ?>
</div>


<small class="result_count">共<?php echo $this->_var['pager']['record_count']; ?>条</small>

</div>

  
<div style="margin-bottom: 35px;" class="mod_search_guide clearfix" >


   <?php if ($this->_var['brands']['1']): ?>
<div class="classWrap">
<div class="guide_box " id="pinpai" >
<div class="guide_title"> <span>品牌</span> </div>
<div class="guide_main"> <span class="arrow"></span>
<ul class="guide_con clearfix" >
     <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand_0_09369400_1427427358');if (count($_from)):
    foreach ($_from AS $this->_var['brand_0_09369400_1427427358']):
?>
           <li> <a href="<?php echo $this->_var['brand_0_09369400_1427427358']['url']; ?>"> <span><?php echo $this->_var['brand_0_09369400_1427427358']['brand_name']; ?></span> </a></li>        
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
</div>
<div class="multiple_choice">
<a href="#" class="more more_open" hidefocus="true" onclick="pclick1()" id="zhankaidiv">更多<i></i></a>
<a href="#" class="more more_close"  style="display:none"  onclick="pclick2()" id="shousuodiv">收起<i></i></a>

</div>
</div>
 <script>    
	  var pp=document.getElementById('pinpai');     
	   pp.style.height='34px' ;
	        pp.style.overflow='hidden' ;      //点击显示全部
	  
	    function pclick1(){     var pp=document.getElementById('pinpai');     pp.style.height='60px';
		document.getElementById('zhankaidiv').style.display="none";

		document.getElementById('shousuodiv').style.display="block"
		}
		function pclick2(){     var pp=document.getElementById('pinpai');     pp.style.height='34px';
		
		document.getElementById('zhankaidiv').style.display="block";

		document.getElementById('shousuodiv').style.display="none"
		}
		 </script>
<?php endif; ?>
<?php if ($this->_var['price_grade']['1']): ?>
<div class="guide_box ">
<div class="guide_title"> <span>价格</span> </div>
<div class="guide_main"> <span class="arrow"></span>
<ul class="guide_con clearfix" id="jiage">
 <?php $_from = $this->_var['price_grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'grade');if (count($_from)):
    foreach ($_from AS $this->_var['grade']):
?>
     <li> <a href="<?php echo $this->_var['grade']['url']; ?>"> <span><?php echo $this->_var['grade']['price_range']; ?></span> </a> </li>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>
</div>
<?php endif; ?>
<?php $_from = $this->_var['filter_attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter_attr');if (count($_from)):
    foreach ($_from AS $this->_var['filter_attr']):
?>
<div class="guide_box ">
<div class="guide_title"> <span><?php echo htmlspecialchars($this->_var['filter_attr']['filter_attr_name']); ?>：</span> </div>
<div class="guide_main"> <span class="arrow"></span>
<ul class="guide_con clearfix" id="xiangguan">
<?php $_from = $this->_var['filter_attr']['attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attr');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['attr']):
        $this->_foreach['name']['iteration']++;
?>
<li> <a href="<?php echo $this->_var['attr']['url']; ?>"> <span><?php echo $this->_var['attr']['attr_value']; ?></span> </a> </li>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>
</div>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</div>
<div class="clearfix">
<div class="layout_search_sidebar" style="margin-top:9px;">
 <?php echo $this->fetch('library/hotchanpin.lbi'); ?> 
 <?php echo $this->fetch('library/top10.lbi'); ?> 
</div>
<div class="layout_search_main">
 <?php echo $this->fetch('library/seachgoods_list.lbi'); ?> 

 <?php echo $this->fetch('library/pages.lbi'); ?> 
</div>
</div>
<?php echo $this->fetch('library/best_nei.lbi'); ?>
</div> </div>
</div>
<div id="scence_guide" style="clear:both;"></div>





<?php echo $this->fetch('library/page_footer.lbi'); ?>
</div>


 
</body></html>