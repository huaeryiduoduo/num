<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function index()
    {
        $this->display();
    }

    public function add()
    {
        $res = I("post.");
        $data=$this->upload($res);
        $res["brand_logo"]=$data;
        $data=M("brand")->add($res);
        $arr=M("brand")->select();
       if($data){


           $this->success("成功",show);
       }else{
           $this->error("对不起，失败");
       }
    }
public function show(){
    $res = M('brand');
    $count      = $res->count();// 查询满足要求的总记录数
    $Page       = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    $show       = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    $list = $res->limit($Page->firstRow.','.$Page->listRows)->select();
    $this->assign('list',$list);// 赋值数据集
    $this->assign('page',$show);// 赋值分页输出
    $this->display();
}

    public function del(){
        $id=I("post.");

        $res=M("brand")->delete($id);
        if($res){
        $this->ajaxReturn(array("statu"==1));
        }else{
        $this->ajaxReturn(array("statu"==0));
        }

    }






    
       public function sou(){
        $name=I("post.brand_name");
       $data=M("brand")->where("brand_name='$name'")->select();
       $this->assign("list",$data);
      $this->display();



       }








    public function upload($res)
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
         $upload->rootPath  =      './Public/'; // 设置附件上传目录    // 上传文件
         $info   =   $upload->upload();
       $res=$info["brand_logo"]["savepath"].$info["brand_logo"]["savename"];
        return $res;

    }
}