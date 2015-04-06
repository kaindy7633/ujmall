<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title><?php echo $this->_var['page_title']; ?></title>
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<link rel="stylesheet" type="text/css" href="themesmobile/68ecshopcom_mobile/css/ecsmart.css"/>
<link type="text/css" rel="stylesheet" href="themesmobile/68ecshopcom_mobile/css/jquery.ecsmart.menu.css" />


<script type="text/javascript" src="themesmobile/68ecshopcom_mobile/js/TouchSlide.1.1.js"></script>
</head>
<body>

<div id="page" class="showpage">
<div>
<header id="header" class='header'>
     <a href="#menu" class="top_bt fl"></a>
     <span href="javascript:void(0)" class="logo"></span>
    <a href="user.php"> <div class='user_btn'></div></a>
</header>
<?php echo $this->fetch('library/index_ad.lbi'); ?>
<div id="fake-search" >
      <div class="fakeInput">
        <input  type="text" id="search_text" class="search_text" value="请输入您所搜索的商品"/>
          <input type="button" id="get_search_box" class="search_submit" value=""/>
        </div>

</div>
<div class="entry-list clearfix"> 
  <a href="catalog.php"> 
  <img alt="商品类目" src="themesmobile/68ecshopcom_mobile/img/1_19.png" /><br>
    <span>商品类目</span> </a> 
 
    <a href="brand.php"> <img alt="小京东" src="themesmobile/68ecshopcom_mobile/img/1_21.png"/><br>
    <span>小京东</span> </a> 
 
    <a href="user.php"> <img alt="用户中心"  src="themesmobile/68ecshopcom_mobile/img/1_23.png" /><br>
    <span>用户中心</span> </a>
   
    <a class="region-fav" href="article_cat.php?id=2"> <img alt="帮助中心"  src="themesmobile/68ecshopcom_mobile/img/1_25.png" ><br>
    <span>帮助中心</span> </a>

    <a href="flow.php"> <img alt="购物车" src="themesmobile/68ecshopcom_mobile/img/1_34.png" /><br>
    <span>购物车</span> </a> 
   
    <a href="share.php"> <img alt="分享" src="themesmobile/68ecshopcom_mobile/img/1_35.png" /><br>
    <span>分享</span> </a> 
   
    <a href="map.php"> <img alt="地图" src="themesmobile/68ecshopcom_mobile/img/1_36.png"><br>
    <span>地图</span> </a>
    <a href="tel:4000785268"> <img alt="联系我们" src="themesmobile/68ecshopcom_mobile/img/1_38.png" /><br>
    <span>联系我们</span> </a> 
    </div>
    

<?php echo $this->fetch('library/recommend_promotion.lbi'); ?> 
<?php echo $this->fetch('library/recommend_new.lbi'); ?> 
<?php echo $this->fetch('library/recommend_best.lbi'); ?> 
<?php echo $this->fetch('library/recommend_hot.lbi'); ?> 
<?php echo $this->fetch('library/cat_goods1.lbi'); ?> 
<?php echo $this->fetch('library/cat_goods2.lbi'); ?> 
<?php echo $this->fetch('library/cat_goods3.lbi'); ?> 
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</div>

<div id="search_hide" class="search_hide">
<div class="search_title">请输入您所搜索的关键字 <span class="close"> 关闭 </span> </div>
<div class="search_body">
  <div class="search_box">
    <form action="search.php" method="post" id="searchForm" name="searchForm">
      <div>
        <input class="text" type="search" name="keywords" id="keywordBox" autofocus>
        <button type="submit" value="搜 索" ></button>
      </div>
    </form>
  </div>
</div>
</div>
<nav id="menu">
<ul class="Selected">
<li><a href="javascript:void(0)" class="mm-subclose1">商品分类</a></li>
<?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
<li>
<a href="<?php echo $this->_var['cat']['url']; ?>" ><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a>
						<ul >
                         <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
							<li>
								<a href="<?php echo $this->_var['child']['url']; ?>"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a>
                                <?php if ($this->_var['child']['cat_id']): ?>
								<ul>
                                 <?php $_from = $this->_var['child']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'childer');if (count($_from)):
    foreach ($_from AS $this->_var['childer']):
?>
								 <li><a href="<?php echo $this->_var['childer']['url']; ?>"><?php echo htmlspecialchars($this->_var['childer']['name']); ?></a></li>
								 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
								</ul>
                                <?php endif; ?>
							</li>
                             <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            
</ul>
</li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
</ul>
</nav>
<script type="text/javascript" src="themesmobile/68ecshopcom_mobile/js/jquery.js"></script>
<script type="text/javascript" src="themesmobile/68ecshopcom_mobile/js/jquery.mmenu.js"></script>
<script type="text/javascript">
			$(function() {
				$('nav#menu').mmenu();
			});
</script>
<?php echo $this->fetch('library/footer_nav.lbi'); ?>

</div>

<script type="text/javascript">

$(function() {

	$('#search_text').click(function(){
		$(".showpage").children('div').hide();
		$("#search_hide").css('position','fixed').css('top','0px').css('width','100%').css('z-index','999').show();
	})
	$('#get_search_box').click(function(){
		$(".showpage").children('div').hide();
		$("#search_hide").css('position','fixed').css('top','0px').css('width','100%').css('z-index','999').show();
	})
	$("#search_hide .close").click(function(){
		$(".showpage").children('div').show();
		$("#search_hide").hide();
	})
});
</script>
</body>
</html>