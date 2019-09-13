<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <title>ForumX</title>
</head>

<body>


  <!-- HEADER -->
  <header id="main-header" class="py-2 bg-info text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h1>
            <i class="fas fa-user"></i> Edit Profile</h1>
        </div>


        <div class="col-md-4">
          <a href='user_dashboard.php' class="btn btn-info btn-block mt-2" style="font-size:20px;">
            <i class="fas fa-arrow-left"></i> Back To Dashboard
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

      $mysqli = new mysqli('localhost', 'root', '', 'ForumX') or die(mysqli_error($mysqli));
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



  </div>
  </div>


  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());

    CKEDITOR.replace('editor1');
  </script>
</body>

</html>