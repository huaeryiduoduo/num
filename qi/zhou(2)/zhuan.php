<?php
session_start();
header("content-type:text/html;charset=utf8");
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="show.php" method="post">
		<center>
			<table>
			<h2>当前用户[<?php echo $_SESSION['name'];?>]</h2>
				<tr>
					<td>手机号</td>
					<td><input type="text" name="name" id="name"></td>
				</tr>
				<tr>
					<td>姓名</td>
					<td><input type="text" name="ming" id="ming"></td>
				</tr>
				<tr>
					<td>转账金额</td>
					<td><input type="text" name="money" id="money"></td>
				</tr>
				<tr>
					<td><input type="submit" value="转账"></td>
					
				</tr>
			</table>
		</center>
	</form>
</body>
</html>
<script src="js.js"></script>
<script>
	$(document).on("blur","#ming",function(){
		var ming=$(this).val();
		var name=$("#name").val();
		$.ajax({
			type:"post",
			url:"yizhi.php",
			data:{name:name,ming:ming},
			success:function(e){
				if(e=='yes'){
					alert("手机和用户名匹配");
				}else{
					alert("手机和用户名不匹配");
				}
			}
		})
	})
	$(document).on("blur","#money",function(){
		var money=$(this).val();
		var name=$("#name").val();
		$.ajax({
			type:"post",
			url:"jin.php",
			data:{name:name,money:money},
			success:function(e){
				if(e=='yes'){
					alert("足够");
				}else{
					alert("不足");
				}
			}
		})
	})
</script>