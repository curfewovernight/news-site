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
                        <h1 class="h3 mb-2 text-gray-800">Users</h1>
                        <!--table-->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Account Type</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Account Type</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $query = "select * from users";
                                            $result = mysqli_query($con, $query);

                                            while ($row = mysqli_fetch_assoc($result)) {

                                                $user_id = $row['user_id'];
                                                $user_email = $row['user_email'];

                                            ?>
                                                <tr>
                                                    <td><?php echo $row['user_id'] ?></td>
                                                    <td><?php echo $row['first_name'] ?></td>
                                                    <td><?php echo $row['last_name'] ?></td>
                                                    <td><?php echo $row['user_email'] ?></td>
                                                    <?php
                                                        if($row['user_role'] == 'administrator') {
                                                            echo "<td>Administrator</td>";
                                                        }
                                                        elseif($row['user_role'] == 'user') {
                                                            echo "<td>User</td>";
                                                        }
                                                    ?>
                                                    <td style="text-align: center;"><a href="users.php?del=<?php echo $user_id ?>&e=<?php echo $user_email ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>

                                                </tr>
                                            <?php
                                            }

                                            //Delete user
                                            if (isset($_GET['del'])) {
                                                $comment_id = $_GET['del'];
                                                $comment_user_email = $_GET['e'];
                                                $sql_comment = "delete from users where user_id='$user_id';";
                                                $comment_query = mysqli_query($con, $sql_comment);

                                                $sql_comment2 = "delete from commentsnew where comment_user_email='$comment_user_email';";
                                                $comment_user_email2 = mysqli_query($con, $sql_comment2);

                                                if ($comment_query) {
                                                    header("location: users.php");
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