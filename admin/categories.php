<?php
    ob_start();
    require_once("../includes/db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

</head>

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
                    <h1 class="h3 mb-2 text-gray-800">Categories</h1>
                    <p class="mb-3">You can add a new category here</p>

                                
                    <!--Input category-->
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-3">
                                <input type="text" name="cat_to_add" class="form-control" placeholder="Enter new category...">
                            </div>
                            <div class="col-2">
                                <button type="submit" name="add_cat" class="form-control btn btn-primary mb-3">Add Category</button>
                            </div>
                            <?php
                            if(isset($_POST['add_cat']))
                            {
                                if($_POST['cat_to_add'] == ""){
                                    echo '  <div class="alert alert-warning" role="alert">
                                                Input is invalid!
                                            </div>';
                                }
                                else{
                                    $cat_to_add = $_POST['cat_to_add'];
                                    $query = "insert into categories (cat_title) values ('$cat_to_add')";
                                    mysqli_query($con,$query);

                                    echo "<div class='col-4 mb-0 alert alert-success' role='alert'>Added $cat_to_add as a category successfully!</div>";
                                }
                            }
                            ?>
                        </div>
                    </form>

                    <?php
                        //edit categories
                            if(isset($_GET['edit']))
                            {
                                $Edit_Id = $_GET['edit'];
                                $sql = "select * from categories where cat_id = '$Edit_Id'";
                                $result = mysqli_query($con,$sql);
                                $data = mysqli_fetch_assoc($result);
                        ?>
                            <form action="update.php" method="POST" >
                                <div class="row">
                                    <div class="col-3">
                                        <input type="text" name="cat_to_edit" class="form-control" value="<?php echo $data['cat_title'] ?>" placeholder="Enter new name...">
                                        <input type="hidden" name="edit_id" value="<?php echo $data['cat_id']; ?>">
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" name="edit_cat" class="form-control btn btn-primary mb-3">Edit Category</button>
                                    </div>
                                    <?php
                                    if(isset($_POST['add_cat']))
                                    {
                                        if($_POST['cat_to_add'] == ""){
                                            echo '  <div class="alert alert-warning" role="alert">
                                                        Input is invalid!
                                                    </div>';
                                        }
                                        else{
                                            $cat_to_add = $_POST['cat_to_add'];
                                            $query = "insert into categories (cat_title) values ('$cat_to_add')";
                                            mysqli_query($con,$query);

                                            echo "<div class='col-4 mb-0 alert alert-success' role='alert'>Added $cat_to_add as a category successfully!</div>";
                                        }
                                    }
                                    ?>
                                </div>
                            </form>

                        <?php
                            }
                        ?>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width:1%">ID</th>
                                            <th style="width:96%">Title</th>
                                            <th style="width:1%">Edit</th>
                                            <th style="width:1%">Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th style="width:1%">ID</th>
                                            <th style="width:96%">Title</th>
                                            <th style="width:1%">Edit</th>
                                            <th style="width:1%">Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php

                                        $sql = "select * from categories";
                                        $result = mysqli_query($con,$sql);

                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                            
                                    ?>
                                        <tr>
                                            <td><?php echo $row['cat_id'];?></td>
                                            <td><?php echo $row['cat_title'];?></td>
                                            <td style="text-align: center;"><a href="categories.php?edit=<?php echo $row['cat_id'];?>" class="btn btn-success"><span class="fa fa-edit"></span></a></td>
                                            <td style="text-align: center;"><a href="categories.php?del=<?php echo $row['cat_id'];?>" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
                                        </tr>
                                        <?php
                                        }

                                            //delete categories
                                            if(isset($_GET['del']))
                                            {
                                                $del = $_GET['del'];
                                                $sql = "delete from categories where cat_id='$del'";
                                                $result = mysqli_query($con,$sql);

                                                if($result)
                                                {
                                                    header("location: categories.php");
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
