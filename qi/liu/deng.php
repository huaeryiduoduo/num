<?php
header("content-type:text/html;charset=utf8");
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$res=$pdo->query("select *from user")->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table>
	<?php  foreach ($res as $key => $val) {?>
		

		<tr>
			<td><?php echo $val["id"]?></td>
			<td><?php echo $val["name"]?></td>
			<td><a href="user.php?id=<?php echo $val['id']?>">删除</a></td>
		</tr>
			<?php }?>
	</table>
</body>
</html>