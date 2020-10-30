<?php
	$query = "SELECT * FROM categories ORDER BY cat_id LIMIT 6";
	$result = mysqli_query($connection, $query);
	$cat_total_span = mysqli_num_rows($result);
	
?>

<div class="sidebar-box">
	<h3 class="heading">Categories <?php echo "<span>[".$cat_total_span."]</span>"; ?></h3>
	<ul class="categories">
<?php
	while($row = mysqli_fetch_array($result))
	{
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];
		
		$sql = mysqli_query($connection, "SELECT * FROM posts WHERE post_category_id = $cat_id");
		$cat_span = mysqli_num_rows($sql);
?>
	
		<li><a href="category.php?cat_id=$cat_id"><?php echo $cat_title ?> <span>(<?php echo $cat_span ?>)</span></a></li>
<?php	
	}
?>
	</ul>
</div>
