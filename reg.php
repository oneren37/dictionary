<?php
$login = filter_var(trim($_POST['login']));
$password = filter_var(trim($_POST['password']));

$mysql = new mysqli('localhost', 'root', 'root', 'dictionary');

$result = $mysql->query("SELECT * FROM `user` WHERE `login` = '$login'");
$user = $result->fetch_assoc();
if ($user){
    echo "Такой пользователь уже существует";
}
else{
    $mysql->query("INSERT INTO `user` (`login`, `password`) VALUES('$login', '$password')");
    $mysql->query("CREATE TABLE   {$login}_dictionary
    (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        ru VARCHAR(200) NOT NULL,
        en VARCHAR(200) NOT NULL, 
        rate INT NOT NULL
    )");
    setcookie("user", $login, time() + 3600 * 24, "/");
    header("Location: /");

}


$mysql->close();