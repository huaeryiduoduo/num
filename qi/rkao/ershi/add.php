<?php
header("content-type:text/html;charset=utf8");
$cu=curl_init();
curl_setopt($cu,CURLOPT_URL,"http://news.ifeng.com/mainland/");
curl_setopt($cu,CURLOPT_RETURNTRANSFER,1);
$page=curl_exec($cu);
$sql='#<h3><a href=".*" target="_blank" title=".*" class="js_url js_title">(.*)</a></h3> #isU';
preg_match_all($sql, $page,$title);
$title=$title[1];

$photo='#<div class="ju_pic"><a href=".*" target="_blank" title=".*"><img src="(.*)" width="150" height="95"></a></div>#isU';
preg_match_all($photo, $page,$photos);
$photos=$photos[1];

$jian='#<p>(.*)<a href=".*" target="_blank" title=".*">.*</a></p> #isU';
preg_match_all($jian, $page,$jians);
$jians=$jians[1];


$data='#  <span>(.*)</span> #isU';
preg_match_all($data, $page,$datas);
$data=$datas[1];

$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$pdo->beginTransaction();
for ($i=0; $i <10 ; $i++) { 
	//$ph=file_get_contents("http:".$photos);
	//file_put_contents("img-{$i}.jpg",$ph);
	$sql="insert into deng values(null,'$title[$i]','$photos[$i]','$jians[$i]','$data[$i]')";
	$pdo->exec($sql);
}


?>