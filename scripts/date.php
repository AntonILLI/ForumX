<?php

function check_24_hours ($user) {
    
    require "database.php";

    $_24_hrs_in_sec = 86400;
    $_current_time = time();
    
    $sql = "SELECT * FROM msg WHERE user = '".$user."' ORDER BY time DESC;";
    $result = mysqli_query($conn, $sql);

    if($row = mysqli_fetch_assoc($result)){

        $last_comment_time = $row['time'];

            if($_current_time - $last_comment_time < $_24_hrs_in_sec){
                
                return false;
                die();
            } else {
                return true;
                die();
            }

    } else {

        return false;#nothing was found in a DB

    }
}