<?php

include('input.php');

//include ('connect.php');
/*
$db_server = "localhost";
$db_user = "root";
$db_passwd = "";
$db_name = "forumx";

$db = new mysqli(
$db_server,
$db_user,
$db_passwd,
$db_name);

if( $db->connect_errno <> 0){
    echo 'Failed to connect';
    echo $db->connect_error;
    exit;
}

//instead of include database.php*/

$db_server = "localhost";
$db_user = "root";
$db_passwd = "";
$db_name = "forumx";

$conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);

$content = $_POST['content'];
$user = $_POST['user'];
$topic = $_POST['topic'];

$sql = "SELECT * FROM xusers WHERE x_username = '".$user."'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$pwr = $row['x_power'];

$input = new input();
$is = $input -> post( $content );
if($is == false){
    die('You should leave some message');
}
$is = $input -> post( $user );
if($is == false){
    die('You should leave your name');
}


$time = time();
$sql ="INSERT INTO msg (content, user, time, power, topic_id)
        VALUES ('{$content}','{$user}','{$time}','{$pwr}','{$topic}')";
$is = $conn->query($sql);

$sql = "UPDATE xusers SET x_power = x_power + 10 WHERE x_username = '".$user."'";
mysqli_query($conn, $sql);

header("location:../topic.php?id=$topic");