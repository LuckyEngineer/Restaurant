<?php
namespace app\index\controller;

use think\Controller;

class Dingdan extends controller{
  function index(){
    return $this->fetch();
  }
}