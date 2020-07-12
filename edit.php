<?php

$login = $_COOKIE['user'];
$ru = filter_var(trim($_POST['ru']));
$en = filter_var(trim($_POST['en']));

if ($ru == "" || $en == ""){
    echo "Не все поля заполнены";
}
else{
    $mysql = new mysqli('localhost', 'root', 'root', 'dictionary');
    $result = $mysql->query("SELECT * FROM `{$login}_dictionary` WHERE {$ru} = ru OR {$en} = en");
    if (!$result->fetch_assoc()){
        $mysql->query("INSERT INTO `{$login}_dictionary` (`ru`, `en`, `rate`) VALUES('$ru', '$en', '0')");
        $mysql->close();
    }
    else{
        echo "Такое слово уже есть";
    }
    
}