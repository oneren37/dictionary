<?php
$mysql = new mysqli('localhost', 'root', 'root', 'dictionary');
$result = $mysql->query("SELECT * FROM {$_COOKIE['user']}_dictionary") or die($mysql->error);
$mysql->close();

// $words = [];
// for ($i = 0; $i < 10; $i+=1){
//     $words[$i] = $result->fetch_assoc();
// }

// while ($row = mysqli_fetch_row($result)){

// }


if($result)
{
    $rows = mysqli_num_rows($result);
     
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $words[$i] = $result->fetch_assoc();
    }
    
    mysqli_free_result($result);
}


echo json_encode($words);