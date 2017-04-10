<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>
    <head>
        <title>支付</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <ul>
            <li>名称:<?php echo ($info['name']); ?></li>
            <!--<li>订单id:<?php echo ($info['orderid']); ?></li>-->
            <li>价格:<?php echo ($info['price']); ?></li>
            <li>商品数量:<?php echo ($info['goodsnum']); ?></li>
            <li>订单金额:<?php echo ($info['ordermoney']); ?></li>
            <li>收货地址:<?php echo ($info['addr']); ?></li>
            <li><a href="<?php echo U('Order/dopay?orderid='.$info['orderid']);?>"><button>确认支付</button></a></li>
        </ul>
        
    </body>
</html>