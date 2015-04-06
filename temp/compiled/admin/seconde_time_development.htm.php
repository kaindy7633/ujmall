<!-- $Id: seconde_time_development.htm 2015-03-18 by liuzhen $ -->
<?php echo $this->fetch('pageheader.htm'); ?>

<div class="main-div">
	<!-- 首页头部紧急通知模块功能设置html代码区域 -->
	<div id="index_head_urgent_note">
		<h4>首页头部紧急通知区块内容及显示设置：</h4>
        <form method="post" action="seconde_time_development.php?act=add_index_head_even">
        	<p><input type="text" name="urget_note_content" value="" style="width:400px; height:22px; line-height:22px; font-size:13px;" /><input type="submit" name="submit" value="确认发布并显示" /><input type="submit" name="submit" value="关闭紧急事件显示" /></p>
        </form>
	</div>
</div>
<?php echo $this->fetch('pagefooter.htm'); ?>