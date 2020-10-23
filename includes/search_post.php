<?php
	if(isset($_POST['search']))
	{
		$search = $_POST['search'];
		$query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
		$result = mysqli_query($connection, $query);
		$found = mysqli_num_rows($result);
		
		if($found === 0)
		{
		?>
		<div class="alert alert-danger">No Search Results Found!!</div>
		<?php
			
		}else
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$post_id = $row['post_id'];
				$post_title = $row['post_title'];
				$post_author = $row['post_author'];
				$post_category = $row['post_category'];
				$post_category_id = $row['post_category_id'];
				$post_content = $row['post_content'];
				$post_tags = $row['post_tags'];
				$post_status = $row['post_status'];
				$post_image = $row['post_image'];		
				$date = $row['post_date'];
				$post_views = $row['post_views'];
				$post_comment_count = $row['post_comment_count'];
		?>
		<div class="col-md-6">
		  <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
			<img src="admin/post_images/<?php echo $post_image; ?>" width="350px" height="350px" alt="Image placeholder">
			<div class="blog-content-body">
			  <div class="post-meta">
				<span class="author mr-2"> <?php echo $post_author; ?></span>&bullet;
				<span class="mr-2"><?php echo $date; ?> </span> &bullet;
				<span class="ml-2"><span class="fa fa-comments"></span> <?php echo $post_comment_count; ?></span>
			  </div>
			  <h2><?php echo $post_title; ?></h2>
			</div>
		  </a>
		</div>
		<?php
			
			}

		


		}
	}
?>