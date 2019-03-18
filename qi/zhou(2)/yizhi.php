<?php
header("content-type:text/html;charset=utf8");
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$name=$_POST["name"];
$ming=$_POST["ming"];
$res=$pdo->query("select * from zhou where name='$name' and ming='$ming'")->fetch();
if($res){
 echo "yes";
}else{
echo "no";
}


?>