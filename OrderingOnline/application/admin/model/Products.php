<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class Products extends Model{
 //    function getAll(){
	// 	$res=db("channel")->alias('c')->field('c.id,c.name cname,p.img,p.name,p.selled,p.liked,p.price')->join('products p','c.id=p.cid','left')->select();
	// 	return $res;
	// }

	function search(){
		$result=db("channel")->alias('c')->field('c.id cid,c.name cname,p.img,p.name,p.selled,p.liked,p.price,p.id')->join('products p','c.id=p.cid','left')->where("p.name like '%".$_GET['key']."%'")->select();
		// echo "<pre>";
		// print_r($result);
		// exit;
		return $result;
	}
	function showpro($page){
		$each = 4;
  		$start = ($page - 1)*$each;
		$products = db("channel")->alias('c')->field('c.id cid,c.name cname,p.img,p.name,p.selled,p.liked,p.price,p.id')->join('products p','c.id=p.cid','left')->limit($start,$each)->select();
		// mp($products);
		return $products;
	}
	function destroy1($id){
		db("products")->where(["id"=>$id])->delete();
	}
}