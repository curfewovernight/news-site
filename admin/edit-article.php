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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <?php require_once('includes/topbar.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                
                <?php 

                    if(isset($_GET['a_id']))
                    {
                        $aurl_id = $_GET['a_id'];
                        $sql = "select * from articles where article_id='$aurl_id'";
                        $result = mysqli_query($con, $sql);

                        while($row = mysqli_fetch_assoc($result))
                        {
                            $article_id =  $row['article_id'];
                            $article_author = $row['article_author'];
                            $article_title = $row['article_title'];
                            $article_cat_id = $row['article_cat_id'];
                            $article_status = $row['article_status'];
                            $article_jumbotron = $row['jumbotron'];
                            $article_featured = $row['isfeat'];
                            $article_image = $row['article_image'];
                            $article_image_src = $row['article_image_src'];
                            $article_comment = $row['article_comment_count'];
                            $article_date = $row['article_date'];
                            $article_tags = $row['article_tags'];
                            $article_content = $row['article_content'];
                        }
                    }
                    
                    // update article

                    if(isset($_POST['edit_article_btn']))
                    {
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
                        $article_image_src = addslashes($article_image_src);
                        $article_tags_a = $_POST['article_tags_in'];
                        $article_content_format = $_POST['article_content_in'];
                        $article_content = addslashes($article_content_format);

                        if(empty($article_image))
                        {
                            $query = "select * from articles where article_id='$aurl_id'";
                            $result = mysqli_query($con, $query);

                            while($row = mysqli_fetch_assoc($result))
                            {
                                $article_image = $row['article_image'];
                            }
                        }

                        $sql = "update articles set article_cat_id='$article_cat_id', article_title='$article_title', article_author='$article_author', article_date=now(), article_image='$article_image', article_image_src='$article_image_src', article_content='$article_content', article_status='$article_status', jumbotron='$article_jumbotron', isfeat='$article_featured', article_tags='$article_tags_a' where article_id='$aurl_id'";

                        $result = mysqli_query($con, $sql);

                        if($result)
                        {
                            header("location: articles.php");
                            move_uploaded_file($article_temp, "../img/$article_image");
                        }
                        
                    }
                ?>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Articles</h1>
                    <p class="mb-3">You can edit articles here</p>

                                
                    <!--Input category-->
                    <form action="" method="POST" enctype="multipart/form-data">
                            <p class="mb-2 font-weight-bold">Article Title</p>
                            <div class=mb-2>
                                <input type="text" name="article_title_in" class="form-control" value="<?php echo $article_title ?>">
                            </div>
                            <p class="mb-2 font-weight-bold">Article Category</p>
                            <div class=mb-2>
                                <select class="form-control" name="article_cat_id_in" id="">
                                <?php 
                                    $query = "select * from categories";
                                    $data = mysqli_query($con, $query);

                                    while($row = mysqli_fetch_assoc($data))
                                    {
                                ?>
                                        <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_title']; ?></option>
                                <?php
                                    }
                                ?>
                                </select>
                            </div>
                            <div class=mb-2>
                            <p class="mb-2 font-weight-bold">Article Author</p>
                                <input type="text" name="article_author_in" class="form-control" value="<?php echo $article_author ?>">
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
                                <img width="200" height="150" style="object-fit: cover" class="img-responsive" src="../img/<?php echo $article_image ?>">
                            </div>
                            <div class=mb-2>
                                <input type="file" class="btn btn-secondary" name="article_img_in" class="form-control">
                            </div>

                            <p class="mb-2 font-weight-bold">Image Source</p>
                            <div class=mb-2>
                                <input type="text" name="article_image_src_in" class="form-control" value="<?php echo $article_image_src ?>">
                            </div>

                            <p class="mb-2 font-weight-bold">Article Tags</p>
                            <div class=mb-2>
                                <input type="text" name="article_tags_in" class="form-control" value="<?php echo $article_tags ?>">
                            </div>

                            <p class="mb-2 font-weight-bold">Article Content</p>
                            <div class=mb-2>
                                <textarea type="text" cols="30" rows="30" name="article_content_in" class="form-control"><?php echo $article_content ?></textarea>
                            </div>

                            <div>
                                <button type="submit" name="edit_article_btn" class="form-control btn btn-primary">Save Changes</button>
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