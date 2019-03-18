<?php
class Db{
	public $pdo;
	public function __construct(){
		$this->pdo=new PDO("MYSQL:HOST=127.0.0.1;dbname=1608b","root","root");
	}
	public function add($sql){
		return $this->pdo->exec($sql);
	}






}




?>