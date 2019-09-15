<?php require'header.php'?>



<?php
 $mysqli = new mysqli('localhost','root','','ForumX') or die(mysqli_error($mysqli));
 if(empty($_SESSION['user_id'])){
  header("Location:user_dashboard.php");
 }else{

 $id = $_SESSION['user_id'];
 $result = $mysqli->query("SELECT * FROM xUsers WHERE id=$id") or die($mysqli->error);

}
 
?>




<?php include 'user_process.php'?>



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

  <?php

while ($row = $result->fetch_assoc()) :

  ?>
<div class="card mb-4" style="height:250px;">
  <div class="row no-gutters">
    <div class="col-md-2">
      <img src="upload/<?php echo $row['x_userimage'] ?>" class="img-fluid rounded-circle w-55 mb-4 ml-4 mt-4">
</div>

    <div class="col-md-10">
      <div class="card-body ml-5 mt-1">
        <h3 class="card-title"><?php echo $row['x_username']?></h3>
        
        <p class="card-text"><?php echo $row['x_description']?></p>
        <p class="card-text"><small class="text-muted"></small></p>
      </div>
    </div>
  </div>
</div>
<?php endwhile?>
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
                  <th>description</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>coment</td>
                  <td></td>
                  <td></td>
                  <td></td>
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
  <?php require'footer.php'?>

 