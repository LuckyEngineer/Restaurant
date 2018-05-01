<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class Admin extends Model{
	function isTrue($username,$password){
		$num=db("admin")->where(["username"=>$username,"password"=>$password])->count();
		if($num>0){
			return true;
		}
		return false;
	}
}