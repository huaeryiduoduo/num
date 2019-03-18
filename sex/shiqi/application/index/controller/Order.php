<?php
namespace app\index\controller;
use think\Db;
use think\Controller;

class Order extends Controller{
    public function index()
    {
       $res= Db::name("goods")->select();
        var_dump($res);
        return view();
    }


}