<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php echo ($title); ?></title>

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
             
                <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
          
        <div class="navbar-header">
          <a class="navbar-brand" href="#">商城管理系统界面</a>
        </div>
          
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
                     
      <div class="navbar-default sidebar col-sm-3 col-md-2" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                         <li>
                            <a href="<?php echo U('Channel/index');?>"><i class="fa fa-laptop nav_icon"></i>栏目列表<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo U('Channel/channelList');?>">栏目列表</a></li>
                                <li><a href="#">一级栏目</a></li>
                                <li><a href="#">二级栏目</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                         </li>
                       
                        <li>
                            <a href="<?php echo U('Goods/index/');?>"><i class="fa fa-laptop nav_icon"></i>商品管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo U('Goods/index');?>">商品列表</a></li>
                                <!--<li><a href="<?php echo U('Goods/search');?>">商品搜索</a></li>-->
                                <!--<li><a href="<?php echo U('Goods/add');?>">商品添加</a></li>-->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="<?php echo U('User/index');?>"><i class="fa fa-indent nav_icon"></i>用户管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo U('User/index');?>">用户信息</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        

                        <li>
                            <a href="<?php echo U('Order/index');?>"><i class="fa fa-envelope nav_icon"></i>订单管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo U('Order/index');?>" style="font:2px">订单列表</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                      
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side --> 
 

                    <!--内容-->
                    <div class="col-sm-8 col-md-10 sidebar">
                        
   <a href='<?php echo U($back_url);?>'>Back </a>
   <table class="table">
	<caption style="font-size:38px">栏目修改</caption>
	<thead>
	    <tr>
		<th>字段</th>
		<th>值</th>
	    </tr>
	</thead>
        
	<tbody>
        <form action='<?php echo U($do_modify_url);?>' method='POST'>
            <?php if(is_array($info)): foreach($info as $key=>$value): ?><tr>
                    <td><?php echo ($key); ?></td>
                    <td><input type='text' name="<?php echo ($key); ?>" value='<?php echo ($value); ?>'></input></td>
                </tr><?php endforeach; endif; ?>
	   <tr><td colspan="2"><input type='submit' value='提交'></input></td> </tr>
        </form>
	</tbody>
 </table>

                    </div>
                </div>

                <!--底部-->
                <div class="row">
                    
                        

                    
                </div>	
        </div>
        
    </body>
</html>