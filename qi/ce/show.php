<?php
session_start();
header("content-type:text/html;charset=utf8");
$payname=$_SESSION["phone"];
$phone=$_POST["phone"];
$money=$_POST["money"];
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$pdo->beginTransaction();
$num1="update deng set money=money-'$money'where phone='$payname'";
$num2="updata deng set money=money+'$money'where phone='$phone'";
$res1=$pdo->exec($num1);
$res2=$pdo->exec($num2);
if($res1>0&&$res2>0){
	echo "pay success";
	$pdo->commit();
}else{
    echo "pay faild";
	$pdo->rollBack();
}

?>