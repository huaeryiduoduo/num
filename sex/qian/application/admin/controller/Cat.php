<?php
namespace app\admin\controller;
use think\Db;
use think\Controller;
class Cat extends Controller
{
    public function index()
    {
        $res=Db::name("cat")->where('is_show=1')->select();
        $data=getThree($res,0);
        //dump($data);
        $this->assign('res',$data);
        return view ();
    }
}

