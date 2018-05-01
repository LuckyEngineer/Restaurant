<?php
namespace app\index\model;
use think\Model;
use think\Db;

class Orders extends Model{
	function insertorder($uid,$toprice){
		$data = [
		'uid' => $uid, 
		'price' => $toprice,
		'time' => time()
		];
	    db('orders')->insert($data);
	    $ordersID =db('orders')->getLastInsID();
	    return $ordersID;
	}
	function getorder($oid){
		$order = db("orders")->alias('o')->field('o.id,u.username,o.price,o.time')->join('user u','o.id=u.id','left')->where(['o.id'=>$oid])->order("id desc")->find();
		$order_products = db('order_products')->alias('op')->join('products p','op.pid=p.id','left')->where(['op.oid'=>$oid])->select();
		$order['order_products'] = $order_products;
		return $order;
	}
}

