<?php
namespace Home\Controller;

class OrderController extends BaseController {

//     订单状态 0:未支付 1:未发货 2:未签收 3:未评价 4:完成 11:超时 12:取消 
    //订单列表 orderList
    // 订单详情 info
    // 生成订单 submitOrder
    // 订单操作(支付,取消,发货,收货,申请退款,) 
    // 状态:显示文字
    // 操作:显示按钮(去支付)

    public function index() {
        $this->redirect('Order/orderList');
    }

    //订单列表 orderList
    public function orderList() {
        // 登录源:  0:默认登录 1:商品列表 2:商品详情  3:点击购物车列表  4:订单列表 5:点击用户中心
        //  处理登录源问题
        $islogin = $this->isLoginAndAutoJump(4);
        if (!$islogin) {
            return;
        }

        //处理获取订单的条件
        $userid = I('session.userinfo')['id'];
        $o = D('Order');

        $count = $o->count(); // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 4);
        $showPage = $Page->show();

        //where:status userid orderstatus
        $list = $o->where("status=0 AND userid={$userid}")
                ->limit($Page->firstRow . ',' . $Page->listRows)
                ->select();
        $this->assign('list', $list);
        $this->assign('show_page', $showPage);
        $this->assign('list_info_url', 'Order/info');
        $this->assign('list_delete_url', 'Order/delete');
        $this->display();
    }

    public function pay() {
        $orderid = I('get.orderid');
//        echo $orderid;
        // 订单信息  商品信息  价格 => 需要在页面显示,需要在支付时候用 就查询 
        $o = D('Order');
        $list = $o
                  ->alias('o')
                  ->join('tb_cart c ON c.orderid=o.id')
                  ->join('tb_goods g ON g.id=c.goodsid')
                  ->where("o.id={$orderid}")
                  ->field('g.name as name,g.price as price,c.goodsnum as goodsnum,g.price*c.goodsnum as ordermoney,o.id as orderid,o.addr as addr,g.id as goodsid')
                  ->select();
//         print_r($list);
        $this->assign('info', $list[0]);
        $this->display();
    }

    public function dopay() {
        $orderid = I('get.orderid');
        $o = D('Order');
        $o->id = $orderid;
        $o->orderstatus = 1;
        $res = $o->save();
        if ($res) {
            $this->success('支付成功', U('Order/index'));
        } else {
          $this->error('支付失败');
        }
    }

    public function remind() {
        $orderid = I('get.orderid');
        //推送 =>实现提醒
        //插入一条推送消息
        $s = D('Shop');
        $re = $s->select();
        if (!$re) {
            $this->error('提醒商家发货失败!');
        }

        $o = D('Order');
        $o->id = $orderid;
        $o->orderstatus = 2;
        $res = $o->save();
        if ($res) {
            $this->success('提醒商家发货成功!', U('Order/index'),3);
        }
    }

    public function qianshou(){
        $orderid = I('get.orderid');
        $o = D('Order');
        $list = $o->alias('o')
                ->join('tb_cart c ON c.orderid=o.id')
                ->join('tb_goods g ON g.id=c.goodsid')
                ->where("o.id='{$orderid}'")
                ->field('g.name as name,g.price as price,c.goodsnum as goodsnum,g.price*c.goodsnum as ordermoney,o.id as orderid,o.addr as addr')
                ->select();
        //print_r($list);
        $this->assign('info', $list[0]);
        $this->display();
    }

    public function doqianshou() {
        $orderid = I('get.orderid');
        $o = D('Order');
        $o->id = $orderid;
        $o->orderstatus = 3;
        $res = $o->save();
        if ($res) {
            $this->success('收货成功,请对本次交易做出评价', U('Order/index'), 3);
        } else {
            $this->error('收货失败');
        }
    }

    public function comment() {
       // 插入评论表数据, 更新订单记录(orderstaus,commentflag)
//        $orderid = I('get.orderid');
//	$oc = D('OrderComment');
//        
//	$data = ['orderid'=>1,
//	       'content'=>1,
//	       'userid'=>1];
//	$oc->add($data);
//	
//	$o = D('Order');
//	$o->save(
//		['id'=>1,'orderstatus'=>4,'commentflag'=>1,'star'=>1]
//		);
//	
//	$id = $_GET['id_'];
//
//	$order = M('order');
//	$data['orderstatus'] = 4;
//	$order->where("id=$id")->save($data);
//
//	$this->display();
        
        
        $orderid = I('get.orderid');
        $o = D('Order');
        $info = $o->where("id='{$orderid}'")
                  ->select();
       // print_r($info);
        $this->assign('info', $info[0]);
        $this->display();
    }

    public function docomment(){
        $orderid = I('get.orderid');
        $o = D('Order');
        $o->id = $orderid;
        $o->commentflag=1;
        $o->orderstatus = 4;
        $res = $o->save();
        if ($res) {
            $this->success('评价完成', U('Order/index'), 3);
        } else {
            $this->error('评价失败');
        }
    }

    
    // 订单详情 info 
    public function info() {
        $o = D('Order');
        $oinfo = $o->orderInfo(I('get.id'));
        // 详情数据设定
        $this->assign('info', $oinfo);
        // url 的设定
        $this->assign('back_url', 'Order/index', 3);
        // 渲染
        $this->display();
    }

    //   取消订单 delete
    public function delete() {
        $o = D('Order');
        $data = I('get.id');
        $res = $o->delete($data);
//	echo '模拟成功,需要补充删除商品的 数据操作';
//	$this->success('删除成功', U('Goods/index'));
        if ($res) {
            $this->redirect('Order/index');
//            $this->success('订单取消成功', U('Ord/index'));
        } else {
            $this->error('订单取消失败:' . $g->getError());
        }
    }
//
//    public function refund() {
//        $o = D('Order');
//        $oinfo = $o->orderInfo(I('get.id'));
//        // 详情数据的设定
//        $this->assign('info', $oinfo);
//        // url 的数据设定
//        $this->assign('back_url', 'Order/index');
//        $this->assign('do_refund_url', 'Order/dorefund');
//        // 渲染
//        $this->display();
//    }
//
//    public function dorefund() {
//
//        $this->success('退款成功', U('Order/index'));
//    }
    
    
    public function showcartinfo() {
        // 显示订单提交时候的信息
        //  订单提交的操作,确定购买
        $cartid = I('GET.cartid');

        //  查询购物车中商品的信息 创建模型 赋值 渲染
        $c = D('Cart');                             
        $info = $c->alias('c')
                ->join('tb_goods g ON c.goodsid=g.id')
                ->where("c.id='{$cartid}'")
                ->field('c.id as cartid,g.name as name,g.price as price,c.userid as userid,g.price*c.goodsnum as ordermoney')
                ->select();
        //  print_r($info[0]);
        $this->assign('info', $info[0]);
        $this->display();

        //  商品的基本信息 计算价格 输入地址 输入备注 提交按钮
    }

    public function addorder() {
        //插入订单记录 更新商品记录 更新购物车记录
        $info = I('post.');
         //print_r($info);
        $o = D('Order');
        $o->startTrans();

        $orderid = $o->add($info);
      //  print_r($orderid);

        if ($orderid > 0) {
            // 订单插入成功->更新购物车记录(状态,结算订单id)
            $c = D('Cart');
            $c->status = 1;
            $c->orderid = $orderid;
            $c->id = $info['cartid'];
            $res = $c->save();

            if ($res) {
                //  更新购物车成功->更新商品库存
                //  联合购物车 更新商品 库存
                $goodsinfo = $c->field('goodsid,goodsnum')
                        ->where("id={$info['cartid']}")
                        ->select();
                //  print_r($goodsinfo);

                $goodsid = $goodsinfo[0]['goodsid'];
                $goodsnum = $goodsinfo[0]['goodsnum'];
                //   echo '$goodsid',$goodsid,'$goodsnum',$goodsnum;
                //   得到商品信息
                $g = D('Goods');
                $ginfo = $g->find($goodsid);
                //print_r($ginfo);
                //  更新商品信息

                $g->id = $goodsid;
                $g->totalnum = $ginfo['totalnum'] - $goodsnum;
                $g->salenum = $ginfo['salenum'] + $goodsnum;
                //  $g->save();
                $res = $g->save();
                if ($res) {
                    $o->commit();
                    $this->redirect('Order/orderList');
                    //  如果要进入商品详情 传参
                    die;
                }
            }
        }

        $o->rollback();
       
    }

}
