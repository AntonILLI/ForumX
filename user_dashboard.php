<?php require "header.php"?>

<!--?php
 $mysqli = new mysqli('localhost','root','','ForumX') or die(mysqli_error($mysqli));
 if(empty($_SESSION['user_id'])){
  header("Location: user_dashboard.php");
 } else {

 $id = $_SESSION['user_id'];
 $result = $mysqli->query("SELECT * FROM xUsers WHERE id=$id") or die($mysqli->error);

}
?-->

<?php include 'user_process.php'?>


  <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- HEADER -->
  <header id="main-header" class="py-2 bg-info text-white">
    <div class="container">
      <div class="row">
        <div>
          <h1><i class="fas fa-cog"></i> User Dashboard</h1>
        </div>
        <div style="width: 50%; margin: 0 auto;">
        <a href='user_profile.php' class="btn btn-warning btn-block mt-2" style="font-size:20px;">
            <i class="fas fa-arrow-left"></i> Edit Profile
          </a>
        </div>
      </div>
    </div>
  </header>


<section>


<div class="container">
<div class="row">
  <div class="col-md-11">

  <?php

include_once "scripts/database.php";
$userID = $_SESSION['userID'];
$sql = "SELECT * FROM xusers WHERE x_id = $userID";
$result = mysqli_query($conn, $sql);

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
                  <th>topic #</th>
                  <th>Content</th>
                  <th>Time</th>
                </tr>
              </thead>
              <?php
include_once "scripts/database.php";
$sql = "SELECT * FROM msg WHERE user = '".$userNAME."'";
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) :
  echo
  '
  <tbody>
  <tr>
  <td>'.$row['topic_id'].'</td>
  <td>'.$row['content'].'</td>
  <td>'.date("Y-m-d H:i:s", $row['time']).'</td>
  </tr>
  
  '
?>
    <?php endwhile?>
              </tbody>

            </table>
          </div>
        </div>

     
      </div>
    </div>
  </section>

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
  <?php require "footer.php"?>