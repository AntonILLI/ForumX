<?php

 session_start();

  $id = 0;
  $update = false;
  $user_name = '';
  $description = '';
  $password = '';
  $user_image = '';
  $email = '';

//$description = mysqli_escape_string($mysqli,$_POST['description']);
$mysqli = new mysqli('localhost','root','','ForumX') or die($mysqli->error);
$id = $_SESSION['id'];

//$description = mysqli_escape_string($mysqli,$_POST['description']);

if(isset($_POST['save'])){
  $user_name = $_POST['x_username'];
  $description = $_POST['x_description'];
  $password = $_POST['x_password'];
  $user_image = $_FILES['x_userimage']['name'];
  $email = $_POST['x_email'];

if(file_exists("upload/" . $user_image))
{
  $store = $user_image;
  $_SESSION['message'] = "Image already exists. '.$store.'";
  header('Location:user_dashboard.php');
}
else
{

  $query = "INSERT INTO xUsers (x_username, x_email, x_password ,x_description,x_userimage) VALUES ('$user_name','$email','$password','$description','$user_image')" or
   die($mysqli->error);
  $query_start = mysqli_query($mysqli,$query);

if($query_start){

  $target_path = "upload";
  move_uploaded_file($_FILES['x_userimage']['tmp_name'], $target_path . "/" . $_FILES['x_userimage']['name']);
  $_SESSION['message'] = "Record has been saved";
  header('Location:user_dashboard.php');

}
else
{

  $_SESSION['msg_type'] = "error";
  header('Location:user_dashboard.php');

     }
  }
}

//$mysqli->query("DELETE FROM user WHERE id=$id") or die($mysqli->error());

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM xUsers WHERE x_id=$id") or die($mysqli->error);
 
  $_SESSION['message'] = "Record has been deleted";
  $_SESSION['msg_type'] = "danger";

  header("Location:admin_users.php");
 
}

if(isset($_GET['edit'])){
 $id = $_GET['edit'];
  $update=true;
  $result = $mysqli->query("SELECT * FROM xUsers WHERE x_id=$id");

  if(count($result)==1){
    $row = $result->fetch_array();

    $user_name = $row['x_username'];
    $description = $row['x_description'];
    $password = $row['x_password'];
    $user_image = $row['x_userimage'];
    $email = $row['x_email'];

  }
}

//edit 

  if(isset($_POST['update'])){
    $id = $_POST['x_id'];
    $user_name = $_POST['x_username'];
    $description = $_POST['x_description'];
    $password = $_POST['x_password'];
    $user_image = $_FILES['x_userimage'];
    $email = $_POST['x_email'];
  
    $mysqli->query("UPDATE xUsers SET x_username='$user_name', x_email='$email', x_password='$password', x_description='$description',x_userimage='$user_image' WHERE x_id=$id ")or die($mysqli->error) ; 
   
    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";
    header('Location:user_dashboard.php');
  
  }

?>