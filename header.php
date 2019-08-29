<?php session_start() ?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Forum X</title>
    <link rel="stylesheet" href="./css/home.css" type="text/css">

        <title></title>
    </head>
    <body>

    <div class="head-wrap d-flex">
          <h1 class="forum flex-grow-1">Forum<span>X</span></h1>
          <div class="wrap-button flex-grow-0">
          <?php
            if (isset($_SESSION['userID'])) {
                echo
                '
                <form action="scripts/logout.php" method="post">
                <button type="submit" name="logout-btn">Logout</button>
                </form>
                ';
            } else {
                echo
                ' 
                <form action="scripts/login.php" method="post">
                <input type="text" name="email_x" placeholder="Username/email">
                <input type="password" name="passwd_x" placeholder="Password">
                <button type="submit" name="login-btn" href="scripts/login.php" class="btn btn-outline-primary">Login</button>
                <button type="submit" href="scripts/signup.php" class="btn btn-outline-success">Sign-Up</button>    
                <!--
                <button type="submit" name="login-btn">Login</button>
                -->
                </form>
                ';
            }    
          ?>
          </div>
    </div>
    <header>
    <div class="menu-toggle" id="hamburger"> 
    <!-- <i className="fas fa-bars"></i> -->
    </div>
      <div class="overlay" >
        <div class="container">   
          <nav>
              <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/forum">forum</a></li>
                <li><a href="/forum_modal_rule">rule</a></li>
              </ul>
          </nav>
        </div>
      </div>
    </div> 
    </header>