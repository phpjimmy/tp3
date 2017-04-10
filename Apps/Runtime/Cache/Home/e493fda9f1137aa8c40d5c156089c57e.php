<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>
    <head>
        <title>评价</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
<!--        <?php echo '很棒的鞋子，很好的服务，谢谢!'; ?>
        <a href="<?php echo U('Ord/docomment?orderid='.$info['id']);?>">提交评价</a>-->


          <form action="<?php echo U('Order/docomment?orderid='.$info['id']);?>" method="POST">
              <input type='text'/>
              <input type='submit' value='评价' />
          </form>
    </body>
</html>