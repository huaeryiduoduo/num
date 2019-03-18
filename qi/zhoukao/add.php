<?php
header("content-type:text/html;charset=gbk");
$cu=curl_init();
curl_setopt($cu,CURLOPT_URL,"https://pvp.qq.com/");

curl_setopt($cu,CURLOPT_RETURNTRANSFER,1);
curl_setopt($cu,CURLOPT_SSL_VERIFYPEER,0);
$res=curl_exec($cu);
$sql='#<a href=".*" target=".*" class=".*" style=".*" onclick=".*">(.*)</a>#isU';

preg_match_all($sql,$res,$arr);
$name=$arr[1];
var_dump($name);
$mc=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
for ($i=0; $i<=10 ; $i++) { 
	$res=$mc->exec("insert into user values(null,'$name[$i]')");
}



?>