<?php
    if(isset($_POST['submit']))
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email_addr'];
        $pwd = $_POST['pwd'];
        $pwdrepeat = $_POST['pwdrepeat'];

        require_once("../../includes/db.php");
        require_once("functions.inc.php");

        if(emptyInputSignup($first_name, $last_name, $email, $pwdrepeat, $pwd) !== false) {
            header("location: ../register.php?err=emptyinput");
            exit();
        }

        if(invalidName($first_name, $last_name) !== false) {
            header("location: ../register.php?err=invalidname");
            exit();
        }

        if(invalidEmail($email) !== false) {
            header("location: ../register.php?err=invalidemail");
            exit();
        }

        if(pwdMatch($pwdrepeat, $pwd) !== false) {
            header("location: ../register.php?err=passwordnotmatch");
            exit();
        }

        if(alreadyExists($con, $email)) {
            header("location: ../register.php?err=alreadyexists");
            exit();
        }

        createUser($con, $first_name, $last_name, $email, $pwd, $pwdrepeat);        

    }
    else
    {
        header("location: ../register.php");
        exit();
    }
?>