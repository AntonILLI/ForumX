<?php require_once 'admin_process.php'?>
<?php require "header.php" ?>
<?php
      $mysqli = new mysqli('localhost', 'root', '', 'ForumX') or die(mysqli_error($mysqli));
      $result = $mysqli->query("SELECT COUNT(*) FROM xAdmin") or die($mysqli->error);
      $row = mysqli_fetch_row($result);

      $num_rows = $row[0];

      $set_per_page = 3;
      $total = ceil($num_rows / $set_per_page);

      if (isset($_GET['page']) && is_numeric($_GET['page'])) {

        $current_page = (int) $_GET['page'];
      } else {

        $current_page = 1;
      }

      if ($current_page > $total) {

        $current_page = $total;
      }

      if ($current_page < 1) {
        $current_page = 1;
      }


      $offset = ($current_page - 1) * $set_per_page;
      // $sql = "SELECT id FROM user LIMIT $offset, $set_per_page";
      // $result_row = $mysqli->query($sql) or die($mysqli->error);

      // $sql = "SELECT * FROM user LIMIT";
      // $sql .= "LIMIT $set_per_page";
      // $sql .= "OFFSET $$offset";
      $sql = "SELECT * FROM xAdmin LIMIT $offset, $set_per_page";
      $result_row = $mysqli->query($sql) or die($mysqli->error);

      ?>

  

      <?php
    
      $result = $mysqli->query("SELECT * FROM xAdmin") or die($mysqli->error);
      
      ?>
<section>

        <div class="container-fluid">
          <div class="row">

            <div class="banner1 col-2">
              <div class="d-flex flex-column">
              </div >
              </div>
            
        
            <div class="col-8">
              <div class="wrap-topic d-flex flex-column">
              
              <?php while ($row = $result_row->fetch_assoc()) : ?>
           
                    <div class="card mb-4">
                        <div class="row no-gutters">
                          <div class="card-image col-md-4">
                            <a href="topic.php?page=1">
                            <img class="img-fluid rounded mx-auto d-block" src='upload/<?php echo $row['image'];?>' height='250' width='250'>
                            </a>
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                            <a href="topic.php?id=<?php echo $row['id']; ?>" class="card-title"><?php echo $row['title']; ?></a>
                              <p class="card-text"><?php echo $row['description']; ?></p>
                              <?php 
                              $query_get_last_comment = "SELECT * FROM msg WHERE topic_id = 13 ORDER BY time DESC";
                              $save_result = mysqli_query($mysqli, $query_get_last_comment);
                              $get_time_col = mysqli_fetch_assoc($save_result);
                              echo
                              '
                              <p class="card-text"><small class="text-muted">Last updated: '.
                              date("Y-m-d H:i:s", $get_time_col['time'])
                              .'</small></p>

                              '
                              ?>
                            </div>
                          </div>
                        </div>
                        <div class="progress" style="background-color: #be0000; height: 20px">
                          <?php
                          include_once "scripts/gain_power.php"; 
                          $topic_id = 0;
                          $topic_id = $row['id'];
                          $topic_power = gain_power($topic_id);

                          $value = ($topic_power / 1000) * 100;

                          ?>
                          <div
                          class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                          role="progressbar"
                          style="width:<?php echo $value.'%' ?>"
                          aria-valuenow="<?php echo $value ?>"
                          aria-valuemin="0"
                          aria-valuemax="1000">
                          <?php echo $value.'% Power ('.$topic_power.'/1000)' ?>
                        </div>
                        </div>
                      </div>
                      <?php endwhile; ?>
                      <!--
                      <div class="card mb-4">
                          <div class="row no-gutters">
                            <div class="card-image col-md-4">
                            <a href="topic.php?page=1">
                              <img src="img/star-wars-1-3.jpg" class="card-img1" alt="Star Wars: Episodes I – III"
                              style="max-width: 100%; height: 100%;">
                            </a>
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <a href="topic.html" class="card-title">Star Wars: Episodes I – III</a>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                           
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        

                        <div class="card mb-4">
                          <div class="row no-gutters">
                            <div class="card-image col-md-4">
                            <a href="topic.php?page=1">
                              <img src="img/star-wars-7-9.jpg" class="card-img1" alt="Star Wars: Episodes VII – IX"
                              style="max-width: 100%; height: 100%;">
                            </a>
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <a href="topic.php?page=1" class="card-title">Star Wars: Episodes VII – IX</a>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small>
                           
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        -->


                  


                 </div>
              </div>

            <div class="banner2 col-2">
                <div class="d-flex flex-column">
                </div >
                </div>
              


          </div>
        </div>

      </section>





<?php require "footer.php" ?>