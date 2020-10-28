<?php
$pass = "pass123";
$password = md5($pass);
echo $password;

$rehashpwd = md5($password);
echo $rehashpwd;


