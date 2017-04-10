<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>标题</title>

        <link href="/test/TS2/public/css/bootstrap.min.css" rel="stylesheet">
        <script src="/test/TS2/public/js/jquery.min.js"></script>
        <script src="/test/TS2/public/js/bootstrap.min.js"></script>

        <!--左侧菜单的脚本-->
        <script src="/test/TS2/public/js/metisMenu.min.js"></script>
        <script src="/test/TS2/public/js/custom.js"></script>

        <!--弹出框的样式-->
    </head>

    <body>
	<!--最底层的大容器(1行:导航头 2行:左侧菜单+内容)-->
	<!--底层容器-->

	<!--头部导航-->
	 <div class="row">
             
                <nav class="navbar " role="navigation">
      <div class="container-fluid">
          
<!--        <div class="navbar-header">
          <a class="navbar-brand" href="#">商城管理系统</a>
        </div>-->
          
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Home</a></li>
            <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">用户中心 <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">个人信息</a></li>
                    <li><a href="#">消息</a></li>
                    <li><a href="#">注销</a></li>
                </ul>
            </li>          
            <li><a href="#">帮助?</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
          
      </div>
</nav>
            
         </div>


        <div class="container-fluid">
                <div class="row">		<!--左侧菜单-->
                     
                        <!--<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">

	<?php if(is_array($menu_list)): foreach($menu_list as $key=>$vo): echo ($vo["url"]); ?>
	    <?php echo U($vo[url]);?>
	    <?php echo ($vo["name"]); ?>
	    <li><a href='<?php echo U($vo[url]);?>'><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>

    </ul>
</div>-->

<div class="navbar-default sidebar col-sm-3 col-md-2" role="navigation">
    <div class="sidebar-nav navbar-collapse">
	<ul class="nav" id="side-menu">
<!--	    <li>
		<a href="<?php echo U('Index/index');?>"><i class="fa fa-dashboard fa-fw nav_icon"></i>管理后台</a>
	    </li> -->
            
	    <li>
		<a href="<?php echo U('Goods/index/');?>"><i class="fa fa-laptop nav_icon"></i>商品<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
                    <li><a href="<?php echo U('Goods/index');?>">商品首页</a></li>
		    <li><a href="<?php echo U('Goods/goodsList');?>">商品列表</a></li>
		    <li><a href="<?php echo U('Goods/search');?>">商品搜索</a></li>
                    <li><a href="<?php echo U('Goods/add');?>">商品添加</a></li>
		</ul>
	    </li>
           
	    <li>
		<a href="<?php echo U('Login/index');?>"><i class="fa fa-indent nav_icon"></i>用户<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
		    <li><a href="<?php echo U('Login/index');?>">用户登录</a></li>
		</ul>
	    </li>
            
<!--            <li>
		<a href="<?php echo U('Shop/index');?>"><i class="fa fa-indent nav_icon"></i>商家管理<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
		    <li><a href="<?php echo U('Shop/index');?>">商家列表</a></li>
		</ul>
		 /.nav-second-level 
	    </li>-->
            
	    <li>
		<a href="<?php echo U('Order/index');?>"><i class="fa fa-envelope nav_icon"></i>订单<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
		    <li><a href="<?php echo U('Order/index');?>" style="font:2px">订单列表</a></li>
		</ul>
		<!-- /.nav-second-level -->
	    </li>
            
             <li>
		<a href="<?php echo U('Cart/index');?>"><i class="fa fa-envelope nav_icon"></i>购物车<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
		    <li><a href="<?php echo U('Cart/index');?>" style="font:2px">购物车列表</a></li>
		</ul>
	    </li>
            
<!--	    <li>
		<a href="#"><i class="fa fa-flask nav_icon"></i>平台管理</a>
	    </li>
            
            <li>
		<a href="#"><i class="fa fa-flask nav_icon"></i>统计管理</a>
	    </li>
	    -->
            
	</ul>
        
    </div>
</div>
 
                    

                    <!--内容-->
                    <div class="col-sm-8 col-md-10 sidebar">
                        

    <table class="table" >
        <caption style="font-size:38px">订单列表</caption>
        <thead>
            <tr>
                <th>id</th>
                <th>备注</th>
                <th>订单状态</th>
                <th>详情</th>
                <th>操作</th>
                <th>取消订单</th>
                                    <!--<th>申请退款</th>-->
            </tr>
        </thead>

        <tbody>
        <?php if(is_array($list)): foreach($list as $key=>$info): ?><tr>
                <td><?php echo ($info[id]); ?></td>
                <td><?php echo ($info[note]); ?></td>
                <td>
                    <?php switch($info["orderstatus"]): case "0": ?>0待支付<?php break;?>    
                    <?php case "1": ?>1未发货<?php break;?> 
                    <?php case "2": ?>2待签收<?php break;?>
                    <?php case "3": ?>3待评价<?php break;?> 
                    <?php case "4": ?>4完成<?php break;?> 
                    <?php case "11": ?>11付款超时<?php break;?> 
                    <?php case "12": ?>12已取消<?php break;?> 
                    <?php default: ?>default<?php endswitch;?>
                </td>
                <td><a href='<?php echo U($list_info_url,'id='.$info[id]);?>'>订单详情</a></td>
                <td>
                    <button onclick="order_cz('<?php echo ($info["id"]); ?>', '<?php echo ($info["orderstatus"]); ?>')"> 

                        <?php switch($info["orderstatus"]): case "0": ?>0去支付<?php break;?>    
                            <?php case "1": ?>1提醒商家发货<?php break;?> 
                            <?php case "2": ?>2确认收货<?php break;?>
                            <?php case "3": ?>3评价<?php break;?> 
                            <?php default: ?>default<?php endswitch;?>
                    </button>
                </td>
                 <td><a href='<?php echo U($list_delete_url,'id='.$info[id]);?>'>取消订单</a></td>
                 <!--<td><a href='<?php echo U($list_refund_url,'id='.$info[id]);?>'>申请退款</a></td>-->
            </tr><?php endforeach; endif; ?>
        </tbody>

    </table>
    <div id="tp_page"><?php echo ($show_page); ?></div>

    <script>
        function order_cz(orderid, orderstatus) {
            console.log('订单操作,orderid=' + orderid + ',orderstatus=' + orderstatus);
            //    根据订单状态 ->流程转发,纷发
            switch (orderstatus) {
                case '0':
                    //	alert('支付');
                    // 跳转的,用U生成URL,
                    var url = "<?php echo U('Order/pay');?>";
                    url += '?orderid=' + orderid;
                    console.log(url);
                    window.location.href = url;
                    break;
                case '1':
//                    alert('提醒');
                    var url = "<?php echo U('Order/remind');?>";
                    url += '?orderid=' + orderid;
                    console.log(url);
                    window.location.href = url;
                    break;
                case '2':
//                        alert('签收');
                    var url = "<?php echo U('Order/qianshou');?>";
                    url += '?orderid=' + orderid;
                    console.log(url);
                    window.location.href = url;
                    break;
                case '3':
                    //  alert('评价');
                    var url = "<?php echo U('Order/comment');?>";
                    url += '?orderid=' + orderid;
                    console.log(url);
                    window.location.href = url;
                    break;
                default:
                    break;
            }
        }
    </script>

                    </div>
                </div>

                <!--底部-->
                <div class="row">
                    
                        
                    
                </div>	
        </div>
        
    </body>
</html>