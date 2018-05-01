<?php
namespace app\admin\controller;
use think\Controller;

class products extends Loginchecker{
   public function _initialize(){
    	parent::_initialize();
    }

    // 
    function add(){
      if(request()->isGet()){
        $channel= db("channel")->select();
        $this->assign("channels",$channel);
        return $this->fetch();
        exit;
      }

   	  // 获取表单上传文件
    	$file = request()->file('img');
   
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'static' . DS .'img' . DS . 'uploads');
        if($info){
            // 成功上传后 获取上传信息
            
            $img = $info->getSaveName(); 
            
        }else{
            // 上传失败获取错误信息
            $this->error("上传失败");
        }    
    

   	    $product['cid']=$_POST['cid'];
   	    $product['name']=$_POST['name'];
   	    $product['price']=$_POST['price'];
   	    $product['selled']=0;
   	    $product['liked']=0;
   	    $product['img']=$img;
   	    db("products")->insert($product);
   	    $this->redirect("admin/products/add");
   }
    //   function all(){
    //   $pro=model("products")->getAll();
    //   $this->assign('pro',$pro);
    //   return $this->fetch();
    // }
      function search(){
        $page=1;
        $pro=model("products")->search();
        // $this->assign('pro',$pro);
        $this->assign('pro',$pro);
        
        $this->assign('page',$page);
        return $this->fetch('all');     
      
      }
      
     function all(){
      
        if(!isset($_GET['page'])){
            $page=1;
        }
        else{ 
          $page = $_GET['page'];
        }
        if($page == 0){
            $page=1;
            
          }
        
       
        $pro = Model('products')->showpro($page);
        $this->assign('pro',$pro);
        
        $this->assign('page',$page );
        return $this->fetch();
        exit;
      
    }
      function del(){
        $id = $_GET['id'];
        model('products')->destroy1($id);
        $this->redirect("admin/products/all");
      }
    
}