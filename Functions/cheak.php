<?php

$login = filter_var(trim($_POST['login']),
FILTER_SANITIZE_STRING);


$name = filter_var(trim($_POST['name']),
FILTER_SANITIZE_STRING);


$pass = filter_var(trim($_POST['pass']),
FILTER_SANITIZE_STRING);

if(mb_strlen($login) < 5 || mb_strlen($login) > 90 ) {
  echo "Invalid login length";
  exit();
} else if(mb_strlen($name) < 3 || mb_strlen($name) > 50 ) {
  echo "Invalid name length";
    exit();
} else if(mb_strlen($pass) < 2 || mb_strlen($pass) > 10 ) {
  echo "Invalid password length ( from 2 to 10 characters )";
    exit();
}

$pass = md5($pass."gqasfdsas1");

$mysql = new mysqli('localhost','root','root','registor');
$mysql->query("INSERT INTO `users`(`login`, `pass`, `name`)
VALUES('$login', '$pass', '$name')");

$mysql->close();

header('Location: /');

?>
