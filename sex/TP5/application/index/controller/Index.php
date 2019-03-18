<?php
namespace app\index\controller;
use think\Db;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $data=Db::name("cat")->select();
        $res=$data=getThree($data);
        dump($res);
     return view();
    }
}
