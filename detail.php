<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<title>ForumX</title>

</head>
<body>


<header id="main-header" class="py-2 bg-secondary text-white">
    <div class="container">
      <div class="row">
   
        <div class="col-md-8">
          <h1>
            <i class="fas fa-user"></i>Topic Detail</h1>
        </div>


        <div class="col-md-4">
          <a href='admin_dashboard.php' class="btn btn-light btn-block mt-2" style="font-size:20px;">
            <i class="fas fa-arrow-left"></i> Back To Dashboard
          </a>
        </div>
      </div>
    </div>
  
  </header>




<div class="container">


<?php include 'admin_process.php'?>
<?php
  $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

  $server = $url["host"];
  $username = $url["user"];
  $password = $url["pass"];
  $db = substr($url["path"], 1);
  
  $mysqli = new mysqli($server, $username, $password, $db) or die(mysqli_error($mysqli));

 if(empty($_GET['id'])){
  header("Location:admin_dashboard.php");
 }else{

$id = $_GET['id'];
 $result = $mysqli->query("SELECT * FROM xAdmin WHERE id=$id") or die($mysqli->error);
 }
 
?>

<?php
if(isset($_SESSION['message'])):?>
<div class="alert alert-<?=$_SESSION['msg_type']?>">

<?php
echo $_SESSION['message'];
unset($_SESSION['message']);
?>


</div>



<?php endif; ?>







<section>

<div class="container">
<div class="row">
<div class="col-md-12">


<?php
while($row = $result->fetch_assoc()):

?>




<div class="card mt-5 mb-3" style="max-width: 1000px;">
  <div class="row no-gutters">
    <div class="col-md-3">
    <img class="card-img"src='upload/<?php echo $row['image']?>' height='200' width='100'></td>
    </div>
    <div class="col-md-9">
      <div class="card-body ml-1">
        <h3 class="card-title"><?php echo $row['title']; ?></h3>
        <p class="card-text"><?php echo $row['description']; ?></p>
        <p class="card-text"><small class="text-muted"></small></p>
        
      
      <td>

<a href="detail.php?id=<?php echo $row['id'];?>"class="btn btn-info invisible">
Edit</a>



</td>
<a href="admin_process.php?deleted=<?php echo $row['id'];?>"
class="btn btn-danger mt-4 mb-3"style="float:right;"
>Delete</a> 
</div>



</div>
  </div>
</div>
</div>
</div>
</div>
<?php endwhile;?>

</section>




<section>
<div class="container">
<div class="row ">
<div class="col-md-12">

  <form action="admin_process.php" method="POST"enctype="multipart/form-data" >
  <input type="hidden" name="id" value="<?php echo $id;?>">
  
  <div class="form-group">
  <label>Title</label>
  <input type="text"name="title" class="form-control "style="width:700px;" value="<?php echo $title;?>">
  </div>
  
  <div class="form-group">
  <label>Photo</label>
   <input type="file" name="image" class="form-control" style="width:700px;" value="<?php echo $image;?>">
   </div>
  
   <div class="form-group">
  <label>description</label>
 
   <input size="10" type="text"name="description" class="form-control" style="height:100px;width:700px;" value="<?php echo $description;?>"></input>
   </div>
   

   <div class="form-group">

   <button class="btn btn-primary"type="submit"name="updated">Update</button>
    
   
   <h2>
 <?php
 if(!empty($upload_errors)){
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
   </section>




   
</body>
</html>