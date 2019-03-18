<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function p($data){
    header("content-type:text/html;charset=utf-8");
    echo "<pre>";
    print_r($data);
}

function getCatSon($data,$parentId=0,$level=1){
    static $arr = array();
    foreach ($data as $key => $val) {
        if($val['parent_id'] == $parentId){
            $val['level'] = $level;
            $arr[] = $val;
            getCatSon($data,$val['cat_id'],$level+1);

        }
    }
    return $arr;
}

function getThree($data,$parentId = 0){
    $arr = [];
    foreach ($data as $key => $val) {
        //找孩子
        if($val['parent_id']==$parentId){


            $val['son'] = getThree($data,$val['cat_id']);
            $arr[]= $val;
        }
    }
    return $arr;
}

function getSon($data,$parentId = 0){
    static $arr = [];
    foreach ($data as $key => $val) {
        if($val['parent_id']==$parentId){
            $arr[] = $val;
            getSon($data,$val['cat_id']);
        }
    }
    return $arr;
}
