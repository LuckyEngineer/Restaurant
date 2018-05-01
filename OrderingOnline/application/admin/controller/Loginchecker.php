<?php
namespace app\admin\controller;
use think\Controller;

class Loginchecker extends controller{
    public function _initialize(){
        if(!session("?admin")){
            $this->redirect("admin/login/index");
            exit();
        }
        
    }
}    