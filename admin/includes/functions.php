<?php include "db.php" ?>

<?php

function add_category()
{
	global $connection;
	
	if(isset($_POST['cat_add']))
	{
		if(empty($_POST['cat_title']))
		{
			header("Location: ../categories.php?Field_cannot_be_empty");
		}else
			{
				$cat_title = $_POST['cat_title'];
				$query = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";
				$result = mysqli_query($connection, $query);
				
				if(!result)
				{
					die("Could not send data " . mysqli_error($connection));
				}
			}
	}
}
add_category();


?>