<?php
namespace Home\Model;

class OrderModel extends BaseModel {
    //  订单列表(页数,搜索关键字,商家id,订单id,用户id,排序标志)
    public function orderList($page=1,$keyword='',$shopid=0,$id=0,$userid=0,$sortflag=0) {
	return $this->select();
    }
    
    // 订单操作(订单id,操作标志:订单状态 0:未支付 1:未发货 2:未签收 3:未评价 4:完成 11:超时 12:取消)
    // 获取商品详情(商品id)    
    public function orderInfo($orderid){
        return $this->find($orderid);
    }
    //    生成订单(用户id,)
    //    订单支付(订单id,支付信息)
    //    订单评价(订单id,评价信息)
    //    申请退款(订单id,申请原因,备注)
    //    退款操作
    //    订单超时处理(订单id,30min未支付则不能支付) => 通常是由定时任务执行

}