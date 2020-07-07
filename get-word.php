
<?php
$mysql = new mysqli('localhost', 'root', 'root', 'dictionary');
$result = $mysql->query("SELECT * FROM {$_COOKIE['user']}_dictionary ORDER BY rate DESC LIMIT 10") or die($mysql->error);
$mysql->close();

// $i = 0; $words = [];
// while ($result->fetch_assoc()){
//     $words[$i] = $result->fetch_assoc();
//     $i+=1;
// }
$words = [];
for ($i = 0; $i < 10; $i+=1){
    $words[$i] = $result->fetch_assoc();
}

// print_r($words);
echo json_encode($words[rand(0,9)]);