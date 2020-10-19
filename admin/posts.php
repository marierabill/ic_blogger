<?php include 'includes/header.php'; ?>

<div id="wrapper">

	<!-- Navigation -->
	<?php include 'includes/navigation.php'; ?>


	<div id="page-wrapper">

		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="row">

				<h1 class="page-header">
					Welcome to the Administration Panel
				</h1>
				
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<th>Post ID</th>
						<th>Post Title</th>
						<th>Post Author</th>
						<th>Post Category</th>
						<th>Post Status</th>
						<th>Post Image</th>
						<th>Post Content</th>
						<th>Post Date</th>
						<th>Post Tags</th>
						<th>Post Comments</th>
						<th>Post Views</th>
						<th>Approve Post</th>
						<th>Unapprove Post</th>
						<th>Edit</th>
						<th>Delete</th>
					</thead>
					
				</table>
				
				
			</div>
		</div>
		
				<?php
					if(isset($_GET['source']))
					{
						$source = $_GET['source'];
					
						switch ($source)
						{
							case 'add_new':
								include 'includes/add_post.php';
								break;
							
							case '123':
								echo 123;
								break;
							
							default:
								header("Location: posts.php");
								break;
						}
					}
				?>
		
	</div>
		<!-- /.row -->
		
		
		
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="bootstrap/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
