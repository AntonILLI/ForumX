<?php

if (isset($_POST['signup-btn']))

{

    require "database.php";

    $username = $_POST['username_x'];
    $email = $_POST['email_x'];
    $passwd = $_POST['passwd_x'];
    $passwdRepeat = $_POST['passwd_repeat'];

    if (empty($username) || empty($email) || empty($passwd) || empty($passwdRepeat)) {
        header("Location: ../signup.php?error=emptyfields&username_x=".$username."&email_x=".$email);
        exit();
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=invalidmailusername");
        exit();  
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&username_x=".$username);
        exit();  
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidusername&email_x=".$email);
        exit();  
    }
    elseif ($passwd != $passwdRepeat) {
        header("Location: ../signup.php?error=passwdcheck&email_x=".$email."&username_x=".$username);
        exit();  
    } else {

        $sql = "SELECT x_username FROM xusers WHERE x_username=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror&email_x=".$email."&username_x=".$username);
            exit();      
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_num_rows($stmt);
            
            if($result > 0) {
                header("Location: ../signup.php?error=userexists&email_x=".$email);
                exit();          
            } else {

                $sql = "INSERT INTO xusers (X_username, x_email, x_password, x_power) VALUES (?, ?, ?, 10)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror&email_x=".$email."&username_x=".$username);
                    exit();      
                } else {
                    $hash_passwd = password_hash($passwd, PASSWORD_DEFAULT);    

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hash_passwd);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../index.php?signup=success".$username);
                    exit();      
                }

            }

        }

    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

} else {
    header("Location: ../signup.php");
    exit();      
}