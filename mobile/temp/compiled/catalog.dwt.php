<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title><?php echo $this->_var['page_title']; ?></title>
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<script type="text/javascript" src="themesmobile/68ecshopcom_mobile/js/jquery.js"></script>
<link rel="stylesheet" href="themesmobile/68ecshopcom_mobile/css/ecsmart.css">
</head>
<body >
<header id="header" class='header'>
<h1>类目浏览</h1>
<a href="javascript:history.back(-1)" class="back">返回</a>
</header>

<div class="ccontainer">

  
<div class="clist">
 <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['name']['iteration']++;
?>
    <ul>
      <li class="crow level1" style="border-bottom:#D8D8D8 1px solid;">
        <div class="crow_row" style=" background:#FFF;">   
         <div class="crow_icon"> <img alt="" src="themesmobile/68ecshopcom_mobile/img/catalog/catalogbg<?php echo $this->_foreach['name']['iteration']; ?>.png"> </div>      
          <div class="crow_title"> <a href="<?php echo $this->_var['cat']['url']; ?>"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a> </div>
          <div class="crow_arrow"></div>
          <div>&nbsp;</div>
        </div>
      </li>
   
      <ul class="clist clist_sub" style="opacity: 1; display: none;">
      
      
      
        <li class="crow ">
         <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
        <div class="crow_two">
        <a href="<?php echo $this->_var['child']['url']; ?>" ><?php echo htmlspecialchars($this->_var['child']['name']); ?></a>
        </div>
        
        <div class="crow_padd clearfix">
       
<?php if ($this->_var['child']['cat_id']): ?> <div class="padd10"><?php $_from = $this->_var['child']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer');$this->_foreach['cat22'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat22']['total'] > 0):
    foreach ($_from AS $this->_var['childer']):
        $this->_foreach['cat22']['iteration']++;
?><a href="<?php echo $this->_var['childer']['url']; ?>" class="crow_item" ><?php echo $this->_var['childer']['name']; ?></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></div><?php endif; ?>

          </div>
          
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </li>
      </ul>
     
    </ul>
    
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
  </div>
  <script type="text/javascript">
	$(function(){
		 $('.level1').click(function(){
			$(this).next().slideToggle("slow");
			 $(this).toggleClass("crow_arrow_shang");
		});
	})
</script>

  <?php echo $this->fetch('library/footer_nav.lbi'); ?>
</body>
</html>