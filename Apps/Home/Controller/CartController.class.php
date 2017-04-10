<?php
namespace Home\Controller;

class CartController extends BaseController {
    public function addcart(){
          // 加入购物车
          //创建模型 数据处理 结果返回
        $param = I('get.');
//      print_r($param);
      // $param = I('post.');
        $c = D('Cart');
        $res = $c->add($param);
        echo $ret ? '1' : '0';

    }
    
     public function addcart1(){
         // 加入购物车 创建模型 数据处理 结果返回
        //查购物车里有没有这个商品 有这个商品,更新数据 没有添加
        $param = I('get.');
//        print_r($param);
        $goodsid = $param['goodsid'];
        $c = D('Cart');
        $res = $c->where("goodsid='{$goodsid}'")->select(); // 注意: 查询结果是二维数组 
//        print_r($res);
        
        $res = $res[0];
//        print_r($res);
          
        
        //查询是否存在相同的商品,存在更新数量 不存在添加
       if(is_array($res) && count($res)>0){
           $res['goodsnum'] += $param['goodsnum'];
           $ret = $c->save($res);
       }else{
           $ret = $c->add($param);
       }
        echo $ret ? '1' : '0';
    }
    
     public function submitAll(){
//            //数据提交 ->提交哪些
//            $all = I('post.');
////            print_r($all);
            
//            $cartids = implode(',',$all['ids']);
////            var_dump($cartids);
//            
//            //得到信息
//            $goodsids = $all['goodsids']; //商品id
//            $goodsnums = $all['nums'];   //当前买了几个
//            $goodsprices = $all['prices'];  //当前价格
//            $goodsstroenums = $all['stroenums'];  //库存
////            var_dump($goodsstroenums);
//            $goodssalenums = $all['salenums']; //销售数量
//            
//            $g = D('Goods');
//            $g->startTrans();
////            
//            $totalprice = 0;
//            $gUpdateSuccess = true;
////            
//            for($i=0;$i<count($goodsids);$i++){
//                //取出 相关数据信息
//                $currstroenum = $goodsstroenums[$i];
//                $currsalenum = $goodssalenums[$i];
//                $currnum = $goodsnums[$i];
//              
//                // 更新商品 相关的数量  => 库存和销售数量
//                $g->stroenum = $currstroenum - $currnum;
//                $g->salenum = $currsalenum + $currnum;
//
//                $ug_res = $g->where("id='{$goodsids[$i]}'")
//                            ->save();
//                if (!$ug_res) {
//                    $gUpdateSuccess = false;
//                    break;
//                }
//                // 计算总价格
//                $totalprice += $currnum * $goodsprices[$i];
//                
//            }
////            
////               // 如果商品全部更新成功 -> 继续 订单和购物车的更新操作
//            if ($gUpdateSuccess) {
//                // 插入订单 
//                $o = D('Order');
//                $o->userid = $_SESSION['userinfo']['id'];
//                $o->ordermoney = $totalprice;
//                $o->note = I('post.note');
//                $o->addr = I('post.addr');
//                $orderid = $o->add();
//                // var_dump($orderid);
//
//                // 如果插入订单成功, 更新购物车记录
//                if ($orderid > 0) {
//                    $c =D('Cart');
//                    $c->orderid = $orderid;
//                    $c->status = 1;
//                    $c->where("id in ('{$cartids}')");
//                    $uc_res = $c->save();
//                    if ($uc_res) {
//                        // 跳转界面.提示
//                        $c->commit();
//                        $this->success('订单提交成功', U('Order/orderlist'));
//                        return;
//                    }
//                }
//
//                $g->rollback();
//                $this->error('提交订单失败');
//
//            }

            
           //计算价格 ->购物车订单id 条件(cartid in())
           //插入订单 (userid 价格 地址 备注)
           //更新购物车(订单id 和结算状态)
           //更新商品库存
         
         // 数据提交 => 提交哪些 
	$all = I('POST.');
//	var_dump($all);  '1,2,3,4,5'
	$catids = implode(',', $all['ids']);
	// 得到信息 
	$goodsids = $all['goodsids']; // 商品id
	$goodsnums = $all['nums'];  // 当前买了几个
	$goodsprices = $all['prices']; // 当前价格
	$goodstroenums = $all['stroenums']; //库存
	$goodssalenums = $all['salenums']; // 销售数量


	$mod = M();
	$mod ->startTrans();

	$totalprice = 0;
	$gUpdateSuccess = true;
	for ($i = 0; $i < count($goodsids); $i++) {
	    // 取出 相关数量信息
	    $currstroenum = $goodstroenum[$i];
	    $currsalenum = $goodssalenums[$i];
	    $currnum = $goodsnums[$i];

	    // 更新商品 相关的数量  => 库存和销售数量
	    $mod->table('tb_goods');
	    $mod->stroenum = $currstroenum - $currnum;
	    $mod->salenum = $currsalenum + $currnum;

	    $ug_res = $mod->where("id={$goodsids[$i]}")
		    ->save();
	    if (!$ug_res) {
		$gUpdateSuccess = false;
		break;
	    }
	    // 计算总价格
	    $totalprice += $currnum * $goodsprices[$i];
	}

	    // 如果商品全部更新成功 -> 继续 订单和购物车的更新操作
	if ($gUpdateSuccess) {
	    // 插入订单 
	    $mod->table('tb_order');
	    $mod->userid = $_SESSION['userinfo']['id'];
	    $mod->ordermoney = $totalprice;
	    $mod->note = I('post.note');
	    $mod->addr = I('post.addr');
	    $orderid = $mod->add();

	    // 如果插入订单成功, 更新购物车记录
	    if ($orderid > 0) {
		$mod->table('tb_cart');
		$mod->orderid = $orderid;
		$mod->status = 1;
		$mod->where("id in ({$catids})");
		$uc_res = $mod->save();
		if ($uc_res) {
		    // 跳转界面.提示
                    
		    $mod->commit();
//                    echo (123123);
                    
		    $this->success('订单提交成功', U('Order/orderlist'));
		    return;
		}
	    }
	    
	    $mod->rollback();
	    $this->error('提交订单失败');
	    
	}

            
        }

    public function index(){
        $c = D('Cart');
        $list = $c->alias('c')
                  ->join('tb_goods g ON c.goodsid=g.id')
                  ->where('c.status=0')
                  ->field('c.*,g.name,g.price,g.stroenum,g.salenum')
                  ->select();
//        print_r($list);
        $this->assign('list',$list);
         $this->display();
    }
    
      
      //ajax: 是否要跳转,数据提交是否需要异步操作

      //加入购物车 -> 同一商品 不会重复添加 (更新数量)
     // 购物车列表 (-100+) (更新购物车中商品数量  ajax更新商品价格)
     // 更新购物车中商品数量操作: js计算价格,服务端计算价格
      //批量结算 -> (数据: 购物车记录列表)结算提交页面 -> (显示:商品列表)地址,备注等信息 -> 提交 ->
      //单个结算 -> (数据: 单个的购物车记录)结算提交页面 -> (显示:商品信息)填: 地址,备注等信息 -> 提交 ->(计算总价:插入订单记录) -> 更新购物车和商品
     
   
    
    
}