<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>标题</title>

        <link href="/public/css/bootstrap.min.css" rel="stylesheet">
        <script src="/public/js/jquery.min.js"></script>
        <script src="/public/js/bootstrap.min.js"></script>

        <!--左侧菜单的脚本-->
        <script src="/public/js/metisMenu.min.js"></script>
        <script src="/public/js/custom.js"></script>

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
            <caption style="font-size:38px">商品列表</caption>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>状态</th>
                    <th>详情</th>
                    <th>加入购物车</th>
                    <th>立即购买</th>
                </tr>
            </thead>

            <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><!--  <form id='goods<?php echo ($vo[id]); ?>' action="<?php echo U('Cart/addcart');?>">
                    <input type='hidden' name='goodsid' value='<?php echo ($vo[id]); ?>'>
                    <input type='hidden' name='goodsnum' value='1'>
                    <input type='hidden' name='userid' value='<?php echo ($_SESSION['userinfo']['id']); ?>'>
                </form>-->
                <tr>
                    <td><?php echo ($vo[id]); ?></td>
                    <td><?php echo ($vo[name]); ?></td>
                    <td><?php echo ($vo[status]); ?></td>
                    <td><a href="<?php echo U($list_info_url,'id='.$vo[id]);?>">详情</a></td>
                    <td><button onclick="add_to_cart('<?php echo ($vo[id]); ?>')">加入购物车</button></td>
                    <!--<td><button onclick="add_to_cart('<?php echo ($addcart_url); ?>','goods<?php echo ($vo[id]); ?>')">加入购物车</button></td>-->
                    <td><button onclick="at_once_buy('<?php echo ($vo[id]); ?>')">立即购买</button></td>
                </tr><?php endforeach; endif; ?>
            </tbody>

     </table>
     <div id="tp_page"><?php echo ($show_page); ?></div>
     
     <script>
        function add_to_cart(goodsid){
             // 判断有没有登录  获取userinfo -> window.location.href=''
            // <?php echo (session('userinfo')); ?>   <?php echo U('Login/index?src=3');?>
            // 登录

     // 调试思路 
    // 开发步骤  1 写模版显示: 确保这一步没问题 2:模版数据提交 url 数据提过去  3:数据取到  4:处理 保证处理成功 ,有sql,sql 出错  TP给出致命错误   sql 返回给 控制器  6:返回给ajax 7:ajax 打印

            // ajax 请求 -> URL (CartController/addcart)
            // 数据  get  goodsid=goodsid&userid=?&goodsnum=?
            // 处理结果 
            var goods = '?goodsid='+goodsid;
            var userid = "&userid="+"<?php echo ($_SESSION['userinfo']['id']); ?>";
            var goodsnum ='&goodsnum='+1;  //实际中用加减控件通过dom访问到节点,找出商品数量,拼接url中

            var urlString = goods+userid+goodsnum;
            console.log(urlString);

            var url = "<?php echo U('Cart/addcart');?>"+urlString;
            console.log(url);

            $.get(url,function(data){
                 // 对返回的数据做处理
                if(data){
                    alert('成功加入购物车');
                }else{
                    alert(data);
                }
            })

       }
       
       function at_once_buy(goodsid){
            var url = "<?php echo U('Order/pay');?>";
            url += '?orderid=' + orderid;
            console.log(url);
            window.location.href = url;
       }
       
//       function add_to_cart(url,formid) {
//	// 判断有没有登录  获取userinfo -> window.location.href=''
//	// <?php echo (session('userinfo')); ?>   <?php echo U('Login/index?src=3');?>
//	// 登录
//	
//	formid = '#'+formid;
//        // 调试思路 
//        // 开发步骤  1 写模版显示: 确保这一步没问题 2:模版数据提交 url 数据提过去  3:数据取到  4:处理 保证处理成功 ,有sql,sql 出错  TP给出致命错误   sql 返回给 控制器  6:返回给ajax 7:ajax 打印
//
//        // ajax 请求 -> URL (CartController/addcart)
//        // 数据  get/post  goodsid=goodsid&userid=?&goodsnum=?
//        // 处理结果
//        $.get(url,$(formid).serialize(),function (data) {
//                // 调试最终要在js中打输出
//            console.log(data);
//            // 对返回的数据做处理
//            if(data){
//                alert('加入购物车成功');
//            }else{
//                alert(data);
//            }
//        })
//
//        }
       
    </script>
    

                    </div>
                </div>

                <!--底部-->
                <div class="row">
                    
                        
                    
                </div>	
        </div>
        
    </body>
</html>