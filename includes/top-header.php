<nav class="navbar navbarblurbg navbar-light navbar-expand-lg sticky-top border-bottom mb-3 p-0">
    <div class="container nana">
        <a href="index.php" class="navbar-brand bd-placeholder-img text-dark py-0">The Utopia Times</a>
        <button class="navbar-toggler" style="border-color: rgba(0,0,0,0);" data-toggle="collapse" data-target="#navBarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navBarMenu">
            <div class="nav-skrull py-1 mr-3">
                <nav class="nav d-flex justify-content-start">
                    <ul class="navbar-nav">
                    <?php
                    $query = "select * from categories";
                    $result = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo "<li class='nav-item'><a class='p-2 text-dark slr' href='category.php?category={$cat_id}&catame={$cat_title}'>{$cat_title}</a></li>";
                    }
                    ?>
                    </ul>
                </nav>
            </div>
            <div class="butmb">
                <?php
                if (isset($_SESSION['admin_email'])) {
                    echo '<a class="btn btn-sm btn-outline-dark" href="admin/index.php" target="_blank">Admin Panel</a>
                        <a class="btn btn-sm btn-outline-dark" href="admin/includes/logout.inc.php">Logout</a>';
                } elseif (isset($_SESSION['user_email'])) {
                    echo '<a class="btn btn-sm btn-outline-dark" href="admin/includes/logout.inc.php">Logout</a>';
                } else {
                    echo '<a class="btn btn-sm btn-outline-dark" href="admin/login.php">Log In</a>
                        <a class="btn btn-sm btn-outline-dark" href="admin/register.php">Sign up</a>';
                }
                ?>
            </div>
        </div>
    </div>
</nav>