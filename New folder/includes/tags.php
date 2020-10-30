<?php
	$sql = "SELECT * FROM posts ORDER BY post_id LIMIT 3";
	$result = mysqli_query($connection, $sql);
	
?>
<div class="sidebar-box">
  <h3 class="heading">Tags</h3>
  <ul class="tags">
<?php
	while($row = mysqli_fetch_assoc($result))
	{
		$tags = $row['post_tags'];
		
		//echo "<li><a href='#'>$cat_title <span>($span)</span></a></li>";
?>
    <li><a href="#"><?php echo $tags; ?></a></li>
<?php
	}
?>
  </ul>
</div>
