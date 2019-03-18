<?php
header("content-type:text/html;charset=utf8");
$cu=curl_init();
curl_setopt($cu,CURLOPT_URL,"http://www.bwie.net/");
curl_setopt($cu,CURLOPT_RETURNTRANSFER,1);
$res=curl_exec($cu);

$para='#<span>.*</span><a href=".*" title=".*" target="_blank">(.*)</a></p>#isU';
preg_match_all($para,$res,$page);
echo "<pre>";
var_dump($page[1]);
$arr=$page[1];
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
foreach ($arr as $key => $val) {
	$sql="insert into user values(null,'$val')";
	$pdo->exec($sql);
}






?>