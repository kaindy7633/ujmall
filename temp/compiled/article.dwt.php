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
<body style="background:#fff" >
<?php echo $this->fetch('library/page_header.lbi'); ?>
  <link rel="stylesheet" type="text/css" href="themes/68ecshop_xiaomi/css/goodsDetail.min.css" />
<div class="help-box" style=" width:1200px;">
<div style="line-height:35px;"><?php echo $this->fetch('library/ur_here.lbi'); ?></div>
  <div class="help-l" style="width:205px;">
    <?php echo $this->fetch('library/article_category_tree.lbi'); ?>

    
  </div>
  
  
  <div class="proDescrip_con" style="width:980px;">
    <div class="box">
     <div class="box_1" style="1px solid #DBDBDB">
      <div style="background-color:#fff; padding:20px 15px;">
         <div class="tc" style="padding:8px;">
         <font class="f5 f6"><?php echo htmlspecialchars($this->_var['article']['title']); ?></font><br /><font class="f3"><?php echo htmlspecialchars($this->_var['article']['author']); ?> / <?php echo $this->_var['article']['add_time']; ?></font>
         </div>
         <?php if ($this->_var['article']['content']): ?>
          <?php echo $this->_var['article']['content']; ?>
         <?php endif; ?>
         <?php if ($this->_var['article']['open_type'] == 2 || $this->_var['article']['open_type'] == 1): ?><br />
         <div><a href="<?php echo $this->_var['article']['file_url']; ?>" target="_blank"><?php echo $this->_var['lang']['relative_file']; ?></a></div>
          <?php endif; ?>
         <div style="padding:8px; margin-top:15px; text-align:left; border-top:1px solid #ccc;">
         
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
  <div class="blank"></div>
  <?php echo $this->fetch('library/comments.lbi'); ?>

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
</html>
