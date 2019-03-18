<?php
header("content-type:text/html;charset=utf8");
$name=$_GET["name"];
$pass=$_GET["pass"];
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$res=$pdo->query("select * from user where name='$name' and pass='$pass'")->fetch();
//$res->bindParam(":name",$name);
//$res->bindParam(":pass",$pass);
if($res){
	echo '<script>alert("登录成功");location="cj.html"</script>';
}else{
	echo '<script>alert("登录失败");location="deng.html"</script>';
}

?>