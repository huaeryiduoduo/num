<?php
header("content-type:text/html;charset=utf8");
 $mc= new Memcache();
 $mc->connect("127.0.0.1",11211);
 $mclist=$mc->get("res");
 $pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
 if($mclist){
 	$mclist=$res;
 	echo "memcache";
 }else{
$res=$pdo->query("select * from deng")->fetchAll();
echo "pdo";
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
		<table border="1" width="60%">
			<tr>
				<td>id</td>
				<td>标题</td>
				<td>简介</td>
				<td>时间</td>
			</tr>
			<?php foreach ($res as $key => $v){ ?>
				<tr>
					<td><?php echo $v["id"];?></td>
					<td><?php echo $v["title"];?></td>
					<td><?php echo $v["jian"];?><a href="show.php?id=<?php echo $v['id'];?>">生成静态页</a></td>
					<td><?php echo $v["data"];?></td>
				</tr>
			<?php } ?>
		</table>
	</center>
</body>
</html>