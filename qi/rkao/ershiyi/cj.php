<?php
header("content_type:text/html;charset=utf8");
$cu=curl_init();
curl_setopt($cu, CURLOPT_URL, "https://pvp.qq.com/webplat/info/news_version3/15592/24091/24092/24094/m15240/list_1.shtml");
curl_setopt($cu, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($cu, CURLOPT_SSL_VERIFYPEER, 0);
$cont=curl_exec($cu);
//var_dump($cont);
$url='#<a href="(.*)" class="art_word" target="_blank">.*</a>#isU'; 
preg_match_all($url, $cont, $urls);
$urls=$urls[1];

$tit='#<a href=".*" class="art_word" target="_blank">(.*)</a>#isU'; 
preg_match_all($tit, $cont, $title);
$title=$title[1];
$data='#<span class="art_day">(.*)</span>#isU'; 
preg_match_all($data, $cont, $time);
$data=$time[1];

$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
for ($i=5; $i <16; $i++) { 
	$sql="insert into book values(null,'$urls[$i]','$title[$i]','data[$i]')";
$res=$pdo->exec($sql);
}




?>