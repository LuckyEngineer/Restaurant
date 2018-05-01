<?php
namespace app\index\controller;

use think\Controller;

class Products extends controller{
	function index(){

		$channel = model('channel')->getchannel();
		$products = model('products')->Products(1);
		$this->assign("products",$products);


		$this->assign("channel",$channel);
		return $this->fetch();
	}
	function getpros($cid){
		$pro = db('products')->where(['cid'=>$cid])->select();
		return $pro;
	}
	function pro(){
		$buy = session('buy');
		if(!session('?buy')){
			session('buy',[]);
		}
		if(!isset($buy[$_POST['pid']]['num'])){
			$buy[$_POST['pid']]['num'] = 0;
		}

		if($_POST['opt'] == '+'){
 	 			$buy[$_POST['pid']]['num']++;
 	 		}else{
 	 			$buy[$_POST['pid']]['num']--;
 	 		}
 	 	session('buy',$buy);
     	echo "success";
	}

	function getpro(){
		// 调用数据库 返回我想要的商品
		$cid = $_POST['cid'];
		$products = model('products')->getpro($cid);
		// 然后将PHP转JSON
		echo json_encode($products);
	}
}






