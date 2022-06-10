<?php
    function emptyInputSignup($first_name, $last_name, $email, $pwd, $pwdrepeat) {
        if(empty($first_name) || empty($last_name) || empty($email) || empty($pwdrepeat) || empty($pwd)) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function invalidName($first_name, $last_name) {
        if(!preg_match("/^[a-zA-Z0-9]*$/", $first_name) || !preg_match("/^[a-zA-Z0-9]*$/", $last_name)) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function pwdMatch($pwdrepeat, $pwd) {
        if($pwd !== $pwdrepeat) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function alreadyExists($con, $email) {
        $sql = "select * from users where user_email=?";
        $stmt = mysqli_stmt_init($con);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../register.php?err=stmtfailed");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function isadmin($con, $email) {
        $sql = "select user_email from users where user_role='administrator' AND user_email=?;";
        $stmt = mysqli_stmt_init($con);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../register.php?err=ayylmao");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function createUser($con, $first_name, $last_name, $email, $pwd) {
        $sql = "insert into users (first_name, last_name, user_email, user_password) values (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($con);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../register.php?err=stmtfailed");
            exit();
        }

        $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);
        
        mysqli_stmt_bind_param($stmt, "ssss", $first_name, $last_name, $email, $hashpwd);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        header("location: ../register.php?err=none");
        exit();
    }

    function emptyInputLogin($email, $pwd) {
        if(empty($email) || empty($pwd)) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function loginUser($con, $email, $pwd) {
        $alreadyExists = alreadyExists($con, $email);

        if($alreadyExists == false) {
            header("location: ../login.php?err=wronglogin");
            exit();
        }

        $pwdhashed = $alreadyExists['user_password'];
        $checkpwd = password_verify($pwd, $pwdhashed);

        if($checkpwd == false) {
            header("location: ../login.php?err=wrongpwd");
            exit();
        }
        elseif($checkpwd == true) {
            if(isadmin($con, $email) == false) {
                session_start();
                $_SESSION['user_email'] = $alreadyExists['user_email'];
                header("location: ../../index.php");
                exit();
            }
            else{
                session_start();
                $_SESSION['admin_email'] = $alreadyExists['user_email'];
                header("location: ../../index.php");
                exit();
            }
        }
    }
?>