<?php
$mysql = new mysqli('localhost', 'root', 'root', 'dictionary');
$result = $mysql->query("SELECT * FROM {$_COOKIE['user']}_dictionary WHERE active=1 ORDER BY rate LIMIT 10") or die($mysql->error);


$words = [];
while ($word = $result->fetch_assoc()){
    array_push($words, $word);
}

echo json_encode($words[array_rand($words)]);

$mysql->close();