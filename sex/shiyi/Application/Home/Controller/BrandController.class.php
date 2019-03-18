<?php
namespace Home\Controller;
use Think\Controller;
class BrandController extends Controller
{
    public function index()
    {
        $this->display();
    }

    public function add()
    {
        if ($_POST) {
            $data = I("post.");

           $uploads= $this->uploads();
            $data["brand_logo"]=$uploads;

            $res = M("brand")->add($data);
            if ($res) {

                    $res=M("brand")->select();
                $this->assign("res",$res);
                $this->display("add");
            }else{
                $this->error("错误");
            }
        } else {

            $User = M('brand'); // 实例化User对象
            $count      = $User->count();
            // 查询满足要求的总记录数
            $Page = new \Think\Page($count,4);
            // 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show       = $Page->show();
            $list = $User->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('res',$list);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $Page->setConfig('prev','上一页');
            $Page->setConfig('next','上一页');

            $this->display(); // 输出模板
        }
    }

    public function uploads()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/'; // 设置附件上传目录    // 上传文件
        $info = $upload->upload();
        if($info){
            return $info["brand_logo"]["savepath"].$info["brand_logo"]["savename"];
        }else{
            return false;
        }

    }

    public function del(){
        $id=I("get.id");
       // var_dump($id);
        $res=M("brand")->delete($id);
       if($res){
           $this->success("移除成功");
       }else{
           $this->error("移除失败");
       }

    }




}