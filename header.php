<?php
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>

      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--imported frameworks and libraries-->
    <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script
    src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

    <script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>

    <!--self created stylesheets and scripts-->
    <!--link rel="stylesheet" href="./css/home.css" type="text/css"-->
    <link rel="stylesheet" href="css/forum_style.css" type="text/css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <!--
    <link rel="stylesheet" href="css/style.css" type="text/css">
    -->
    
    
    <title>Forum X</title>
    
  </head>
  <body id="home" data-spy="scroll"  data-target="#main-nav">

    <div class="head-wrap d-flex">
          <h1 class="forum flex-grow-1">Forum<span>X</span></h1>
    </div>
    <div class="wrap-button flex-grow-0">
          <?php
            if (isset($_SESSION['userID'])) {

                echo
                '
                <form action="scripts/logout.php" method="post">
                <button type="submit" name="logout-btn" class="btn btn-outline-warning">Logout</button>
                <!--
                <button type="submit" name="logout-btn">Logout</button>
                -->
                </form>
                ';
            } else {
                echo
                ' 
                <form action="scripts/login.php" method="post">
                <input type="text" name="email_x" placeholder="Username/email" style="width: 250px">
                <input type="password" name="passwd_x" placeholder="Password" style="width: 250px">
                
                <button type="submit" name="login-btn" href="scripts/login.php" class="btn btn-outline-primary">Login</button>
                <a href="scripts/signup.php" class="btn btn-outline-success">Sign-Up</a>
              
                <!--
                <button type="submit" name="login-btn">Login</button>
                -->
                </form>
                ';
            }    
          ?>
    </div>
    <div style="float: right">
        <?php
        if (isset($_SESSION['userID'])) {
            $userNAME = $_SESSION['userNAME'];
            echo '<p style="color: lightgreen; position: relative">You are logged in as '.$userNAME.'</p>';
        } else {
            echo "<p style='color: red'>You are not logged in</p>";
        }
        ?>
    </div>
    <header class="fixed">
    <div class="menu-toggle" id="hamburger"></div>
      <div class="overlay" ></div>
        <div class="container">
          <nav>
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="forum.php">Forum</a></li>
                <li><a href="rule.php">Rule</a></li>
                <?php if(isset($_SESSION['userID']) && $_SESSION['userID'] == 1){
                  echo '
                  <li><a href="admin_dashboard.php">Dashboard</a></li>
                  ';
                }
                ?>
              </ul>
          </nav>
        </div>
      </div>
    </div> 
    </header>