<?php
header("content-type:text/html;charset=utf8");
$name=$_POST["name"];
$pass=$_POST["pass"];
$dbo=("mysql:host=127.0.0.1;dbname=1608b");
$user="root";
$pwd="root";
$pdo=new PDO($dbo,$user,$pwd);
$res=$pdo->query("insert into user values(null,'$name','$pass')");
if($res){
    echo'<script>alert("注册成功");location="index.html"</script>';
}else{
echo'<script>alert("注册失败");location="zhu.html"</script>';
}

?>