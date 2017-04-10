<?php
namespace Home\Controller;

class IndexController extends BaseController {
    public function index(){
        $this->redirect('Goods/index');
    }

    public function testLogin(){
        echo '123';
        $isLogin = $this->isLoginAndAutoJump(2);
        if($isLogin){
            echo '加入购物车'; 
        }
   }
}