<?php
header("content-type:text/html;charset=utf8");
$id=$_GET["id"];
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$res=$pdo->prepare("delete from deng where id= :id");
$res->bindParam(":id",$id);
$res->execute();



?>