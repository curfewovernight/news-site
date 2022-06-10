<?php
ob_start();
require_once("../includes/db.php");
?>

<?php require_once "includes/header.php" ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once('includes/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 border-bottom">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <?php require_once('includes/topbar.php') ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">


                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Comments</h1>
                        <!--table-->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">All Comments</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Comment</th>    
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Article</th>
                                                <th>Date</th>
                                                <th>Approve</th>
                                                <th>Unapprove</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Comment</th>    
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Article</th>
                                                <th>Date</th>
                                                <th>Approve</th>
                                                <th>Unapprove</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $query = "select * from commentsnew";
                                            $result = mysqli_query($con, $query);

                                            while ($row = mysqli_fetch_assoc($result)) {

                                                $comment_id = $row['comment_id'];
                                                $comment_article_id = $row['comment_article_id'];
                                                $comment_user_email = $row['comment_user_email'];

                                                $users_query = "select * from users where user_email='$comment_user_email'";
                                                $users_result = mysqli_query($con,$users_query);
                                                $user_data = mysqli_fetch_assoc($users_result);

                                            ?>
                                                <tr>
                                                    <td><?php echo $row['comment_id'] ?></td>
                                                    <td><?php echo $user_data['first_name'] ?></td>
                                                    <td><?php echo $user_data['last_name'] ?></td>
                                                    <td><?php echo $row['comment_content'] ?></td>
                                                    <td><?php echo $user_data['user_email'] ?></td>
                                                    <td><?php echo $row['comment_status'] ?></td>

                                                    <?php 
                                                        $query = "select * from articles where article_id='$comment_article_id'";
                                                        $data = mysqli_query($con, $query);

                                                        while($value = mysqli_fetch_assoc($data))
                                                        {
                                                            $article_id = $value['article_id'];
                                                            $article_title = $value['article_title'];
                                                    ?>
                                                    <td><a href="../article.php?a_id=<?php echo $article_id ?>" target="_blank"><?php echo $article_title ?></a></td>
                                                    <?php
                                                        }
                                                    ?>
                                                    <td><?php echo $row['comment_date'] ?></td>
                                                    <td style="text-align: center;"><a href="comments.php?approve=<?php echo $comment_id ?>" class="btn btn-success"><span class="fa fa-check"></span></a></td>
                                                    <td style="text-align: center;"><a href="comments.php?unapprove=<?php echo $comment_id ?>" class="btn btn-danger"><span class="fa fa-ban"></span></a></td>
                                                    <td style="text-align: center;"><a href="comments.php?del=<?php echo $comment_id ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>

                                                </tr>
                                            <?php
                                            }
                                            
                                            //Delete comment
                                            if(isset($_GET['del'])) {
                                                $comment_id = $_GET['del'];
                                                $sql_comment = "delete from commentsnew where comment_id='$comment_id'";
                                                $comment_query = mysqli_query($con,$sql_comment);

                                                if($comment_query)
                                                {
                                                    header("location: comments.php");
                                                }
                                            }

                                            //approve
                                            if(isset($_GET['approve'])) {
                                                $comment_id = $_GET['approve'];
                                                $sql_comment = "update commentsnew set comment_status='Approved' where comment_id='$comment_id'";
                                                $sql_result = mysqli_query($con, $sql_comment);

                                                if($sql_result)
                                                {
                                                    header("location: comments.php");
                                                }
                                            }

                                            //un-approve
                                            if(isset($_GET['unapprove'])) {
                                                $comment_id = $_GET['unapprove'];
                                                $sql_comment = "update commentsnew set comment_status='Unapproved' where comment_id='$comment_id'";
                                                $sql_result = mysqli_query($con, $sql_comment);

                                                if($sql_result)
                                                {
                                                    header("location: comments.php");
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require_once('includes/footer.php') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php require_once('includes/logoutmodal.php') ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


</body>

</html>