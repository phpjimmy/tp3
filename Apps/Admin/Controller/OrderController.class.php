<?php
namespace Admin\Controller;

class OrderController extends BaseController {
//    订单详情 info
//    生成订单 submitOrder
//    订单操作(支付,取消,发货,收货,申请退款,)
    public function index(){
        $this->redirect('orderList');
    }
    
    //订单列表 orderList
    public function orderList(){
        $o = D('Order');
	$list = $o->orderList();
	// 列表数据设定
	$this->assign('list', $list);
        // url 数据设定
        $this->assign('list_info_url', 'Order/info');
	$this->assign('list_refund_url', 'Order/refund');
        //渲染
	$this->display();
    }
    
     // 订单详情 info 
    public function info(){
        $o = D('Order');
	$oinfo = $o->orderInfo(I('get.id'));
	// 详情数据设定
	$this->assign('info', $oinfo);
	// url 的设定
	$this->assign('back_url', 'Order/index');
	// 渲染
	$this->display();
    }
    
    public function refund(){
        $o = D('Order');
	$oinfo = $o->orderInfo(I('get.id'));
	// 详情数据的设定
	$this->assign('info', $oinfo);
	// url 的数据设定
	$this->assign('back_url', 'Order/index');
	$this->assign('do_refund_url', 'Order/dorefund');
	// 渲染
	$this->display();
    }
    
    public function dorefund(){
     
	$this->success('退款成功', U('Order/index'));
    }

    public function submitOrder(){
        
    }
    
    
}