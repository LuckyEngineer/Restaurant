<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Products extends Model{
	
	function Products($cid){
		$products = db('products')->where('cid',$cid)->select();
		return $products;
		$products = db('products')->select();
		for($i=0;$i<count($products);$i++){
			if($products['cid']==$cid){
				$products[]=$products[$i];
			}
		}
		return $p;
	}
	function getpro($cid){
		$buy=session('buy');
		$products = db('products')->where("cid",$cid)->select();
		return $products;
		for($i=0;$i<count($pro);$i++){
			if(!isset($buy[$pro[$i]['id']])){
				$buy[$pro[$i]['id']]=0;
			}
			$pro[$i]['num']=$buy[$pro[$i]['id']];
		}
	}
	function getprice($key){
		$price = db('products')->where('id',$key)->find();
		return $price;
	}
	// function search(){

	// 	$result=db("channel")->alias('c')->field('c.id cid,c.name cname,p.img,p.name,p.selled,p.liked,p.price,p.id')->join('products p','c.id=p.cid','left')->where("p.name like '%".$_GET['key']."%'")->select();
	// 	// echo "<pre>";
	// 	// print_r($result);
	// 	// exit;
		
	// 	return $result;
	// }
}