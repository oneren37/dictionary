<?php


$mysql = new mysqli('localhost', 'root', 'root', 'dictionary');
//$result = $mysql->query("SELECT * FROM {$_COOKIE['user']}_dictionary ORDER BY rate DESC LIMIT 10") or die($mysql->error);
$result = $mysql->query("UPDATE {$_COOKIE['user']}_dictionary SET rate = rate + 1 WHERE id = {$_POST["id"]}") or die($mysql->error);
$mysql->close();
