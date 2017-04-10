<?php

namespace Admin\Controller;
use Think\Controller;

class BaseController extends Controller {
    public $pageno=10;
    
    public function index() {
	$this->display();
    }
    
    // -------------- 公共的操作
    // 数据模型的创建
    function m($modelName) {
	return M($modelName, 'tb_', 'DB_CONFIG1');
    }

    public function _initialize() {
	// 自动跳转登录处理 
	$this->autoLogin();
	$this->title = '标题';
    }

    public function autoLogin() {
	$classname = array_pop(explode('\\', get_class($this)));
	if ($classname == 'LoginController') {
	    return;
	}

	if (!I('session.userinfo')) {
	    // 未登录跳转 登录
	    $this->redirect('Login/index');
	} else {
	    // 登录了获取权限信息 
	    $roleid = I('session.userinfo')['roleid'];
	    $m = $this->m('roleOption');
	    $option = $m->alias('ro')
	                ->join('tb_option as o ON o.id=ro.optionid')
                        ->where("roleid={$roleid}")
	                ->field("o.name,concat(o.namecn,'/index') as url")
	                ->select();
	    $this->menu_list = $option;
	}
    }
}
