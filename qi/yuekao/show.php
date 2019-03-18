<?php
ob_start();
$id=$_GET["id"];
header("content-type:text/html;charset=utf8");
$pdo=new PDO("mysql:host=127.0.0.1;dbname=yuekao","root","root");
 $res=$pdo->query("select *from monsh where id='$id'")->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h3><?php echo $res['id'];?></h3>
	<h3><?php echo $res['title'];?></h3>
	<h3><?php echo $res['money'];?></h3>
	<h3><?php echo $res['home'];?></h3>
</body>
</html>


<?php
$static=ob_get_contents();
file_put_contents("static-{$id}.html", $static);



?>