<?php
session_start();
header("content-type:text/html;charset=utf8");
echo "您好".$_SESSION['name']."用户登录成功";
$con=@mysql_connect('127.0.0.1','root','root');
$db = mysql_select_db('1608b');
mysql_query('set names utf8');
$sql = 'select *from user';
$res = mysql_query($sql);
$array=array();
while($arr=mysql_fetch_assoc($res)){
	$array[]=$arr;
}
var_dump($array);



?>