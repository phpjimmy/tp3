<?php
namespace Home\Controller;

class LoginController extends BaseController {
    public function index(){
	$this->assign('last_user_id', I('cookie.last_user_id'));
	$src = I('GET.src');
	$this->assign('login_src',$src);
        //var_dump('从SRC='.$src.'过来登录');
	$this->display();
    }

    // 获取验证码 -> 访问URL 就能得到验证码图片
    public function verify(){
	$k = I('get.k');
	$Verify = new \Think\Verify();
	$Verify->entry($k);
    }

    public function login() {
	// 登录流程: 获取数据 -> 数据验证(模型,查询) -> 缓存 -> 跳转页面 
	$loginid = I('GET.loginid');
	$password = I('GET.password');
	$code = I('GET.verify');

	// 登录源:  0:默认登录 1:商品列表 2:商品详情  3:点击购物车列表  4:订单列表 5:点击用户中心
	$src = I('GET.src');

	$verify = new \Think\Verify();
	$res = $verify->check($code, 'login');
//	if (!$res   && 1){
//	    $this->error('验证码错误');
//	    return;
//	}
                    
	$u = D('User');
	$uinfo = $u->where("loginid='{$loginid}' AND status=0")->select();
                    
	if (count($uinfo) == 0) {
	    $this->error('登录失败:帐号不存在');
	}else{
	    // 缓存登录帐号  (成功:跳转,缓存用户信息) (失败:跳转,提示)
	    setcookie('last_user_id', $loginid);

	    if ($uinfo[0]['password'] == $password) {
		$_SESSION['userinfo'] = $uinfo[0];
               //$this->success('登录成功,登录源='.$src, U('Index/index'), 3); 
		switch ($src) {
		    case 0:
			$this->success('登录成功', U('Index/index'), 3);
			break;
		    case 1:
			$this->success('登录成功', U('Goods/index'), 3);
			break;
		    case 2:
                        $this->success('登录成功', U('Goods/info'), 3);
			break;
		    case 3:
                        $this->success('登录成功', U('Cart/index'), 3);
			break;
		    case 4:
		        $this->success('登录成功', U('Order/index'), 3);
			break;
		    case 5:
                        $this->success('登录成功', U('User/index'), 3);
			break;
		    default:
                        $this->success('登录成功', U('Index/index'), 3);
			break;
		}
            //点击登录按钮 进入->首页
            //加入购物车操作(所在页面, )->调回页面
	    } else {
		$this->error('登录失败:密码错误');
	    }
	}
    }
}