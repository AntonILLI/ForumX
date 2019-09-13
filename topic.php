<?php require "header.php" ?>
<?php require "scripts/connect.php" ?>

<script src="topic.js"></script>

<?php
//get topic id    
    if(empty($_GET['id'])){
     header("Location:forum.php");
    }else{
   
    $id = $_GET['id'];
    $result = $db->query("SELECT * FROM xAdmin WHERE id=$id") or die($db->error);
    }
//lian's part from making comment
//count number of messages
$sql = "select count(*) as t from msg where topic_id = $id";
$mysqli_result = $db->query($sql);
$row = $mysqli_result->fetch_array( MYSQLI_ASSOC);

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$dataTotal = $row['t'];
$pageNum = 5;
$maxPage = ceil($dataTotal / $pageNum);
//$page = $_GET['page'];
$offSet = ($page - 1) * $pageNum;
$power = 0;
//$sql = "select * from msg order by id desc";
$sql = "select * from msg where topic_id=$id order by id desc limit $offSet,$pageNum";
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

//require "scripts/gain_power.php";
$power = 0;

$new_sql = "SELECT * FROM msg WHERE topic_id=$id";
$new_result = mysqli_query($db, $sql);

while($new_row = mysqli_fetch_assoc($new_result)){
    $power = $power + $new_row['power'];
}

$value = ($power / 1000) * 100;

?>
<div class="progress" style="background-color: #be0000; height: 20px; font-size: large">
    <div
        class="progress-bar bg-success progress-bar-striped progress-bar-animated"
        role="progressbar"
        style="width:<?php echo $value.'%' ?>"
        aria-valuenow="<?php echo $value ?>"
        aria-valuemin="0"
        aria-valuemax="1000">
        <?php echo $value.'% Power ('.$power.'/1000)' ?>
    </div>
</div>

<div class="cont_principal d-flex flex-column justify-content-center align-items-center">
        <div class="cont_text_img">
            <div class="cont_img_back">
            <?php while($row = $result->fetch_assoc()): ?>
    
                <img class='img_1' src='upload/<?php echo $row['image']?>' alt="" />
                <img class='img_2' src="img/star-wars.jpg" alt="">
            </div>

            <div class="cont_text">

                <h1><?php echo $row['title']; ?></h1>

                <p><?php echo $row['description']; ?></p>


                    <!--
                    <div class="cont_icon_like">
                    <button class="btn_read_m">Leave a comment</button>
                    <p> <i class="comments-logo fa fa-comments"></i><span><!?php echo $count ?></span></p>
                    </div>
                    -->
            </div>
            
            <div class="cont_img_frond">
                <img class='img_1' src='upload/<?php echo $row['image']?>' alt="" />
                <img class='img_2' src="img/star-wars.jpg"alt="" /> 
                <?php endwhile;?>
            </div>
        </div>
        <!-- leave a comment input -->
        <?php

        if (isset($_SESSION['userID'])) {
            $userNAME = $_SESSION['userNAME'];
            $userPOWER = $_SESSION['userPOWER'];

            include "scripts/date.php";

            if(check_24_hours($userNAME)){
            echo '
            <div class="wrapper">
                <div class="add">
                    <form action="scripts/save.php" method="post">
                        <textarea name="content" class="content" cols="50" rows="5"></textarea>
                        <input name="user" value="'.$userNAME.'"class="user" type="hidden" readonly>
                        <input name="topic" value="'.$id.'" type="hidden" readonly>
                        <input class="btn" type="submit" value="Send">
                    </form>
                </div>
            </div>
            ';
            } else {
                echo "<p style='color: red'>Gotta wait till next day</p>";
            }
        } else {
            echo "<p style='color: red'>You are not logged in</p>";
        }
        ?>
        <!-- leave a comment input -->
                
        <?php foreach ($rows as $row) { ?>
        
        <div class="d-flex card-comments shadow mb-3">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-shrink-1">
                        <img src="https://picsum.photos/200/200?random" class="rounded-circle float-left mr-2" width="60">
                    </div>
                    <div class="flex-grow-1">

                        <h5><a href="#">
                            <?php
                            echo $row['user'];
                            ?>
                        <small class="text-muted">
                            <?php
                            echo date("Y-m-d H:i:s", $row['time']);
                            ?>
                        </small>
                        </a></h5>

                        <h2>
                            <?php echo $row['content'];?>
                        </h2>

                    </div>
                </div>
            </div>
        </div>

        <?php } ?>

      
    <!-- <div class="page">
        < --- delete here to uncomment --- ?php
        for($i = 1; $i <= $maxPage; $i++){
            if( $i == $page){
                echo "<a class='hover' href='topic.php?page={$i}'>{$i}</a>";
            }else{
                echo "<a href='topic.php?page={$i}'>{$i}</a>";

            }

        }
        ?>
    </div> -->


        <div aria-label="Page navigation">
                <ul class="pagination">

                    <!-- <li class="page-item">
                    <a class="page-link" href="" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li> -->
                    <!--
                        echo "<li class='page-item'><a class='hover page-link' href='topic.php?page={$i}'>{$i}</a></li>";
                    }else{
                        echo "<li class='page-item'><a class='page-link' href='topic.php?page={$i}'>{$i}</a></li>";
                    -->
                    <?php
                    for($i = 1; $i <= $maxPage; $i++){
                        if( $i == $page){
                        echo "<li class='page-item'><a class='page-link' href='topic.php?page={$i}&id={$id}'>{$i}</a></li>";
                    }else{
                        echo "<li class='page-item'><a class='page-link' href='topic.php?page={$i}&id={$id}'>{$i}</a></li>";

                    }

                    }
                    ?>
                    <!--
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    -->
                    <!-- <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li> -->
                </ul>
        </div>
</div>
<?php require "footer.php"?>