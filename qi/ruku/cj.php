<?php
header("content-type:text/html;charset=utf8");
include("/QL/phpQuery.php");
include("/QL/QueryList.php");
$url="http://news.ifeng.com/mainland/";
$rules=array(
	"title"=>array(".juti_list h3 a ","text"),
	"nei"=>array(".clearfix p ","text"),
	"data"=>array(".ping03 span","text"),
	"photo"=>array(".ju_pic a img ","src"),

	);
$q=\QL\QueryList::Query($url,$rules);
$res=$q->getData();
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
for ($i=0; $i <7; $i++) { 
	$title=$res[$i]["title"];
	$nei=$res[$i]["nei"];
	$data=$res[$i]["data"];
	$photo=$res[$i]["photo"];

	$imgcode=file_get_contents($photo);
	file_put_contents("img-{$i}.jpeg",$imgcode);

	$sql="insert into book values(null,'$title','$nei','$data','$photo')";
	$arr=$pdo->exec($sql);
}


?>