<?php
namespace Admin\Model;
use Think\Model;
class ChannelModel extends BaseModel {
// 栏目列表(父级id:0为根列表,搜索关键字,排序标志) -> 无需分页,获取所有 
    public function channelList($superid=0,$keyword='',$sortflag=0){
	return $this->select();
    }
    
// 添加栏目
    public function addChannel($channelinfo){
	$res = $this->create($channelinfo);
        //  执行数据写入
	if($res){
            return $this->add($channelinfo);
        } else {
            return false;    
        }
    }
// 修改栏目id
    public function modifyChannel($channelinfo){
	
    }
// 栏目详情
    public function channelInfo($channelid){
	return $this->find($channelid);
    }
    
    public function getPropertys() {
	return ['channelname'=>'请填写分类名称',
                'channelid'=>'请选择分类id',
                'status'=>'请选择状态',
               ];
    }
    
}