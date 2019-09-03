
<?php
$host = '127.0.0.1';
$dbuser = 'root';
$pwd = '123456';
$dbname = 'php10';
$db = new mysqli($host, $dbuser, $pwd, $dbname);

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
    }
    ?>

</div>

</body>
</html>