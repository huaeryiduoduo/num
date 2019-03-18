<?php
$link=@mysql_connect("127.0.0.1","root","root");
@mysql_select_db("1608b");
@mysql_query("set names utf8");
$res=@mysql_query("select * from zhou");
$array=array();
while($arr=@mysql_fetch_assoc($res)){
	$array[]=$arr;
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
	<form action="show.php" method="post">
		<table>
		<h3>转账页面</h3>
			<tr>
				<td>要转的钱数：</td>
				<td><input type="text" name="money"></td>
			</tr>
			<tr>
				<td>收款人</td>
				<td><select name="ren" id="">
				<?php foreach ($array as $key => $val) {?>
				
				
					<option value="<?php echo $val["name"] ?>"><?php echo $val["name"] ?></option>
					<?php  } ?>
				</select>
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="转账"></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>