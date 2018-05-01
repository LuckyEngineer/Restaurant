<?php
namespace app\index\model;
use think\Model;
use think\Db;

class OrderProducts extends Model{
	function insertop($oid,$key,$value){
		$data = [
		'oid' => $oid, 
		'pid' => $key,
		'num' => $value
		];
	    db("order_products")->insert($data);
	}
}
