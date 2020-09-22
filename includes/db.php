<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ic_blogger";

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(!$connection)
{
	die("Could'nt connect to the database " . mysqli_error($connection));
}
