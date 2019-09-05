<?php
include ('connect.php');

$sql = "select count(*) as t from msg";
$mysqli_result = $db->query($sql);
$row = $mysqli_result->fetch_array( MYSQLI_ASSOC);
//var_dump( $row['t'] );

if( isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$dataTotal = $row['t'];
$pageNum = 5;
$maxPage = ceil($dataTotal / $pageNum);
//$page = $_GET['page'];

$offSet = ($page - 1) * $pageNum;

//$sql = "select * from msg order by id desc";
$sql = "select * from msg order by id desc limit $offSet,$pageNum";
//$sql = "select * from msg order by id desc limit $offSet,$pageNum";
$mysqli_result = $db->query($sql);
if($mysqli_result===false){
    echo 'SQL wrong'; //nothing fetch
    exit;
}

$rows = [];
while($row = $mysqli_result->fetch_array(MYSQLI_ASSOC)){
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

    <div class="page">
        <?php
        for($i = 1; $i <= $maxPage; $i++){
            if( $i == $_GET['page']){
                echo "<a class='hover' href='gbook.php?page={$i}'>{$i}</a>";
            }else{
                echo "<a href='gbook.php?page={$i}'>{$i}</a>";

            }

        }
        ?>
    </div>

</div>

</body>
</html>