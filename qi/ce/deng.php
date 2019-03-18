<?php
session_start();
header("content-type:text/html;charset=utf8");
$name=$_POST["name"];
$pass=$_POST["pass"];
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$res=$pdo->query("select * from deng where phone='$name' and pass='$pass'")->fetch();
if($res){
	$_SESSION["phone"]=$name;
echo '<script>alert("登录成功");location="zhuan.php"</script>';
}else{
	echo '<script>alert("登录失败");location="index.html"</script>';
}




?>