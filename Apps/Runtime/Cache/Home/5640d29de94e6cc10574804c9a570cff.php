<?php if (!defined('THINK_PATH')) exit();?>

<html>
    <head>
        <title>显示购物车信息</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <!--<ul>-->
            <li>名称:<?php echo ($info['name']); ?></li>
            <li>价格:<?php echo ($info['price']); ?></li>
            <li>cartid:<?php echo ($info['cartid']); ?></li>
            
           <form action="<?php echo U('Order/addorder');?>" method='POST'>
                <input type='hidden' name='cartid' value="<?php echo ($info['cartid']); ?>" /> 
                <input type='hidden' name='userid' value="<?php echo ($info['userid']); ?>" /> 
                <input type='hidden' name='ordermoney' value="<?php echo ($info['ordermoney']); ?>"/> 
	   
                <li>地址:<input type="text" name="addr" placeholder="请输入地址"/></li>
                <li>备注:<input type="text" name="note" placeholder="请输入备注"/></li>
                <button>提交</button>
            </form>
        <!--</ul>-->
    </body>
</html>