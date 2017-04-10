<?php
namespace Admin\Model;
use Think\Model;
class CartModel extends Model {
//可以给当前Model进行一些个性化的设计
    function addToCart($uid,$goods_id,$goods_num){
        /*echo $uid,$goods_id,$goods_num;*/
        $arr=array("goods_id"=>$goods_id,"goods_num"=>$goods_num);
        $data=unserialize($this->getCart($uid));//根据唯一索引uid查询
        
        $is_repeat=false;
        foreach($data as $k=>$v){
            if($v['goods_id']==$goods_id){//如果数据重复，就更新数据
                $data[$k]['goods_num']=$goods_num;
                $is_repeat=true;
            }    
        }
        if(!$is_repeat){//如果不重复，就追加一个
            $data[]=$arr;
        }
        $data=serialize($data);//serialize() 把变量和它们的值编码成文本形式
        $ndata=array();
        $ndata["cart_uid"]=$uid;
        $ndata["update_time"]=date("Y-m-d h:i:s");
        $ndata["cart_info"]=$data;
        
        $this->add($ndata,array(),true);
    }
    
    function getCart($uid){
        return $this->where("cart_uid='{$uid}'")->getField("cart_info");
    }
    
    
    
    
//    shjsdhj
   /*
         将物品放入购物车[SESSION]中
         将指定物品信息$goods存入指定名$cartName的购物车中，默认在物品信息首部附加“购物车物品序号”$skey	
         在存入购物车之前先进行判断所选物品是否已经存在，是：只修改购买数量、否：存入购物车
  */
	public function addGoods($cartName, $goodsStr){
		$skey=count($_SESSION[$cartName]);
		//处理物品信息
		$goodsStr=$skey.','.$goodsStr;
		switch ($cartName){
			case 'flyCart':
				break;
			case 'mallCart':
				//配置物品字段,返回可读性更强的数组格式的物品信息
				$goodsArr=$this->_setGoodsFields($goodsStr);
				break;
			case 'hotelCart':
				break;
		}
		//物品存入购物车
		$_SESSION[$cartName][$skey]=$goodsArr;
		//更新购物车信息
		$this->_updateCart($cartName);
	}

	/**	
          删除购物车[SESSION]中的某一物品
          根据提供的购物车名$cartName及指定购物车物品序号$skey将该物品记录置空值
	 */
	public function delGoods($cartName, $skey){
		if(!isset($_SESSION[$cartName])){ return ; }
		if($_SESSION[$cartName]['ITEMS']==1){
		//	$this->clearAll($cartName);
		}else{
			//删除指定物品
			$_SESSION[$cartName][$skey]=null;
		}
		//更新购物车信息
		$this->_updateCart($cartName);

	}
        
	/**
	    清空购物车中的所有物品信息
	    根据提供的购物车名$cartName将该购物车清空
	 */
	public function clearAll($cartName){
		if(isset($_SESSION[$cartName])){ 
			unset($_SESSION[$cartName]);
		}else{
			return ;
		}
	}

         /**	
	编辑购物车信息[物品购物数量+1-1]
	根据提供的购物车名$cartName及操作名$action结合指定购物车物品序号$skey对指定物品的购买数量进行+1-1操作
	 */
	public function editCart($cartName, $action, $skey){
		if(!isset($_SESSION[$cartName])){return ;}
		switch ($action){
			case 'plus':
				$this->_plusOne($cartName, $skey);
				break;
			case 'minus':
				$this->_minusOne($cartName, $skey);
				break;
		}
		//更新购物车信息
		$this->_updateCart($cartName);
	}

        /**
	   查找购物车物品信息
	   可供添加物品操作调用，如果所添加物品已存在则购物数量+1，反之将物品存入购物车
	 */
	public function searchGoods(){

	}


        /**
	   获取购物车基本信息【二维数组格式呈现TDArr】
	   将购物车中的基本信息数据转化成二维数组【总项目items】【总数量total】【总金额money】
	 */
	public function getCartInfo($cartName){
		if(!isset($_SESSION[$cartName])){return ;}
		$infoArr=array();
		if(isset($_SESSION[$cartName])){
			$items=$_SESSION[$cartName]['ITEMS'];
			$total=$_SESSION[$cartName]['TOTAL'];
			$money=$_SESSION[$cartName]['MONEY'];
			$infoArr=array('ITEMS'=>$items,'TOTAL'=>$total,'MONEY'=>$money);
		}else{
			unset($infoArr);
		}
		return $infoArr;
	}


         /**
	 获取购物车所有的商品数据【二维数组格式呈现TDArr】
	 将购物车中的全部商品数据转化成二维数组，不带HTML代码符
	 */
	public function getCartList($cartName){

		if(isset($_SESSION[$cartName])){
			$allGoodsTDArr=array();
			foreach ($_SESSION[$cartName] as $k=>$v){
				if(is_array($v)){
					$allGoodsTDArr[]=$v;
				}
			}
		}
		return $allGoodsTDArr;
	}

         /**
	 配置物品字段,将一条物品记录字符串转化成有相应字段名的数组
	 */
	private function _setGoodsFields($goodsStr){
		//id,code,name,extend,price
		$str2Arr=split(',', $goodsStr);
		$goodsArr=array(
			'key'=>$str2Arr[0],
			'id'=>$str2Arr[1],
			'code'=>$str2Arr[2],
			'name'=>$str2Arr[3],
			'extend'=>$str2Arr[4],
			'price'=>$str2Arr[5],
			'numb'=>$str2Arr[6],
			'money'=>number_format($str2Arr[5]*$str2Arr[6],2));
		return $goodsArr;
	}


        /**	
	 将物品的购买数量+1
	 根据提供的购物车物品序号$skey将指定的商品数量+1
	 */
	private function _plusOne($cartName, $skey){
		if(!isset($_SESSION[$cartName])){ return ;}
		//指定物品购买数量+1
		$_SESSION[$cartName][$skey]['numb']+=1;
		//更新小计金额
		$price=$_SESSION[$cartName][$skey]['price'];
		$numb=$_SESSION[$cartName][$skey]['numb'];
		$_SESSION[$cartName][$skey]['money']=number_format($price*$numb,2);
		//更新购物车信息
		$this->_updateCart($cartName);
	}

          /**	
	将物品的购买数量-1
	根据提供的购物车物品序号$skey将指定的商品数量-1
	 */
	private function _minusOne($cartName, $skey){
		if(!isset($_SESSION[$cartName])){ return ;}
		//指定物品购买数量-1
		if($_SESSION[$cartName][$skey]['numb']>1){
			$_SESSION[$cartName][$skey]['numb']-=1;
			//更新小计金额
			$price=$_SESSION[$cartName][$skey]['price'];
			$numb=$_SESSION[$cartName][$skey]['numb'];
			$_SESSION[$cartName][$skey]['money']=number_format($price*$numb,2);
		}
		//更新购物车信息
		$this->_updateCart($cartName);
	}

        /**
	  统计购物车物品总金额
	  总金额[MONEY]
	 */
	private function _countMoney($cartName){
		if(!isset($_SESSION[$cartName])){ return ;}
		$count=0.0;
		switch ($cartName){
			case 'flyCart':
				break;
			case 'mallCart':
				$cartList=$this->getCartList($cartName);
				foreach ($cartList as $k=>$v){
					$count+=$v['money'];
				}
				$_SESSION[$cartName]['MONEY']=number_format($count,2);
				break;
			case 'hotelCart':
				break;
		}
	}


         /**
	 统计购物车物品总项目
	 总项目[ITEMS]
	 */
	private function _countItems($cartName){
		if(!isset($_SESSION[$cartName])){ return ;}
		$count=0;
		switch ($cartName){
			case 'flyCart':
				break;
			case 'mallCart':
				$cartList=$this->getCartList($cartName);
				foreach ($cartList as $k=>$v){
					if(is_array($v)){
						$count++;
					}
				}
				$_SESSION[$cartName]['ITEMS']=$count;
				break;
			case 'hotelCart':
				break;
		}
	}


        /** 
	统计购物车物品总数量
	总数量[TOTAL]
	 */
	private function _countTotal($cartName){
		if(!isset($_SESSION[$cartName])){ return ;}
		$count=0;
		switch ($cartName){
			case 'flyCart':
				break;
			case 'mallCart':
				$cartList=$this->getCartList($cartName);
				foreach ($cartList as $k=>$v){
					$count+=$v['numb'];
				}
				$_SESSION[$cartName]['TOTAL']=$count;
				break;
			case 'hotelCart':
				break;
		}
	}


          /**
	   更新统计购物车基本信息
	   重新统计购物车基本信息【总项目ITEMS/总金额MONEY/总数量TOTAL]
	 */
	private function _updateCart($cartName){
		$this->_countItems($cartName);
		$this->_countMoney($cartName);
		$this->_countTotal($cartName);
	}

}