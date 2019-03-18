<?php
header("content-type:text;html;charset=utf8");
$dbo= new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$res=$dbo->query("select * from zhou")->fetchAll();




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="">
		<center>
			<table border="1px">
				<tr>
					<td>手机</td>
					<td>密码</td>
					<td>钱数</td>
					<td>姓名</td>
				</tr>
				<?php foreach ($res as $key => $val){ ?>
					<tr>
					<td><?php echo $val["name"];?></td>
					<td><?php echo $val["pass"];?></td>
					<td><?php echo $val["money"];?></td>
					<td><?php echo $val["ming"];?></td>
				</tr>
				<?php } ?>
				
			</table>
		</center>	
	</form>
</body>
</html>
