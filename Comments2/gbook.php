
<?php
  $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

  $server = $url["host"];
  $username = $url["user"];
  $password = $url["pass"];
  $db = substr($url["path"], 1);
  
  $db = new mysqli($server, $username, $password, $db) or die(mysqli_error($mysqli));

if( $db->connect_errno <>0){
    echo 'failed to connect';
    echo $db->connect_error;
    exit;
}

$sql = "select * from msg order by id desc";
$mysqli_result = $db->query($sql);
if($mysqli_result===false){
    echo 'SQL wrong'; //nothing fetch
    exit;
}

$rows = [];
while( $row = $mysqli_result->fetch_array(MYSQLI_ASSOC)){
    $rows[] = $row;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>forum</title>
    <link rel="stylesheet" type="text/css" href="forum_style.css">
</head>
<body>

<div class="wrap">
    <!------------Send message------------------->
    <div class="add">
        <form action="save.php" method="post">
                <textarea name="content" class="content" cols="50" rows="5">

                </textarea>
            <input name="user" class="user" type="text"/>
            <input class="btn" type="submit" value="Send"/>
        </form>
    </div>

    <?php
    foreach ($rows as $row){
        ?>
        <div class="msg">
            <div class="info">
                <span class="user"><?php echo $row['user'];?></span>
                <span class="time"><?php echo date("Y-m-d H:i:s", $row['time']);?></span>
            </div>

        <div class="content">
            <?php echo $row['content'];?>
        </div>
        </div>

    <?php

    $end = $row['time']+86400-36000;
    //$end = $row['time'];
    $start = time();
    $diff = $end - $start;

    $countdown=date("h:m:s", $diff);



    $hour = date('H', $diff)-24;
    $minute = date('m', $diff)-60;
    $seconds = date('s', $diff)-60;

    echo('For your next comment');
    //echo ($end);
    // echo($diff);

    echo($countdown);

    printf(' time left: %dhour%dminutes%dseconds', $hour,$minute,$seconds);

    ?>

   

    <?php
    }
    ?>

</div>

</body>
</html>