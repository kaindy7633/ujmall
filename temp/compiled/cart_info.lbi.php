
 <?php if ($this->_var['goods']): ?>

   <i></i><span><u id="showTotalQty"><?php echo $this->_var['str']; ?></u></span>

<a class="hd_prism_cart" href="flow.php"><em></em>购物车</a>

<div class="hd_cart_show" style="height: auto;">

    <div class="hd_total_price">

        <a href="flow.php" data-ref="YHD_TOP_MINICART">查看购物车</a>

        <p>商品总价</p>

        <strong><em><?php echo $this->_var['zj']['goods_price']; ?></em></strong>

    </div>

    <ul class="hd_cart_list">

<?php $_from = $this->_var['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_32441600_1427417391');$this->_foreach['goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_0_32441600_1427417391']):
        $this->_foreach['goods']['iteration']++;
?>

        <li class="">

            <div class="hd_cart_wrap">

                <div class="clearfix">

                    <a class="hd_pro_img"  href="">

                        <img src="<?php echo $this->_var['goods_0_32441600_1427417391']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods_0_32441600_1427417391']['goods_name']; ?>" width="60" height="60"></img>

                    </a>

                    <div class="hd_cart_detail">

                        <a class="hd_pro_name" href=""><?php echo $this->_var['goods_0_32441600_1427417391']['short_name']; ?> </a>

                        <p class="clearfix">

                            <em><?php echo $this->_var['goods_0_32441600_1427417391']['goods_price']; ?>x<?php echo $this->_var['goods_0_32441600_1427417391']['goods_number']; ?></em>

                        </p>

                        <a style="float:right"  href="javascript:"  onClick="deleteCartGoods(<?php echo $this->_var['goods_0_32441600_1427417391']['rec_id']; ?>)">删除</a>

                    </div>

                </div>

                <p class="hd_cart_tips"></p>

            </div>

        </li>

        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

    </ul>

    <div class="hd_total_pro">共<em><?php echo $this->_var['zj']['goods_number']; ?></em>件商品 </div>

</div>

<?php else: ?>  



		<i></i><span ></span>

        	<a class="hd_prism_cart" href="">

            	<em></em>购物车

            </a> 

       <div  class="hd_cart_show" style="height: auto;">



    <div class="hd_none_tips">

        <span class="hd_none_icon"></span>

        <p class="hd_none_text" style=" font-family:'Courier New', Courier, monospace">



            您的购物车里还没有U+易购的商品哦~~



        </p>

    </div>

    </div>

  <?php endif; ?>         

<script type="text/javascript">

function deleteCartGoods(rec_id)

{

Ajax.call('delete_cart_goods.php', 'id='+rec_id, deleteCartGoodsResponse, 'POST', 'JSON');

}



/**

 * 接收返回的信息

 */

function deleteCartGoodsResponse(res)

{

  if (res.error)

  {

    alert(res.err_msg);

  }

  else

  {

      document.getElementById('ECS_CARTINFO').innerHTML = res.content;

  }

}

</script>