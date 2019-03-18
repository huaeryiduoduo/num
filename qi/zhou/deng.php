<?php
session_start();
header("content-type:text/html;charset=utf8");
$name=$_POST["name"];
$pass=$_POST["pass"];
$dbo=("mysql:host=127.0.0.1;dbname=1608b");
$user="root";
$pwd="root";
$pdo=new PDO($dbo,$user,$pwd);
$res=$pdo->query("select *from zhou where name='$name' and pass='$pass'")->fetchAll();
if ($res) {
	$_SESSION["name"]=$name;
	echo '<script>alert("登录成功");location="show.php"</script>';
}else{
echo '<script>alert("登录失败");location="index.html"</script>';
}

?>