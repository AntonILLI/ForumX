<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>ForumX</title>
</head>

<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a href="http://localhost/forumx/admin_dashboard.php" class="nav-link active">Dashboard</a>
          </li>
          <li class="nav-item px-2">
            <a href="comments.php" class="nav-link">Comments</a>
          </li>

          <li class="nav-item px-2">
            <a href="admin_users.php" class="nav-link">Users</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown mr-3">
            <a href="scripts/gotoindex.php" class="nav-link">
              index.php
            </a>
          
          </li>
          <li class="nav-item">
            <a href="scripts/logout.php" class="nav-link">
              <i class="fas fa-user-times"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

      <?php require_once 'admin_process.php' ?>

  <!-- HEADER -->
  <header id="main-header" class="py-2 bg-warning text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>
          <i class="fa fa-comments" aria-hidden="true"></i> Comments</h1>
        </div>
      </div>
    </div>
  </header>

        <?php
  $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

  $server = $url["host"];
  $username = $url["user"];
  $password = $url["pass"];
  $db = substr($url["path"], 1);
  
  $mysqli = new mysqli($server, $username, $password, $db) or die(mysqli_error($mysqli));

        $result = $mysqli->query("SELECT COUNT(*) FROM msg") or die($mysqli->error);


        $row = mysqli_fetch_row($result);

        $num_rows = $row[0];

        $set_per_page = 10;
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
        $sql = "SELECT * FROM msg LIMIT $offset, $set_per_page ";
        $result_row = $mysqli->query($sql) or die($mysqli->error);

        ?>


        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'ForumX') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM msg ORDER BY time DESC") or die($mysqli->error);
        ?>













  <section id="search" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ml-auto">
        <?php
              if (isset($_SESSION['message'])) : ?>
                <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

                  <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
          <div class="input-group">
         
            <div>
            


                </div>

              <?php endif; ?>
</div>
            <div class="input-group-append">

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- USERS -->
  <section id="users">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>All Comments</h4>
            </div>
            <table class="table table-striped">
              <thead class="thead-dark">
                <tr>

                  <th>ID</th>
                  <th>User Name</th>
                  <th>Comment</th>
                  <th></th>
                  <th>Post Date</th>
                  <th></th>
                </tr>
              </thead>
              <?php
 
              while ($row = $result->fetch_assoc()) :
              
               
                ?>
                <tbody>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['user']; ?></td>
                    <td><?php echo $row['content']; ?></td>
                    <td></td>
                    <td class="card-text"><?php  echo $row['time'];?></td>
                    <td> <a href="comment_process.php?deleting=<?php echo $row['id']; ?>" class="btn btn-danger" style="float:right;">Delete</a></td>
                    <tr>

                  <?php endwhile; ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>


<!--
  <section>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">

          <ul class="pagination">
            <?php

            echo "<ul class='pagination'>";
            echo "<li class='page-item'><a class='page-link' href='comments.php?page=" . ($current_page - 1) . "' class='button'>Previous</a></li>";

            ?>

            <?php
            for ($i = 1; $i <= $total; $i++) {
              //active link
              if ($i == $current_page) {
                echo "<li class='page-item'><a class='page-link' href='comments.php?page={$i}'>{$i}</a></li>";
              } else {
                //not active

                echo "<li class='page-item'><a class='page-link' href='comments.php?page={$i}'>{$i}</a></li>";
              }
            }

            ?>
            <?php

            echo "<ul class='pagination'>";
            echo "<li class='page-item'><a class='page-link' href='comments.php?page=" . ($current_page - 1) . "' class='button'>Next</a></li>";



            ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
          -->

  <!-- FOOTER -->
  <footer id="main-footer" class="bg-dark text-white mt-5 p-5">
    <div class="container">
      <div class="row">
        <div class="col">
          <p class="lead text-center">
            Copyright &copy;
            <span id="year"></span>
            ForumX
          </p>
        </div>
      </div>
    </div>
  </footer>




  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());
  </script>
</body>

</html>