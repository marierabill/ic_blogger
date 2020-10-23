<?php
	$query = "SELECT * FROM categories ORDER BY cat_id LIMIT 6";
	$result = mysqli_query($connection, $query);
	$span = mysqli_num_rows($result);
	
?>

<div class="sidebar-box">
	<h3 class="heading">Categories <?php echo "<span>[".$span."]</span>"; ?></h3>
	<ul class="categories">
<?php
	while($row = mysqli_fetch_array($result))
	{
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];
		
		//echo "<li><a href='#'>$cat_title <span>($span)</span></a></li>";
?>
	
		<li><a href="#"><?php echo $cat_title ?> <span>(<?php echo $span ?>)</span></a></li>
<?php	
	}
?>
	</ul>
</div>
