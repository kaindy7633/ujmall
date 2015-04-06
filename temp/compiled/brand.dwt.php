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

<script type="text/javascript" src="themes/68ecshop_xiaomi/js/libs/jquery18.js" ></script>
<?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>
   
<script type="text/javascript">
/*<![CDATA[*/
var mileftnav = "mileftnav";
var default_word = "2S后盖";
/*]]>*/
</script>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="themes/68ecshop_xiaomi/css/goods-category.min.css" />

</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div class="container">
<div class="row mileftnav">
    <div class="span3">
        
         <?php echo $this->fetch('library/top10.lbi'); ?>
          
       
        
        <?php echo $this->fetch('library/history.lbi'); ?>
        
    </div>
    <div class="span12">
         <div class="proDescrip_con">
     <div class="box_1">
      <h3><span><?php echo $this->_var['brand']['brand_name']; ?></span></h3>
      <div class="boxCenterList">
        <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
        <tr>
          <td bgcolor="#ffffff" width="200" align="center" valign="middle">
          <div style="width:200px; overflow:hidden;">
          <?php if ($this->_var['brand']['brand_logo']): ?>
            <img src="data/brandlogo/<?php echo $this->_var['brand']['brand_logo']; ?>" />
            <?php endif; ?>
          </div>
          </td>
          <td bgcolor="#ffffff">
          <?php echo nl2br($this->_var['brand']['brand_desc']); ?><br />
            <?php if ($this->_var['brand']['site_url']): ?>
            <?php echo $this->_var['lang']['official_site']; ?> <a href="<?php echo $this->_var['brand']['site_url']; ?>" target="_blank" class="f6"><?php echo $this->_var['brand']['site_url']; ?></a><br />
            <?php endif; ?>
            <?php echo $this->_var['lang']['brand_category']; ?><br />
            <div class="brandCategoryA">
              <?php $_from = $this->_var['brand_cat_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
            <a href="<?php echo $this->_var['cat']['url']; ?>" class="f6"><?php echo htmlspecialchars($this->_var['cat']['cat_name']); ?> <?php if ($this->_var['cat']['goods_count']): ?>(<?php echo $this->_var['cat']['goods_count']; ?>)<?php endif; ?></a>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>  
         </td>
        </tr>
      </table>
      </div>
     </div>
    </div>
    <div class="blank5"></div>
  
        <div class="xm-box category-list-box">
             <?php echo $this->fetch('library/goods_list.lbi'); ?>
                   <div class="bd">
                    <?php echo $this->fetch('library/pages.lbi'); ?>
                     </div>
         </div>
                    
        
    </div>
</div>



</div>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
  		<script type="text/javascript" src="themes/68ecshop_xiaomi/js/global_site_top.js" charset="utf-8"></script>
<script type="text/javascript" src="themes/68ecshop_xiaomi/js/global_site_bottom.js" charset="utf-8"></script>
        <script type="text/javascript">
    
        XIAOMI.GLOBAL_CONFIG = {
        }
XIAOMI.app.header.init();   
   
     
     
    </script>
</body>
</html>
