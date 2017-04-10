<?php
namespace Admin\Controller;
class CartController extends Controller {
    public function showlist(){
//        栏目显示
        $c = D('Channel');
//        顶级栏目
        $pcinfo = $c->where('channelid=0')->select();
        
//        根据goods的id联表查询商品信息
        $goods = D('Goods');
        $ginfo=$goods->table('tb_goods')->select();
        
//        如果是登陆状态（购物车数据从数据库中取出）
        if(session('userid')){
            $uid=session('userid');
            $cart = D('Cart');
            $data= unserialize($cart->where('cartid=$uid')->getField('cart_info'));
        }else{
            $data= unserialize(session('cart'));
        }
        
        $this->assign('cart_data',$data);
        $this->assign('pcinfo',$pcinfo);
        $this->assign('ginfo',$ginfo);
        $this->assign('num',0);
        $this->assign('number',0);
        $this->display();      
    }
    
//    购物车商品数和总价格
    public function Number(){
//        根据goods_id联表查询商品信息
        $goods = D('Goods');
        $ginfo = $goods->table('tb_goods')->select();
        
//        如果是登陆状态（购物车数据从数据库中取出）
        if(session('userid')){
            $uid=session('userid');
            $cart=D('Cart');
            $data= unserialize($cart->where('cartid=$uid')->getField('cart_info'));
        }else{
//            否则没有登陆时如下（没登陆，购物车数据从session取出
            $data= unserialize(session('cart'));
        }
        
        foreach ($data as $k=>$v){
            foreach ($ginfo as $kk=>$vv){
                if($vv['goods_id']==$v['goods_id']){
                    $j+=$v['goods_num'];
                    $i+=$vv['goods_price']*$v['goods_num'].'<br/>';
                }
            }
        }
        return "您的购物车中有 $j件商品，总计金额￥$i元";
    }
    
    public function del(){
        $goods_id=I('goodsid',0);
//        如果是登陆状态（购物车数据从数据库删除
        if(session('userid')){
            $uid=session('userid');
            $cart=D('Cart');
            $data= unserialize($cart->where("cartid")->getField('cart_info'));
//            show_bug($data);
            
            foreach ($data as $k=>$v){
                if($v['goodsid']==$goods_id){
                    if(in_array('$goodsid',$v)){
                        unset($data[$k]); //删除指定的二维数组元素  
                    }
                    $cart_info= serialize($data);
                    $sql="update tb_cart set cart_info='$cart_info' where cartid=$uid";
                    $ok=$cart->execute($sql);
                    if($ok){
                        echo "<script> 
                                 alert('购物车商品删除成功')；
                                 location.href='../../showlist';
                               </script>";
                    }
                }
            }
            
        }
    }
   
    
    
    
    
    
    
    
    
    
    
    
    
}
