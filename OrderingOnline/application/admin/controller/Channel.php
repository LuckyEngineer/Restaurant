<?php
namespace app\admin\controller;
use think\Controller;

class Channel extends Loginchecker{
	function index(){
	$channels = model("channel")->getAll();
	$this->assign("channels",$channels);
    return $this->fetch();
    }
    function update(){
    	if(request()->isGet()){
    		$channel = model("Channel")->find($_GET['id']);
    		$this->assign("channel",$channel);
    		return $this->fetch();
    	}
    	model("Channel")->where(['id'=>$_POST['id']])->update(['name'=>$_POST['name']]);
        $this->redirect("admin/channel/index");
    }
    function add(){
    	if(request()->isGet()){
    		return $this->fetch();
    	}
    	model("Channel")->addDate($_POST['name']);
    	$this->redirect("admin/channel/index");
    }
    function del(){
    	model("Channel")->destroy($_GET['id']);
    	$this->redirect("admin/channel/index");
    }

}