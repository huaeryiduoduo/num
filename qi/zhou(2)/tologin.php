<?php
session_start();
header("content-type:text/html;charset=utf8");
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$name=$_POST["name"];
$pass=$_POST["pass"];
$res=$pdo->query("select * from zhou where name='$name' and pass='$pass'")->fetch();
if($res){
	$_SESSION["name"]=$name;
echo '<script>alert("成功");location="zhuan.php"</script>';
}else{
echo '<script>alert("失败");location="index.html"</script>';
}

?>