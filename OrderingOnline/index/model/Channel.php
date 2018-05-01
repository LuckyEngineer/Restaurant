<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Channel extends Model{
	function getchannel(){
		$channel = db('channel')->select();
		return $channel;
	}
}