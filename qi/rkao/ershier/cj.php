<?php
header("content-type:text/html;charset=UTF-8");
include("QL/phpQuery.php");
include("QL/QueryList.php");
$url="https://www.chinanews.com/tp/chart/index.shtml";
$page=array(
		"photo"=>array(".topimg img","src"),
		"url"=>array(".bottomtext a ","href"),
		"title"=>array(".bottomtext a ","text"),


	);
$q=\QL\QueryList::query($url,$page,'','UTF-8','GB2312');
$res=$q->getData();
$pad=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
for ($i=0; $i <30 ; $i++) { 
	$photo=$res[$i]["photo"];
	$url=$res[$i]["url"];
	$title=$res[$i]["title"];
	//$mc=file_get_contents("https:".$photo);
	//file_put_contents("img-{$i}.jpg",$mc);
	//var_dump($title);
	$sql="insert into deng values(null,'$photo','$url','{$title}')";
	//var_dump($sql);

	$arr=$pad->exec($sql);

}

?>