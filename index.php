<?php
require_once('includes/header.php');
//delete articles
if (isset($_GET['del'])) {
    $del = $_GET['del'];
    $sql = "delete from articles where article_id='$del'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        unlink("img/$old");
        header("location: index.php");
    }
}
?>

<body>
    <div class="content">

    <?php require_once('includes/top-header.php') ?>

    <div class="container">
        <?php
            $query = "select * from articles where article_status = 'published' and jumbotron=true order by article_id desc";
            $data = mysqli_query($con, $query);
            $article_status = "";

            while ($row = mysqli_fetch_assoc($data)) {
                $article_id = $row['article_id'];
                $article_title = $row['article_title'];
                $article_author = $row['article_author'];
                $article_date = $row['article_date'];
                $article_content = $row['article_content'];
                $article_tags = $row['article_tags'];
                $article_image = $row['article_image'];
                $article_cat = $row['article_cat_id'];

        ?>
        <a >
        <div class="jumbotron shadow-sm sup p-0 p-md-0 text-white rounded bg-dark" style="background: url('img/<?php echo $article_image; ?>');background-size: cover;background-position: center;">
                <div style="backdrop-filter: blur(30px) saturate(180%);background-color: rgba(0,0,0,0.72);" class="rounded col-md-6 px-0 p-4 p-md-5">
                    <h1 class="jumbotitle display-4 font-italic"><?php echo $article_title ?></h1>
                    <p class="jumbocontent my-3"><?php echo limit_text($article_content, 25, $article_title); ?></p>
                    <p class="lead mb-0"><a href="article.php?a_id=<?php echo $article_id ?>" class="jumbocontinue text-white stretched-link font-weight-bold">Continue reading...</a></p>
                </div>
        </div>
        </a>
        <?php
            }
        ?>
        <div class="row mb-2">
            <?php
            $query = "select * from articles where article_status = 'published' and jumbotron=false order by article_id desc";
            $data = mysqli_query($con, $query);
            $article_status = "";

            function limit_text($text, $limit, $a_title)
            {
                if (str_word_count($a_title, 0) > 10) {
                    $words = str_word_count($text, 2);
                    $pos   = array_keys($words);
                    $text  = substr($text, 0, $pos[$limit]) . '...';
                } elseif (str_word_count($a_title, 0) <= 10) {
                    $words = str_word_count($text, 2);
                    $pos   = array_keys($words);
                    $text  = substr($text, 0, $pos[20]) . '...';
                }
                return $text;
            }

            while ($row = mysqli_fetch_assoc($data)) {
                $article_id = $row['article_id'];
                $article_title = $row['article_title'];
                $article_author = $row['article_author'];
                $article_date = $row['article_date'];
                $article_content = $row['article_content'];
                $article_tags = $row['article_tags'];
                $article_image = $row['article_image'];
                $article_cat = $row['article_cat_id'];

            ?>
                <div class="col-lg-6">
                    <div class="card mb-3">
                        <div class="row no-gutters rounded overflow-hidden flex-md-row  shadow-sm h-md-250 position-relative">
                            <div class="col-md-5">
                                <!--<svg class="bd-placeholder-img" width="100%" height="100" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" role="img">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#868e96"/>
                                    <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image</text>
                                </svg>-->
                                <a style="color: black;text-decoration:none" class="stretched-link" href="article.php?a_id=<?php echo $article_id ?>"><img style="object-fit:cover;" width="100%" height="100%" src="img/<?php echo "$article_image"; ?>" alt=""></a>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title"><a style="color: black;text-decoration:none" class="stretched-link" href="article.php?a_id=<?php echo $article_id ?>"><?php echo $article_title ?></a></h5>
                                    <p class="card-text overflow-auto"><?php echo limit_text($article_content, 20, $article_title); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-4 mb-4 font-italic border-bottom">
                    Featured
                </h3>
                <?php
                $query = "select * from articles where article_status='published' and isfeat=true";
                $data = mysqli_query($con, $query);


                while ($row = mysqli_fetch_assoc($data)) {
                    $article_id = $row['article_id'];
                    $article_title = $row['article_title'];
                    $article_author = $row['article_author'];
                    $article_date = $row['article_date'];
                    $article_content = $row['article_content'];
                    $article_tags = $row['article_tags'];
                    $article_image = $row['article_image'];

                ?>
                    <div class="card mb-3">
                        <div class="row no-gutters rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative">
                            <div class="col-md-5">
                                <!--<svg class="bd-placeholder-img" width="100%" height="100" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" role="img">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#868e96"/>
                                    <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image</text>
                                </svg>-->
                                <a style="color: black;text-decoration:none" class="stretched-link" href="article.php?a_id=<?php echo $article_id ?>"><img style="object-fit:cover;" width="100%" height="100%" src="img/<?php echo "$article_image"; ?>" alt=""></a>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title"><a style="color: black;text-decoration:none" class="stretched-link" href="article.php?a_id=<?php echo $article_id ?>"><?php echo $article_title ?></a></h5>
                                    <p class="card-text"><?php echo limit_text($article_content, 10, $article_title); ?></p>
                                </div>
                            </div>
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
                    <p class="mb-0">The Utopia times <em>is funded by readers</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
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
    
    <!--footer-->
    <?php require_once('includes/footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>