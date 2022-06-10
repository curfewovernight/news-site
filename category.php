<?php require_once('includes/header.php'); ?>

<body>
<div class="content">
    <?php require_once('includes/top-header.php') ?>
    <div class="container">
        <?php

        ?>

        <div class="row">
            <?php
            $query = "select * from articles";
            $data = mysqli_query($con, $query);

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
                $article_title = $row['article_title'];
                $article_author = $row['article_author'];
                $article_date = $row['article_date'];
                $article_content = $row['article_content'];
                $article_tags = $row['article_tags'];
                $article_image = $row['article_image'];

            ?>
            <?php
            }
            ?>
        </div>
    </div>
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main mt-3">
                
                <?php

                if (isset($_GET['category'])) {
                    $category_id = $_GET['category'];
                    $category_title = $_GET['catame'];
                }

                $query = "select * from articles where article_cat_id='$category_id' AND article_status='published';";
                $data = mysqli_query($con, $query);

                ?>

                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Category: <?php echo $category_title ?>
                </h3>

                <?php
                
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
                        <div class="row no-gutters rounded overflow-hidden flex-md-row  shadow-sm h-md-100 position-relative">
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
                                    <!--<p class="card-text"><?php echo limit_text($article_content, 10, $article_title); ?></p>-->
                                    <p class="card-text text-muted">By: <?php echo $article_author ?> on <?php echo $article_date ?></p>
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