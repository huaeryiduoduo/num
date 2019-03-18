<?php
header("Content-type:text/html;charset=utf-8");	
$cu=curl_init();
curl_setopt($cu,CURLOPT_URL,"http://top.17k.com/top/top100/06_vipclick/06_vipclick_serialWithLong_top_100_pc.html");
curl_setopt($cu,CURLOPT_RETURNTRANSFER,1);
$res=curl_exec($cu);
$page='#<tr ><td width=".*">.*</td><td width=".*"><a href=".*" target="_blank">(.*)</a></td><td><a class="red" href=".*" title=".*" target="_blank">(.*)</a></td><td><a href=".*" title=".*" target="_blank">(.*)</a></td><td>(.*)</td><td><a href=".*" title=".*" target="_blank">(.*)</a></td><td width=".*">(.*)</td><td>(.*)</td></tr>#isU';
preg_match_all($page,$res,$arr);
var_dump($arr[1]);
?>