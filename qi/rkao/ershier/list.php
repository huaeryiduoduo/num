<?php
header("content-type:text/html;charset=utf8");
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$mc=new Memcache();
$mc->connect("127.0.0.1",11211);
$mema=$mc->get("list");
if($mema){
	$res=$mema;
echo "mem ";
}else{
	$sql="select * from deng ";
	$res=$pdo->query($sql)->fetchAll();
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
	<table border="1">
	<?php foreach ($res as $key => $v){?>
		<tr>
			<td><?php echo $v['id'];?></td>
				<td><?php echo $v['url'];?></td>
					<td><?php echo $v['title'];?><a href="show.php?id=<?php echo $v['id'];?>">采集</a></td>
		</tr>
	<?php } ?>
		
	</table>
</body>
</html>