<?php

if (isset($_POST['login-btn'])) {

    require "database.php";

    $usermail = $_POST['email_x'];
    $passwd = $_POST['passwd_x'];

    if(empty($usermail) || empty($passwd)) {
        header("Location: ../index.php?error=emptyfields");
        exit();          
    } else {
        $sql = "SELECT * FROM xusers WHERE x_username=? OR x_email=?;";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();                 
        } else {

            mysqli_stmt_bind_param($stmt, "ss", $usermail, $usermail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passwd_check = password_verify($passwd, $row['x_password']);
                if ($passwd_check == false) {
                    header("Location: ../index.php?error=wrongpassword");
                    exit();                         
                }
                elseif ($passwd_check == true) {

                    session_start();
                    $_SESSION['userID'] = $row['x_id'];
                    $_SESSION['userNAME'] = $row['x_username'];
                    $_SESSION['userPOWER'] = $row['x_power'];
                    
                    header("Location: ../index.php?login=success");
                    exit();                         

                } else {
                    header("Location: ../index.php?error=unknownerror");
                    exit();                         
                }
            } else {
                header("Location: ../index.php?error=nouserfound");
                exit();                     
            }

        }
    }




} else {
    header("Location: ../index.php");
    exit();      
}
