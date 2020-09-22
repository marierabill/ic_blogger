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
				
				if(!$result)
				{
					die("Could not send data " . mysqli_error($connection));
				}else
					{
						header("Location: ../categories.php?category_added");
					}
			}
	}
}
add_category();


function show_category()
{
	global $connection;
	$query = "SELECT * FROM categories";
	$result = mysqli_query($connection, $query);
	
	while($row = mysqli_fetch_assoc($result))
	{
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];
		
		echo "<tr>";
		echo "<td>{$cat_id}</td>";
		echo "<td>{$cat_title}</td>";
		echo "</tr>";
	}
}

?>