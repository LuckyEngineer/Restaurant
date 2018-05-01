<?php
namespace app\admin\controller;
use think\Controller;

class Order extends Loginchecker
{

    function index(){
    $orders = model("Orders")->getAll();
    // echo "<pre>";
    // print_r($orders);
    // 将orders参数传递到视图模板上
    $this->assign("orders",$orders);
    return $this->fetch();
    }
}