
<?php if ($this->_var['goods']['goods_id']): ?>
    <div class="pro-inner">
      <div class="proImg-wrap"> <a href="<?php echo $this->_var['goods']['url']; ?>"> <img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"/> </a> </div>
      <div class="proInfo-wrap">
	<div class="proTitle"> <a href="<?php echo $this->_var['goods']['url']; ?>"><?php echo $this->_var['goods']['goods_name']; ?></a> </div>

	<div class="proPrice"> <em><?php if ($this->_var['goods']['promote_price']): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></em> </div>
       <div class="proSales"> 销量:<em><?php echo $this->_var['goods']['wap_count']; ?></em> </div>
	  <?php if ($this->_var['goods']['promote_price'] != ""): ?>
	<div class="proIcons"><img src="themesmobile/68ecshopcom_mobile/img/goods_new.png" /> </div>
	<?php endif; ?>
      </div>
    </div>
<?php endif; ?>
	
