<?php
header("content-type:text/html;charset=utf8");
$pdo=new PDO("mysql:host=127.0.0.1;dbname=yuekao","root","root");
$mc=new Memcache();
$mc->connect("127.0.0.1",11211);
$mem=$mc->get("list");
if($mem){
	$res=$mem;
	echo "memcache";
}else{
	$res=$pdo->query("select * from cj")->fetchAll();
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
	<table border="1" width="80%">
		<tr>
			<td>id</td>
			<td>标题</td>
			<td>访问量</td>
			<td>时间</td>
			<td>公司</td>
			<td>图片</td>
		</tr>
		<?php foreach ($res as $key => $v){ ?>
			<tr>
				<td><?php echo $v['id'];?></td>
				<td><?php echo $v['title'];?><a href="show.php?id=<?php echo $v['id'];?>">静态页</a></td>
				<td><?php echo $v['peoples'];?></td>
				<td><?php echo $v['data'];?></td>
				<td><?php echo $v['home'];?></td>
				<td><img src="<?php echo $v['photo'];?>" width="60px"></td>
			
			</tr>

		<?php } ?>
	</table>
	</center>
</body>
</html>