<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="alternate" type="application/rss+xml" title="RSS|<?php echo $this->_var['page_title']; ?>" href="<?php echo $this->_var['feed_url']; ?>" />
<script type="text/javascript" src="themesmobile/68ecshopcom_mobile/js/jquery.js"></script>
<script type="application/javascript" src="themesmobile/68ecshopcom_mobile/js/jquery.more.js"></script>
<link rel="stylesheet" type="text/css" href="themesmobile/68ecshopcom_mobile/css/ecsmart.css"/>

</head>
<body>
<div id="cotentbody"  class="page-shadow">
  <div class="searchbox">
    <div class="sb-header"><a class="sb-back" href="javascript:history.back(-1)">返回</a>
      <div class="sb-search">
        <form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()" class="searchform">          
              <input  name="keywords" id="keyword" value="请输入搜索文字" onFocus="if(this.value=='请输入搜索文字'){this.value=''}" onBlur="if(this.value==''){this.value='请输入搜索文字'}" type="text"/>
          <input type="submit"/>
        </form>
      </div>
      
<form method="GET" name="listform" class="sb-switchBtn">
<a id="J_SwitchBtn" class="sb-switchBtn sb-switchBtn-album" href="javascript:void(0);" onclick="changelist(this)">切换</a>
<input type="hidden" name="category" value="<?php echo $this->_var['category']; ?>" />
<input type="hidden" name="display" value="<?php echo $this->_var['pager']['display']; ?>" id="display" />
  </form>
    </div>
    <div class="sb-category"></div>
  </div>
  <div class="minisite-wrapper" id="J_MinisiteWrap"></div>
  <div class="searchbox-placeholder" style="height: 45px; display: none;"></div>
  <script type="text/javascript">
var url = 'category.php?act=ajax&category=<?php echo $this->_var['cat_id']; ?>&&display=grid&brand=<?php echo $_REQUEST['brand']; ?>&price_min=<?php echo $_REQUEST['price_min']; ?>&price_max=<?php echo $_REQUEST['price_max']; ?>&filter_attr=<?php echo $_REQUEST['filter_attr']; ?>&page=1&sort=<?php echo $_REQUEST['sort']; ?>&order=<?php echo $_REQUEST['order']; ?>';
$(function(){
	$('#J_ItemList').more({'address': url});
});
$(window).scroll(function () {
		if ($(window).scrollTop() == $(document).height() - $(window).height()) {
			$('.get_more').click();
		}
	});
</script>
  <?php echo $this->fetch('library/goods_list.lbi'); ?>
   
   </div>
   <form method="post" action="category.php">
     <input type="hidden" name="brand" id="brand" value="<?php echo $this->_var['brand']; ?>"><input type="hidden" name="price_min" id="price_min" value="<?php echo $this->_var['price_min']; ?>"><input type="hidden" name="price_max" id="price_max" value="<?php echo $this->_var['price_max']; ?>">
     <input type="hidden" name="filter_attr" id="filter_attr" value="<?php echo $this->_var['filter_attr_str']; ?>">     
     <input type="hidden" name="id" value="<?php echo $this->_var['cat_id']; ?>">
<div style="position: absolute; width: 190px; height: 1940px; right: 0px; top: -28px; z-index: 99999999; overflow: hidden; -webkit-transform-origin: 0px 0px; opacity: 1; -webkit-transform: scale(1, 1); display: none;" id="filterbar">
	<div class="new-tab-type">
    	<div class="new-srch-pop" id="slidebar" style="-webkit-transition: -webkit-transform 0.4s;-webkit-transform-origin: 0px 0px; -webkit-transform-style: preserve-3d;-webkit-transform: translate(190px, 0);">
        <div class="showbottom"><span class="btn-sn-d">筛选目录</span>
      <input class="btn-sn-b" type="submit" value="确定">
   
      </div>
<div class="new-pop-ul new-p-re" id="filter_prop">
  
  <ul class="new-ul-lst">

  <?php if ($this->_var['brands']['1'] || $this->_var['price_grade']['1'] || $this->_var['filter_attr_list']): ?>
  <?php if ($this->_var['brands']['1']): ?>
  <li class="new-ul-li"> <a href="javascript:void(0)" onclick="showHideFilter(this)" class="new-li-a ">品牌</a>
    <div class="new-pop-sel" style="display:block">
      <ul  id="brands">
      <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand_0_22975200_1427827645');if (count($_from)):
    foreach ($_from AS $this->_var['brand_0_22975200_1427827645']):
?>
	<li><a href="javascript:get_brand('<?php echo $this->_var['brand_0_22975200_1427827645']['brand_id']; ?>')" id="brand_<?php echo $this->_var['brand_0_22975200_1427827645']['brand_id']; ?>" <?php if ($this->_var['brand_0_22975200_1427827645']['selected']): ?>class="on"<?php endif; ?>><span><?php echo $this->_var['brand_0_22975200_1427827645']['brand_name']; ?></span></a></li>
				
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </ul>
    </div>
  </li>
  <?php endif; ?>

  <?php $_from = $this->_var['filter_attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter_attr_0_22994100_1427827645');$this->_foreach['filter_attr_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['filter_attr_list']['total'] > 0):
    foreach ($_from AS $this->_var['filter_attr_0_22994100_1427827645']):
        $this->_foreach['filter_attr_list']['iteration']++;
?>
  <li class="new-ul-li"> 
  <a href="javascript:void(0)" onclick="showHideFilter(this)" class="new-li-a on"><?php echo htmlspecialchars($this->_var['filter_attr_0_22994100_1427827645']['filter_attr_name']); ?><?php echo $this->_var['lang']['colon']; ?></a>
    <div class="new-pop-sel" >
      <ul id="attrs_<?php echo $this->_foreach['filter_attr_list']['iteration']; ?>">
<?php $_from = $this->_var['filter_attr_0_22994100_1427827645']['attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attr');$this->_foreach['filter_attr'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['filter_attr']['total'] > 0):
    foreach ($_from AS $this->_var['attr']):
        $this->_foreach['filter_attr']['iteration']++;
?>
<li><a href="javascript:get_attr_<?php echo $this->_foreach['filter_attr_list']['iteration']; ?>('<?php if ($this->_var['attr']['attr_id']): ?><?php echo $this->_var['attr']['attr_id']; ?><?php else: ?>0<?php endif; ?>')" id="attr_<?php echo $this->_foreach['filter_attr_list']['iteration']; ?>_<?php if ($this->_var['attr']['attr_id']): ?><?php echo $this->_var['attr']['attr_id']; ?><?php else: ?>0<?php endif; ?>" <?php if ($this->_var['attr']['selected']): ?>class="on"<?php endif; ?>><span><?php echo $this->_var['attr']['attr_value']; ?></span></a>
<?php if ($this->_var['attr']['selected']): ?>
<input type="hidden" id="show68ecshop_<?php echo $this->_foreach['filter_attr_list']['iteration']; ?>" name="show68ecshop" value="<?php echo $this->_var['attr']['attr_id']; ?>"/>
<?php endif; ?>
</li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </ul>
      
    </div>
  </li>
   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <?php if ($this->_var['price_grade']['1']): ?>
  <li class="new-ul-li"> <a href="javascript:void(0)" onclick="showHideFilter(this)" class="new-li-a on">价格</a>
    <div class="new-pop-sel" style="display:none">
      <ul id="prices">
      <?php $_from = $this->_var['price_grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'grade');$this->_foreach['price_grade'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['price_grade']['total'] > 0):
    foreach ($_from AS $this->_var['grade']):
        $this->_foreach['price_grade']['iteration']++;
?>
		<li><a href="javascript:get_price('<?php echo $this->_var['grade']['formated_start1']; ?>','<?php echo $this->_var['grade']['formated_end1']; ?>')" id="price_<?php echo $this->_var['grade']['formated_start1']; ?>" <?php if ($this->_var['grade']['selected']): ?>class="on"<?php endif; ?>><span><?php if (($this->_foreach['price_grade']['iteration'] <= 1)): ?><?php echo $this->_var['grade']['price_range']; ?><?php else: ?><?php echo $this->_var['grade']['formated_start']; ?> - <?php echo $this->_var['grade']['formated_end']; ?><?php endif; ?></span></a></li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
    </div>
  </li>
   <?php endif; ?>
<?php endif; ?>
</ul>
 </div>
</div>
	</div>
</div>
</form>
<script type="text/javascript">
function get_brand(brand_id)
{
	document.getElementById('brand').value = brand_id;
	var obj = document.getElementById('brands').getElementsByTagName('a');
	for(var i=0;i<obj.length;i++)
	{
		obj[i].className = '';
	}
	document.getElementById('brand_'+brand_id).className = 'on';
}

function get_price(price_min,price_max)
{
	document.getElementById('price_min').value = price_min;
	document.getElementById('price_max').value = price_max;
	var obj = document.getElementById('prices').getElementsByTagName('a');
	for(var i=0;i<obj.length;i++)
	{
		obj[i].className = '';
	}
	document.getElementById('price_'+price_min).className = 'on';
}

<?php $_from = $this->_var['filter_attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter_attr_0_23072700_1427827645');$this->_foreach['filter_attr_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['filter_attr_list']['total'] > 0):
    foreach ($_from AS $this->_var['filter_attr_0_23072700_1427827645']):
        $this->_foreach['filter_attr_list']['iteration']++;
?>

function get_attr_<?php echo $this->_foreach['filter_attr_list']['iteration']; ?>(attr_id)
{
	document.getElementById('show68ecshop_<?php echo $this->_foreach['filter_attr_list']['iteration']; ?>').value=attr_id;
	var show68ecshop = document.getElementsByName("show68ecshop");
	var zongshu = null;
	for(var i=show68ecshop.length;i>0;i--){
	if(zongshu == null)
	{
		zongshu = document.getElementById("show68ecshop_"+i).value;
	
	}
	else
	{
		zongshu = document.getElementById("show68ecshop_"+i).value +"."+zongshu;
		document.getElementById('filter_attr').value = zongshu;	
	}
	}
	
	var obj = document.getElementById('attrs_<?php echo $this->_foreach['filter_attr_list']['iteration']; ?>').getElementsByTagName('a');
	for(var i=0;i<obj.length;i++)
	{
		obj[i].className = '';
	}
	document.getElementById('attr_<?php echo $this->_foreach['filter_attr_list']['iteration']; ?>_'+attr_id).className = 'on';
}

<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


</script>
<script language="javascript">
	function showHideFilter(obj){
		var hasClass = $(obj).hasClass('on');
		$(obj).parent().siblings().children('div').hide();
		$(obj).siblings().hide();
		$(obj).addClass('on');
		$(obj).parent().siblings().children('a').addClass('on');
		if(hasClass){
			$(obj).removeClass('on');
			$(obj).siblings().show();
		}
	}
	function selectExpandSort(obj){
		$(obj).parent().siblings().children('a').removeClass('on');
		$(obj).addClass('on');
		var div = $('#filter_prop a.on[data]');
		var esId = '';
		for(var i=0,len=div.size();i<len;i++){
			if(esId!='')esId+='-';
			esId+=$(div[i]).attr('data');
		}
		var more = 7-div.length;
		if(more>0){
			for(var i=0;i<more;i++){
				if(esId!='')esId+='-0';
			}
		}
		$('#expandSortId').val(esId);
		$('#condtion').submit();
		closeFilter();
	}
	function selectCategory(obj){
		$(obj).parent().siblings().children('a').removeClass('on');
		$(obj).addClass('on');
		closeFilter();
	}
	function selectCategoryFilter(obj){
		$(obj).parent().siblings().children('a').removeClass('on');
		$(obj).addClass('on');
		
		var param = '';
		var express = $('#filter_prop a.on[data][type="1"]');
		for(var i=0,len=express.size();i<len;i++){
			if($(express[i]).attr('data')!=''){
				if(param!='')param+=',';
				param+=($(express[i]).attr('parent')+":"+$(express[i]).attr('data'));
			}
		}
		$('#expressionKey').val(param);
		
		var price = $('#filter_prop a.on[data][type="2"]');
		$('#minprice').val('');
        $('#maxprice').val('');
		for(var i=0,len=price.size();i<len;i++){
			if($(price[i]).attr('data')!=''){
				content = $(price[i]).attr('data');
				if(content){
        			var tmpPrice = content.split('-');
        			if(tmpPrice.length==2){
        				$('#minprice').val(tmpPrice[0]);
        				$('#maxprice').val(tmpPrice[1]);
        			}
				}
			}
		}
		
		param = '';
		var expand = $('#filter_prop a.on[data][type="3"]');
		for(var i=0,len=expand.size();i<len;i++){
			if($(expand[i]).attr('data')!=''){
				if(param!='')param+=',';
				param+=($(expand[i]).attr('parent')+":"+$(expand[i]).attr('data'));
			}
		}
		$('#expandName').val(param);
		$('#condtion').submit();
		closeFilter();
	}
	function closeFilter(){
		(document.body||document.documentElement).removeChild(document.getElementById('_mask'));
		(document.body||document.documentElement).removeChild(document.getElementById('_maskArrow'));
		//$('a[f="1"]').removeClass('on');
		document.getElementById('slidebar').setAttribute('style','-webkit-transition: -webkit-transform 0.4s;-webkit-transform-origin: 0px 0px; -webkit-transform-style: preserve-3d;-webkit-transform: translate(190px, 0);');
		setTimeout(function(){
			$('#filterbar').hide();
		},400);
	}
	$(function(){
		$('a[f="1"]').click(function(e){
    		var cobj = e.srcElement || e.target;
    		var id = $(cobj).attr('id');
    		if(!id)id=$(cobj).parent('a').attr('id')||$(cobj).parent('span').parent('a').attr('id');
			if($('#'+id).hasClass('on')){return;}
			if(id!='btn_filter'){
    			$('.new-tab-type2').hide();
        		$('.new-tab-type3').hide();
        		$('.new-tab-type4').hide();
			}
			if($('#'+id).hasClass('on')){
				//$('a[f="1"]').removeClass('on');
			}else{
				var tagSort = !$('#btn_sort').hasClass('on');
				var tagStock = !$('#btn_stock').hasClass('on');
				var tagDelivery = !$('#btn_delivery').hasClass('on');
				if(id!='btn_filter'){
					$('a[f="1"]').removeClass('on');
					$('#'+id).addClass('on');
				}
        		if(id=='btn_sort'){
					if(tagStock && tagDelivery){
    					$('.new-tab-type2').css({'display':'block','height':'0px'});
        				$('.new-tab-type2').animate({'height':'34px'},{'duration':'fast'});
					}else{
						//$('.new-tab-type2').css({'display':'block'});
						$('.new-tab-type2').css({'opacity':'0','display':'block'});
						$('.new-tab-type2').animate({'opacity':10},'slow');
					}
        		}else if(id=='btn_stock'){
					if(tagSort && tagDelivery){
    					$('.new-tab-type3').css({'display':'block','height':'0px'});
        				$('.new-tab-type3').animate({'height':'34px'},{'duration':'fast'});
					}else{
						//$('.new-tab-type3').css({'display':'block'});
						$('.new-tab-type3').css({'opacity':'0','display':'block'});
						$('.new-tab-type3').animate({'opacity':10},'slow');
					}
        		}else if(id=='btn_delivery'){
					if(tagSort && tagStock){
    					$('.new-tab-type4').css({'display':'block','height':'0px'});
        				$('.new-tab-type4').animate({'height':'34px'},{'duration':'fast'});
					}else{
						//$('.new-tab-type4').css({'display':'block'});
						$('.new-tab-type4').css({'opacity':'0','display':'block'});
						$('.new-tab-type4').animate({'opacity':10},'slow');
					}
        		}else if(id=='btn_filter'){
					$('#filterbar').show();
					var height = ((document.body||document.documentElement).clientHeight+20)+'px';
					if(parseInt($('#slidebar').css('height').replace('px',''))>parseInt(height.replace('px',''))-20){
						height = (parseInt($('#slidebar').css('height').replace('px',''))+50)+'px';
					}
					$('#filterbar').css('height',(parseInt(height.replace('px',''))-50)+"px");
					var width = '100%';
					var maskArrow = document.createElement("a");
					maskArrow.setAttribute('class','new-abtn-slid');
					maskArrow.setAttribute('style','z-index:88888889;left:auto;right:185px;');
					maskArrow.setAttribute('id','_maskArrow');
        			var mask = document.createElement("div");
					mask.setAttribute('id','_mask');
					mask.setAttribute('style','position:absolute;left:0px;top:0px;background-color:rgb(13, 13, 13);filter:alpha(opacity=60);opacity: 0.6;width:'+width+';height:'+height+';z-index:88888888;');
					(document.body||document.documentElement).appendChild(mask);
					(document.body||document.documentElement).appendChild(maskArrow);
					var scrolltop = (document.body||document.documentElement).scrollTop;
					$('#filterbar').css("top",(scrolltop-28)+"px");
					document.getElementById('slidebar').setAttribute('style',' -webkit-transform-style: preserve-3d; -webkit-transition: -webkit-transform 0.4s; -webkit-transform-origin: 0px 0px; -webkit-transform: translate(0px, 0); ');
					$('#_maskArrow').click(function(){
            			closeFilter();
            		});
					$('#_mask').click(function(){
            			closeFilter();
            		});
        		}
			}
    	});

	})
	
</script>
<div id="footer_nav">
<?php echo $this->fetch('library/footer_nav.lbi'); ?>
</div>

   <script>
//切换浏览模式: 列表  详情  详情列表
    function changelist( cls ){
            var vl = cls.getAttribute('class') ;
            var lst = document.getElementById('J_ItemList');
            switch(vl){
            case "sb-switchBtn sb-switchBtn-list":
		
                cls.setAttribute('class', 'sb-switchBtn sb-switchBtn-album') ;
                lst.setAttribute('class' , 'srp j_autoResponsive_container m-ks-autoResponsive-container m-animation album');
                break;
            case "sb-switchBtn sb-switchBtn-album":

                cls.setAttribute('class', 'sb-switchBtn sb-switchBtn-grid') ;
                lst.setAttribute('class' , 'srp j_autoResponsive_container m-ks-autoResponsive-container m-animation grid');
                break;
            case "sb-switchBtn sb-switchBtn-grid":

                cls.setAttribute('class', 'sb-switchBtn sb-switchBtn-list') ;
                lst.setAttribute('class' , 'srp j_autoResponsive_container m-ks-autoResponsive-container m-animation list');
                break;
        }

    } 
</script>


</body>
</html>