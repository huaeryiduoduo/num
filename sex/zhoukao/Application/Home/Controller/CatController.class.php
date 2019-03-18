<?php
namespace Home\Controller;
use Think\Controller;
class CatController extends Controller
{
    public function index()
    {

        $res=M("cat")->query("select  *,concat(path,'-',cat_id) as depath from tp_cat order by depath");

        $this->assign("res",$res);
        $this->display("index");
    }
    public function add()
    {
        if($_POST){
            $data=I("post.");

           $res= M("cat")->add($data);
            if($res){
                $res=M("cat")->select();
                $this->assign("res",$res);

                $this->success("成功","add");

            }else{
                $this->error("失败");
            }

        }else{
            $res=M("cat")->query("select  *,concat(path,'-',cat_id) as depath from tp_cat order by depath");
            $this->assign("res",$res);

            $this->display();
        }

    }
}