<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Loginchecker
{
    function index(){
      return $this->fetch();
    }
}