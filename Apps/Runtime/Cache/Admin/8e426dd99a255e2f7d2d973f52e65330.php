<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>
    <head>
        <title>商品搜索</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <a href='<?php echo U($back_url);?>'>Back </a>
        <form action='<?php echo U($do_search_url);?>' method="POST">
             <input type="text" name="name" placeholder="请输出搜索商品的关键字">
             <input type="submit" value="搜索">
        </form>
    </body>
</html>