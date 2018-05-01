<?php
namespace app\admin\model;
use think\Model;
use think\Db;

class Channel extends Model{
	function getAll(){
		return $this->select();
	}
	function addDate($name){
		$channel=$this;
		$channel->data(['name'=>$name]);
		$channel->save();
	}

}