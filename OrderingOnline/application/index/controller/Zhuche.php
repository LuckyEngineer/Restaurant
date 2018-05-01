<?php
namespace app\index\controller;
use think\Controller;

class Zhuche extends controller{

	function index(){
		return $this->fetch();	
	}
	function zhuche(){
		$tel=$_POST['tel'];
		$password=$_POST['password1'];
		$t= model('user')->intrue($tel);
		$data =[];
		if($t==0){
			if($_POST['password1']==$_POST['password2']){
				$data['username'] = $tel;
				$data['password'] = $password;
				model("user")->inuser($data);
				$this->redirect("index/login/index");
			}else{
				$this->error("密码不一致，请确认后再注册");
			}
		}else{
			$this->error("账号已被注册");
		}	
	}
}