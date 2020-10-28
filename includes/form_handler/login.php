<?php

	$mysqli = new mysqli("localhost", "root", "", "ic_blogger") or die("Could not Connect to database.");
	$error = [];
	
	if(isset($_POST['login_submit']))
	{
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];
		
		$sql = mysqli_query($mysqli, "SELECT email FROM users WHERE email='$email'");
		$row = mysqli_fetch_assoc($sql);
		$db_email = $row['email'];
		$db_pwd = $row['password'];
		$profile_pic = $row['profile_pic'];
	}