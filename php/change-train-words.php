<?php

$words = json_decode($_POST["words"]);
echo $words;

$mysql = new mysqli('localhost', 'root', 'root', 'dictionary');
$mysql->query("UPDATE {$_COOKIE['user']}_dictionary SET active = 0") or die($mysql->error);
foreach ($words as $word){
    $mysql->query("UPDATE {$_COOKIE['user']}_dictionary SET active = 1 WHERE id = {$word}") or die($mysql->error);
}
$mysql->close();