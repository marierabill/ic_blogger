
<?php include 'includes/header.php'; ?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include 'includes/navigation.php'; ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                          <h1 class="page-header">
                            Welcome to the Administration Panel
                        </h1>
                        <div class="table-responsive">
                          <table class="table table-striped table-hover table-bordered">
                            <thead>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Body</th>
                              <th>Status</th>
                              <th>Post ID</th>
                              <?php if($role === "Admin"){
                                echo '<th colspan="3" class="text-center">Action</th>';
                              } ?>

                            </thead>
                            <tbody>
                              <?php
                                require '../classes/Comment.php';
                                $comment_obj = new Comment($connection);
                                $comment_obj->getComments();
                              ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                    </div>
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
