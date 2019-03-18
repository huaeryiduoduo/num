<?php
session_start();
header("content-type:text/html;charset=utf8");
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$res=$pdo->query("select * from deng ")->fetchAll();

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
				<tr>
					<td>转账金额</td>
					<td><input type="text" name="money" id="money"></td>
				</tr>
				<tr>
					<td>收款人</td>
					<td><select name="phone">
					<?php foreach ($res as $key => $val){ ?>
							<option value="<?php  echo $val["phone"] ?>"><?php  echo $val["phone"] ?></option>
					<?php } ?>
					
					</select></td>
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
	$(document).on("blur","#money",function(){
		var money=$(this).val();
		var name="<?php echo $_SESSION['phone']; ?>"
		$.ajax({
			type:"post",
			url:"money.php",
			data:{money:money,name:name},
			susccess:function(e){
				if(e=='no'){
						alert("足够");
				}else{
						alert("不足");
				}		
			}
		})
	})
</script>