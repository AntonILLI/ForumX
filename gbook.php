<?php

include 'scripts/connect.php';

$sql = "select * from msg order by id desc";

$mysqli_result = $db->query($sql);

if($mysqli_result === false){
    echo 'SQL is wrong'; //nothing to fetch
    exit;
}

$rows = [];

while($row = $mysqli_result->fetch_array(MYSQLI_ASSOC)){
    $rows[] = $row;
}

?>


<?php require "header.php" ?>

<div class="wrap">
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

<? require "footer.php" ?>