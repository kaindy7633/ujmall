<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goodsinfo');$this->_foreach['glist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['glist']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['goodsinfo']):
        $this->_foreach['glist']['iteration']++;
?>
<div class="dian_bg padding1 ub-ac m_t0_8">
	<div class="ulev-app2 dian_title ub">订单明细</div>	
	<?php $_from = $this->_var['goodsinfo']['goodlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['name']['iteration']++;
?>
	<div class="c-wh ub umar-at4 dian_box">
		<div class="uinn-eo4 ub ub-f1">
			<div class="uh-app1 uw-app2 mar-ar1 ub-img" style="background-image:url('http://<?php echo $_SERVER['SERVER_NAME']; ?>/<?php echo $this->_var['goods']['goods_thumb']; ?>');"></div>
			<div class=" ub-f1 ulev-1 mar-ar1">
			<?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>
				<?php echo $this->_var['goods']['goods_name']; ?><br><br>
				  <font class="f_color_crg"><?php echo nl2br($this->_var['goods']['goods_attr']); ?></font> 
				  <?php if ($this->_var['goods']['parent_id'] > 0): ?> 
				  <span >配件</span> 
				  <?php endif; ?> 
				  <?php if ($this->_var['goods']['is_gift'] > 0): ?> 
				  <span>赠品</span> 
				  <?php endif; ?> 
			  <?php else: ?> 
			  <?php echo $this->_var['goods']['goods_name']; ?> 
			  <?php endif; ?>
			</div>
			
		</div>
        <div class="ub-pe t-666666" style="padding-top:0.7em;">
				<div class="t-gra-48 ufm1 ulev-4"><?php echo $this->_var['goods']['formated_goods_price']; ?></div>
				<div class="ufm1 ulev-4 f_color_crg">x<?php echo $this->_var['goods']['goods_number']; ?></div>				
			</div>
	</div>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
	<?php if ($this->_var['goodsinfo']['zhekou']): ?>
	    <div class="ub ub-pe" style="border-bottom:1px solid rgb(245, 245, 245);">
		<div class="dian_hd"><?php if ($this->_var['goodsinfo']['zhekou']): ?><?php echo $this->_var['goodsinfo']['zhekou']['your_discount']; ?><?php endif; ?></div>
	    </div>
	<?php endif; ?>

	<?php if (( $this->_var['allow_use_bonus'] || $this->_var['allow_use_integral'] || $this->_var['allow_use_surplus'] ) && $this->_var['goodsinfo']['goodlist']): ?>
		<div class="ub b_t_xu ub-ac">
			<div class="jia_jian ulev-4">使用积分及余额</div>     
		</div>
		<div class="c-wh">	
        	<?php if ($this->_var['allow_use_bonus']): ?>
			<div class="ub ub-ac jfye">
				使用红包:
				<select name="bonus[<?php echo $this->_var['key']; ?>]" onchange="changeBonus(this.value,<?php echo $this->_var['key']; ?>)" id="ECS_BONUS_<?php echo $this->_var['key']; ?>" >
					<option value="0" <?php if ($this->_var['order']['bonus_id'] == 0): ?>selected<?php endif; ?>><?php echo $this->_var['lang']['please_select']; ?></option>
					<?php $_from = $this->_var['goodsinfo']['redbag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bonus');if (count($_from)):
    foreach ($_from AS $this->_var['bonus']):
?>
					<option value="<?php echo $this->_var['bonus']['bonus_id']; ?>" <?php if ($this->_var['order']['bonus_id_info'] [ $this->_var['key'] ] == $this->_var['bonus']['bonus_id']): ?>selected<?php endif; ?>><?php echo $this->_var['bonus']['type_name']; ?>[<?php echo $this->_var['bonus']['bonus_money_formated']; ?>]</option>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</select>
			</div>
			<div class="ub ub-ac jfye">
				<input class="otherinput2" name="bonus_sn[<?php echo $this->_var['key']; ?>]" id="bonus_sn_<?php echo $this->_var['key']; ?>" type="text" value="<?php if ($this->_var['order']['bonus_sn_info'] [ $this->_var['key'] ]): ?><?php echo $this->_var['order']['bonus_sn_info'][$this->_var['key']]; ?><?php else: ?>或输入红包序列号<?php endif; ?>" onfocus="if (value =='或输入红包序列号'){value =''}" onblur="if (value ==''){value='或输入红包序列号'}" />
		      <input name="validate_bonus" type="button" value="验证红包" onclick="validateBonus($$('bonus_sn_<?php echo $this->_var['key']; ?>').value,<?php echo $this->_var['key']; ?>)" class="BonusButton" />
			</div>
			<?php endif; ?>	
			<?php if ($this->_var['allow_use_integral']): ?>
			<div class="ub ub-ac jfye">
            <div>可用积分：<?php echo empty($this->_var['your_integral']) ? '0' : $this->_var['your_integral']; ?> </div>
            <input name="integral[<?php echo $this->_var['key']; ?>]" type="text" class="otherinput2" id="ECS_INTEGRAL_<?php echo $this->_var['key']; ?>" onblur="changeIntegral(this.value,<?php echo $this->_var['key']; ?>)" value="<?php echo empty($this->_var['order']['integral_info'][$this->_var['key']]) ? '0' : $this->_var['order']['integral_info'][$this->_var['key']]; ?>"  />
				<div id="ECS_INTEGRAL_NOTICE_<?php echo $this->_var['key']; ?>"></div>
			</div>
			<?php endif; ?>
			<?php if ($this->_var['allow_use_surplus']): ?>
			<div class="ub ub-ac jfye">
				可用余额：<?php echo empty($this->_var['your_surplus']) ? '0' : $this->_var['your_surplus']; ?> <input name="surplus[<?php echo $this->_var['key']; ?>]" type="text" class="otherinput2" id="ECS_SURPLUS_<?php echo $this->_var['key']; ?>"  value="<?php echo empty($this->_var['order']['surplus_info'][$this->_var['key']]) ? '0' : $this->_var['order']['surplus_info'][$this->_var['key']]; ?>" onblur="changeSurplus(this.value,<?php echo $this->_var['key']; ?>)" <?php if ($this->_var['disable_surplus']): ?>disabled="disabled"<?php endif; ?> /><div id="ECS_SURPLUS_NOTICE_<?php echo $this->_var['key']; ?>"></div>
			</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>
<input type='hidden' name='suppid' class="suppid" value='<?php echo $this->_var['key']; ?>'>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 