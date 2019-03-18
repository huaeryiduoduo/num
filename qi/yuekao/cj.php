<?php
header("content-type:text/html;charset=utf8");
$cu=curl_init();
//$pdo=new PDO("mysql:host=127.0.0.1;dbname=yuekao","root","root");
curl_setopt($cu,CURLOPT_URL,"https://m.zhaopin.com/beijing-530/?keyword=php&order=0&maprange=3&ishome=0 ");
curl_setopt($cu, CURLOPT_RETURNTRANSFER,1);
curl_setopt($cu, CURLOPT_SSL_VERIFYPEER, 0);
$res=curl_exec($cu);
//var_dump($res);

$sql='#<div class="job-name fl ">(.*)</div>#isU';
$page=preg_match_all($sql, $res, $title);
$title=$title[1];

$sql1='#<div class="fl">(.*)</div>#isU';
$page=preg_match_all($sql1, $res, $money);
//var_dump($money[1]);
$money=$money[1];


$sql2='#  <span class="ads">(.*)</span>#isU';
$page=preg_match_all($sql2, $res, $home);
$home=$home[1];


$sql3='#<div class="comp-name fl">(.*)</div>#isU';
$page=preg_match_all($sql3, $res, $boss);
$boss=$boss[1];



 $sql4='#<div class="time fr">(.*)</div>#isU';
$page=preg_match_all($sql4, $res, $data);
$data=$data[1];


 $sql5='# <a class="boxsizing" data-link="(.*)">#isU';
$page=preg_match_all($sql5, $res, $url);
$url=$url[1];

 $pdo=new PDO("mysql:host=127.0.0.1;dbname=yuekao","root","root");
 for ($i=0; $i <20 ; $i++) { 
 	$sql="insert into monsh values(null,'$title[$i]','$money[$i]','$home[$i]','$boss[$i]','$data[$i]','$url[$i]')";
 	$res=$pdo->exec($sql);
 }

?>