<?php
namespace app\index\controller;
use think\Db;
use think\Controller;

class Cat extends Controller{
    public function index()
    {  $res= Db::name('cat')->select();
        $res=getSon($res);
        $flag=1;

        $this->assign("res",$res);
        $this->assign("flag",$flag);
        return view();



    }



}