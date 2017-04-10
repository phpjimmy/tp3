<?php
namespace Admin\Controller;

class IndexController extends BaseController {
    public function nc() {
//	\Think\Build::buildController('', '';) 
//	\Think\Build::buildModel('Admin', 'Base');
//	\Think\Build::buildModel('Admin', 'Brand');
//	\Think\Build::buildModel('Admin', 'Category');
//	\Think\Build::buildModel('Admin', 'User');
//	\Think\Build::buildModel('Admin', 'Admin');
//	\Think\Build::buildModel('Admin', 'Goods');
//	\Think\Build::buildModel('Admin', 'Order');

    }
    
       //数据分页: 利用Page类和limit方法
    public function testPage(){
        $g = D('Goods'); // 实例化User对象
	$count = $g->where('status=0')->count(); // 查询满足要求的总记录数
	$Page = new \Think\Page($count, 5); // 实例化分页类 传入总记录数和每页显示的记录数(25)
	$show = $Page->show(); // 分页显示输出
//	var_dump($show);

        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
	$list = $g->limit($Page->firstRow . ',' . $Page->listRows)->select();
	$this->assign('list', $list); // 赋值数据集

	$this->assign('page_html', $show); //赋值分页输出
	$this->display(); // 输出模板
    }

    
      // 验证码
    public function testVerify(){

        $Verify = new \Think\Verify();
        $Verify->entry();
    }

      // 文件上传
    public function test(){
        $this->display();
    }
    
    
    public function testUpload(){
//       var_dump(I('post.name'));
	
	$upload = new \Think\Upload(); // 实例化上传类    
	$upload->maxSize = 3145728; // 设置附件上传大小    
	$upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型    
	$upload->savePath = './image/';
	// 设置附件上传目录    // 上传文件     
	$res = $upload->upload();
	if (!$res) {// 上传错误提示错误信息        
	    $this->error($upload->getError());
	} else {// 上传成功        
	    $this->success('上传成功！');
	}
    }
    
   
}