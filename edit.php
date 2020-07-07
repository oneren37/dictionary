<?php

$login = $_COOKIE['user'];
$ru = filter_var(trim($_POST['ru']));
$en = filter_var(trim($_POST['en']));

$mysql = new mysqli('localhost', 'root', 'root', 'dictionary');
$mysql->query("INSERT INTO `{$login}_dictionary` (`ru`, `en`, `rate`) VALUES('$ru', '$en', '0')");
$mysql->close();

header("Location: /");