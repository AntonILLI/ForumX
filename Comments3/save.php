<?php

include('input.php');
include ('connect.php');

$content = $_POST['content'];
$user = $_POST['user'];

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
$sql ="insert into msg (content, user, time) values('{$content}','{$user}','{$time}')";
$is = $db->query($sql);

//echo $sql;
header("location:gbook.php");