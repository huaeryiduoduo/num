<?php
header("content-type:text/html;charset=utf8");
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$i=1;
while ( $i<=392) {
	$sql="insert into zhou values(null,'1111','小明','www.baidu.com','哈哈哈哈','2018-11-15')";
	$pdo->exec($sql);
	$i++;
}

?>