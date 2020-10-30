<?php include 'includes/header.php'; ?>

<?php include 'includes/navigation.php'; ?>

      <!-- END header -->

    <section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries element-animate">
<?php
	if(isset($_GET['post']))
	{
		$p_id = $_GET['post'];
		
		$query = "SELECT * FROM posts WHERE post_id = $p_id";
		$result = mysqli_query($connection, $query);		
	}else
	{
		header("Location: index.php");
	}
	
	while($row = mysqli_fetch_assoc($result))
	{
		$post_id = $row['post_id'];
		$post_title = $row['post_title'];
		$post_author = $row['post_author'];
		$post_category = $row['post_category'];
		$post_category_id = $row['post_category_id'];
		$post_content = $row['post_content'];
		$post_tags = explode(',',$row['post_tags']);
		$post_status = $row['post_status'];
		$post_image = $row['post_image'];
		$date = $row['post_date'];
		$post_views = $row['post_views'];
		$post_comment_count = $row['post_comment_count'];
	
	
?>

          <div class="col-md-12 col-lg-8 main-content">
            <img src="admin/post_images/<?php echo $post_image ?>" alt="Image" class="img-fluid mb-5">
             <div class="post-meta">
                        <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib" class="mr-2"> <?php echo $post_author ?></span>&bullet;
                        <span class="mr-2"><?php echo $date ?> </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> <?php echo $post_comment_count ?></span>
                      </div>
            <h1 class="mb-4"><?php echo $post_title ?></h1>
            <a class="category mb-5" href="#"><?php echo $post_category ?></a>
           
            <div class="post-content-body">
              <p><?php echo $post_content ?></p>
            </div>
            <div class="pt-5">
              <p>Categories:  <a href="#"><?php echo $post_category; ?></a>  Tags: <a href="#" ><?php foreach($post_tags as $tag) {
                echo "<a href=''class='btn btn-primary' style='margin:2px;'>#$tag</a>";
              }
              ?></a></p>
            </div>


            <div class="pt-5">
              <h3 class="mb-5">
				<?php
					(isset($_GET['post'])) ? $post_id = $_GET['post'] : $post_id = 0;
					$query = mysqli_query($connection, "SELECT * FROM comments WHERE status = 'Approved' AND post_id = $post_id");
					$num_comments = mysqli_num_rows($query);
					//echo $num_comments . " comment(s)";
					
					if($num_comments < 1 )
					{
						echo $num_comments . " comments";
					}else
						if($num_comments == 1 )
						{
							echo $num_comments . " comment";
						}else
							if($num_comments > 1 )
							{
								echo $num_comments . " comments";
							}
					
					
				?>
			  </h3>
              <ul class="comment-list">                
                <li class="comment">
                  
                  <div class="comment-body">
                    <?php
						if(isset($_GET['post']))
						{
							$id = $_GET['post'];
							$comment_obj->getApprovedComments($id);
						}
					?>
                  </div>
                </li>
              </ul>
              <!-- END comment-list -->
			  <?php
				if(isset($_GET['post']))
				{
					$id = $_GET['post'];
					if(isset($_POST['comment']) && $_POST['randcheck']==$_SESSION['rand'])
					{
						$name = $_POST['name'];
						$email = $_POST['email'];
						$body = $_POST['body'];
						
						$comment_obj->addComments($id, $name, $email, $body,);
						echo "<meta http-equiv='refresh' content='0'>";
					}
				}
			  ?>
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="single.php?post=<?php echo $post_id ?>" method="post" class="p-5 bg-light">
				<?php
				   $rand=rand();
				   $_SESSION['rand']=$rand;
				  ?>
				  <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
				  
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" name="name" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email" class="form-control" id="email">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="body" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" name="comment" class="btn btn-primary">
                  </div>

                </form>
              </div>
            </div>

          </div>
<?php
	
	}

?>

          <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
              <div class="sidebar-box search-form-wrap">
                <form action="search.php" class="search-form" method="post">
                  <div class="form-group">
                    <span class="icon fa fa-search"></span>
                    <input type="text" name="search" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                  </div>
                </form>
              </div>
              <!-- END sidebar-box -->

              <!-- END sidebar-box -->
              <?php include 'includes/sidebar.php'; ?>
              <!-- END sidebar-box -->
<?php include 'includes/category.php'; ?>

              <!-- END sidebar-box -->

<?php include 'includes/tags.php'; ?>
            </div>
            <!-- END sidebar -->

          </div>
        </div>
      </section>



    </div>
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>

    
    <script src="js/main.js"></script>
  </body>
</html>