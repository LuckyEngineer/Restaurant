<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class Orders extends Model{
    function getAll(){
    
    $res = db("orders")->alias("o")->field("o.id,o.time,o.price,u.username")->join("user u","u.id = o.uid","left")->select();
    
    for($i=0;$i<count($res);$i++){
    	$order_products = db("order_products")->alias("op")->field("op.num,p.name,p.price")->join("products p","p.id=op.pid","left")->where(['op.oid'=>$res[$i]['id']])->select();
    	$res[$i]['order_products'] = $order_products;
    }
    return $res;
    }
}