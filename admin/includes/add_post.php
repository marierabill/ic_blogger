<?php
	$sql = "SELECT * FROM categories";
	$res = mysqli_query($connection, $sql);
?>

<h2>Add Posts</h2>
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<form action="" method="post">
				<div class="form-group">
					<label for="">Post Title</label>
					<input type="text" name="title" placeholder="Post Title" class="form-control"> 
				</div>
				
				<div class="form-group">
					<label for="">Post Author</label>
					<input type="text" name="author" placeholder="Post Author" class="form-control"> 
				</div>
				
				<div class="form-group">
					<label for="">Post Category</label>
					<select class="form-control" name="category">
						<option value=""></option>
					</select>
				</div>
				
				<div class="form-group">
					<label for="">Post Category ID</label>
					<select class="form-control" name="category_id">
						<option value=""></option>
					</select>
				</div>
				
				<div class="form-group">
					<label for="">Post Tags</label>
					<input type="text" name="tags" placeholder="Separate tags with a coma (,)" class="form-control"> 
				</div>
				
				<div class="form-group">
					<label for="">Post Status</label>
					<select class="form-control" name="status">
						<option value="draft">Draft</option>
						<option value="published">Published</option>
					</select>
				</div>
				
				<div class="form-group">
					<label for="">Post Image</label>
					<input type="file" name="image" class="form-control"> 
				</div>
				
				<div class="form-group">
					<input type="submit" value="Publish Post" name="publish" class="btn btn-primary"> 
				</div>
			</form>
		</div>
	</div>
</div>