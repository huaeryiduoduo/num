<?php 
$mc= new Memcache();
$mc->connect("127.0.0.1",11211);
$mc->add("pwd","123");
$mcpwd=$MC->get("pwd");

?>