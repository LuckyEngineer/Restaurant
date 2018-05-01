<?php
namespace app\index\model;
use think\Model;
use think\Db;
class User extends Model{
	function isTrue($username,$password){
		$cond['username'] = $username;
		$cond['password'] = $password;
		$user = $this->where($cond)->find();
		if($user){
			return $user['id'];
		}
		return 0;
	}
	function intrue($tel){
		$tel = db('user')->where('username',$tel)->find();
		if($tel){
			return 1;
		}
		return 0;
	}
	function inuser($data){
		db("user")->insert($data);
	}
}
