<?php
header("content-type:text/html;charset=utf8");
$name=$_POST["name"];
$money=$_POST["money"];

$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$res=$pdo->query("select * from deng where phone='$name' and money>='$money'")->fetch();
if($res){
echo "yes";
}else{
echo "no";
}

?>
