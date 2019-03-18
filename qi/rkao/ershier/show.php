<?php
ob_start();
header("content-type:text/html;charset=UTF-8");
$id=$_GET["id"];
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$res=$pdo->query("select *from deng where id=$id")->fetch();





?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h3><?php echo $res["id"];?></h3>
	<h3><?php echo $res["title"];?></h3>
	<h3><?php echo $res["url"];?></h3>
</body>
</html>




<?php
 $ob=ob_get_contents();
 file_put_contents("static-{$id}.html",$ob);




?>