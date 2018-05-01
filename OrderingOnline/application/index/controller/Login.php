<?php
namespace app\index\controller;
use think\Controller;

class Login extends controller{

	function index(){
		return $this->fetch();
	}
	function login($tel,$password){
		$userid = model("user")->isTrue($tel,$password);
		if($userid == 0){
			$this->error("账号或密码错误");
		}
		session("id",$userid);
		$this->redirect("index/product/shop");
	}
	
}