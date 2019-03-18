<?php
header("content-type:text/html;charset=utf8");
//$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$cu=curl_init();
curl_setopt($cu,CURLOPT_URL,"http://www.huodongxing.com/eventlist?orderby=o&tag=%E4%BA%92%E8%81%94%E7%BD%91&city=%E5%85%A8%E9%83%A8");
curl_setopt($cu, CURLOPT_RETURNTRANSFER,1);
//curl_setopt($cu, CURLOPT_SSL_VERIFYPEER,0);
$hide=curl_exec($cu);
$sql='#<a class="item-title" href=".*" target="_blank">(.*)</a>#isU';
preg_match_all($sql, $hide, $arr);
$title=$arr[1];

$people='#<div class="browse-div flex"><span class="icon browse-icon"></span>(.*)</div>#isU';
preg_match_all($people,$hide,$peoples);
$peoples=$peoples[1];

$sql='#<p class="item-data flex"><span class="item-data-icon icon"></span>(.*)</p>#isU';
preg_match_all($sql,$hide,$data);
$data=$data[1];

$sql='#<p class="item-dress flex"><span class="item-dress-icon icon"></span>(.*)</p>#isU';
preg_match_all($sql, $hide, $home);
$home=$home[1];

$sql='#<p class="item-dress flex"><span class="item-dress-icon icon"></span>(.*)</p>#isU';
preg_match_all($sql, $hide,$poss);
$poss=$poss[1];

$sql='# <img class="item-logo" src="(.*)" alt=".*" />
#isU';
preg_match_all($sql, $hide,$photos);
$photo=$photos[1];
$pdo=new PDO("mysql:host=127.0.0.1;dbname=yuekao","root","root");
for ($i=0; $i <20 ; $i++) { 
		$mv=file_get_contents($photo[$i]);
		file_put_contents("img-{$i}.jpg",$mv);
	$sql="insert into cj values(null,'$title[$i]','$peoples[$i]','$data[$i]','$home[$i]','$poss[$i]','$photo[$i]')";
	$res=$pdo->exec($sql);
}
 


?>
