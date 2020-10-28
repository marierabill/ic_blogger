<?php

	$mysqli = new mysqli("localhost", "root", "", "ic_blogger") or die("Could not Connect to database.");
	$error = [];
	
	if(isset($_POST['create_submit']))
	{
		$username = clean($_POST['username']);
		$email = clean($_POST['email']);
		$pwd = $_POST['pwd'];
		
		if(empty($username))
		{
			array_push($error, "<p class='alert alert-danger'>Username is required</p>");
			header("Location:../../cms_admin.php?error=Username_is_required");
		}else
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				array_push($error, "<p class='alert alert-danger'>Email is Invalid</p>");
				header("Location:../../cms_admin.php?error=Email_is_Invalid");
			}else
				if(empty($email))
				{
					array_push($error, "<p class='alert alert-danger'>Email is required</p>");
					header("Location:../../cms_admin.php?error=Email_is_required");
				}else
					if(strlen($pwd <= 5))
					{
						array_push($error, "<p class='alert alert-danger'>Password is too short.</p>");
						header("Location:../../cms_admin.php?error=Password_is_short");
					}else
						if(empty($error))
						{
							$rand = rand(1,6);
							switch ($rand)
							{
								case "1":
									$profile_pic = "users/profile_pics/default/avatar1.jpg";
									break;
								case "2":
									$profile_pic = "users/profile_pics/default/avatar2.png";
									break;
								case "3":
									$profile_pic = "users/profile_pics/default/avatar3.png";
									break;
								case "4":
									$profile_pic = "users/profile_pics/default/avatar4.png";
									break;
								case "5":
									$profile_pic = "users/profile_pics/default/avatar5.png";
									break;
								case "6":
									$profile_pic = "users/profile_pics/default/avatar6.png";
									break;
							}
							$hashedPwd = md5($pwd);
							$sql = mysqli_query($mysqli, "INSERT INTO users VALUES('', '$username', '$email', '$hashedPwd', '$profile_pic', 'yes', '0', 'Admin' )");
							header("Location: ../../cms_admin.php?admin_created");
						}
	}
	
	function clean($data)
	{
		global $mysqli;
		$data = htmlspecialchars($data);
		$data = mysqli_real_escape_string($mysqli, $data);
		$data = stripslashes($data);
		$data = strip_tags($data);
		return $data;
	}