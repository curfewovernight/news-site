<?php 
    require_once "includes/db.php";
    session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Quohog News</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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

        .sup {
            top: 0;
            transition: transform 0.25s;
             /* Animation */
            /*box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);*/
            transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
            transition: top ease 0.2s;
        }

        .sup:hover {
            /*transform: scale(1.048);*/
            box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
            top: -5px;
        }

        .headercl {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 10%;
            backdrop-filter: saturate(150%) blur(20px) brightness(100%);
            background-color: rgba(255,255,255,0.72);
        }

        .navbarblurbg {
            backdrop-filter: saturate(150%) blur(20px) brightness(100%);
            background-color: rgba(255,255,255,0.72);
        }

        .footlistnodec {
            list-style-type: none;
        }

        @media only screen and (max-width: 992px) {
            .butmb {
                margin-bottom: 10px;
                margin-top: 10px;
            }
            .nana {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }
            .slr {
                padding-left: 0 !important;
            }
            .blog-post-title{
                font-size: 1.7rem !important;
            }
        }

        .jumbocontinue{
            font-size: 1.0rem !important;
        }
        .jumbocontent{
            font-size: 1.2rem !important;
        }

        @media only screen and (max-width: 992px){
            .jumbotitle{
                font-size: 2.0rem !important;
            }
            .jumbocontinue{
                font-size: 1.0rem !important;
            }
        }

        @media only screen and (max-width: 576px){
            .jumbotitle{
                font-size: 1.6rem !important;
            }
            .jumbocontent{
                font-size: 1.0rem !important;
            }
        }

        @media only screen and (min-width: 992px) {
            .nav-skrull {
                margin-left: auto;
            }
        }

        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1 0 auto;
        }
        .blog-footer {
            flex-shrink: 0;
        }

    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap" rel="stylesheet"> 
    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">
    <!--mycss-->
    <link href="css/style.css" rel="stylesheet">
</head>