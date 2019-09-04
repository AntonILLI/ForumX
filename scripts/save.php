<?php

include('input.php');

include ('scripts/connect.php');
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

header("location:gbook.php");