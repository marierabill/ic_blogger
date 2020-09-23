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
		echo "<td><a href='categories.php?delete_cat={$cat_id}'>Delete</a></td>";
		echo "</tr>";
	}
}

function delete_category()
{
	global $connection;
	if(isset($_GET['delete_cat']))
	{
		$cat_id = $_GET['delete_cat'];
		$query = "DELETE FROM categories WHERE cat_id = $cat_id";
		$result = mysqli_query($connection, $query);
		
		if(!$result)
				{
					die("Could not delete data " . mysqli_error($connection));
				}else
					{
						header("Location: categories.php?category_deleted");
					}
		
	}
	
}
delete_category();

function add_post()
{
	global $connection;
	
	if(isset($_POST['publish']))
	{
		$post_title = $_POST['title'];
		$post_author = $_POST['author'];
		$post_category = $_POST['category'];
		$post_category_id = $_POST['category_id'];
		$post_content = $_POST['content'];
		$post_tags = $_POST['tags'];
		$post_status = $_POST['status'];
		
		$date = date("l d F Y");
		$post_views = 0;
		$post_comment_count = 0;
	//---------Upload Post Image---------\\
		if(isset($_FILES['post_image']))
		{
			$dir = "../post_images/";
			$target_file = $dir.basename($_FILES['post_image']['name']);
			if(move_uploaded_file($_FILES['post_image']['tmp_name'], $target_file))
			{
				echo "Image was uploaded";
			}
			else
			{
				echo "Oooops!!!....Something went wrong while uploading this image";
			}
		}
	//---------Upload Post Image---------\\

		$query = "INSERT INTO posts(post_title, post_author, post_category, post_category_id, 
									post_content, post_image, post_date, post_comment_count, 
									post_views, post_tags, post_status)
									
							VALUES('$post_title', '$post_author', '$post_category', '$post_category_id', 
							'$post_content', '$target_file', '$date', '$post_comment_count', 
							'$post_views', '$post_tags', '$post_status')";
							
		$result = mysqli_query($connection, $query);
		
		if(!result)
		{
			die("Could not send data " . mysqli_error($connection));
			header("Location: ../posts.php?source=add_new");
		}
		else
		{
			header("Location: ../posts.php?Post_added");
		}
		
	}
}
add_post();

?>