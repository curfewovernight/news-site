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

    <title>Quohog News - Sign Up</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <!--<link href="css/sb-admin-2.min.css" rel="stylesheet">-->

    <!-- bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 2.0rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            text-decoration: none !important;
            font-family: "DM Serif Text", serif;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .card {
            top: 0;
            transition: transform 0.25s;
             /* Animation */
            /*box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);*/
            transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
            transition: top ease 0.2s;
        }

        .card:hover {
            /*transform: scale(1.048);*/
            box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
            top: -5px;
        }

        .headercl {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 10%;
            backdrop-filter: saturate(1000%) blur(20px) brightness(100%);
            background-color: rgba(255,255,255,0.72);
        }

        h1{
            font-family: "DM Serif Text";
        }

    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet"> 
    <!-- Custom styles for this template -->
    <link href="../css/blog.css" rel="stylesheet">
    <!--mycss-->
    <link href="..css/style.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <header class="blog-header py-3 mt-2 border-0">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col text-center">
                    <a class="bd-placeholder-img text-dark" href="../index.php">The Utopia Times</a>
                </div>
            </div>
        </header>
        <div class="row justify-content-center rounded bg-light mt-3">
            <!--<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>-->
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                    <br>
                    <form action="includes/register.inc.php" method="post">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="first_name" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="last_name" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email_addr" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" name="pwd" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" name="pwdrepeat" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                            </div>
                        </div>
                        <br><br>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Register Account</button>
                    </form>
                    <br><br>
                    <div class="text-center">
                        Already have an account?<br><a href="login.php">Login Here!</a>
                    </div>
                    <br>
                    <?php
                    if (isset($_GET['err'])) {
                        if ($_GET['err'] == 'emptyinput') {
                            echo '<div style="text-align:center" class="alert alert-danger p-2" role="alert">Fill in all the empty fields!</div>';
                        }
                        elseif($_GET['err'] == 'invalidname') {
                            echo '<div style="text-align:center" class="alert alert-danger p-2" role="alert">Enter a proper name!</div>';
                        }
                        elseif($_GET['err'] == 'invalidemail') {
                            echo '<div style="text-align:center" class="alert alert-danger p-2" role="alert">Enter a proper email!</div>';
                        }
                        elseif($_GET['err'] == 'alreadyexists') {
                            echo '<div style="text-align:center" class="alert alert-danger p-2" role="alert">An account with the same email already exists!</div>';
                        }
                        elseif($_GET['err'] == 'passwordnotmatch') {
                            echo '<div style="text-align:center" class="alert alert-danger p-2" role="alert">Passwords do not match!</div>';
                        }
                        elseif($_GET['err'] == 'stmtfailed') {
                            echo '<div style="text-align:center" class="alert alert-danger p-2" role="alert">Passwords do not match!</div>';
                        }
                        elseif($_GET['err'] == 'none') {
                            echo '<div style="text-align:center" class="alert alert-success p-2" role="alert">You have signed up!</div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>