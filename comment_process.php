<?php

 session_start();

  $id = 0;
  
  $username = '';
  $comment = '';
  $user = '';
  $time = '';
  



  //$description = mysqli_escape_string($mysqli,$_POST['description']);
  $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

  $server = $url["host"];
  $username = $url["user"];
  $password = $url["pass"];
  $db = substr($url["path"], 1);
  
  $mysqli = new mysqli($server, $username, $password, $db) or die(mysqli_error($mysqli));


//$description = mysqli_escape_string($mysqli,$_POST['description']);

// if(isset($_POST['saving'])){
//   $title = $_POST['title'];
//   $description = $_POST['description'];
//   $image = $_FILES['image']['name'];
 

// if(file_exists("upload/" . $image))
// {
//   $store = $image;
//   $_SESSION['message'] = "Image already exists. '.$store.'";
//   header('Location:admin_dashboard.php');
// }
// else
// {

//   $query = "INSERT INTO xAdmin (title,description,image) VALUES ('$title','$description','$image')" or
//    die($mysqli->error);
//   $query_start = mysqli_query($mysqli,$query);

// if($query_start){

//   $target_path = "upload";
//   move_uploaded_file($_FILES['image']['tmp_name'], $target_path . "/" . $_FILES['image']['name']);
//   $_SESSION['message'] = "Record has been saved";
//   header("Location:admin_dashboard.php");

// }
// else
// {

//   $_SESSION['msg_type'] = "error";
//   header("Location:admin_dashboard.php");

//      }
// }
// }
//$mysqli->query("DELETE FROM user WHERE id=$id") or die($mysqli->error());


if(isset($_GET['deleting'])){
  $id = $_GET['deleting'];
  $mysqli->query("DELETE FROM msg WHERE id=$id") or die($mysqli->error);
 
  $_SESSION['message'] = "Record has been deleted";
  $_SESSION['msg_type'] = "danger";

  header("Location:comments.php");
}

//edit
// if(isset($_GET['id'])){
//   $id = $_GET['id'];
//   //$updated=true;
//   $result = $mysqli->query("SELECT * FROM msg  WHERE id=$id");

//   if(count($result)==1){
//     $row = $result->fetch_array();

    
//     $title = $row['title'];
//     $description = $row['description'];
//     $image = $row['image'];
    

//   }
// }
//edit 

//   if(isset($_POST['updating'])){
//     $id = $_POST['id'];
//     $title = $_POST['title'];
//     $description = $_POST['description'];
//     $image = $_FILES['image']['name'];
 

// if(file_exists("upload/" . $image)){

//   $query_start= $mysqli->query("UPDATE xAdmin SET title='$title', description='$description', image='$image' WHERE id=$id ")or die($mysqli->error) ; 
 

//     if($query_start){

//       $target_path = "upload";
//       move_uploaded_file($_FILES['image']['tmp_name'], $target_path . "/" . $_FILES['image']['name']);

//       header("Location:admin_dashboard.php");
     
//       $_SESSION['message'] = "Record has been updated";
//       $_SESSION['msg_type'] = "warning";
//       header("Location:admin_dashboard.php");
//     }
//     else
//     {
    
//       $_SESSION['msg_type'] = "error";
//       header("Location:admin_dashboard.php");
    
//          }
//     }
//     }


  




?>
