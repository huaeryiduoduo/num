<?php
header("content-type:text/html;charset=utf8");
$cu=curl_init();
curl_setopt($cu,CURLOPT_URL,"https://www.readnovel.com/");
curl_setopt($cu,CURLOPT_RETURNTRANSFER,1);
curl_setopt($cu,CURLOPT_SSL_VERIFYPEER,0);
$res=curl_exec($cu);
$v='#<li data-rid=".*"><div class=".*"><a href=".*" data-eid="qd_F23" data-bid=".*" target="_blank"><img src=".*" alt=".*"></a></div><div class="book-info"><h4><a href=".*" data-eid="qd_F24" data-bid=".*" target="_blank" title=".*">(.*)</a></h4><p>(.*)</p><div class="state-box cf"><i>(.*)</i><a class="author default" data-eid="qd_F25" target="_blank"><img src="//qidian.gtimg.com/readnovel/images/ico/user.f22d3.png">(.*)</a></div></div></li>#isU';
preg_match_all($v,$res,$val);
var_dump($val[1]);
?>