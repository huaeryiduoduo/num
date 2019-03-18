<?php
session_start();
header("content-type:text/html;charset=utf8");
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$name=$_POST["name"];
$ming=$_POST["ming"];
$money=$_POST["money"];
$payname=$_SESSION["name"];
$pdo->beginTransaction();
$num="updata  zhou money=money-'$money' where name='$payname'";
$num1="updata  zhou money=money+'$money' where name='$name'";
$pdo->exec($num);
$pdo->exec($num1);
if($num>0&&$num1>0){
	echo "1";
$pdo->commit();
}else{
	echo "0";
$pdo->rollBack();
}

?>