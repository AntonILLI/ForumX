<?php require "header.php" ?>

<!-- HEADER -->
<header id="main-header" class="py-2 bg-info text-white">
    <div class="container">
      <div class="row">
        <div>
          <h1><i class="fas fa-cog"></i> User Dashboard</h1>
        </div>
        <div style="width: 50%; margin: 0 auto;">
        <a href='user_dashboard.php' class="btn btn-warning btn-block mt-2" style="font-size:20px;">
            <i class="fas fa-arrow-left"></i> Go Back To Dashboard
          </a>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="actions" class="py-4 mb-4 bg-light">

    <div class="container">
      <?php require_once 'user_process.php' ?>
      <?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$mysqli = new mysqli($server, $username, $password, $db) or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM xUsers") or die($mysqli->error);

      ?>

      <?php
      if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>


        </div>



      <?php endif; ?>

  </section>

  <!-- PROFILE -->
  <section id="profile">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h4>Edit Profile</h4>
            </div>
            <div class="card-body">
              <form action="user_process.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="x_id" value="<?php echo $id; ?>">

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="x_username" class="form-control" value="<?php echo $user_name; ?>">
                </div>
                <div class="form-group">
                  <label>Email</label>

                  <input type="email" name="x_email" class="form-control" value="<?php echo $email; ?>">
                </div>


                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="x_password" class="form-control" value="<?php echo $password; ?>">
                </div>

                <div class="form-group">
                  <label for="image">Upload Image</label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="x_userimage">
                    <label for="image" class="custom-file-label" value="<?php echo $userimage; ?>">Choose File</label>
                  </div>

                </div>


                <div class="form-group">
                  <label for="bio">Description</label>
                  <textarea class="form-control" name="x_description" value="<?php echo $x_description; ?>"></textarea>
                </div>
                <button class="btn btn-primary mr-2 mt-3 mb-3" style="float:right;"type="submit" name="save">Save profile</button>
              </form>
             
            </div>
          </div>
        </div>
        <!-- 
        <div class="col-md-3">
          <h3>Your Avatar</h3>
          <img src="img/profile.png" alt="" height='150' width='200' class="d-block img-fluid mb-3">
          <button class="btn btn-primary btn-block"type="submit" name="save">Save profile</button>
          <button class="btn btn-danger btn-block"name="delete">Delete profile</button>
        </div> -->
      </div>
    </div>

  </section>

<?php require "footer.php" ?>