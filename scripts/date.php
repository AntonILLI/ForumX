<?php

//$user = '';

function check_24_hours ($user) {
    
    include "database.php";

    $_24_hrs_in_sec = 86400;
    $_current_time = time();
    
    $user_exists_query = "SELECT * FROM xusers WHERE x_username = '".$user."'";
    $result = mysqli_query($conn, $user_exists_query);
    if(mysqli_num_rows($result) != 0){

    $sql = "SELECT * FROM msg WHERE user = '".$user."' ORDER BY time DESC;";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(!empty($row)){

        $last_comment_time = $row['time'];

            if($_current_time - $last_comment_time < $_24_hrs_in_sec){
                //echo'2';
                return false;#too soon for leaving comment
                exit();                                 
            } else {
                //echo'1';
                return true;#24 hours past since last comment from this user
                exit();                                 
            }

    } else {
        //echo'3';
        return true;#user exists but it is first time to leave comment
        exit();

        }

    } else {
        //echo'4';
        //header("Location: ../index.php?username=empty");#no user was found
        exit();
        
    }
        
}
//check_24_hours($user);