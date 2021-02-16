<?php
    if (session_status() == PHP_SESSION_NONE) {
    ini_set('date.timezone','Pacific/Auckland');
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
    <div class="wrap-button d-flex flex-grow-0">
        <div>
        <?php
        if (isset($_SESSION['userID'])) {
            $userNAME = $_SESSION['userNAME'];
            echo '<p id="status" style="color: lightgreen; position: relative">You are logged in as '.$userNAME.'</p>';
        } else {
            echo '<p id="status" style="color: red">You are not logged in</p>';
        }
        ?>
        </div>
        <div>
          <?php
            if (isset($_SESSION['userID'])) {

                echo
                '
                <form action="scripts/logout.php" method="post">
                <button type="submit" name="logout-btn" class="btn btn-outline-warning">Logout</button>
                </form>
                ';
            } else {
                echo
                ' 
                <form action="scripts/login.php" method="post">
                <input type="text" name="email_x" placeholder="Username/email" style="width: 250px">
                <input type="password" name="passwd_x" placeholder="Password" style="width: 250px">
                <button type="submit" name="login-btn" href="scripts/login.php" class="btn btn-outline-primary btn-sm">Login</button>
                <a href="scripts/signup.php" class="btn btn-outline-success btn-sm">Sign-Up</a>
                </form>
                ';
            }    
          ?>
        </div>  
    </div>
    <header class="fixed">
    <div class="menu-toggle" id="hamburger"></div>
      <div class="overlay" ></div>
        <div class="container">
          <nav>
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="rule.php">Rule</a></li>
                <?php if(isset($_SESSION['userID']) && $_SESSION['userID'] == 1){
                  echo '
                  <li><a id="admin-dashboard" href="admin_dashboard.php">Dashboard</a></li>
                  ';
                } elseif(isset($_SESSION['userID'])) {
                  echo '
                  <li><a id="user-dashboard" href="user_dashboard.php">Profile</a></li>
                  ';
                }
                ?>
              </ul>
          </nav>
        </div>
      </div>
    </div> 
    </header>

<!-- MAIN BODY -->

<?php

$winnerID = $_GET['winnerID'];
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$mysqli = new mysqli($server, $username, $password, $db) or die(mysqli_error($mysqli));
$sql = "SELECT * FROM xAdmin WHERE id = $winnerID";
$result = $mysqli->query($sql) or die($mysqli->error);
$row = mysqli_fetch_assoc($result);

?>

<main>
<section>
    <div class="container-fluid">
        <div class="row">
                <div class="banner1 col-2">
                    <!--
                    <div class="d-flex flex-column">
                    </div>
                    -->
                </div>
                <div class="col-8">
                    <div class="d-flex flex-column">
                    <!--div class="winner-screen"-->
                    <div class="winner-screen" style="background-image: url('upload/<?php echo $row['image']?>')">

                            <h1 class="display-4 text-center" style="opacity:0.9; font-size:3.8rem;margin-top:70px;">
                            </h1>
                        </div>
                    </div>
                    <div class="item-2 p-2 d-flex flex-column mt-2">
                        <h1 class="text-center" style="font-size:40px;font-size:40px;">!!GONCRATULATIONS!!</h1>
                        <p class="item-2 ml-2 mt-2 pr-1" style="opacity:0.7; font-size:25px;">
                        This week`s winner is <?php echo $row['title'] ?><br>
                        </p>
                    </div>

                    <div class="item-3 p-2 d-flex flex-column mt-1 ">
                        <h2 class="ml-3 mt-4"style="font-size:30px;">Thanks to all participants</h2>

                        <table class="table">
                            <thead>
                            <tr class="table-primary">
                                <th scope="row">User</th>
                                <td>Power</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                    require_once "scripts/database.php";
                    $sql = "SELECT user, SUM(power) AS power FROM msg WHERE topic_id = $winnerID GROUP BY user ORDER BY power DESC";
                    $result = mysqli_query($conn, $sql);
                    
                    while($row = $result->fetch_assoc()): ?>

                            <tr class="table-success">
                                <th scope="row"><?php echo $row['user']?></th>
                                <td><?php echo $row['power']?></td>
                            </tr>
                            <?php endwhile;?>

                            </tbody>
                        </table>
                        
                        <p class="item-3 ml-2 ml-2" style="opacity:0.7;font-size:25px;">
                    </div>
                </div>
                <div class="banner2 col-2">
                    <!--
                    <div class="d-flex flex-column">
                    </div >
                    -->
                </div>
            </div>
        </div>
    </div>
</section>
</main>


<!-- MAIN BODY ENDS -->

<?php require "footer.php" ?>