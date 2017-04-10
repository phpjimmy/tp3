<?php

namespace Admin\Controller;

class ChannelController extends BaseController {
    public function index(){
        $this->redirect('channelList');
    }

    // 栏目列表 channelList
    public function channelList() {
	$c = D('Channel');
	$list = $c->channelList();
	// 列表数据设定
	$this->assign('list', $list);
	// url 数据设定
	$this->assign('list_add_url', 'Channel/add');
        $this->assign('list_modify_url', 'Channel/modify');

	$this->assign('list_info_url', 'Channel/info');
	// 渲染
	$this->display();
    }

// 添加栏目 add,doAdd
    public function add() {
	$c = D('Channel');
	$addinfo = $c->getPropertys();
	// 需要添加的字段 数据设定
	$this->assign('info', $addinfo);
	// url数据的设定
	$this->assign('back_url', 'Channel/index');
	$this->assign('do_add_url', 'Channel/doadd');
	// 渲染
	$this->display();
    }

    public function doAdd() {
	$channelinfo = I('post.');
        $c = D('Channel');
        $res = $c->addChannel($channelinfo);
        if($res){
            $this->success('添加成功', U('Channel/index'));
        } else {
            $this->error('添加失败:'.$c->getError());    
        }
        
    }

// 修改栏目 edit,doEdit
    public function modify() {
        $c = D('Channel');
	$cinfo = $c->channelInfo(I('get.channelid'));
	// 详情数据的设定
	$this->assign('info', $cinfo);
	// url 的数据设定
	$this->assign('back_url', 'Channel/index');
	$this->assign('do_modify_url', 'Channel/domodify');
	// 渲染
	$this->display();
    }

    public function domodify() {
	$data = I('post.');
        $c = D('Channel');
        $modifychannel = $data;
        $res = $c->save($modifychannel);
       //echo '模拟成功,需要补充修改商品的 数据操作';
//	$this->success('修改成功', U('Goods/index'));
        if($res){
            $this->success('修改成功', U('Channel/index'));
        } else {
            $this->error('修改失败:'.$c->getError());    
        }
    }

// 栏目详情 info
    public function info() {
	$c = D('Channel');
	$cinfo = $c->channelInfo(I('get.channelid'));
	// 详情数据设定
	$this->assign('info', $cinfo);
	// url 的设定
	$this->assign('back_url', 'Channel/index');
	$this->assign('info_modify_url', 'Channel/modify');
	// 渲染
	$this->display();
    }

}
