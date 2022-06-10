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
                        <h1 class="h3 mb-2 text-gray-800">Articles</h1>
                        <!--table-->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">All Articles</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Author</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Jumbotron</th>
                                                <th>Featured</th>
                                                <th>Comment Count</th>
                                                <th>Date</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Author</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Jumbotron</th>
                                                <th>Featured</th>
                                                <th>Comment Count</th>
                                                <th>Date</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $query = "select * from articles order by article_id desc";
                                            $result = mysqli_query($con, $query);


                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $old = $row['article_image'];
                                                $cat_id = $row['article_cat_id'];
                                                $article_id = $row['article_id'];
                                                $update_comment_count_query = "select count(comment_article_id) from commentsnew where comment_article_id='$article_id'";
                                                $comment_count_result = mysqli_query($con, $update_comment_count_query);
                                                $count_row = mysqli_fetch_assoc($comment_count_result);
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['article_author'] ?></td>
                                                    <td><img style="object-fit:cover" width="75" height="50" class="img-responsive rounded" src="../img/<?php echo $row['article_image']; ?>"></td>
                                                    <td><?php echo $row['article_title'] ?></td>

                                                    <?php
                                                    $query = "select * from categories where cat_id='$cat_id'";
                                                    $data = mysqli_query($con, $query);

                                                    while ($value = mysqli_fetch_assoc($data)) {

                                                    ?>
                                                        <td><?php echo $value['cat_title'] ?></td>
                                                    <?php

                                                    }
                                                    ?>

                                                    <?php
                                                        if($row['article_status'] == 'published') {
                                                            echo "<td>Published</td>";
                                                        }
                                                        elseif($row['article_status'] == 'draft') {
                                                            echo "<td>Draft</td>";
                                                        }
                                                    ?>
                                                    <?php
                                                        if($row['jumbotron'] == '0') {
                                                            echo "<td>No</td>";
                                                        }
                                                        elseif($row['jumbotron'] == '1') {
                                                            echo "<td>Yes</td>";
                                                        }
                                                    ?>
                                                    <?php
                                                        if($row['isfeat'] == '0') {
                                                            echo "<td>No</td>";
                                                        }
                                                        elseif($row['isfeat'] == '1') {
                                                            echo "<td>Yes</td>";
                                                        }
                                                    ?>
                                                    <td><?php echo $count_row['count(comment_article_id)'] ?></td>
                                                    <td><?php echo $row['article_date'] ?></td>
                                                    <td style="text-align: center;"><a href="edit-article.php?a_id=<?php echo $row['article_id']; ?>" class="btn btn-success"><span class="fa fa-edit"></span></a></td>
                                                    <td style="text-align: center;"><a href="articles.php?del=<?php echo $row['article_id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
                                                </tr>
                                            <?php
                                            }


                                            //delete articles
                                            if (isset($_GET['del'])) {
                                                $del = $_GET['del'];
                                                $sql = "delete from articles where article_id='$del'";
                                                $result = mysqli_query($con, $sql);

                                                if ($result) {
                                                    unlink("../img/$old");
                                                    header("location: articles.php");
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