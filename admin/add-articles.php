<?php
ob_start();
require_once("../includes/db.php");
?>

<?php
require_once "includes/header.php";
require_once "vendor/autoload.php";

use Spatie\ImageOptimizer\OptimizerChain;
use Spatie\ImageOptimizer\Optimizers\Cwebp;
?>

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

                        <?php
                        if (isset($_POST['add_article_btn'])) {
                            $optimizerChain = (new OptimizerChain)
                                ->addOptimizer(new Cwebp([
                                    '-m 6',
                                    '-pass 10',
                                    '-mt',
                                    '-q 80',
                                ]));

                            $article_title = $_POST['article_title_in'];
                            $article_title = addslashes($article_title);
                            $article_cat_id = $_POST['article_cat_id_in'];
                            $article_author = $_POST['article_author_in'];
                            $article_status = $_POST['article_status_in'];
                            $article_jumbotron = $_POST['article_jumbotron_in'];
                            $article_featured = $_POST['article_featured_in'];

                            $article_image = $_FILES['article_img_in']['name'];
                            $article_temp = $_FILES['article_img_in']['tmp_name'];

                            $article_image_src = $_POST['article_image_src_in'];
                            $article_tags = $_POST['article_tags_in'];
                            $article_content_format = $_POST['article_content_in'];
                            $article_content = addslashes($article_content_format);
                            //$article_content = nl2br($article_content_format);

                            $sql = "insert into articles (article_cat_id, article_title, article_author, article_date, article_image, article_image_src, article_content, article_status, jumbotron, isfeat, article_tags) values ('$article_cat_id', '$article_title', '$article_author', now(), '$article_image', '$article_image_src', '$article_content', '$article_status', '$article_jumbotron', '$article_featured', '$article_tags');";

                            $result = mysqli_query($con, $sql);

                            //echo $article_title." ". $article_cat_id." ". $article_author." ". $article_date." ". $article_image." ". $article_content." ". $article_tags." ". $article_comment." ". $article_status;


                            if ($result) {
                                move_uploaded_file($article_temp, "../img/$article_image");
                                $optimizerChain->optimize("../img/$article_image");
                                echo "<div class='alert alert-success' role='alert'>Added '$article_title' as an article successfully!</div>";
                                //echo "$article_content";
                            } else {
                                echo "<div class='alert alert-danger' role='alert'>Adding '$article_title' as an article failed!</div>";
                            }
                        }

                        ?>

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Add Articles</h1>
                        <p class="mb-3">You can add new articles here</p>


                        <!--Input category-->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <p class="mb-2 font-weight-bold">Article Title</p>
                            <div class=mb-2>
                                <input type="text" name="article_title_in" class="form-control" placeholder="Enter article title...">
                            </div>

                            <p class="mb-2 font-weight-bold">Article Category</p>

                            <select name="article_cat_id_in" id="" class="form-control mb-2">

                                <?php
                                $sql = "select * from categories";
                                $value = mysqli_query($con, $sql);

                                while ($row = mysqli_fetch_assoc($value)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                ?>
                                    <option value="<?php echo $cat_id ?>"><?php echo $cat_title ?></option>
                                <?php
                                }
                                ?>
                            </select>

                            <div class=mb-2>
                                <p class="mb-2 font-weight-bold">Article Author</p>
                                <input type="text" name="article_author_in" class="form-control" placeholder="Enter article author...">
                            </div>

                            <p class="mb-2 font-weight-bold">Article Status</p>
                            <select name="article_status_in" class="form-control mb-2" id="">
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>

                            <p class="mb-2 font-weight-bold">Set as a Jumbotron</p>
                            <select name="article_jumbotron_in" class="form-control mb-2" id="">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>

                            <p class="mb-2 font-weight-bold">Set as a Featured Article</p>
                            <select name="article_featured_in" class="form-control mb-2" id="">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>

                            <p class="mb-2 font-weight-bold">Article Image</p>
                            <div class="mb-2">
                                <input type="file" class="btn btn-secondary" size="30" name="article_img_in" class="form-control">
                            </div>

                            <p class="mb-2 font-weight-bold">Image Source</p>
                            <div class=mb-2>
                                <input type="text" name="article_image_src_in" class="form-control" placeholder="Enter image source...">
                            </div>

                            <p class="mb-2 font-weight-bold">Article Tags</p>
                            <div class=mb-2>
                                <input type="text" name="article_tags_in" class="form-control" placeholder="Enter article tags...">
                            </div>

                            <p class="mb-2 font-weight-bold">Article Content</p>
                            <div class=mb-2>
                                <textarea type="text" cols="30" rows="30" name="article_content_in" class="form-control" placeholder="Enter article content here..."></textarea>
                            </div>

                            <div>
                                <button type="submit" name="add_article_btn" class="form-control btn btn-primary">Add Article</button>
                            </div>
                        </form>



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