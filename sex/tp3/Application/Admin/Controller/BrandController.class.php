<?php
namespace Admin\Controller;
use Think\Controller;
class BrandController extends Controller{
    public function index()
    {
        $this->display("");}
    public function add()
    {
        if($_POST){
            $res=I("post.");
            $uplode=$this->uplode();
           $res["brand_logo"]=$uplode;
           $res=M("brand")->add($res);
           if($res){
               $res=M("brand")->select();
               $this->assign("res",$res);
               $this->success("成功","add");
           }else{
               $this->error("失败");
           }

       }else{
            $res=M("brand")->select();
            $this->assign("res",$res);


           $this->display("");

       }

   }
   public function uplode(){
       $upload = new \Think\Upload();
       // 实例化上传类
        $upload->maxSize   =     3145728 ;
        //设置附件上传大小
         $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
        // 设置附件上传类型
         $upload->rootPath  =      './Public/'; // 设置附件上传目录
         // 上传文件
          $info   =   $upload->upload();
       if($info){
           return $info["brand_logo"]["savepath"].$info["brand_logo"]["savename"];

       }else{
           return false;
       }

   }
    public function upd(){
        $name=I("post.name");
        $id=I("post.id");
        $res = M("brand")->execute("update tp_brand set brand_name='$name' where brand_id=$id");
        if($res){
            $this->ajaxReturn(array("state"=>1));
        }else{
            $this->ajaxReturn(array("state"=>0));
        }


    }



}