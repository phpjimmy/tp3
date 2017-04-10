<?php
namespace Home\Model;
use Think\Model;
class GoodsModel extends BaseModel {
    protected $_validate = [
               ['name','require','名字不能为空'],
    ];
    // 获取商品列表(页数,分类id,品牌id,搜索关键字,排序标志) 
    public function goodsList($page=1,$catid=0,$brandid=0,$keyword='',$sortflag=0,$checkflag = -1) {
	return $this->select();
    }
    
    // 获取商品详情(商品id) 
    public function goodsInfo($goodsid) {
	return $this->find($goodsid);
    }
    // 修改商品(商品信息)
    public function modifyGoods($goodsinfo) {
	
    }
    // 添加商品,批量添加(导入) 
    public function addGoods($goodsinfo) {
        $res = $this->create($goodsinfo);
        //  执行数据写入
	if($res){
            return $this->add($goodsinfo);
        } else {
            return false;    
        }
    }
    // 删除商品,批量删除(商品id) 
    public function delGoods($goodsid) {
	
    }
    // 审核(上架/下架)(商品id,操作标志:0下架,1上架)
    public function checkGoods($goodsid,$checkflag) {
	
    }
    // 批量审核(商品ids) -> 审核为上架状态 
    public function checkGoodsList($goodsid) {
	
    }
    
    
    public function getPropertys() {
	return ['name'=>'请填写名称',
                'brandid'=>'请选择品牌',
                'channelid'=>'请选择分类',
                'shopid'=>'请选择商家',
                'price'=>'请填写价格',
                'totalnum'=>'请填写总数'
               ];
    }
}