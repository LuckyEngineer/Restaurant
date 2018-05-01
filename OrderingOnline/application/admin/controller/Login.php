<?php
namespace app\admin\controller;
use think\Controller;

class Login extends controller
{
    function index(){
    	return $this->fetch();
    }
    function login($code){
        if(!captcha_check($code)){
         $this->error("验证码错误");
        }
    	$username=$_POST['username'];
    	$password=$_POST['password'];
    	if(model("Admin")->isTrue($username,$password)){
    		session("admin",$username);
    		$this->redirect("admin/index/index");
    		exit();
    	}
    	$this->error("账号或密码错误");
	}
}