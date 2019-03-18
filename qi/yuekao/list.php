<?php
header("content-type:text/html;charset=utf8");
$pdo=new PDO("mysql:host=127.0.0.1;dbname=yuekao","root","root");
$mc=new Memcache();
$mc->connect("127.0.0.1",11211);
$mem=$mc->get("list");
if($mem){
	$res=$mem;
	echo "Memcache";
}else{
	 $res=$pdo->query("select *from monsh")->fetchAll();
	 echo "mysql";
}
 





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
				<td>月薪</td>
				<td>地点</td>
				<td>公司</td>
				<td>时间</td>
				<td>采集</td>
			</tr>
			<?php foreach ($res as $key => $v){ ?>
				<tr>
					<td><?php echo $v['id'];?></td>
					<td><?php echo $v['title'];?></td>
					<td><?php echo $v['money'];?></td>
					<td><?php echo $v['home'];?></td>
					<td><?php echo $v['boss'];?></td>
					<td><?php echo $v['data'];?></td>
					<td><a href="show.php?id=<?php echo $v['id'];?>">生成静态页</a></td>

				</tr>
			<?php } ?>
		</table>
	</center>	
</body>
</html>