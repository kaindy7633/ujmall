<style>
	.scrollimg{position:relative; overflow:hidden; margin:0px auto; /* 设置焦点图最大宽度 */}
	.scrollimg .hd{position:absolute; height:18px; line-height:18px; bottom:0; right:0; z-index:1;}
	.scrollimg .hd li{display:inline-block;  display: inline-block; background-color: rgba(255,255,255,0); border: 1px rgba(255,255,255,0.5) solid; width: 6px; height: 6px; border-radius: 6px; margin-right: 5px; text-indent:-9999px; overflow:hidden;}
	.scrollimg .hd li.on{background:#fff;}
	.scrollimg .bd{position:relative; z-index:0;}
	.scrollimg .bd li{position:relative; text-align:center;}
	.scrollimg .bd li img{background:url(themes/68ecshop_xiaomi/images/loading.gif) center center no-repeat;  vertical-align:top; width:100%;/* 图片宽度100%，达到自适应效果 */}
	.scrollimg .bd li a{-webkit-tap-highlight-color:rgba(0,0,0,0);}  /* 去掉链接触摸高亮 */
	.scrollimg .bd li .tit{display:block; width:100%;  position:absolute; bottom:0; text-indent:10px; height:28px; line-height:28px; background:url(themes/68ecshop_xiaomi/images/focusBg.png) repeat-x; color:#fff;  text-align:left;}
</style>
<div id="scrollimg" class="scrollimg">

				<div class="bd">
					<ul>
			<?php $_from = $this->_var['wap_index_ad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['wap_index_ad'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['wap_index_ad']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['wap_index_ad']['iteration']++;
?>
          <li><a href="<?php echo $this->_var['ad']['url']; ?>"><img src="<?php echo $this->_var['ad']['image']; ?>" width="100%" /></a></li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</ul>
				</div>

				<div class="hd">
					<ul></ul>
				</div>
			</div>
			<script type="text/javascript">
				TouchSlide({ 
					slideCell:"#scrollimg",
					titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
					mainCell:".bd ul", 
					effect:"leftLoop", 
					autoPage:true,//自动分页
					autoPlay:true //自动播放
				});
			</script>

