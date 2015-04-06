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

   <?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
<script type="text/javascript" src="themes/68ecshop_xiaomi/js/libs/jquery18.js" ></script>
   <?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>
<script type="text/javascript">
/*<![CDATA[*/
var mileftnav = "mileftnav";
var default_word = "2S后盖";
/*]]>*/
</script>
<link rel="stylesheet" type="text/css" href="themes/68ecshop_xiaomi/css/goods-category.min.css" />
<link rel="stylesheet" type="text/css" href="themes/68ecshop_xiaomi/css/base.min.css" />
<link type="text/css" rel="stylesheet" href="themes/68ecshop_xiaomi/css/product_detail_b_page.css" />
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>

        
<div class="container">
<div class="row mileftnav">
    <div class="span3" style="width:203px;	margin-top:10px;background:#fff; padding-top:10px;">
        
         <?php echo $this->fetch('library/top101.lbi'); ?>
          
     
    </div>
    <div class="span12" style="width:975px; margin-top:10px;">
       

        <div class="xm-box category-list-box">
        <?php echo $this->fetch('library/exchange_list.lbi'); ?>
         <div class="bd">
<?php echo $this->fetch('library/pages.lbi'); ?>
  </div>
 </div>
                    
        
    </div>
</div>
</div>


<?php echo $this->fetch('library/page_footer.lbi'); ?>
<script type="text/javascript" src="themes/68ecshop_xiaomi/js/categoryTree.js"></script>
<script type="text/javascript" src="themes/68ecshop_xiaomi/js/base.min.js"></script>
<script type="text/javascript">
XIAOMI.GLOBAL_CONFIG = {
}
XIAOMI.app.header.init();   
</script>
</body>
</html>
