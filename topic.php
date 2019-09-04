<?php require "header.php" ?>

<!-- lian's part from making comment -->

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


<div class="cont_principal d-flex flex-column justify-content-center align-items-center">
        <div class="cont_text_img">

            <div class="cont_img_back">
                <img class='img_1' src="img/star-tag.jpg" alt="">
                <img class='img_2' src="img/star-wars.jpg" alt="">
            </div>

            <div class="cont_text">
                <h1>Star Wars: Episodes IV – VI</h1>
                <p>Star Wars is an American epic space-opera media franchise created by George Lucas.
                    The franchise began with the eponymous 1977 film and quickly became a worldwide
                    pop-culture phenomenon. The original film, later subtitled Episode IV – A New Hope,
                    was followed by the sequels Episode V – The Empire Strikes Back (1980) and 
                    Episode VI – Return of the Jedi (1983), forming what is collectively referred 
                    to as the original trilogy. A prequel trilogy was later released, consisting of Episode I </p>
                    
                    <div class="cont_icon_like">
                    <button class="btn_read_m">Leave a comment</button>
                    <p> <i class="comments-logo fa fa-comments"></i><span>10</span></p>
                    </div>

            </div>
            
            <div class="cont_img_frond">
                <img class='img_1'src="img/star-tag.jpg"alt="" />
                <img class='img_2' src="img/star-wars.jpg"alt="" /> 
            </div>
        </div>
        <!-- leave a comment input -->
        <?php
        
        if (isset($_SESSION['userID'])) {
            $userNAME = $_SESSION['userNAME'];
            echo '
            <div class="wrapper">
                <div class="add">
                    <form action="save.php" method="post">
                        <textarea name="content" class="content" cols="50" rows="5"></textarea>
                        <input name="user" value="'.$userNAME.'"class="user" type="hidden" readonly>
                        <input class="btn" type="submit" value="Send">
                    </form>
                </div>
            </div>
            ';
        } else {
            echo "<p style='color: red'>You are not logged in</p>";
        }
        ?>
        <!-- leave a comment input -->
                    

        <?php foreach ($rows as $row){ ?>
        
        <div class="card-comments shadow mb-3">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-shrink-1">
                        <img src="https://picsum.photos/200/200?random" class="rounded-circle float-left mr-2" width="60">
                    </div>
                    <div class="flex-grow-1">

                        <h5><a href="#">
                            <?php echo $row['user'];?>
                        <small class="text-muted">
                            <?php echo date("Y-m-d H:i:s", $row['time']);?>
                        </small></a></h5>
                        <h2>
                            <?php echo $row['content'];?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>

        <div aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                </ul>
        </div>

</div>
<?php require "footer.php"?>