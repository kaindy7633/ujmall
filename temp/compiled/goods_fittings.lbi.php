
<?php if ($this->_var['fittings']): ?>

<div class="GD_w1000 GD_pt_body" style="border:none; ">
  <div class="height15"></div>
  
  <div class="GD_pt_lists" style="height:260px;  overflow-x:scroll;"> 
  
  <table>
  <tr>
  
    <?php $_from = $this->_var['fittings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_10095400_1427469383');if (count($_from)):
    foreach ($_from AS $this->_var['goods_0_10095400_1427469383']):
?>
  <td>  
    <div class="GD_pt_good" style="height:225px;">
      <div class="GD_pt_good_img"><a href="<?php echo $this->_var['goods_0_10095400_1427469383']['url']; ?>" target="_blank"><img class="GD_pt_good_pic"  src="<?php echo $this->_var['goods_0_10095400_1427469383']['goods_thumb']; ?>" height="141" width="141" /></a></div>
      <div class="height10"></div>
      <div class="GD_pt_info" style="line-height:20px;">
        <div style="text-align:left"> <a href="<?php echo $this->_var['goods_0_10095400_1427469383']['url']; ?>">
          <label class="GD_pt_name pointer"><?php echo htmlspecialchars($this->_var['goods_0_10095400_1427469383']['short_name']); ?></label>
          </a> <?php echo $this->_var['lang']['fittings_price']; ?><font class="shop_s"><?php echo $this->_var['goods_0_10095400_1427469383']['fittings_price']; ?></font><br>
           </div>
        <div class="clear"></div>
      </div>
    </div>
    </td>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tr>
    </table>
    <div class="clear"></div>
  </div>

</div>

<?php endif; ?> 

