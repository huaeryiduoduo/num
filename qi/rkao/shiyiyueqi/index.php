<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<form action="add.php" method="post">
			<table>
				<tr>
					<td>用户名</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>密码</td>
					<td><input type="password" name="pass"></td>
				</tr>
				<tr>
					<td>确认密码</td>
					<td><input type="password" name="passto"></td>
				</tr>
				<tr>
					<td>邮箱</td>
					<td><input type="text" name="email"></td>
				</tr>
				<tr>
					<td><input type="submit" value="注册"></td>
					<td><input type="reset" value="重置"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>