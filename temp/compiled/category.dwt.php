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
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div class="searchwrap wrap">

<div class="mod_search_crumb" style="overflow:hidden">
<div class="crumbSlide" style="margin:10px 0 0 0">
<div class="crumbClip">
<?php echo $this->fetch('library/ur_here.lbi'); ?>
</div>


<small class="result_count" style="top:0px;">共<?php echo $this->_var['pager']['record_count']; ?>条</small>

</div>

 </div>
 </div>
<div style="margin-bottom: 35px; width:1200px; margin:0 auto" class="mod_search_guide clearfix" >
<div class="classWrap">


   <?php if ($this->_var['brands']['1']): ?>

	<div class="guide_box " id="pinpai" >
        <div class="guide_title"> <span>品牌</span> </div>
       	 	<div class="guide_main"> 
                <ul class="guide_con clearfix" >
                     <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['brand']):
?>
                           <li> <a href="<?php echo $this->_var['brand']['url']; ?>"> <span><?php echo $this->_var['brand']['brand_name']; ?></span> </a></li>        
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
	  
	    function pclick1(){     var pp=document.getElementById('pinpai');     pp.style.height='auto';
		document.getElementById('zhankaidiv').style.display="none";

		document.getElementById('shousuodiv').style.display="block"
		}
		function pclick2(){     var pp=document.getElementById('pinpai');     pp.style.height='34px';
		
		document.getElementById('zhankaidiv').style.display="block";

		document.getElementById('shousuodiv').style.display="none"
		}
		 </script>
<?php endif; ?>
<div class="guide_box" id="leibie">
<div class="guide_title"> <span>类别</span> </div>
        <div class="guide_main">
            <ul class="guide_con clearfix"  id="JS_brandList">
                <li><a href="<?php echo $this->_var['cat']['url']; ?>"><span>全部</span> </a> </li>
              <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
                <?php if ($this->_var['cat']['parent_id'] != 0): ?>
            
            <?php if ($this->_var['current_cat_pr_id'] == $this->_var['cat']['id'] || $this->_var['current_cat_pr2_id'] == $this->_var['cat']['id']): ?> 
            <li class="current"><a href="<?php echo $this->_var['cat']['url']; ?>"><span><?php echo $this->_var['cat']['name']; ?></span></a></li>
            <?php else: ?>
              <li><A href="<?php echo $this->_var['cat']['url']; ?>"><span><?php echo $this->_var['cat']['name']; ?></span></A> </li>
            <?php endif; ?>
            <?php else: ?>
            
            <?php if ($this->_var['current_cat_pr_id'] == $this->_var['cat']['id']): ?>
            <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
            <?php if ($this->_var['current_cat_pr2_id'] == $this->_var['child']['id']): ?>
            <li class="current"><a href="<?php echo $this->_var['child']['url']; ?>"><span><?php echo htmlspecialchars($this->_var['child']['name']); ?></span></a></li>
            
            <?php else: ?>
              <LI><A href="<?php echo $this->_var['child']['url']; ?>"><span><?php echo $this->_var['child']['name']; ?></span></A> </LI>
              <?php endif; ?>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php endif; ?>
            <?php endif; ?>
                     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
        </div>
           <div class="multiple_choice">
            <a href="#" class="more more_open" hidefocus="true" onclick="pclick3()" id="zhankaidiv1">更多<i></i></a>
            <a href="#" class="more more_close"  style="display:none"  onclick="pclick4()" id="shousuodiv1">收起<i></i></a>
            </div>
</div>
 <script>    
	  var pp1=document.getElementById('leibie');     
	   pp1.style.height='34px' ;
	        pp1.style.overflow='hidden' ;      //点击显示全部
	  
	    function pclick3(){     var pp=document.getElementById('leibie');     pp1.style.height='auto';
		document.getElementById('zhankaidiv1').style.display="none";

		document.getElementById('shousuodiv1').style.display="block"
		}
		function pclick4(){     var pp=document.getElementById('leibie');     pp1.style.height='34px';
		
		document.getElementById('zhankaidiv1').style.display="block";

		document.getElementById('shousuodiv1').style.display="none"
		}
		 </script>
	<?php if ($this->_var['price_grade']['1']): ?>
<div class="guide_box ">
<div class="guide_title"> <span><?php echo $this->_var['lang']['price']; ?></span> </div>
    <div class="guide_main">
        <ul class="guide_con clearfix">
         <?php $_from = $this->_var['price_grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'grade');if (count($_from)):
    foreach ($_from AS $this->_var['grade']):
?>
             <li> <a href="<?php echo $this->_var['grade']['url']; ?>"> <span><?php echo $this->_var['grade']['price_range']; ?></span> </a> </li>
                 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
    </div>
</div>
<?php endif; ?>
<?php $_from = $this->_var['filter_attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter_attr_0_91912700_1427423848');if (count($_from)):
    foreach ($_from AS $this->_var['filter_attr_0_91912700_1427423848']):
?>
<div class="guide_box ">
<div class="guide_title"> <span><?php echo htmlspecialchars($this->_var['filter_attr_0_91912700_1427423848']['filter_attr_name']); ?>：</span> </div>
    <div class="guide_main">
        <ul class="guide_con clearfix" id="xiangguan">
        <?php $_from = $this->_var['filter_attr_0_91912700_1427423848']['attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attr');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
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
<div class="clearfix" style=" width:1200px; margin:0 auto">
<div class="layout_search_sidebar" style="margin-top:9px;">
 <?php echo $this->fetch('library/hotchanpin.lbi'); ?> 
 <?php echo $this->fetch('library/top10.lbi'); ?> 
</div>
<div class="layout_search_main">
 <?php echo $this->fetch('library/goods_list.lbi'); ?> 

 <?php echo $this->fetch('library/pages.lbi'); ?> 
 <?php echo $this->fetch('library/best_nei.lbi'); ?>
</div>
</div>
</div>
<div style="height:0px; clear:both"></div>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
 

      <script type="text/javascript" src="themes/68ecshop_xiaomi/js/categoryTree.js"></script>
     <script type="text/javascript" src="themes/68ecshop_xiaomi/js/base.min.js"></script>


</body></html>