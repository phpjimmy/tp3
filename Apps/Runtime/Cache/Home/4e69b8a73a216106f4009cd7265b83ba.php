<?php if (!defined('THINK_PATH')) exit();?><script src="/test/TS2/public/js/jquery.min.js"></script>

<form action="<?php echo U('Cart/submitAll');?>" method="POST">
    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><input type='hidden' name='ids[]' value='<?php echo ($vo[id]); ?>'>   订单id 
	<input type='hidden' name='nums[]' value='<?php echo ($vo[goodsnum]); ?>'>   商品数量 
	<input type='hidden' name='stroenums[]' value='<?php echo ($vo[stroenum]); ?>'>  库存量 
	<input type='hidden' name='salenums[]' value='<?php echo ($vo[salenum]); ?>'>  销售量 
	<input type='hidden' name='prices[]' value='<?php echo ($vo[price]); ?>'>    商品价格 
	<input type='hidden' name='goodsids[]' value='<?php echo ($vo[goodsid]); ?>'>  商品id<?php endforeach; endif; ?>
    
    <li>地址:<input type="text" name="addr" placeholder="请输入地址"/></li>
    <li>备注:<input type="text" name="note" placeholder="请输入备注"/></li>
    <li><button>提交所有</button></li>
</form>

<?php if(is_array($list)): foreach($list as $key=>$vo): ?><li>
        <input type='checkbox' /><?php echo ($vo["name"]); ?>
        <a href="<?php echo U('Order/showcartinfo?cartid='.$vo['id']);?>">结算</a>
    </li><?php endforeach; endif; ?>

<a href=''>批量结算</a>


<?php if(is_array($list)): foreach($list as $key=>$vo): ?><li>
        <?php echo ($vo["name"]); ?>
        <a href="<?php echo U('Order/showcartinfo?cartid='.$vo['id']);?>">结算</a>
    </li><?php endforeach; endif; ?>