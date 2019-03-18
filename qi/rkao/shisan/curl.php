<?php
header("content-type:text/html;charset=utf8");
$cu=curl_init();
curl_setopt($cu,CURLOPT_URL,"https://www.chinanews.com/");
curl_setopt($cu,CURLOPT_RETURNTRANSFER,1);
curl_setopt($cu,CURLOPT_SSL_VERIFYPEER,0);
$res=curl_exec($cu);
$arr="#<li id=.*><a  href=.* title='.*' alt='.*'>(.*)</a>.*</li>#isU";
preg_match_all($arr, $res,$page);
$val=$page[1];
var_dump($val);
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
foreach ($val as $key => $res) {
	$sql="insert into user values(null,'$res')";
	$res=$pdo->exec($sql);
}

?>
