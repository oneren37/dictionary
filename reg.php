<?php
$login = filter_var(trim($_POST['login']));
$password = filter_var(trim($_POST['password']));

$mysql = new mysqli('localhost', 'root', 'root', 'dictionary');
$mysql->query("INSERT INTO `user` (`login`, `password`) VALUES('$login', '$password')");
$mysql->query("CREATE TABLE   {$login}_dictionary
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    ru VARCHAR(200) NOT NULL,
    en VARCHAR(200) NOT NULL, 
    rate INT NOT NULL
)");
$mysql->close();

setcookie("user", $login, time() + 3600 * 24, "/");

header("Location: /");