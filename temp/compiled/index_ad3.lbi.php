<style type="text/css">
.banner-bg1{background-color:#6fd4ff;}
.banner-bg2{background-color:#991721;}
.banner-bg3{background-color:#990000;}
.banner-bg4{background-color:#ff9933;}
.banner-bg5{background-color:#c1d3e9;}
.banner-bg6{background-color:#c20627;}
.banner-bg7{background-color:#ffad41;}
.banner-bg8{background-color:#006DB5;}
</style>
<script>
      $(function(){
		  $('#promo_show').mouseover(function(){
			  	$('.show_pre,.show_next').show();
				clearInterval(bannerTime);
		 }).mouseout(function(){
			 $('.show_pre,.show_next').hide();	
			 bannerTime=setInterval(bannerPlay,3000)
		})
		  var lis=$('#lunboNum li').length;
		  var num=0;
		  $('.show_next').click(function(){
			  num++;
			  if(num>lis){
				num=0;  
			  }
			  $('#slider li').eq(num).hide().fadeIn().siblings().hide();
			  $('#lunboNum li').eq(num).addClass('cur').siblings().removeClass();
		  }) 
		   $('.show_pre').click(function(){
			  num--;
			  if(num<0){
				num=lis-1;  
			  }
			 
			  $('#slider li').eq(num).fadeIn().siblings().hide();
			  $('#lunboNum li').eq(num).addClass('cur').siblings().removeClass();
		  }) 
		  $('#lunboNum li').mouseover(function(){
			   //alert($(this).index());
			$(this).addClass('cur').siblings().removeClass();
			$('#slider li').eq($(this).index()).hide().fadeIn().siblings().hide(); 
		  })
		  function bannerPlay(){
			  num++;
			  if(num>lis-1){
				num=0;  
			  }
			  $('#slider li').eq(num).hide().fadeIn().siblings().hide();
			  $('#lunboNum li').eq(num).addClass('cur').siblings().removeClass();	  
		  }
		  var bannerTime=setInterval(bannerPlay,3000)
	  })
</script>
<div id="promo_show" class="mod_promo_show">
<div class="promo_wrapper" id="index_menu_carousel">
<ol id="slider" class="clearfix">
	 <?php $_from = $this->_var['flash']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'flash_0_24770000_1427417391');$this->_foreach['myflash'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myflash']['total'] > 0):
    foreach ($_from AS $this->_var['flash_0_24770000_1427417391']):
        $this->_foreach['myflash']['iteration']++;
?>
<li style="position: absolute; z-index: 0; display: none;" class="banner-bg<?php echo $this->_foreach['myflash']['iteration']; ?>">
<a  class="big_pic global_loading" >
<img id="lunbo_<?php echo $this->_foreach['myflash']['iteration']; ?>" src="<?php echo $this->_var['flash_0_24770000_1427417391']['src']; ?>">
</a>
</li>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ol>
</div>
<div class="mod_promonum_show">
<ul class="clearfix" id="lunboNum">
  <?php $_from = $this->_var['flash']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'flash_0_24784400_1427417391');$this->_foreach['myflash'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myflash']['total'] > 0):
    foreach ($_from AS $this->_var['flash_0_24784400_1427417391']):
        $this->_foreach['myflash']['iteration']++;
?>
    <li flag="{$smarty.foreach.myflash.index" <?php if ($this->_foreach['myflash']['iteration'] == 4): ?>class="cur"<?php endif; ?> href="javascript:void(0);"></li><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>
<a style="display: none; outline: medium none;" href="javascript:void(0);" class="show_next"><s></s></a>
<a style="display: none;" href="javascript:void(0);" class="show_pre"><s></s></a>
</div>