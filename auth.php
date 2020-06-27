<?php

$login = filter_var(trim($_POST['login']));
$password = filter_var(trim($_POST['password']));

$mysql = new mysqli('localhost', 'root', 'root', 'dictionary');
$result = $mysql->query("SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'");
$user = $result->fetch_assoc();

if ($user){
    setcookie("user", $user["login"], time() + 3600 * 24, "/");
    header("Location: /");
}
else{
    echo "авторизация не удалась";
}

$mysql->close();