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
      <?php
      $mysqli = new mysqli('localhost', 'root', '', 'ForumX') or die(mysqli_error($mysqli));


      ?>

  

      <?php
    
      $result = $mysqli->query("SELECT * FROM xAdmin") or die($mysqli->error);
      
      ?>
       <?php
     
   
     $sql = $mysqli->query("SELECT COUNT(x_id) FROM xUsers ")or die($mysqli->error);
     
     $admin_sql = $mysqli->query("SELECT COUNT(id) FROM xAdmin") or die($mysqli->error);
      
     
     ?>



      <!-- <a href="admin_dashboard.html" class="navbar-brand">Forumx</a> -->
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

  <!-- HEADER -->
  <header id="main-header" class="py-2 bg-success text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>
          <i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard</h1>
        </div>
      </div>
    </div>
  </header>