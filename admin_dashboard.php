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
      $mysqli = new mysqli('localhost', 'root', '123456', 'ForumX') or die(mysqli_error($mysqli));


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
            <a href="#" class="nav-link active">Dashboard</a>
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

  <!-- ACTIONS -->
  <section id="actions" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">

        <div class="col-md-3">
          <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#addCategoryModal">
            <i class="fas fa-plus"></i> Add Topics
          </a>
        </div>
        <div class="col-md-9">
          <?php require_once 'admin_process.php' ?>

          <?php
          if (isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

              <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>

            </div>



          <?php endif; ?>

        </div>
      </div>
  </section>

  <!-- POSTS -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h4>Latest Topics</h4>
            </div>
            <table class="table table-striped">
              <thead class="thead-dark">
                <tr>
                  <th colspan="1">Photo</th>
                  <th>ID</th>
                  <th>Title</th>
                  <th></th>
                </tr>
              </thead>
              <?php

              while ($row = $result->fetch_assoc()) :

                ?>

                <tbody>
                  <tr>
                    <td><img src='upload/<?php echo $row['image'];?>' height='80' width='120'></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>

                    <td>

                      <a href="detail.php?id=<?php echo $row['id']; ?>" name="edited" class="btn btn-secondary">
                        <i class="fas fa-angle-double-right"></i>Details
                      </a>
                    </td>
                  </tr>

                <?php endwhile; ?>

                </tbody>
            </table>
          </div>
        </div>

     
        <div class="col-md-3">
          <div class="card text-center bg-primary text-white mb-3">
            <div class="card-body">
              <h3>Users</h3>
              <h4 class="display-4">
              <i class="fas fa-users"></i> 
              <?php while ($row = mysqli_fetch_array($sql)) :?>

                <?php echo $row['COUNT(x_id)'];?>

              <?php endwhile?>
              </h4>
              <a href="admin_users.php" class="btn btn-outline-light btn-sm">View</a>
            </div>
          </div>
        
          <div class="card text-center bg-success text-white mb-3">
            <div class="card-body">
              <h3>Topics</h3>
              <h4 class="display-4">
                <i class="fas fa-folder"></i> 


                <?php while ($row = mysqli_fetch_array($admin_sql)):?>

              <?php echo $row['COUNT(id)'];?>

             <?php endwhile?>
              </h4>
              <a href="admin_dashboard.php" class="btn btn-outline-light btn-sm">View</a>
            </div>
          </div>

          <div class="card text-center bg-warning text-white mb-3">
            <div class="card-body">
              <h3>Commnets</h3>
             <h4 class="display-4">
             <i class="fas fa-comments"></i> 4
               
              </h4>
              <a href="comments.php" class="btn btn-outline-light btn-sm">View</a>
            </div>
          </div>
        </div>
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



  <!-- ADD CATEGORY MODAL -->
  <div class="modal fade" id="addCategoryModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title">Add Topic</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form action="admin_dashboard.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
              <label for="title" name="title">Title</label>
              <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
            </div>

            <div class="custom-file">
              <input type="file" name="image" class="custom-file-input" id="image" value="<?php echo $image; ?>">
              <label for="image" class="custom-file-label">Choose File</label>
            </div>
            <div class="form-group">
              <label for="bio">Description</label>
              <textarea class="form-control" name="description" value="<?php echo $description; ?>"></textarea>
            </div>




            <div class="form-group">         
           <button class="btn btn-primary" type="submit" name="saved">Save</button>
              

              <h2>
                <?php
                if (!empty($upload_errors)) {
                  echo $the_message;
                }
                ?>
              </h2>
            </div>
          </form>
        </div>
     

      </div>
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