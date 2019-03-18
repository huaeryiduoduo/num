<?php
header("Content-type:text/html;charset=utf-8");	
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$mc=new Memcache();
$mc->connect("127.0.0.1",11211);
if(isset($_GET["zuo"])){
	$zuo=$_GET["zuo"];
	$sql="select * from zhou where zuo='$zuo'";
	$res=$pdo->query($sql)->fetchAll();
	$mc->set($zuo,$res);
	$mcres=$mc->get($zuo);
	if($mcres){
		$res = $mcres;
		echo "111";
	}
}else{
	$res=$pdo->query("select * from zhou")->fetchAll();
	echo "222";
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
<form action="?">
	<input type="text" name="zuo">
	<input type="submit" value="搜索">
</form>
	<table border=1 width="100%">
		<tr>
			<td>排名</td>
			<td>类型</td>
			<td>名字</td>
			<td>章节</td>
			<td>时间</td>
			<td>作者</td>
			<td>转载</td>
			<td>访问量</td>
		</tr>
		<?php foreach ($res as $key => $v){ ?>
			<tr>
				<td><?php echo  $v['pai']; ?></td>
				<td><?php echo  $v['lei']; ?></td>
				<td><?php echo  $v['zuo']; ?></td>
				<td><?php echo  $v['new']; ?></td>
				<td><?php echo  $v['data']; ?></td>
				<td><?php echo  $v['name']; ?></td>
				<td><?php echo  $v['zhuang']; ?></td>
				<td><?php echo  $v['List']; ?></td>
			</tr>
		<?php } ?>
	</table>
	</center>
</body>
</html>