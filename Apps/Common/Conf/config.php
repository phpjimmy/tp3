<?php

return array(
//'配置项'=>'配置值'
    'SESSION_AUTO_START' => true, //是否开启session
//数据库配置1
    'DB_CONFIG1' => array(
	'db_type' => 'mysql',
	'db_user' => 'root',
	'db_pwd' => '123456',
	'db_host' => 'localhost',
	'db_port' => '3306',
	'db_name' => 'tp_test1'),
    
// 数据库配置2
    'DB_TYPE'      =>  'mysql',     // 数据库类型
    'DB_HOST'      =>  'localhost',     // 服务器地址
    'DB_NAME'      =>  'tp_test1',     // 数据库名
    'DB_USER'      =>  'root',     // 用户名
    'DB_PWD'       =>  '123456',     // 密码
    'DB_PORT'      =>  '3306',     // 端口
    'DB_PREFIX'    =>  'tb_',     // 数据库表前缀
//    'DB_DSN'       =>  '',     // 数据库连接DSN 用于PDO方式
    'DB_CHARSET'   =>  'utf8', // 数据库的编码 默认为utf8
    
    
    'TMPL_PARSE_STRING' => array(
	'__CSS__' => __ROOT__.'/public/css',
	'__JS__' => __ROOT__.'/public/js',
	'__IMG__' => __ROOT__.'/public/images',
	'__FONT__' => __ROOT__.'/public/fonts',
    ),
    
//    'URL_ROUTER_ON'   => true, 
//    'URL_ROUTE_RULES'=>array(   
//        'news/:year/:month/:day' => array('News/archive', 'status=1'),  
//        'news/:id'               => 'News/read',   
//        'news/read/:id'          => '/news/:1',
//        ),
    
    
);
