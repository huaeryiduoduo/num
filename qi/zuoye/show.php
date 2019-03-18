<?php
ob_start();
header("content-type:text/html;charset=utf8");
$id=$_GET["id"];

$pdo=new PDO("mysql:host=127.0.0.1;dbname=yuekao","root","root");
$res=$pdo->query("select * from cj where id='$id'")->fetch();




?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h3><td><?php echo $res['id'];?></td></h3>
	<h3><td><?php echo $res['peoples'];?></td>
	<h3><td><?php echo $res['home'];?></td></h3></h3>				
	<h3><td><?php echo $res['data'];?></td></h3>
</body>
</html>
<?php
$static=ob_get_contents();
file_put_contents("static-{$id}.html",$static);




?>