<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
 
  <title>ForumX</title>
</head>

<body>
<?php
 $mysqli = new mysqli('localhost','root','','ForumX') or die(mysqli_error($mysqli));
//  if(empty($_GET['id'])){
//   header("Location:user_dashboard.php");
//  }else{

// $id = $_GET['id'];
//  $result = $mysqli->query("SELECT * FROM xUsers WHERE id=$id") or die($mysqli->error);
//  }
 
?>

<?php
      $mysqli = new mysqli('localhost', 'root', '', 'ForumX') or die(mysqli_error($mysqli));

      $result = $mysqli->query("SELECT COUNT(*) FROM xUsers") or die($mysqli->error);


      $row = mysqli_fetch_row($result);
//pagination 
      $num_rows = $row[0];

      $set_per_page = 5;
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
      $sql = "SELECT * FROM xUsers LIMIT $offset, $set_per_page";
      $result_row = $mysqli->query($sql) or die($mysqli->error);

      ?>



<?php include 'user_process.php'?>
<?php

$mysqli = new mysqli('localhost', 'root', '', 'ForumX') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM xUsers") or die($mysqli->error);

 
// will be limited by id //
?>



  <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
      <a href="Home.php" class="navbar-brand">ForumX</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a href="#" class="nav-link active">Dashboard</a>
          </li>
          <li class="nav-item px-2">
            <a href="forum.php" class="nav-link">Forum</a>
          </li>
          
        </ul>


        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-user"></i> Welcome ForumX
            </a>
            <div class="dropdown-menu">
              <a href='user_profile.php' class="dropdown-item">
                <i class="fas fa-user-circle"></i> Profile
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a href="login.html" class="nav-link">
              <i class="fas fa-user-times"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <!-- HEADER -->
  <header id="main-header" class="py-2 bg-info text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>
            <i class="fas fa-cog"></i> User Dashboard</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTINS -->
   <section id="actions" class="py-4 mb-4 bg-light">
   
  </section>

<section>
<div class="container">
<div class="row">
  <div class="col-md-11">
<div class="card mb-4" style="height:250px;">
  <div class="row no-gutters">
    <div class="col-md-2">
      <img src="upload/avatar.png" class="img-fluid rounded-circle w-55 mb-4 ml-4 mt-4">
    </div>
    <div class="col-md-10">
      <div class="card-body ml-5 mt-1">
        <h3 class="card-title">User Name</h3>
        
        <p class="card-text">Description</p>
        <p class="card-text"><small class="text-muted"></small></p>
      </div>
    </div>
  </div>
</div>

</section>


  <!-- POSTS -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col-md-11">
          <div class="card">
            <div class="card-header">
              <h4>Latest Your Comments</h4>
            </div>
            <table class="table table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th></th>
                  <th>Date</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Post One</td>
                  <td></td>
                  <td>May 10 2018</td>
                  <td>
                    <a href="details.html" class="btn btn-secondary">
                      <i class="fas fa-angle-double-right"></i> Details
                    </a>
                  </td>
                </tr>
               
               
               
              </tbody>
            </table>
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
            FormX
          </p>
        </div>
      </div>
    </div>
  </footer>


  <!-- MODALS -->

  <!-- ADD POST MODAL -->
  <div class="modal fade" id="addPostModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Add Topic</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select class="form-control">
                <option value="">Web Development</option>
                <option value="">Tech Gadgets</option>
                <option value="">Business</option>
                <option value="">Health & Wellness</option>
              </select>
            </div>
            <div class="form-group">
              <label for="image">Upload Image</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image">
                <label for="image" class="custom-file-label">Choose File</label>
              </div>
              <small class="form-text text-muted">Max Size 3mb</small>
            </div>
            <div class="form-group">
              <label for="body">Body</label>
              <textarea name="editor1" class="form-control"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-dismiss="modal">Save Changes</button>
        </div>
      </div>
    </div>
  </div>



  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

  <script>
    // Get the current year for the copyright
    $('#year').text(new Date().getFullYear());

    CKEDITOR.replace('editor1');
  </script>
</body>

</html>

 