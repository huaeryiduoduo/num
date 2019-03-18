<?
header("content-type:text/html;charset=utf8");
$pdo=new PDO("mysql:host=127.0.0.1;dbname=1608b","root","root");
$name=$_POST["name"];
$money=$_POST["money"];
$res=$pdo->query("select * from zhou where name='$name' and money>='$money'")->fetch();
if($res){
 echo "yes";
}else{
echo "no";
}



?>