<?php
header("content-type:text/html;charset=utf-8");
include("QL/phpQuery.php");
include("QL/QueryList.php");
$url="http://www.huodongxing.com/eventlist?orderby=o&tag=%E4%BA%92%E8%81%94%E7%BD%91&city=%E5%85%A8%E9%83%A8";
$page=array(
	"title"=>array(".item-title-wrap .item-title","text"),
	"data"=>array(".item-data ","text")

	);
$p=\QL\QueryList::query($url,$page);
$res=$p->getData();
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
for ($i=0; $i <10 ; $i++) { 
	$title=$res[$i]["title"];
	var_dump($title);
	$data=$res[$i]["data"];
	$sql="insert into user values(null,'$title[$i]','$data[$i]')";
	var_dump($sql);
}

?>