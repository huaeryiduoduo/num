<?php
header("content-type:text/html;charset=utf8");
$cu=curl_init();
curl_setopt($cu,CURLOPT_URL,"http://www.bwie.net/");
curl_setopt($cu,CURLOPT_RETURNTRANSFER,1);
$res=curl_exec($cu);
$pag='#<span>.*</span><a href=".*" title=".*" target="_blank">(.*)</a></p>#isU';
preg_match_all($pag,$res,$arr);
var_dump($arr[1]);
?>