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
		$products = db('products')->where("cid",$cid)->select();
		return $products;
	}	
}