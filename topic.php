<?php require "header.php" ?>
<script src="topic.js"></script>
<!-- lian's part from making comment -->

<?php
include 'scripts/connect.php';

//count number of messages
$sql = "select count(*) as t from msg";
$mysqli_result = $db->query($sql);
$row = $mysqli_result->fetch_array( MYSQLI_ASSOC);

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

include "scripts/gain_power.php";

$value = ($power / 1000) * 100;

?>
<div class="progress">
    <div
        class="progress-bar bg-success"
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
                <img class='img_1' src="img/star-wars-7-9.jpg" alt="">
                <img class='img_2' src="img/star-wars-4-6.jpg" alt="">
            </div>

            <div class="cont_text">
                <h1>Star Wars: Episodes IV – VI</h1>
                <p>Star Wars is an American epic space-opera media franchise created by George Lucas.
                    The franchise began with the eponymous 1977 film and quickly became a worldwide
                    pop-culture phenomenon. The original film, later subtitled Episode IV – A New Hope,
                    was followed by the sequels Episode V – The Empire Strikes Back (1980) and 
                    Episode VI – Return of the Jedi (1983), forming what is collectively referred 
                    to as the original trilogy. A prequel trilogy was later released, consisting of Episode I </p>
                    <!--
                    <div class="cont_icon_like">
                    <button class="btn_read_m">Leave a comment</button>
                    <p> <i class="comments-logo fa fa-comments"></i><span><?php echo $count ?></span></p>
                    </div>
                    -->
            </div>
            
            <div class="cont_img_frond">
                <img class='img_1'src="img/star-wars-4-6.jpg"alt="" />
                <img class='img_2' src="img/star-wars-7-9.jpg"alt="" /> 
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

                    <?php
                    for($i = 1; $i <= $maxPage; $i++){
                        if( $i == $page){
                        echo "<li class='page-item'><a class='hover page-link' href='topic.php?page={$i}'>{$i}</a></li>";
                    }else{
                        echo "<li class='page-item'><a class='page-link' href='topic.php?page={$i}'>{$i}</a></li>";

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