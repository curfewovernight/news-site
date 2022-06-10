<?php require_once('includes/header.php'); ?>

<!-- written here to avoid header already sent error-->
<?php
if (isset($_POST['btn-submit'])) {
    $article_id = $_GET['a_id'];

    if (isset($_SESSION['admin_email'])) {
        $comment_user_email = $_SESSION['admin_email'];
    } else {
        $comment_user_email = $_SESSION['user_email'];
    }

    $comment = $_POST['comment'];

    $sql = "insert into commentsnew (comment_article_id, comment_user_email, comment_content, comment_date) values ('$article_id', '$comment_user_email', '$comment', now());";
    $data = mysqli_query($con, $sql);

    if ($data) {
        header("location: article.php?a_id=$article_id", 303);
    }
}
?>

<body>
<div class="content">
    <?php
    if (isset($_GET['a_id'])) {
        $article_id = $_GET['a_id'];
    }

    $query = "select * from articles where article_id='$article_id'";
    $data = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($data)) {

        $article_id = $row['article_id'];
        $article_title = $row['article_title'];
        $article_author = $row['article_author'];
        $article_date = $row['article_date'];
        $article_content = $row['article_content'];
        $article_content = nl2br($article_content);
        $article_tags = $row['article_tags'];
        $article_image = $row['article_image'];
        $article_image_src = $row['article_image_src'];
    }
    ?>
    <?php require_once('includes/top-header.php') ?>
    <div class="container">



    </div>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <div class="blog-post">
                    <h2 class="blog-post-title mb-3"><?php echo $article_title ?></h2>
                    <p class="blog-post-meta"><?php echo $article_date ?> by <a href="#"><?php echo $article_author ?></a></p>
                    <img class="mb-3 rounded" style="object-fit:cover;" width="100%" height="100%" src="img/<?php echo "$article_image"; ?>" alt="image">
                    <small>
                        <p>Image Source: <?php echo $article_image_src ?></p>
                    </small>
                    <hr>
                    <p><?php echo $article_content ?></p>
                </div>
                <!-- /.blog-post -->

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <?php
                if (isset($_SESSION['admin_email'])) {
                    echo '
                        <a href="index.php?del=$article_id" class="btn btn-danger btn-block">Delete This Article</a>
                        <br><hr>
                        <div class="well p-4 bg-light rounded">
                        <h4>Leave a Comment:</h4><br>
                        <form action="" method="post" role="form">
                            <div class="form-group">
                                <textarea class="form-control" name="comment" placeholder="Write your comment here..." rows="3"></textarea>
                            </div>
                            <button type="submit" name="btn-submit" class="btn btn-primary float-right">Submit</button><br><br>
                        </form>
                        </div>';
                } elseif (isset($_SESSION['user_email'])) {
                    echo '
                        <div class="well p-4 bg-light rounded">
                        <h4>Leave a Comment:</h4><br>
                        <form action="" method="post" role="form">
                            <div class="form-group">
                                <textarea class="form-control" name="comment" placeholder="Write your comment here..." rows="3"></textarea>
                            </div>
                            <button type="submit" name="btn-submit" class="btn btn-primary float-right">Submit</button><br><br>
                        </form>
                        </div>';
                } else {
                    echo '
                        <div class="well p-4 bg-light rounded">
                        <h4>Leave a Comment:</h4><br>
                        <a href="admin/register.php" class="btn btn-primary btn-block">Sign up to comment</a>
                        </div>';
                }
                ?>


                <hr>

                <h3 class="pb-3 mb-4 font-italic border-bottom">Comments</h3>


                <!-- Posted Comments -->

                <?php
                $comment_query = "select * from commentsnew where comment_article_id='$article_id' AND comment_status='approved' order by comment_id DESC";
                $comment_result = mysqli_query($con, $comment_query);


                while ($data = mysqli_fetch_assoc($comment_result)) {

                    $comment_content = $data['comment_content'];
                    $comment_date = $data['comment_date'];
                    $comment_user_email = $data['comment_user_email'];

                    $users_query = "select * from users where user_email='$comment_user_email'";
                    $users_result = mysqli_query($con, $users_query);
                    $user_data = mysqli_fetch_assoc($users_result);

                    $comment_user_fname = $user_data['first_name'];
                    $comment_user_lname = $user_data['last_name'];
                ?>


                    

                    <!-- Comment -->
                    <div class="media">
                        <div class="media-body ml-2 mb-4">
                            <b class="media-heading"><?php echo $comment_user_fname ?> <?php echo $comment_user_lname ?></b>
                            <small><?php echo $comment_date ?></small><br>
                            <?php echo $comment_content ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>


            <!-- /.blog-main -->
            <aside class="col-md-4 blog-sidebar">
                <div class="p-4 mb-3 bg-light rounded">
                    <h4 class="font-italic">About</h4>
                    <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                </div>
                <div class="p-4">
                    <h4 class="font-italic">Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </aside>
            <!-- /.blog-sidebar -->
        </div>
        <!-- /.row -->
    </main>
    <!-- /.container -->
    </div>

    <?php require_once('includes/footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>