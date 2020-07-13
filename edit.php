<?php

$login = $_COOKIE['user'];
$ru = filter_var(trim($_POST['ru']));
$en = filter_var(trim($_POST['en']));

if ($ru == "" || $en == ""){
    echo "Не все поля заполнены";
}
else{
    $mysql = new mysqli('localhost', 'root', 'root', 'dictionary');
    $result = $mysql->query("SELECT * FROM `{$login}_dictionary` WHERE `ru` = '$ru'") or die($mysql->error);
    $word = $result->fetch_assoc();
    if (!$word){
        $mysql->query("INSERT INTO `{$login}_dictionary` (`ru`, `en`, `rate`) VALUES('$ru', '$en', '0')");
    }
    else{
        echo "Такое слово уже есть";
    }
    $mysql->close();
}