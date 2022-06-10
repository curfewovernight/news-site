<?php
    if(isset($_POST['submit']))
    {
        $email = $_POST['email_addr'];
        $pwd = $_POST['pwd'];

        require_once("../../includes/db.php");
        require_once("functions.inc.php");

        if(emptyInputLogin($email, $pwd) !== false) {
            header("location: ../login.php?err=emptyinput");
            exit();
        }

        if(invalidEmail($email) !== false) {
            header("location: ../register.php?err=invalidemail");
            exit();
        }

        loginUser($con, $email, $pwd);      

    }
    else
    {
        header("location: ../login.php");
        exit();
    }
?>