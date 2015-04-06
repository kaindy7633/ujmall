<div class="filter" id="J_Filter">
  <ul class="filter-inner">
 	<li <?php if ($this->_var['pager']['sort'] == 'goods_id'): ?> class="filter-cur"<?php endif; ?>><a href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=goods_id&order=<?php if ($this->_var['pager']['sort'] == 'goods_id' && $this->_var['pager']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#goods_list" >上架<i class="<?php if ($this->_var['pager']['sort'] == 'goods_id' && $this->_var['pager']['order'] == 'DESC'): ?>f-ico-arrow-u<?php else: ?>f-ico-arrow-d<?php endif; ?>"></i></a></li>
    <li <?php if ($this->_var['pager']['sort'] == 'last_update'): ?> class="filter-cur"<?php endif; ?>><a href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=last_update&order=<?php if ($this->_var['pager']['sort'] == 'last_update' && $this->_var['pager']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#goods_list" >更新<i class="<?php if ($this->_var['pager']['sort'] == 'last_update' && $this->_var['pager']['order'] == 'DESC'): ?>f-ico-arrow-u<?php else: ?>f-ico-arrow-d<?php endif; ?>"></i></a></li>
    <li <?php if ($this->_var['pager']['sort'] == 'salenum'): ?> class="filter-cur"<?php endif; ?>><a href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=salenum&order=<?php if ($this->_var['pager']['sort'] == 'salenum' && $this->_var['pager']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#goods_list" >销量<i class="<?php if ($this->_var['pager']['sort'] == 'salenum' && $this->_var['pager']['order'] == 'DESC'): ?>f-ico-arrow-u<?php else: ?>f-ico-arrow-d<?php endif; ?>"></i></a></li>
    <li <?php if ($this->_var['pager']['sort'] == 'shop_price'): ?> class="filter-cur"<?php endif; ?>><a href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=shop_price&order=<?php if ($this->_var['pager']['sort'] == 'shop_price' && $this->_var['pager']['order'] == 'ASC'): ?>DESC<?php else: ?>ASC<?php endif; ?>#goods_list">价格<i class="<?php if ($this->_var['pager']['sort'] == 'shop_price' && $this->_var['pager']['order'] == 'ASC'): ?>f-ico-arrow-d<?php else: ?>f-ico-arrow-u<?php endif; ?>"></i></a></li>
    <li class="filter-navBtn" ><a class="j_filterBtn disabled" href="javascript:void(0)" id="btn_filter" f="1" >筛选</a></li>
  </ul>
</div>
<div class="filter-placeholder" style="height: 39px; display: none;"></div>
<?php if ($this->_var['goods_list']): ?>
<div id="J_ItemList" style="opacity: 1;" class="srp m-animation album">
	<div class="product single_item info"> 
		
	</div>
	<a href="javascript:;" class="get_more"><img src='themesmobile/68ecshopcom_mobile/img/loader.gif'></a>
</div>
 <?php else: ?>
    <ul class="new-mu_l2w">
						<div class="new-cp-prom2">
                <strong class="new-span-block">抱歉暂时没有相关结果，换个筛选条件试试吧</strong>
            </div>
			        </ul>
<?php endif; ?>