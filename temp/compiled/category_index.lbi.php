<style type="text/css">
body{background:white;font-family:'Lucida Grande',​tahoma,​arial,​宋体;}
html{position:relative;}
*{margin:0px;padding:0px;}
img{border:0px;}
li{list-style:none;}
/*轮换大区域*/
.lunhuan{width:100%;height:300px;position:relative;}
.lunhuan #lunhuanback{width:100%;height:300px;position:absolute;left:0px;top:0px;overflow:hidden;}
.lunhuan #lunhuanback p{width:100%;height:300px;position:absolute;left:0px;top:0px;opacity:0;filter:alpha(opacity=0);background-repeat:no-repeat;background-position:50% 0px;}
.lunhuan .lunhuan_main{width:1190px;height:300px;margin:0 auto;position:relative;}
/*左侧所有商品列表*/
.suoyouliebiao{width:239px;position:absolute;left:0px;top:0px;border-left:1px solid #E6E6E6;border-bottom:1px solid #E6E6E6;z-index:200;box-shadow:5px 5px 5px rgba(0, 0, 0, 0.2);}
/*轮换中间区域*/
.lunhuancenter{width:994px;height:300px;position:absolute;left:206px;top:0px;}
.lunhuancenter .centergif{display:block;width:994px;height:300px;position:absolute;left:0px;top:0px;z-index:4;}
.lunhuancenter b{position:absolute;left:-6px;top:0px;opacity:0;filter:alpha(opacity=0);z-index:3;width:994px;height:300px;display:block;}
#lunbonum{height:14px;line-height:23px;position:absolute;left:19px;top:273px;z-index:5;}
#lunbonum li{width:14px;height:14px;float:left;margin-right:9px;background:#B4B4B4;border-radius:14px;cursor:pointer;}
#lunbonum .lunboone{background:#C80002;cursor:pointer;}
</style>
<script type="text/javascript">
$(document).ready(function(){
    var ali=$('#lunbonum li');
    var aPage=$('#lunhuanback p');
    var aslide_img=$('.lunhuancenter b');
    var iNow=0;
	
    ali.each(function(index){	
        $(this).mouseover(function(){
            slide(index);
        })
    });
	
    function slide(index){	
        iNow=index;
        ali.eq(index).addClass('lunboone').siblings().removeClass();
		aPage.eq(index).siblings().stop().animate({opacity:0},600);
		aPage.eq(index).stop().animate({opacity:1},600);	
        aslide_img.eq(index).stop().animate({opacity:1,top:0},600).siblings('b').stop().animate({opacity:0,top:0},600);
    }
	
	function autoRun(){	
        iNow++;
		if(iNow==ali.length){
			iNow=0;
		}
		slide(iNow);
	}
	
	var timer=setInterval(autoRun,4000);
		
    ali.hover(function(){
		clearInterval(timer);
	},function(){
		timer=setInterval(autoRun,4000);
    });
})
</script>
<div class="lunhuan">
      <?php
		 $GLOBALS['smarty']->assign('huandeng_img',get_advlist('频道页-分类ID'.$GLOBALS['smarty']->_var['category'].'-中间幻灯轮播大图',9));
	  ?>
    <div id="lunhuanback">
        <?php $_from = $this->_var['huandeng_img']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad_0_66497500_1427427701');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad_0_66497500_1427427701']):
        $this->_foreach['index_image']['iteration']++;
?>
        <p style='background-image:url(themes/68ecshop_xiaomi/images/images/banner/b<?php echo $this->_foreach['index_image']['iteration']; ?>.jpg);'></p>
       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </div>
    <div class="lunhuan_main">
        
        <div class="lunhuancenter">
                <?php $_from = $this->_var['huandeng_img']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad_0_66508700_1427427701');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad_0_66508700_1427427701']):
        $this->_foreach['index_image']['iteration']++;
?>
            <b class='slideUp' style='background-image:url(<?php echo $this->_var['ad_0_66508700_1427427701']['image']; ?>);'></b>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            
            <ul id='lunbonum'>
                <?php $_from = $this->_var['huandeng_img']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad_0_66516900_1427427701');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad_0_66516900_1427427701']):
        $this->_foreach['index_image']['iteration']++;
?>
                <li <?php if (($this->_foreach['index_image']['iteration'] <= 1)): ?>class='lunboone'<?php endif; ?>></li>
   				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            </ul>
            
        </div>
        
    </div>
</div>
