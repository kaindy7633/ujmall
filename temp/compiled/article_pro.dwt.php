<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
</head>
<body>
<script type="text/javascript" src="themes/68ecshop_xiaomi/js/libs/jquery18.js" ></script>
   <?php echo $this->smarty_insert_scripts(array('files'=>'jquery.json.js,transport.js')); ?>
<?php echo $this->fetch('library/page_header.lbi'); ?>

  <?php echo $this->fetch('library/ur_here.lbi'); ?>
 
<div class="block">
  <div class="box">
    <h3  style="height:40px; text-indent:30px; line-height:40px; border:#E6E4E3 1px solid; background:#fafafa; border-bottom:none;"><span><?php echo htmlspecialchars($this->_var['article']['title']); ?></span></h3><div class="box_1">
   
    <div class="boxCenterList">
      <?php if ($this->_var['article']['content']): ?>
     <?php echo $this->_var['article']['content']; ?>
     <?php endif; ?>
    </div>
   </div>
  </div>
  <div class="blank5"></div>
</div>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>
