<?php
    if(isset($_SESSION['admin_email'])){
        header('location: index.php');
    }
    else{
        header('location: login.php');
    }
?>