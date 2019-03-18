<?php
header("content-type:text/html;charset=utf8");
$name=$_POST["name"];
$pass=$_POST["pass"];
$passto=$_POST["passto"];
$email=$_POST["email"];
if($pass!=$passto){
	echo "两次密码不一致";
	die;
}
$pdo= new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$res= $pdo->exec("insert into deng value(null,'$name','$pass','$email')");
if($res){
echo "<script>alert('成功');location='show.php'</script>";
}else{
echo "失败";
}

?>