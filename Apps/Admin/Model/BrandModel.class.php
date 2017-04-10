<?php
namespace Admin\Model;

class BrandModel extends BaseModel {
// 品牌列表(搜索关键字,排序标志)-> 无需分页,获取所有
    public function brandList($keyword='',$sortflag=0) {
	return $this->select();
    }
// 添加品牌
    public function addBrand($data) {
	
    }
// 修改品牌 
    public function modifyBrand($data) {
	
    }
// 品牌详情
    public function brandInfo($brandid) {
	
    }
    
}