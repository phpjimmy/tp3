<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
   public function index(){
        $this->display();
   }
    
    public function m($modelName) {
	return M($modelName, 'tb_', 'DB_CONFIG1');
    }
    
    // 需要登录的时候调用: 未登录状态自动跳转,登录过不做任何操作,返回true
    // 谁需要登录 -> 谁使用 -> 登录成功 -> 跳转到哪里  首页,对应的操作页面
    
    // 登录源:  0:默认登录 1:商品列表 2:商品详情  3:点击购物车列表  4:订单列表 5:点击用户中心
    public function isLoginAndAutoJump($src=0) {
	
	if (!I('session.userinfo')) {
	    // 未登录跳转 登录
           // $this->redirect('Login/index?src=2');
	    $this->success('您未登录',U('Login/index?src='.$src));
	} else{
	    return true;
	}
    }
    
   
}