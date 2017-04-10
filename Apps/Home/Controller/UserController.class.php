<?php
namespace Home\Controller;

class UserController extends BaseController {
    public function index() {
	$this->assign('last_login_id', I('cookie.last_login_id'));
	$this->display();
    }

    public function login() {
	// 登录流程: 获取数据 -> 数据验证(模型,查询) -> 缓存 -> 跳转页面 
	$loginid = I('GET.loginid');
	$password = I('GET.password');
	$code = I('GET.verify');

	$verify = new \Think\Verify();
	$res = $verify->check($code);
	if (!$res) {
	    $this->error('验证码错误');
	    return;
	}
//	echo $loginid, '<br>', $password, '<br>';
//	业务: 具体行业中的游戏规则 
//	业务: 项目中的游戏规则
//	对象: 
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