<form action="flow.php" method="post" name="theForm" id="theForm" action="flow.php">
<?php echo $this->fetch('app/address_checkout_app.lbi'); ?>
<?php echo $this->fetch('app/list_checkout_app.lbi'); ?>


<?php if ($this->_var['total']['real_goods_count'] != 0): ?>
<div class="dian_bg padding1 ub-ac m_t0_8">
	<div class="ulev-app2 dian_title ub" style="background-image:url(img/checkout_icon2.png)">配送方式</div>	
     <div class="c-wh umar-at4 p-left-1 t-666666 ulev-4">
         
     <?php $_from = $this->_var['shipping_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');if (count($_from)):
    foreach ($_from AS $this->_var['shipping']):
?>
     <?php if ($this->_var['shipping']['shipping_code'] != 'pups'): ?>
          
		   <div class="ps_h">
			<?php if ($this->_var['order']['shipping_id'] == $this->_var['shipping']['shipping_id']): ?>
            <label class="ub ub-ac">
				<input style="display:none" name="shipping" type="radio" value="<?php echo $this->_var['shipping']['shipping_id']; ?>" id="shipping_<?php echo $this->_var['shipping']['shipping_id']; ?>"  supportCod="<?php echo $this->_var['shipping']['support_cod']; ?>" insure="<?php echo $this->_var['shipping']['insure']; ?>" onclick="selectShipping(this)" supoortPickup="<?php echo $this->_var['shipping']['support_pickup']; ?>" checked=true  />
                
            	<div class="radio_style radio_on"><?php echo $this->_var['shipping']['shipping_name']; ?></div>
            </label>
			<?php else: ?>
			<label  class="ub ub-ac">
				<input style="display:none" name="shipping" type="radio" value="<?php echo $this->_var['shipping']['shipping_id']; ?>" id="shipping_<?php echo $this->_var['shipping']['shipping_id']; ?>"  supportCod="<?php echo $this->_var['shipping']['support_cod']; ?>" insure="<?php echo $this->_var['shipping']['insure']; ?>" onclick="selectShipping(this)" supoortPickup="<?php echo $this->_var['shipping']['support_pickup']; ?>"  />
                
            	<div class="radio_style radio_off"><?php echo $this->_var['shipping']['shipping_name']; ?></div>
            </label>
			<?php endif; ?>
         </div>
     <?php endif; ?>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	<div class="ub ub-ac" style="border-top:1px solid #EEEEEE; padding-top:0.5em;">
      <div class="ub-f1"></div>
      <div class="ub-pe" style="margin-right:0.5em;">
	<input name="need_insure" id="ECS_NEEDINSURE" type="checkbox"  onclick="selectInsure(this.checked)" value="1" <?php if ($this->_var['order']['need_insure']): ?>checked="true"<?php endif; ?> <?php if ($this->_var['insure_disabled']): ?>disabled="true"<?php endif; ?>  />
                <?php echo $this->_var['lang']['need_insure']; ?>
                </div>
	</div>
     </div>
</div>
<?php else: ?>
            
<input name = "shipping" type="radio" value = "-1" checked="checked"  style="display:none"/>

<?php endif; ?>

<div id="supplier_shipping">


</div>
	
 <div class="dian_bg padding1 ub-ac m_t0_8">
    <div class="ulev-app2 dian_title ub" style="background-image:url(img/checkout_icon3.png)">支付方式</div>	
     <div class="c-wh umar-at4 p-left-1 t-666666 ulev-4">
     <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');$this->_foreach['payment_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['payment_list']['total'] > 0):
    foreach ($_from AS $this->_var['payment']):
        $this->_foreach['payment_list']['iteration']++;
?>
      <?php if ($this->_var['payment']['pay_code'] == 'alipay' || $this->_var['payment']['pay_code'] == 'cod' || $this->_var['payment']['pay_code'] == 'balance' || $this->_var['payment']['pay_code'] == 'ChinaPay'): ?>
          <div class="ps_h" id="<?php echo $this->_var['payment']['pay_code']; ?>">
           <label class="ub ub-ac">
           <input type="radio" style="display:none" isCod="<?php echo $this->_var['payment']['is_cod']; ?>" isPickup="<?php echo $this->_var['payment']['is_pickup']; ?>" onclick="selectPayment(this)"   name="payment" value="<?php echo $this->_var['payment']['pay_id']; ?>" id="payment_<?php echo $this->_var['payment']['pay_id']; ?>" class="option-input radio"/>   		<div class="radio_style radio_on"><?php echo $this->_var['payment']['pay_name']; ?></div>
           </label>
          </div>
       <?php endif; ?>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
     </div>
</div>

											
<div id="all_total"><?php echo $this->fetch('app/order_total_app.lbi'); ?></div>			

<div id="subdonetj"></div>
<input type="hidden" name="step" value="done" />
</form>

