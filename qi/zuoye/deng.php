<?php
header("content-type:text/html;charset=utf8");
$pdo=new PDO("mysql:host=127.0.0.1;dbname=yuekao","root","root");
$name=$_POST["name"];
$pass=$_POST["pass"];
$res=$pdo->query("select *from user where name='$name' and pass='$pass'")->fetch();
if($res){
echo '<script>alert("登录成功");location="cj.php"</script>';
}else{
echo '<script>alert("登录失败");location="deng.html"</script>';
}



?>