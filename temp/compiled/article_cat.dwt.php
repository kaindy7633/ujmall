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
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
<script type="text/javascript" src="themes/68ecshop_xiaomi/js/libs/jquery18.js" ></script>
   <?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>
   <script type="text/javascript">
/*<![CDATA[*/
var needChioce = false;
var default_word = "";
/*]]>*/
</script> 
</head>
<body>

<?php echo $this->fetch('library/page_header.lbi'); ?>
<div class="help-box" style="width:1200px;">
 <div style="line-height:35px"><?php echo $this->fetch('library/ur_here.lbi'); ?></div>
<form action="<?php echo $this->_var['search_url']; ?>" name="search_form" method="post" class="article_search" style="text-align:right;">
        <input name="keywords" type="text" id="requirement" value="<?php echo $this->_var['search_value']; ?>" class="inputBg" />
        <input name="id" type="hidden" value="<?php echo $this->_var['cat_id']; ?>" />
        <input name="cur_url" id="cur_url" type="hidden" value="" />
        <input type="submit" value="<?php echo $this->_var['lang']['button_search']; ?>" class="bnt_blue_1" />
      </form>
      <div style="height:0px; line-height:0px; clear:both;"></div>
  
  <div class="help-l" style="width:205px">
   <?php echo $this->fetch('library/article_category_tree.lbi'); ?>

    
  </div>
  
  
  <div class="proDescrip_con" style=" width:980px;">
 
    <div >
        
<div class="art_cat_box" style="background:#FFF;">
      <table width="100%" border="0" cellpadding="5" cellspacing="0" style="border:#CCC 1px solid; height:40px; line-height:40px;">
      <tr style="height:40px; line-height:40px;">
        <th style="background:#fafafa"><?php echo $this->_var['lang']['article_title']; ?></th>
          <th style="background:#fafafa"><?php echo $this->_var['lang']['article_author']; ?></th>
          <th style="background:#fafafa"><?php echo $this->_var['lang']['article_add_time']; ?></th>
        </tr>
      <?php $_from = $this->_var['artciles_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
      <tr>
        <td><a style="text-decoration:none" href="<?php echo $this->_var['article']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['article']['title']); ?>" class="f6"><?php echo $this->_var['article']['short_title']; ?></a></td>
          <td align="center"><?php echo $this->_var['article']['author']; ?></td>
          <td align="center"><?php echo $this->_var['article']['add_time']; ?></td>
        </tr>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    </div>
    </div>

  <div class="blank5"></div>
  <?php echo $this->fetch('library/pages.lbi'); ?>
  </div>  
  
  <div style="height:0px; line-height:0px; clear:both;"></div>
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
<script type="text/javascript">
document.getElementById('cur_url').value = window.location.href;
</script>
</html>
