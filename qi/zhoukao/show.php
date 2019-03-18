<?php
header("content-type:text/html;charset=utf8");
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$mc=new Memcache();
$mc->connect("127.0.0.1",11211);
if(isset($_GET["name"])){
	$name=$_GET["name"];
	$arr=$pdo->query("select *from user where name like'%$name%'")->fetchAll();
		$arr=$mc->get($key);
	if($res){
$res=$arr;
	}else{
		$res=$mc->set($res,$res);
	}
	

}else{
	$res=$pdo->query("select * from user")->fetchAll();
}
//$res=$pdo->query("select * from user")->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>	
	<form action="?">
	<input type="text" name="name">
	<input type="submit" value="搜索">
		
	</form>
	<table border="1" width="100%">
		<tr>
			<td>id</td>
			<td>内容</td>
		</tr>
		<?php foreach ($res as $key => $val){ ?>
			<tr>
				<td><?php echo $val["id"]?></td>
				<td><?php echo $val["name"]?></td>
			</tr>
		<?php } ?>
	</table>
	</center>
</body>
</html>