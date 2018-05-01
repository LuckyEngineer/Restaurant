<?php
namespace app\index\controller;
use think\Controller;

class Loginchecker extends controller{
    public function _initialize(){
        if(!session("?id")){
            $this->redirect("index/login/index");
            exit();
            
        }
        
    }
}  