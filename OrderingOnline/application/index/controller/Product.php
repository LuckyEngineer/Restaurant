<?php
namespace app\index\controller;
use think\Controller;

class Product extends Loginchecker{
	function products(){

		$channel = model('channel')->getchannel();
		$this->assign("channel",$channel);
		$totle_price=$this->count();
		$products = model('products')->Products(1);
		$this->assign("products",$products);
		$this->assign("totle_price",$totle_price);
		
		
		return $this->fetch();
	}
	function jiesuan(){

		$buy=session('buy');
		if(!isset($buy)){
			$buy = [];
		}
		$toprice = 0;
		foreach ($buy as $key => $value) {
			$price = model('products')->getprice($key);
			$toprice = $toprice + $price['price']*$value;
		}
		$this->assign("toprice",$toprice);
			$lprice=$toprice-1;	
		$this->assign("lprice",$lprice);
		$uid =session('id');
		$oid = model('orders')->insertorder($uid,$toprice);
		foreach ($buy as $key => $value) {
			$num =$value;
			model("orderProducts")->insertop($oid,$key,$num);
		}
		// session('buy', null);
		
		// $this->assign('buy',$buy);
		$order = model('orders')->getorder($oid);
		$this->assign('order',$order);


		$user = model('user')->getuser();
		$this->assign('user',$user);
		return $this->fetch();


	}
	function shop(){
		return $this->fetch();

	}
	function back(){
		session('buy', null);
		$this->redirect('index/product/products');
	}
	
	function pro(){
		$pid=$_POST['pid'];
		$opt=$_POST['opt'];

		$buy=session('buy');
		if(!session('buy')){
			session('buy',[]);
		}
		if(!isset($buy[$pid])){
			$buy[$pid]=0;
		}
		if($_POST['opt']=='+'){
			$buy[$pid]++;
		}else{
			$buy[$pid]--;
		}
		session('buy',$buy);
		
		
	}

	function getpro($cid){
		$buy = session("buy");
		$pro = db('products')->where(['cid'=>$cid])->select();
		for($i=0;$i<count($pro);$i++){
			$pid = $pro[$i]['id'];
			if(!isset($buy[$pro[$i]['id']])){
				$buy[$pid] = 0;
			}
			$pro[$i]['num'] = $buy[$pid];
		}
		
		return $pro;
	}

	function count(){
		if(!session('buy')){
			session('buy',[]);
		}
		$buy=session('buy');
		$totle_price=0;
		
		
		foreach ($buy as $pid => $num) {
			$pro=db('products')->where(['id'=>$pid])->find();
			$price=$pro['price'];
			$totle_price=$totle_price+$num*$price;
		}
		return $totle_price;
	}
}