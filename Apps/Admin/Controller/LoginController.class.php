<?php
namespace Admin\Controller;

class LoginController extends BaseController {
// 登录 login,doLogin
// 注册 registe,doRegiste 
// 修改密码 editPwd,doEditPwd

    
    // Login: index/加载登录页面  login:登录处理  logout:注销 resgiste:注册 resetpwd:重置密码 

    public function index(){
	$this->assign('last_login_id',I('cookie.last_login_id'));
        $this->display();
    }
    
    public function verify() {
	$Verify = new \Think\Verify();
	$Verify->entry();
    }
    
    public function login() {
	// 登录流程: 获取数据 -> 数据验证(模型,查询) -> 缓存 -> 跳转页面 
	$loginid = I('GET.loginid');
	$password = I('GET.password');
        $code = I('GET.verify');
//	echo $loginid, '<br>', $password, '<br>';
	
        $verify = new \Think\Verify();   
        $res = $verify->check($code);
        if(!$res){
            $this->error('验证码错误');
            return;
        }
        
	$ad = $this->m('Admin');
	
	$uinfo = $ad->where("loginid='{$loginid}' AND status=0")->select();

	if (count($uinfo) == 0) {
	    $this->error('登录失败:帐号不存在');
	} else {
	    // 缓存登录帐号  (成功:跳转,缓存用户信息) (失败:跳转,提示)
	    setcookie('last_login_id', $loginid);
	    
	    if ($uinfo[0]['password'] == $password) {
		$_SESSION['userinfo'] = $uinfo[0];
		$this->success('登录成功', U('Index/index'), 3);
	    } else {
		$this->error('登录失败:密码错误');
	    }
	}
    }
    
    
    
}