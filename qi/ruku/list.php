<?php
header("content-type:text/html;charset=utf8");
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");

$res=$pdo->query("select *from book")->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<table border="1">
			<tr>
				<td>id</td>
				<td>标题</td>
				<td>内容</td>
				<td>时间</td>
			</tr>
			<?php foreach ($res as $key => $v){ ?>
				<tr>
					<td><?php  echo $v["id"];?></td>
					<td><?php  echo $v["title"];?></td>
					<td><?php  echo $v["biao"];?><a href="show.php?id=<?php  echo $v["id"];?>">采集</a></td>
					<td><?php  echo $v["data"];?></td>
				</tr>
			<?php } ?>
		</table>
	</center>
</body>
</html>