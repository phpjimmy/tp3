<?php
namespace Home\Controller;

class GoodsController extends BaseController {
    public function index(){
        //数据分页
        $g = D('Goods');
        $count = $g->count();// 查询满足要求的总记录数
	$Page = new \Think\Page($count,5);
	$showPage = $Page->show();
	
	$list = $g->limit($Page->firstRow.','.$Page->listRows)->select();
	// 列表数据设定
	$this->assign('list', $list);
        $this->assign('show_page', $showPage);
	// url 数据设定
        //  $this->assign('atonce_buy_url','Order/pay');
	$this->assign('list_info_url', 'Goods/info');
	
        
        // 加入购物车页面显示之前  把该提交url 和数据 
        $url = U('Cart/addcart');
         // var_dump($url);
        $this->assign('addcart_url',$url);
        
        // $g = D('Goods');
        //  $list = $g->select();
        //  $this->assign('list',$list);
        $this->display();
    }
    
    // 商品列表 goodsList 
    public function goodsList(){

	$g = D('Goods');
        $count = $g->count();// 查询满足要求的总记录数
	$Page = new \Think\Page($count,5);
	$showPage = $Page->show();
	
	$list = $g->limit($Page->firstRow.','.$Page->listRows)->select();
        //$list = $g->goodsList();
	// 列表数据设定
	$this->assign('list', $list);
        $this->assign('show_page', $showPage);
	// url 数据设定
	$this->assign('list_add_url', 'Goods/add');
        $this->assign('list_search_url', 'Goods/search');

	$this->assign('list_info_url', 'Goods/info');
	$this->assign('list_modify_url', 'Goods/modify');
	$this->assign('list_delete_url', 'Goods/delete');
	// 渲染
	$this->display();
    }
    

    // 添加商品 add,doAdd
    public function add(){
        $g = D('Goods');
	$addinfo = $g->getPropertys();
	// 需要添加的字段 数据设定
	$this->assign('info', $addinfo);
	// url数据的设定
	$this->assign('back_url', 'Goods/index');
	$this->assign('do_add_url', 'Goods/doadd');
	// 渲染
	$this->display();
    }

    public function doadd(){
	//TODO:  
        $goodsinfo = I('post.');
        $g = D('Goods');
        $res = $g->addGoods($goodsinfo);
        if($res){
            $this->success('添加成功', U('Goods/index'));
        } else {
            $this->error('添加失败:'.$g->getError());    
        }
        
        //  $data = I('post.');
        //  $g = D('Goods');
        //  $addgoods = $data;
        // $g->add($addgoods);
        // //echo '模拟成功,需要补充添加商品的 数据操作';
        //$this->success('添加成功', U('Goods/index'));
    }
    
     // 商品详情 info 
    public function info(){
        $g = D('Goods');
	$ginfo = $g->goodsInfo(I('get.id'));
         // print_r($ginfo);
        $url = U('Cart/addcart');
	// 详情数据设定
	$this->assign('info', $ginfo);
	// url 的设定
	$this->assign('back_url', 'Goods/index');
        $this->assign('addcart_url',$url);
        
	// 渲染
	$this->display();
    }

     // 修改商品 modify domodify
    public function modify(){
        $g = D('Goods');
	$ginfo = $g->goodsInfo(I('get.id'));
	// 详情数据的设定
	$this->assign('info', $ginfo);
	// url 的数据设定
	$this->assign('back_url', 'Goods/index');
	$this->assign('do_modify_url', 'Goods/domodify');
	// 渲染
	$this->display();
    }
    
    public function domodify(){
        $data = I('post.');
        $g = D('Goods');
        $modifygoods = $data;
        $res = $g->save($modifygoods);
       //echo '模拟成功,需要补充修改商品的 数据操作';
       //$this->success('修改成功', U('Goods/index'));
        if($res){
            $this->success('修改成功', U('Goods/index'));
        } else {
            $this->error('修改失败:'.$g->getError());    
        }
    }

    public function delete(){
        $g = D('Goods');
        $data = I('get.id');
        $res = $g->delete($data);
        //echo '模拟成功,需要补充删除商品的 数据操作';
        //$this->success('删除成功', U('Goods/index'));
        if($res){
            $this->success('删除成功', U('Goods/index'));
        } else {
            $this->error('删除失败:'.$g->getError());    
        }
    }
    
    
    public function search(){
        
	// url数据的设定
	$this->assign('back_url', 'Goods/index');
	$this->assign('do_search_url', 'Goods/dosearch');
	// 渲染
	$this->display();
    }
   
    public function dosearch(){
        $keyword = I('post.name');
        $keyword = trim($keyword);

        $map['name']  = array('LIKE',"%{$keyword}%");

        $g = D('Goods');
        $ginfo = $g->alias('g')
                      ->join('tb_brand b ON g.brandid = b.brandid')
                      ->join('tb_channel c ON g.channelid = c.channelid')
                      ->where($map)
            //        ->where("name LIKE '%{$keyword}%'")
                      ->field('g.*,b.brandname as brandname,c.channelname as channelname')
                      ->select();
        $this->assign('info',$ginfo);
        $this->assign('back_url','Goods/index');
        $this->display();

   }
   

}