
<div class="adress_tiao"></div>
<div class="c-wh ub-ac" onClick="address('address.html')">
	
	<div class="ub-img umh1 address-icon ub ub-ac">收货信息</div>
	<div class="ub ub-ver uinn-eo1">
		<div class="ub">
			<div class="ulev-app2 ub-f1"><?php echo $this->_var['consignee_list']['consignee']; ?></div>
			<div class="ulev-app2 ub-pe ufm1"><?php echo $this->_var['consignee_list']['mobile']; ?></div>
		</div>
		<div class="ulev-4 line-hei umar-t f_color_crg"><?php echo $this->_var['consignee_list']['address_short_name']; ?></div>
	</div>
</div>


<input type="hidden" name="have_consignee" value="<?php if ($this->_var['consignee_list']): ?>1<?php else: ?>0<?php endif; ?>" />

